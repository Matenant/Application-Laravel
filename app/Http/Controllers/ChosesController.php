<?php

namespace App\Http\Controllers;

use App\Models\Chose;
use App\Models\Lieu;
use App\Models\Categorie;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;

class ChosesController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        //dd(Auth::id());
        $recherches = request()->input('recherche', '');
        if($recherches != ''){
            $tabRecherchers = explode(";", $recherches);

            foreach($tabRecherchers as $recherche){
                $choses = Chose::where([
                    ['user_id', Auth::id()],
                    ['name', 'like', $recherche.'%']
                ])->get();
                $chosesByTag = Chose::where('user_id', Auth::id())->whereHas('tags', function($q) use($recherche) {
                    $q->where('name', 'like', $recherche.'%');
                })->get();

                $tabID = [];
                foreach($choses as $chose){
                    array_push($tabID, $chose->id);
                }

                foreach($chosesByTag as $result){
                    if(!in_array($result->id, $tabID)){
                        array_push($choses, $result);
                    }
                }
            }
        }
        else{
            $choses = Chose::where([
                ['user_id', Auth::id()]
            ])->get();
        }

        return view('choses.index', compact('choses'));
    }

    public function create() {
        $chose = new Chose();
        $lieux = Lieu::all();
        $categories = Categorie::all();
        $tags = Tag::all();
        return view('choses.create', compact('chose', 'lieux', 'categories', 'tags'));
    }

    public function store() {
        $data = request()->validate([
            'name' => 'required',
            'lieu_id' => 'required',
            'categorie_id' => 'required'
        ]);
        $data['user_id'] = Auth::id();
        $chose = Chose::create($data);
        $chose->tags()->attach(request()->input('name1', ''));
        $chose->tags()->attach(request()->input('name2', ''));
        $chose->tags()->attach(request()->input('name3', ''));

        return back();
    }

    public function show(Chose $chose) {
        return view('choses.show', compact('chose'));
    }

    public function edit(Chose $chose) {
        $lieux = Lieu::all();
        $categories = Categorie::all();
        $tags = Tag::all();
        return view('choses.edit', compact('chose', 'lieux', 'categories', 'tags'));
    }

    public function update(Chose $chose) {
        $data = request()->validate([
                'name' => 'required',
                'lieu_id' => 'required',
                'categorie_id' => 'required'
            ]);

        foreach($chose->tags as $tag){
            $tag->choses()->detach($chose);
        }
        $chose->update($data);
        $chose->tags()->attach(request()->input('name1', ''));
        $chose->tags()->attach(request()->input('name2', ''));
        $chose->tags()->attach(request()->input('name3', ''));

        return redirect('choses/' . $chose->id);
    }

    public function destroy(Chose $chose) {

        foreach($chose->tags as $tag){
            $tag->choses()->detach($chose);
        }

        $chose->delete();

        return redirect('choses');
    }
}
