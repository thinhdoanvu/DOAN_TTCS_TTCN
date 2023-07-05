<?php
    function getMenu(){
        $menunotes = App\Models\Menunote::all();
        $location = App\Models\Menulocation::all();
        $carts = App\Models\Cart::all();
        $products = App\Models\Product::all();
        $units = App\Models\Unit::all();
        return 1;
    }

    function getThreeposts(){
        $threeposts = App\Models\Post::orderBy('id', 'desc')->limit(3)->get();
        return $threeposts;
    }

    function getNameuser($id){
        $nameuser = App\Models\Member::find($id)->first('hoten');
        return $nameuser;
    }
?>
