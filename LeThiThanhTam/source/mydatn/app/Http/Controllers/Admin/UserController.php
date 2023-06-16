<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Utilities\Common;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::all();
        
        $users = User::paginate(5);
        //Lấy dữ liệu từ khóa tìm kiếm = request
        if($search = request()->search){
            //lấy danh sách theo từ khóa tìm kiếm
            $users = User::where('name','like','%' . $search . '%')->paginate(3);
        }

        

        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->get('password') != $request->get('password_confirmation')) {
            return back()->with('notification', 'Mật khẩu không khớp.');
        }

        $data = $request->all();
        $data['password'] = bcrypt($request->get('password'));

        //xử lí file:
        //hasFile xac dinh xem file image cos ton tai hay ko
        if($request->hasFile('image')){
            $data['avatar'] = Common::uploadFile($request->file('image'), 'front/img/user');
        }
        $user = User::create($data);

        return redirect('admin/user/' . $user->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('admin.user.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.user.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $data = $request->all();

        //Xử lí mật khẩu
        if($request->get('password') != null){
            if($request->get('password') != $request->get('password_confirmation')){
                return back()->with('notification', 'Mật khẩu không khớp.');
            }   
            $data['password'] = bcrypt($request->get('password'));
 
        } else {
            unset($data['password']);
        }

        //Xử lí file ảnh
        if($request->hasFile('image')){
            //Them file ms
            $data['avatar'] = Common::uploadFile($request->file('image'), 'front/img/user');

            //Xóa file cũ
            $file_name_old = $request->get('image_old');
            if($file_name_old != ''){
                unlink('front/img/user/' . $file_name_old);
            }
        }

        //cập nhật dữ liệu
        //User::update($data, $user->id);
        $user = User::find($user->id);
        $user->update($data);

        return redirect('admin/user/' . $user->id);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete($user->id);

        //Xóa file
        $file_name = $user->avatar;
        if($file_name != ''){
            unlink('front/img/user/' . $file_name);
        }

        return redirect('admin/user');
    }

}
