<!-- Modal Logout -->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabelLogout">Ohh No!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to logout?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
        <a href="<?php echo base_url('login/logout'); ?>" class="btn btn-primary">Logout</a>
      </div>
    </div>
  </div>
</div>

</div>
<!---Container Fluid-->
</div>


<footer class="main-footer">
  <div class="footer-left">
    <p>Copyright @ 2020</p>
  </div>
  <div class="footer-right">
  </div>
</footer>


<script src="<?= base_url('admin/assets/js/jquery-3.5.1.min.js'); ?>"></script>
<!-- General JS Scripts -->
<script src="<?= base_url('admin/assets/js/app.min.js'); ?>"></script>
<!-- JS Libraries -->
<script src="<?= base_url('admin/assets/bundles/datatables/datatables.min.js'); ?>"></script>
<script src="<?= base_url('admin/assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js'); ?>"></script>
<script src="<?= base_url('admin/assets/bundles/jquery-ui/jquery-ui.min.js'); ?>"></script>
<script src="<?= base_url('admin/assets/bundles/sweetalert/sweetalert.min.js'); ?>"></script>
<script src="<?= base_url('admin/assets/bundles/prism/prism.js'); ?>"></script>
<script src="<?= base_url('admin/assets/bundles/izitoast/js/iziToast.min.js'); ?>"></script>
<!-- Page Specific JS File -->
<script src="<?= base_url('admin/assets/js/page/datatables.js'); ?>"></script>
<script src="<?= base_url('admin/assets/js/page/sweetalert.js'); ?>"></script>
<script src="<?= base_url('admin/assets/js/page/toastr.js'); ?>"></script>
<!-- admin JS File -->
<script src="<?= base_url('admin/assets/js/scripts.js'); ?>"></script>
<!-- Custom JS File -->
<script src="<?= base_url('admin/assets/js/custom.js'); ?>"></script>
<script src="<?= base_url('admin/assets/bundles/apexcharts/apexcharts.min.js'); ?>"></script>
<script src="<?= base_url('admin/assets/js/page/index.js'); ?>"></script>

<!-- Page level custom scripts -->
<script>
  $(document).ready(function() {

    $('#dataTableHover').DataTable(); // ID From dataTable with Hover
  });
</script>
<script src="<?php echo base_url('/admin/assets/bundles/toast/js/toastr.min.js'); ?>"></script>
<!-- Select2 -->
<script src="<?php echo base_url('/admin/assets/bundles/select2/dist/js/select2.min.js'); ?>"></script>
<script>
  $('.select2-single').select2();

  // Select2 Single  with Placeholder
  $('.select2-single-placeholder').select2({
    placeholder: "Select a Province",
    allowClear: true
  });

  // Select2 Multiple
  $('.select2-multiple').select2();
</script>

<script>
  toastr.options = {
    "debug": false,
    "positionClass": "toast-top-full-width",
    "onclick": null,
    "fadeIn": 300,
    "fadeOut": 1000,
    "timeOut": 5000,
    "extendedTimeOut": 1000
  }
  <?php if (session()->getFlashData('success')) { ?>
    toastr.success("<?php echo session()->getFlashData('success'); ?>");
  <?php } else if (session()->getFlashData('error')) { ?>
    toastr.error("<?php echo session()->getFlashData('error'); ?>");
  <?php } else if (session()->getFlashData('warning')) { ?>
    toastr.warning("<?php echo session()->getFlashData('warning'); ?>");
  <?php } else if (session()->getFlashData('info')) { ?>
    toastr.info("<?php echo session()->getFlashData('info'); ?>");
  <?php } ?>
</script>

</body>

</html>