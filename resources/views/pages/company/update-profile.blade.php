@extends('templates.company.default')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Update Profile
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">User profile</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li><a href="#settings" data-toggle="tab">Settings</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
              <div class="tab-pane" id="settings">
                <form class="form-horizontal" method="POST" action="{{route('post-profile.update') }}" enctype="multipart/form-data">
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
                      <input type="text" name="description" class="form-control" id="inputSkills" placeholder="About Me">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputSkills" class="col-sm-2 control-label">Photo</label>

                    <div class="col-sm-10">
                      <input type="file" style="" name="avatar" class="form-control" id="inputSkills" >
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" href="post-profile/edit" class="btn btn-danger">Submit</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.tab-pane -->
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