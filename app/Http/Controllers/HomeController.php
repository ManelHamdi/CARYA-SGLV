<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:employe');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // nbr v dispo
        // nbr v en location
        // nbr v en panne
        // nbr v en reparation
        // v dispo / jour
        // nbr v / client
        // lst tbl en retour aujourd'hui
        // visite technique proche
        // DB::table('users')->count();
        $vdispo = DB::table('vehicules')->where('disponibilite', 1)->count();
        $vlocation = DB::table('contrats')->count();
        $nbrv = DB::table('vehicules')->count();

        return view('dashboard', ['vdispo' => $vdispo, 'vlocation' => $vlocation, 'nbrv' => $nbrv]);
    }
}
