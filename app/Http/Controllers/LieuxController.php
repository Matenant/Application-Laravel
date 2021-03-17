<?php

namespace App\Http\Controllers;

use App\Models\Lieu;
use App\Models\Chose;
use Illuminate\Http\Request;

class LieuxController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $lieux = Lieu::all();

        return view('lieux.index', compact('lieux'));
    }

    public function create() {
        $lieu = new Lieu();
        $lieux = Lieu::all();
        return view('lieux.create', compact('lieu', 'lieux'));
    }

    public function store() {
        $data = request()->validate([
            'name' => 'required',
            'parent_id' => 'required'
        ]);

        Lieu::create($data);

        return back(); //Revenir à la location précédente
    }

    public function show(Lieu $lieu) {
        return view('lieux.show', compact('lieu'));
    }

    public function edit(Lieu $lieu) {
        $lieux = Lieu::all();
        return view('lieux.edit', compact('lieu', 'lieux'));
    }

    public function update(Lieu $lieu) {
        $data = request()->validate([
            'name' => 'required',
            'parent_id' => 'required'
        ]);

        $lieu->update($data);

        return redirect('lieux/' . $lieu->id);
    }

    public function destroy(Lieu $lieu) {
        $lieu->delete();

        Lieu::where('parent_id', $lieu->id)->update(['parent_id' => $lieu->parent_id]);
        Chose::where('lieu_id', $lieu->id)->update(['lieu_id' => $lieu->parent_id]);


        return redirect('lieux');
    }
}
