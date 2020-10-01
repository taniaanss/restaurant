<?php
$customer = isset($output) ? $output[0]['customer_name'] : "";
$time = isset($output) ? str_replace('`', '', $output[0]['waktu']) : "";
$v = isset($v) ? "readonly" : "";
$btn = isset($output) ? "Ubah" : "Simpan";
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
                  <label for="select2Single">Customer</label>
                  <?php if ($v == "") { ?>

                    <select class="select2-single form-control" name="customer_id" <?php echo $v; ?> required style="width:100%">
                      <option value="" selected>Choose Customer</option>
                      <?php foreach ($customers as $row) { ?>
                        <option value="<?php echo $row["id"] ?>"><?php echo $row["customer_name"];  ?></option>
                      <?php } ?>
                    </select>

                  <?php } else { ?>

                    <p><?php echo $customer; ?></p>

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
                      <tfoot>
                        <tr>
                          <th>No</th>
                          <th>Menu Name</th>
                          <th>Qty</th>
                        </tr>
                      </tfoot>
                      <tbody>

                        <?php
                        $no = 1;
                        foreach ($output as $row) { ?>
                          <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $row['menu_name'] ?></td>
                            <td><?php echo $row['amount'] ?></td>
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
                <a href="/output" class="btn btn-danger link">Kembali</a>
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
        var stock = parseInt($("#qty" + idlast).val());
        var selectedBarang = parseInt($("#idbrg" + idlast).children("option:selected").attr('class'));

        $.each(menu, function() {
          opt += '<option value="' + this.menu_id + '" id="myselect" class="' + this.menu_stock + '">' + this.menu_name + '</option>';

        });

        if (selectedBarang < stock) {

          alert("Melebihi stok yang tersedia");

        } else {

          var ddlBrg = '<select name="idbrg[]" id="idbrg' + lastRow + '" class="select2-single form-control " required>' + opt + '</select>';
          var txtJml = '<input type="number" name="qty[]" class="form-control qty" id="qty' + lastRow + '" data-rule-required="true" data-rule-number="true"/>';
          var trash = '<i class="fas fa-trash" onClick="hapus(' + lastRow + ')"></i>';
          tbl.append("<tr id='tr" + lastRow + "'><td>" + ddlBrg + "</td><td align='right'>" + txtJml + "</td><td><center>" + trash + "</center></td></tr>");
          var selectedVal = $('select[name="idbrg"] :selected').attr('class');


          $("#idbrg" + lastRow).change(function() {
            var selectedBarang2 = parseInt($("#idbrg" + lastRow).children("option:selected").attr('class'));
            console.log(selectedBarang2);
            if (selectedBarang2 == 0) {
              alert("Stok Produk ini habis silahkan pilih yang lain");
              document.getElementById("qty" + lastRow).readOnly = true;
            } else {
              document.getElementById("qty" + lastRow).readOnly = false;

            }
          });

        }

      } else {
        alert("Silahkan mengisi data pada baris yang tersedia terlebih dahulu, sebelum menambah baris");
      }

    }

    function hapus(id) {
      $('#databrg #tr' + id).remove();
    };

    document.getElementById('my-form').addEventListener("submit", function(e) {

      if ($('#databrg').find("td").length == 0) {
        e.preventDefault();
        alert(`Silahkan mengisi data produk`);
        return false;
      } else {
        return true;
      }
    });

  <?php } ?>
</script>