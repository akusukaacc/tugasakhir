<section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-table"></i> LIST ITEM </h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.html"> Home </a></li>
              <li><i class="fa fa-table"></i> Master Data </li>
              <li><i class="fa fa-th-list"></i> Item </li>
            </ol>
          </div>
        </div>

<!-- Page Heading -->

<h1 class="h3 mb-2 text-gray-800">Edit Item</h1>
    <div class="card shadow mb-4 mt-2">
        <div class="card-header py-3">
        </div>
        <div class="card-body">

        <form method="POST" enctype="multipart/form-data" action="<?= base_url('dashboard/proses_edit_baranguser/'.$datamenu[0]['id']); ?>">
                <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" class="form-control" name="nama_barang" value="<?php echo($datamenu[0]['nama_barang']); ?>">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Type</label>
                <input type="text" class="form-control" name="jenis" value="<?php echo($datamenu[0]['jenis']); ?>">
            </div>
            
            <div class="form-group">
                <label for="exampleInputEmail1">Amount</label>
                <input type="number" class="form-control" name="jumlah" value="<?php echo($datamenu[0]['jumlah']); ?>">
            </div>
            
            <div class="form-group">
                <label for="exampleInputEmail1">Price</label>
                <input type="number" class="form-control" name="harga" value="<?php echo($datamenu[0]['harga']); ?>">
            </div>
            
            <div class="form-group">
                <label for="exampleInputEmail1">Date</label>
                <input type="date" class="form-control" name="input_date" value="<?php echo($datamenu[0]['input_date']); ?>">
            </div>
            
                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
        </form>
        </div>
    </div>
</div>