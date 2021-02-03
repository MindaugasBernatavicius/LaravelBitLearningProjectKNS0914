<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogPostController extends Controller {
    public function index(){
        return view('blogposts', ['posts' => \App\Models\BlogPost::all()]);
        // return view('blogposts', ['posts' => DB::table('blog_posts')->orderBy('created_at', 'desc')->get()]);
    }

    public function show($id){
        return view('blogpost', ['post' => \App\Models\BlogPost::find($id)]);
    }

    public function store(Request $request){
        $this->validate($request, [
            // [Dėmesio] validacijoje unique turi būti nurodytas teisingas lentelės pavadinimas! Galime pažiūrėti, kas bus jei bus neteisingas
            'title' => 'required|unique:blog_posts,title|max:5',
            'text' => 'required',
        ]);
   
        $pb = new \App\Models\BlogPost();
        $pb->title = $request['title'];
        $pb->text = $request['text'];

        return ($pb->save() !== 1) ? 
            redirect('/app4/posts')->with('status_success', 'Post created!') : 
            redirect('/app4/posts')->with('status_error', 'Post was not created!');
    }

    public function destroy($id){
        \App\Models\Blogpost::destroy($id);
        return redirect('/app4/posts')->with('status_success', 'Post deleted!');
    }

    public function update($id, Request $request){
        // [Dėmesio] validacijoje unique turi būti nurodytas teisingas lentelės pavadinimas!
        // galime pažiūrėti, kas bus jei bus neteisingas
        $this->validate($request, [
            'title' => 'required|unique:blog_posts,title,'.$id.',id|max:5',
            'text' => 'required',
        ]);

        $bp = \App\Models\BlogPost::find($id);
        $bp->title = $request['title'];
        $bp->text = $request['text'];

        return ($bp->save() !== 1) ? 
            redirect('/app4/posts/' . $id)->with('status_success', 'Post updated!') : 
            redirect('/app4/posts/' . $id)->with('status_error', 'Post was not updated!');
    }  

    public function storePostComment($id, Request $request){
        $this->validate($request, ['text' => 'required']);
        $bp = \App\Models\BlogPost::find($id);
        $cm = new \App\Models\Comment();
        $cm->text = $request['text'];
        $bp->comments()->save($cm); // priskiriame naują komentarą blogpostui
        return redirect()->back()->with('status_success', 'Comment added!');
    }
}
