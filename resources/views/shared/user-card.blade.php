<div class="card">
  <div class="px-3 pt-4 pb-2">
    <div class="d-flex align-items-center justify-content-between">
      <div class="d-flex align-items-center">
        <img class="me-3 avatar-sm rounded-circle" src="{{ $user->getImageUrl() }}" alt="{{ $user->name }} Avatar" width="100px" />
        <div>
          <h3 class="card-title mb-0">
            <a href="#">{{ $user->name; }}</a>
          </h3>
          <span class="fs-6 text-muted">{{ '@' . explode('@', $user->email)[0] }}</span>
        </div>
      </div>
      {{-- d-flex --}}

      <div>
        @auth
          @if (Auth::id() === $user->id)
            <a href="{{ route('users.edit', $user->id) }}">Edit</a>
          @endif
        @endauth
      </div>
    </div>

    <div class="px-2 mt-4">
      <h5 class="fs-5">About :</h5>
      
      <p class="fs-6 fw-light">
        {{ $user->bio }}
      </p>

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
      <div class="mt-3 pb-2"></div>
    </div>
  </div>
</div>