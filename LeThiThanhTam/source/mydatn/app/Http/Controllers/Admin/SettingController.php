<?php

namespace App\Http\Controllers\Admin;
use App\Models\Setting;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Utilities\Common;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $item = Setting::where('key','general')->firstOrFail()->toArray(); 
        $result = json_decode($item['value'], true);
        
        //dd($result);
        return view('admin.setting.index',compact('result'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addSetting(Request $request)
    {
        //
        $data = $request->all();
        //dd($data);
        //Xử lí file ảnh
            if($request->hasFile('image')){
                //Them file ms
                $data['logo'] = Common::uploadFile($request->file('image'), 'admin/img/logo');
    
                //Xóa file cũ
                $file_name_old = $request->get('image_old');
                if($file_name_old != ''){
                    unlink('admin/img/logo/' . $file_name_old);
                    unset($data['image_old']);
                }
            }else{
                $data['logo'] = $data['image_old'];
            }


        
        //dd($data); 
        unset($data['_token']);
        
        $value = json_encode($data, JSON_UNESCAPED_UNICODE);

        Setting::where('key','general')->update(['value' => $value]);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
