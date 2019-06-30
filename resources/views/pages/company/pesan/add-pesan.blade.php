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
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Forms</a></li>
            <li class="active">General Elements</li>
          </ol>
        </section>
    
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <!-- right column -->
            <div class="col-xs-12">
              <!-- Horizontal Form -->
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Horizontal Form</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" action="{{ url('pesan') }}" method="POST">
                  @csrf
                  <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Company ID</label>
                            <div class="col-sm-10">
                            <select class="form-control" id="inputEmail3" name="company_id">
                              <option value="" style="display: none;">-Pilih Company-</option>
                              @foreach($companies as $company)
                                <option value="{{ $company->id }}">{{ $company->name }}</option>
                              @endforeach
{{--                               <option value="Belum Dikonfirmasi">Belum Dikonfirmasi</option>
                              <option value="Dikonfirmasi">Dikonfirmasi</option>
                              <option value="Sedang Dikerjakan">Sedang Dikerjakan</option>
                              <option value="Selesai">Selesai</option>
                              <option value="Batal">Batal</option> --}}
                            </select>
                          </div>
                        </div>
                        {{-- <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">User ID</label>
                            <div class="col-sm-10">
                                <input type="text" name="user_id" class="form-control" id="inputEmail3" placeholder="company_id">
                            </div>
                        </div> --}}
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Tgl Pesan</label>
                            <div class="col-sm-10">
                                <input type="date" name="tgl_pesan" class="form-control" id="inputEmail3">
                            </div>
                        </div>
                        <div class="form-group">
                          <label for="inputEmail3" class="col-sm-2 control-label">Jam</label>
                            <div class="col-sm-10">
                                <input type="time" name="jam_id" class="form-control" id="inputEmail3" value="1">
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
                            <select class="form-control" name="status" id="inputEmail3">
                              <option value="" style="display: none">--Pilih Status--</option>
                              <option value="Belum Dibayar"></option>
                              <option value="Belum Dikonfirmasi">Belum Dikonfirmasi</option>
                              <option value="Dikonfirmasi" selected>Dikonfirmasi</option>
                              <option value="Sedang Dikerjakan">Sedang Dikerjakan</option>
                              <option value="Selesai">Selesai</option>
                              <option value="Batal">Batal</option>
                            </select>
                          </div>
                        </div>
                  <!-- /.box-body -->
                  <div class="box-footer">
                    <div class="col-sm-2 col-sm-offset-6"> 
                      <button class="btn btn-success" type="submit">Tambah</button>
                      <button class="btn btn-danger pull-right" type="reset">Batal</button>
{{--                     <a href="#" type="submit" class="btn btn-success">Simpan</a>
                    <a href="#" type="submit" class="btn btn-danger pull-right">Batal</a> --}}
                    </div>
                  </div>
                  <!-- /.box-footer -->
                </form>
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