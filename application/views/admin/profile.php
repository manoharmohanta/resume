        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
          <!-- ============================================================== -->
          <!-- Bread crumb and right sidebar toggle -->
          <!-- ============================================================== -->
          <div class="row page-titles">
            <div class="col-md-5 align-self-center">
              <h3 class="text-themecolor"><?= $page_name ?></h3>
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="<?= base_url('admin') ?>">Home</a>
                </li>
                <li class="breadcrumb-item active"><?= $page_name ?></li>
              </ol>
            </div>
            <div class="col-md-7 align-self-center">
              <!-- <a href="javascript:void(0)" class="btn waves-effect waves-light btn btn-info pull-right hidden-sm-down text-white" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                Create New</a> -->
            </div>
          </div>
          <!-- ============================================================== -->
          <!-- End Bread crumb and right sidebar toggle -->
          <!-- ============================================================== -->
          <!-- ============================================================== -->
          <!-- Start Page Content -->
          <!-- ============================================================== -->
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                    <div class="row">
                      <div class="col-md-3 border-right">
                        <div class="d-flex flex-column align-items-center text-center p-3">
                          <label for="profile-image">
                            <img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                          </label>
                          <input type="file" id="profile-image" style="display:none;">
                          <span class="font-weight-bold"><?= ucfirst($db_results['first_name']) ?> <?= ucfirst($db_results['last_name']) ?></span>
                          <span class="text-black-50"><?= ($db_results['user_email']) ?></span>
                        </div>
                      </div>
                      <div class="col-md-5 border-right">
                          <div class="p-3">
                              <div class="d-flex justify-content-between align-items-center mb-3">
                                  <h4 class="text-right">Profile Settings</h4>
                              </div>
                              <div class="row mt-2">
                                  <div class="col-md-6"><label class="labels">Name</label><input type="text" class="form-control" placeholder="first name" value="<?= ucfirst($db_results['first_name']) ?>"></div>
                                  <div class="col-md-6"><label class="labels">Surname</label><input type="text" class="form-control" value="<?= ucfirst($db_results['last_name']) ?>" placeholder="surname"></div>
                              </div>
                              <div class="row mt-3">
                                  <div class="col-md-12"><label class="labels">Mobile Number</label><input type="text" class="form-control" placeholder="enter phone number" value="<?= ucfirst($db_results['user_phone']) ?>"></div>
                                  <div class="col-md-12"><label class="labels">Email ID</label><input type="text" class="form-control" placeholder="enter email id" value="<?= ($db_results['user_email']) ?>" disabled></div>
                                  <div class="col-md-12"><label class="labels">Address Line 1</label><input type="text" class="form-control" placeholder="enter address line 1" value="<?= ucfirst($db_results['user_address_1']) ?>"></div>
                                  <div class="col-md-12"><label class="labels">Address Line 2</label><input type="text" class="form-control" placeholder="enter address line 2" value="<?= ucfirst($db_results['user_address_2']) ?>"></div>
                                  <div class="col-md-12"><label class="labels">State / Regin</label><input type="text" class="form-control" placeholder="enter state" value="<?= ucfirst($db_results['user_state']) ?>"></div>
                                  <div class="col-md-12"><label class="labels">City</label><input type="text" class="form-control" placeholder="city" value="<?= ucfirst($db_results['user_city']) ?>"></div>
                              </div>
                              <div class="row g-2">
                                <div class="col-md-6"><label class="labels">Pin Code</label><input type="text" class="form-control" placeholder="enter pin code" value="<?= ucfirst($db_results['user_pincode']) ?>"></div>
                                <div class="col-md-6"><label class="labels">Country</label><input type="text" class="form-control" placeholder="enter country" value="<?= ucfirst($db_results['user_country']) ?>"></div>
                              </div>
                              <hr>
                              <div class="p-3">
                                  <div class="d-flex justify-content-between align-items-center experience"><span>Edit Skils</span><span class="border px-3 p-1 addSkill"><i class="fa fa-plus"></i>&nbsp;Skill</span></div><br>
                                  <div class="row skill">
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
                              </div>
                          </div>
                      </div>
                      <div class="col-md-4">
                          <div class="p-3 qualification">
                              <div class="d-flex justify-content-between align-items-center"><span>Edit Education</span><span class="border px-3 p-1 addQualification"><i class="fa fa-plus"></i>&nbsp;Education</span></div><br>
                              <div class="col-md-12"><label class="labels">University Name</label><input type="text" class="form-control" placeholder="university name" value=""></div> <br>
                              <div class="col-md-12"><label class="labels">University Location</label><input type="text" class="form-control" placeholder="university name" value=""></div> <br>
                              <div class="col-md-12"><label class="labels">Degree Name</label><input type="text" class="form-control" placeholder="degree name" value=""></div><br>
                              <div class="row">
                                <div class="col-md-6"><label class="labels">From Date</label><input type="text" class="form-control" placeholder="from date" value=""></div>
                                <div class="col-md-6"><label class="labels">To Date</label><input type="text" class="form-control" placeholder="to date" value=""></div>
                              </div>
                          </div>
                          <hr>
                          <div class="p-3 job">
                              <div class="d-flex justify-content-between align-items-center"><span>Edit Experience</span><span class="border px-3 p-1 addJob"><i class="fa fa-plus"></i>&nbsp;Experience</span></div><br>
                              <div class="col-md-12"><label class="labels">Organization Name</label><input type="text" class="form-control" placeholder="experience" value=""></div> <br>
                              <div class="col-md-12"><label class="labels">Organization Location</label><input type="text" class="form-control" placeholder="experience" value=""></div> <br>
                              <div class="col-md-12"><label class="labels">Designation Details</label><input type="text" class="form-control" placeholder="additional details" value=""></div><br>
                              <div class="row">
                                <div class="col-md-6"><label class="labels">From Date</label><input type="text" class="form-control" placeholder="from date" value=""></div>
                                <div class="col-md-6"><label class="labels">To Date</label><input type="text" class="form-control" placeholder="to date" value=""></div>
                              </div>
                          </div>
                      </div>
                      <div class="mt-1 text-center"><button class="waves-effect waves-light btn btn-info" type="button">Save Profile</button></div>
                    </div>
                </div>
              </div>
            </div>
          </div>
        
          <!-- ============================================================== -->
          <!-- End PAge Content -->
          <!-- ============================================================== -->
          <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->