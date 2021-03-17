<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Chose;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    public function index(){
        $tags = Tag::all();

        return view('tags.index', compact('tags'));
    }

    public function create() {
        return view('tags.create');
    }

    public function store() {
        $data = request()->validate([
            'name' => 'required'
        ]);
        Tag::create($data);

        return back();
    }

    public function destroy(Tag $tag) {

        foreach($tag->choses as $chose){
            $chose->tags()->detach($tag);
        }

        $tag->delete();

        return redirect('tags');
    }
}
