@if($reply->replies->count())
        @foreach ($reply->replies as $replies)
              <div class="d-flex flex-start mt-4">
                {{-- <a class="me-3" href="#"> --}}
                  <img class="rounded-circle shadow-1-strong mr-2"
                    src="{{$replies->user->image_path}}"
                    alt="{{$replies->user->image_name}}"
                    width="65" height="65"/>
                {{-- </a> --}}
                <div class="flex-grow-1 flex-shrink-1">
                    <div class="d-flex justify-content-between align-items-center" id="user-name">
                      <p class="mb-1">
                        {{$replies->user->full_name}} <span>- {{$replies->created_at->diffForHumans()}}</span>
                      </p>
                    </div>
                    <p class="mb-0">
                        {{$replies['body']}}
                    </p>
                    @if (Auth::guard('webuser')->check() == true)
                      <a class="collapsed" data-toggle="collapse" role="button" aria-expanded="false"
                        aria-controls="reply-form-{{$replies->id}}" href="#reply-form-{{$replies->id}}">
                        <i class="fas fa-reply"></i><span> Phản hồi</span>
                      </a>
                      <div class="collapse" id="reply-form-{{$replies->id}}" data-parent="#accordion">
                        <form action="{{ route("comment.store", $slug) }}" method="post" class="p-3 bg-light">
                          @csrf
                            <input type="hidden" name="iduser" value="{{ Auth::guard("webuser")->user()->id }}">
                            <input type="hidden" name="comment_id" id="comment_id" value="{{$replies->id}}">
                            <div class="form-group d-flex flex-start w-100">
                              <img class="rounded-circle shadow-1-strong me-3 mr-1"
                                  src="{{Auth::guard("webuser")->user()->image_path}}"
                                  alt="{{Auth::guard("webuser")->user()->image_name}}"
                                  width="40" height="40"/>
                              <div class="form-outline w-100">
                                <textarea name="body" class="form-control" id="textAreaExample" rows="4"
                                  style="background: #fff;" placeholder="Trả lời {{$replies["userId"]}}..."></textarea>
                              </div>
                            </div>
                            <div class="form-group float-end mt-2 pt-1">
                              <input type="submit" name="sendcmt" value="Gửi" class="btn py-3 px-4 btn-primary">
                            </div>
                        </form>
                      </div>
                    @endif
                </div>
              </div>
              @if($replies->replies->count())
                @include('user.page.cmt.replies', ['reply' => $replies])
              @endif
        @endforeach
@endif
