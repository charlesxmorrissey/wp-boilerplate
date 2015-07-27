<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <title><?php wp_title(''); ?></title>

    <link rel="stylesheet" href="<?php print STYLES_DIR . 'main.css'; ?>">

    <script src="<?php print VENDOR_SCRIPTS_DIR . 'modernizr-2.8.3.min.js'; ?>"></script>

    <?php wp_head(); ?>
  </head>

  <body class="<?php echo body_classes(); ?>" data-behavior="stub">
