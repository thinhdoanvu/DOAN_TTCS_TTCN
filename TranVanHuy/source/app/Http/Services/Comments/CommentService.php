<?php
namespace App\Http\Services\Comments;

use App\Models\Post;
use App\Models\Slug;

class CommentService{

    public function cmtPost($iduser, $slug, $cmt, $pr_cmt)
    {
        $slugPost = Slug::where('nameSlug', $slug)->first('slugable_id'); //id của post trong slug
        $post = Post::find($slugPost)->first(); //find id post
        $post->comments()->create([
            'userId' => $iduser,
            'body' => $cmt,
            'parent_id' => $pr_cmt,
        ]);
        return redirect()->route('blog.slug', $slug);
    }
}
