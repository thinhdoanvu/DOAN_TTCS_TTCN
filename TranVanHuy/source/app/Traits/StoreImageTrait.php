<?php

namespace App\Traits;

use Storage;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

trait StoreImageTrait{
    public function storageTraitUpLoad($request, $fieldName, $folderName){
        $path = public_path('storage/'.$folderName);
        if(!File::isDirectory($path)){
            File::makeDirectory($path, 0777, true, true);
            // dd($request->hasFile($fieldName));
            if($request->hasFile($fieldName)){
                $file = $request->$fieldName;
                $fileNameOrigin = $file->getClientOriginalName();
                $fileNameHash = Str::random(20) . '.' . $file->getClientOriginalExtension();
                $filePath = $request->file($fieldName)->storeAs('public/' . $folderName, $fileNameHash);
                $dataUploadTrait = [
                    'file_name' => $fileNameOrigin,
                    'file_path' => Storage::url($filePath)
                ];
                return $dataUploadTrait;
            }
            return null;
        }else{
            if($request->hasFile($fieldName)){
                $file = $request->$fieldName;
                $fileNameOrigin = $file->getClientOriginalName();
                $fileNameHash = Str::random(20) . '.' . $file->getClientOriginalExtension();
                $filePath = $request->file($fieldName)->storeAs('public/' . $folderName, $fileNameHash);
                $dataUploadTrait = [
                    'file_name' => $fileNameOrigin,
                    'file_path' => Storage::url($filePath)
                ];
                return $dataUploadTrait;
            }
            return null;
        }
    }
}
?>