<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
class PostController extends Controller
{
    
    public function index(){
        
        $posts = Post::with('author')->paginate(2);
        return view('screen.admin.post-list', compact('posts'));
    }

    public function add(){
        
        $categories = Category::get();
        
        return view('screen.admin.post-add',compact('categories'));
    }

    public function store(PostRequest $request){

        $data = $request->all();
        $fileExtension = $request->file('thumbnail')->getClientOriginalExtension();
        $fileName = 'post-'.time().'.'.$fileExtension;
        $request->file('thumbnail')->move('images/posts', $fileName);
        $data['thumbnail'] = $fileName;
        $data['publishedAt'] = now();
        $data['author_id'] = Auth::id();
        $post = Post::create($data);
        $post->categories()->attach($request->categories);
        return redirect()
                ->route('post.list')
                ->with('success', 'Thêm bài viết thành công');
    }

    public function edit($id){
        $roles= Auth::user();
        $post = Post::with('categories:id')->where('id', $id)->first();
        $categories = Category::get();
        return view('screen.admin.post-edit', compact('post', 'categories'));
    }

    public function update(Request $request, $id){
        $data = $request->all();
        if($request->hasFile('thumbnail')){
            $fileExtension = $request->file('thumbnail')->getClientOriginalExtension();
            $fileName = 'post-'.time().'.'.$fileExtension;
            $request->file('thumbnail')->move('images/posts', $fileName);
            $data['thumbnail'] = $fileName;
        } else {
            unset($data['thumbnail']);
        }
        $data['publishedAt'] = now();
        $data['author_id'] = Auth::id();
        $post = Post::find($id);
        $post->update($data);
        $post->categories()->sync($request->categories);
        return redirect()
                ->route('post.list')
                ->with('success', 'Cập nhật viết thành công');
    }

    public function destroy($id){
        $post = Post::find($id);
        $post->categories()->detach();
        $post->delete();
        return redirect()
                    ->route('post.list')
                    ->with('success', 'Xóa bài viết thành công');
    }

}
