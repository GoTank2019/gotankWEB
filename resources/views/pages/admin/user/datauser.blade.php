@extends('templates.admin.default')

@section('title','Dashboard')

@push('css')

@endpush

@section('content')
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Data Users
        </h1>
      </section>
  
      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-xs-12">       
            <div class="box">
              <div class="box-header">               
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <table id="table-user" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th style="width: 10px">No</th>
                    <th style="width: 15%">Nama</th>
                    <th style="width: 25%">Email</th>
                    <th style="width: 10%">Photo</th>
                    <th style="width: 15%">No HP</th>
                    <th style="width: 15%">Alamat</th>
                    <th style="text-align: center;">Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  
                    @php
                      $no = 1;
                    @endphp

                    {{-- cek data di database --}}
                    @if(sizeof($user)>0)
                      @foreach($user as $u)
                        <tr>
                          <td>{{ $no++ }}</td>
                          <td>{{ $u->name }}</td>
                          <td>{{ $u->email }}</td>
                          <td align="center"><a href="{{asset('img/'.$u->avatar)}}" rel="zoom-id:zoom;opacity-reverse:true"> <img src="{{asset('img/'.$u->avatar)}}" width="45px"; height="45px";></a></td>
                          <td>{{ $u->phone }}</td>
                          <td>{{ $u->address }}</td>
                          <td>
                              <form action="{{url('admin/user/'.$u->id) }}" method="POST" class="text-center">
                                @csrf
                                @method('DELETE')
                                <a href="{{url('admin/user/'.$u->id) }}" class="fa fa-info btn btn-primary"></a>
                                {{-- <a href="{{url('admin/user/'.$u->id.'/edit') }}" class="fa fa-edit btn btn-warning"></a>
                                <button type="submit" class="fa fa-trash btn btn-danger"></button> --}}
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
            $('#table-user').DataTable();
        });
    </script>
@endsection