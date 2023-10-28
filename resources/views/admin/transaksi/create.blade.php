@extends('layouts.app')
@section('title', 'Create Transaksi Tabungan')
@section('contents')
        <!--  Row 1 -->
        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Transaksi Baru</h5>
              <div class="card">
                <div class="card-body">
                  <form method="post" action="{{route('transaksi.store')}}">
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
                    </div><div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Saldo</label>
                      <input type="text" value="{{rupiah($saldo)}}" class="form-control" id="exampleInputPassword1" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Transaksi</label>
                        <select name="type" class="form-control">
                            <option value="">Pilih Transaksi</option>
                            <option value="debit">DEBIT</option>
                            <option value="kredit">KREDIT</option>
                        </select>
                        @error('type')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                        <small id="type-error" class="form-text text-danger"></small>
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Nominal</label>
                      <input type="text" data-type="currency" name="nominal" class="form-control" id="exampleInputPassword1">
                        @error('nominal')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Tanggal</label>
                      <input type="text" name="tanggal" value="{{ date('Y-m-d') }}" class="form-control" id="exampleInputPassword1" readonly>
                    </div>
                    <input type="submit" class="btn btn-success" value="Save">
                    <a href="{{ route('transaksi.index')}}" class="btn btn-danger">Cancel</a>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        @include('admin.santri.script')
        @endsection