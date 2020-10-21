<?php $this->load->view('admin/template/header'); ?>
  <?php $this->load->view('admin/template/navbar'); ?>
  <?php $this->load->view('admin/template/sidebar'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Transactions</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">Dashboard</li>
              <li class="breadcrumb-item active">List All Transactions</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
  			<div class="row">
                  <div class="col-md-12">
                      <div class="card">
                          <div class="card-header">
                              <h3 class="card-title">
                                  List Transactions
                              </h3>
                              <div class="card-tools">
                                  <a href="<?= base_url('transactions/create'); ?>" class="btn btn-tool"><i class="fa fa-plus"></i> Import Transaction</a>
                              </div>
                          </div>
                          <div class="card-body">
                            <?php if ($this->session->flashdata('message')) : ?>
                                <div class="alert alert-success" role="alert">
                                    <?php echo $this->session->flashdata('message'); ?>
                                </div>
                            <?php endif ?>
                              <div class="table-responsive">
                                  <table class="table table-bordered table-hover">
                                      <thead>
                                          <tr>
                                              <th>No</th>
                                              <th>Product</th>
                                              <th>Date</th>
                                              <th>Price</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                          <?php foreach ($data as $key => $value) : ?>
                                            <tr>
                                                <td><?= $no++ ; ?></td>
                                                <td><?= $value->name_product; ?></td>
                                                <td><?= date('d F Y', strtotime($value->trx_date)); ?></td>
                                                <td><?= "Rp. " . number_format($value->price,2,',','.'); ?></td>
                                            </tr>
                                          <?php endforeach ?>
                                      </tbody>
                                  </table>
                                  <div class="row">
                                    <div class="col">
                                        <!--Tampilkan pagination-->
                                        <?php echo $pagination; ?>
                                    </div>
                                </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php $this->load->view('admin/template/footer'); ?>

