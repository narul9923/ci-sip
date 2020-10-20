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
					<h1 class="m-0 text-dark">Detail Product</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Detail Product</li>
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
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">Detail Product</h3>
						</div>
						<div class="card-body">
							<div class="row">
								<div class="col-md-12">
									<img src="<?php echo base_url() . 'uploads/' . $product['image']; ?>" height="200" width="100%" />
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="category">Product</label>
										<input id="category" type="text" value="<?php echo $product['category_name']; ?>" class="form-control" disabled />
									</div>
									<div class="form-group">
										<label for="name">Name</label>
										<input id="name" type="text" value="<?php echo $product['name']; ?>" class="form-control" disabled />
									</div>
									<div class="form-group">
										<label for="price">Price</label>
										<input id="price" type="text" value="<?php echo $product['price']; ?>" class="form-control" disabled />
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="sku">SKU</label>
										<input id="sku" type="text" value="<?php echo $product['sku']; ?>" class="form-control" disabled />
									</div>
									<div class="form-group">
										<label for="status">Status</label>
										<input id="status" type="text" value="<?php echo $product['sku']; ?>" class="form-control" disabled />
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label for="description">Description</label>
										<input id="description" type="text" value="<?php echo $product['description']; ?>" class="form-control" disabled />
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php $this->load->view('admin/template/footer');
