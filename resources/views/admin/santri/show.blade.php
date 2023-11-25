@extends('layouts.app')
@section('contents')

        <!--  Row 1 -->
        <div class="row">
          <div class="col-lg-12 d-flex align-items-strech">
          <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Show Data</h5>
              <div class="card">
                <div class="card-body">
                    <table class="table table-borderless" style="width: 600px">
                        <tbody>
                            <tr>
                                <td><b>NIS</b></td>
                                <td><b>:</b></td>
                                <td>{{ $data->nis }}</td>
                            </tr>
                            <tr>
                                <td><b>UID</b></td>
                                <td><b>:</b></td>
                                <td>{{ $data->uid }}</td>
                            </tr>
                            <tr>
                                <td><b>Nama</b></td>
                                <td><b>:</b></td>
                                <td>{{ $data->nama }}</td>
                            </tr>
                            <tr>
                                <td><b>Status</b></td>
                                <td><b>:</b></td>
                                <td>{{ $data->k_status->nama }}</td>
                            </tr>
                            <tr>
                                <td><b>Masa Aktif</b></td>
                                <td><b>:</b></td>
                                <td>{{ $data->masa_aktif }}</td>
                            </tr>
                            <tr>
                                <td><b>Saldo</b></td>
                                <td><b>:</b></td>
                                <td>{{ $tabungan->saldo }}</td>
                            </tr>
                            <tr>
                                <td><b>Status Syahriyah Bulan Ini</b></td>
                                <td><b>:</b></td>
                                @if($syahriyah->status == 'Lunas' && date('F') == $syahriyah->bulan && date('Y') == $syahriyah->tahun)
                                <td>Lunas</td>
                                @else
                                <td>Tidak Lunas</td>
                                @endif
                            </tr>
                            <tr>
                                <td><b>Status Registrasi Ganjil</b></td>
                                <td><b>:</b></td>
                                @if($ganjil->status == 'Lunas')
                                <td>Lunas</td>
                                @else
                                <td>Tidak Lunas</td>
                                @endif
                            </tr>
                            <tr>
                                <td><b>Status Registrasi Genap</b></td>
                                <td><b>:</b></td>
                                @if($genap->status == 'Lunas')
                                <td>Lunas</td>
                                @else
                                <td>Tidak Lunas</td>
                                @endif
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-3" style="float:right">
                <a type="button" href="{{route('santri.index')}}" class="btn btn-danger" style="float:right"><i class="ti ti-arrow-back-up"></i></a>
            </div>
        </div>
    </div>
        </div>
          </div>
        </div>
        @endsection