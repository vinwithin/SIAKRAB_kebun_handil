<div>
  <div class="container mt-2 p-4 text-center w-75">
      <h1 class="border-bottom border-warning p-2">Formulir Pengajuan Surat</h1>
  </div>
  <div class="container mt-auto p-4 w-75 shadow-lg p-3 mb-5 rounded" style="background-color: #D8D8D8">
      <h3 class="p-2">Identitas Pemohon</h3>
      <form wire:submit.prevent='save' class="row g-2 p-2">
          <div class="col-md-6 p-2">
              <label for="nama_pengaju" class="form-label">Nama Lengkap</label>
              <input type="text" class="form-control" id="nama_pengaju" wire:model='nama_pengaju' required>
          </div>
          <div class="col-md-6 p-2">
              <label for="NIK" class="form-label">NIK</label>
              <input type="text" class="form-control" id="NIK" wire:model='NIK' required>
          </div>
          <div class="col-md-6 p-2">
              <label for="NoWa" class="form-label">No. Wa</label>
              <input type="text" class="form-control" id="NoWa" wire:model='NoWa' required>
          </div>
          <div class="col-md-6 p-2">
              <label for="Alamat" class="form-label">Alamat</label>
              <input type="text" class="form-control" id="Alamat" wire:model='Alamat' required>
          </div>
          <div class="col-md-6 p-2">
              <label for="kategori_surat_id" class="form-label">Kategori Surat</label>
              <select class="form-select" id="kategori_surat_id" wire:model='kategori_surat_id' required>
                  <option value="" selected="selected" hidden="hidden">Pilih Kategori</option>
                  @foreach ($kategori as $item)
                      <option value="{{ $item->id }}">{{ $item->name }}</option>
                  @endforeach
              </select>
          </div>
          <div class="col-md-6 p-2">
              <p>KTP</p>
              <div class="input-group mb-3">
                  <input type="file" class="form-control" id="KTP" wire:model='KTP' accept="image/png, image/jpeg, image/jpg">
                  <label class="input-group-text" for="KTP">Upload</label>
              </div>
          </div>
          <div class="col-md-6 p-2">
              <p>Bukti Lunas PBB Tahun Berjalan</p>
              <div class="input-group mb-3">
                  <input type="file" class="form-control" id="PBB" wire:model='PBB' accept="image/png, image/jpeg, image/jpg">
                  <label class="input-group-text" for="PBB">Upload</label>
              </div>
          </div>
          <div class="col-md-6 p-2">
              <p>Kartu Keluarga</p>
              <div class="input-group mb-3">
                  <input type="file" class="form-control" id="KK" wire:model='KK' accept="image/png, image/jpeg, image/jpg">
                  <label class="input-group-text" for="KK">Upload</label>
              </div>
          </div>
          <div class="col-md-6 p-2">
              <p>Surat Pengantar RT</p>
              <div class="input-group mb-3">
                  <input type="file" class="form-control" id="surat_pengantar_rt" wire:model='surat_pengantar_rt' accept="image/png, image/jpeg, image/jpg">
                  <label class="input-group-text" for="surat_pengantar_rt">Upload</label>
              </div>
          </div>
          <div class="col-12">
              <p>*Mohon periksa kembali data anda</p>
              <button class="btn btn-primary" type="submit">Submit form</button>
          </div>
      </form>
  </div>
</div>
