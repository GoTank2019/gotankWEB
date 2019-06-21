@extends('templates.company.default')

@section('title','Dashboard')

@push('css')

@endpush

@section('content')

      <!-- Content Header (Page header) -->
      <section class="content-header">
        @if (session('sukses'))
        <div class="box-body">
          <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
              &times;
            </button>
            <h4>
              <i class="icon fa fa-check"></i>
              Sukses !!!
            </h4>
            {{ session('sukses') }}
          </div>
        </div>
        @endif
        <h1>
          Data Tables
          <small>advanced tables</small>
        </h1>
      </section>
  
      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-xs-12">       
            <div class="box">
              <div class="box-header">
                {{-- <a href="{{ url('driver/create') }}" class="btn btn-success fa fa-plus-square-o"> Tambah </a> --}}
                <button type="button" class="btn btn-primary fa fa-plus-square-o" data-toggle="modal" data-target="#exampleModal">
                  Tambah
                </button>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Driver</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                  <form class="form-horizontal" action="{{ url('driver') }}" method="POST">
                  @csrf
                  <div class="box-body">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" name="name" class="form-control" id="inputEmail3" placeholder="Nama">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" name="email" class="form-control" id="inputEmail3" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Password</label>
                            <div class="col-sm-10">
                                <input type="password" name="password" class="form-control" id="inputEmail3" placeholder="Password">
                            </div>
                        </div>
                        <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">No Hp</label>
                            <div class="col-sm-10">
                                <input type="text" name="phone" class="form-control" id="inputEmail3" placeholder="No Hp">
                            </div>
                        </div>
                  </div>
                   <div class="modal-footer">
                        <button type="reset" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success">Simpan</button>
                  </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
                <a href="/export" class="btn btn-success fa fa-print"> Print </a>                
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
                          <td align = "center"><img src="{{asset('img/'.$drivers->avatar)}}" width="45px"; height="45px";>
                          <td>{{ $drivers->phone }}</td>
                          <td>
                              <form action="{{url('driver/'.$drivers->id) }}" method="POST" class="text-center">
                                @csrf
                                @method('DELETE')
                                <a href="{{url('driver/'.$drivers->id.'') }}" class="fa fa-info btn btn-primary"></a>
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