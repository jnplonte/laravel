<form method="POST" action="<?php echo route('post.register'); ?>">
    <?php echo csrf_field(); ?>

    <div>
        Name
        <input type="text" name="username" value="<?php echo old('username'); ?>">
    </div>

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
        <button type="submit">Register</button>
    </div>
</form>
