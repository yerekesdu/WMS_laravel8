<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = ['tran_type_id', 'district_id', 'request_id', 'whouse_id', 'material_id', 'quantity', 'user_id'];

    public function tran_type(){
        return $this->belongsTo(TranType::class);
    }

    public function district(){
        return $this->belongsTo(District::class);
    }

    public function request(){
        return $this->belongsTo(Request::class);
    }

    public function whouse(){
        return $this->belongsTo(Whouse::class);
    }

    public function material(){
        return $this->belongsTo(Material::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
