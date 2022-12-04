@extends('supir.layout')
@section('content')
@if($errors->any())
 <div class="alert alert-danger">
 <ul>
 @foreach($errors->all() as $error)
 <li>{{ $error }}</li>
 @endforeach
 </ul>
 </div>
@endif
<div class="card mt-4">
<div class="card-body">
 <h5 class="card-title fw-bolder mb-3">Tambah Supir</h5>
<form method="post" action="{{ 
route('supir.store') }}">
@csrf
 <div class="mb-3">
 <label for="ID_SUPIR" class="form-label">ID Supir</label>
 <input type="text" class="form-control" id="ID_SUPIR" name="ID_SUPIR">
 </div>
<div class="mb-3">
 <label for="NAMA_SUPIR" class="form-label">Nama Supir</label>
 <input type="text" class="form-control" id="NAMA_SUPIR" name="NAMA_SUPIR">
 </div>
 <div class="mb-3">
 <label for="NOPOL_KENDARAAN" class="form-label">Nopol Kendaraan</label>
 <input type="text" class="form-control" id="NOPOL_KENDARAAN" name="NOPOL_KENDARAAN">
 </div>
 <div class="mb-3">
 <label for="NO_HP" class="form-label">No Hp</label>
 <input type="text" class="form-control" id="NO_HP" name="NO_HP">
 </div>
 <div class="mb-3">
 <label for="JENIS_KENDARAAN" class="form label">Jenis Kendaraan</label>
 <input type="text" class="form-control" id="JENIS_KENDARAAN" name="JENIS_KENDARAAN">
 </div>
 <div class="mb-3">
 <label for="STATUS" class="form label">STATUS</label>
 <input type="text" class="form-control" id="STATUS" name="STATUS">
 </div>
<div class="text-center">
<input type="submit" class="btn btn-primary" value="Tambah" />
</div>
</form>
</div>
</div>
@stop