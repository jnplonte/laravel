<!DOCTYPE html>
<!--[if lt IE 9]><html xmlns:fb="http://ogp.me/ns/fb#" xmlns:og="http://ogp.me/ns#" lang="en" class="ie8 no-js"> <![endif]-->
<!--[if gt IE 9]><!-->
<html xmlns:fb="http://ogp.me/ns/fb#" xmlns:og="http://ogp.me/ns#" lang="en" class="no-js">
<!--<![endif]-->
  <head>
      <title><?php echo Theme::get('title'); ?></title>
      <!-- Meta template -->
      <?php echo Theme::partialWithLayout('meta'); ?>

      <?php echo Theme::asset()->styles(); ?>
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

      <?php echo Theme::asset()->scripts(); ?>
  </body>
</html>
