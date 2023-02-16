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
  $("body").on('click', '#addRole', function(e){
    html = `<form class="login" id="login" role="form" novalidate="novalidate">
    <div class="form-group row m-2">
        <label for="text" class="col-sm-3 control-label">Role * </label>
        <div class="col-sm-9">
            <input type="text" id="username" placeholder="Enter Role" class="form-control valid text-success" name="username" aria-invalid="false">
        </div>
    </div>
    <div class="form-group row ms-2">
        <div class="col-sm-9 col-sm-offset-3">
            <span class="help-block">*Required fields</span>
        </div>
    </div>
    <div class="d-grid gap-2 col-6 mx-auto">
        <button class="btn btn-info mt-4 addRole" type="submit">
            Add New
        </button>
    </div>
</form>`;
    $('.modal-title').html('Add New Role');
    $('.modal-body').html(html);
    $('.modal-footer').hide();
    $('#staticBackdrop').modal('show');
  });
});

// Datatables
$(document).ready(function() {
  var table = $('#example').DataTable();

  $("#example tfoot th").each( function ( i ) {
      var select = $('<select><option value=""></option></select>')
          .appendTo( $(this).empty() )
          .on( 'change', function () {
              var val = $(this).val();

              table.column( i )
                  .search( val ? '^'+$(this).val()+'$' : val, true, false )
                  .draw();
          } );

      table.column( i ).data().unique().sort().each( function ( d, j ) {
          select.append( '<option value="'+d+'">'+d+'</option>' )
      } );
  } );
} );