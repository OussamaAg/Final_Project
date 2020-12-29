<?php

namespace App\Http\Controllers;


use App\rubrique;
use Illuminate\Http\Request;
use Ramsey\Uuid\Type\Integer;
use Illuminate\Support\Facades\DB;

class rubriqueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //affichage d'ensemble des rubriques
    public function index()
    {
        $rubriques = rubrique::all()->sortBy('intitule');;
        return view('rubriquelist',['rubriques'=>$rubriques,'layout'=>'index']);
    }

    //pour la recherche d'une rubrique 
    public function search(Request $request){
        $search = $request->get('search');
        $rubriques = rubrique::where('intitule','like', '%'.$search.'%')->get();
        return view('searchrubrique',['rubriques' => $rubriques]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rubriques = rubrique::all();
        return view('rubrique',['rubriques'=>$rubriques,'layout'=>'create']);
    }

        /*
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $this->validate($request,[
            'id_rubrique' => 'required|unique:rubriques',
            'intitule' => 'required|string|max:255',
            'montant' => 'required',
            'Annee' => 'required|integer',
        ]);
        
        $rubrique= new rubrique();
        $rubrique->id_rubrique = $request->input('id_rubrique');
        $rubrique->intitule = $request->input('intitule');
        $rubrique->montant = $request->input('montant');
        $rubrique->disponible = $request->input('montant');
        $rubrique->Annee= $request->input('Annee');
        $rubrique->save();
        return redirect('/rubriquelist'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rubrique =  rubrique::find($id);
        $rubriques = rubrique::all();
        return view('rubrique',['rubriques'=>$rubriques,'rubrique'=>$rubrique,'layout'=>'show']);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_rubrique)
    {   
        $rubrique=rubrique::find($id_rubrique);
        return view('/rubrique',['rubrique'=>$rubrique,'layout'=>'edit']);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request , $id_rubrique)
    {
        $data = $request->validate([
            'id_rubrique' => 'required',
            'intitule'    => 'required',
            'montant'     => 'required',
            'disponible'     => 'required',
            'Annee'     => 'required',
        ]);

        $rubrique = rubrique::find($id_rubrique);
        $rubrique->id_rubrique = $request->input('id_rubrique');
        $rubrique->intitule = $request->input('intitule');
        $rubrique->montant = $request->input('montant');
        $rubrique->disponible = $request->input('disponible');
        $rubrique->Annee = $request->input('Annee');
        $rubrique->save();
        return redirect('/rubriquelist'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_rubrique)
    {
        $rubrique = rubrique::find($id_rubrique);
        $rubrique->delete();
        return redirect('/rubriquelist');
    }
    }
