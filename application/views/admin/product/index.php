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
					<h1 class="m-0 text-dark">Products</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Proucts</li>
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
							<h3 class="card-title">Products</h3>
                            <div class="card-tools">
                                <a href="<?=base_url('products/create');?>" class="btn btn-tool"><i class="fa fa-plus"></i> Add Products</a>
                            </div>
						</div>
						<div class="card-body">
                            <?php if($this->session->flashdata('success')): ?>
                                <div class="alert alert-success" role="alert">
                                    <?php echo $this->session->flashdata('success') ?>
                                </div>
                            <?php endif?>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <?php echo form_label('Category','category_id');?>
                                        <?php echo form_dropdown('category_id', $categories, null, ['class' => 'form-control','id'=>'category_id']); ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <?php echo form_label('Search','search');?>
                                        <?php echo form_input('search', '', ['class' => 'form-control','id'=>'search','placeholder' => 'Enter Keyword']); ?>
                                    </div>
                                </div>
                            </div>
							<div class="row">
								<div class="col-md-12">
									<table class="table table-bordered table-hover">
										<thead>
											<tr class="text-center">
												<th>No</th>
												<th>Category</th>
												<th>Name</th>
												<th>Price</th>
												<th>SKU</th>
												<th>Image</th>
												<th>Status</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($products as $key => $product) {?>
											<tr>
                                                <td><?php echo $key + 1 ?></td>
												<td><?php echo $product['category_name']; ?></td>
												<td><?php echo $product['name']; ?></td>
												<td><?php echo $product['price']; ?></td>
												<td><?php echo $product['sku']; ?></td>
												<td class="text-center">
                                                    <img src="<?php echo base_url() . 'uploads/' . $product['image'] ?>" width="100" />
                                                </td>
												<td class="text-center"><?php echo ucfirst($product['status']) ?></td>
												<td class="text-center">
													<div class="btn-group">
														<a class="btn btn-sm btn-info" href="<?php echo base_url() . 'products/' . $product['id'] . '/show' ?>"><i class="fa fa-eye"></i></a>
														<a class="btn btn-sm btn-success" href="<?php echo base_url() . 'products/' . $product['id'] . '/edit' ?>"><i class="fa fa-edit"></i></a>
														<a onclick="return confirm('hapus data?')" href="<?= base_url('products/'.$product['id'].'/delete'); ?>" class="btn btn-danger btn-sm" style="color: #fff"><i class="fa fa-trash"></i></a>
													</div>
												</td>

											</tr>
											<?php }?>
										</tbody>
									</table>
								</div>
							</div>
                            <div class="row">
                                <div class="col-md-12">
                                    <?php echo $this->pagination->create_links() ?>
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
<?php $this->load->view('admin/template/footer'); ?>
<script>
    $(document).ready(function() {
        $('#category_id').on('change', function () {
            filter();
        });

        $('#search').keypress(function (event) {
            if(event.keyCode == 13) {// enter key press
                filter();
            }
        });

        var filter = function () {
            var catId = $('#category_id').val();
            var keyword = $('#search').val();

            window.location.replace("<?php echo base_url().'products/index?' ?>category_id=" + catId + "&search=" + keyword);
        };
    });
</script>