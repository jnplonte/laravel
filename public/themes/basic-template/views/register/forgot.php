<div class="row">
  <div class="large-4 medium-6 small-12 medium-centered large-centered columns">
    <form method="POST" action="<?php echo route('post.forgot'); ?>" data-abide>
      <?php echo csrf_field(); ?>

      <div class="row">
        <div class="large-12 medium-12 small-12 columns">
          <label>Email
            <input type="email" name="email" value="<?php echo old('email'); ?>" required pattern="email" />
          </label>
          <small class="error">Invalid Email.</small>
        </div>
      </div>

      <div class="row">
        <div class="large-12 medium-12 small-12 columns">
          <button type="submit" class="expand">Send Password Reset Link</button>
        </div>
      </div>

    </form>
  </div>
</div>
