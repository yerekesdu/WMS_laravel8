<?php

namespace App\Http\Controllers;

use App\Models\Balance;
use Illuminate\Http\Request;

class BalanceController extends Controller
{
    public function index(){
        $balances = Balance::all();
        return view('balances.index', compact('balances'));
    }
}
