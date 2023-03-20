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
                  <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                      <a class="nav-link active" aria-current="page" href="#" data-bs-toggle="tab" data-bs-target="#home">Profile Details</a>
                    </li>
                    <li class="nav-item" role="presentation">
                      <a class="nav-link" href="#" data-bs-toggle="tab" data-bs-target="#profile">Education Details</a>
                    </li>
                    <li class="nav-item" role="presentation">
                      <a class="nav-link" href="#" data-bs-toggle="tab" data-bs-target="#messages">Experience Details</a>
                    </li>
                    <li class="nav-item" role="presentation">
                      <a class="nav-link" href="#" data-bs-toggle="tab" data-bs-target="#settings">Skills</a>
                    </li>
                    <li class="nav-item" role="presentation">
                      <a class="nav-link" href="#" data-bs-toggle="tab" data-bs-target="#password">Password Update</a>
                    </li>
                  </ul>
                  <!-- Tab panes -->
                  <div class="tab-content">
                    <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
                      <form class="profile" id="submitProfile" role="form" novalidate="novalidate">
                        <div class="row">
                          <div class="col-md-4 border-right">
                            <div class="d-flex flex-column align-items-center text-center p-3">
                              <label for="profile-image">
                                <img class="rounded-circle mt-5" width="150px" src="<?= (($db_results['user_image']) == null || ($db_results['user_image']) == '')? 'https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg': base_url('assets/uploads/blog/').$db_results['user_image'] ?>">
                              </label>
                              <input type="file" id="profile-image" name="profile-image" style="display:none;">
                              <span class="font-weight-bold"><?= ucfirst($db_results['first_name']) ?> <?= ucfirst($db_results['last_name']) ?></span>
                              <span class="text-black-50"><?= ($db_results['user_email']) ?></span>
                            </div>
                          </div>
                          <div class="col-md-8 border-right">
                              <div class="p-3">
                                  <div class="d-flex justify-content-between align-items-center mb-3">
                                      <h4 class="text-right">Profile Settings</h4>
                                  </div>
                                  <input type="text" value="add" name="operation" hidden>
                                  <div class="row mt-2">
                                      <div class="col-md-6"><label class="labels">Name</label><input type="text" class="form-control" name="first_name" placeholder="first name" value="<?= ucfirst($db_results['first_name']) ?>"></div>
                                      <div class="col-md-6"><label class="labels">Surname</label><input type="text" class="form-control" name="last_name" value="<?= ucfirst($db_results['last_name']) ?>" placeholder="surname"></div>
                                  </div>
                                  <div class="row mt-2">
                                      <div class="col-md-6"><label class="labels">Mobile Number</label><input type="text" class="form-control" name="user_phone" placeholder="enter phone number" value="<?= ucfirst($db_results['user_phone']) ?>"></div>
                                      <div class="col-md-6"><label class="labels">Gender</label><select class="form-select" name="user_gender" aria-label="Default select example"><option <?= ($db_results['user_gender'] == null || $db_results['user_gender'] == '')? 'selected': '' ?>  value="">Select Your Gender / Prefer not to say</option><option value="male" <?= (strtolower($db_results['user_gender']) == 'male')? 'selected': '' ?>>Male</option><option value="female" <?= (strtolower($db_results['user_gender']) == 'female')? 'selected': '' ?>>Female</option><option value="gay" <?= (strtolower($db_results['user_gender']) == 'gay')? 'selected': '' ?>>Gay</option><option value="lesbian" <?= (strtolower($db_results['user_gender']) == 'lesbian')? 'selected': '' ?>>Lesbian</option></select></div>
                                  </div>
                                  <div class="row mt-3">
                                      <div class="col-md-12"><label class="labels">Email ID</label><input type="text" class="form-control" name="user_email" placeholder="enter email id" value="<?= ($db_results['user_email']) ?>" disabled></div>
                                      <div class="col-md-12"><label class="labels">Address Line 1</label><input type="text" class="form-control" name="user_address_1" placeholder="enter address line 1" value="<?= ucfirst($db_results['user_address_1']) ?>"></div>
                                      <div class="col-md-12"><label class="labels">Address Line 2</label><input type="text" class="form-control" name="user_address_2" placeholder="enter address line 2" value="<?= ucfirst($db_results['user_address_2']) ?>"></div>
                                      <div class="col-md-12"><label class="labels">State / Regin</label><input type="text" class="form-control" name="user_state" placeholder="enter state" value="<?= ucfirst($db_results['user_state']) ?>"></div>
                                      <div class="col-md-12"><label class="labels">City</label><input type="text" class="form-control" name="user_city" placeholder="city" value="<?= ucfirst($db_results['user_city']) ?>"></div>
                                  </div>
                                  <div class="row g-2">
                                    <div class="col-md-6"><label class="labels">Pin Code</label><input type="text" class="form-control" name="user_pincode" placeholder="enter pin code" value="<?= ucfirst($db_results['user_pincode']) ?>"></div>
                                    <div class="col-md-6"><label class="labels">Country</label><input type="text" class="form-control" name="user_country" placeholder="enter country" value="<?= ucfirst($db_results['user_country']) ?>"></div>
                                  </div>
                                  <div class="mt-3 text-center"><button class="waves-effect waves-light btn btn-info submitButton" type="submit">Save Profile</button></div>
                              </div>
                          </div>                        
                        </div>
                      </form>
                    </div>
                    <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                      <div class="row">
                        <div class="col-md-4">
                            <div class="p-3 qualification">
                                <div class="d-flex justify-content-between align-items-center">
                                  <span>Edit Education</span>
                                  <!-- <span class="border px-3 p-1 addQualification"><i class="fa fa-plus"></i>&nbsp;Education</span> -->
                                </div><br>
                                <form class="profile" id="submitEducation" role="form" novalidate="novalidate">
                                  <div class="col-md-12"><label class="labels">University Name</label><input type="text" class="form-control" name="university_name" placeholder="university name" value=""></div> <br>
                                  <div class="col-md-12"><label class="labels">University Location</label><input type="text" class="form-control" name="university_location" placeholder="university location" value=""></div> <br>
                                  <div class="col-md-12"><label class="labels">Degree Name</label><input type="text" class="form-control" name="degree_name" placeholder="degree name" value=""></div><br>
                                  <div class="row">
                                    <div class="col-md-6"><label class="labels">From Date</label><input type="text" class="form-control" name="university_from_date" placeholder="from date" value=""></div>
                                    <div class="col-md-6"><label class="labels">To Date</label><input type="text" class="form-control" name="university_to_date" placeholder="to date" value=""></div>
                                  </div>
                                  <div class="mt-3 text-center"><button class="waves-effect waves-light btn btn-info submitEducation" type="submit">Save Education Details</button></div>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-8">
                          <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">S.No</th>
                                <th scope="col">University Name</th>
                                <th scope="col">University Location</th>
                                <th scope="col">Degree Name</th>
                                <th scope="col">From - To Date</th>
                                <th scope="col">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                                <td>@mdo</td>
                                <td><button class="btn btn-sm btn-primary"><span class="badge bg-primary">Edit</span></button><button class="btn btn-sm btn-danger ms-2"><span class="badge bg-danger">Delete</span></button></td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                    <div class="tab-pane" id="messages" role="tabpanel" aria-labelledby="messages-tab">
                      <div class="row">
                        <div class="col-md-4">
                          <div class="p-3 job">
                              <div class="d-flex justify-content-between align-items-center"><span>Edit Experience</span></div><br>
                              <form class="profile" id="submitJob" role="form" novalidate="novalidate">
                                <div class="col-md-12"><label class="labels">Organization Name</label><input type="text" class="form-control" name="organization_name" placeholder="experience" value=""></div> <br>
                                <div class="col-md-12"><label class="labels">Organization Location</label><input type="text" class="form-control" name="organization_location" placeholder="experience" value=""></div> <br>
                                <div class="col-md-12"><label class="labels">Designation Details</label><input type="text" class="form-control" name="organization_designation" placeholder="additional details" value=""></div><br>
                                <div class="row">
                                  <div class="col-md-6"><label class="labels">From Date</label><input type="text" class="form-control" name="organization_from_date" placeholder="from date" value=""></div>
                                  <div class="col-md-6"><label class="labels">To Date</label><input type="text" class="form-control" name="organization_to_date" placeholder="to date" value=""></div>
                                </div>
                                <div class="mt-3 text-center"><button class="waves-effect waves-light btn btn-info submitButton" type="submit">Save Experience Details</button></div>
                              </form>
                          </div>
                        </div>
                        <div class="col-md-8">
                          <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">S.No</th>
                                <th scope="col">Organization Name</th>
                                <th scope="col">Organization Location</th>
                                <th scope="col">Designation Details</th>
                                <th scope="col">From - To Date</th>
                                <th scope="col">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                                <td>@mdo</td>
                                <td><button class="btn btn-sm btn-primary"><span class="badge bg-primary">Edit</span></button><button class="btn btn-sm btn-danger ms-2"><span class="badge bg-danger">Delete</span></button></td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                    <div class="tab-pane" id="settings" role="tabpanel" aria-labelledby="settings-tab">
                      <div class="row">
                        <div class="col-md-5">
                          <div class="p-3">
                              <div class="d-flex justify-content-between align-items-center experience"><span>Edit Skils</span></div><br>
                              <form class="profile" id="submitSkill" role="form" novalidate="novalidate">
                                <div class="row skill">
                                  <div class="col-md-6"><label class="labels">Skill Name</label><input type="text" name="skill_name" class="form-control" placeholder="sikll" value=""></div>
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
                                    <input type="range" name="skill_percentage" class="form-range" min="0" max="100" step="1" id="range-slider" value="0">
                                    <span id="range-value"></span>
                                  </div>
                                </div>
                                <div class="mt-3 text-center"><button class="waves-effect waves-light btn btn-info submitButton" type="submit">Save Skills</button></div>
                              </form>
                          </div>
                          
                        </div>
                        <div class="col-md-7">
                          <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">S.No</th>
                                <th scope="col">Skill Name</th>
                                <th scope="col">Skill Percentage</th>
                                <th scope="col">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td><button class="btn btn-sm btn-primary editSkill"><span class="badge bg-primary">Edit</span></button><button class="btn btn-sm btn-danger ms-2"><span class="badge bg-danger">Delete</span></button></td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                    <div class="tab-pane" id="password" role="tabpanel" aria-labelledby="password-tab">
                      <div class="p-3">  
                        <div class="d-flex justify-content-center">
                          <form class="profile" id="submitPassword" role="form" novalidate="novalidate">
                            <div class="col-md-12"><label class="labels">New Password</label><input type="password" class="form-control" name="password" placeholder="********" value=""></div> <br>
                            <div class="col-md-12"><label class="labels">Confirm New Password</label><input type="password" class="form-control" name="c_password" placeholder="********" value=""></div> <br>
                            <div class="mt-3 text-center"><button class="waves-effect waves-light btn btn-info submitButton" type="submit">Save Skills</button></div>
                          </form>
                        </div>
                      </div>
                    </div>
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