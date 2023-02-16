
  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Generate Resume</h2>
          <ol>
            <li><a href="create-free-resume.html">Create Free Resume / CV</a></li>
            <li>Generate Resume</li>
          </ol>
        </div>

      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details m-3 p-3" class="portfolio-details">
      <div class="container-fluid" data-aos="fade-up">

        <div class="row gy-4">

          <div class="col-lg-4">
            <div class="portfolio-details-slider swiper">
              <div class="swiper-wrapper align-items-center">
                <div class="swiper-slide">
                  <img src="<?= base_url('assets/img/resume/1.png') ?>" alt="">
                </div>
              </div>
              <!-- <div class="swiper-pagination"></div> -->
            </div>
          </div>

          <div class="col-lg-8">
            <div class="shadow-lg p-3 mb-5 bg-body rounded">
              <h3 class="text-center">Enter Your Details to Generate Resume</h3>
              <hr>
              <div class="row">
                <div class="col-6">
                  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                      <div class="border p-2">
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Full Names</label>
                          <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                          <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputPassword1" class="form-label">Designation</label>
                          <input type="password" class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Phone Number</label>
                          <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                          <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputPassword1" class="form-label">Email Id</label>
                          <input type="password" class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputPassword1" class="form-label">Address</label>
                          <input type="password" class="form-control" id="exampleInputPassword1">
                        </div>
                      </div>
                      <div class="border p-2 mt-1">
                        <div class="row">
                          <div class="col-12 job">
                            <div class="card mb-1">
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
                                      <label for="exampleFormControlInput1" class="form-label">Job Designation</label>
                                      <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Bachelor of Technology">
                                    </div>
                                  </div>
                                  <div class="col-8">
                                    <div class="mb-3">
                                      <label for="exampleFormControlInput1" class="form-label">Organization Name</label>
                                      <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Bachelor of Technology">
                                    </div>
                                  </div>
                                  <div class="col-12">
                                    <div class="mb-3">
                                      <label for="exampleFormControlTextarea1" class="form-label">Roles and Responsibilities</label>
                                      <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-12">
                            <div class="d-grid gap-2 col-6 mx-auto">
                              <button class="btn btn-primary addJob" type="button">Add Another Job</button>
                            </div>
                          </div>
                        </div>
                      </div>
                  </div>
                </div>
                <div class="col-6">
                  <div class="border p-2">
                    <div class="mb-3">
                      <label for="exampleFormControlTextarea1" class="form-label">Summary</label>
                      <textarea class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Tech Skills</label>
                      <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                      <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                  </div>
                  <div class="border p-2 mt-2">
                    <div class="row">
                      <div class="col-12 qualification">
                        <div class="card mb-1">
                          <!-- <span class="position-absolute top-0 end-0" data-effect="fadeOut"><i class="bi bi-x-circle"></i></span> -->
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
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="d-grid gap-2 col-6 mx-auto">
                          <button class="btn btn-primary addQualification" type="button">Add Another Qualification</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="border p-2 mt-2">
                    <div class="mb-3">
                      <label for="exampleFormControlTextarea1" class="form-label">Declaration</label>
                      <textarea class="form-control" id="exampleFormControlTextarea1" rows="4"></textarea>
                    </div>
                  </div>
                </div>
                <div class="col-12 mt-4">
                  <div class="d-grid gap-2 col-6 mx-auto">
                    <button class="btn btn-primary" type="button">Generate Magical ResumeGenie</button>
                  </div>
                </div>
              </div>

              
            </div>
          
          </div>

        </div>

      </div>
    </section><!-- End Portfolio Details Section -->

  </main><!-- End #main -->