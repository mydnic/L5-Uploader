<?php namespace Mydnic\Uploader;

use Illuminate\Support\Facades\Auth;

class Uploader {

    public static function upload($file, $returnFullPath = false, $folder = null)
    {
        if ($folder == null) {
            $folder = 'uploads';
        }

        $destinationPath = public_path().'/'.$folder.'/';

        if (Auth::check()) {
            $filename = str_replace(' ', '_', str_random(20) . Auth::id() . $file->getClientOriginalName());
        }
        else {
            $filename = str_replace(' ', '_', str_random(20) . $file->getClientOriginalName());
        }

        $uploadSuccess = $file->move($destinationPath, $filename);

        if ($returnFullPath) {
            return '/' . $folder . '/' . $filename;
        }
        
        return $filename;
    }
}
