<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sport;

class SportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Sport::all();
        return view('admin.sport.index',compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.sport.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $sport = new Sport();
        $sport->title = $data['title'];
        $sport->slug = $data['slug'];
        $sport->description = $data['description'];
        $sport->status = $data['status'];
        $sport->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $sport = Sport::find($id);
        $list = Sport::all();
        return view('admin.sport.form',compact('list','sport'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();
        $sport = Sport::find($id);
        $sport->title = $data['title'];
        $sport->slug = $data['slug'];
        $sport->description = $data['description'];
        $sport->status = $data['status'];
        $sport->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Sport::find($id)->delete();
        return redirect()->back();
    }
}
