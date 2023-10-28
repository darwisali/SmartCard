@extends('layouts.app')
@section('title', 'Syahriyah')
@section('contents')
        <!--  Row 1 -->
        <div class="row">
        <div class="col-md-12 d-flex align-items-stretch">
            <div class="card w-100">
              <div class="card-body p-4">
                  <a type="button" href="{{route('syahriyah.create')}}" class="btn btn-success" style="float:right">Transaksi Baru</a>
                <h5 class="card-title fw-semibold mb-4">Pembayaran Syahriyah</h5>
                <div class="table-responsive">
                  <table class="table text-nowrap mb-0 align-middle">
                    <thead class="text-dark fs-4">
                      <tr>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">#</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">NIS</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">UID</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Nama</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Type</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Bulan</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Tahun</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Tanggal</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Status</h6>
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                        @php
                          function rupiah($angka){
                            $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
                            return $hasil_rupiah;
                          }
                        @endphp
                        @foreach($data as $row) 
                      <tr>
                        <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{ $no++ }}</h6></td>
                        <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{ $row->dataSantri->nis }}</h6></td>
                        <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{ $row->dataSantri->uid }}</h6></td>
                        <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{ $row->dataSantri->nama }}</h6></td>
                        <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{ rupiah($row->type) }}</h6></td>
                        <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{ $row->bulan }}</h6></td>
                        <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{ $row->tahun }}</h6></td>
                        <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{ $row->tanggal }}</h6></td>
                        <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{ $row->status }}</h6></td>
                      </tr> 
                        @endforeach                    
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endsection