<?php include 'include/head.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php include 'include/head.php'; ?>
<title><?php echo MENU_ARTICLES; ?></title>
<meta name="description" content="<?php echo MENU_ARTICLES; ?>">
<meta name="keywords" content="<?php echo MENU_ARTICLES; ?>">
<link rel="shortcut icon" href="assets/ico/favicon.ico">

<!-- Bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/style.css" />

<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

<link href="css/carousel.css" rel="stylesheet">
</head>
<body>
<div class="navbar-wrapper">
  <?php include 'include/header.php'; ?>
</div>
<div class="container">
  <div class="whiteBG"> <img src="images/slides/home7.jpg" width="100%">
    <div class="article">
      <div>
        <h2><?php echo MENU_ARTICLES; ?></h2>
        <?php include 'pages/article_'.$lang.'.html'; ?>
      </div>
    </div>
  </div>
</div>
<div class="container">
  <footer>
    <?php include 'include/footer.php'; ?>
  </footer>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="assets/js/docs.min.js"></script> 
<script src="js/myjs.js"></script>
</body>
</html>
