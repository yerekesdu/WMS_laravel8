<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Whouse extends Model
{
    use HasFactory;

    protected $fillable = ['code', 'name', 'district_id', 'status_id'];

    public function status(){
        return $this->belongsTo(Status::class);
    }

    public function district(){
        return $this->belongsTo(District::class);
    }

    public function balances(){
        return $this->hasMany(Balance::class);
    }
}
