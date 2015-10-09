<?php $data = Theme::get('data'); ?>
<div class="row">
  <div class="large-9 medium-9 small-12 columns" role="content">
    <div class="row">
      <div class="large-12 medium-12 small-12 columns">
        <form method="POST" action="<?php echo route('post.user', $data['userData']->id); ?>">
          <?php echo csrf_field(); ?>
          <div class="row">
            <div class="large-8 medium-8 small-6 columns">
              <div class="row">
                  <div class="large-12 medium-12 small-12 columns">
                <label>Name
                  <input type="text" readonly="readonly" value="<?php echo $data['userData']->firstname.' '.$data['userData']->lastname; ?>" />
                </label>
              </div>
                <div class="large-12 medium-12 small-12 columns">
                  <label>UserName
                    <input type="text" readonly="readonly" value="<?php echo $data['userData']->username; ?>" />
                  </label>
                </div>
                <div class="large-12 medium-12 small-12 columns">
                  <label>Email
                    <input type="text" readonly="readonly" value="<?php echo $data['userData']->email; ?>" />
                  </label>
                </div>
              </div>
            </div>
            <div class="large-4 medium-4 small-6 columns">
              <label class="th margin-top-img">
                <img data-src="<?php echo _checkPicture($data['userData']->gender, $data['userData']->picture); ?>" src="<?php echo url(config('theme.themeAssetsDir').'/img/blank_img.png'); ?>" class="lazy" alt="" title="" width="300" height="300" />
              </label>
            </div>
          </div>

          <div class="row">
            <div class="large-3 medium-3 small-6 columns">
              <label>Contact Number
                <input type="text" readonly="readonly" value="<?php echo $data['userData']->contact_number; ?>" />
              </label>
            </div>
            <div class="large-3 medium-3 small-6 columns">
              <label>Birth Date
                <input type="text" readonly="readonly" value="<?php echo $data['userData']->birth_date; ?>" />
              </label>
            </div>
            <div class="large-3 medium-3 small-6 columns">
              <label>Gender
                <input type="text" readonly="readonly" value="<?php echo _checkGender($data['userData']->gender); ?>" />
              </label>
            </div>
            <div class="large-3 medium-3 small-6 columns">
              <label>Created
                <input type="text" readonly="readonly" value="<?php echo date('F d, Y', strtotime($data['userData']->created_at)); ?>" />
              </label>
            </div>
          </div>

          <div class="row">
            <div class="large-12 medium-12 small-12 columns">
              <label>Address
                <textarea readonly="readonly"><?php echo $data['userData']->address; ?></textarea>
              </label>
            </div>
          </div>

          <div class="row">
            <div class="large-6 medium-6 small-6 columns">
              <label>Role
                <select name="role">
                  <?php $actv = array('1' => 'Administrator', '2' => 'Manager', '3' => 'User'); ?>
                  <?php foreach ($actv as $key => $value) { ?>
                    <?php if($key == $data['userData']->role){ $selected = 'selected="selected"'; }else{ $selected = ''; } ?>
                    <option <?php echo $selected; ?> value="<?php echo $key; ?>"><?php echo $value; ?></option>
                  <?php } ?>
                </select>
              </label>
            </div>
            <div class="large-6 medium-6 small-6 columns">
              <label>Active
                <select name="active">
                  <?php $actv = array('1' => 'Active', '0' => 'InActive'); ?>
                  <?php foreach ($actv as $key => $value) { ?>
                    <?php if($key == $data['userData']->active){ $selected = 'selected="selected"'; }else{ $selected = ''; } ?>
                    <option <?php echo $selected; ?> value="<?php echo $key; ?>"><?php echo $value; ?></option>
                  <?php } ?>
                </select>
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
</div>
