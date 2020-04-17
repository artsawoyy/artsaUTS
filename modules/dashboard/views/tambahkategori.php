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
            <h1>Add Kategori</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="http://localhost/arlin_shop/">Kembali ke Home Users</a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
              <p><?php echo $this->session->flashdata('msg') ?></p>
              <form action="<?php echo base_url(''); ?>dashboard/Add_Kategori/tambah" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Id</label>
                      <input type="text" name="id" value="<?php echo set_value('id');?>" class="form-control" placeholder="Enter">
                </div>
                <div class="form-group">
                    <label>Nama Kategori</label>
                      <input type="text" name="nama_kategori" value="<?php echo set_value('nama_kategori');?>" class="form-control" placeholder="Enter">
                </div>
                
               
                </div>
                <input type="submit" value="Tambah" class="btn btn-primary btn-block">
              <?php echo form_close() ?>  
              </form>
      </div>
        </div>
          </div>
    </section>

<script src="<?php echo base_url()?>assets/plugins/jquery/jquery.min.js"></script>
<script src="<?php echo base_url()?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url()?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="<?php echo base_url()?>assets/dist/js/adminlte.js"></script>
</body>
</html>