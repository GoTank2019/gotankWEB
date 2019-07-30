<!DOCTYPE html>
<html>
<head>
	<title>Membuat Laporan PDF Dengan DOMPDF Laravel</title>
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		<h5>Data Pesan</h5>
	</center>

	<table class='table table-bordered'>
		<thead>
			<tr>
				<th style="background-color:#444;color:#fff;" width="30px">No</th>
				<th style="background-color:#444;color:#fff;" width="30px">Company Name</th>
				<th style="background-color:#444;color:#fff;" width="30px">Tgl Pesan</th>
				<th style="background-color:#444;color:#fff;" width="30px">Jam</th>
				<th style="background-color:#444;color:#fff;" width="30px">Upload Struck</th>
				<th style="background-color:#444;color:#fff;" width="30px">Status</th>
			</tr>
		</thead>
		<tbody>
			@php $i=1 @endphp
			@foreach($data_pesan as $pesans)
			<tr>
				<td>{{ $i++ }}</td>
				<td>{{$pesans->company->name}}</td>
				<td>{{$pesans->tgl_pesans}}</td>
				<td>{{$pesans->jam->jam}}</td>
				<td>{{$pesans->bukti_pembayaran}}</td>
				<td>{{$pesans->status}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>

	<table border="0" width="1000px">
	  <tr>
	   <td style="position: absolute;
				    top: 80px;
				    right: 0;
				    width: 200px;
				    height: 100px;
				    border: 3px solid #543535;">(.......................)</td>
	   <td style="position: absolute;
				    top: 80px;
				    right: 0;
				    width: 200px;
				    height: 100px;
				    border: 3px solid #543535;">{{Auth::user()->name}}</td>
	  </tr>
	 
	 </table>

</body>
</html>