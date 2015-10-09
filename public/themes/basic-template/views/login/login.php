<div class="row">
  <div class="large-4 medium-6 small-12 medium-centered large-centered columns">
    <form method="POST" action="<?php echo route('post.login'); ?>" data-abide>
      <?php echo csrf_field(); ?>

      <div class="row">
        <div class="large-12 medium-12 small-12 columns">
          <label>Email
            <input type="email" name="email" value="" required pattern="email" />
          </label>
          <small class="error">Invalid Email.</small>
        </div>
      </div>

      <div class="row">
        <div class="large-12 medium-12 small-12 columns">
          <label>Password ( <a href="<?php echo route('get.forgot'); ?>">Forgot Password</a> )
            <input type="password" name="password" value="" required />
          </label>
          <small class="error">Invalid Password.</small>
        </div>
      </div>

      <div class="row">
        <div class="large-6 medium-6 small-6 columns">
          <label>Remember Me
            <div class="switch small">
              <input name="remember" id="remember" type="checkbox" />
              <label for="remember"></label>
            </div>
          </label>
        </div>
        <div class="large-6 medium-6 small-6 columns">
          <button type="submit" class="right">Login</button>
        </div>
      </div>

    </form>
  </div>
</div>
