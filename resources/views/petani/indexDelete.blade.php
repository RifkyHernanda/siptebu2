@extends('petani.layout')
@section('content')
<h4 class="mt-5">Data Petani Dump File</h4>
<a href="{{ route('petani.index') }}" type="button"
class="btn btn-success rounded-3">Kembali</a>
<div class = "row g-3 align-items-center mt-2">
<div class = "col-auto">
    <form action="/petani" method="GET">
    <input type="search" name="search" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
    </form>
</div>
<table class="table table-hover mt-2">
 <thead>
 <tr>
 <th>No.</th>
 <th>Nama</th>
 <th>Alamat Sawah</th>
 <th>No Rekening</th>
 <th>No HP</th>
 <th>Action</th>
 </tr>
 </thead>
 <tbody>
 @foreach ($datasi as $data)
 <tr>
 <td>{{$data-> ID_PETANI }}</td>
 <td>{{$data-> NAMA_PETANI }}</td>
 <td>{{$data-> LOKASI_SAWAH }}</td>
 <td>{{$data-> NO_REKENING }}</td>
 <td>{{$data-> NO_HP }}</td>
 <td>
 <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#kembalikanModal{{ $data->ID_PETANI }}">
    Kembalikan
</button>
 <!-- TAMBAHKAN KODE DELETE DIBAWAH 
BARIS INI -->
<!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusModal{{ $data->ID_PETANI }}">
 Hapus Beneran
</button>
 <!-- Modal -->
 <div class="modal fade" 
id="hapusModal{{ $data->ID_PETANI }}" tabindex="-1" 
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
action="{{ route('petani.hardDelete', $data->ID_PETANI) }}">
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
id="kembalikanModal{{ $data->ID_PETANI }}" tabindex="-1" 
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
action="{{ route('petani.restore', $data->ID_PETANI) }}">
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