<?php
namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\SavePostRequest;

class PostController extends Controller{

    public function __construct() {
        $this->middleware('auth', ['except' => 'index', 'show']);
    }

    //public function __invoke(){
    public function index(){
        /* $posts = [
            ['title' => 'post 1'],
            ['title' => 'post 2'],
            ['title' => 'post 3']
        ];*/
//        $posts = DB::table('posts')->get();
        $posts = Post::get();

        //return view('blog', ['posts' => $posts]);
        return view('posts.index', ['posts' => $posts]);


    }

    public function show(Post $post){
       //return Post::findOrFail($post);
       //return $post;
       return view('posts.show', ['post' => $post ]);
    }

    public function create(){
 
        return view('posts.create', ['post' => New Post ]);

    }

    public function store(SavePostRequest $request){
        //$validated = $request->validate([
        //    'title' =>['required', 'min:4'],
        //    'body' =>['required']
        //],[
        //    'title.required' => 'hubo error en :attribute'
        //]);


        //$post = new Post;
        //$post->title = $request->input('title');
        //$post->body = $request->input('body');
        //$post->save();

        //Post::create([
        //    'title' => $request->input('title'),
        //    'body' => $request->input('body')
        //]);

        Post::create($request->validated());


        //session()->flash('status', 'Post creado');

        //return redirect()->route('posts.index');
        return to_route('posts.index')->with('status','Post creado');

     }

     public function edit(Post $post){
        return view('posts.edit', ['post' => $post ]);
     }

     public function update(SavePostRequest $request, Post $post){
        //$validated = $request->validate([
        //    'title' =>['required', 'min:4'],
        //    'body' =>['required']
        //],[
        //    'title.required' => 'hubo error en :attribute'
        //]);


        //$post = Post::find($post);

        //$post->title = $request->input('title');
        //$post->body = $request->input('body');
        //$post->save();

        //$post->update([
        //    'title' => $request->input('title'),
        //    'body' => $request->input('body')
        //]);
        $post->update($request->validated());

        //session()->flash('status', 'Post actualizado');

        return to_route('posts.show', $post)->with('status', 'Post actualizado');
   
     }


    public function destroy(Post $post)
    {
        $post->delete();

        return to_route('posts.index')->with('status', 'Post eliminado');
    }
}