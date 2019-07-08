@extends('templates.admin.default')

@section('title','Dashboard')

@push('css')

@endpush

@section('content')
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            General Form Elements
            <small>Preview</small>
          </h1>
        </section>
    
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <!-- right column -->
            <div class="col-xs-12">
              <!-- Horizontal Form -->
              <div class="box box-info">
                <div class="box-header with-border">
                  <a href="{{ url('admin/company') }}" class="fa fa-arrow-left btn btn-warning" > Kembali</a>
                  <br>
                  <br>
                  <h3 class="box-title">Detail Company</h3>
                </div>
                <div class="box">
                  <div class="box-header">
              <!-- /.box-header -->
              <div class="box-body">
                <table id="table-company" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th style="width: 10px">No</th>
                    <th style="width: 15%">Nama</th>
                    <th style="width: 25%">Email</th>
                    <th style="width: 10%">Photo</th>
                    <th style="width: 15%">No HP</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    @php
                    $no = 1;
                    @endphp

                    {{-- cek data di database --}}
                    <tr>
                      <td>{{ $no++ }}</td>
                      <td>{{ $data_company->name }}</td>
                      <td>{{ $data_company->email }}</td>
                      <td align = "center"><img src="{{asset('img/'.$data_company->avatar)}}" width="45px"; height="45px";>
                      {{-- <td>{{ $data_driver->avatar }}</td> --}}
                      <td>{{ $data_company->phone }}</td>
                    </tr>

                      </tbody>
                      <tfoot>
                      </tfoot>
                    </table>
                  </div>
                </div>
              </div>
              </div>
              <!-- /.box -->
            </div>
            <!--/.col (right) -->
          </div>
          <!-- /.row -->
        </section>
        <!-- /.content -->

@endsection

@push('scripts')

@endpush