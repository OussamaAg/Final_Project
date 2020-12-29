<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class fournisseur extends Model
{
    public function facture(){
        return $this->hasMany(facture::class);
    }

    protected $table = 'fournisseurs';
}
