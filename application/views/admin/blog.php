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
              <a href="<?= base_url('admin/create_blog') ?>" class="btn waves-effect waves-light btn btn-info pull-right hidden-sm-down text-white">
                Create New</a>
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
                  <table class="table" id="example">
                    <tfoot>
                      <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Created On</th>
                        <th>Actions</th>
                      </tr>
                    </tfoot>
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Title & Description</th>
                        <th>Created On</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach($db_result as $key=>$val){ ?>
                      <tr>
                        <td><?= $key+1 ?></td>
                        <td><img src="<?= base_url('assets/uploads/blog/'.$val['blog_image']) ?>" class="img-fluid w-25" alt="<?= ($val['blog_title']) ?>"></td>
                        <td><?= ucwords($val['blog_title']) ?><br><?= (strlen($val['blog_content']) > 100) ? substr($val['blog_content'], 0, 100).'...' : substr($val['blog_content'], 0, 100) ?></td>
                        <td><?= $val['blog_created'] ?></td>
                        <td>
                          <a href="<?= base_url('admin/create_blog/'.$val['blog_id']) ?>" data-id="<?= $val['blog_id'] ?>" class="text-primary"><i class="fa fa-edit fa-lg m-2"></i></a>
                          <a href="javascript: void(0);" data-id="<?= $val['blog_id'] ?>" data-status="<?= $val['status'] ?>" class="text-danger deleteRole"><?= ($val['status'] == 1) ? '<i class="fa fa-trash-o fa-lg m-2"></i>' : '<i class="fa fa-check fa-lg m-2"></i>' ?></a>
                        </td>
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
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