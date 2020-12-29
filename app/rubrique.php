<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\facture;

class rubrique extends Model
{
    protected $primaryKey = 'id_rubrique';
    
   public function facture(){
        
        return $this->hasMany(facture::class);
    }

    protected $table = 'rubriques';
    protected $guarded = [];
}
