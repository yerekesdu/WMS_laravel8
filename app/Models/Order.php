<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['order_no', 'district_id', 'material_part_no', 'price', 'qty', 'user_id'];

    public function district(){
        return $this->belongsTo(District::class);
    }

    public function material(){
        return $this->belongsTo(Material::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
