<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TranType extends Model
{
    use HasFactory;

    protected $fillable = ['code', 'description'];

    public function transactions(){
        return $this->hasMany(Transaction::class);
    }
}
