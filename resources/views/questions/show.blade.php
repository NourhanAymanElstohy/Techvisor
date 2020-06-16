<div class="posty">
    <div class="post-bar">
        <div class="post_topbar">
            <div class="usy-dt">
                <img src="/uploads/avatars/{{$question->user->avatar}}" width="30" height="30" alt="">
                <div class="usy-name">
                    <h3>{{ $question->user ? $question->user->name : 'not exist'}}</h3>
                    <span><img src="/design/style/images/clock.png" alt="">{{$question->created_at}}</span>
                </div>
            </div>
            @if($question->user_id==auth()->id())
            <div class="ed-opts">
                <a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
                <ul class="ed-options">
                    <li><a href="/questions/{{$question->id}}/edit" title="">Edit Post</a></li>
                    
        <a class="float-left text-dark" href="#" role="button" data-toggle="modal"
         data-target="#delete-modal-{{$question->id}}"  class="float-left mr-2">Delete</a>
         </ul>
            </div>
         <div class="modal fade" id="delete-modal-{{$question->id}}" tobindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document" >
              <div class="modal-content">
                <form method="POST"  action="{{route('questions.destroy',$question->id)}}"
                class="float-left">
                  @csrf
                  @method('DELETE')
                  <div class="modal-header">
                    <h5 class="modal-title text-light">Delete question #{{$question->id}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true" >
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body mb-3 mt-3 ml-2">
                    Click delete to delete the question!
                    
                  </div>
                  <div class="modal-body mb-3" style="margin-left: 185px;">
                    <button type="button" class="btn btn-secondary mr-3" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger  mr-2">Delete</button>
                  </div>
                </form>
            
          </div>
        </div>
      </div> 
                
            @endif
        </div>
        <div class="epi-sec">
            <ul class="descp">
                <li><img src="/design/style/images/icon8.png" alt=""><span>
                        {{ $question->category ? $question->category->name : 'not exist'}}</span></li>
                <li><img src="/design/style/images/icon9.png" alt=""><span>Question</span></li>
            </ul>
        </div>
        <div class="job_descp" style="   display: block;/* or inline-block */
                text-overflow: ellipsis;
                word-wrap: break-word;
                overflow: hidden;
                max-height: 10em;
                line-height: 1.8em;">
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
                                        <img src="/design/style/images/resources/bg-img1.png" alt="">
                                    </div>

                                    <div class="comment">
                                        <div class="usy-dt">
                                            <img src="/uploads/avatars/{{$answer->user->avatar}}" width="30" height="30" alt="">
                                        </div>
                                        <h3>{{$answer->user->name}}</h3>
                                        <span><img src="/design/style/images/clock.png" alt=""> {{$answer->created_at}}</span>
                                        <p style="max-width:200px;
                                            word-wrap:break-word;" >{{ $answer->answer}}</p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                
            @endforeach
        @endif
                    <div class="post-comment mt-3">
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
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
            
                            </form>
                        </div>
                    </div>
                </div>
    </div>
</div>

