<?php

declare(strict_types=1);

namespace App\Services;

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
}
