<?php

namespace App\Http\Service\Slider;

use App\Models\Slider;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use  Toastr;

class SliderService
{
    public function insert($request){
        try {
            Slider::create($request->input());
//            Session::flash('success','Thêm slider thành công');
            Toastr::success('Thêm slider thành công','Thành công');

        } catch (\Exception $err){
//            Session::flash('error','Thêm slider thất bại');
            Toastr::error('Thêm slider thất bại','Thất bại');
            Log::info($err->getMessage());
            return false;
        }

        return true;
    }

    public function show()
    {
        return Slider::where('active',1)->orderByDesc('sort_by')->get();
    }

    public function get(){

        return Slider::orderByDesc('id')->paginate(15);
    }

    public function update($request,$slider){

        try {
            $slider->fill($request->input());
            $slider->save();

//            Session::flash('success','Sửa slider thành công');
            Toastr::success('Cập nhật slider thành công','Thành công');

        } catch (\Exception $err){
//            Session::flash('error','Cập nhật slider thất bại');
            Toastr::error('Cập nhật slider thất bại','Thất bại');
            Log::info($err->getMessage());
            return false;
        }

        return true;

    }

    public function destroy($request){
        $slider = Slider::where('id',$request->input())->first();

        if ($slider){
            $slider->delete();
            return true;
        }

        return false;

    }
}
