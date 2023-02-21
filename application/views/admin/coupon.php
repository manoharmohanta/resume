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
              <a href="javascript:void(0)" id="addCoupon" data-id="<?= $this->session->userdata('user_id') ?>" class="btn waves-effect waves-light btn btn-info pull-right hidden-sm-down text-white">
                Generate New Coupon</a>
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
                          <th>Coupon Code</th>
                          <th>User Details</th>
                          <th>Created On</th>
                          <th>Actions</th>
                        </tr>
                      </tfoot>
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Coupon Code</th>
                          <th>User Details</th>
                          <th>Created On</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach($db_result as $key=>$val){ ?>
                        <tr>
                          <td><?= $key+1 ?></td>
                          <td><?= ucwords($val['coupon_code']) ?></td>
                          <td>
                            Full Name:- <?= ucwords($val['first_name']) ?> <?= ucwords($val['last_name']) ?><br>
                            Phone Number:- <?= ucwords($val['user_phone']) ?><br>
                            Email Id:- <?= ucwords($val['user_email']) ?><br>
                          </td>
                          <td><?= $val['coupon_created'] ?></td>
                          <td>
                            <!-- <a href="javascript: void(0);" data-id="<?= $val['coupon_id'] ?>" class="text-primary editCoupon"><i class="fa fa-edit fa-lg m-2"></i></a> -->
                            <a href="javascript: void(0);" data-id="<?= $val['coupon_id'] ?>" data-status="<?= $val['status'] ?>" class="text-danger deleteCoupon"><?= ($val['status'] == 1) ? '<i class="fa fa-trash-o fa-lg m-2"></i>' : '<i class="fa fa-check fa-lg m-2"></i>' ?></a>
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