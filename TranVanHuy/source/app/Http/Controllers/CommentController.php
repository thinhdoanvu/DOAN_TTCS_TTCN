<?php

namespace App\Http\Controllers;

use App\Models\Comment;

use Illuminate\Http\Request;

use App\Http\Services\Comments\CommentService;

class CommentController extends Controller
{

    protected $comments;

    public function __construct(CommentService $comments){
        $this->comments = $comments;
    }

    // public function comment(Request $request){
    //     $type = Comment::where('commentable_id', $request->idPost)->get();
    //     if(isset($type->commentable_type)){
    //         switch ($type->commentable_type) {
    //             case Post::class:
    //                 // View Post
    //                 $cmtPost = $this->comments->cmtPost($request->idPost, $request->comment);
    //                 return $cmtPost;
    //                 break;

    //             default:
    //                 dd('default');
    //                 break;
    //         }
    //     }
    //     else{
    //         return redirect()->route('index');
    //     }
    // }

    public function index(){
        $cmts = Comment::orderBy('id', 'desc')->paginate(5);
        if($key = request()->key)
        {
            $cmts = Comment::orderBy('id', 'desc')->where('body','like','%'.$key.'%')->paginate(5);
        }
        return view('adminshop.comment.index', compact('cmts'));
    }

    // Đăng bài comment
    public function store(Request $request, $slug){
        if($request->sendcmt){
            $cmtPost = $this->comments->cmtPost($request->iduser, $slug, $request->body, $request->comment_id);
            return $cmtPost;
        }
    }

    public function delete($id)
    {
        Comment::find($id)->delete();
        return redirect()->route('adminshop.comment.index')->with('msg', 'Xóa comment thành công');
    }
}
