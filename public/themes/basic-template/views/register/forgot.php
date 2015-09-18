<form method="POST" action="<?php echo route('post.forgot'); ?>">
    <?php echo csrf_field(); ?>

    <div>
        Email
        <input type="text" name="email" value="<?php echo old('email'); ?>">
    </div>

    <div>
        <button type="submit">Send Password Reset Link</button>
    </div>
</form>
