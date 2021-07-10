<section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-table"></i> LIST USER </h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.html"> Home </a></li>
              <li><i class="fa fa-table"></i> Master Data </li>
              <li><i class="fa fa-th-list"></i> Item </li>
            </ol>
          </div>
        </div>

<!-- Page Heading -->

<h1 class="h3 mb-2 text-gray-800">Edit User</h1>
    <div class="card shadow mb-4 mt-2">
        <div class="card-header py-3">
        </div>
        <div class="card-body">

        <form method="POST" enctype="multipart/form-data" action="<?= base_url('dashboard/proses_edit_user/'.$datamenu[0]['id']); ?>">
                <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" class="form-control" name="name" value="<?php echo($datamenu[0]['name']); ?>">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Username</label>
                <input type="text" class="form-control" name="username" value="<?php echo($datamenu[0]['username']); ?>">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Password</label>
                <input type="text" class="form-control" name="password" required>
            </div>
            <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Role</label>
                </div>
                <select class="custom-select" id="inputGroupSelect01" name="role" required>
                    <option selected>Pilih...</option>
                    <option value="Admin">ADMIN</option>
                    <option value="User">USER</option>
                </select>
                <br>
                <br>
            </div>
            
                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
        </form>
        </div>
    </div>
</div>