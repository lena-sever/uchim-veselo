<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Lesson;
use App\Models\Slider;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class UploadService
{
	/**
	 * @param UploadedFile $file
	 * @return string
	 * @throws \Exception
	 */
   public function start(UploadedFile $file): string
   {
	   $completedFile = $file->storeAs('img',$file->hashName());
       if(!$completedFile) {
		   throw new \Exception("Файл не был загружен");
	   }

	   return $completedFile;
   }

   public function start_user_photo(UploadedFile $file,$name): string
   {
        $newName = explode('.',(string)$file->getClientOriginalName());
        $newName = end($newName);
        $newName = $name.'.'.$newName;

        $completedFile = $file->storeAs('photo_profile',$newName);
        if(!$completedFile) {
            throw new \Exception("Файл не был загружен");
        }

        return $completedFile;
   }

   public function rename($file,$lesson_id)
   {
     $last_slider_id = Slider::latest()->first()->id;
     $last_slider_id=(int)$last_slider_id+1;
     $newName = explode('.',(string)$file->getClientOriginalName());
     $newName = end($newName);
     $newName = $lesson_id.'_'.$last_slider_id.'.'.$newName;
     return $newName;
   }

   public function start_slider_img(UploadedFile $file,$name): string
   {
        $completedFile = $file->storeAs('slider/slider_img',$name);

       if(!$completedFile) {
		   throw new \Exception("Файл не был загружен");
	   }

	   return $completedFile;
   }

   public function start_music(UploadedFile $file,$name): string
   {
	   $completedFile = $file->storeAs('slider/music',$name);

       if(!$completedFile) {
		   throw new \Exception("Файл не был загружен");
	   }

	   return $completedFile;
   }

   public function start_test_img(UploadedFile $file) : string
   {
        $completedFile = $file->storeAs('test_img',$file->hashName());

        if(!$completedFile) {
            throw new \Exception("Файл не был загружен");
        }

        return $completedFile;
   }
}
