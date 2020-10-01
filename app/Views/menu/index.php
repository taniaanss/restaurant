<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h4><?= $title; ?></h4>
              <a type="button" class="btn btn-primary link" href="/menu/add"><i class="fas fa-plus" data-toggle="tooltip" data-placement="top" title="Add Menu"></i></a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-hover" id="table-1">
                  <thead class="thead-light">
                    <tr>
                      <th>#</th>
                      <th>Photo</th>
                      <th>Menu</th>
                      <th>Price</th>
                      <th>Stock</th>
                      <th>Category</th>
                      <th>Description</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    foreach ($menu as $row) { ?>
                      <tr>
                        <td class="text-center"><?php echo $no++ ?></td>
                        <td> <img src="<?php echo base_url('upload/' . $row['photo']) ?>" alt="photo menu" width="80px" height="80px"> </td>
                        <td><?php echo $row['menu_name'] ?></td>
                        <td><?php echo $row['menu_price'] ?></td>
                        <td><?php echo $row['menu_stock'] ?></td>
                        <td><?php echo $row['category_name'] ?></td>
                        <td><?php echo $row['description'] ?></td>
                        <td><a class="btn btn-sm btn-icon btn-warning" href="/menu/edit/<?php echo $row['menu_id'] ?>"><i class="far fa-edit" data-toggle="tooltip" data-placement="top" title="Edit Menu"></i></a>
                          <a class="btn btn-sm btn-icon btn-info link" href="/menu/view/<?php echo $row['menu_id'] ?>"><i class="fas fa-eye" data-toggle="tooltip" data-placement="top" title="View Menu"></i></a>
                          <button class="btn btn-sm btn-icon btn-danger remove" id="<?php echo $row['menu_id'] ?>" type="submit" value="<?php echo $row['menu_id'] ?>">
                            <i class="fas fa-trash" data-toggle="tooltip" data-placement="top" title="Delete Menu"></i> </button>
                        </td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <div>
    <a href="javascript:void(0)" class="settingPanelToggle">
    </a>
  </div>
</div>


<script type="text/javascript">
  $(".remove").click(function() {

    var id = $(this).val();
    console.log(id);

    swal({
        title: "Are you sure?",
        text: "You will not be able to recover this imaginary file!",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Yes, delete it!",
        cancelButtonText: "No, cancel plx!",
        closeOnConfirm: true,
        closeOnCancel: true

      },

      function(isConfirm) {
        if (isConfirm) {

          $.ajax({
            url: '/menu/delete/' + id,
            type: 'POST',
            error: function() {

              alert('Something is wrong');

            },

            success: function(data) {

              console.log(data);
              swal({
                title: "Deleted!",
                text: "Your data has been deleted.",
                type: "success"
              }, function() {
                location.reload();
              });

            }
          });

        } else {
          swal("Cancelled", "Your imaginary file is safe :)", "error");

        }

      });

  });
</script>