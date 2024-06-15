<div>
    @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    @if (session()->has('slugerror'))
        <div class="alert alert-danger" role="alert">
            {{ session('slugerror') }}
        </div>
    @endif
    <div class="d-flex justify-content-between mb-3">
        <h1 class=" text-dark fs-3">Daftar Surat</h1>
    </div>

    <div class="card p-3 shadow">
        <div class="table-responsive col-lg-12">
            <form action="/berita" method="get"
                class="form-inline mr-auto w-100 navbar-search justify-content-end mb-3">
                <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Cari..."
                        name="cari">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
            </form>

            @if (count($ajuan_surat) > 0)
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Kategori Surat</th>
                            <th scope="col">NIK</th>
                            <th scope="col">NoWa</th>
                            <th scope="col">TTL</th>
                            <th scope="col">Jenis Kelamin</th>
                            <th scope="col">Pekerjaan</th>
                            <th scope="col">Agama</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">KTP</th>
                            <th scope="col">PBB</th>
                            <th scope="col">KK</th>
                            <th scope="col">SPRT</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ajuan_surat as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <th>{{ $item->nama_pengaju }}</th>
                                <td>{{ $item->kategori_surat->name }}</td>
                                <td>{{ $item->NIK }}</td>
                                <td>{{ $item->NoWa }}</td>
                                <td>{{ $item->ttl }}</td>
                                <td>{{ $item->jenis_kelamin }}</td>
                                <td>{{ $item->pekerjaan }}</td>
                                <td>{{ $item->agama }}</td>
                                <td>{{ $item->Alamat }}</td>
                                <td>
                                    <img src="/storage/surat/ktp/{{ $item->KTP }}" alt=""
                                        class="img-thumbnail" style="max-width: 40px; cursor: pointer;"
                                        data-bs-toggle="modal" data-bs-target="#imageModal"
                                        onclick="showImageModal('/storage/surat/ktp/{{ $item->KTP }}')">
                                </td>
                                <td>
                                    <img src="/storage/surat/pbb/{{ $item->PBB }}" alt=""
                                        class="img-thumbnail" style="max-width: 40px; cursor: pointer;"
                                        data-bs-toggle="modal" data-bs-target="#imageModal"
                                        onclick="showImageModal('/storage/surat/pbb/{{ $item->PBB }}')">
                                </td>
                                <td>
                                    <img src="/storage/surat/kk/{{ $item->KK }}" alt=""
                                        class="img-thumbnail" style="max-width: 40px; cursor: pointer;"
                                        data-bs-toggle="modal" data-bs-target="#imageModal"
                                        onclick="showImageModal('/storage/surat/kk/{{ $item->KK }}')">
                                </td>
                                <td>
                                    <img src="/storage/surat/surat_pengantar_rt/{{ $item->surat_pengantar_rt }}"
                                        alt="" class="img-thumbnail" style="max-width: 40px; cursor: pointer;"
                                        data-bs-toggle="modal" data-bs-target="#imageModal"
                                        onclick="showImageModal('/storage/surat/surat_pengantar_rt/{{ $item->surat_pengantar_rt }}')">
                                </td>
                                <td class="fw-bold">{{ $item->status }}</td>
                                <td>
                                   
                                    <a href="#" class="badge bg-warning" data-bs-toggle="modal"
                                        data-bs-target="#circleXModal" >
                                        <i class="fa-solid fa-circle-xmark"></i>
                                    </a>
                                    <a href="#" class="badge bg-warning" data-bs-toggle="modal"
                                        data-bs-target="#thumbsUpModal" >
                                        <i class="fa-solid fa-thumbs-up"></i>
                                    </a>
                                    <a href="" class="badge bg-danger" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal"><i class="fa-solid fa-trash-can"></i></a>
                                    {{-- Modal hapus --}}
                                    <div class="modal fade" id="exampleModal" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Konfirmasi</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Apakah anda yakin menghapus ajuan surat ini?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Tidak</button>
                                                    <a wire:click='destroy({{$item->id}})' class="btn btn-primary">Iya</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <div class="modal fade" id="circleXModal" tabindex="-1" aria-labelledby="circleXModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="circleXModalLabel">Konfirmasi Aksi</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Apakah Anda yakin ingin menolak ajuan surat ini?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                                        <button type="button" class="btn btn-primary" wire:click="reject({{ $item->id }})">Iya</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                        <!-- Modal for Thumbs Up -->
                        <div class="modal fade" id="thumbsUpModal" tabindex="-1" aria-labelledby="thumbsUpModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="thumbsUpModalLabel">Konfirmasi Aksi</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Apakah Anda yakin ingin menerima ajuan surat ini?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                                        <button type="button" class="btn btn-primary" wire:click="approve({{$item->id}})">Iya</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </tbody>
                </table>
        </div>
    @else
        <div class="alert alert-light text-center" role="alert">
            Tidak ada data!
        </div>
        @endif
        {{ $ajuan_surat->links() }}
    </div>


    <!-- Modal for Image -->
    <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <img id="modalImage" src="" alt="Enlarged Image" class="img-fluid">
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Circle X Mark -->
   
    <script>
        function showImageModal(imageUrl) {
            document.getElementById('modalImage').src = imageUrl;
        }
    </script>

</div>
</div>
