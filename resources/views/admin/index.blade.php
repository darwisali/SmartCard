@extends('layouts.app')
@section('title', 'Dashboard')
@section('contents')
        <!--  Row 1 -->
        <div class="row">
          <div class="col-lg-12 d-flex align-items-strech">
          <div class="col-lg-4">
            <div class="row">
              <div class="col-lg-12">
                <!-- Yearly Breakup -->
                <div class="card overflow-hidden">
                  <div class="card-body p-4">
                    <h5 class="card-title mb-9 fw-semibold">Total Saldo</h5>
                    <div class="row align-items-center">
                      <div class="col-8">
                        <h4 class="fw-semibold mb-3">{{ "Rp " . number_format($total_saldo,0,',','.') }}</h4>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          </div>
        </div>
        @endsection