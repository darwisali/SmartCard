<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Registrasi, Card, Santri,Tabungan,RekapRegistrasi};
use Validator;
use RealRashid\SweetAlert\Facades\Alert;

class RegistrasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Registrasi::all();
        $no = 1;
        return view('admin.registrasi.index', compact('data','no'));
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
                $registrasi = Registrasi::where('santri_id', $data->id)->first();
                if($data){
                    return view('admin.registrasi.create', compact('data', 'tahun', 'registrasi', 'saldo'));
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
            'semester' => 'required',
            'tahun' => 'required',
            'tanggal' => 'required',
            'status' => 'required',
        ],[
            'semester.required' => 'semester tidak boleh kosong.',
            'tahun.required' => 'tahun tidak boleh kosong.',
            'tanggal.required' => 'tanggal tidak boleh kosong.',
            'status.required' => 'status tidak boleh kosong.',
        ]);

        if($validate->fails()){
            return back()->withErrors($validate->errors())->withInput();
        }else{
            Card::truncate();
            $santri = Santri::where('id', $request->santri_id)->first();
            $today = date('Y-m-d');
            if($today < $santri->masa_aktif){
                $registrasi = RekapRegistrasi::where(['santri' => $request->santri_id, 'semester' => $request->semester, 'tahun' => $request->tahun])->first();
                if($registrasi)
                {
                    if($registrasi->status == "Lunas"){
                        if($registrasi->semester == $request->semester && $registrasi->tahun == $request->tahun && $registrasi->status == "Lunas"){
                            Alert::error('Error', 'Pembayaran semester '.$request->semester.' sudah lunas');
                            return redirect()->back();
                        }
                    }else if($registrasi->status == "Tidak Lunas"){
                        $tabungan = Tabungan::where('santri', $request->santri_id)->first();
                        if($tabungan->saldo < $request->nominal){
                            Alert::error('Error', 'Saldo Tidak Cukup');
                            return redirect()->back();
                        }else{
                            if($registrasi->semester == $request->semester && $registrasi->tahun == $request->tahun)
                            {
                                $saldo = $tabungan->saldo - $request->type;
                                Tabungan::where('santri', $request->santri_id)->update(['saldo' => $saldo]);
                                $registrasi->update(['status' => 'Lunas']);
                                Registrasi::create($request->all());
                                Alert::success('Success', 'Transaksi Berhasil');
                                Card::truncate();
                                return redirect()->route('registrasi.index');
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
        Registrasi::destroy($id);
        return redirect()->route('registrasi.index');
    }
}
