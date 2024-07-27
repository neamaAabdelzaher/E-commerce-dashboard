<?php  
namespace App\Traits;

Trait Files{


    public static function uploadFile($file,string $path):string{
       
        $fileExtension = $file->extension();
        $fileName = uniqid() . '.' . $fileExtension;
        $file->move(public_path($path), $fileName);

        return $fileName;
    }


    public static function DeleteFile(string $path):bool{

    $oldFilePath=public_path($path);

        if(file_exists($oldFilePath)){
            unlink($oldFilePath);
            return true;
          }
          return false;
    }
}




?>