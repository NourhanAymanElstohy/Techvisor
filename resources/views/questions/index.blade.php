@foreach($questions as $question)
<div class="post-bar">
                                    <div class="post_topbar">
                                        <div class="usy-dt">
                                            <img src="/uploads/avatars/{{$question->user->avatar}}" width="30" height="30" alt="">
                                            <div class="usy-name">
                                                <h3>{{ $question->user ? $question->user->name : 'not exist'}}</h3>
                                                <span><img src="{{ url('design/style') }}/images/clock.png" alt="">3 min
                                                    ago</span>
                                            </div>
                                        </div>
                                        <div class="ed-opts">
                                            <a href="#" title="" class="ed-opts-open"><i
                                                    class="la la-ellipsis-v"></i></a>
                                            <ul class="ed-options">
                                                <li><a href="questions/{{$question->id}}/edit" title="">Edit Post</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="epi-sec">
                                        <ul class="descp">
                                            <li><img src="{{ url('design/style') }}/images/icon8.png" alt=""><span>
                                                    Category Name</span></li>
                                            <li><img src="{{ url('design/style') }}/images/icon9.png"
                                                    alt=""><span>Question</span></li>
                                        </ul>
                                        
                                    </div>
                                    <div class="job_descp">
                                       
                                        <p>{{$question->question}}</p>
                                          
                                    </div>
                                    <div class="job-status-bar">
                                        <ul class="like-com">
                                       
                                            <li>Answers:{{ $question->answer ? $question->answer->answer : ''}}</li>
                                        </ul>
                                    </div>
                                </div>
@endforeach                                