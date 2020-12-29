<?php

namespace App\Http\Controllers;

use App\facture;
use App\fournisseur;
use App\rubrique;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class FactureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexFacture()
    {
        $factures = facture::all()->sortBy('num_facture');
        return view('factureviews/facture',['factures'=>$factures,'layout'=>'indexFacture']);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createFacture()
    {
        $factures= facture::all();
        return view('factureviews.facture',['factures' => $factures,'layout' => 'createFacture']);
    }
        /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeFacture(Request $request)
    {
        $id_rub = $request->input('id_rub');
        $rubrique = rubrique::find($id_rub);
        $data = $request->validate([
            'id_rub' => 'required|exists:rubriques,id_rubrique',
            'num_facture'    => 'required',
            'montant_facture'     => 'required|max:'.$rubrique->disponible.'',
            'id_four'     => 'required|exists:fournisseurs,id',
            'date_emiss' => 'nullable|date',
            'date_recep' => 'nullable|date',
            'date_paie' => 'nullable|date',
        ]);
        
        //get the 'rubrique montant's
        
        $montant = $rubrique->disponible - $request->input('montant_facture');
        $rubrique->update(['disponible' => $montant]);
        $facture = facture::create($request->only(
            'num_facture', 'montant_facture' , 'date_emiss'
            ,'date_recep','date_paie','id_four', 'id_rub'
        ));
        return redirect('factureviews/facturelist');

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
    public function editFacture($id)
    {
        $facture = facture::find($id);
        $factures = facture::all();
        return view('factureviews/facture',['factures'=>$factures,'facture'=>$facture,'layout'=>'editFacture']);
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateFacture(Request $request, $id)
    {
        
        $facture = facture::find($id);

        $facture->update($request->only(
            'date_emiss',
            'date_recep',
            'date_paie'
        ));
        return redirect('factureviews/facturelist');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  

    public function destroyFacture(Request $request, $id){
        $facture = facture::find($id);
        $id_rub= $facture->id_rub;
        $rubrique = rubrique::find($id_rub);
        $montant =  $rubrique->disponible + $facture->montant_facture;
        $rubrique->update(['disponible' => $montant]);
        $facture->delete();
        return redirect('factureviews/facturelist');
    }

    public function searchFacture(Request $request){
        $search = $request->get('search');
        $facture = facture::all();
        // $factures = facture::where('nom','like', '%'.$search.'%')->orderBy('id')->get();
        $factures = facture::join('fournisseurs','fournisseurs.id','=','factures.id_four')->where('nom','like', '%'.$search.'%')->orderBy('fournisseurs.id')->get();
        return view('factureviews/searchfacture',['facture' => $facture,'factures' => $factures ]);
    }

    

    public function download_pdf(){

        $app = App::make('dompdf.wrapper');
        $factures = facture::all();
        $pdf = PDF::loadView('list_facture_pdf',['factures' => $factures]);
        return $pdf->stream();
    }
}
