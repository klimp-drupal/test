<html>

  <head>
    <title><?php echo $vars['title']; ?></title>
  </head>

  <body>
    <?php if (!empty($vars['content'])): ?>
      <?php include 'view/content.php'; ?>
    <?php endif; ?>
  </body>

</html>