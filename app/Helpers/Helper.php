<?php


namespace App\Helpers;

use Intervention\Image\ImageManagerStatic;

class Helper
{

    static function uploadImage($request, $nameFile, $id = null, $pathname, $class, $measure = array("w" => "", "h" => ""))
    {
        //  Upload
        if ($request->hasFile($nameFile) && $request->file($nameFile)->isValid()) {
            $requestImage = $request->$nameFile;
            $extesion = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extesion;

            $request->$nameFile->move(public_path('storage/' . $pathname), $imageName);
            $pathFileImg = public_path('storage/' . $pathname) . "/" . $imageName;
            $width = $measure["w"];
            $height = $measure["h"];
            $img = ImageManagerStatic::make($pathFileImg)
                ->fit($width, $height);
            // ->blur(100);
            $img->save($pathFileImg, 90);

            // Deletando o file antigo do servidor
            if (!is_null($id)) {
                $file = $class->Find($id);
                $imageAntiga = public_path('storage/' . $pathname) . $file->$nameFile;
                if (file_exists($imageAntiga)) {
                    unlink($imageAntiga);
                }
            }

            return $imageName;
        } else {
            return false;
        }
    }
}
