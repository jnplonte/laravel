<?php $data = Theme::get('data'); ?>
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

<form method="POST" action="<?php echo route('post.profile'); ?>" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>

    <div>
        firstname
        <input type="text" name="firstname" value="<?php echo _getOldData('firstname', $data['userData']['firstname']); ?>">
    </div>

    <div>
        lastname
        <input type="text" name="lastname" value="<?php echo _getOldData('lastname', $data['userData']['lastname']); ?>">
    </div>

    <div>
        picture
        <input type="file" name="picture">
    </div>

    <div>
        address
        <input type="text" name="address" value="<?php echo _getOldData('address', $data['userData']['address']); ?>">
    </div>

    <div>
        contact_number
        <input type="text" name="contact_number" value="<?php echo _getOldData('contact_number', $data['userData']['contact_number']); ?>">
    </div>

    <div>
        birth_date
        <input type="text" name="birth_date" value="<?php echo _getOldData('birth_date', $data['userData']['birth_date']); ?>">
    </div>

    <div>
        <button type="submit">Update</button>
    </div>
</form>
