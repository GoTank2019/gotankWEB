@extends('templates.company.default')

@section('title','Dashboard')

@push('css')

@endpush

@section('content')
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Data Tables
          <small>advanced tables</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#">Tables</a></li>
          <li class="active">Data tables</li>
        </ol>
      </section>
  
      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-xs-12">       
            <div class="box">
              <div class="box-header">
                <a href="{{url('driver/create')}}" class="btn btn-success fa fa-plus-square-o"> Tambah </a>
                <a href="#" class="btn btn-success fa fa-print"> Print </a>                
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th style="width: 10px">No</th>
                    <th style="width: 20%">Nama</th>
                    <th style="width: 25%">Email</th>
                    <th style="width: 25%">Photo</th>
                    <th style="width: 15%">No HP</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($data_driver as $drivers)
                  <tr>
                    <td>{{ $drivers->id }}</td>
                    <td>{{ $drivers->name }}</td>
                    <td>{{ $drivers->email }}</td>
                    <td>{{ $drivers->avatar }}</td>
                    <td>{{ $drivers->phone }}</td>
                    <td>
                        <a href="#" class="btn btn-success-sm" data-toggle="tooltip" data-placement="top" title="Edit"><span class="fa fa-edit"></span></a>
                        <a href="#" class="btn btn-danger-sm" data-toggle="tooltip" data-placement="top" title="Hapus"><span class="fa fa-trash"></span></a>
                    </td>
                  </tr>
                    @endforeach
                  </tbody>
                  <tfoot>
                  </tfoot>
                </table>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </section>

@endsection

@push('scripts')

@endpush