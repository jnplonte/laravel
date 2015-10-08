<?php $data = Theme::get('data'); ?>
<form method="POST" action="<?php echo route('post.password'); ?>" data-abide>
    <?php echo csrf_field(); ?>
    <div class="row">
      <div class="large-12 medium-12 small-12 columns">
        <label>Old Password
          <input type="password" name="password" value="" required pattern="" />
        </label>
        <small class="error">Invalid Old Password.</small>
      </div>
    </div>

    <div class="row">
      <div class="large-12 medium-12 small-12 columns">
        <label>New Password
          <input type="password" name="new_password" id="new_password" value="" required pattern="" data-equalto="new_password_confirmation" />
        </label>
        <small class="error">Invalid New Password.</small>
      </div>
    </div>

    <div class="row">
      <div class="large-12 medium-12 small-12 columns">
        <label>Confirm Password
          <input type="password" name="new_password_confirmation" id="new_password_confirmation" value="" required pattern="" data-equalto="new_password"/>
        </label>
        <small class="error">Invalid Confirm Password.</small>
      </div>
    </div>

    <div class="row">
      <div class="large-12 medium-12 small-12 columns">
        <button type="submit" class="right">Update</button>
      </div>
    </div>
</form>
