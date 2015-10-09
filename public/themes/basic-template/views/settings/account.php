<?php $data = Theme::get('data'); ?>
<div class="row">
  <div class="large-12 medium-12 small-12 columns">
    <form method="POST" action="<?php echo route('post.account'); ?>" data-abide>
      <?php echo csrf_field(); ?>

      <div class="row">
        <div class="large-12 medium-12 small-12 columns">
          <label>UserName
            <input type="text" name="username" value="<?php echo _getOldData('username', $data['userInfo']['username']); ?>" required pattern="alpha_numeric" />
            <input type="hidden" name="old_username" value="<?php echo $data['userInfo']['username']; ?>" />
          </label>
          <small class="error">Invalid UserName</small>
        </div>
      </div>

      <div class="row">
        <div class="large-12 medium-12 small-12 columns">
          <label>Email
            <input type="email" name="email" value="<?php echo _getOldData('email', $data['userInfo']['email']); ?>" required pattern="email" />
            <input type="hidden" name="old_email" value="<?php echo $data['userInfo']['email']; ?>" />
          </label>
          <small class="error">Invalid Email.</small>
        </div>
      </div>

      <div class="row">
        <div class="large-12 medium-12 small-12 columns">
          <label>Active
            <div class="switch small">
              <input name="active" id="active" <?php echo _checkCheckBox($data['userInfo']['active']); ?> type="checkbox" />
              <label for="active"></label>
            </div>
          </label>
        </div>
      </div>

      <div class="row">
        <div class="large-12 medium-12 small-12 columns">
          <button type="submit" class="right">Update</button>
        </div>
      </div>
    </form>
  </div>
</div>
