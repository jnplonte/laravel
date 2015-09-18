<?php if (count($errors) > 0){ ?>
  <?php echo _showAlert($errors, 'danger'); ?>
<?php }else{ ?>
  <?php echo _showAlert(session('message'), 'success'); ?>
<?php } ?>
