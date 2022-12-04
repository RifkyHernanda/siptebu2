@extends('supir.layout')
@section('content')
<h4 class="mt-5">Data Supir</h4>
<a href="{{ route('supir.create') }}" type="button"
class="btn btn-success rounded-3">Tambah Data</a>
@if($message = Session::get('success'))
 <div class="alert alert-success mt-3" role="alert">
 {{ $message }}
 </div>
@endif

<table class="table table-hover mt-2">
<a href="{{ route('supir.indexDelete') }}" type="button"
class="btn btn-warning rounded-3">Dump File</a>
<div class = "row g-3 align-items-center mt-2">
<div class = "col-auto">
    <form action="/supir" method="GET">
    <input type="search" name="search" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
    </form>
</div>
<table class="table table-hover mt-2">
 <thead>
 <tr>
 <th>No.</th>
 <th>Nama</th>
 <th>Nopol Kendaraan</th>
 <th>No HP</th>
 <th>Jenis Kendaraan</th>
 <th>Status</th>
 <th>Action</th>
 </tr>
 </thead>
 <tbody>
 @foreach ($datas as $data)
 <tr>
 <td>{{$data-> ID_SUPIR }}</td>
 <td>{{$data-> NAMA_SUPIR }}</td>
 <td>{{$data-> NOPOL_KENDARAAN }}</td>
 <td>{{$data-> NO_HP }}</td>
 <td>{{$data-> JENIS_KENDARAAN }}</td>
 <td>{{$data-> STATUS }}</td>
 <td>
 <a href="{{ route('supir.edit', $data->ID_SUPIR) }}" type="button" class="btn btn-warning rounded-3">Ubah Data</a>
 <!-- TAMBAHKAN KODE DELETE DIBAWAH 
BARIS INI -->
<!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusModal{{ $data->ID_SUPIR }}">
 Hapus
 </button>
 <!-- Modal -->
 <div class="modal fade" 
id="hapusModal{{ $data->ID_SUPIR }}" tabindex="-1" 
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
action="{{ route('supir.delete', $data->ID_SUPIR) }}">
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