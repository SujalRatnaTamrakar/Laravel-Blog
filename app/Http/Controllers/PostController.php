<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    public function index(){

        return view('home',[
            'posts'=>Post::latest()->filter(request(['search']))->paginate(9)->withQueryString()
        ]);
    }

    public function show(Post $post){
        return view('blog',[
            'post' => $post
        ]);
    }

    public function create(){
        return view('create');
    }

    public function store(){

        $attributes = request()->validate([
            'title' => 'required',
            'thumbnail' => 'image',
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => ['required',Rule::exists('categories','id')]
        ]);
        $attributes['user_id'] = auth()->id();
        $attributes['thumbnail']=request()->file('thumbnail')==null?"null":request()->file('thumbnail')->store('thumbnails');
        $attributes['slug']=STR::slug(request()->get('title'), '-');
        Post::create($attributes);

        return redirect('/');
    }


}
