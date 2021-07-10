<section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-table"></i>LIST USER</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
              <li><i class="fa fa-table"></i>Master Data</li>
              <li><i class="fa fa-th-list"></i>All User</li>
            </ol>
          </div>
        </div>
        <button class="btn btn-success"   type="button" data-toggle="modal" data-target="#exampleModal">
     <i class="icon_plus_alt2"></i>
 ADD
</button>
<br>
<br>
        <!-- page start-->
        <div class="row">
          <div class="col-lg-12">
            <section class="panel">

              <table class="table table-striped table-advance table-hover">
                <tbody>
                  <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>User Name</th>
                    <th>Role</th>
                    <th>Action</th>
                  </tr>

                  <?php
                    $no = 1;
                    foreach($datauser as $data  => $user){
                ?>

                  <tr>
                    <td><?= $no; ?></td>
                    <td><?= $user['name'];?></td>
                    <td><?= $user['username'];?></td>
                    <td><?= $user['role'];?></td>
                    <td>

                      <div class="btn-group">
                      <a class="btn btn-primary" href="<?= base_url('dashboard/edit_user/'.$user['id'])?>"><i class="icon_pencil-edit"></i></a>
                        <a class="btn btn-danger" href="<?= base_url('dashboard/delete_user/'.$user['id'])?>"><i class="icon_close_alt2"></i></a>
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
    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ADD USER</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="POST" enctype="multipart/form-data" action="<?= base_url('dashboard/create_user'); ?>">
            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" class="form-control" name="name" required>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Username</label>
                <input type="text" class="form-control" name="username" required>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Password</label>
                <input type="text" class="form-control" name="password" required>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Role</label>
                    </div>
                <select class="custom-select" id="inputGroupSelect01" name="role" required>
                    <option selected>Pilih...</option>
                    <option value="admin">ADMIN</option>
                    <option value="user">USER</option>
                </select>
    
            </div>
            </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success">Simpan</button>
        </form>
      </div>
  </div>
  </div>
</div>