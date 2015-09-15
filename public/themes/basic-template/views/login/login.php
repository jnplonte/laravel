<?php if (count($errors) > 0){ ?>
  <div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
      <?php foreach ($errors->all() as $key => $value) { ?>
         <li><?php echo $value; ?></li>
      <?php } ?>
    </ul>
  </div>
<?php } ?>

<form method="POST" action="<?php echo route('post.login'); ?>">
    <?php echo csrf_field(); ?>

    <div>
        Email
        <input type="text" name="email" value="<?php echo old('email'); ?>">
    </div>

    <div>
        Password
        <input type="password" name="password">
    </div>

    <div>
      <input type="checkbox" name="remember"> Remember Me
    </div>

    <div>
        <button type="submit">Login</button>
    </div>
</form>

<a href="/forgot">Forgot Your Password? </a>
