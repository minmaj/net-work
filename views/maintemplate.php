<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="public/css/vendor/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/vendor/sb-admin-2.css">
    <link rel="stylesheet" href="public/css/vendor/metisMenu.min.css"> 
    <link rel="stylesheet" href="public/css/vendor/font-awesome-4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="public/css/vendor/morris.css">
    <link rel="stylesheet" href="public/css/main.css">
    
    <meta charset="utf-8"/>

    <title><?php echo $viewModel->get('pageTitle'); ?></title>
  </head>
  <body>
    <?php require($this->viewFile); ?>

    <script src="public/js/vendor/jquery-2.1.3.min.js"></script>
    <script src="public/js/vendor/bootstrap.min.js"></script>
    <script src="public/js/vendor/sb-admin-2.js"></script>
    <script src="public/js/vendor/metisMenu.min.js"></script>
    <script src="public/js/vendor/jquery.tablesorter.js"></script>
    <script src="public/js/vendor/morris.min.js"></script>
    <script src="public/js/vendor/raphael-min.js"></script>
    <script src="public/js/vendor/jquery.tmpl.min.js"></script>
    <script src="public/js/main.js"></script>
    <script src="public/js/live-update.js"></script>
    <script src="public/js/synoptique.js"></script>
  </body>
</html>