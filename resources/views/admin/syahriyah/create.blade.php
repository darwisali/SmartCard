@extends('layouts.app')
@section('title', 'Create Syahriyah')
@section('contents')
        <!--  Row 1 -->
        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Transaksi Baru</h5>
              <div class="card">
                <div class="card-body">
                  <form method="post" action="{{route('syahriyah.store')}}">
                        @php
                          function rupiah($angka){
                            $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
                            return $hasil_rupiah;
                          }
                        @endphp
                    @csrf
                    <input type="text" name="santri_id" value="{{$data->id}}" hidden>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">NIS</label>
                      <input type="text" value="{{$data->nis}}" class="form-control" id="exampleInputPassword1" readonly>
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">UID</label>
                      <input type="text" value="{{$data->uid}}" class="form-control" readonly>
                      <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Nama</label>
                      <input type="text" value="{{$data->nama}}" class="form-control" id="exampleInputPassword1" readonly>
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Saldo Tabungan</label>
                      <input type="text" value="{{rupiah($saldo)}}" class="form-control" id="exampleInputPassword1" readonly>
                    </div>
                      <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Type</label>
                        <input type="text" value="{{$data->status}}" name="type" class="form-control" id="exampleInputPassword1" readonly>
                    </div>
                      <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Bulan</label>
                        <select name="bulan" class="form-control">
                            <option value="">Pilih Bulan</option>
                            <option value="January">JANUARI</option>
                            <option value="February">FEBRUARI</option>
                            <option value="March">MARET</option>
                            <option value="April">APRIL</option>
                            <option value="May">MEI</option>
                            <option value="Juny">JUNI</option>
                            <option value="July">JULY</option>
                            <option value="August">AGUSTUS</option>
                            <option value="September">SEPTEMBER</option>
                            <option value="October">OKTOBER</option>
                            <option value="November">NOVEMBER</option>
                            <option value="December">DESEMBER</option>
                        </select>
                        @error('type')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                        <small id="type-error" class="form-text text-danger"></small>
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Tahun</label>
                      <select name="tahun" id="date-dropdown" class="form-control">
                        <option selected disabled>Pilih Tahun</option>
                      </select>
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Tanggal</label>
                      <input type="text" name="tanggal" value="{{ date('Y-m-d') }}" class="form-control" id="exampleInputPassword1" readonly>
                    </div>
                    <input type="text" name="status" value="Lunas" hidden>
                    <input type="submit" class="btn btn-success" value="Save">
                    <a href="{{ route('syahriyah.index')}}" class="btn btn-danger">Cancel</a>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        @include('admin.santri.script')
        @include('admin.syahriyah.yearsScript')
        @endsection