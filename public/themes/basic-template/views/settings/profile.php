<?php $data = Theme::get('data'); ?>
<div class="row">
  <div class="large-9 medium-9 small-12 columns" role="content">
    <div class="row">
      <form method="POST" action="<?php echo route('post.profile'); ?>" enctype="multipart/form-data" data-abide>
          <?php echo csrf_field(); ?>
          <div class="row">
            <div class="large-8 medium-8 small-6 columns">
              <div class="row">
                <div class="large-12 medium-12 small-12 columns">
                  <label>First Name
                    <input type="text" name="firstname" value="<?php echo _getOldData('firstname', $data['userData']['firstname']); ?>" required />
                  </label>
                  <small class="error">Invalid First Name</small>
                </div>
                <div class="large-12 medium-12 small-12 columns">
                  <label>Last Name
                    <input type="text" name="lastname" value="<?php echo _getOldData('lastname', $data['userData']['lastname']); ?>" required />
                  </label>
                  <small class="error">Invalid Last Name</small>
                </div>
                <div class="large-12 medium-12 small-12 columns">
                  <label>Picture
                    <input type="file" name="picture" />
                    <input type="hidden" name="old_picture" value="<?php echo $data['userData']['picture']; ?>" />
                  </label>
                </div>
              </div>
            </div>
            <div class="large-4 medium-4 small-6 columns">
              <label class="th margin-top-img">
                <img src="<?php echo _checkPicture($data['userData']['gender'], $data['userData']['picture']); ?>" alt="" title="" width="300" height="300" />
              </label>
            </div>
          </div>

          <div class="row">
            <div class="large-4 medium-4 small-6 columns">
              <label>Contact Number
                <input type="text" name="contact_number" onkeypress="return baseHelper.isNumber(event)" value="<?php echo _getOldData('contact_number', $data['userData']['contact_number']); ?>" pattern="integer" />
              </label>
              <small class="error">Invalid Contact Number</small>
            </div>
            <div class="large-4 medium-4 small-6 columns">
              <label>Birth Date
                <input type="text" name="birth_date" class="date-picker" value="<?php echo _getOldData('birth_date', $data['userData']['birth_date']); ?>" />
              </label>
            </div>
            <div class="large-4 medium-4 small-6 columns">
              <label>Gender
                <select name="gender">
                  <?php $actv = array('1' => 'Male', '2' => 'Female'); ?>
                  <?php foreach ($actv as $key => $value) { ?>
                    <?php if($key == $data['userData']['gender']){ $selected = 'selected="selected"'; }else{ $selected = ''; } ?>
                    <option <?php echo $selected; ?> value="<?php echo $key; ?>"><?php echo $value; ?></option>
                  <?php } ?>
                </select>
              </label>
            </div>
          </div>

          <div class="row">
            <div class="large-12 medium-12 small-12 columns">
              <label>Address
                <textarea name="address"><?php echo _getOldData('address', $data['userData']['address']); ?></textarea>
              </label>
            </div>
          </div>

          <div class="row">
            <div class="large-12 medium-12 small-12 columns">
              <button type="submit" class="right">Update</button>
            </div>
          </div>
      </form>
    </div>
  </div>
</div>
