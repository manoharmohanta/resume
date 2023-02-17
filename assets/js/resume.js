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
  //Role Page Options
  $("body").on('click', '#addRole', function(e){
    html = `<form class="login" id="submitRole" role="form" novalidate="novalidate">
              <div class="form-group row m-2">
                  <label for="text" class="col-sm-3 control-label">Role * </label>
                  <div class="col-sm-9">
                      <input type="text" id="rolename" placeholder="Enter Role" class="form-control" name="username" aria-invalid="false">
                  </div>
              </div>
              <div class="form-group row ms-2">
                  <div class="col-sm-9 col-sm-offset-3">
                      <span class="help-block">*Required fields</span>
                  </div>
              </div>
              <div class="d-grid gap-2 col-6 mx-auto">
                  <button class="btn btn-info mt-4" type="submit">
                      Add New
                  </button>
              </div>
          </form>`;
    $('.modal-title').html('Add New Role');
    $('.modal-body').html(html);
    $('.modal-footer').hide();
    $('#staticBackdrop').modal('show');
  });
  $("body").on('click', '.editRole', function(e){
    id = $(this).attr("data-id");
    $('.setup').prop('disabled', true); 
    html = `<form class="login" id="submitRole" role="form" novalidate="novalidate">`;
    $.ajax({
        url:'get_role',
        type:"post",
        data:{
          id: id,
        },
        // processData:false,
        // contentType:false,
        // cache:false,
        // async:false,
        success: function(data){
            var data = jQuery.parseJSON(data);
            if(data.status == 1){
                html += `<div class="form-group row m-2">
                          <label for="text" class="col-sm-3 control-label">Role * </label>
                          <div class="col-sm-9">
                              <input type="text" id="rolename" value="${data.data.role_title}" class="form-control" name="username" aria-invalid="false">
                          </div>
                      </div>
                      <div class="form-group row ms-2">
                          <div class="col-sm-9 col-sm-offset-3">
                              <span class="help-block">*Required fields</span>
                              <input type="hidden" id="role_id" name="role_id" value="${data.data.role_id}">
                          </div>
                      </div>
                      <div class="d-grid gap-2 col-6 mx-auto">
                          <button class="btn btn-info mt-4" type="submit">
                              Edit Role
                          </button>
                      </div>
                  </form>`;
                  $('.modal-title').html('Edit Role');
                  $('.modal-body').html(html);
                  $('.modal-footer').hide();
                  $('#staticBackdrop').modal('show');
            }else{
                $('.setup').prop('disabled', false);
                toastr["error"](data.msg, e)

                toastr.options = {
                    "closeButton": false,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": true,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                }
            }
        },
        error: function (jqXHR, exception) {
            $('.setup').prop('disabled', false);
            var msg = '';
            if (jqXHR.status === 0) {
                msg = 'Not connect.\n Verify Network.';
            } else if (jqXHR.status == 404) {
                msg = 'Requested page not found. [404]';
            } else if (jqXHR.status == 500) {
                msg = 'Internal Server Error [500].';
            } else if (exception === 'parsererror') {
                msg = 'Requested JSON parse failed.';
            } else if (exception === 'timeout') {
                msg = 'Time out error.';
            } else if (exception === 'abort') {
                msg = 'Ajax request aborted.';
            } else {
                msg = 'Uncaught Error.\n' + jqXHR.responseText;
            }
            toastr["error"](msg, e)

            toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": false,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
        },
      });
  });
  $("body").on('click', '.deleteRole', function(e){
    Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.isConfirmed) {
        Swal.fire(
          'Deleted!',
          'Your file has been deleted.',
          'success'
        )
      }
    })
  });
  $("body").on('submit', '#submitRole', function(e){
    e.preventDefault();
    $('.setup').prop('disabled', true); 
    $.ajax({
        url:'submit_role',
        type:"post",
        data:new FormData(this),
        processData:false,
        contentType:false,
        cache:false,
        async:false,
        success: function(data){
            var data = jQuery.parseJSON(data);
            if(data.status == 1){
                window.location.href= data.url;
            }else{
                $('.setup').prop('disabled', false);
                toastr["error"](data.msg, e)

                toastr.options = {
                    "closeButton": false,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": true,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                }
            }
        },
        error: function (jqXHR, exception) {
            $('.setup').prop('disabled', false);
            var msg = '';
            if (jqXHR.status === 0) {
                msg = 'Not connect.\n Verify Network.';
            } else if (jqXHR.status == 404) {
                msg = 'Requested page not found. [404]';
            } else if (jqXHR.status == 500) {
                msg = 'Internal Server Error [500].';
            } else if (exception === 'parsererror') {
                msg = 'Requested JSON parse failed.';
            } else if (exception === 'timeout') {
                msg = 'Time out error.';
            } else if (exception === 'abort') {
                msg = 'Ajax request aborted.';
            } else {
                msg = 'Uncaught Error.\n' + jqXHR.responseText;
            }
            toastr["error"](msg, e)

            toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": false,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
        },
    });
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