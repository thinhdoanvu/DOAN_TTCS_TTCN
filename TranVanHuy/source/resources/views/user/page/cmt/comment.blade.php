<div class="pt-5 mt-5">
  <div class="comment-form-wrap pt-3 mb-5" id="comment-form">
    <h3 class="mb-3">Để lại bình luận</h3>
    <form action="{{ route('comment.store', $slug) }}" method="post" id="algin-form" class="p-4 bg-light">
      @csrf
      <input type="hidden" name="iduser"
        value="@php
            if(Auth::guard('webuser')->check() == false){
              echo "";
            }else {
              $user_id = Auth::guard('webuser')->user()->id;
              echo $user_id;
            }
          @endphp">
      <div class="form-group">
          <label for="message">Bình luận</label>
          <textarea name="body" id="comment" msg cols="30" rows="3" class="form-control" style="background-color: black;"></textarea>
      </div>
      <div class="form-group">
          <input type="submit" name="sendcmt" value="Gửi" class="btn btn-primary">
      </div>
    </form>
  </div>
  {{-- <h3 class="mb-3">6 Bình luận</h3> --}}
  <div id="accordion">
      @forelse ($comments as $comment)
        @if($comment->parent_id == null)
          <div class="row">
            <div class="col">
              <div class="d-flex flex-start mt-4">
                <img class="rounded-circle shadow-1-strong me-3 mr-2"
                  src="{{$comment->user->image_path}}" alt="{{$comment->user->image_name}}" width="65" height="65"/>
                <div class="flex-grow-1 flex-shrink-1">
                    <div class="d-flex justify-content-between align-items-center" id="user-name">
                      <p class="mb-1">
                        {{$comment->user->full_name}}<span> - {{$comment->created_at->diffForHumans()}}</span>
                      </p>
                    </div>
                    <p class="mb-0">
                      {{$comment['body']}}
                    </p>
                    @if (Auth::guard('webuser')->check() == true)
                      <a class="collapsed" data-toggle="collapse" role="button" aria-expanded="false"
                        aria-controls="reply-form-{{$comment->id}}" href="#reply-form-{{$comment->id}}" >
                        <i class="fas fa-reply"></i><span> Phản hồi</span>
                      </a>
                      <div class="collapse" id="reply-form-{{$comment->id}}" data-parent="#accordion">
                        <form action="{{ route("comment.store", $slug) }}" method="post" class="p-3 bg-light">
                          @csrf
                            <input type="hidden" name="iduser"
                            value="{{ Auth::guard("webuser")->user()->id }}">
                            <input type="hidden" name="comment_id" id="comment_id" value="{{$comment->id}}">
                            <div class="form-group d-flex flex-start w-100">
                              <img class="rounded-circle shadow-1-strong me-3 mr-1"
                                  src="{{ Auth::guard("webuser")->user()->image_path }}"
                                  alt="{{ Auth::guard("webuser")->user()->image_name }}"
                                  width = "40" height = "40"/>
                              <div class="form-outline w-100">
                                <textarea name="body" class="form-control" id="textAreaExample" rows="3"
                                  style="background: #fff;" placeholder="Trả lời {{$comment["userId"]}}..."></textarea>
                              </div>
                            </div>
                            <div class="form-group float-end mt-2 pt-1">
                              <input type="submit" name="sendcmt" value="Gửi" class="btn py-3 px-4 btn-primary">
                            </div>
                        </form>
                      </div>
                    @endif
                  @include('user.page.cmt.replies', ['reply' => $comment])
                </div>
              </div>
            </div>
          </div>
        @endif
      @empty
      @endforelse
  </div>
  <!-- END comment-list -->
</div>

<script>
  function getCommentid($value){
    document.getElementById('comment_id').value= $value;
  }
</script>
