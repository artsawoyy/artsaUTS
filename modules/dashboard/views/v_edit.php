<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Edit Data</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../../assets/plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../../assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../assets/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
  <div class="wrapper">
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">

  <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>
</nav>

  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <span class="brand-text font-weight-light">Admin</span>
    </a>

    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-copy"></i>
                  <p>Product</p>
                  <i class="right fas fa-angle-left"></i>
                </a>
                </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="add_product" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Product</p>
                </a>
              </li>
              </li>
      </ul>
  </nav>
</aside>

    <div class="content-wrapper">

      <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Product</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Product</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
        <section class="content">
          <div class="container-fluid">
        <?php foreach($tbl_produk as $u){ ?>
              <form action="<?php echo base_url(''); ?>dashboard/upload" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Id Product</label>
                      <input type="text" name="id_produk" value="<?php echo $u->id_produk;?>" class="form-control" placeholder="Enter">
                </div>
                <div class="form-group">
                    <label>Nama Product</label>
                      <input type="text" name="nama_produk" value="<?php echo $u->nama_produk;?>" class="form-control" placeholder="Enter">
                </div>
                <div class="form-group">
                    <label>Harga</label>
                      <input type="text" name="harga" value="<?php echo $u->harga;?>" class="form-control" placeholder="Enter">
                </div>
                <div class="form-group">
                    <label>Kategori</label>
                      <input type="text" name="kategori" value="<?php echo $u->kategori;?>" class="form-control" placeholder="Enter">
                </div>
                <div class="form-group">
                    <label>Deskripsi</label>
                    <textarea type="text" class="form-control" rows="3" placeholder="Enter ..." name="deskripsi"><?php echo $u->deskripsi;?></textarea>
                  </div>
                  <img src="<?php echo base_url('assets/images/'.$u->gambar.''); ?>"height="50px" width="50px" name='gambar'>
                  <input type="hidden" name="gambar" value="<?php echo $u->gambar; ?>" />
                <div class="form-group">
                <label for="exampleInputFile">Change Images</label>
                <div class="input-group">
                <input type="file" name="new_gambar">
                </div>
                </div>
                <input type="submit" value="Update" class="btn btn-primary btn-block">
              </form>
              <?php } ?>
              </div>
            </section>
            </div>

    </div>

</body>
</html>