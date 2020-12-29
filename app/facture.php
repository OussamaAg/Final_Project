<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use App\rubrique;

class facture extends Model
{
    protected $guarded = [];

    public function rubrique(){

        return $this->belongsTo(rubrique::class,'id_rub');
    }

    public function fournisseur(){
        return $this->belongsTo(fournisseur::class, 'id_four');
    }
}
