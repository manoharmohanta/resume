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
              <a href="javascript:void(0)" id="addRole" class="btn waves-effect waves-light btn btn-info pull-right hidden-sm-down text-white">
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
                  <!-- <h4 class="card-title">Basic Table</h4>
                  <h6 class="card-subtitle">Add class <code>.table</code></h6> -->
                  <div class="table-responsive">
                    <table class="table" id="example">
                      <tfoot>
                        <tr>
                          <th>#</th>
                          <th>Role Name</th>
                          <th>Created On</th>
                          <th>Actions</th>
                        </tr>
                      </tfoot>
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Role Name</th>
                          <th>Created On</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach($roles as $key=>$val){ ?>
                        <tr>
                          <td><?= $key+1 ?></td>
                          <td><?= ucwords($val['role_title']) ?></td>
                          <td><?= $val['role_created'] ?></td>
                          <td>
                            <a href="javascript: void(0);" data-id="<?= $val['role_id'] ?>" class="text-primary editRole"><i class="fa fa-edit fa-lg m-2"></i></a>
                            <a href="javascript: void(0);" data-id="<?= $val['role_id'] ?>" data-status="<?= $val['status'] ?>" class="text-danger deleteRole"><?= ($val['status'] == 1) ? '<i class="fa fa-trash-o fa-lg m-2"></i>' : '<i class="fa fa-check fa-lg m-2"></i>' ?></a>
                          </td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
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