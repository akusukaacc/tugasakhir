<section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-table"></i> MASTER DATA </h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.html"> Home </a></li>
              <li><i class="fa fa-table"></i> Master Data </li>
              <li><i class="fa fa-th-list"></i> Item </li>
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
                    <th> No </th>
                    <th> Name </th>
                    <th> Type </th>
                    <th> Amount </th>
                    <th> Date </th>
                    <th> Status </th>
                    <th> Action </th>
                  </tr>

                  <?php
                    $no = 1;
                    foreach($databarang as $data  => $barang){
                ?>

                  <tr>
                    <td><?= $no; ?></td>
                    <td><?= $barang['nama_barang'];?></td>
                    <td><?= $barang['jenis'];?></td>
                    <td><?= $barang['jumlah'];?></td>
                    <td><?= $barang['input_date'];?></td>
                    <td><?= $barang['status'];?></td>
                    <td>
                      <div class="btn-group">
                        <a class="btn btn-danger" href="<?= base_url('dashboard/delete_barang/'.$barang['id'])?>"><i class="icon_close_alt2"></i></a>
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