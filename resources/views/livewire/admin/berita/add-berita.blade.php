{{-- @extends('components.layouts.admin.index')

@section('page') --}}
    @if (session()->has('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
    @endif

    <div class="card p-4">
        <h1 class="text-dark fs-3 mb-4">Buat Berita</h1>
        <form wire:submit.prevent="save">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Judul</label>
                <input type="text" wire:model="title" class="form-control @error('title') is-invalid @enderror" id="title">
                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="body" class="form-label">Deskripsi</label>
                @error('body')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <input id="id1" name="body" type="hidden" value="{{$body}}">
                <trix-editor class="trix-content" input="id1"  ></trix-editor>
            </div>
            
            <div class="input-group mb-3">
                <input type="file"  class="form-control" id="image_berita" name="image_berita" wire:model='image_berita' accept="image/png, image/jpeg, image/jpg">
                <label class="input-group-text" for="image_berita" >Upload</label>
                @error('image_berita')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <a href="/admin/berita" class="btn btn-warning mt-2">Back</a>
            <button type="submit" class="btn btn-primary mt-2">Submit</button>
        </form>
    </div>
    <script>
        const trixEditor = document.getElementById('id1');
        addEventListener('trix-blur', (event)=> {
            @this.set('body', trixEditor.getAttribute('value'))
           
        });
    </script>

