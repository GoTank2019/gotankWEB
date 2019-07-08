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
		<h5>Membuat Laporan PDF Dengan DOMPDF Laravel</h4>
		<h6><a target="_blank" href="https://www.malasngoding.com/membuat-laporan-…n-dompdf-laravel/">www.malasngoding.com</a></h5>
	</center>

	<table class='table table-bordered'>
		<thead>
			<tr>
				<th>No</th>
				<th>Company Name</th>
				<th>Tgl Pesan</th>
				<th>Jam</th>
				<th>Upload Struck</th>
				<th>Status</th>
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

</body>
</html>