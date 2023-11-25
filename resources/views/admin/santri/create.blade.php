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
                  <form method="post" action="{{route('santri.store')}}">
                    @csrf
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">NIS</label>
                      <input type="text" name="nis" class="form-control" id="exampleInputPassword1">
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
                      <input type="text" name="nama" class="form-control" id="exampleInputPassword1">
                        @error('nama')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Status</label>
                        <select name="status" class="form-control">
                            <option value="">Pilih Status</option>
                            @foreach($kategori as $k)
                            <option value="{{ $k->id }}">{{ $k->nama }}</option>
                            @endforeach
                        </select>
                        @error('type')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                        <small id="type-error" class="form-text text-danger"></small>
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