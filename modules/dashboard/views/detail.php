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
            <h1>Detail pemesanan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="http://localhost/arlin_shop/">Home users</a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    
   <div class="container-fluid">
    <div class="row">
     <div class="col-lg-6">
      <div class="card">
       <div class="card-header border-0">
        <h3 class="card-title">Detail Pelanggan</h3>
        <div class="card-tools">
                      <a href="freelancer/tambah" class="btn btn-tool btn-sm">
                        <i class="fas fa-plus"></i>
                      </a>
                      <a href="#" class="btn btn-tool btn-sm">
                        <i class="fas fa-bars"></i>
                      </a>
                    </div>
       </div>
       <div class="card-body table-responsive p-0">
                    <table class="table table-striped table-valign-middle">
                      <thead>
                      <tr>
                        <th>Id</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Alamat</th>
                        <th>Telepon</th>
                      </tr>
                      </thead>

                              <tbody>
                        <?php 
                          $no = 1;
                          foreach($pelanggan as $u){
                         ?>
                         <tr>
                          <td><?php echo $u['id']?></td>
                          <td><?php echo $u['nama'] ?></td>
                          <td><?php echo $u['email'] ?></td>
                          <td><?php echo $u['alamat'] ?></td>
                          <td><?php echo $u['telp'] ?></td>
                          
                         </tr>
                      </tbody>
                  <?php } ?>
                  </table>
              </div>
      </div>
     </div>

     <div class="col-lg-6">
      <div class="card">
       <div class="card-header border-0">
        <h3 class="card-title">Detail Order</h3>
        <div class="card-tools">
                      <a href="freelancer/tambah" class="btn btn-tool btn-sm">
                        <i class="fas fa-plus"></i>
                      </a>
                      <a href="#" class="btn btn-tool btn-sm">
                        <i class="fas fa-bars"></i>
                      </a>
                    </div>
       </div>
       <div class="card-body table-responsive p-0">
                    <table class="table table-striped table-valign-middle">
                      <thead>
                      <tr>
                        <th>id</th>
                        <th>order_id</th>
                        <th>produk</th>
                        <th>qty</th>
                        <th>harga</th>
                      </tr>
                      </thead>
                      <tbody>
                        <?php 
                          $no = 1;
                          foreach($detail_order as $u){
                         ?>
                         <tr>
                          <td><?php echo $u['id']?></td>
                          <td><?php echo $u['order_id'] ?></td>
                          <td><?php echo $u['produk'] ?></td>
                          <td><?php echo $u['qty'] ?></td>
                          <td><?php echo $u['harga'] ?></td>
                          
                         </tr>
                      </tbody>
                      <?php } ?>
                  </table>
              </div>
      </div>
     </div>
    </div>
   </div>
  </div>


<script src="<?php echo base_url()?>assets/plugins/jquery/jquery.min.js"></script>
<script src="<?php echo base_url()?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url()?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="<?php echo base_url()?>assets/dist/js/adminlte.js"></script>

</body>
</html>