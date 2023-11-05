@extends('layouts.app')
@section('contents')
        <!--  Row 1 -->
        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Edit Data Santri Baru</h5>
              <div class="card">
                <div class="card-body">
                  <form method="post" action="{{route('santri.update', $data->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">NIS</label>
                      <input value="{{$data->nis}}" type="text" name="nis" class="form-control" id="exampleInputPassword1">
                        @error('nis')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">UID</label>
                      <input type="text" name="uid" value="{{$data->uid}}" class="form-control" readonly>
                        @error('uid')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Nama</label>
                      <input value="{{$data->nama}}" type="text" name="nama" class="form-control" id="exampleInputPassword1">
                        @error('nama')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div><div class="mb-3">
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Status</label>
                      <input value="{{$data->status}}" type="text" name="status" class="form-control" id="exampleInputPassword1">
                        @error('status')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div><div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Masa Aktif</label>
                      <input value="{{$data->masa_aktif}}" type="text" name="masa_aktif" class="form-control" id="exampleInputPassword1">
                        @error('masa_aktif')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    </div><div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Pendaftaran</label>
                      <input value="{{$data->pendaftaran}}" type="text" name="masa_aktif" class="form-control" id="exampleInputPassword1">
                        @error('pendaftaran')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    </div><div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Infaq</label>
                      <input value="{{$data->infaq}}" type="text" name="masa_aktif" class="form-control" id="exampleInputPassword1">
                        @error('infaq')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    </div><div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Posaba</label>
                      <input value="{{$data->posaba}}" type="text" name="masa_aktif" class="form-control" id="exampleInputPassword1">
                        @error('posaba')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    </div><div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Kartu Santri</label>
                      <input value="{{$data->kartu_santri}}" type="text" name="masa_aktif" class="form-control" id="exampleInputPassword1">
                        @error('kartu_santri')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    </div><div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Seragam</label>
                      <input value="{{$data->seragam}}" type="text" name="masa_aktif" class="form-control" id="exampleInputPassword1">
                        @error('seragam')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    </div><div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Syahriyah</label>
                      <input value="{{$data->syahriyah}}" type="text" name="masa_aktif" class="form-control" id="exampleInputPassword1">
                        @error('syahriyah')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    </div><div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Pondok</label>
                      <input value="{{$data->pondok}}" type="text" name="masa_aktif" class="form-control" id="exampleInputPassword1">
                        @error('pondok')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    </div><div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Diniyah</label>
                      <input value="{{$data->diniyah}}" type="text" name="masa_aktif" class="form-control" id="exampleInputPassword1">
                        @error('diniyah')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <input type="submit" class="btn btn-primary" value="Save">
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        @include('admin.santri.script')
        @endsection