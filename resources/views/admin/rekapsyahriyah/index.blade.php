@extends('layouts.app')
@section('title', 'Rekap Syahriyah')
@section('contents')
        <!--  Row 1 -->
        <div class="row">
        <div class="col-md-12 d-flex align-items-stretch">
            <div class="card w-100">
              <div class="card-body p-4">
                  <!-- <a type="button" href="{{route('santri.create')}}" class="btn btn-primary" style="float:right">Tambah Data</a> -->
                <h5 class="card-title fw-semibold mb-4">Rekap Syahriyah</h5>
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
                          <h6 class="fw-semibold mb-0">Bulan</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Tahun</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Status</h6>
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $row) 
                      <tr>
                        <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{ $no++ }}</h6></td>
                        <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{ $row->dataSantri->nis }}</h6></td>
                        <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{ $row->dataSantri->uid }}</h6></td>
                        <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{ $row->dataSantri->nama }}</h6></td>
                        <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{ $row->bulan }}</h6></td>
                        <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{ $row->tahun }}</h6></td>
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