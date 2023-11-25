@extends('layouts.app')
@section('title', 'Data Santri')
@section('contents')
        <!--  Row 1 -->
        <div class="row">
        <div class="col-md-12 d-flex align-items-stretch">
            <div class="card w-100">
              <div class="card-body p-4">
                  <a type="button" href="{{route('santribaru.create')}}" class="btn btn-success" style="float:right">Tambah Data</a>
                <h5 class="card-title fw-semibold mb-4">Santri Baru</h5>
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
                          <h6 class="fw-semibold mb-0">Status</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Masa Aktif</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Pendaftaran</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Infaq</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Posaba</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Kartu Santri</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Seragam</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Syahriyah</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Pondok</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Diniyah</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Total Syahriah</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Action</h6>
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $row)
                      <tr>
                        <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{ $no++ }}</h6></td>
                        <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{ $row->nis }}</h6></td>
                        <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{ $row->uid }}</h6></td>
                        <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{ $row->nama }}</h6></td>
                        <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{ $row->k_status->nama }}</h6></td>
                        <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{ $row->masa_aktif }}</h6></td>
                        <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{ $row->pendaftaran }}</h6></td>
                        <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{ $row->infaq }}</h6></td>
                        <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{ $row->posaba }}</h6></td>
                        <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{ $row->kartu_santri }}</h6></td>
                        <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{ $row->seragam }}</h6></td>
                        <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{ $row->k_status->syahriyah }}</h6></td>
                        <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{ $row->k_status->pondok }}</h6></td>
                        <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{ $row->k_status->diniyah }}</h6></td>
                        <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{ "Rp " . number_format($row->k_status->syahriyah+$row->k_status->pondok+$row->k_status->diniyah) }}</h6></td>
                        <td>
                            <a type="button" class="btn btn-sm btn-success" href="{{route('santri.show', $row->id)}}"><i class="ti ti-eye"></i></a>
                            <a type="button" class="btn btn-sm btn-warning" href="{{route('santri.edit', $row->id)}}"><i class="ti ti-pencil"></i></a>
                            <button onclick="deleteItem(this)" data-id="{{ $row->id }}" class="btn btn-sm btn-danger"><i class="ti ti-trash"></i></button>
                        </td>
                      </tr>
                        @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        @include('admin.santri.deleteScript')
        @endsection
