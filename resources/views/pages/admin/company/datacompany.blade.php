@extends('templates.admin.default')

@section('title','Dashboard')

@push('css')

@endpush

@section('content')
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Data Company
        </h1>
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
          <div class="col-xs-12">       
            <div class="box">
              <div class="box-header">
                <a href="{{ url('admin/company/create') }}" class="btn btn-success fa fa-plus-square-o"> Tambah </a>
                {{-- <a href="#" class="btn btn-success fa fa-print"> Print </a>                 --}}
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <table id="table-company" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th style="width: 10px">No</th>
                    <th style="width: 15%">Nama</th>
                    <th style="width: 25%">Email</th>
                    <th style="width: 10%">Photo</th>
                    {{-- <th style="width: 15%">No HP</th> --}}
                    <th style="width: 15%">Alamat</th>
                    <th style="text-align: center;">Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    @php
                      $no = 1;
                    @endphp

                    {{-- cek data di database --}}
                    @if(sizeof($data_company)>0)
                      @foreach($data_company as $companies)
                        <tr>
                          <td>{{ $no++ }}</td>
                          <td>{{ $companies->name }}</td>
                          <td>{{ $companies->email }}</td>
                          <td align = "center"><a href="{{asset('img/'.$companies->avatar)}}" rel="zoom-id:zoom;opacity-reverse:true"> <img src="{{asset('img/'.$companies->avatar)}}" width="45px"; height="45px";></a></td>
                          <td>{{ $companies->address }}</td>
                          <td>
                              <form action="{{url('admin/company/'.$companies->id) }}" method="POST" class="text-center">
                                @csrf
                                @method('DELETE')
                                <a href="{{url('admin/company/'.$companies->id) }}" class="fa fa-info btn btn-primary"></a>
                                <a href="{{url('admin/company/'.$companies->id.'/edit') }}" class="fa fa-edit btn btn-warning"></a>
                                <button type="submit" class="fa fa-trash btn btn-danger" onclick="return confirm('Yakin mau dihapus !!!')"></button>
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
            $('#table-company').DataTable();
        });
    </script>
@endsection