
@extends('components/layouts/app')
@section('content')
<div class="container mt-2 p-4  w-75">
    <h1 class="border-bottom border-warning p-2">Struktur Organisasi</h1>
</div>
    <div class="container  w-75  border-bottom  border-warning mb-5 ">
        <div class="org-chart">
            <!-- Level 1 -->
            <div class="org-level">
                <div class="card org-card">
                    <div class="card-body text-center">
                        <h5 class="card-title">LURAH</h5>
                    </div>
                </div>
            </div>
            <!-- Connectors -->
            <div class="connector"></div>
            <div class="org-level">
                <div class="horizontal-connector">
                    <div class="connector"></div>
                    <div class="connector"></div>
                </div>
            </div>
            <!-- Level 2 -->
            <div class="org-level">
                <div class="card org-card">
                    <div class="card-body text-center">
                        <h5 class="card-title">JABATAN FUNGSIONAL</h5>
                    </div>
                </div>
                <div class="card org-card">
                    <div class="card-body text-center">
                        <h5 class="card-title">SEKRETARIS</h5>
                    </div>
                </div>
            </div>
            <!-- Connectors -->
            <div class="connector"></div>
            <div class="org-level">
                <div class="horizontal-connector">
                    <div class="connector"></div>
                    <div class="connector"></div>
                </div>
            </div>
            <!-- Level 3 -->
            <div class="org-level">
                <div class="card org-card">
                    <div class="card-body text-center">
                        <h5 class="card-title">KASI PEMBERDAYAAN MASYARAKAT DAN KESEJAHTERAAN SOSIAL</h5>
                    </div>
                </div>
                <div class="card org-card">
                    <div class="card-body text-center">
                        <h5 class="card-title">KASI PEMERINTAH DAN PELAYANAN UMUM</h5>
                    </div>
                </div>
                <div class="card org-card">
                    <div class="card-body text-center">
                        <h5 class="card-title">KASI KEAMANAN DAN KETERTIBAN</h5>
                    </div>
                </div>
            </div>
            <!-- Connectors -->
            <div class="connector"></div>
            <div class="org-level">
                <div class="horizontal-connector">
                    <div class="connector"></div>
                    <div class="connector"></div>
                    <div class="connector"></div>
                </div>
            </div>
            <!-- Level 4 -->
            <div class="org-level">
                <div class="card org-card">
                    <div class="card-body text-center">
                        <h5 class="card-title">STAF</h5>
                    </div>
                </div>
                <div class="card org-card">
                    <div class="card-body text-center">
                        <h5 class="card-title">STAF</h5>
                    </div>
                </div>
                <div class="card org-card">
                    <div class="card-body text-center">
                        <h5 class="card-title">STAF</h5>
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