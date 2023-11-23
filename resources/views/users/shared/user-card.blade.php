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
        @can('update', $user)
          <a href="{{ route('users.edit', $user->id) }}">Edit</a>
        @endcan
      </div>
    </div>

    <div class="px-2 mt-4">
      <h5 class="fs-5">About :</h5>
      
      <p class="fs-6 fw-light">
        {{ $user->bio }}
      </p>

      <div class="d-flex justify-content-start">
        @include('users.shared.user-stats')
      </div>
      <div class="mt-3 pb-2">
        @auth
          @if (Auth::user()->isNot($user))
            @if (Auth::user()->hasFollow($user))
              <form action="{{ route('users.unfollow', $user->id) }}" method="post">
                @csrf
                <button type="submit" class="btn btn-danger btn-sm"> 
                  Unfollow 
                </button>
              </form>
            @else
              <form action="{{ route('users.follow', $user->id) }}" method="post">
                @csrf
                <button type="submit" class="btn btn-primary btn-sm"> 
                  Follow 
                </button>
              </form>
            @endif
          @endif
        @endauth
      </div>
    </div>
  </div>
</div>