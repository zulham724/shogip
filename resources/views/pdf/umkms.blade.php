<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!-- Bootstrap  CSS-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<style type="text/css">
		tbody:before, tbody:after { display: none; }
		td{
			word-break:break-all; word-wrap:break-word;
		}
	</style>
</head>
<body>
{{-- <section class="container"> --}}
<center>
	<h3>Data Umkm {{ $city->name }}</h3>
	<hr>
	<table style="table-layout: fixed" class="table table-bordered">
		<thead>
            <tr>
                <td>No</td>
                <td>Nama UMKM</td>
                <td>Email</td>
                <td>Kategori UMKM</td>
                <td>Kota</td>
                <td>Kontak Telepon / WA</td>
            </tr>
        </thead>
        <tbody>
           @foreach ($umkm as $um => $umkms)
            <tr>
                <td>{{ $um+1 }}</td>
                <td>{{ $umkms->name }}</td>
                <td>{{ $umkms->user->email }}</td>
                <td>{{ $umkms->umkm_category->name }}</td>
                <td>{{ $umkms->city->name }}</td>
                <td>{{ $umkms->cp }}</td>
            </tr>
            @endforeach
        </tbody>
	</table>
</center>
{{-- </section> --}}
</body>
</html>