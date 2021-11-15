<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Balance extends Model
{
    use HasFactory;

    protected $fillable = ['district_id', 'whouse_id', 'material_id', 'soh'];

    public function district(){
        return $this->belongsTo(District::class);
    }

    public function whouse(){
        return $this->belongsTo(Whouse::class);
    }

    public function material(){
        return $this->belongsTo(Material::class);
    }
}
