<div>
    @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    @if (session()->has("slugerror"))
        <div class="alert alert-danger" role="alert">
            {{ session('slugerror') }}
        </div>
    @endif
    <div class="d-flex justify-content-between mb-3">
        <h1 class=" text-dark fs-3">Kegiatan</h1>
    </div>
    <div class="card p-3 shadow">
        <div class="table-responsive col-lg-10">
            <a href="/admin/kegiatan/tambah-kegiatan" class="btn btn-primary mb-3">Buat Kegiatan</a>
            @if (count($kegiatan) > 0)
                <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Cari..."
                        name="cari">
                    <div class="input-group-append">
                        <button class="btn btn-primary" >
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
    


            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kegiatan as $item)
                        
                    
                        <tr>
                            <th>{{$loop->iteration}}</th>
                            <td>{{$item->title}}</td>
                            <td>{{$item->excerpt}}</td>
                            <td>
                                <a href="/admin/kegiatan/detail/{{$item->slug}}" class="badge bg-info"><i class="fa-regular fa-eye"></i></a>
                                <a href="/admin/kegiatan/edit-kegiatan/{{$item->slug}}" class="badge bg-warning"><i class="fa-regular fa-pen-to-square"></i></a>
                                <a href="" class="badge bg-danger" data-bs-toggle="modal" data-bs-target="#exampleModal{{$item->slug}}"><i class="fa-solid fa-trash-can"></i></a>
                                {{-- Modal hapus --}}
                                <div class="modal fade" id="exampleModal{{$item->slug}}" tabindex="-1" aria-labelledby="exampleModalLabel{{$item->slug}}" aria-hidden="true">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h1 class="modal-title fs-5" id="exampleModalLabel">Konfirmasi</h1>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                          Apakah anda yakin menghapus berita ini?
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                                          <a href="/admin/kegiatan/delete/{{$item->slug}}" class="btn btn-primary">Iya</a>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                            </td>
                        </tr>
                        @endforeach
                </tbody>
               
            </table>
            {{-- <div class="py-2 px-4 p-3">
                {{ $berita->links() }}
            </div>
            @else  --}}
            @else
            <div class="alert alert-light text-center" role="alert">
                Tidak ada data!
              </div>
            @endif
            {{ $kegiatan->links() }}
            
        </div>
    </div>   
 