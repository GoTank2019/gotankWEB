@extends('templates.admin.default')

@section('title','Dashboard')

@push('css')

@endpush

@section('content')
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Edit Users
          </h1>
        </section>
    
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <!-- right column -->
            <div class="col-xs-12">
              <!-- Horizontal Form -->
              <div class="box box-info">        
                <!-- /.box-header -->
                <!-- form start -->
                <<form class="form-horizontal" action="{{ url('admin/user/'.$user->id) }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  @method('PATCH')
                  <div class="box-body">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" name="name" class="form-control" id="inputEmail3" placeholder="Nama" value="{{ $user->name }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" name="email" class="form-control" id="inputEmail3" placeholder="Email" value="{{ $user->email }}">
                            </div>
                        </div>
                        <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">No Hp</label>
                            <div class="col-sm-10">
                                <input type="text" name="phone" class="form-control" id="inputEmail3" placeholder="Email" value="{{ $user->phone }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputExperience" class="col-sm-2 control-label">Alamat</label>
                          <div class="col-sm-10">  
                            <textarea id="inputExperience" name="address" type="text" class="form-control" rows="3" placeholder="Masukan Alamat" value="">{{ $user->address }}</textarea>
                          </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Photo</label>
        
                            <div class="col-sm-10">
                                <input type="file" name="avatar" class="form-control" >
                            </div>
                        </div>
                  </div>
                  <!-- /.box-body -->
                  <div class="box-footer">
                    <div class="col-sm-2 col-sm-offset-6"> 
                      <button class="btn btn-success" type="submit">Simpan</button>
                      <button class="btn btn-danger pull-right" type="reset">Batal</button>
{{--                     <a href="#" type="submit" class="btn btn-success">Simpan</a>
                    <a href="#" type="submit" class="btn btn-danger pull-right">Batal</a> --}}
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