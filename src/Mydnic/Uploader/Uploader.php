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
            // If the user is authentified, we add his id to the filename for more uniqueness
            $filename = str_replace(' ', '_', time() . Auth::id() . $file->getClientOriginalName());
        }
        else {
            $filename = str_replace(' ', '_', time() . $file->getClientOriginalName());
        }

        $uploadSuccess = $file->move($destinationPath, $filename);

        if ($returnFullPath) {
            return '/' . $folder . '/' . $filename;
        }
        
        return $filename;
    }
}
