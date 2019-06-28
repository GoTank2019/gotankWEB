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
                <a href="{{ url('pesan/create') }}" class="btn btn-success fa fa-plus-square-o"> Tambah </a>
                {{-- <button type="button" class="btn btn-primary fa fa-plus-square-o" data-toggle="modal" data-target="#exampleModal">
                  Tambah
                </button> --}}
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
                      <div class="box-body">
                      <div class="modal-body">
                  <form class="form-horizontal" action="{{ url('pesan') }}" method="POST">
                  @csrf
                      <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Company ID</label>
                            <div class="col-sm-10">
                                <input type="text" name="company_id" class="form-control" id="inputEmail3" placeholder="company_id">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">User ID</label>
                            <div class="col-sm-10">
                                <input type="text" name="user_id" class="form-control" id="inputEmail3" placeholder="company_id">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Tgl Pesan</label>
                            <div class="col-sm-10">
                                <input type="date" name="tgl_pesan" class="form-control" id="inputEmail3" placeholder="Nama">
                            </div>
                        </div>
                        <div class="form-group">
                          <label for="inputEmail3" class="col-sm-2 control-label">Jam</label>
                            <div class="col-sm-10">
                                <input type="time" name="jam_id" class="form-control" id="inputEmail3" placeholder="Jam">
                            </div>
                          {{-- <label for="inputEmail3" class="col-sm-2 control-label">Jam</label>
                          <div class="col-sm-10">
                            <select class="form-control" id="inputEmail3">
                              <option>1</option>
                              <option>2</option>
                              <option>3</option>
                              <option>4</option>
                              <option>5</option>
                            </select>
                          </div> --}}
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Desc Pesan</label>
                            <div class="col-sm-10">
                                <input type="text" name="deskripsi_pesan" class="form-control" id="inputEmail3" placeholder="Deskripsi Pesan">
                            </div>
                        </div>
                        <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Struk Pembayaran</label>
                            <div class="col-sm-10">
                                <input type="file" name="bukti_pembayaran" class="form-control" id="inputEmail3" placeholder="Bukti Pembayaran">
                            </div>
                        </div>
                        <div class="form-group">
                          <label for="inputEmail3" class="col-sm-2 control-label">Status</label>
                          <div class="col-sm-10">
                            <select class="form-control" id="inputEmail3">
                              <option value="Belum Dibayar">Belum Dibayar</option>
                              <option value="Belum Dikonfirmasi">Belum Dikonfirmasi</option>
                              <option value="Dikonfirmasi">Dikonfirmasi</option>
                              <option value="Sedang Dikerjakan">Sedang Dikerjakan</option>
                              <option value="Selesai">Selesai</option>
                              <option value="Batal">Batal</option>
                            </select>
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
                <a href="/export-pesan" class="btn btn-success fa fa-print"> Print </a>                
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <table id="table-driver" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th style="width: 10px">No</th>
                    <th style="width: 40px">Company ID</th>
                    <th style="width: 80px">Tgl Pesan</th>
                    <th style="width: 50px">Jam</th>
                    <th style="width: 150px">Desc Pesan</th>
                    <th style="width: 100px">Upload Struck</th>
                    <th >Status</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    @php
                      $no = 1;
                    @endphp

                    {{-- cek data di database --}}
                    @if(sizeof($data_pesan)>0)
                      @foreach($data_pesan as $pesans)
                        <tr>
                          <td>{{ $no++ }}</td>
                          <td>
                            {{ $pesans->company_id }}
                          </td>
                          <td>{{ $pesans->tgl_pesan }}</td>
                          <td>{{ $pesans->jam_id }}</td>
                          <td>{{ $pesans->deskripsi_pesan }}</td>
                          <td>{{ $pesans->bukti_pembayaran }}</td>
                          <td>{{ $pesans->status }}</td>
                          <td>
                              <form action="{{url('pesan/'.$pesans->id) }}" method="POST" class="text-center">
                                @csrf
                                @method('DELETE')
                                <a href="{{url('pesan/'.$pesans->id.'') }}" class="fa fa-info btn btn-primary"></a>
                                <a href="{{url('pesan/'.$pesans->id.'/edit') }}" class="fa fa-edit btn btn-warning"></a>
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