@extends('layouts.app')
@section('contents')
        <!--  Row 1 -->
        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Edit Kategori Status</h5>
              <div class="card">
                <div class="card-body">
                  <form method="post" action="{{route('kategoristatus.update', $data->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Nama</label>
                      <input value="{{$data->nama}}" type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="exampleInputPassword1">
                        @error('nama')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Syahriyah</label>
                      <input value="{{$data->syahriyah}}" type="text" name="syahriyah" class="form-control @error('syahriyah') is-invalid @enderror" id="exampleInputPassword1">
                        @error('syahriyah')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div><div class="mb-3">
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Pondok</label>
                      <input value="{{$data->pondok}}" type="text" name="pondok" class="form-control @error('pondok') is-invalid @enderror" id="exampleInputPassword1">
                        @error('pondok')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div><div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Diniyah</label>
                      <input value="{{$data->diniyah}}" type="text" name="diniyah" class="form-control @error('diniyah') is-invalid @enderror" id="exampleInputPassword1">
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
        @endsection
