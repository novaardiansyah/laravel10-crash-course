@auth
  <div>
    <form action="{{ route('idea.comment.store', $idea->id) }}" method="post">
      @csrf

      <div class="mb-3 mt-2">
        <textarea class="fs-6 form-control" rows="2" name="content"></textarea>
        @error('content')
          <span class="fs-6 text-danger mt-1 d-block">{{ $message }}</span>
        @enderror
      </div>

      <div>
        <button type="submit" class="btn btn-primary btn-sm">Post Comment</button>
      </div>
    </form>

    <hr>

    @forelse ($idea->comments as $comment)
      <div class="d-flex align-items-start">
        <img style="width:35px" class="me-2 avatar-sm rounded-circle" src="{{ $comment->user->getImageUrl() }}" alt="{{ $comment->user->name }} Avatar">
        <div class="w-100">
          <div class="d-flex justify-content-between">
            <h6>{{ $comment->user->name }}</h6>
            <small class="fs-6 fw-light text-muted">{{ $comment->created_at->diffForHumans() }}</small>
          </div>
          <p class="fs-6 mt-0 fw-light">
            {{ $comment->content }}
          </p>
        </div>
      </div>
    @empty
      <p class="fs-6 fw-light text-muted">No comments yet...</p>
    @endforelse
  </div>
@endauth