@extends('layouts.app')
@section('contents')
        <!--  Row 1 -->
        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Edit Data Santri</h5>
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
                      <select name="status" class="form-control">
                            <option value="">Pilih Status</option>
                            @foreach($kategori as $k)
                            <option @if($k->id == $data->status) selected @endif value="{{ $k->id }}">{{ $k->nama }}</option>
                            @endforeach
                      </select>
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
                    <input type="submit" class="btn btn-primary" value="Save">
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        @include('admin.santri.script')
        @endsection