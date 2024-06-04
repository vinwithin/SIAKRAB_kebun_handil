
@extends('components/layouts/app')
@section('content')
<div class="container mt-2 p-4  w-75">
    <h1 class="border-bottom border-warning p-2">Visi dan Misi</h1>
    <div class="card mb-3 mt-4 shadow p-3" >
        <div class="row g-0">
          <div class="col-md-4">
            <img src="/image/blog2.png" class="img-fluid rounded-start" alt="...">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title">Visi Kelurahan Kebun Handil</h5>
              <p class="card-text">Mewujudkan Kebun Handil yang aman ramah dengan memberikan pelayanan terbaik menuju masyarakat
                yang partisipatif.</p>
              <h5 class="card-title">Misi Kelurahan Kebun Handil</h5>
              <ul>
                <li>Memberikan pelayanan publik yang prima dan responsif</li>
                <li>Mewujudkan kerukunan hidup beragama, suku bangsa dan etnis keturunan di kalangan masyarakat</li>
                <li>Mewujudkan situasi trantib yang kondusif ditengah masyarakat</li>
                <li>Meningkatkan pemberdayaan masyarakat dengan semangat gotong-royong</li>
                <li> Membangun sinergi bersama dalam peningkatan kualitas hidup masyarakat.</li>
              </ul>
          
             
            </div>
          </div>
        </div>
      </div>
      <h1 class="border-bottom border-warning p-2">Motto</h1>
      <div class="container d-flex justify-content-center align-items-center">
        <div class="p">
          <h1 class="text-center">TERPESONA</h1>
          <p>"Tertib Pengayom Sopan Nyaman dan Aman"</p>

        </div>

      </div>
</div>
<div class="container mt-auto p-4 w-75 shadow-lg p-3 mb-5 rounded"  style="background-color:rgba(255, 255, 255, 0.36)">
  <h3 class="text-center">Berita</h3>
  <div class="row row-cols-1 row-cols-md-3 g-4 p-4">
      <div class="col">
        <div class="card h-100 ">
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