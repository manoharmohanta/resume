$(function(){
  let editor;
  $('.editQualification').click(function(){
    $('.qualification').append(`<br><div class="card mt-1">
      <div class="d-flex justify-content-between align-items-center"><span>Add New Education</span><span class="border px-3 p-1 close"><i class="fa fa-times"></i>&nbsp;Delete</span></div><br>
      <div class="col-md-12"><label class="labels">University Name</label><input type="text" name="university_name[]" class="form-control" placeholder="university name" value=""></div> <br>
      <div class="col-md-12"><label class="labels">University Location</label><input type="text" name="university_location[]" class="form-control" placeholder="university name" value=""></div> <br>
      <div class="col-md-12"><label class="labels">Degree Name</label><input type="text" class="form-control" name="degree_name[]" placeholder="degree name" value=""></div><br>
      <div class="row">
        <div class="col-md-6"><label class="labels">From Date</label><input type="text" name="university_from_date[]" class="form-control" placeholder="from date" value=""></div>
        <div class="col-md-6"><label class="labels">To Date</label><input type="text" name="university_to_date[]" class="form-control" placeholder="to date" value=""></div>
      </div>
  </div>`);
  });
  $('.editJob').click(function(){
    $('.job').append(`<br><div class="card mt-1">
    <div class="d-flex justify-content-between align-items-center"><span>Add New Experience</span><span class="border px-3 p-1 close"><i class="fa fa-times"></i>&nbsp;Delete</span></div><br>
      <div class="col-md-12"><label class="labels">Organization Name</label><input type="text" name="organization_name[]" class="form-control" placeholder="experience" value=""></div> <br>
      <div class="col-md-12"><label class="labels">Organization Location</label><input type="text" name="organization_location[]" class="form-control" placeholder="experience" value=""></div> <br>
      <div class="col-md-12"><label class="labels">Designation Details</label><input type="text" name="organization_designation[]" class="form-control" placeholder="additional details" value=""></div><br>
      <div class="row">
        <div class="col-md-6"><label class="labels">From Date</label><input type="text" name="organization_from_date[]" class="form-control" placeholder="from date" value=""></div>
        <div class="col-md-6"><label class="labels">To Date</label><input type="text" name="organization_to_date[]" class="form-control" placeholder="to date" value=""></div>
      </div>
  </div>`);
  });
  $('.editSkill').click(function(){
    html = `<form class="login" id="submitSkill" role="form" novalidate="novalidate">
      <div class="card">
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
        <div class="d-grid gap-2 col-6 mx-auto">
            <button class="btn btn-info mt-4 submitButton" type="submit">Edit Skill</button>
        </div>
      </div>
    </form>`;
    $('.modal-title').html('Edit Skill');
    $('.modal-body').html(html);
    $('.modal-footer').hide();
    $('#staticBackdrop').modal('show');
    $('.editSkill').prop('disabled', false);
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
  $("body").on('submit', '#submitProfile', function(e){
    e.preventDefault();
    $('.submitButton').prop('disabled', true); 
    $.ajax({
        url:'submit_profile',
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
  $("body").on('submit', '#submitEducation', function(e){
    e.preventDefault();
    $('.submitButton').prop('disabled', true); 
    $.ajax({
        url:'submit_education',
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
  $("body").on('click', '.editEducation', function(e){
    var ele = $(this); $('.editEducation').prop('disabled', true);
    var id = ele.attr("data-id");    var db = ele.attr("data-db");
    $.ajax({
        url:'get',
        type:"post",
        data:{
            id: id,
            db: db,
        },
        success: function(data){
        var data = jQuery.parseJSON(data);
        if(data.status == 1){
            html = `<form class="profile" id="submitEducation" role="form" novalidate="novalidate">
            <input type="text" value="add" name="operation" hidden>
            <input type="text" value="${id}" name="id" hidden>
            <div class="col-md-12"><label class="labels">University Name</label><input type="text" class="form-control" name="university_name" placeholder="university name" value="${data.data.university_name}"></div> <br>
            <div class="col-md-12"><label class="labels">University Location</label><input type="text" class="form-control" name="university_location" placeholder="university location" value="${data.data.university_location}"></div> <br>
            <div class="col-md-12"><label class="labels">Degree Name</label><input type="text" class="form-control" name="degree_name" placeholder="degree name" value="${data.data.degree_name}"></div><br>
            <div class="row">
              <div class="col-md-6"><label class="labels">From Date</label><input type="text" class="form-control" name="university_from_date" placeholder="from date" value="${data.data.education_from_date}"></div>
              <div class="col-md-6"><label class="labels">To Date</label><input type="text" class="form-control" name="university_to_date" placeholder="to date" value="${data.data.education_to_date}"></div>
            </div>
            <div class="mt-3 text-center"><button class="waves-effect waves-light btn btn-info submitEducation" type="submit">Save Education Details</button></div>
          </form>`;
          $('.modal-title').html(`Edit ${data.data.university_name} Details`);
          $('.modal-body').html(html);
          $('.modal-footer').hide();
          $('#staticBackdrop').modal('show');
          $('.editEducation').prop('disabled', false);
        }else{
            $('.editEducation').prop('disabled', false);
            Swal.fire(
                'Opps-Error!',
                data.msg,
                'error'
            );
        }
        },
        error: function (jqXHR, exception) {
            $('.editEducation').prop('disabled', false);
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
  $("body").on('submit', '#submitJob', function(e){
    e.preventDefault();
    $('.submitButton').prop('disabled', true); 
    $.ajax({
        url:'submit_experience',
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
  $("body").on('click', '.editOrganization', function(e){
    var ele = $(this); $('.editOrganization').prop('disabled', true);
    var id = ele.attr("data-id");    var db = ele.attr("data-db");
    $.ajax({
        url:'get',
        type:"post",
        data:{
            id: id,
            db: db,
        },
        success: function(data){
        var data = jQuery.parseJSON(data);
        if(data.status == 1){
            html = `<form class="profile" id="submitJob" role="form" novalidate="novalidate">
            <input type="text" value="add" name="operation" hidden>
            <input type="text" value="${id}" name="id" hidden>
            <div class="col-md-12"><label class="labels">Organization Name</label><input type="text" class="form-control" name="organization_name" placeholder="experience" value="${data.data.organization_name}"></div> <br>
            <div class="col-md-12"><label class="labels">Organization Location</label><input type="text" class="form-control" name="organization_location" placeholder="experience" value="${data.data.organization_location}"></div> <br>
            <div class="col-md-12"><label class="labels">Designation Details</label><input type="text" class="form-control" name="organization_designation" placeholder="additional details" value="${data.data.organization_designation}"></div><br>
            <div class="row">
              <div class="col-md-6"><label class="labels">From Date</label><input type="text" class="form-control" name="organization_from_date" placeholder="from date" value="${data.data.organization_from_date}"></div>
              <div class="col-md-6"><label class="labels">To Date</label><input type="text" class="form-control" name="organization_to_date" placeholder="to date" value="${data.data.organization_to_date}"></div>
            </div>
            <div class="mt-3 text-center"><button class="waves-effect waves-light btn btn-info submitButton" type="submit">Save Experience Details</button></div>
          </form>`;
          $('.modal-title').html(`Edit ${data.data.organization_name} Details`);
          $('.modal-body').html(html);
          $('.modal-footer').hide();
          $('#staticBackdrop').modal('show');
          $('.editOrganization').prop('disabled', false);
        }else{
            $('.editOrganization').prop('disabled', false);
            Swal.fire(
                'Opps-Error!',
                data.msg,
                'error'
            );
        }
        },
        error: function (jqXHR, exception) {
            $('.editOrganization').prop('disabled', false);
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
  $("body").on('submit', '#submitSkill', function(e){
    e.preventDefault();
    $('.submitButton').prop('disabled', true); 
    $.ajax({
        url:'submit_skill',
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
  $("body").on('click', '.editSkill', function(e){
    var ele = $(this); $('.editSkill').prop('disabled', true);
    var id = ele.attr("data-id");    var db = ele.attr("data-db");
    $.ajax({
        url:'get',
        type:"post",
        data:{
            id: id,
            db: db,
        },
        success: function(data){
        var data = jQuery.parseJSON(data);
        if(data.status == 1){
            html = `<form class="profile" id="submitSkill" role="form" novalidate="novalidate">
            <input type="text" value="add" name="operation" hidden>
            <input type="text" value="${id}" name="id" hidden>
            <div class="row skill">
              <div class="col-md-6"><label class="labels">Skill Name</label><input type="text" name="skill_name" class="form-control" placeholder="sikll" value="${data.data.skill_name}"></div>
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
                <input type="range" name="skill_percentage" class="form-range" min="0" max="100" step="1" id="range-slider" value="${data.data.skill_percentage}">
                <span id="range-value"></span>
              </div>
            </div>
            <div class="mt-3 text-center"><button class="waves-effect waves-light btn btn-info submitButton" type="submit">Save Skills</button></div>
          </form>`;
          $('.modal-title').html(`Edit ${data.data.skill_name} Details`);
          $('.modal-body').html(html);
          $('.modal-footer').hide();
          $('#staticBackdrop').modal('show');
          $('.editSkill').prop('disabled', false);
        }else{
            $('.editSkill').prop('disabled', false);
            Swal.fire(
                'Opps-Error!',
                data.msg,
                'error'
            );
        }
        },
        error: function (jqXHR, exception) {
            $('.editSkill').prop('disabled', false);
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
  $("body").on('submit', '#submitPassword', function(e){
    e.preventDefault();
    $('.submitButton').prop('disabled', true); 
    $.ajax({
        url:'password_update',
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

  $("body").on('click', '.delete', function(e){
    var ele = $(this);
    var id = ele.attr("data-id");    var db = ele.attr("data-db");
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
          url:'delete',
          type:"post",
          data:{
            id: id,
            db: db,
          },
          success: function(data){
            var data = jQuery.parseJSON(data);
            if(data.status == 1){
              (status ==  1) ? ele.closest("tr").find('.delete').data("status", 0) : ele.closest("tr").find('.delete').data("status", 1);
              html = (status ==  1) ? '<i class="fa fa-check fa-lg m-2"></i>': '<i class="fa fa-trash-o fa-lg m-2"></i>';
              ele.closest("tr").find('.delete').html(html);
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
  
});
