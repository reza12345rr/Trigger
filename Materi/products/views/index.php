<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Products</h1>
          </div>
          <?php if($this->session->flashdata('error') == TRUE): ?>
        <div class="alert alert-danger alert-dismissible fade show ml-5" role="alert">
            <?= $this->session->flashdata('error'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php endif; ?>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url(''); ?>dashboard">Dashboard</a></li>
              <li class="breadcrumb-item active">Products</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data product <?= $username ?> </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Gambar</th>
                  <th>Nama</th>
                  <th>Quantity</th>
                  <?php if ($this->uri->uri_string() == 'category/list') { ?>
                  <th>Brand</th>
                  <?php } ?>
                  <?php if ($this->uri->uri_string() == 'vendor/list') { ?>
                  <th>Category</th>
                  <?php } ?>
                  <?php if ($this->uri->uri_string() == 'products') { ?>
                  <th>Brand</th>
                  <th>Category</th>
                    <?php } ?>
                  <th>Price</th>
                  <th>Description</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($product as $p) :
                    ?>
                <tr>
                  <td>
                    <center>
                        <img src="<?= base_url('./assets/img/products/').$p['product_image']?>" width="100px" height="110px"/>
                    </center>
                  </td>
                  <td><?= $p['product_name'] ?></td>
                  <td><?= $p['product_qty'] ?></td>
                  <?php if ($this->uri->uri_string() == 'category/list') { ?>
                    <td><?= $p['vendor_name'] ?></td>
                  <?php } ?>
                  <?php if ($this->uri->uri_string() == 'vendor/list') { ?>
                    <td><?= $p['category_name'] ?></td>
                  <?php } ?>
                  <?php if ($this->uri->uri_string() == 'products') { ?>
                    <td><?= $p['vendor_name'] ?></td>
                    <td><?= $p['category_name'] ?></td>
                    <?php } ?>
                  
                  <td><?= $p['product_price'] ?></td>
                  <td><?= $p['product_description'] ?></td>
                  <td colspan="2">
                      <center>
                      <a class="btn btn-success" href="<?= base_url('products/edit/'), $p['product_id'] ?>">Edit</a>
                      <a class="btn btn-danger" href="<?= base_url('products/delete/'), $p['product_id'] ?>">Delete</a>
                      </center>
                  </td>
                </tr>
                <?php endforeach; ?>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->