<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Traits\StoreImageTrait;

use App\Models\Slider;
use Illuminate\Support\Facades\Log;

class SliderController extends Controller
{
    use StoreImageTrait;
    private $slider;

    public function __contruct(Slider $slider){
        $this->slider = $slider;
    }

    public function index(){
        $sliders = Slider::orderBy('id', 'DESC')->paginate(5);
        if($key = request()->key)
        {
            $sliders = Slider::orderBy('id', 'DESC')->where('name','like','%'.$key.'%')->paginate(5);
        }
        return view('adminshop.slider.index', compact('sliders'));
    }

    public function create(){
        return view('adminshop.slider.create');
    }

    public function postcreate(Request $request){
        try{
            $dataInsert = [
                'name' => $request->name,
                'description' => $request->description,
            ];

            $sliderImage = $this->storageTraitUpLoad($request, 'image_path', 'sliders');
            if(!empty($sliderImage)){
                $dataInsert['image_name'] = $sliderImage['file_name'];
                $dataInsert['image_path'] = $sliderImage['file_path'];
            }

            Slider::create($dataInsert);

            return redirect()->route('adminshop.slider.index')->with('msg', 'Thêm slider thành công');
        } catch(\Exception $exception){
            Log::error('Lỗi: ' . $exception->getMessage() . '----Line: ' . $exception->getLine());
        }
    }

    public function edit($id)
    {
        $result = Slider::find($id);
        return view('adminshop.slider.edit', compact('result'));
    }

    public function updateSlider(Request $request, $id)
    {
        try{
            $dataUpdate = [
                'name' => $request->name,
                'description' => $request->description,
            ];

            $sliderImage = $this->storageTraitUpLoad($request, 'image_path', 'sliders');
            if(!empty($sliderImage)){
                $dataUpdate['image_name'] = $sliderImage['file_name'];
                $dataUpdate['image_path'] = $sliderImage['file_path'];
            }

            Slider::find($id)->update($dataUpdate);

            return redirect()->route('adminshop.slider.index')->with('msg', 'Cập nhật slider thành công');
        } catch(\Exception $exception){
            Log::error('Lỗi: ' . $exception->getMessage() . '----Line: ' . $exception->getLine());
        }
    }

    public function delete(Request $request, $id)
    {
        Slider::find($id)->delete();
        return redirect()->route('adminshop.slider.index')->with('msg', 'Xóa slider thành công');
    }
}
