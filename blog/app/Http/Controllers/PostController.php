<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $posts = Post::all();
        return view('admin.posts')->with('posts', $posts);
    }

    public function showAdd(){
        $categories = Category::all();
        return view('admin.post_add')
        ->with('categories', $categories);
    }

    public function store(Request $request){
        $request->validate([
            'title'=>'required|string|max:255',
            'description'=>'required|string|max:255',
            'content'=>'required|string|max:255',
            'image'=>'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:5120',
            'category_id'=>'required'
        ],[
            'title.required'=>'El título es obligatorio',
            'description.required'=>'La descripción es obligatoria',
            'content.required'=>'El contenido es obligatorio',
            'image.image'=>'El archivo debe ser una imagen',
            'image.mimes'=>'La imagen debe ser jpg, jpeg, png, gif o webp',
            'image.max'=>'La imagen no debe superar los 5MB',
            'category_id.required'=>'La categoría es obligatoria'
        ]);

        $file = $request->file('image');
        $filename = uniqid().'.'.$file->getClientOriginalExtension();
        $file->move(public_path('posts/'), $filename);

        $post = new Post();
        $post->title=$request->title;
        $post->description=$request->description;
        $post->content=$request->content;
        $post->img=$filename;
        $post->category_id=$request->category_id;
        $post->likes=0;
        $post->user_id=Auth::user()->id;
        $post->save();
        return redirect()
        ->back()
        ->with('success','Post creado correctamente');

    }

}
