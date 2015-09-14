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

<form method="POST" action="/reset">
    <?php echo csrf_field(); ?>
    <?php $data = Theme::get('data'); ?>

    <input type="hidden" name="token" value="<?php echo $data['token']; ?>">

    <div>
        Email
        <input type="text" name="email" value="<?php echo old('email'); ?>">
    </div>

    <div>
        Password
        <input type="password" name="password">
    </div>

    <div>
        Confirm Password
        <input type="password" name="password_confirmation">
    </div>

    <div>
        <button type="submit">
            Reset Password
        </button>
    </div>
</form>
