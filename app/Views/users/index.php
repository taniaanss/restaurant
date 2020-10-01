<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h4><?= $title; ?></h4>
              <a type="button" class="btn btn-primary link" href="/user/add"><i class="fas fa-plus" data-toggle="tooltip" data-placement="top" title="Add Users"></i></a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-hover" id="table-1">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>First Name</th>
                      <th>Last Name</th>
                      <th>Email</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    foreach ($users as $row) { ?>
                      <tr>
                        <td class="text-center"><?= $no++ ?></td>
                        <td><?= $row['first_name'] ?></td>
                        <td><?= $row['last_name'] ?></td>
                        <td><?= $row['email']; ?></td>
                        <td>
                          <a class="btn btn-sm btn-icon btn-info link" href="user/view/<?= $row['id'] ?>"><i class="fas fa-eye" data-toggle="tooltip" data-placement="top" title="View User"></i></a>
                          <button class="btn btn-sm btn-icon btn-danger remove" id="<?= $row['id'] ?>" type="submit" value="<?= $row['id'] ?>">
                            <i class="fas fa-trash" data-toggle="tooltip" data-placement="top" title="Delete User"></i> </button>
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
            url: 'user/delete/' + id,
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