@extends('layouts.app')
@section('title', 'Create Registrasi')
@section('contents')
        <!--  Row 1 -->
        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Transaksi Baru</h5>
              <div class="card">
                <div class="card-body">
                  <form method="post" action="{{route('registrasi.store')}}">
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
                      <input type="text" value="{{$saldo}}" class="form-control" id="exampleInputPassword1" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Semester</label>
                        <select name="semester" id="semester" class="form-control @error('semester') is-invalid @enderror">
                            <option selected disabled>Pilih Semester</option>
                            <option value="genap">Genap</option>
                            <option value="ganjil">Ganjil</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="nominal">Nominal</label>
                        <input type="text" id="nominal" name="nominal" class="form-control" readonly>
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
                    <a href="{{ route('registrasi.index')}}" class="btn btn-danger">Cancel</a>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
        <script>
            $("#semester").on("change",function(e) {
                data = $("#semester").val();
                var nominal = '';
                if(data ){
                     nominal = "50000";
                }

                const nFormat = new Intl.NumberFormat();
                
                $("#nominal").val(nominal);
                
            });
        </script>

        @include('admin.santri.script')
        @include('admin.registrasi.yearsScript')
        @endsection