<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Santri;
use App\Models\SantriBaru;
use App\Models\Tabungan;
use App\Models\RekapSyahriyah;
use App\Models\RekapRegistrasi;
use App\Models\Card;
use Validator;
use RealRashid\SweetAlert\Facades\Alert;


class SantriBaruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = SantriBaru::all();
        // dd($data);
        // $sntri = Santri::where("uid", "6521080A")->first();
        $card = Card::all();
        $no = 1;
        Card::truncate();
        return view('admin.santribaru.index', compact('data','no'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $uid = Card::first();
        if($uid)
        {
            return view('admin.santribaru.create', compact('uid'));
        }else{
            return view('admin.santribaru.scan');
        }
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
            'nis' => 'required|numeric',
            'uid' => 'required',
            'nama' => 'required',
            'pendaftaran' => 'required|numeric',
            'infaq' => 'required|numeric',
            'posaba' => 'required|numeric',
            'kartu_santri' => 'required|numeric',
            'seragam' => 'required|numeric',
            'syahriyah' => 'required|numeric',
            'pondok' => 'required|numeric',
            'diniyah' => 'required|numeric',
        ],[
            'nis.required' => 'NIS tidak boleh kosong.',
            'nis.numeric' => 'NIS harus berupa angka.',
            'uid.required' => 'Scan Kartu Anda.',
            'nama.required' => 'Nama tidak boleh kosong.',
            'status.required' => 'Status tidak boleh kosong.',
            'pendaftaran.required' => 'Pendaftaran tidak boleh kosong.',
            'pendaftaran.numeric' => 'Pendaftaran harus berupa angka.',
            'infaq.required' => 'Infaq tidak boleh kosong.',
            'infaq.numeric' => 'Infaq harus berupa angka.',
            'posaba.required' => 'Posaba tidak boleh kosong.',
            'posaba.numeric' => 'Posaba harus berupa angka.',
            'kartu_santri.required' => 'Kartu Santri tidak boleh kosong.',
            'kartu_santri.numeric' => 'Kartu Santri harus berupa angka.',
            'seragam.required' => 'Seragam tidak boleh kosong.',
            'seragam.numeric' => 'Seragam harus berupa angka.',
            'syahriyah.required' => 'Syahriyah tidak boleh kosong.',
            'syahriyah.numeric' => 'Syahriyah harus berupa angka.',
            'pondok.required' => 'Pondok tidak boleh kosong.',
            'pondok.numeric' => 'Pondok harus berupa angka.',
            'diniyah.required' => 'Diniyah tidak boleh kosong.',
            'diniyah.numeric' => 'Diniyah harus berupa angka.',
        ]);

        if($validate->fails()){
            return back()->withErrors($validate->errors())->withInput();
          }else{
            $uid = Santri::where('uid', $request->uid)->first();
            if($uid){
                Card::truncate();
                Alert::error('Error', 'UID sudah terdaftar');
                return redirect()->back();
            }else{
                date_default_timezone_set('Asia/Jakarta');
                $masa_aktif = date('Y-m-d', strtotime('+ 1 years'));
                SantriBaru::create([
                    'nis' => $request->nis,
                    'uid' => $request->uid,
                    'nama' => $request->nama,
                    'status' => $request->status,
                    'masa_aktif' => $masa_aktif,
                    'pendaftaran' => $request->pendaftaran,
                    'infaq' => $request->infaq,
                    'posaba' => $request->posaba,
                    'kartu_santri' => $request->kartu_santri,
                    'seragam' => $request->seragam,
                    'syahriyah' => $request->syahriyah,
                    'pondok' => $request->pondok,
                    'diniyah' => $request->diniyah,

                ]);
                $data = Santri::all()->count();
                if($data == 0)
                {
                    $data += 1;
                }else{
                    $data = $data;
                }
                Santri::create(['nis' => $request->nis, 'uid' => $request->uid, 'nama' => $request->nama, 'status' => $request->type, 'masa_aktif' => $masa_aktif]);
                Tabungan::create(['santri'=>$data, 'saldo_awal' => 0, 'saldo' => 0]);
                RekapSyahriyah::create(['santri'=>$data, 'bulan' => date('F'), 'tahun' => date('Y'), 'status' => 'Tidak Lunas']);
                RekapRegistrasi::create(['santri'=>$data, 'semester' => "genap", 'tahun' => date('Y'), 'status' => 'Tidak Lunas']);
                Card::truncate();
                Alert::success('Success', 'Data Santri Berhasil Ditambahkan');
                return redirect()->route('santribaru.index');
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
        $data = Santri::where('id',$id)->first();
        $syahriyah = RekapSyahriyah::where('santri', $data->id)->first();
        $tabungan = Tabungan::where('santri',$data->id)->first();
        return view('admin.santribaru.show', compact('data', 'tabungan', 'syahriyah'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Santri::where('id', $id)->first();
        return view('admin.santribaru.edit', compact('data'));
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
        $validate = Validator::make($request->all(), [
            'nis' => 'required|numeric',
            'uid' => 'required',
            'nama' => 'required',
            'status' => 'required',
            'masa_aktif' => 'required',
            'pendaftaran' => 'required|numeric',
            'infaq' => 'required|numeric',
            'posaba' => 'required|numeric',
            'kartu_santri' => 'required|numeric',
            'seragam' => 'required|numeric',
            'syahriyah' => 'required|numeric',
            'pondok' => 'required|numeric',
            'diniyah' => 'required|numeric',
        ],[
            'nis.required' => 'NIS tidak boleh kosong.',
            'nis.numeric' => 'NIS harus berupa angka.',
            'uid.required' => 'Scan Kartu Anda.',
            'nama.required' => 'Nama tidak boleh kosong.',
            'status.required' => 'Status tidak boleh kosong.',
            'masa_aktif.required' => 'Masa Aktif tidak boleh kosong.',
            'pendaftaran.required' => 'Pendaftaran tidak boleh kosong.',
            'pendaftaran.numeric' => 'Pendaftaran harus berupa angka.',
            'infaq.required' => 'Infaq tidak boleh kosong.',
            'infaq.numeric' => 'Infaq harus berupa angka.',
            'posaba.required' => 'Posaba tidak boleh kosong.',
            'posaba.numeric' => 'Posaba harus berupa angka.',
            'kartu_santri.required' => 'Kartu Santri tidak boleh kosong.',
            'kartu_santri.numeric' => 'Kartu Santri harus berupa angka.',
            'seragam.required' => 'Seragam tidak boleh kosong.',
            'seragam.numeric' => 'Seragam harus berupa angka.',
            'syahriyah.required' => 'Syahriyah tidak boleh kosong.',
            'syahriyah.numeric' => 'Syahriyah harus berupa angka.',
            'pondok.required' => 'Pondok tidak boleh kosong.',
            'pondok.numeric' => 'Pondok harus berupa angka.',
            'diniyah.required' => 'Diniyah tidak boleh kosong.',
            'diniyah.numeric' => 'Diniyah harus berupa angka.',
        ]);

        if($validate->fails()){
            return back()->withErrors($validate->errors())->withInput();
          }else{
            Santri::find($id)->update($request->all());
            Alert::success('Success', 'Data Santri Berhasil Di-Update');
            return redirect()->route('santri.index');
          }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $santri = Santri::findOrFail($id);

        $santri->delete();
    }
}
