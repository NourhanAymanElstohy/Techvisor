{{-- @foreach ($users as $user) --}}
     @foreach ($questions as $question)
         {{-- @if($question->user->id == $user->id) --}}
        <div class="posts-section">
            <div class="post-bar">
                <div class="post_topbar">
                    <div class="usy-dt">
                        <img src="/uploads/avatars/{{$question->user->avatar}}" alt="" width="30" height="30">
                        <div class="usy-name">
                        <h3>{{$question->user->name}}</h3>
                            <span><img src="{{ url('design/style') }}/images/clock.png" alt="">{{$question->created_at}}
                                ago</span>
                        </div>
                    </div>
                    <div class="ed-opts">
                        <a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
                        <ul class="ed-options">
                            <li><a href="#" title="">Edit Post</a></li>
                        </ul>
                    </div>
                </div>
                <div class="epi-sec">
                    <ul class="descp">
                        <li><img src="{{ url('design/style') }}/images/icon8.png" alt=""><span>
                                Category Name</span></li>
                        <li><img src="{{ url('design/style') }}/images/icon9.png" alt=""><span>Question</span></li>
                    </ul>
                </div>
                <div class="job_descp">

                    <p>{{$question->question}}</p>
                </div>
                <div class="job-status-bar">
                    <ul class="like-com">

                        <li><a href="#" class="com"><i class="fas fa-comment-alt"></i> Answers</a></li>
                    </ul>
                </div>
            </div>
        </div>
    {{-- @else
    @endif
    @endforeach --}}
@endforeach
   
