$(function(){
  let editor;
  $('.addQualification').click(function(){
    $('.qualification').append(`<br><div class="card mt-1">
      <div class="d-flex justify-content-between align-items-center"><span>Add New Education</span><span class="border px-3 p-1 close"><i class="fa fa-times"></i>&nbsp;Delete</span></div><br>
      <div class="col-md-12"><label class="labels">University Name</label><input type="text" class="form-control" placeholder="university name" value=""></div> <br>
      <div class="col-md-12"><label class="labels">University Location</label><input type="text" class="form-control" placeholder="university name" value=""></div> <br>
      <div class="col-md-12"><label class="labels">Degree Name</label><input type="text" class="form-control" placeholder="degree name" value=""></div><br>
      <div class="row">
        <div class="col-md-6"><label class="labels">From Date</label><input type="text" class="form-control" placeholder="from date" value=""></div>
        <div class="col-md-6"><label class="labels">To Date</label><input type="text" class="form-control" placeholder="to date" value=""></div>
      </div>
  </div>`);
  });
  $('.addJob').click(function(){
    $('.job').append(`<br><div class="card mt-1">
    <div class="d-flex justify-content-between align-items-center"><span>Add New Experience</span><span class="border px-3 p-1 close"><i class="fa fa-times"></i>&nbsp;Delete</span></div><br>
      <div class="col-md-12"><label class="labels">Organization Name</label><input type="text" class="form-control" placeholder="experience" value=""></div> <br>
      <div class="col-md-12"><label class="labels">Organization Location</label><input type="text" class="form-control" placeholder="experience" value=""></div> <br>
      <div class="col-md-12"><label class="labels">Designation Details</label><input type="text" class="form-control" placeholder="additional details" value=""></div><br>
      <div class="row">
        <div class="col-md-6"><label class="labels">From Date</label><input type="text" class="form-control" placeholder="from date" value=""></div>
        <div class="col-md-6"><label class="labels">To Date</label><input type="text" class="form-control" placeholder="to date" value=""></div>
      </div>
  </div>`);
  });
  $('.addSkill').click(function(){
    $('.skill').append(`<div class="card">
    <div class="row">
      <div class="col-md-6"> <label class="form-label">New Skill Add</label></div>
      <div class="col-md-6 text-end"><span class="close" data-effect="fadeOut"><i class="fa fa-times"></i></span></div>
      <div class="col-md-6"><label class="labels">Skill Name</label><input type="text" class="form-control" placeholder="from date" value=""></div>
      <div class="col-md-6">
        <label class="form-label">Skill Percentage</label>
        <div class="row">
          <div class="col-sm-4">
            <span>0</span>
          </div>
          <div class="col-sm-4 text-center">
            <span>50</span>
          </div>
          <div class="col-sm-4 text-end">
            <span>100</span>
          </div>
        </div>
        <input type="range" class="form-range" min="0" max="100" step="1" id="range-slider" value="0">
        <span id="range-value"></span>
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
    $('#addRole').prop('disabled', true);
    html = `<form class="login" id="submitRole" role="form" novalidate="novalidate">
              <div class="form-group row m-2">
                  <label for="text" class="col-sm-3 control-label">Role * </label>
                  <div class="col-sm-9">
                      <input type="text" id="roleName" placeholder="Enter Role" class="form-control" name="roleName" aria-invalid="false">
                  </div>
              </div>
              <div class="form-group row ms-2">
                  <div class="col-sm-9 col-sm-offset-3">
                      <span class="help-block">*Required fields</span>
                      <input type="hidden" id="role_id" name="operation" value="add">
                  </div>
              </div>
              <div class="d-grid gap-2 col-6 mx-auto">
                  <button class="btn btn-info mt-4 submitButton" type="submit">Add New</button>
              </div>
          </form>`;
    $('.modal-title').html('Add New Role');
    $('.modal-body').html(html);
    $('.modal-footer').hide();
    $('#staticBackdrop').modal('show');
    $('#addRole').prop('disabled', false);
  });
  $("body").on('click', '.editRole', function(e){
    id = $(this).attr("data-id");
    $('.setup').prop('disabled', true); 
    html = `<form class="login" id="submitRole" role="form" novalidate="novalidate">`;
    $.ajax({
        url:'get_role',
        type:"post",
        data:{
          roleId: id,
        },
        success: function(data){
            var data = jQuery.parseJSON(data);
            if(data.status == 1){
                html += `<div class="form-group row m-2">
                          <label for="text" class="col-sm-3 control-label">Role * </label>
                          <div class="col-sm-9">
                              <input type="text" id="roleName" value="${data.data.role_title}" class="form-control" name="roleName" aria-invalid="false">
                          </div>
                      </div>
                      <div class="form-group row ms-2">
                          <div class="col-sm-9 col-sm-offset-3">
                              <span class="help-block">*Required fields</span>
                              <input type="hidden" id="role_id" name="roleId" value="${data.data.role_id}">
                              <input type="hidden" id="role_id" name="operation" value="add">
                          </div>
                      </div>
                      <div class="d-grid gap-2 col-6 mx-auto">
                          <button class="btn btn-info mt-4 submitButton" type="submit">Edit Role</button>
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
    var ele = $(this);
    var id = ele.attr("data-id");
    var status = ele.data("status");
    Swal.fire({
      title: 'Are you sure?',
      text: (status ==  1) ? "You won't be able to revert this!" : "You are going to retrive this role!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: (status ==  1) ? 'Yes, delete it!': 'Yes, retrive it!'
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url:'submit_role',
          type:"post",
          data:{
            roleId: id,
            operation: 'delete',
          },
          success: function(data){
            var data = jQuery.parseJSON(data);
            if(data.status == 1){
              (status ==  1) ? ele.closest("tr").find('.deleteRole').data("status", 0) : ele.closest("tr").find('.deleteRole').data("status", 1);
              html = (status ==  1) ? '<i class="fa fa-check fa-lg m-2"></i>': '<i class="fa fa-trash-o fa-lg m-2"></i>';
              ele.closest("tr").find('.deleteRole').html(html);
              Swal.fire(
                'Deleted!',
                data.msg,
                'success'
              );
            }else{
              Swal.fire(
                'Opps-Error!',
                data.msg,
                'error'
              );
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
      }
    })
  });
  $("body").on('submit', '#submitRole', function(e){
    e.preventDefault();
    $('.submitButton').prop('disabled', true); 
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
              toastr["success"](data.msg, 'Success!!')

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
                $('#staticBackdrop').modal('hide');
            }else{
                $('.submitButton').prop('disabled', false);
                toastr["error"](data.msg, 'Error!!')

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
            $('.submitButton').prop('disabled', false);
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
  //Coupon
  $("body").on('click', '#addCoupon', function(e){
    e.preventDefault();
    $('#addCoupon').prop('disabled', true);
    id = $(this).attr("data-id");
    $.ajax({
      url:'generate_coupon',
      type:"post",
      data:{
        userId: id,
        operation: 'add',
      },
      success: function(data){
          var data = jQuery.parseJSON(data);
          if(data.status == 1){
            toastr["success"](data.msg, 'Success!!')

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
              $('#addCoupon').prop('disabled', false);
          }else{
              $('#addCoupon').prop('disabled', false);
              toastr["error"](data.msg, 'Error!!')

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
          $('#addCoupon').prop('disabled', false);
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
  $("body").on('click', '.deleteCoupon', function(e){
    var ele = $(this);
    var id = ele.attr("data-id");
    var status = ele.data("status");
    Swal.fire({
      title: 'Are you sure?',
      text: (status ==  1) ? "You won't be able to revert this!" : "You are going to retrive this role!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: (status ==  1) ? 'Yes, delete it!': 'Yes, retrive it!'
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url:'generate_coupon',
          type:"post",
          data:{
            couponId: id,
            operation: 'delete',
          },
          success: function(data){
            var data = jQuery.parseJSON(data);
            if(data.status == 1){
              (status ==  1) ? ele.closest("tr").find('.deleteCoupon').data("status", 0) : ele.closest("tr").find('.deleteCoupon').data("status", 1);
              html = (status ==  1) ? '<i class="fa fa-check fa-lg m-2"></i>': '<i class="fa fa-trash-o fa-lg m-2"></i>';
              ele.closest("tr").find('.deleteCoupon').html(html);
              Swal.fire(
                'Deleted!',
                data.msg,
                'success'
              );
            }else{
              Swal.fire(
                'Opps-Error!',
                data.msg,
                'error'
              );
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
      }
    })
  });

  // Datatables
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

  //CK Editor
  editor = DecoupledEditor.create( document.querySelector( '#editor' ) ).then( editor => {
      const toolbarContainer = document.querySelector( '#toolbar-container' );
      toolbarContainer.appendChild( editor.ui.view.toolbar.element );
  } ).catch( error => {
      console.error( error );
  } );

  $("body").on('submit', '#submitBlog', function(e){
    e.preventDefault();
    var url = window.location.href;
    var arguments = url.split('/');
    var formData = new FormData(this);
    formData.append('blogContent',$('#editor').html());
    $.ajax({
      url:(arguments.length == 7) ? '../submit_blog' : 'submit_blog',
      type:"post",
      data: formData,
      processData:false,
      contentType:false,
      cache:false,
      async:false,
      success: function(data){
          var data = jQuery.parseJSON(data);
          if(data.status == 1){
            window.location.href= data.url;
            toastr["success"](data.msg, 'Success!!')

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
          }else{
              $('.submitButton').prop('disabled', false);
              toastr["error"](data.msg, 'Error!!')

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
          $('.submitButton').prop('disabled', false);
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

  //Profile Image Update on Click
  const profileImage = document.getElementById("profile-image");
  const imagePreview = document.querySelector(".rounded-circle");

  profileImage.addEventListener("change", function() {
    const file = this.files[0];
    if (file) {
      const reader = new FileReader();
      reader.addEventListener("load", function() {
        imagePreview.src = this.result;
      });
      reader.readAsDataURL(file);
    }
  });
  
  const rangeSlider = document.getElementById("range-slider");
  const rangeValue = document.getElementById("range-value");

  rangeSlider.addEventListener("input", () => {
    rangeValue.innerText = rangeSlider.value + '%';
  });

  $("body").on('change mousemove', '#range-slider', function(e){
    const rangeSlider = $(this).val();
    console.log(rangeSlider);
    $(this).next("#range-value").html(rangeSlider + '%');
  });

});

