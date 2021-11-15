<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    use HasFactory;

    protected $fillable = ['request_no', 'district_id', 'request_type_id', 'whouse_from', 'whouse_to',
        'material_part_no', 'quantity_req', 'quantity_issued', 'request_status_id', 'user_id', 'district_id_to'];

    public function district(){
        return $this->belongsTo(District::class);
    }

    public function request_type(){
        return $this->belongsTo(RequestType::class);
    }

    public function request_status(){
        return $this->belongsTo(RequestStatus::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
