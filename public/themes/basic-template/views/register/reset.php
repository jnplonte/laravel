<?php $data = Theme::get('data'); ?>
<div class="row">
  <div class="large-4 medium-6 small-12 medium-centered large-centered columns">
    <form method="POST" action="<?php echo route('post.reset'); ?>" data-abide>
        <?php echo csrf_field(); ?>
        <input type="hidden" name="token" value="<?php echo $data['token']; ?>">

        <div class="row">
          <div class="large-12 medium-12 small-12 columns">
            <label>Email
              <input type="email" name="email" value="" required pattern="email" value="<?php echo old('email'); ?>" />
            </label>
            <small class="error">Invalid Email.</small>
          </div>
        </div>

        <div class="row">
          <div class="large-12 medium-12 small-12 columns">
            <label>Password
              <input type="password" name="password" id="password" value="" required pattern="" data-equalto="password_confirmation" />
            </label>
            <small class="error">Invalid Password.</small>
          </div>
        </div>

        <div class="row">
          <div class="large-12 medium-12 small-12 columns">
            <label>Confirm Password
              <input type="password" name="password_confirmation" id="password_confirmation" value="" required pattern="" data-equalto="password"/>
            </label>
            <small class="error">Invalid Confirm Password.</small>
          </div>
        </div>

        <div class="row">
          <div class="large-12 medium-12 small-12 columns">
            <button type="submit" class="right">Reset Password</button>
          </div>
        </div>
    </form>
  </div>
</div>
