        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
          <!-- ============================================================== -->
          <!-- Bread crumb and right sidebar toggle -->
          <!-- ============================================================== -->
          <div class="row page-titles">
            <div class="col-md-5 align-self-center">
              <h3 class="text-themecolor"><?= (empty($this->uri->segment(3))) ? 'Create' : 'Update' ?> Blog</h3>
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="<?= base_url('admin/blog') ?>">Blog</a>
                </li>
                <li class="breadcrumb-item active"><?= (empty($this->uri->segment(3))) ? 'Create' : 'Update' ?> Blog</li>
              </ol>
            </div>
            <div class="col-md-7 align-self-center">
              <a href="<?= base_url('admin/blog') ?>" class="btn waves-effect waves-light btn btn-info pull-right hidden-sm-down text-white">
                Back</a>
            </div>
          </div>
          <!-- ============================================================== -->
          <!-- End Bread crumb and right sidebar toggle -->
          <!-- ============================================================== -->
          <!-- ============================================================== -->
          <!-- Start Page Content -->
          <!-- ============================================================== -->
          <form class="blog" id="submitBlog" role="form" novalidate="novalidate"> 
            <div class="row g-1">
              <div class="col-12">
                <div class="card m-0 p-0">
                  <div class="card-body">
                    <div class="input-group">
                      <span class="input-group-text" id="basic-addon1">Blog Title</span>
                      <input type="text" class="form-control" name="blogName" <?= (empty($this->uri->segment(3))) ? '' : 'value="'.$db_result['blog_title'].'"' ?> placeholder="Title" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-8">
                <div class="card m-0 p-0">
                  <div class="card-body">
                    <div id="toolbar-container"></div>
                    <div id="editor" name="content">
                      <?= (empty($this->uri->segment(3))) ? '' : $db_result['blog_content'] ?>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-4">
                <div class="card m-0 p-0">
                  <div class="card-body">
                    <div class="form-group files">
                      <label>Upload Your File </label>
                      <input type="file" name="image" class="form-control">
                    </div>
                    <?php if(!empty($this->uri->segment(3))){ ?>
                    <img src=" <?= base_url('assets/uploads/blog/'.$db_result['blog_image']) ?>" class="img-fluid">
                    <?php } ?>
                    <?php if(!empty($this->uri->segment(3))){ ?>
                    <input type="text" class="form-control" name="blogId" value="<?= $db_result['blog_id'] ?>" hidden>
                    <?php } ?>
                    <input type="text" class="form-control" name="operation" value="add" hidden>
                  </div>
                </div>
              </div>
              <div class="col-md-12 align-self-end">
                <button type="submit" class="btn waves-effect waves-light btn btn-info pull-right hidden-sm-down text-white"><?= (empty($this->uri->segment(3))) ? 'Create ' : 'Update ' ?>Blog</button>
              </div>
            </div>
          </form>
          <!-- ============================================================== -->
          <!-- End PAge Content -->
          <!-- ============================================================== -->
          <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->