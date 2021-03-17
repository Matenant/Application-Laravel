<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Chose;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $categories = Categorie::all();

        return view('categories.index', compact('categories'));
    }

    public function create() {
        $categorie = new Categorie();
        $categories = Categorie::All();
        return view('categories.create', compact('categorie', 'categories'));
    }

    public function store() {
        $data = request()->validate([
            'name' => 'required',
            'parent_id' => 'required',
        ]);

        Categorie::create($data);

        return back(); //Revenir à la location précédente
    }

    public function show($categorie) {
        $categorie = Categorie::findOrFail($categorie);
        return view('categories.show', compact('categorie'));
    }

    public function edit($categorie) {
        $categorie = Categorie::findOrFail($categorie);
        $categories = Categorie::All();
        return view('categories.edit', compact('categorie', 'categories'));
    }

    public function update($categorie) {
        $data = request()->validate([
                'name' => 'required',
                'parent_id' => 'required'
            ]);
        $categorie = Categorie::findOrFail($categorie);
        $categorie->update($data);

        return redirect('categories/' . $categorie->id);
    }

    public function destroy($categorie) {
        $categorie = Categorie::findOrFail($categorie);

        Categorie::where('parent_id', $categorie->id)->update(['parent_id' => $categorie->parent_id]);
        Chose::where('categorie_id', $categorie->id)->update(['categorie_id' => $categorie->parent_id]);

        $categorie->delete();

        return redirect('categories');
    }
}
