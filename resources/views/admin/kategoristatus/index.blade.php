@extends('layouts.app')
@section('title', 'Kategori Status')
@section('contents')
        <!--  Row 1 -->
        <div class="row">
        <div class="col-md-12 d-flex align-items-stretch">
            <div class="card w-100">
              <div class="card-body p-4">
                  <a type="button" href="{{route('kategoristatus.create')}}" class="btn btn-success" style="float:right">Tambah Data</a>
                <h5 class="card-title fw-semibold mb-4">Kategori Status</h5>
                <div class="table-responsive">
                  <table class="table text-nowrap mb-0 align-middle">
                    <thead class="text-dark fs-4">
                      <tr>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">#</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Nama</h6>
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
                          <h6 class="fw-semibold mb-0">Action</h6>
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $row)
                      <tr>
                        <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{ $loop->iteration }}</h6></td>
                        <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{ $row->nama }}</h6></td>
                        <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{ $row->syahriyah }}</h6></td>
                        <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{ $row->pondok }}</h6></td>
                        <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{ $row->diniyah }}</h6></td>
                        <td>
                            <a type="button" class="btn btn-sm btn-warning" href="{{route('kategoristatus.edit', $row->id)}}"><i class="ti ti-pencil"></i></a>
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
