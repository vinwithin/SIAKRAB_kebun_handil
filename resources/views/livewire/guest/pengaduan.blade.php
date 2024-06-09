<div>
  @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    @if (session()->has('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
    @endif
    <div class="container mt-2 p-4 text-center w-75 ">
        <h1 class="border-bottom border-warning p-2">Formulir Pengaduan</h1>
    </div>
    <div class="container mt-auto p-4 w-75 shadow-lg p-3 mb-5 rounded" style="background-color: #D8D8D8">
        <h3 class="p-2">Identitas Pelapor</h3>
        <form wire:submit='save' class="row g-2 p-2">
            <div class="col-md-6 p-2">
              <label for="nama_pelapor" class="form-label">Nama Lengkap</label>
              <input type="text" class="form-control" id="nama_pelapor" wire:model='nama_pelapor' required>
            </div>
            <div class="col-md-6 p-2">
              <label for="noWa" class="form-label">No. Wa</label>            
                <input type="text" class="form-control" id="noWa" wire:model='noWa' required>
            </div>
            <div class="col-md-6 p-2">
              <label for="lokasi" class="form-label">Lokasi</label>
              <input type="text" class="form-control" id="lokasi" wire:model='Lokasi' required>
            </div>
            
            
            <div class="col-md-6 p-2">
              <p>Foto</p>
              <div class="input-group mb-3">
                  <input type="file" class="form-control" id="foto_bukti" wire:model='foto_bukti' accept="image/png, image/jpeg, image/jpg">
                  <label class="input-group-text" for="inputGroupFile02">Upload</label>
                </div>
            </div>
            <div class="col-md-6 p-2">
              <p>Detail</p>
              <div class="input-group mb-3">
                  <textarea name="detail" id="" cols="50" rows="10" wire:model='detail'></textarea>
                </div>
          </div>
            
            
            <div class="col-12">
              <p class="">*Mohon periksa kembali data anda</p>

              <button type="submit" class="btn btn-primary mt-2">Submit</button>

             

              
            </div>
          </form>
    </div>
</div>
