<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Traits\StoreImageTrait;

use App\Models\PostCategory;

use App\Models\Post;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class PostController extends Controller
{
    use StoreImageTrait;

    public function index(){
        $posts = Post::orderBy('id', 'ASC')->paginate(5);
        if($key = request()->key)
        {
            $posts = Post::orderBy('id', 'ASC')->where('title','like','%'.$key.'%')->paginate(5);
        }
        return view('adminshop.post.index', compact('posts'));
    }

    public function create(){
        $postcategories = PostCategory::all();
        return view('adminshop.post.create', compact('postcategories'));
    }

    public function postcreate(Request $request){
        try{
            $slug = Str::slug($request->title, '-');
            $dataInsert = [
                'title' => $request->title,
                'posterName' => $request->posterName,
                'content' => $request->content,
            ];

            $postImage = $this->storageTraitUpLoad($request, 'imagePath', 'posts');
            if(!empty($postImage)){
                $dataInsert['imageName'] = $postImage['file_name'];
                $dataInsert['imagePath'] = $postImage['file_path'];
            }

            $data = Post::create($dataInsert);
            $data->postcategories()->attach($request->input('postcate', []));
            $data->slug()->create([
                'nameSlug' => $slug
            ]);
            return redirect()->route('adminshop.post.index')->with('msg', 'Thêm post thành công');
        } catch(\Exception $exception){
            Log::error('Lỗi: ' . $exception->getMessage() . '----Line: ' . $exception->getLine());
        }
    }

    public function edit($id, Post $post)
    {
        $postcategories = PostCategory::all();
        $result = Post::findOrFail($id);
        $option = $result->postcategories()->pluck('postcategory_id')->toArray();
        return view('adminshop.post.edit', compact('result', 'postcategories','option'));
    }

    public function updatePost(Request $request, $id)
    {
        try{
            $slug = Str::slug($request->title, '-');
            $dataUpdate = [
                'title' => $request->title,
                'posterName' => $request->posterName,
                'content' => $request->content,
            ];

            $postImage = $this->storageTraitUpLoad($request, 'imagePath', 'posts');
            if(!empty($postImage)){
                $dataUpdate['imageName'] = $postImage['file_name'];
                $dataUpdate['imagePath'] = $postImage['file_path'];
            }
            $data = Post::find($id);
            $data->update($dataUpdate);
            $data->postcategories()->sync($request->input('postcate', []));
            $data->slug()->update([
                'nameSlug' => $slug
            ]);
            return redirect()->route('adminshop.post.index')->with('msg', 'Cập nhật post thành công');
        } catch(\Exception $exception){
            Log::error('Lỗi: ' . $exception->getMessage() . '----Line: ' . $exception->getLine());
        }
    }

    public function delete($id)
    {
        $data = Post::find($id);
        $data->delete();
        $data->slug()->delete();
        return redirect()->route('adminshop.post.index')->with('msg', 'Xóa post thành công');
    }

    public function category(){
        $postcategories = PostCategory::orderBy('id', 'ASC')->paginate(5);
        if($key = request()->key)
        {
            $postcategories = PostCategory::orderBy('id', 'ASC')->where('name','like','%'.$key.'%')->paginate(5);
        }
        return view('adminshop.post.categories.index', compact('postcategories'));
    }

    public function createCategory(){
        return view('adminshop.post.categories.create');
    }

    public function postcreateCategory(Request $request){
        PostCategory::create([
            'name' => $request->name,
        ]);
        return redirect()->route('adminshop.post.category.index')->with('msg', 'Thêm danh mục post thành công');
    }

    public function editCategory($id)
    {
        $result = PostCategory::find($id);
        return view('adminshop.post.categories.edit', compact('result'));
    }

    public function updateCategory(Request $request, $id){
        PostCategory::find($id)->update([
            'name' => $request->name,
        ]);
        return redirect()->route('adminshop.post.category.index')->with('msg', 'Cập nhật danh mục post thành công');
    }

    public function deleteCategory($id)
    {
        PostCategory::find($id)->delete();
        return redirect()->route('adminshop.post.category.index')->with('msg', 'Xóa danh mục post thành công');
    }
}
