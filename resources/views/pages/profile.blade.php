@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="d-flex justify-content-center mt-5">
      @if (Auth::user()->avatar)
        <img src="{{ Auth::user()->avatar }}" alt="" width="150" height="150" class="rounded-circle">
      @endif
    </div>
    <h3 class="text-center mt-3"><b>{{ Auth::user()->nama }}</b></h2>
      <div class="d-flex justify-content-center mt-3 gap-5">
        <p><b>Photos</b> : 200</p>
        <p><b>Albums</b> : 30</p>
      </div>

      {{-- Modal --}}
      <div class="d-flex justify-content-center gap-5">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editProfile">
          Edit Profile
        </button>

        <!-- Modal -->
        <div class="modal fade" id="editProfile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Profile</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form action="{{ route('profile.update', Auth::user()->id) }}" method="POST"
                  enctype="multipart/form-data">
                  @csrf
                  <div class="mb-3">
                    <input type="hidden" name="oldImage" value="{{ Auth::user()->avatar }}">
                    <label for="avatar" class="form-label">Upload Photo Profile</label>
                    <input type="file" class="form-control" id="avatar" name="avatar" accept="">
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
      {{-- End --}}

      <div class="row mt-5">
        <div class="col-3">
          <div class="card border-0" style="width: 18rem;">
            <img
              src="https://images.unsplash.com/photo-1622375734599-925cb5328554?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NTB8fHVuc3BhbHNofGVufDB8MHwwfHx8MA%3D%3D"
              class="card-img-top" alt="...">
            <div class="card-body">
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                content.</p>
            </div>
          </div>
        </div>
      </div>
  </div>
@endsection
