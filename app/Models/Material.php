<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\UnitOfIssue;
use App\Models\Status;

class Material extends Model
{
    use HasFactory;

    protected $fillable = ['part_no', 'name', 'unit_of_issue_id', 'status_id'];

    public function unit_of_issue(){
        return $this->belongsTo(UnitOfIssue::class);
    }

    public function status(){
        return $this->belongsTo(Status::class);
    }

    public function orders(){
        return $this->hasMany(Order::class);
    }

    public function balances(){
        return $this->hasMany(Balance::class);
    }
}
