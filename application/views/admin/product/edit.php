<?php $this->load->view('admin/template/header');?>
<?php $this->load->view('admin/template/navbar');?>
<?php $this->load->view('admin/template/sidebar');?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Product</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Product</li>
					</ol>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
	<div class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<?php echo form_open_multipart('products/' . $product['id'] . '/edit') ?>
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">Edit Product</h3>
						</div>
						<div class="card-body">
							<?php
                            $errors = $this->session->flashdata('errors');
                            if (!empty($errors)) {
                                ?>
							<div class="row">
								<div class="col-md-12">
									<div class="alert alert-danger">
										<ul>
											<?php foreach ($errors as $key => $error) {?>
											<li>
												<?php echo $error; ?>
											</li>
											<?php }?>
										</ul>
									</div>
								</div>
							</div>
							<?php }?>
							<div class="row">
								<div class="col-md-6">
									<?php echo form_hidden('id', $product['id']); ?>

									<div class="form-group">
										<?php echo form_label('Category', 'category_id'); ?>
										<?php echo form_dropdown('category_id', $categories, $product['category_id'], ['class' => 'form-control', 'placeholder' => 'Choose
										category']) ?>
									</div>
									<div class="form-group">
										<?php echo form_label('Name', 'name'); ?>
										<?php echo form_input('name', $product['name'], ['class' => 'form-control', 'placeholder' => 'Enter name']) ?>
									</div>
									<div class="form-group">
										<?php echo form_label('Price', 'price') ?>
										<?php echo form_input('price', $product['price'], ['class' => 'form-control', 'placeholder' => 'Enter price']) ?>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<?php echo form_label('SKU', 'sku') ?>
										<?php echo form_input('sku', $product['sku'], ['class' => 'form-control', 'placeholder' => 'Enter sku']) ?>
									</div>
									<div class="form-group">
										<?php echo form_label('Status', 'status') ?>
										<?php echo form_dropdown('status', ['active' => 'Active', 'inactive' => 'Inactive'], $product['status'],
    ['class' => 'form-control']) ?>
									</div>
									<div class="form-group">
										<?php echo form_label('Image', 'image') ?>
										<?php echo form_upload('image', null, ['class' => 'form-control']) ?>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-12">
									<?php echo form_label('Description', 'description') ?>
									<?php echo form_textarea('description', $product['description'], ['class' => 'form-control', 'placeholder' => 'Enter description', 'rows' => 5])?>
								</div>
							</div>
						</div>
						<div class="card-footer">
							<a href="<?php echo base_url() . 'product/' ?>" class="btn btn-outline-info">Back</a>
							<?php echo form_submit('submit', 'Update Product', ['class' => 'btn btn-primary pull-right']) ?>
						</div>
					</div>
					<!-- </form> -->
					<?php echo form_close() ?>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php $this->load->view('admin/template/footer');?>