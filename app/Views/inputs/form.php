<?php
$supplier = isset($input) ? $input[0]['supplier_name'] : "";
$time = isset($input) ? str_replace('`', '', $input[0]['waktu']) : "";
$v = isset($v) ? "readonly" : "";
$btn = isset($input) ? "Ubah" : "Simpan";
?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-body">
      <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
          <div class="card">
            <form action="<?php echo site_url($urlmethod) ?>" method="post" enctype="multipart/form-data" id="my-form">
              <div class="card-header">
                <h4 class="mt-2 mb-2"><?= $title; ?></h4>
              </div>
              <div class="card-body">
                <div class="form-group">
                  <label for="time">Time</label>
                  <input type="text" class="form-control" id="time" aria-describedby="time" value="<?php echo $time ?>" readonly required>
                  <small id="time" class="form-text text-muted">Time data is updated.</small>
                </div>
                <div class="form-group">
                  <label for="select2Single">Suppliers</label>
                  <?php if ($v == "") { ?>

                    <select class="select2-single form-control" name="supplier_id" id="select2Single" <?php echo $v; ?> required style="width:100%">
                      <option value="" selected>Choose Supplier</option>
                      <?php foreach ($suppliers as $row) { ?>
                        <option value="<?php echo $row["id"] ?>"><?php echo $row["supplier_name"];  ?></option>
                      <?php } ?>
                    </select>

                  <?php } else { ?>

                    <p><?php echo $supplier; ?></p>

                  <?php } ?>
                </div>

                <div class="form-group">
                  <label for="tabledata">Menu List</label>

                  <?php if ($v !== "") { ?>

                    <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                      <thead class="thead-light">
                        <tr>
                          <th>No</th>
                          <th>Menu Name</th>
                          <th>Qty</th>
                        </tr>
                      </thead>
                      <tbody>

                        <?php
                        $no = 1;
                        foreach ($input as $row) { ?>
                          <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $row['menu_name'] ?></td>
                            <td><?= $row['amount'] ?></td>
                          </tr>
                        <?php } ?>


                      </tbody>
                    </table>

                  <?php } else { ?>

                    <table class="table table-hover" id="databrg" required>
                      <thead>
                        <tr>
                          <th>Menu Name</th>
                          <th>Qty</th>
                          <th><i class="fas fa-trash-o"></i></th>
                        </tr>
                      </thead>
                      <tbody></tbody>
                    </table>
                    <a class="btn btn-success link" onClick="tambah()"><i class="fas fa-plus"></i> Tambah Baris</a>

                  <?php } ?>

                  <br />
                </div>
              </div>
              <div class="card-footer text-right">
                <?php if ($v == "") { ?>
                  <button class="btn btn-primary mr-1" type="submit"><?php echo $btn; ?></button>
                <?php } ?>
                <a href="/input" class="btn btn-danger link">Kembali</a>
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
  <?php if ($v === "") { ?>

    var menu = <?= json_encode($menu); ?>;

    function tambah() {


      var tbl = $('#databrg');
      var lastRow = tbl.find("tr").length;
      var idlast = lastRow - 1;
      var emptyrows = 0;
      for (i = idlast; i < lastRow; i++) {
        if ($("#idbrg" + i).val() == '' || $("#qty" + i).val() == '') {
          emptyrows += 1;
        }
      }

      if (emptyrows == 0) {
        var opt = '';
        $.each(menu, function() {
          opt += '<option value="' + this.menu_id + '">' + this.menu_name + '</option>';
        });

        var ddlBrg = '<select name="idbrg[]" id="idbrg' + lastRow + '" class="select2-single form-control idbrg" required>' + opt + '</select>';
        var txtJml = '<input type="text" name="qty[]" class="form-control qty" id="qty' + lastRow + '" data-rule-required="true" data-rule-number="true"/>';
        var trash = '<i class="fas fa-trash" onClick="hapus(' + lastRow + ')"></i>';
        tbl.append("<tr id='tr" + lastRow + "'><td>" + ddlBrg + "</td><td align='right'>" + txtJml + "</td><td><center>" + trash + "</center></td></tr>");
      } else {
        alert("Silahkan mengisi data pada baris yang tersedia terlebih dahulu, sebelum menambah baris");
      }

    }

    function hapus(id) {
      $('#databrg #tr' + id).remove();
    };

    document.getElementById('my-form').addEventListener("submit", function(e) {

      if ($('#databrg').find("td").length == 0) {
        e.preventDefault(); // before the code

        alert(`Silahkan mengisi data menu`);
        return false;
      } else {
        return true;
      }
    });

  <?php } ?>
</script>