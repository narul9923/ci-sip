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
            <h1 class="m-0 text-dark">Edit Category</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">Categories</li>
              <li class="breadcrumb-item active">Edit</li>
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
                            Form Edit Category
                         </h3>
                     </div>
                     <form action="" method="post">
                     <input type="hidden" name="id" value="<?= $category->id ?>">
                     <div class="card-body">
                         <div class="form-group">
                             <label for="Name">Name</label>
                             <input id="my-input" class="form-control <?= form_error('name') ? 'is-invalid' : '' ?>" value="<?= $category->name ?>" type="text" name="name" placeholder="Name...">
                             <div class="invalid-feedback">
                                <?= form_error('name') ?>
                            </div> 
                        </div>
                        <div class="form-group">
                             <label for="Name">Status</label>
                             <select name="status" class="form-control  <?= form_error('status') ? 'is-invalid' : '' ?>" id="status">
                                 <option value="">--Pilih--</option>
                                 <option value="Active" <?= $category->status == 'Active' ? 'selected' : '' ?>>Active</option>
                                 <option value="Inactive" <?= $category->status == 'Inactive' ? 'selected' : '' ?>>Inactive</option>
                             </select>
                             <div class="invalid-feedback">
                                <?= form_error('status') ?>
                            </div> 
                        </div>
                     </div>
                     <div class="card-footer">
                         <a href="<?= base_url('categories/index'); ?>" class="btn btn-outline-info"><i class="fa fa-arrow-left"></i> Back</a>
                         <button type="submit" class="btn btn-outline-info float-right"><i class="fa fa-edit"></i> Update</button>
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

