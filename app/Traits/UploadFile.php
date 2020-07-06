<?php

namespace App\Traits;

trait UploadFile
{
    public function uploadFile($pathSaveFile, $name)
    {
        $file = $name;
        $fileName = time() . $file->getClientOriginalName();
        $file->move($pathSaveFile, $fileName);
        return $fileName;
    }

    public function deleteFile($pathSaveFile, $fileName)
    {
        $uriFile = $pathSaveFile . '/' . $fileName;
        if (file_exists($uriFile)) {
            unlink($uriFile);
            return true;
        } else {
            return false;
        }
    }

    public function uploadMultiFile($pathSaveFile, $name)
    {
        $files = $name;
        $gallery = [];
        foreach ($files as $key => $value)
        {
            $id = $key + 1;
            $fileName = time() . $value->getClientOriginalName();
            $value->move($pathSaveFile, $fileName);
            $galleryItem = [
                'id' => $id,
                'fileName' => $fileName,
            ];
            array_push($gallery,$galleryItem);
        }
        return json_encode($gallery);
    }

    public function uploadFileEditor($pathSaveFile, $name)
    {
        $file = $name;
        $path = $pathSaveFile.'/'.$file->getClientOriginalName();
        $file->move(public_path($pathSaveFile),$file->getClientOriginalName());
        $fileNameToStore= $path;
        return json_encode(['location' => $fileNameToStore]);
    }
}
