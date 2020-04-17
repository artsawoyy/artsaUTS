<!DOCTYPE html>
<html>
<head><?php $this->load->view("dashboard/_partials/head.php") ?> </head>
<body class="hold-transition sidebar-mini">
	<?php echo ucfirst($this->session->userdata('username')); ?>

	<div class="wrapper">
  <!-- Navbar -->
  <nav ><?php $this->load->view("dashboard/_partials/navbar.php") ?></nav>


	<aside><?php $this->load->view("dashboard/_partials/sidebar.php") ?></aside>

     <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Product</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="http://localhost/arlin_shop/">LogOut Admin</a></li>
           </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Product</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body p-0">
          <table class="table table-striped projects">
              <thead>
                  <tr>
                      <th style="width: 1%">
                          #
                      </th>
                      <th style="width: 25%" class="text-center">
                          Gambar
                      </th>
                      <th style="width: 20%">
                          Product Name
                      </th>
                      <th style="width: 10%">
                      	Kategori
                      </th>
                      <th>
                          Price
                      </th>
                      <th style="width: 20%" >
                          Desc
                      </th>
                      <th style="width: 20%">
                      </th>
                  </tr>
              </thead>

              <tbody>
              	<?php 
              		$no = 1;
              		foreach($tbl_produk as $u){
              	 ?>
              	 <tr>
              	 	<td><?php echo $no++ ?></td>
              	 	<td><img src="<?php echo base_url('assets/images/'.$u->gambar.''); ?>"height="50px" width="50px"></td>
              	 	<td><?php echo $u->nama_produk?></td>
              	 	<td><?php echo $u->kategori ?></td>
              	 	<td><?php echo $u->harga ?></td>
              	 	<td><?php echo $u->deskripsi ?></td>
              	 	<td class="project-actions text-right">
              	 		<div class="btn btn-outline-primary btn-sm">
              	 		<i class="fas fa-folder">
			      		<?php echo anchor(base_url('dashboard/edit/'.$u->id_produk),'Edit'); ?>
                        </i>
                        </div>
                        <div class="btn btn-outline-primary btn-sm">
              	 		<i class="fas fa-folder">
			      		<?php echo anchor('dashboard/hapus/'.$u->id_produk,'Hapus'); ?>
                        </i>
                        </div>
					</td>
              	 </tr>
              </tbody>
          <?php } ?>
              </table>


<script src="<?php echo base_url()?>assets/plugins/jquery/jquery.min.js"></script>
<script src="<?php echo base_url()?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url()?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="<?php echo base_url()?>assets/dist/js/adminlte.js"></script>

</body>
</html>