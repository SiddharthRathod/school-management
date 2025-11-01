<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use Illuminate\Support\Facades\Validator;
use App\Jobs\SendPostCreatedNotification;
use Illuminate\Validation\Rule;

class PostController extends Controller {
    
    //listing Posts
    public function index(){
        if(auth()->user()->hasRole('admin')){
            $posts = Post::latest()->with(['author'])->get()->toArray();
        } else {
            $posts = Post::latest()->where('post_by','admin')->orWhere('user_id',auth()->id())->with(['author'])->get()->toArray();
        }        
        return view('posts.index', compact('posts'));
    }

    //Add Post Screen
    public function addPost() {
        return view('posts.add-post');
    }

    //Store Post to Database
    public function createPost(Request $request){

        $validator = Validator::make($request->all(), [
                        'title' => ['required', 'string', 'max:255', 'unique:posts'],
                        'description' => ['required']                        
                    ]);

        if ($validator->fails()) {
            // Redirect back with errors
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $formData = [
                'user_id'       => auth()->user()->id,
                'title'         => $request->title,
                'description'   => $request->description,
            ];
            
            if(auth()->user()->hasRole('teacher') && !empty($request->targete_user)) {
                $formData['targete_user'] = $request->targete_user;
            }

            //Add post to database
            $post = Post::create($formData);

            if($post){
                if(auth()->user()->hasRole('teacher') && !empty($request->targete_user)) {
                    // Dispatch the job
                    SendPostCreatedNotification::dispatch($post);
                }
                session()->flash('success',__('Post Added successfully'));
            } else {
                session()->flash('error',__('Post Not Added, Please try again'));
            }                    
        }    
        if(auth()->user()->hasRole('admin')) {
            return redirect()->route('admin.posts');
        } else if(auth()->user()->hasRole('teacher')) {
            return redirect()->route('teacher.posts');
        }

        
    }

    //Edit post
    public function editPost($id){
        $post = Post::findOrFail($id);
        return view('posts.edit-post', compact('post'));
    }

    //Update Post
    public function updatePost(Request $request) {

        $validator = Validator::make($request->all(), [
            'title' => ['required', 'string', 'max:255', Rule::unique('posts')->ignore($request->id)],
            'description' => ['required']                        
        ]);

        if ($validator->fails()) {
            // Redirect back with errors
            return redirect()->back()->withErrors($validator)->withInput();
        } else {

            //Update Post
            $post = Post::find((int)$request->id); 
            $formData = [
                'title'         => $request->title,
                'description'   => $request->description,
            ];  
            $post->update($formData);

            if($post){
                session()->flash('success',__('Post Updated successfully'));
            } else {
                session()->flash('error',__('Post Not Updated, Please try again'));
            }                    
        }    
        if(auth()->user()->hasRole('admin')) {
            return redirect()->route('admin.posts');
        } else if(auth()->user()->hasRole('teacher')) {
            return redirect()->route('posts.index');
        }
    }

    //Delete Post
    public function deletePost($id) {        
        $post = Post::find($id);
        if (!$post) {
            return redirect()->back()->with('error', 'Post not found.');
        }
        try {
            $post->delete();
            return redirect()->back()->with('success', 'Post Deleted Successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Post Not Deleted, Please try again');
        }
    }

}
