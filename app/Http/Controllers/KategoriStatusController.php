<?php

namespace App\Http\Controllers;

use App\Models\KategoriStatus;
use Illuminate\Http\Request;
use Validator;
use RealRashid\SweetAlert\Facades\Alert;

class KategoriStatusController extends Controller
{
    public function index()
    {
        $data = KategoriStatus::all();
        // dd($data);
        // $sntri = Santri::where("uid", "6521080A")->first();
        return view('admin.kategoristatus.index', compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kategoristatus.create');
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
            'nama' => 'required',
            'syahriyah' => 'required|numeric',
            'pondok' => 'required|numeric',
            'diniyah' => 'required|numeric',
        ],[
            'nama.required' => 'Nama tidak boleh kosong.',
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
            KategoriStatus::create([
                'nama' => $request->nama,
                'syahriyah' => $request->syahriyah,
                'pondok' => $request->pondok,
                'diniyah' => $request->diniyah,
            ]);
            Alert::success('Success', 'Data Kategori Status Berhasil Di-Tambahkan');
            return redirect()->route('kategoristatus.index');
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
        $data = KategoriStatus::where('id', $id)->first();
        return view('admin.kategoristatus.edit', compact('data'));
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
            'nama' => 'required',
            'syahriyah' => 'required|numeric',
            'pondok' => 'required|numeric',
            'diniyah' => 'required|numeric',
        ],[
            'nama.required' => 'Nama tidak boleh kosong.',
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
            KategoriStatus::find($id)->update([
                'nama' => $request->nama,
                'syahriyah' => $request->syahriyah,
                'pondok' => $request->pondok,
                'diniyah' => $request->diniyah,
            ]);
            Alert::success('Success', 'Data Kategori Status Berhasil Di-Update');
            return redirect()->route('kategoristatus.index');
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
        $k_status = KategoriStatus::findOrFail($id);

        $k_status->delete();
    }
}
