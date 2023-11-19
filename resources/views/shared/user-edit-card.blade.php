<div class="card">
  <div class="px-3 pt-4 pb-2">
    <form action="{{ route('users.update', $user->id) }}" method="post" enctype="multipart/form-data">
      @csrf
      @method('put')

      <div class="d-flex align-items-center justify-content-between">
        <div class="d-flex align-items-center">
          <img class="me-3 avatar-sm rounded-circle" src="{{ $user->getImageUrl() }}" alt="{{ $user->name }} Avatar" width="100px" />
          <div>
            <input type="text" name="name" id="name" value="{{ $user->name }}" class="form-control" />
            @error('name')
              <span class="fs-6 text-danger mt-2 d-block">{{ $message }}</span>
            @enderror
            <span class="fs-6 text-muted">{{ '@' . explode('@', $user->email)[0] }}</span>
          </div>
        </div>

        <div></div>
      </div>

      <div class="px-2 mt-3">
        <label for="image" class="form-label">Profile Picture</label>
        <input type="file" name="image" id="image" class="form-control" />
        @error('image')
          <span class="fs-6 text-danger mt-2 d-block">{{ $message }}</span>
        @enderror
      </div>

      <div class="px-2 mt-4">
        <h5 class="fs-5">About :</h5>
        
        <div class="mb-3">
          <textarea class="form-control" id="bio" name="bio" rows="3">{{ $user->bio ?? '' }}</textarea>
          @error('bio')
            <span class="fs-6 text-danger mt-2 d-block">{{ $message }}</span>
          @enderror
        </div>

        <button type="submit" class="btn btn-sm btn-dark mb-3">Save</button>

        <div class="d-flex justify-content-start">
          <a href="#" class="fw-light nav-link fs-6 me-3"> 
            <span class="fas fa-user me-1"></span> 
            0 Followers
          </a>

          <a href="#" class="fw-light nav-link fs-6 me-3"> 
            <span class="fas fa-brain me-1"></span> 
            {{ $user->ideas()->count() }}
          </a>

          <a href="#" class="fw-light nav-link fs-6"> 
            <span class="fas fa-comment me-1"></span> 
            {{ $user->comments()->count() }}  
          </a>
        </div>
        <div class="mt-3 pb-2">
          @auth
            @if (Auth::id() !== $user->id)
              <button class="btn btn-primary btn-sm"> 
                Follow 
              </button>
            @endif
          @endauth
        </div>
      </div>
    </form>
  </div>
</div>