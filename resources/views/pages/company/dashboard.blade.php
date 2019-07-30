@extends('templates.company.default')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Grafik Pemesanan
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <div class="nav-tabs-custom">
            
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

@section('chartJS')
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
@endsection