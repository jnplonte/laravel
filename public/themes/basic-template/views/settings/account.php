<?php $data = Theme::get('data'); ?>
<form method="POST" action="<?php echo route('post.account'); ?>">
    <?php echo csrf_field(); ?>

    <div>
        username
        <input type="text" name="username" value="<?php echo _getOldData('username', $data['UserInfo']['username']); ?>" />
        <input type="hidden" name="old_username" value="<?php echo $data['UserInfo']['username']; ?>" />
    </div>

    <div>
        email
        <input type="email" name="email" value="<?php echo _getOldData('email', $data['UserInfo']['email']); ?>" />
        <input type="hidden" name="old_email" value="<?php echo $data['UserInfo']['email']; ?>" />
    </div>

    <div>
        <button type="submit">Update</button>
    </div>
</form>
