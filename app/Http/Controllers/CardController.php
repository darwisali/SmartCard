<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Card, Santri, Tabungan};
use Session;

class CardController extends Controller
{
    public function store(Request $request){
        $uid = $request->get('UIDresult');
        $santri = Santri::where('uid', $uid)->first();
        if($santri != null)
        {
            Card::create(['uid' => $uid]);
            return response()->json($santri->nama);
        }else{
            Card::create(['uid' => $uid]);
        }
    }
}
