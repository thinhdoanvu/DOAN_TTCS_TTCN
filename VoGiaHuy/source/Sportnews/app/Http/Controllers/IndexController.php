<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Country;
use App\Models\Sport;
use App\Models\Post;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function home(Request $request){
        $category = Category::orderBy('id','ASC')->where('status',1)->get();
        $country = Country::orderBy('id','ASC')->where('status',1)->get();
        $sport = Sport::orderBy('id','ASC')->where('status',1)->get();
        $category_home = Category::with('post')->orderBy('id','ASC')->where('status',1)->get();
        $hot_news = Post::where('hot_news',1)->orderBy('date','ASC')->get();
        $keywords = $request->keywords_submit;
        return view('page.home',compact('category','country','sport','category_home','hot_news','keywords'));
    }
    public function category($slug){
        $category = Category::orderBy('id','ASC')->where('status',1)->get();
        $country = Country::orderBy('id','ASC')->where('status',1)->get();
        $sport = Sport::orderBy('id','ASC')->where('status',1)->get();
        $cate_slug = Category::where('slug',$slug)->first();
        $post = Post::where('category_id',$cate_slug->id)->paginate(9);
        $hot_news = Post::where('hot_news',1)->orderBy('date','DESC')->get();
        return view('page.category',compact('category','country','sport','cate_slug','post','hot_news'));
    }
    public function country($slug){
        $category = Category::orderBy('id','ASC')->where('status',1)->get();
        $country = Country::orderBy('id','ASC')->where('status',1)->get();
        $sport = Sport::orderBy('id','ASC')->where('status',1)->get();
        $country_slug = Country::where('slug',$slug)->first();
        $post = Post::where('country_id',$country_slug->id)->paginate(9);
        $hot_news = Post::where('hot_news',1)->orderBy('date','DESC')->get();
        return view('page.country',compact('category','country','sport','country_slug','post','hot_news'));
    }
    public function sport($slug){
        $category = Category::orderBy('id','ASC')->where('status',1)->get();
        $country = Country::orderBy('id','ASC')->get();
        $sport = Sport::orderBy('id','ASC')->get();
        $sport_slug = Sport::where('slug',$slug)->first();
        $post = Post::where('sport_id',$sport_slug->id)->paginate(9);
        $hot_news = Post::where('hot_news',1)->orderBy('date','DESC')->get();
        return view('page.sport',compact('category','country','sport','sport_slug','post','hot_news'));
    }
    public function post($slug){
        $category = Category::orderBy('id','ASC')->where('status',1)->get();
        $country = Country::orderBy('id','ASC')->where('status',1)->get();
        $sport = Sport::orderBy('id','ASC')->where('status',1)->get();
        $post = Post::with('category','country','sport')->where('slug',$slug)->first();
        $hot_news = Post::where('hot_news',1)->orderBy('date','DESC')->get();
        $post_slug = Post::where('slug',$slug)->first();
        $related = Post::with('category','country','sport')->where('sport_id',$post->sport->id)->orderBy(DB::raw('RAND()'))->whereNotIn('slug',[$slug])->get();        return view('page.post',compact('category','country','sport','hot_news','post_slug','post','related'));
        // ,compact('category','country','sport','post_slug'
    }
    public function search(Request $request)
    {
        $category = Category::orderBy('id','ASC')->where('status',1)->get();
        $country = Country::orderBy('id','ASC')->where('status',1)->get();
        $sport = Sport::orderBy('id','ASC')->where('status',1)->get();
        $post = Post::orderBy('id','ASC')->where('status',1)->get();
        $category_home = Category::with('post')->orderBy('id','ASC')->where('status',1)->get();
        $hot_news = Post::where('hot_news',1)->orderBy(DB::raw('RAND()'))->get();
        $keywords = $request->keywords_submit;
        $search_post = Post::where('title','like','%'.$keywords.'%')->get();
        return view('page.search',compact('category','country','sport','post','category_home','hot_news','search_post','keywords'));
    }
}
