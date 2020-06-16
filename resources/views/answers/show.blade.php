<div class="post-bar">
<div class="post_topbar">
<div class="job_descp">
<div class="container">
  <div class="p-3" style="text-align:center">
 

      <div class="card mt-5 " >
              <div class="card-body">
              @if($answer->question)
              <h5 class="card-title">{{$answer->question->question}}</h5>
                <p class="card-text">user name:{{ $answer->question->user ? $answer->question->user->name : 'not exist'}}</p>
                <p class="card-text"><td>{{$answer->user->name }} answer by: {{$answer->answer}}</td></p>
              @else
              <h1 class="card-title">question not found</h1>
              </div>
              @endif
      </div>
  </div> 
      
</div>
</div>
</div>
</div>
