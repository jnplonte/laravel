<!DOCTYPE html>
<!--[if IE 8]><html xmlns:fb="http://ogp.me/ns/fb#" xmlns:og="http://ogp.me/ns#" lang="" class="ie8"> <![endif]-->
<!--[if gt IE 8]><!-->
<html xmlns:fb="http://ogp.me/ns/fb#" xmlns:og="http://ogp.me/ns#" lang="" class="">
<!--<![endif]-->
  <head>
      <title><?php echo Theme::get('title'); ?></title>
      <!-- Meta template -->
      <?php echo Theme::partialWithLayout('meta'); ?>
      <!-- HTML5 shim for IE backwards compatibility -->
      <!--[if lt IE 9]>
          <script type='text/javascript' src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
      <![endif]-->

      <?php echo Theme::asset()->styles(); ?>
      <?php echo Theme::asset()->container('layout-css')->styles(); ?>
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
      <?php echo Theme::asset()->container('layout-js')->scripts(); ?>

      <!--[if lt IE 9]>
          <script src="http://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
  </body>
</html>
