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
            <h1 class="m-0 text-dark">Transactions Import</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">Transaction</li>
              <li class="breadcrumb-item active">Import</li>
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
                            Import Transactions
                        </h3>
                    </div>
                    <form action="<?= base_url('transactions/import'); ?>" enctype="multipart/form-data" method="post">
                    
                    <div class="card-body">

                        <?php if ($this->session->flashdata('errors')) : ?>
                                <div class="alert alert-danger" role="alert">
                                    <?php echo $this->session->flashdata('errors'); ?>
                                </div>
                        <?php endif ?>

                        <div class="form-group">
                            <label for="my-input">Import Excel</label>
                            <input id="my-input" class="form-control" type="file" name="excel">
                        </div>
                    </div>
                    <div class="card-footer">
                         <a href="" class="btn btn-outline-info"><i class="fa fa-arrow-left"></i> Back</a>
                         <button type="submit" class="btn btn-outline-primary float-right"><i class="fa fa-arrow-down"></i> Import</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php $this->load->view('admin/template/footer'); ?>

