<?php $data = Theme::get('data'); ?>
<form method="POST" action="<?php echo route('post.password'); ?>">
    <?php echo csrf_field(); ?>

    <div>
        Old Password
        <input type="password" name="password">
    </div>

    <div>
        Password
        <input type="password" name="new_password">
    </div>

    <div>
        Confirm Password
        <input type="password" name="new_password_confirmation">
    </div>

    <div>
        <button type="submit">Update</button>
    </div>
</form>
