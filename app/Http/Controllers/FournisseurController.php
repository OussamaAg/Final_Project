<?php

namespace App\Http\Controllers;

use App\fournisseur;
use Illuminate\Http\Request;

class FournisseurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexFournisseur()
    {
        $fournisseurs = fournisseur::all()->sortBy('nom');
        return view('fournisseurviews/fournisseur',['fournisseurs'=>$fournisseurs,'layout'=>'indexFournisseur']);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createFournisseur()
    {
        $fournisseurs = fournisseur::all();
        return view('fournisseurviews.fournisseur',['fournisseurs'=>$fournisseurs,'layout'=>'createFournisseur']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeFournisseur(Request $request)
    {

        $data = $request->validate([
            'nom_fournisseur' => 'required',
            'adresse_fournisseur'    => 'required',
            'compte_bancaire'     => 'required',
            'telephone'     => 'required',
        ]);

        $fournisseurs = fournisseur::all();
        $fournisseur = new fournisseur();
        $fournisseur->nom = $request->input('nom_fournisseur');
        $fournisseur->adresse = $request->input('adresse_fournisseur');
        $fournisseur->compte_banc = $request->input('compte_bancaire');
        $fournisseur->tel = $request->input('telephone');
        $fournisseur->save();
        return redirect('/fournisseurviews/fournisseurlist');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editFournisseur($id)
    {
        $fournisseur = fournisseur::find($id);
        $fournisseurs = fournisseur::all();
        return view('fournisseurviews/fournisseur',['fournisseurs'=>$fournisseurs,'fournisseur'=>$fournisseur,'layout'=>'editFournisseur']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateFournisseur(Request $request, $id)
    {
        $fournisseur = fournisseur::find($id);
        $fournisseur->nom = $request->input('nom');
        $fournisseur->adresse = $request->input('adresse');
        $fournisseur->compte_banc = $request->input('compte_banc');
        $fournisseur->tel = $request->input('tel');
        $fournisseur->save();
        return redirect('/fournisseurviews/fournisseurlist');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyFournisseur($id)
    {
        $fournisseur = fournisseur::find($id);
        $fournisseur->delete();
        return redirect('/fournisseurviews/fournisseurlist');
    }

    public function searchFournisseur(Request $request){
        $search = $request->get('search');
        $fournisseurs = fournisseur::where('nom','like', '%'.$search.'%')->get();
        return view('fournisseurviews/searchfournisseur',['fournisseurs' => $fournisseurs]);
    }
}
