<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Syahriyah, Card, Santri,Tabungan,RekapSyahriyah};
use Validator;
use RealRashid\SweetAlert\Facades\Alert;

class SyahriyahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Syahriyah::all();
        $no = 1;
        return view('admin.syahriyah.index', compact('data','no'));
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
            if($data)
            {
                $tabungan = Tabungan::where('santri', $data->id)->first();
                $saldo = $tabungan->saldo;
                $tahun = date("Y");
                $syahriyah = Syahriyah::where('santri_id', $data->id)->first();
                if($data){
                    return view('admin.syahriyah.create', compact('data', 'tahun', 'syahriyah', 'saldo'));
                }else{
                    Card::truncate();
                    echo "kartu belum terdaftar";die;
                }
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
            'bulan' => 'required',
        ],[
            'bulan.required' => 'bulan tidak boleh kosong.',
        ]);

        if($validate->fails()){
            return back()->withErrors($validate->errors())->withInput();
        }else{
            Card::truncate();
            $santri = Santri::where('id', $request->santri_id)->first();
            $today = date('Y-m-d');
            if($today < $santri->masa_aktif){
                $syahriyah = RekapSyahriyah::where(['santri' => $request->santri_id, 'bulan' => $request->bulan, 'tahun' => $request->tahun])->first();
                if($syahriyah)
                {
                    if($syahriyah->status == "Lunas"){
                        if($syahriyah->bulan == $request->bulan && $syahriyah->tahun == $request->tahun && $syahriyah->status == "Lunas"){
                            Alert::error('Error', 'Pembayaran bulan '.$request->bulan.' sudah lunas');
                            return redirect()->back();
                        }
                    }else if($syahriyah->status == "Tidak Lunas"){
                        $tabungan = Tabungan::where('santri', $request->santri_id)->first();
                        if($tabungan->saldo < $request->type){
                            Alert::error('Error', 'Saldo Tidak Cukup');
                            return redirect()->back();
                        }else{
                            if($syahriyah->bulan == $request->bulan && $syahriyah->tahun == $request->tahun)
                            {
                                $saldo = $tabungan->saldo - $request->type;
                                Tabungan::where('santri', $request->santri_id)->update(['saldo' => $saldo]);
                                $syahriyah->update(['status' => 'Lunas']);
                                Syahriyah::create($request->all());
                                Alert::success('Success', 'Transaksi Berhasil');
                                Card::truncate();
                                return redirect()->route('syahriyah.index');
                            }else{
                                Card::truncate();
                                Alert::error('Error', 'Data Tidak Ada');
                                return redirect()->back();
                            }
                        }
                    }
                }else{
                    Card::truncate();
                    Alert::error('Error', 'Data Tidak Ada');
                    return redirect()->back();
                }
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
        Syahriyah::destroy($id);
        return redirect()->route('syahriyah.index');
    }
}
