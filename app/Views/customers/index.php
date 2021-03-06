<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h4><?= $title; ?></h4>

              <a type="button" class="btn btn-primary link mr-2" href="/customer/add"><i class="fas fa-plus" data-toggle="tooltip" data-placement="top" title="Add Data"></i></a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-hover" id="table-1">
                  <thead class="thead-light">
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Phone Number</th>
                      <th>Address</th>
                      <th>City</th>
                      <th>Country</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    foreach ($customers as $row) { ?>
                      <tr>
                        <td class="text-center"><?php echo $no++ ?></td>
                        <td><?php echo $row['customer_name'] ?></td>
                        <td><?php echo $row['customer_phone'] ?></td>
                        <td><?php echo $row['street'] ?></td>
                        <td><?php echo $row['city'] ?></td>
                        <td><?php echo $row['country'] ?></td>
                        <td><a class="btn btn-sm btn-icon btn-warning" href="/customer/edit/<?php echo $row['id'] ?>"><i class="far fa-edit" data-toggle="tooltip" data-placement="top" title="Edit Data"></i></a>
                          <a class="btn btn-sm btn-icon btn-info link" href="/customer/view/<?php echo $row['id'] ?>"><i class="fas fa-eye" data-toggle="tooltip" data-placement="top" title="View Data"></i></a>
                          <button class="btn btn-sm btn-icon btn-danger remove" id="<?php echo $row['id'] ?>" type="submit" value="<?php echo $row['id'] ?>">
                            <i class="fas fa-trash" data-toggle="tooltip" data-placement="top" title="Delete Data"></i> </button>
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
            url: '/customer/delete/' + id,
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