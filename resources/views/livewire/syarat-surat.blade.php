
@extends('components/layouts/app')
@section('content')
<div class="container mt-2 p-4  w-75">
    <h1 class="border-bottom border-warning p-2">Persyaratan</h1>
    <div class="card mb-3 mt-4" >
        <div class="row g-0">
          <div class="col-md-4">
            <img src="/image/blog2.png" class="img-fluid rounded-start" alt="...">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title">Syarat Surat</h5>
                <ul>
                    <li>Kartu Keluarga</li>
                    <li>Akta Kelahiran</li>
                    <li>Surat Pengantar RT</li>
                    <li>KTP</li>
                </ul>
             
          
             
            </div>
          </div>
        </div>
      </div>
     
</div>
<div class="container mt-auto p-4 w-75 shadow-lg p-3 mb-5 rounded" style="background-color:rgba(255, 255, 255, 0.36)">
  <h3 class="text-center">Berita</h3>
  <div class="row row-cols-1 row-cols-md-3 g-4 p-4">
      <div class="col">
        <div class="card h-100">
          <img src="/image/blog.png" class="card-img-top" alt="...">
          <div class="card-body">
              <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
            <p class="card-text">Kelurahan Kebun Handil menerima bantuan sembako dari dinas sosial Kota Jambi</p>
          </div>
          
        </div>
      </div>
      <div class="col">
        <div class="card h-100">
          <img src="/image/blog.png" class="card-img-top" alt="...">
          <div class="card-body">
              <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
            <p class="card-text">Kelurahan Kebun Handil menerima bantuan sembako dari dinas sosial Kota Jambi.</p>
          </div>
          
        </div>
      </div>
      <div class="col">
        <div class="card h-100">
          <img src="/image/blog.png" class="card-img-top" alt="...">
          <div class="card-body">
              <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
            <p class="card-text">Kelurahan Kebun Handil menerima bantuan sembako dari dinas sosial Kota Jambi.</p>
          </div>
         
        </div>
      </div>
    </div>
</div>

@endsection