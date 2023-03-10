@extends('master')

@section('judul')    
<h1>Detail Barang Lelang</h1>
@endsection

@section('isi')

<div class="col-md-12">
  <div class="card card-primary">
     <div class="card-header">
       <h3 class="card-title">Detail Barang Anda</h3>
     </div>
     <!-- /.card-header -->
     <!-- form start -->
     {{-- <form action="{{route('lelangs.store')}}" method="POST"> --}}
         @csrf
       <div class="card-body">
         <div class="form-group" >
           <div class="row">
             <div class="col-md-5 col-12">
               <label for="barangs_id">Nama Barang</label>
               <input type="text" name="barangs_id" class="form-control"  value=" {{ Str::of($lelangs->barang->nama_barang) }}" disabled>
             </div>
             <div class="col-md-7 col-12">
              <div class="form-group">
                <label for="deskripsi_barang">Deskripsi Barang</label>
                <input type="text" class="form-control" name="deskripsi_barang" value="{{ $lelangs->barang->deskripsi_barang }}" disabled>
              </div>
            </div>
           </div>
         </div>
         <div class="row">
          <div class="col-md-5 col-12">
            @if ($lelangs->barang->image)
            <div class="form-group">
              <label for="foto_barang">Foto Barang</label>
              <div style="">  
                <img src="{{ asset('storage/' . $lelangs->barang->image) }}" width="70%" alt="{{ $lelangs->barang->image }}" class="img-fluid mt-3">
              </div>
            </div>
            @endif
          </div>
          <div class="col-md-7 col-12">
            <div class="form-group">
              <div class="form-group">
                <label for="tanggal">Tanggal</label>
                <input type="date" name="tanggal" class="form-control" value="{{$lelangs->tanggal}}" disabled>
              </div>
              <div class="form-group">
                <label for="harga_akhir">Harga Akhir</label>
                <input type="text" name="harga_akhir" class="form-control"  value="@currency($lelangs->harga_akhir)" disabled>
              </div>
            </div>
          </div>
        </div>
           <div class="row">
             <div class="col-md-12 d-flex justify-content-end">
               <a href="/lelang" class="btn btn-outline-info">
                 Kembali
               </a>
             </div>
           </div>
         </div>
         <!-- /.card-body -->
       {{-- </form> --}}
   </div>
 </div>
@endsection