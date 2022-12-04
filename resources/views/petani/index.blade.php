@extends('petani.layout')
@section('content')
<h4 class="mt-5">Data Petani</h4>
<a href="{{ route('petani.create') }}" type="button"
class="btn btn-success rounded-3">Tambah Data</a>
@if($message = Session::get('success'))
 <div class="alert alert-success mt-3" role="alert">
 {{ $message }}
 </div>
@endif

<table class="table table-hover mt-2">
<a href="{{ route('petani.indexDelete') }}" type="button"
class="btn btn-warning rounded-3">Dump File</a>
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
 @foreach ($datas as $data)
 <tr>
 <td>{{$data-> ID_PETANI }}</td>
 <td>{{$data-> NAMA_PETANI }}</td>
 <td>{{$data-> LOKASI_SAWAH }}</td>
 <td>{{$data-> NO_REKENING }}</td>
 <td>{{$data-> NO_HP }}</td>
 <td>
 <a href="{{ route('petani.edit', $data->ID_PETANI) }}" type="button" class="btn btn-warning rounded-3">Ubah Data</a>
 <!-- TAMBAHKAN KODE DELETE DIBAWAH 
BARIS INI -->
<!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusModal{{ $data->ID_PETANI }}">
 Hapus
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
action="{{ route('petani.delete', $data->ID_PETANI) }}">
 @csrf
<div class="modal-body">
 Apakah anda 
yakin ingin menghapus data ini?
 </div>
 <div class="modal-footer">
 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
 <button type="submit" class="btn btn-primary">Ya</button>
 </div>
 </form>
 </div>
 </div>
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