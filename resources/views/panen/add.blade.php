@extends('petani.layout')
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
 <h5 class="card-title fw-bolder mb-3">Tambah Hasil Panen</h5>
<form method="post" action="{{ 
route('panen.store') }}">
@csrf
 <div class="mb-3">
 <label for="ID_PANEN" class="form-label">ID Panen</label>
 <input type="text" class="form-control" id="ID_PANEN" name="ID_PANEN">
 </div>
<div class="mb-3">
 <label for="JUMLAH_PANEN" class="form-label">Jumlah Panen</label>
 <input type="text" class="form-control" id="JUMLAH_PANEN" name="JUMLAH_PANEN">
 </div>
 <div class="mb-3">
 <label for="STATUS" class="form-label">Status</label>
 <input type="text" class="form-control" id="STATUS" name="STATUS">
 </div>
 <div class="mb-3">
 <label for="HASIL_TERPROSES" class="form-label">HasilTerproses</label>
 <input type="text" class="form-control" id="HASIL_TERPROSES" name="HASIL_TERPROSES">
 </div>
 <div class="mb-3">
 <label for="ID_PETANI" class="form label">Id Petani</label>
 <input type="text" class="form-control" id="ID_PETANI" name="ID_PETANI">
 </div>
 <div class="mb-3">
 <label for="ID_SUPIR" class="form label">Id Supir</label>
 <input type="text" class="form-control" id="ID_SUPIR" name="ID_SUPIR">
 </div>
<div class="text-center">
<input type="submit" class="btn btn-primary" value="Tambah" />
</div>
</form>
</div>
</div>
@stop