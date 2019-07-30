@extends('templates.company.default')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        User Profile
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">User profile</li>
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
        <div class="col-md-4">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="{{asset('img/'.Auth::user()->avatar)}}" alt="User profile picture">

              <h3 class="profile-username text-center">{{Auth::user()->name}}</h3>

              {{-- @foreach($data_company as $companies) --}}
              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Nama</b> <a class="pull-right">{{ $company->name }}</a>
                </li>
                <li class="list-group-item">
                  <b>Email</b> <a class="pull-right">{{ $company->email }}</a>
                </li>
                <li class="list-group-item">
                  <b>Phone</b> <a class="pull-right">{{ $company->phone }}</a>
                </li>
                <li class="list-group-item">
                  <b>About Me</b> <a class="pull-right" style="height: 60px;">{{ $company->description }}</a>
                </li>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <li class="list-group-item">
                  <b>Alamat</b> <a class="pull-right">{{ $company->address }}</a>
                </li>
              </ul>
              {{-- @endforeach --}}

              {{-- <a href="{{ url('profile/edit') }}" class="btn btn-primary btn-block"><b>Edit Profile</b></a> --}}
              <br>
              <br>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-8">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Update Profile</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <!-- Post -->
                <div class="post">
                  <div class="user-block">
                    <div class="tab-content">
              <div class="active tab-pane" id="activity">
              <div class="tab-pane" id="settings">
                <form class="form-horizontal" method="POST" action="{{route('post-profile.update') }}" enctype="multipart/form-data">
                  @method('PATCH')
                  @csrf
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Nama</label>

                    <div class="col-sm-10">
                      <input type="text" name="name" id="inputName" value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                    <div class="col-sm-10">
                      <input type="email" name="email" class="form-control" id="inputEmail" readonly="" value="{{ $company->email }}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Phone</label>
                    <div class="col-sm-10">
                      <input type="text" name="phone" id="inputName" value="{{old('phone')}}" class="form-control @error('phone') is-invalid @enderror">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputExperience" class="col-sm-2 control-label">Alamat</label>

                    <div class="col-sm-10">
                      <textarea name="address" id="inputExperience" {{old('address')}}" class="form-control @error('address') is-invalid @enderror">{{ $company->address }}</textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputSkills" class="col-sm-2 control-label">About Me</label>
                    <div class="col-sm-10">
                      <textarea name="description" id="inputExperience" {{old('description')}}" class="form-control @error('description') is-invalid @enderror">{{$company->description}}</textarea>
                    </div>

                    {{-- <div class="col-sm-10">
                      <input type="text" name="description" value="{{$company->description}}" class="form-control" id="inputSkills" placeholder="About Me">
                    </div> --}}
                  </div>
                  <div class="form-group">
                    <label for="inputSkills" class="col-sm-2 control-label">Photo</label>

                    <div class="col-sm-10">
                      <input type="file" name="avatar" id="inputSkills" {{old('avatar')}}" class="form-control @error('avatar') is-invalid @enderror">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-danger">Submit</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
                </div>
                <!-- /.post -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
@endsection
