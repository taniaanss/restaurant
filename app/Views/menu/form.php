<?php

$id = isset($menu) ? $menu->menu_id : "";
$menu_name = isset($menu) ? $menu->menu_name : "";
$menu_price = isset($menu) ? $menu->menu_price : "";
$menu_stock = isset($menu) ? $menu->menu_stock : "";
$menu_category = isset($menu) ? $menu->category_name : "";
$description = isset($menu) ? $menu->description : "";
$photo = isset($menu) ? $menu->photo : "";
$v = isset($v) ? "readonly" : "";
$btn = isset($menu) ? "Ubah" : "Simpan";
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
                <input type="hidden" name="menu_id" value="<?= $id; ?>">
                <div class="form-group">
                  <label for="menu_name">Menu</label>
                  <input type="text" class="form-control" id="menu_name" name="menu_name" aria-describedby="menu_name" placeholder="Enter name" value="<?= $menu_name ?>" <?= $v; ?> required>
                  <small id="menu_name" class="form-text text-muted">Input name product properly.</small>
                </div>
                <div class="form-group">
                  <label for="menu_price">Price</label>
                  <input type="number" class="form-control" name="menu_price" id="menu_price" aria-describedby="menu_price" placeholder="Enter price" value="<?= $menu_price ?>" <?= $v; ?>>
                  <small id="menu_price" class="form-text text-muted">Input price properly.</small>
                </div>
                <div class="form-group">
                  <label for="menu_stock">Stock</label>
                  <input type="number" class="form-control" name="menu_stock" id="menu_stock" aria-describedby="menu_stock" placeholder="Enter stock" value="<?= $menu_stock ?>" <?= $v; ?> required>
                  <small id="Input stock product properly." class="form-text text-muted">Input stock properly.</small>
                </div>
                <div class="form-group">
                  <label for="description">Description</label>
                  <textarea name="description" id="" class="form-text text-muted" cols="80" rows="10" <?php echo $v; ?>><?php echo $description ?></textarea>
                  <small id="Input description product properly." class="form-text text-muted">Input description properly.</small>
                </div>
                <div class="form-group">
                  <label for="select2Single">Category</label>
                  <?php if ($v == "") { ?>

                    <select class="select2-single form-control" name="menu_category" id="select2Single" <?php echo $v; ?> required>
                      <?php if ($menu_category !== "") { ?>

                        <option value="<?php echo $menu->menu_id ?>" selected><?php echo $menu->category_name; ?></option>
                        <?php foreach ($categories as $row) { ?>
                          <option value="<?php echo $row["id"] ?>"><?php echo $row["category_name"];  ?></option>
                        <?php } ?>

                      <?php } else { ?>

                        <option value="" selected>Choose Category</option>
                        <?php foreach ($categories as $row) { ?>
                          <option value="<?php echo $row["id"] ?>"><?php echo $row["category_name"];  ?></option>
                        <?php } ?>

                      <?php } ?>

                    </select>

                  <?php } else { ?>

                    <p><?php echo $menu->category_name; ?></p>

                  <?php } ?>
                </div>
                <div class="form-group">
                  <label for="photo">Photo</label>
                  <div class="custom-file">
                    <?php if ($v == "") { ?>
                      <label class="custom-file-label" for="customFile" id="setFile">Choose file For Menu</label>
                      <input type="file" class="custom-file-input" id="customFile" name="photo" onchange="ValidateSingleInput(this);">

                      <p class="mt-3">Types are allowed :jpg/png/jpeg/PNG</p><br />
                    <?php } ?>

                    <?php if ($photo !== "") { ?>
                      <img class="mb-3" src="<?php echo base_url() . "/upload/" . $menu->photo; ?>" alt="" style="max-height: 200px;"><br><br>
                    <?php } ?>

                  </div>
                </div>
              </div>
              <div class="card-footer text-right">
                <?php if ($v == "") { ?>
                  <button class="btn btn-primary mr-1" type="submit"><?php echo $btn; ?></button>
                <?php } ?>
                <a href="/menu" class="btn btn-danger link">Kembali</a>
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



<script>
  var _validFileExtentions = [".PNG", ".png", ".jpg", ".jpeg"];

  function ValidateSingleInput(params) {
    $('#setFile').text(params.value);
    if (params.type == "file") {
      var sFileName = params.value;
      if (sFileName.length > 0) {

        console.log(params.value);
        var blnValid = false;
        for (let index = 0; index < _validFileExtentions.length; index++) {
          const element = _validFileExtentions[index];
          if (sFileName.substr(sFileName.length - element.length, element.length).toLowerCase() ==
            element.toLowerCase()) {
            blnValid = true;
            break;
          }
        }
      }

      if (!blnValid) {
        alert("Sorry, " + sFileName + "that's extention is not allowed: " +
          _validFileExtentions.join(", "));
        params.value = "";
        return false;
      }
    }


  }
</script>