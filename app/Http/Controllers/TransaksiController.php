<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Transaksi, Card, Santri, Tabungan};
use Validator;
use RealRashid\SweetAlert\Facades\Alert;


class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Transaksi::all();
        $no = 1;
        Card::truncate();
        return view('admin.transaksi.index', compact('data','no'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $card = Card::first();
        if($card){
            $data = Santri::where('uid', $card->uid)->first();
            if($data){
                $tabungan = Tabungan::where('santri', $data->id)->first();
                $saldo = $tabungan->saldo;
                return view('admin.transaksi.create', compact('data', 'saldo'));
            }else{
                Card::truncate();
                echo "kartu belum terdaftar";die;
            }
        }
        return view('admin.transaksi.scan');


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'type' => 'required',
            'nominal' => 'required|numeric',
        ],[
            'type.required' => 'type tidak boleh kosong.',
            'nominal.numeric' => 'nominal harus berupa angka.',
            'nominal.required' => 'nominal tidak boleh kosong.',
        ]);

        if($validate->fails()){
            return back()->withErrors($validate->errors())->withInput();
          }else{
            Card::truncate();
            $santri = Santri::where('id', $request->santri_id)->first();
            $today = date('Y-m-d');
            if($today < $santri->masa_aktif){
                $tabungan = Tabungan::where('santri', $request->santri_id)->first();
            if($tabungan){
                if($request->type == "debit"){
                    $saldo_awal = $tabungan->saldo;
                    $saldo = $tabungan->saldo + $request->nominal;
                    $debit = $request->nominal;
                    Transaksi::create($request->all());
                    Tabungan::where('id', $tabungan->id)->update(['debit'=> $debit, 'saldo'=>$saldo, 'saldo_awal'=>$saldo_awal]);
                }else if($request->type == "kredit"){
                    if($tabungan->saldo < $request->nominal){
                        Alert::error('Error', 'Saldo Tidak Cukup');
                        return redirect()->back();
                        // return redirect()->route('transaksi.index');
                    }else if($tabungan->saldo >= $request->nominal){
                        $saldo_awal = $tabungan->saldo;
                        $saldo = $tabungan->saldo - $request->nominal;
                        $kredit = $request->nominal;
                        Transaksi::create($request->all());
                        Tabungan::where('id', $tabungan->id)->update(['kredit'=> $kredit, 'saldo'=>$saldo, 'saldo_awal'=>$saldo_awal]);
                        Alert::success('Success', 'Transaksi Berhasil');
                        return redirect()->route('transaksi.index');
                    }
                }
            }else{
                Alert::error('Error', 'Kartu Belum Terdaftar');
                return redirect()->back();
            }
            return redirect()->route('transaksi.index');
            }else{
                Alert::error('Error', 'Masa Aktif Sudah Habis');
                return redirect()->back();
            }
          }
            
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transaksi = Transaksi::findOrFail($id);

        $santri->delete();
        
    }
}
