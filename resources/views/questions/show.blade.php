<div class="posty">
    <div class="post-bar">
        <div class="post_topbar">
            <div class="usy-dt">
                <img src="/uploads/avatars/{{$question->user->avatar}}" width="30" height="30" alt="">
                <div class="usy-name">
                    <h3>{{ $question->user ? $question->user->name : 'not exist'}}</h3>
                    <span><img src="/workwise-new/images/clock.png" alt="">{{$question->created_at}}</span>
                </div>
            </div>
            @if($question->user_id==auth()->id())
                <div class="ed-opts">
                    <a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
                    <ul class="ed-options">
                        <li><a href="questions/{{$question->id}}/edit" title="">Edit Post</a></li>
                    </ul>
                </div>
            @endif
        </div>
        <div class="epi-sec">
            <ul class="descp">
                <li><img src="/workwise-new/images/icon8.png" alt=""><span>
                        {{ $question->category ? $question->category->name : 'not exist'}}</span></li>
                <li><img src="/workwise-new/images/icon9.png" alt=""><span>Question</span></li>
            </ul>
        </div>
        <div class="job_descp">
            <p>{{$question->question}}</p>
        </div>

        <div class="job-status-bar">
            @if($question->answers)
                <?php $count=0 ; ?>
                @foreach($question->answers as $answer)
                    <?php  $count = $count+1 ?>
                @endforeach
            @endif
            <ul class="like-com">
                <li><a href="{{route('questions.show',['question'=> $question->id])}}" class="com">
                        <i class="fas fa-comment-alt"></i> Comment <?php echo $count ?></a></li>
            </ul>
        </div>
        <!--post-bar end-->
        @if($question->answers )
            @foreach($question->answers as $answer)
                <div class="comment-section">
                    <div class="comment-sec">
                        <ul>
                            <li>
                                <div class="comment-list">
                                    <div class="bg-img">
                                        <img src="/workwise-new/images/resources/bg-img1.png" alt="">
                                    </div>

                                    <div class="comment">
                                        <div class="usy-dt">
                                            <img src="/uploads/avatars/{{$answer->user->avatar}}" width="30" height="30" alt="">
                                        </div>
                                        <h3>{{$answer->user->name}}</h3>
                                        <span><img src="/workwise-new/images/clock.png" alt=""> {{$answer->created_at}}</span>
                                        <p >{{ $answer->answer}}</p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                
            @endforeach
        @endif
        
                    <div class="post-comment">
                        <div class="usy-dt mr-2">
                            <img src="/uploads/avatars/{{auth()->user() ? auth()->user()->avatar : ''}}" width="35" height="35" alt="">
                        </div>
                        <div class="comment_box">
                            <form method="POST" action="{{route('answers.store')}}">
                                @csrf
                                <input id="q-input" type="hidden" class="form-control" name="question_id"
                                    value="{{$question->id}}">
                                <input type="text" placeholder="Post a comment" name="answer" required>
                                <button type="submit">Comment</button>
                            </form>
                        </div>
                    </div>
                </div>
    </div>
</div>

