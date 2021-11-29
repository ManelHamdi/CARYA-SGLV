<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use App\Models\Vehicule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use SebastianBergmann\Environment\Console;

class VehiculeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehicules = Vehicule::latest()->paginate(5);

        //$photos = Photo::with('vehicule')->get();

        return view('vehicules.index', compact('vehicules'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vehicules.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'matricule' => 'required', 'prixLoc' => 'required',
            'marque' => 'required', 'dateAchat' => 'required',
            'type' => 'required', 'model' => 'required',
            'couleur' => 'required', 'disponibilite' => 'required',
            'nbrPlaces' => 'required', 'climatisation' => 'required',
            'description' => 'required', 'carburation' => 'required',
            'kilometrage' => 'required', 'puissance' => 'required',
            'boiteVitesse' => 'required', 'tailleMoteur' => 'required',
            'imageFile' => 'required',
            'imageFile.*' => 'mimes:jpeg,jpg,png,gif,csv,txt,pdf|max:2048',
        ]);

        $input = $request->all();

        Vehicule::create($input);

        if ($request->hasfile('imageFile')) {
            foreach ($request->file('imageFile') as $file) {
                $name = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path() . '/uploads/', $name);
                $fileModal = new Photo();
                $fileModal->image = $name;
                $fileModal->vehicule_matricule = $request->matricule;
                $fileModal->save();
            }
            //return back()->with('success', 'File has successfully uploaded!');
        }

        return redirect()->route('vehicules.index')
            ->with('success', 'Vehicule created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vehicule  $vehicule
     * @return \Illuminate\Http\Response
     */
    public function show(Vehicule $vehicule)
    {
        return view('vehicules.show', compact('vehicule'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vehicule  $vehicule
     * @return \Illuminate\Http\Response
     */
    public function edit(Vehicule $vehicule)
    {
        return view('vehicules.edit', compact('vehicule'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vehicule  $vehicule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vehicule $vehicule)
    {
        $request->validate([
            'matricule' => 'required', 'prixLoc' => 'required',
            'marque' => 'required', 'dateAchat' => 'required',
            'type' => 'required', 'model' => 'required',
            'couleur' => 'required', 'disponibilite' => 'required',
            'nbrPlaces' => 'required', 'climatisation' => 'required',
            'description' => 'required', 'carburation' => 'required',
            'kilometrage' => 'required', 'puissance' => 'required',
            'boiteVitesse' => 'required', 'tailleMoteur' => 'required',
        ]);

        $input = $request->all();
        $vehicule->update($input);

        if ($request->hasfile('imageFile')) {
            $images = Photo::where("vehicule_matricule", $vehicule->matricule)->get();
            foreach ($images as $img) {

                if (File::exists("uploads/" . $img->image)) {
                    File::delete("uploads/" . $img->image);
                }
                $img->delete();
            }

            foreach ($request->file('imageFile') as $file) {
                $name = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path() . '/uploads/', $name);
                $fileModal = new Photo();
                $fileModal->image = $name;
                $fileModal->vehicule_matricule = $vehicule->matricule;
                $fileModal->save();
            }
            //return back()->with('success', 'File has successfully uploaded!');
        }


        return redirect()->route('vehicules.index')
            ->with('success', 'Vehicule updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vehicule  $vehicule
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vehicule $vehicule)
    {
        $images = Photo::where("vehicule_matricule", $vehicule->matricule)->get();
        foreach ($images as $image) {
            if (File::exists("uploads/" . $image->image)) {
                File::delete("uploads/" . $image->image);
            }
        }
        $vehicule->delete();

        return redirect()->route('vehicules.index')
            ->with('success', 'Vehicule deleted successfully');
    }




    public function getPhotos($vehicule_matricule)
    {
        // Passing vehicule matricule into find()
        return Vehicule::find($vehicule_matricule)->photos;
    }
    /*
    public function getVehicule($photo_id)
    {
        // Passing photo id into find()
        return Photo::find($photo_id)->vehicule;
    }
    */
}
