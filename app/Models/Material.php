<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    //protected $keyType = 'bigint';


    public function quantity(){
        return $this->hasMany(MaterialsInventory::class);
    }
}
