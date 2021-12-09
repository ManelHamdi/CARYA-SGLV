<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class PhotoController extends Controller
{

    public function addPhoto($matricule, $file)
    {
        $contents = $file->openFile()->fread($file->getSize());
        $fileModal = new Photo();
        $fileModal->vehicule_matricule = $matricule;
        $fileModal->image = $contents;
        $fileModal->save();
    }

    public function getVehicule($photo_id)
    {
        // Passing photo id into find()
        return Photo::find($photo_id)->vehicule;
    }
}
