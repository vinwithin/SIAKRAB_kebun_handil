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
        <h1 class=" text-dark fs-3">Daftar Aduan</h1>
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
            @if (count($aduan) > 0)

            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Nomor Wa</th>
                        <th scope="col">Lokasi</th>
                        <th scope="col">Detail</th>
                        <th scope="col">Foto Bukti</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($aduan as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <th>{{ $item->nama_pelapor }}</th>
                        <td><a href="https://wa.me/{{ $item->NoWa }}">https://wa.me/{{ $item->NoWa }}</a></td>
                        <td>{{ $item->Lokasi }}</td>
                        <td>{{ $item->detail }}</td>
                        <td>
                            <img src="/storage/aduan/{{ $item->foto_bukti }}" alt="" class="img-thumbnail" style="max-width: 80px; cursor: pointer;" data-bs-toggle="modal" data-bs-target="#imageModal" data-bs-image="/storage/aduan/{{ $item->foto_bukti }}">
                        </td>
                        <td>
                    
                            <a href="" class="badge bg-danger" data-bs-toggle="modal"
                                data-bs-target="#exampleModal"><i class="fa-solid fa-trash-can"></i></a>
                            {{-- Modal hapus --}}
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Konfirmasi</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Apakah anda yakin menghapus aduan ini?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Tidak</button>
                                            <a href="/admin/aduan/delete/{{$item->id}}" class="btn btn-primary">Iya</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
            <div class="alert alert-light text-center" role="alert">
                Tidak ada data!
            </div>
        @endif 
        {{ $aduan->links() }}
    </div>
  

<!-- Modal untuk memperbesar gambar -->
<div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <img id="modalImage" src="" class="img-fluid" alt="Enlarged image">
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const imageModal = document.getElementById('imageModal');
            imageModal.addEventListener('show.bs.modal', function (event) {
                const button = event.relatedTarget;
                const imageUrl = button.getAttribute('data-bs-image');
                const modalImage = document.getElementById('modalImage');
                modalImage.src = imageUrl;
            });
        });
    </script>
</div>

</div>  
