<!DOCTYPE html>
<!--[if lt IE 9]><html xmlns:fb="http://ogp.me/ns/fb#" xmlns:og="http://ogp.me/ns#" lang="en" class="ie8 no-js"> <![endif]-->
<!--[if gt IE 9]><!-->
<html xmlns:fb="http://ogp.me/ns/fb#" xmlns:og="http://ogp.me/ns#" lang="en" class="no-js">
<!--<![endif]-->
  <head>
      <title><?php echo Theme::get('title'); ?></title>
      <!-- Meta template -->
      <?php echo Theme::partial('meta'); ?>

      <?php
        echo Theme::asset()->container('base-css')->styles();
        echo Theme::asset()->styles();
        echo Theme::asset()->container('theme-css')->styles();
      ?>
  </head>
  <body>
      <div class="header">
        <?php echo Theme::partialWithLayout('header'); ?>
        <?php echo Theme::partialWithLayout('menu'); ?>
      </div>

      <div class="content">
          <?php echo Theme::partialWithLayout('alertbox'); ?>
          <?php echo Theme::content(); ?>
      </div>

      <div class="footer">
          <?php echo Theme::partialWithLayout('subfooter'); ?>
          <?php echo Theme::partialWithLayout('footer'); ?>
      </div>

      <?php
        echo Theme::asset()->container('base-js')->scripts();
        echo Theme::asset()->scripts();
        echo Theme::asset()->container('theme-js')->scripts();
      ?>
  </body>
</html>
