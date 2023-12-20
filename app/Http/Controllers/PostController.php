<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
 

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::with('user')->get();
         return view('posts.posts', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'title.required' => 'The title field is required.',
            'description.required' => 'The description field is required.',
            'image.image' => 'The uploaded file must be an image.',
            'image.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif.',
            'image.max' => 'The image must not exceed 2048 kilobytes.',
        ]);
    
        $post = new Post();
        $post->title = $request->title;
        $post->description = $request->description;
        $post->user_id = Auth::id();
    
        if ($request->hasFile('image'))
        {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads'), $imageName);
            $post->image = 'uploads/' . $imageName;
        }
    
        $post->save();
    
        return redirect()->route('posts.index')->with('success', 'Post created successfully!');
    }
    
    public function destroy(Post $post)
    {
        if ($post->user_id !== Auth::id())
        {
            return back()->with('error', 'You are not authorized to delete post.');
        }

        $post->delete();

        return redirect()->route('posts.index');
    }
}
