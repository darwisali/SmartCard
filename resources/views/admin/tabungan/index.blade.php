@extends('layouts.app')
@section('title', 'Tabungan')
@section('contents')
        <!--  Row 1 -->
        <div class="row">
        <div class="col-md-12 d-flex align-items-stretch">
            <div class="card w-100">
              <div class="card-body p-4">
                  <!-- <a type="button" href="{{route('santri.create')}}" class="btn btn-primary" style="float:right">Tambah Data</a> -->
                <h5 class="card-title fw-semibold mb-4">Data Tabungan</h5>
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
                          <h6 class="fw-semibold mb-0">Saldo Awal</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Debit</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Kredit</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Saldo</h6>
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
                        <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{ rupiah($row->saldo_awal) }}</h6></td>
                        <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{ rupiah($row->debit) }}</h6></td>
                        <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{ rupiah($row->kredit) }}</h6></td>
                        <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{ rupiah($row->saldo) }}</h6></td>
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