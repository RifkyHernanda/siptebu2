@extends('panen.layout')
@section('content')
<h4 class="mt-5">Data Panen Dump File</h4>
<a href="{{ route('panen.index') }}" type="button"
class="btn btn-success rounded-3">Kembali</a>
<div class = "row g-3 align-items-center mt-2">
<div class = "col-auto">
    <form action="/panen" method="GET">
    <input type="search" name="search" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
    </form>
</div>
<table class="table table-hover mt-2">
 <thead>
 <tr>
 <th>Id Panen.</th>
 <th>Jumlah Panen</th>
 <th>Status</th>
 <th>Hasil Teproses</th>
 <th>Nama Petani</th>
 <th>Nama Supir</th>
 <th>Action</th>
 </tr>
 </thead>
 <tbody>
 @foreach ($datasi as $data)
 <tr>
 <td>{{$data-> ID_PANEN }}</td>
 <td>{{$data-> JUMLAH_PANEN }}</td>
 <td>{{$data-> STATUS }}</td>
 <td>{{$data-> HASIL_TERPROSES }}</td>
 <td>{{$data-> NAMA_PETANI }}</td>
 <td>{{$data-> NAMA_SUPIR }}</td>
 <td>
 <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#kembalikanModal{{ $data->ID_PANEN }}">
    Kembalikan
</button>
 <!-- TAMBAHKAN KODE DELETE DIBAWAH 
BARIS INI -->
<!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusModal{{ $data->ID_PANEN }}">
 Hapus Beneran
</button>
 <!-- Modal -->
 <div class="modal fade" 
id="hapusModal{{ $data->ID_PANEN }}" tabindex="-1" 
aria-labelledby="hapusModalLabel" aria-hidden="true">
 <div class="modal-dialog">
 <div class="modal-content">
 <div class="modal-header">
 <h5 class="modal-title" id="hapusModalLabel">Konfirmasi</h5>
 <button 
type="button" class="btn-close" data-bs-dismiss="modal" 
aria-label="Close"></button>
 </div>
<form method="POST" 
action="{{ route('panen.hardDelete', $data->ID_PANEN) }}">
 @csrf
<div class="modal-body">
 Apakah anda 
yakin ingin menghapus permanen data ini?
 </div>
 <div class="modal-footer">
 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
 <button type="submit" class="btn btn-primary">Ya</button>
 </div>


 </form>
 </div>
 </div>
 </div>
 <div class="modal fade" 
id="kembalikanModal{{ $data->ID_PANEN }}" tabindex="-1" 
aria-labelledby="kembalikanModalLabel" aria-hidden="true">
 <div class="modal-dialog">
 <div class="modal-content">
 <div class="modal-header">
 <h5 class="modal-title" id="kembalikanModalLabel">Konfirmasi</h5>
 <button 
type="button" class="btn-close" data-bs-dismiss="modal" 
aria-label="Close"></button>
 </div>
<form method="POST" 
action="{{ route('panen.restore', $data->ID_PANEN) }}">
 @csrf
<div class="modal-body">
 Apakah anda 
yakin ingin mengembalikan data ini?
 </div>
 <div class="modal-footer">
 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
 <button type="submit" class="btn btn-primary">Ya</button>
 </div>
 </form>
 </div>
 </div>
 </div>

 </td>
 @endforeach
 </tbody>
</table>
@stop