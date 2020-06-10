@foreach($questions as $question)
<div class="post-bar">
                                    <div class="post_topbar">
                                        <div class="usy-dt">
                                            <img src="/uploads/avatars/{{$question->user->avatar}}" width="30" height="30" alt="">
                                            <div class="usy-name">
                                                <h3>{{ $question->user ? $question->user->name : 'not exist'}}</h3>
                                                <span><img src="{{ url('design/style') }}/images/clock.png" alt="">{{$question->created_at}}</span>
                                            </div>
                                        </div>
                                        @if($question->user_id==auth()->id())
                                        <div class="ed-opts">
                                            <a href="#" title="" class="ed-opts-open"><i
                                                    class="la la-ellipsis-v"></i></a>
                                            <ul class="ed-options">
                                                <li><a href="questions/{{$question->id}}/edit" title="">Edit Post</a></li>
                                            </ul>
                                        </div>
                                        @endif
                                    </div>
                                    <div class="epi-sec">
                                        <ul class="descp">
                                            <li><img src="{{ url('design/style') }}/images/icon8.png" alt=""><span>
                                            {{ $question->category ? $question->category->name : 'not exist'}}</span></li>
                                            <li><img src="{{ url('design/style') }}/images/icon9.png"
                                                    alt=""><span>Question</span></li>
                                        </ul>
                                        
                                    </div>
                                    <div class="job_descp">
                                       
                                        <p>{{$question->question}}</p>
                                          
                                    </div>
                                    <div class="job-status-bar">
                                        <ul class="like-com">
                                        @if($question->answers)
                                         @foreach($question->answers as $answer)
                                            <li> <img src="/uploads/avatars/{{$question->user->avatar}}" width="30" height="30" alt=""><h3 style="display:inline">{{$answer->user->name}}</h3>:{{ $answer->answer}}</li></br>
                                         @endforeach
                                         @endif   
                                         
                                        </ul>
                                        </div>
                                        <div class="job-status-bar">
                                        <ul class="like-com">
                                        <li>
                                        <form method="POST" action="{{route('answers.store')}}">   
                                        @csrf
                                        
                                        <input type="hidden" class="form-control" name="question_id" value="{{$question->id}}">
                                        <input type="text" class="form-control" name="answer">
                                        <br/>
                                        <button type="submit" class="btn text-light" style="background-color: #e44d3a;">Create</button>
                                        </form>
                                        <li>
                                        </ul>
                                        </div>
                                    
                                </div>
@endforeach                                