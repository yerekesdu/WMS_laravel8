<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestStatus extends Model
{
    use HasFactory;

    protected $fillable = ['code', 'description'];

    public function Requests(){
        return $this->hasMany(Request::class);
    }
}
