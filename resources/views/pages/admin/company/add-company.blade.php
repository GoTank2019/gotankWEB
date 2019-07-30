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
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Forms</a></li>
            <li class="active">General Elements</li>
          </ol>
        </section>

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

                @if (session('error'))
                  <div class="box-body">
                    <div class="alert alert-danger alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                        &times;
                      </button>
                      <h4>
                        <i class="icon fa fa-check"></i>
                        Gagal !!!
                      </h4>
                      {{ session('error') }}
                    </div>
                  </div>
                  @endif

                {{-- menampilkan error validasi --}}
                      @if (count($errors) > 0)
                      <div class="alert alert-danger">
                          <ul>
                              @foreach ($errors->all() as $error)
                                  <li>{{ $error }}</li>
                              @endforeach
                          </ul>
                      </div>
                      @endif
    
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <!-- right column -->
            <div class="col-xs-12">
              <!-- Horizontal Form -->
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Isi Form Company</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" action="{{ url('admin/company') }}" method="POST">
                  @csrf
                  <div class="box-body">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Nama Company</label>
                            <div class="col-sm-10">
                                <input type="text" name="name" class="form-control" id="inputEmail3" placeholder="Masukan Nama">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" name="email" class="form-control" id="inputEmail3" placeholder="Masukan Email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Password</label>
                            <div class="col-sm-10">
                                <input type="password" name="password" class="form-control" id="inputEmail3" placeholder="Masukan Password">
                            </div>
                        </div>
                        <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">No Hp</label>
                            <div class="col-sm-10">
                                <input type="text" name="phone" class="form-control" id="inputEmail3" placeholder="Masukan No Hp">
                            </div>
                        </div>
                        <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Harga</label>
                            <div class="col-sm-10">
                                <input type="text" name="harga" class="form-control" id="inputEmail3" placeholder="Masukan Nominal Harga">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Alamat</label>
                          <div class="col-sm-10">  
                            <textarea name="address" class="form-control" rows="3" placeholder="Masukan Alamat"></textarea>
                          </div>
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