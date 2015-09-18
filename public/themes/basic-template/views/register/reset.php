<?php $data = Theme::get('data'); ?>
<form method="POST" action="<?php echo route('post.reset'); ?>">
    <?php echo csrf_field(); ?>
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
