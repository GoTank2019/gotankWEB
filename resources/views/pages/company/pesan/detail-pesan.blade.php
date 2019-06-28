@extends('templates.company.default')

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
                  <a href="{{ url('pesan') }}" class="fa fa-arrow-left btn btn-warning" > Kembali</a>
                  <br>
                  <br>
                  <h3 class="box-title">Detail Driver</h3>
                </div>
                <div class="box">
                  <div class="box-header">
              <!-- /.box-header -->
              <div class="box-body">
                <table id="table-company" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th style="width: 10px">No</th>
                    <th style="width: 40px">Company ID</th>
                    <th style="width: 80px">Tgl Pesan</th>
                    <th style="width: 50px">Jam</th>
                    <th style="width: 150px">Desc Pesan</th>
                    <th style="width: 100px">Upload Struck</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    @php
                    $no = 1;
                    @endphp

                    {{-- cek data di database --}}
                    <tr>
                       
                        <tr>
                          <td>{{ $no++ }}</td>
                          <td>
                            {{ $data_pesan->company_id }}
                          </td>
                          <td>{{ $data_pesan->tgl_pesan }}</td>
                          <td>{{ $data_pesan->jam_id }}</td>
                          <td>{{ $data_pesan->deskripsi_pesan }}</td>
                          <td>{{ $data_pesan->bukti_pembayaran }}</td>
                          <td>{{ $data_pesan->status }}</td>
                          <td>
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