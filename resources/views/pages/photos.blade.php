@extends('layouts.app')

@section('content')
  <div class="container mt-5">

    <div class="d-flex justify-content-end mb-3">
      <!-- Button trigger modal -->
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Add Photo
      </button>

      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Add Photo</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                  <label for="photo" class="form-label">Photo</label>
                  <input type="file" class="form-control" id="photo" name="lokasi_file">
                </div>
                <div class="mb-3">
                  <label for="title" class="form-label">Title</label>
                  <input type="text" class="form-control" id="title" placeholder="Title" name="judul_foto">
                </div>
                <div class="mb-3">
                  <label for="descrsiption" class="form-label">Description</label>
                  <textarea name="deskripsi_foto" id="description" cols="30" rows="5" class="form-control"
                    placeholder="Description"></textarea>
                </div>
                <div class="float-end">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row mb-5">
      @foreach ($photos as $photo)
        <div class="col-md-3">
          <div class="card">
            <a href="{{ route('photo.detail', $photo->id) }}">
              <img src="{{ $photo->lokasi_file }}" alt="..." class="card-img-top">
            </a>
            <div class="card-body">
              <h5 class="card-text">{{ $photo->judul_foto }}</h5>
              <p>{{ $photo->deskripsi_foto }}</p>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
@endsection
