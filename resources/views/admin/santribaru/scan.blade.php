@extends('layouts.app')
@section('scan-refresh', 'refresh')
@section('scan-time', '3')
@section('contents')
    <!--  Row 1 -->
    <div class="row">
        <div class="col-md-12 d-flex align-items-strech">
            <img src="{{ asset('images/scan/scan-icon.jpg') }}" class="img img-fluid" style="margin-left: 210px;">
        </div>
        <div class="col-md-12 text-center">
            <h3>Scan kartu anda</h3>
        </div>
    </div>
@endsection