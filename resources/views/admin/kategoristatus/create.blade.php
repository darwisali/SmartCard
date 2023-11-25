@extends('layouts.app')
@section('title', 'Create Data Santri')
@section('contents')
        <!--  Row 1 -->
        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Create Kategori Status</h5>
              <div class="card">
                <div class="card-body">
                  <form method="post" action="{{route('kategoristatus.store')}}">
                    @csrf
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Nama</label>
                      <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="exampleInputPassword1">
                        @error('nama')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Syahriyah</label>
                      <input type="text" name="syahriyah" class="form-control @error('syahriyah') is-invalid @enderror">
                        @error('syahriyah')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Pondok</label>
                      <input type="text" name="pondok" class="form-control @error('pondok') is-invalid @enderror">
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
                    <a href="{{ route('kategoristatus.index')}}" class="btn btn-danger">Cancel</a>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        @include('admin.santri.script')
        @endsection
