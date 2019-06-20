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
                <a href="{{ url('driver/create') }}" class="btn btn-success fa fa-plus-square-o"> Tambah </a>
                <a href="#" class="btn btn-success fa fa-print"> Print </a>                
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <table id="table-driver" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th style="width: 10px">No</th>
                    <th >Nama</th>
                    <th >Email</th>
                    <th >Photo</th>
                    <th >No HP</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    @php
                      $no = 1;
                    @endphp

                    {{-- cek data di database --}}
                    @if(sizeof($data_driver)>0)
                      @foreach($data_driver as $drivers)
                        <tr>
                          <td>{{ $no++ }}</td>
                          <td>{{ $drivers->name }}</td>
                          <td>{{ $drivers->email }}</td>
                          <td>{{ $drivers->avatar }}</td>
                          <td>{{ $drivers->phone }}</td>
                          <td>
                              <form action="{{url('driver/'.$drivers->id) }}" method="POST" class="text-center">
                                @csrf
                                @method('DELETE')
                                <a href="" class="fa fa-info btn btn-primary"></a>
                                <a href="{{url('driver/'.$drivers->id.'/edit') }}" class="fa fa-edit btn btn-warning"></a>
                                <button type="submit" class="fa fa-trash btn btn-danger"></button>
                              </form>                       
                          </td>
                        </tr>
                      @endforeach

                    @else
                      <tr>
                        <td class="text-center" colspan="6"><i>Tidak ada data</i></td>
                      </tr>
                    @endif

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

@section('myjs')
    <script>
        $(function () {
            $('#table-driver').DataTable();
        });
    </script>
@endsection