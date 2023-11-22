<div class="card">
  <div class="px-3 pt-4 pb-2">
    <div class="d-flex align-items-center justify-content-between">
      <div class="d-flex align-items-center">
        <img style="width:50px" class="me-2 avatar-sm rounded-circle" src="{{ $idea->user->getImageUrl() }}" alt="{{ $idea->user->name }} Avatar" />
        <div>
          <h5 class="card-title mb-0">
            <a href="{{ route('users.show', $idea->user->id) }}">{{ $idea->user->name }}</a>
          </h5>
        </div>
      </div>

      <div>
        @can('idea.edit', $idea)
          <form action="{{ route('idea.destroy', $idea->id) }}" method="post">
            @method('delete')
            @csrf
            <a href="{{ route('idea.edit', $idea->id) }}">Edit</a>
            <a href="{{ route('idea.show', $idea->id) }}" class="ms-1">View</a>
            <button class="btn btn-sm btn-danger ms-1">X</button>
          </form>
        @endcan
      </div>
    </div>
  </div>
  <div class="card-body">
    @if ($editing ?? false)
      <form action="{{ route('idea.update', $idea->id) }}" method="post">
        @csrf
        @method('put')
    
        <div class="mb-3">
          <textarea class="form-control" id="content" name="content" rows="3">{{ $idea->content }}</textarea>
          @error('content')
            <span class="fs-6 text-danger mt-2 d-block">{{ $message }}</span>
          @enderror
        </div>
        <div class="mb-2">
          <button type="submit" class="btn btn-dark">
            Share
          </button>
        </div>
      </form>
    @else
      <p class="fs-6 fw-light text-muted">
        {{ $idea->content; }}
      </p>
    @endif
    <div class="d-flex justify-content-between">
      @include('idea.shared.like-button')
      <div>
        <span class="fs-6 fw-light text-muted"> 
          <span class="fas fa-clock"></span>
          {{ $idea->created_at->diffForHumans() }}
        </span>
      </div>
    </div>
    @include('idea.shared.comments-box')
  </div>
</div>