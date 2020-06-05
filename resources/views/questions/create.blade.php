<div class="post-popup job_post">
        <div class="post-project">
            <h3>Post a Question</h3>
            <div class="post-project-fields">
                <form method="POST" action="{{route('questions.store')}}">
                  @csrf
                
                @if ($prof)
                  <input type="hidden" class="form-control" name="prof" value="{{$prof}}">
                @else
                  <div class="form-group mt-5">
                    <label for="exampleFormControlSelect1">Users</label>
                      <select name="prof" class="form-control ">
                        @foreach($users as $user)  
                          <option value="{{$user->id}}">{{$user->name}}</option>
                        @endforeach
                      </select> 
                  </div>
                @endif
                
                    <div class="row">
                        <div class="col-lg-12">
                            <textarea name="question" placeholder="Question" class="text-dark"></textarea>
                        </div>
                        <div class="col-lg-12">
                            <ul>
                                <li><button class="active" type="submit" value="post">Post</button></li>
                                <li><a href="#" title="">Cancel</a></li>
                            </ul>
                        </div>
                    </div>
                </form>
            </div>
            <a href="#" title=""><i class="la la-times-circle-o"></i></a>
        </div>
    </div>









