@extends('templates.company.default')

@section('title','Dashboard')

@push('css')
  
@endpush

@section('content')
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Tambah Pesan
          </h1>
        </section>
    
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <!-- right column -->
            <div class="col-md-10 col-md-offset-1">
              <!-- Horizontal Form -->
              <div class="box box-info">
                <div class="box-header with-border">
                  {{-- <h3 class="box-title">Horizontal Form</h3> --}}
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" action="{{ url('pesan') }}" method="POST">
                  @csrf
                        {{-- <div class="form-group">
                          <label for="inputEmail3" class="col-sm-2 control-label">Company ID</label>
                            <div class="col-sm-10">
                              <select class="form-control" id="inputEmail3" name="company_id">
                                <option value="" style="display: none;">-Pilih Company-</option>
                                @foreach($companies as $company)
                                  <option value="{{ $company->id }}">{{ $company->name }}</option>
                                @endforeach
                                <option value="Belum Dikonfirmasi">Belum Dikonfirmasi</option>
                                <option value="Dikonfirmasi">Dikonfirmasi</option>
                                <option value="Sedang Dikerjakan">Sedang Dikerjakan</option>
                                <option value="Selesai">Selesai</option>
                                <option value="Batal">Batal</option>
                              </select>
                          </div>
                        </div> --}}
                        {{-- <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">User ID</label>
                            <div class="col-sm-10">
                                <input type="text" name="user_id" class="form-control" id="inputEmail3" placeholder="company_id">
                            </div>
                        </div> --}}
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Nama Pemesan</label>
                            <div class="col-sm-10">
                                <input type="text" name="name" class="form-control" id="inputEmail3" placeholder="Nama Pemesan">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Tgl Pesan</label>
                            <div class="col-sm-9">
                                <input id="date" type="date" name="tgl_pesan" class="form-control" id="inputEmail3">
                            </div>
                            <div class="col-sm-1">
                             <button type="button" onclick="getJam()" class="btn btn-info btn-sm">cek</button> 
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Jam Pesan</label>
                            <div class="col-sm-10">
                              <select id="jam" class="form-control" name="jam">
                                <option value="" style="display: none">--Pilih Jam--</option>
                              </select>
                            </div>
                        </div>
                        {{-- <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Driver</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="driver_id">
                                  <option value="">-Pilih Driver-</option>
                                    @foreach ($drivers as $driver)
                                        <option value="{{ $driver->id }}">{{ $driver->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div> --}}
                        {{-- <div class="form-group">
                          <label for="inputEmail3" class="col-sm-2 control-label">Pilih Jam</label>
                            <div class="col-sm-10">
                              <select class="form-control" id="inputEmail3" name="company_id">
                                <option value="" style="display: none;">-Pilih Jam-</option> --}}
                                {{-- <option value="{{ $data->jam }}"></option>
                                @foreach($companies as $company)
                                  <option value="{{ $company->id }}">{{ $company->name }}</option>
                                @endforeach --}}
                                {{-- @foreach($data as $jams)
                                <option value="{{ $jams->jam }}">{{ $jams->jam }}</option>
                                @endforeach --}}
                              {{-- </select>
                          </div>
                        </div> --}}
                        {{-- <div class="form-group">
                          <label for="inputEmail3" class="col-sm-2 control-label">Jam</label>
                            <div class="col-sm-10">
                                <input type="time" name="jam_id" class="form-control" id="inputEmail3" value="1">
                            </div>
                          <label for="inputEmail3" class="col-sm-2 control-label">Jam</label>
                          <div class="col-sm-10">
                            <select class="form-control" id="inputEmail3">
                              <option>1</option>
                              <option>2</option>
                              <option>3</option>
                              <option>4</option>
                              <option>5</option>
                            </select>
                          </div>
                        </div> --}}
                        {{-- <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Struk Pembayaran</label>
                            <div class="col-sm-10">
                                <input type="file" name="bukti_pembayaran" class="form-control" id="inputEmail3" placeholder="Bukti Pembayaran">
                            </div>
                        </div> --}}
                        <div class="form-group">
                          <label for="inputEmail3" class="col-sm-2 control-label">Status</label>
                          <div class="col-sm-10">
                            <select class="form-control" name="status" id="inputEmail3">
                              <option value="" style="display: none">--Pilih Status--</option>
                              <option value="Belum Dibayar">Belum Dibayar</option>
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
                    <div class="col-md-4 col-md-offset-4"> 
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

@section('myjs')
  <script>
    function getJam(){
      let company_id = {{ Auth::user()->id }};
      let datePesan = $("#date").val();
      let url = "{{ route('pesan.jam') }}" + "?company_id="+company_id+"&date="+datePesan;
     // alert(url);
      $.getJSON( url, function( data ) {
        //alert(data.data.length);
        // alert(data);
        if(data.data.length > 0){
          var items = [];
         items.push("<option>-Pilih Jam-</option>");
          $.each( data.data, function( key, val ) {
            items.push("<option value=" + val.id + ">"+ val.jam +"</option>");
          });
         
          $("#jam").append(items);
        } else{
          $("#jam").empty();
           var items = [];
         items.push("<option>-Pilih Jam-</option>");
         
          $("#jam").append(items);
        }
        
      });  
    }
  </script>
@endsection