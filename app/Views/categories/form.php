<?php

$id = isset($category) ? $category->id : "";
$category_name = isset($category) ? $category->category_name : "";
$category_status = isset($category) ? $category->category_status : "";
$v = isset($v) ? "readonly" : "";
$btn = isset($category) ? "Ubah" : "Simpan";
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
                <div class="form-group">
                  <label for="category_name">Category Name</label>
                  <input type="text" class="form-control" id="category_name" name="category_name" aria-describedby="category_name" placeholder="Enter name" value="<?= $category_name ?>" <?= $v; ?> required>
                  <small id="category_name" class="form-text text-muted">Input category name properly.</small>
                </div>
                <div class="form-group">
                  <label for="category_status">Status</label>
                  <div class="col-sm-9">
                    <div class="custom-control custom-radio">
                      <input type="radio" id="customRadio1" name="status" class="custom-control-input" value="Active" <?php if ($category_status == 'Active') echo 'checked' ?> checked>
                      <label class="custom-control-label" for="customRadio1">Active</label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input type="radio" id="customRadio2" name="status" class="custom-control-input" value="Inactive" <?php if ($category_status == 'Inactive') echo 'checked' ?>>
                      <label class="custom-control-label" for="customRadio2">Inactive</label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer text-right">
                <?php if ($v == "") { ?>
                  <button class="btn btn-primary mr-1" type="submit"><?php echo $btn; ?></button>
                <?php } ?>
                <a href="/category" class="btn btn-danger link">Kembali</a>
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