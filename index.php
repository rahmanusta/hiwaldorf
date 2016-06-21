<?php include 'include/head.php'; ?>
<?php
function chinesesubstr($str, $start, $len) { 
        $strlen = $start + $len; 
        for($i = $start; $i < $strlen;) { 
            if (ord ( substr ( $str, $i, 1 ) ) > 0xa0) {
                $tmpstr .= substr ( $str, $i, 3 );
                $i=$i+3; 
            } else{ 
                $tmpstr .= substr ( $str, $i, 1 ); 
                $i++; 
            } 
        } 
        return $tmpstr; 
    } 

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo META_HOME_TITLE; ?></title>
<meta name="description" content="<?php echo META_HOME_DESC; ?>">
<meta name="keywords" content="<?php echo META_HOME_KWD; ?>">
<meta name="author" content="Julie Zhu">
<link rel="shortcut icon" href="assets/ico/favicon.ico">

<!-- Bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

<!-- Custom styles for this template -->
<link href="css/carousel.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/style.css" />
</head>
<!-- NAVBAR
================================================== -->
<body>
<div class="navbar-wrapper">
  <?php include 'include/header.php'; ?>
</div>
<!-- Carousel
================================================== -->
<div class="container">
  <div class="whiteBG">
    <div id="myCarousel" class="carousel slide" data-ride="carousel"> 
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
        <li data-target="#myCarousel" data-slide-to="3"></li>
        <li data-target="#myCarousel" data-slide-to="4"></li>
        <li data-target="#myCarousel" data-slide-to="5"></li>
        <li data-target="#myCarousel" data-slide-to="6"></li>
      </ol>
      <div class="carousel-inner">
        <div class="item active"> <img src="images/slides/home5.jpg" alt=""> </div>
        <div class="item"> <img src="images/slides/home2.jpg" alt=""> </div>
        <div class="item"> <img src="images/slides/home6.jpg" class="img-responsive" alt=""></div>
        <div class="item"> <img src="images/slides/home3.jpg" class="img-responsive" alt=""></div>
        <div class="item"> <img src="images/slides/home7.jpg" class="img-responsive" alt=""></div>
        <div class="item"> <img src="images/slides/home4.jpg" class="img-responsive" alt=""></div>
        <div class="item"> <img src="images/slides/home8.jpg" class="img-responsive" alt=""></div>
      </div>
      <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a> <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a> </div>
    <div class="clearfix"></div>
    <div class="col-lg-4 col-md-4 centerDiv"> <img src="images/img_event_6.jpg" width="120" class="imgCircle" alt="">
      <h3><?php echo ($lang=="en")?"Rhythmical massage therapy":"韵律按摩疗法"; ?></h3>
      <p><?php echo ($lang=="en")?"What is rhythmical massage therapy and how is it different from classical forms of massage? ...":"根据伊塔韦格曼医生的说法，韵律按摩疗法是一种经过人智学观点扩展的古典按摩形式 ..." ?> </p>
      <p><a class="btn btn-default" href="rhythmical-massage-therapy.php" role="button"><?php echo TTL_DETAIL; ?></a></p>
    </div>
    <div class="col-lg-4 col-md-4 centerDiv"> <img src="images/img_event_5.jpg" width="120" class="imgCircle" alt="">
      <h3> <?php echo ($lang=="en")?'Events':'活动分享';?></h3>
      <p><?php echo ($lang=="en")?'Plant Observation, Singing and Painting Workshop"
':'“植物观察与唱歌”工作坊' ?> </p>
      <p><a class="btn btn-default" href="http://mp.weixin.qq.com/s?__biz=MjM5NjAwNTI3Mw==&amp;mid=213870666&amp;idx=1&amp;sn=323e456747115118d0b54e511bf7785e&amp;scene=5&amp;srcid=0904pi267xzfUeNhBkzqaw0x#rd" role="button" target="_blank"><?php echo TTL_DETAIL; ?></a></p>
    </div>
    <div class="col-lg-4 col-md-4 centerDiv"> <img src="images/img_event_7.jpg" width="120" class="imgCircle" alt="">
      <h3><?php echo ($lang=="en")?"Latest Articles":"相关文献";; ?></h3>
      <p><?php echo ($lang=="en")?"The Path to Freedom and Love and their Significance in World Events ...":"通向自由和爱的道路以及它们在世界事件中的重要性..." ?> </p>
      <p><a class="btn btn-default" href="articles.php" role="button"><?php echo TTL_MOREARTICLES; ?></a></p>
    </div>
    <div class="clearfix"></div>
  </div>
</div>
<div class="container">
  <footer>
    <?php include 'include/footer.php'; ?>
  </footer>
</div>
<script src="js/jquery.min.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="assets/js/docs.min.js"></script> 
<script src="js/myjs.js"></script>
</body>
</html>
