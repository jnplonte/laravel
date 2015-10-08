<div class="alert-box-container">
  <?php if (count($errors) > 0){ ?>
    <?php echo _showAlert($errors, 'alert'); ?>
  <?php }else{ ?>
    <?php echo _showAlert(session('message'), 'success'); ?>
  <?php } ?>
</div>
