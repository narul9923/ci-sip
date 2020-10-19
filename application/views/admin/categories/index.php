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
            <h1 class="m-0 text-dark">List Categories</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">Dashboard</li>
              <li class="breadcrumb-item active">Categories</li>
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
                            List Categories
                        </h3>
                        <div class="card-tools">
                            <a href="<?= base_url('categories/create'); ?>" class="btn btn-tool"><i class="fa fa-plus"></i> Add Category</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <?php if ($this->session->flashdata('success')) : ?>
                            <div class="alert alert-success" role="alert">
                                <?php echo $this->session->flashdata('success'); ?>
                            </div>
                        <?php endif ?>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($categories as $key => $value) : ?>
                                        <tr>
                                            <td><?= $key + 1; ?></td>
                                            <td><?= $value->name ?></td>
                                            <td><?= $value->status ?></td>
                                            <td>
                                                <div class="btn-group" role="group" >
                                                    <a href="<?= base_url('categories/'.$value->id.'/show'); ?>" class="btn btn-info btn-sm" style="color: #fff"><i class="fa fa-eye"></i></a>
                                                    <a href="<?= base_url('categories/'.$value->id.'/edit'); ?>" class="btn btn-warning btn-sm" style="color: #fff"><i class="fa fa-edit"></i></a>
                                                    <a onclick="return confirm('hapus data?')" href="<?= base_url('categories/'.$value->id.'/delete'); ?>" class="btn btn-danger btn-sm" style="color: #fff"><i class="fa fa-trash"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
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

