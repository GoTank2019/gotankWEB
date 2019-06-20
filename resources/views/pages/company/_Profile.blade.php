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

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-4">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="{{asset('img/'.Auth::user()->avatar)}}" alt="User profile picture">

              <h3 class="profile-username text-center">{{Auth::user()->name}}</h3>

              <p class="text-muted text-center">Software Engineer</p>

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
                  <b>About Me</b> <a class="pull-right">{{ $company->description }}</a>
                </li>
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
                      <input type="text" name="name" class="form-control" id="inputName" value="{{ $company->name  }}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                    <div class="col-sm-10">
                      <input type="email" name="email" class="form-control" id="inputEmail" value="{{ $company->email }}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Phone</label>
                    <div class="col-sm-10">
                      <input type="text" name="phone" class="form-control" id="inputName" value="{{ $company->phone }}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputExperience" class="col-sm-2 control-label">Alamat</label>

                    <div class="col-sm-10">
                      <textarea class="form-control" name="address" id="inputExperience">{{ $company->address }}</textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputSkills" class="col-sm-2 control-label">About Me</label>

                    <div class="col-sm-10">
                      <input type="text" name="description" value="{{$company->description}}" class="form-control" id="inputSkills" placeholder="About Me">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputSkills" class="col-sm-2 control-label">Photo</label>

                    <div class="col-sm-10">
                      <input type="file" name="avatar" class="form-control" id="inputSkills" >
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
