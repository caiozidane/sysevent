<?php


namespace App\Helpers;

use Intervention\Image\ImageManagerStatic;
use Illuminate\Support\Facades\Log;

class Helper
{

    static function uploadImage($request, $nameFile, $id = null, $pathname, $class, $measure = array("w" => "1024", "h" => "400"))
    {
        //  Upload
        if ($request->hasFile($nameFile) && $request->file($nameFile)->isValid()) {
            $requestImage = $request->$nameFile;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            // Certifique-se que o diretório existe
            $directory = public_path('storage/' . $pathname);
            if (!file_exists($directory)) {
                mkdir($directory, 0777, true);
            }

            // Movendo a imagem
            $request->$nameFile->move($directory, $imageName);
            $pathFileImg = $directory . "/" . $imageName;

            // Manipulação da imagem
            if ($measure["w"] && $measure["h"]) {
                $img = ImageManagerStatic::make($pathFileImg)
                    ->fit($measure["w"], $measure["h"]);
                $img->save($pathFileImg, 90);
            }

            // Deletando o arquivo antigo
            if (!is_null($id)) {
                $file = $class::find($id);
                $imageAntiga = public_path('storage/' . $pathname) . "/" . $file->$nameFile;
                if (file_exists($imageAntiga)) {
                    unlink($imageAntiga);
                }
            }

            return $imageName;
        } else {
            // Log do erro
            Log::error("Falha ao fazer upload da imagem: arquivo inválido ou não enviado.");
            return null;
        }
    }
}
