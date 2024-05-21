@extends('components/layouts/app')
@section('content')
    <div class="container mt-2 p-4 text-center w-75 ">
        <h1 class="border-bottom border-warning p-2">Formulir Pengaduan</h1>
    </div>
    <div class="container mt-auto p-4 w-75 shadow-lg p-3 mb-5 rounded" style="background-color: #D8D8D8">
        <h3 class="p-2">Identitas Pelapor</h3>
        <form class="row g-2 p-2">
            <div class="col-md-6 p-2">
              <label for="validationDefault01" class="form-label">Nama Lengkap</label>
              <input type="text" class="form-control" id="validationDefault01" value="Mark" required>
            </div>
            <div class="col-md-6 p-2">
              <label for="validationDefaultUsername" class="form-label">No. Wa</label>            
                <input type="text" class="form-control" id="validationDefaultUsername" aria-describedby="inputGroupPrepend2" required>
            </div>
            <div class="col-md-6 p-2">
              <label for="validationDefault03" class="form-label">Lokasi</label>
              <input type="text" class="form-control" id="validationDefault03" required>
            </div>
            <div class="col-md-6 ">
                <p>Kategori</p>
                <select class="form-select" aria-label="Default select example">
                  <option selected>Open this select menu</option>
                  <option value="1">One</option>
                  <option value="2">Two</option>
                  <option value="3">Three</option>
                </select>
            </div>
            <div class="col-md-6 p-2">
                <p>Detail</p>
                <div class="input-group mb-3">
                    <textarea name="" id="" cols="50" rows="10" ></textarea>
                  </div>
            </div>
            <div class="col-md-6 p-2">
              <p>Foto</p>
              <div class="input-group mb-3">
                  <input type="file" class="form-control" id="inputGroupFile02">
                  <label class="input-group-text" for="inputGroupFile02">Upload</label>
                </div>
            </div>
           
            
            
            <div class="col-12">
              <p class="">*Mohon periksa kembali data anda</p>

              <button class="btn btn-primary w-25" type="submit">Kirim</button>
             

              
            </div>
          </form>
    </div>
@endsection
