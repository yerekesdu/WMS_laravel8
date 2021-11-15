<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Status;

class District extends Model
{
    use HasFactory;
    protected $fillable = ['code', 'name', 'status_id'];

    public function status(){
        return $this->belongsTo(Status::class);
    }

    public function orders(){
        return $this->hasMany(Order::class);
    }

    public function requests(){
        return $this->hasMany(Request::class);
    }

    public function balances(){
        return $this->hasMany(Balance::class);
    }
}
