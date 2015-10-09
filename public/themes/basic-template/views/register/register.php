<div class="row">
  <div class="large-12 medium-12 small-12 columns">
    <form method="POST" action="<?php echo route('post.register'); ?>" data-abide>
      <?php echo csrf_field(); ?>

      <div class="row">
        <div class="large-12 medium-12 small-12 columns">
          <label>UserName
            <input type="text" name="username" value="" required pattern="alpha_numeric" value="<?php echo old('username'); ?>" />
          </label>
          <small class="error">Invalid UserName.</small>
        </div>
      </div>

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
          <small class="error">Invalid New Password.</small>
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
          <button type="submit" class="right">Register</button>
        </div>
      </div>

    </form>
  </div>
</div>
