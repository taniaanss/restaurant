<?php

$id = isset($user) ? $user->id : "";
$first_name = isset($user) ? $user->first_name : "";
$last_name = isset($user) ? $user->last_name : "";
$email = isset($user) ? $user->email : "";
$password = isset($user) ? $user->password : "";
$v = isset($v) ? "readonly" : "";
$btn = isset($user) ? "Ubah" : "Simpan";
?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-body">
      <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
          <div class="card">
            <form action="<?= site_url($urlmethod) ?>" method="post" enctype="multipart/form-data">
              <div class="card-header">
                <h4 class="mt-2 mb-2"><?= $title; ?></h4>
              </div>
              <div class="card-body">
                <input type="hidden" name="id" value="<?= $id; ?>">
                <input type="hidden" name="password" value="<?= $password; ?>">
                <div class="form-group">
                  <label for="first_name">First Name</label>
                  <input type="text" class="form-control" id="first_name" name="first_name" aria-describedby="first_name" placeholder="Enter First Name" value="<?php echo $first_name ?>" <?php echo $v; ?> required>
                  <small id="first_name" class="form-text text-muted">Input first name properly.</small>
                </div>

                <div class="form-group">
                  <label for="last_name">Last Name</label>
                  <input type="text" class="form-control" id="last_name" name="last_name" aria-describedby="last_name" placeholder="Enter Last Name" value="<?php echo $last_name ?>" <?php echo $v; ?> required>
                  <small id="first_name" class="form-text text-muted">Input last name properly.</small>
                </div>
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" id="email" name="email" aria-describedby="email" placeholder="Enter Email" value="<?php echo $email ?>" <?php echo $v; ?> required>
                  <small id="email" class="form-text text-muted">Input email properly.</small>
                </div>
              </div>
              <div class="card-footer text-right">
                <?php if ($v == "") { ?>
                  <button class="btn btn-primary mr-1" type="submit"><?php echo $btn; ?></button>
                <?php } ?>
                <a href="/user" class="btn btn-danger link">Kembali</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <div>
    <a href="javascript:void(0)" class="settingPanelToggle"></a>
  </div>
</div>