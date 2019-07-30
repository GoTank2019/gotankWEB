@extends('templates.admin.default')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Detail Pemesanan
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li><a href="{{ url('pesan') }}" class="fa fa-arrow-left btn btn-warning" > Kembali</a>
              </li>
            </ul>
            <div class="tab-content">
            <div class="box-body">
                <table id="table-driver" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th style="width: 10px">No</th>
                    <th style="width: 120px">Company Name</th>
                    <th style="width: 120px">Driver Name</th>
                    <th style="width: 120px">Nama User</th>
                    <th style="width: 120px">Tgl Pesan</th>
                    <th style="width: 50px">Jam</th>
                    <th style="width: 100px">Upload Struck</th>
                    <th >Status</th>
                    {{-- <th>Aksi</th> --}}
                  </tr>
                  </thead>
                  <tbody>
                    @php
                      $no = 1;
                    @endphp

                    {{-- cek data di database --}}
                    @if(sizeof($data)>0)
                      {{-- @foreach($data_pesan as $pesans) --}}
                        <tr>
                          <td>{{ $no++ }}</td>
                          <td>
                            {{ $data->company->name }}
                          </td>
                          <td>
                            {{ $data->driver->name }}
                          </td>
                          <td>
                            {{ $data->user->name }}
                          </td>
                          <td>{{ $data->tgl_pesan }}</td>
                          <td>{{ $data->jam->jam }}</td>
                          <td><a href="{{asset('img/'.$data->bukti_pembayaran)}}" rel="zoom-id:zoom;opacity-reverse:true"> <img src="{{asset('img/'.$data->bukti_pembayaran)}}" width="45px"; height="45px";></a></td>
                          <td>{{ $data->status }}</td>
                        </tr>
                      {{-- @endforeach --}}

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
            </div>
              <!-- /.box-body -->
            <div class="box-body">
              <div class="tab-pane">
                <div id="grafikPesan">
                  
                </div>
              </div>
            </div>
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
        </div>

    </section>
    <!-- /.content -->
@endsection

{{-- @section('chartJS')
  <script src="https://code.highcharts.com/highcharts.js"></script>
  <script>
    Highcharts.chart('grafikPesan', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Laporan Data Pemesanan'
        },
        xAxis: {
            categories: [
            'Jan',
            'Feb',
            'Mar',
            'Apr',
            'May',
            'Jun',
            'Jul',
            'Aug',
            'Sep',
            'Oct',
            'Nov',
            'Dec'
        ],
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Presentase'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            // pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            //     '<td style="padding:0"><b>{point.y:.1f} kali</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: 'Pemesanan/Bulan',
            data: [{!! json_encode($datas) !!},
            20,
            15
            ]

        }]
    });
  </script>
@endsection --}}