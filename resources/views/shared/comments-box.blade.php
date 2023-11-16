<div>
  <form action="{{ route('ideas.comment.store', $idea->id) }}" method="post">
    @csrf

    <div class="mb-3">
      <textarea class="fs-6 form-control" rows="1" name="content"></textarea>
    </div>

    <div>
      <button type="submit" class="btn btn-primary btn-sm">Post Comment</button>
    </div>
  </form>
  <hr>

  @foreach ($idea->comments as $comment)
    <div class="d-flex align-items-start">
      <img style="width:35px" class="me-2 avatar-sm rounded-circle"
        src="https://api.dicebear.com/6.x/fun-emoji/svg?seed=Luigi" alt="Luigi Avatar">
      <div class="w-100">
        <div class="d-flex justify-content-between">
          <h6 class="">Luigi
          </h6>
          <small class="fs-6 fw-light text-muted">{{ $comment->created_at }}</small>
        </div>
        <p class="fs-6 mt-3 fw-light">
          {{ $comment->content }}
        </p>
      </div>
    </div>
  @endforeach
</div>