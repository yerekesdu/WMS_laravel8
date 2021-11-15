<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Material;

class UnitOfIssue extends Model
{
    use HasFactory;

    protected $fillable = ['code', 'description'];

    public function materials(){
        return $this->hasMany(Material::class);
    }
}
