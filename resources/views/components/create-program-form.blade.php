<div>
    @php
     $degrees = ['Bachelor of Science', 'Bachelor of Arts', 'Bachelor of Finance'];
     $types = ['Associate Degree', 'Bachelor\'s Degree', 'Honours Degree', 'Professional Degree'];
     $faculties = ['science', 'arts', 'finance', 'engineering', 'medicine', 'business', 'social-science', 'law', 'education'];
    @endphp
    <form action="/admin/program/add" method="POST">
        @csrf
<div class="row">
    <div class="col col-sm-12 col-md-4">
      <div class="form-group">

            <select name="degree" class="form-control" required>
            <option value="" selected disabled>Select Degree</option>
                @foreach($degrees as $degree)
                    <option value="{{$degree}}">{{$degree}}</option>
                @endforeach
            </select>
      </div>
    </div>

    <div class="col col-sm-12 col-md-4">
        <div class="form-group">
            <input name="name" placeholder="Program Title" type="text" class="form-control" required>
        </div>
      </div>
    <div class="col col-sm-12 col-md-4">
      <div class="form-group">
        <select name="type" id="" class="form-control" required>
            <option value="" disabled selected>Select Type</option>
            @foreach($types as $type)
                <option value="{{$type}}">{{$type}}</option>
            @endforeach
            
        </select>
      </div>
    </div>
    <div class="col col-sm-12 col-md-12 mt-2 mb-2">
        <div class="form-group">
          <textarea required placeholder="Program Description" class="form-control" name="description" id="" cols="30" rows="5"></textarea>
        </div>
      </div>

      <div class="col col-sm-12 col-md-4">
        <div class="form-group">
            <input name="duration" placeholder="Program Duration (Years)" type="number" min=2 max=6 class="form-control" required>
        </div>
      </div>

      <div class="col col-sm-12 col-md-4">
        <div class="form-group">
            <input name="min_points" placeholder="Minimum Entry Points" type="number" min=30 max=48 class="form-control" required>
        </div>
      </div>

      <div class="col col-sm-12 col-md-4">
        <div class="form-group">
          <select name="faculty" id="" class="form-control" required>
              <option value="" disabled selected>Select Faculty</option>
              @foreach($faculties as $faculty)
                  <option value="{{$faculty}}">{{$faculty}}</option>
              @endforeach
              
          </select>
        </div>
      </div>

    <div class="col col-sm-12 mt-2">
        <div class="form-group">
          <button type="submit" class="btn btn-warning">Add Program</button>
        </div>
      </div>

  </div>

    </form>
</div>

