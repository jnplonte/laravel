<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="format-detection" content="telephone=no">
<meta http-equiv="Cache-control" content="public">
<meta property="og:type" content="website"/>

<meta property="fb:app_id" content="" />
<meta property="og:image" content=""/>
<meta property="og:image:secure_url" content=""/>
<meta property="og:title" content="<?php echo Theme::get('title'); ?>" />
<meta property="og:url" content="<?php echo Request::url(); ?>"/>

<meta property="og:site_name" content="<?php echo env('APP_NAME'); ?>"/>

<meta name="og:keywords" content="<?php echo Theme::getKeywords(); ?>">
<meta property="og:description" content="<?php echo Theme::getDescription(); ?>"/>
<meta name="keywords" content="<?php echo Theme::getKeywords(); ?>">
<meta name="description" content="<?php echo Theme::getDescription(); ?>">

<link rel="canonical" href="<?php echo Request::url(); ?>"/>

<link href="<?php echo Theme::asset()->url('img/favicon.ico'); ?>" rel="shortcut icon" type="image/vnd.microsoft.icon" />
