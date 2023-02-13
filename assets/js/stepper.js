$(function(){
  $('.addQualification').click(function(){
    $('.qualification').append(`<div class="card mb-1">
    <span class="position-absolute top-0 end-0 close" data-effect="fadeOut"><i class="bi bi-x-circle"></i></span>
    <div class="card-body">
      <div class="row">
        <div class="col-4">
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Joining Year</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="YYYY">
          </div>
        </div>
        <div class="col-4">
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Completion Year</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="YYYY">
          </div>
        </div>
        <div class="col-4">
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Location</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="New York City, NY">
          </div>
        </div>
        <div class="col-4">
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Degree Awarded</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Bachelor of Technology">
          </div>
        </div>
        <div class="col-8">
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">University / College Name</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Bachelor of Technology">
          </div>
        </div>
        <div class="col-12">
          <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Summary</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
          </div>
        </div>
      </div>
    </div>
  </div>`);
  });
  $('.addJob').click(function(){
    $('.job').append(`<div class="card mb-1">
    <span class="position-absolute top-0 end-0 close" data-effect="fadeOut"><i class="bi bi-x-circle"></i></span>
    <div class="card-body">
      <div class="row">
        <div class="col-4">
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Joining Year</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="YYYY">
          </div>
        </div>
        <div class="col-4">
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Completion Year</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="YYYY">
          </div>
        </div>
        <div class="col-4">
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Location</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="New York City, NY">
          </div>
        </div>
        <div class="col-4">
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Degree Awarded</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Bachelor of Technology">
          </div>
        </div>
        <div class="col-8">
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">University / College Name</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Bachelor of Technology">
          </div>
        </div>
        <div class="col-12">
          <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Summary</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
          </div>
        </div>
      </div>
    </div>
  </div>`);
  });
  $("body").on('click', '.close', function(e){
    e.preventDefault();
    $(this).closest('.card').remove();
    return false;
  });
});