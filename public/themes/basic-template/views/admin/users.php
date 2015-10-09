<?php $data = Theme::get('data'); ?>
<div class="row">
  <div class="large-9 medium-9 small-12 columns" role="content">
    <div class="row">
      <div class="large-12 medium-12 small-12 columns">
        <form method="GET" action="<?php echo route('users'); ?>">
          <div class="row collapse">
            <div class="large-10 medium-10 small-8 columns">
              <?php if (!empty($data['getData']) ){ ?>
                <?php foreach ($data['getData'] as $key => $value) { ?>
                    <?php if($key != 'q') { ?>
                      <input type='hidden' name='<?php echo $key; ?>' value='<?php echo $value; ?>'/>
                    <?php } ?>
                <?php } ?>
              <?php } ?>
              <input type="text" name="q" id="q" value="<?php echo !empty($data['getData']['q']) ? $data['getData']['q'] : ''; ?>" placeholder="">
            </div>
            <div class="large-2 medium-2 small-4 columns">
              <input type="submit" class="button postfix" value="SEARCH" />
            </div>
          </div>
        </form>
      </div>
    </div>
    <div class="row">
      <div class="large-12 medium-12 small-12 columns">
        <table class="responsive" style="width:100%;">
           <tbody>
             <tr>
                <th class="table-<?php echo _checkTableClass($data['getData'], 'username'); ?>"><a class="black" href="<?php echo route('users', array_merge($data['getData'], array('t' => 'username', 's' => _checkArrowValue($data['getData'], 'username') ) )); ?>"><i class="<?php echo _checkArrowClass($data['getData'], 'username'); ?>"></i> USERNAME</a></th>
                <th class="table-<?php echo _checkTableClass($data['getData'], 'firstname'); ?>"><a class="black" href="<?php echo route('users', array_merge($data['getData'], array('t' => 'firstname', 's' => _checkArrowValue($data['getData'], 'firstname') ) )); ?>"><i class="<?php echo _checkArrowClass($data['getData'], 'firstname'); ?>"></i> NAME</a></th>
                <th class="table-<?php echo _checkTableClass($data['getData'], 'email'); ?>"><a class="black" href="<?php echo route('users', array_merge($data['getData'], array('t' => 'email', 's' => _checkArrowValue($data['getData'], 'email') ) )); ?>"><i class="<?php echo _checkArrowClass($data['getData'], 'email'); ?>"></i> EMAIL</a></th>
                <th>ACTIVE</th>
                <th>ROLE</th>
                <th></th>
             </tr>
             <?php if(!empty($data['usersData']->items())){ ?>
               <?php foreach ($data['usersData']->items() as $key => $value) { ?>
                 <tr>
                   <td class="table-<?php echo _checkTableClass($data['getData'], 'username'); ?>"><?php echo $value->username; ?></td>
                   <td class="table-<?php echo _checkTableClass($data['getData'], 'firstname'); ?>"><?php echo $value->firstname.' '.$value->lastname; ?></td>
                   <td class="table-<?php echo _checkTableClass($data['getData'], 'email'); ?>"><?php echo $value->email; ?></td>
                   <td><?php echo _checkActive($value->active); ?></td>
                   <td><?php echo _checkRole($value->role); ?></td>
                   <td><a href="<?php echo route('get.user', $value->id); ?>" class="label secondary">EDIT</a></td>
                 </tr>
               <?php } ?>
             <?php }else{ ?>
                 <tr>
                   <td colspan="6" class="center-text"><span class="bold">NO RESULTS FOUND</span></td>
                 </tr>
             <?php } ?>
           </tbody>
         </table>
         <div class="pagination-centered">
          <?php if(!empty($data['usersData']->items())){ ?>
            <?php echo _getUserPagination($data['usersData'], $data['getData']); ?>
          <?php } ?>
        </div>
       </div>
     </div>
  </div>
</div>
