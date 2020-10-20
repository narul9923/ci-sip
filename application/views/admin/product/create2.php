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
            <h1 class="m-0 text-dark">Create Products</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">Products</li>
              <li class="breadcrumb-item active">Create</li>
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
                    <?php form_open_multipart('products/create') ?>
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Add Product</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <?php echo form_label('Category', 'category_id') ?>
                                            <?php echo form_dropdown('category_id', $categories, null, ['class' => 'form-control', 'placeholder' => 'Choose
                                            category']) ?>
                                        </div>
                                        <div class="form-group">
                                            <?php echo form_label('Name', 'name'); ?>
                                            <?php echo form_input('name', '',
                                            ['class' =>'form-control','placeholder' => 'Name']) ?>
                                        </div>
                                        <div class="form-group">
                                            <?php echo form_label('Price', 'price'); ?>
                                            <?php echo form_input('price', '',
                                            ['class' =>'form-control', 'placeholder' => 'Price']) ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <?php echo form_label('SKU', 'sku') ?>
                                            <?php echo form_input('sku', '', ['class' =>
                                            'form-control', 'placeholder' => 'SKU']) ?>
                                        </div>
                                        <div class="form-group">
                                            <?php echo form_label('Status', 'status'); ?>
                                            <?php echo form_input('status', '',
                                            ['class' =>'form-control','placeholder' => 'Status']) ?>
                                        </div>
                                        <div class="form-group">
                                            <?php echo form_label('Image', 'image'); ?>
                                            <?php echo form_upload('image', '',
                                            ['class' =>'form-control',]) ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <?php echo form_label('Description','description') ?>
                                        <?php echo form_textarea('description', '', ['class' =>
                                        'form-control']) ?>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="<?php echo base_url('product/index'); ?>" class="btn btn-outline-info">Back</a>
                                <?php echo form_submit('submit', 'Add Product', ['class' => 'btn btn-primary pull-right']) ?>

                        </div>
                </div>
                    <?php echo form_close() ?>
          </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php $this->load->view('admin/template/footer'); ?>