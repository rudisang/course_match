@php
  $subjects = [ 'Mathematics', 
  'Additional Mathematics', 
  'Chemistry', 
  'Biology', 
  'Physics',
  'English', 
  'Setswana', 
  'SDA',  
  'Geography', 
  'History',  
  'French', 
  'Art', 
  'Music', 
  'Religious Education',
  'Business Studies',  
  'Agriculture',  
  'Commerce', 
  'Accounting', 
  'Food and Nutrition', 
  'Design and Technology',
  'Computer Studies', 
  'Physical Education', 
  'Fashion and Fabrics', 
  'Social Studies', 
  'English Literature',];
  $program = \App\Models\Program::find($digit);
      $requirements = $program->requirements;
@endphp
<div class="modal fade" id="{{$id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">{{$name}}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="/admin/requirement/add" method="POST">
          @csrf
          <input type="hidden" name="program_id" value="{{$digit}}">
        <div class="modal-body">
          <div class="form-group">
            <select name="subject" class="form-control" required>
              <option value="" selected disabled>Select Required Subject</option>
                  @foreach($subjects as $subject)
                      <option value="{{$subject}}">{{$subject}}</option>
                  @endforeach
              </select>
          </div>
          <div class="form-group mt-3">
            <input name="min_points" placeholder="Min Points" type="number" min=2 max=16 class="form-control">
          </div>
          
        </div>
        <div class="modal-footer">
          
          <button type="submit" class="btn btn-dark">Save</button>
        </div>
        
      </form>
      <div>
        
      </div>
      </div>
    </div>
</div>