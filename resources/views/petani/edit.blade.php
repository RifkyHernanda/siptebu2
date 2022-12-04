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
 <h5 class="card-title fw-bolder mb-3">Ubah Data Petani</h5>
<form method="post" action="{{ 
route('petani.update', $data-> ID_PETANI) }}">
@csrf
 <div class="mb-3">
 <label for="ID_PETANI" class="form label">ID Petani</label>
 <input type="text" class="form-control" id="ID_PETANI" name="ID_PETANI" value="{{ $data->ID_PETANI}}">
 </div>
<div class="mb-3">
 <label for="NAMA_PETANI" class="form label">Nama Petani</label>
 <input type="text" class="form-control" id="NAMA_PETANI" name="NAMA_PETANI" value="{{ $data->NAMA_PETANI }}">
 </div>
 <div class="mb-3">
 <label for="LOKASI_SAWAH" class="form label">Alamat Sawah</label>
 <input type="text" class="form-control" id="LOKASI_SAWAH" name="LOKASI_SAWAH" value="{{ $data->LOKASI_SAWAH }}">
 </div>
 <div class="mb-3">
 <label for="NO_REKENING" class="form label">No Rekening</label>
 <input type="text" class="form-control" id="NO_REKENING" name="NO_REKENING" value="{{ $data->NO_REKENING}}">
 </div>
 <div class="mb-3">
 <label for="NO_HP" class="form label">No HP</label>
 <input type="text" class="form-control" id="NO_HP" name="NO_HP" value="{{ $data->NO_HP}}">
 </div>
<div class="text-center">
<input type="submit" class="btn btn-primary" value="Ubah" />
</div>
</form>
</div>
</div>
@stop
