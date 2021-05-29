<section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-table"></i>MASTER DATA</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
              <li><i class="fa fa-table"></i>Master Data</li>
              <li><i class="fa fa-th-list"></i>Barang</li>
            </ol>
          </div>
        </div>
        <!-- page start-->
        <div class="row">
          <div class="col-lg-12">
            <section class="panel">

              <table class="table table-striped table-advance table-hover">
                <tbody>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Jenis</th>
                    <th>Jumlah</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>

                  <?php
                    $no = 1;
                    foreach($datauser as $data  => $user){
                ?>

                  <tr>
                    <td><?= $no; ?></td>
                    <td><?= $user['nama_barang'];?></td>
                    <td><?= $user['jenis'];?></td>
                    <td><?= $user['jumlah'];?></td>
                    <td><?= $user['input_date'];?></td>
                    <td><?= $user['status'];?></td>
                    <td>
                      <div class="btn-group">
                        <a class="btn btn-danger" href="<?= base_url('dashboard/delete_barang/'.$user['id'])?>"><i class="icon_close_alt2"></i></a>
                    </div>
                    </td>
                  </tr>
                <?php

                $no++;
                }
                ?>
                </tbody>
              </table>
            </section>
          </div>
        </div>
        <!-- page end-->
      </section>
    </section>