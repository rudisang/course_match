@php
    $program = \App\Models\Program::find($digit);
    $requirements = $program->requirements;
@endphp
<div class="modal fade" id="{{$id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">{{$name}} Core Requirements</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <ul>
                @foreach ($requirements as $requirement)
                    <li>
                        <a>Subject: {{$requirement->subject}}</a>
                        <br>
                        <a>Min Points: {{$requirement->min_points}}</a>
                        <br>
                        <a>Added: {{$requirement->created_at->diffForHumans()}}</a>
                        <br>
                        <a><button class="btn btn-dark">delete</button></a>
                    </li>
                    <hr>
                @endforeach
            </ul>
        </div>

        <div class="modal-footer">
          
        </div>
      </div>
    </div>
</div>


