
<div class="row mt-3">
    <div class="col col-sm-12 col-md-4">
      <div class="form-group">

        <select x-on:change="if($event.target.value == 'SDA'){open=!open;sda=false;}else{open=false;};subjects.forEach(function(item){
          if(item.subject == $event.target.value){
            item.selected = true;
          }
        })" name="{{$subjectname}}" id="" class="form-control" required>
          <option value="" selected disabled>Select Subject</option>

          <template x-for="(subject, index) in subjects">
            <option x-show="!subject.selected" x-bind:id="index" x-bind:value="subject.subject" x-text="subject.subject"></option>
          </template>
        
        </select>
      </div>
    </div>

    <div class="col col-sm-12 col-md-4">
      <div class="form-group">
        <select name="{{$gradename}}" id="" class="form-control" required>
            <option value="" disabled selected>Select Grade</option>
            <option x-show="!open" value="A*">A*</option>
            <option x-show="!open" value="A">A</option>
            <option x-show="!open" value="B">B</option>
            <option x-show="!open" value="C">C</option>
            <option x-show="!open" value="D">D</option>
            <option x-show="!open" value="E">E</option>
            <option x-show="!open" value="F">F</option>
            <option x-show="open" value="A*A*">A*A*</option>
            <option x-show="open" value="AA">AA</option>
            <option x-show="open" value="BB">BB</option>
            <option x-show="open" value="CC">CC</option>
            <option x-show="open" value="DD">DD</option>
            <option x-show="open" value="EE">EE</option>
            <option x-show="open" value="FF">FF</option>
        </select>
      </div>
    </div>

  </div>

  <script >
    let x = [ {subject:'Mathematics',selected:false}, 
  {subject:'Additional Mathematics',selected:false}, 
  {subject:'Chemistry',selected:false}, 
  {subject:'Biology',selected:false}, 
  {subject:'Physics',selected:false},
  {subject:'English', selected:false},
  {subject:'Setswana', selected:false},
  {subject:'SDA', selected:false}, 
  {subject:'Geography',selected:false}, 
  {subject:'History', selected:false}, 
  {subject:'French',selected:false}, 
  {subject:'Art',selected:false}, 
  {subject:'Music',selected:false}, 
  {subject:'Religious Education',selected:false},
  {subject:'Business Studies', selected:false}, 
  {subject:'Agriculture', selected:false}, 
  {subject:'Commerce',selected:false}, 
  {subject:'Accounting',selected:false}, 
  {subject:'Food and Nutrition',selected:false}, 
  {subject:'Design and Technology',selected:false},
  {subject:'Computer Studies',selected:false}, 
  {subject:'Physical Education',selected:false}, 
  {subject:'Fashion and Fabrics',selected:false}, 
  {subject:'Social Studies',selected:false}, 
  {subject:'English Literature',selected:false}]



  let d = x.filter(function(item){
    return item.subject == 'Mathematics';
  })
  console.log(d);

  //change English slected to true
  x.forEach(function(item){
    if(item.subject == 'English'){
      item.selected = true;
    }
  })


  </script>


