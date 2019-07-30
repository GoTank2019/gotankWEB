@extends('templates.admin.default')

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
          Data Jam Company
        </h1>
      </section>
  
      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-md-10 col-md-offset-1">       
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
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Jam</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                  <form class="form-horizontal" action="{{ url('admin/jam') }}" method="POST">
                  @csrf
                  <div class="box-body">
                      <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Jam</label>
                            <div class="col-sm-10">
                                <input type="text" name="jam" class="form-control" id="inputEmail3" placeholder="Masukan Jam">
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
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <table id="table-driver" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th style="width: 10px">No</th>
                    <th style="text-align:center">Data Jam</th>
                    <th style="text-align:center">Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    @php
                      $no = 1;
                    @endphp

                    {{-- cek data di database --}}
                    @if(sizeof($data_jam)>0)
                      @foreach($data_jam as $jams)
                        <tr>
                          <td>{{ $no++ }}</td>
                          <td style="text-align:center">
                            {{ $jams->jam }}
                          </td>
                          <td>
                              <form action="{{url('admin/jam/'.$jams->id) }}" method="POST" class="text-center">
                                @csrf
                                @method('DELETE')
                                <a href="{{url('admin/jam/'.$jams->id.'/edit') }}" class="fa fa-edit btn btn-warning" data-target="#exampleModal2"></a>
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

      <!-- Modal -->
                <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Jam</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                  <form class="form-horizontal" action="{{ url('admin/jam') }}" method="POST">
                  @csrf
                  <div class="box-body">
                      <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Jam</label>
                            <div class="col-sm-10">
                                <input type="text" name="jam" class="form-control" id="inputEmail3" placeholder="Masukan Jam">
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