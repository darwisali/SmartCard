@extends('layouts.app')
@section('title', 'Create Data Santri')
@section('contents')
        <!--  Row 1 -->
        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Forms</h5>
              <div class="card">
                <div class="card-body">
                  <form method="post" action="{{route('santribaru.store')}}">
                    @csrf
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">NIS</label>
                      <input type="text" name="nis" class="form-control @error('nis') is-invalid @enderror" id="exampleInputPassword1">
                        @error('nis')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    @if($uid)
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">UID</label>
                      <input type="text" name="uid" value="{{$uid->uid}}" class="form-control" readonly>
                        @error('uid')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                      <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    @else
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">UID</label>
                      <input type="text" name="uid" class="form-control" readonly placeholder="Scan your rfid card">
                        @error('uid')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                      <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    @endif
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Nama</label>
                      <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"  id="exampleInputPassword1">
                        @error('nama')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Status</label>
                        <select name="status" class="form-control @error('status') is-invalid @enderror">
                            <option value="">Pilih Status</option>
                            <option value="250000">Normal - Rp. 250.000</option>
                            <option value="210000">Saudara - Rp. 210.000</option>
                            <option value="125000">Kembar- Rp. 125.000</option>
                            <option value="45000">Yatim- Rp. 45.000</option>
                        </select>
                        @error('type')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                        <small id="type-error" class="form-text text-danger"></small>
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Pendaftaran</label>
                      <input type="text" name="pendaftaran" class="form-control @error('pendaftaran') is-invalid @enderror" id="exampleInputPassword1">
                        @error('pendaftaran')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Infaq</label>
                      <input type="text" name="infaq" class="form-control @error('infaq') is-invalid @enderror" id="exampleInputPassword1">
                        @error('infaq')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Posaba</label>
                      <input type="text" name="posaba" class="form-control @error('posaba') is-invalid @enderror" id="exampleInputPassword1">
                        @error('posaba')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Kartu Santri</label>
                      <input type="text" name="kartu_santri" class="form-control @error('nis') is-invalid @enderror" id="exampleInputPassword1">
                        @error('kartu_santri')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Seragam</label>
                      <input type="text" name="seragam" class="form-control @error('seragam') is-invalid @enderror" id="exampleInputPassword1">
                        @error('seragam')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Syahriyah</label>
                      <input type="text" name="syahriyah" class="form-control @error('syahriyah') is-invalid @enderror" id="exampleInputPassword1">
                        @error('syahriyah')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Pondok</label>
                      <input type="text" name="pondok" class="form-control @error('pondok') is-invalid @enderror" id="exampleInputPassword1">
                        @error('pondok')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Diniyah</label>
                      <input type="text" name="diniyah" class="form-control @error('diniyah') is-invalid @enderror" id="exampleInputPassword1">
                        @error('diniyah')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <input type="submit" class="btn btn-success" value="Save">
                    <a href="{{ route('santri.index')}}" class="btn btn-danger">Cancel</a>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        @include('admin.santri.script')
        @endsection