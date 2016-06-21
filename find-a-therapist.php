<?php include 'include/head.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php include 'include/head.php'; ?>
<title><?php echo MENU_RMTCA_FOUND; ?></title>
<meta name="description" content="<?php echo MENU_RMTCA; ?>">
<meta name="keywords" content="<?php echo MENU_RMTCA; ?>">
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
  <div class="whiteBG"> <img src="images/slides/home6.jpg" width="100%">
    <div class="article">
      <h2><?php echo ($lang=="cn")?"中国韵律按摩疗法治疗师名单及联络方式":"Find a therapist"; ?></h2>
      <div class="table-responsive">
        <table class="table table-hover table-striped">
          <thead>
            <tr>
              <th colspan="2"><?php echo LBL_NAME; ?></th>
              <th><?php echo LBL_LOCATION; ?></th>
              <th><?php echo LBL_EMAIL; ?></th>
              <th><?php echo LBL_CONTACT_NUMBER; ?></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>于娜</td>
              <td>Yu Na</td>
              <td>大连</td>
              <td><a href="mailto:jane974@sina.com">jane974@sina.com</a></td>
              <td>(86)   13842657198</td>
            </tr>
            <tr>
              <td>王芊</td>
              <td>Wang Qian</td>
              <td>北京</td>
              <td><a href="mailto:wqian079@163.com">wqian079@163.com</a></td>
              <td>(86)   18600544685</td>
            </tr>
            <tr>
              <td>刘爽</td>
              <td>Connie Liu</td>
              <td>北京</td>
              <td><a href="mailto:lconnie@263.net">lconnie@263.net</a></td>
              <td>(86)   13001189488</td>
            </tr>
            <tr>
              <td>朱巍</td>
              <td>Vivianne,   Wei Zhu</td>
              <td>上海</td>
              <td><a href="mailto:1055503257@qq.com">1055503257@qq.com</a></td>
              <td>(86)   13601984100</td>
            </tr>
            <tr>
              <td>严伟群</td>
              <td>Christy Yan</td>
              <td>深圳</td>
              <td><a href="mailto:878234275@qq.com">878234275@qq.com</a></td>
              <td>(86)   13825233861</td>
            </tr>
            <tr>
              <td>李洪伟</td>
              <td>Li Hongwei</td>
              <td>长春</td>
              <td><a href="mailto:noya0431@126.com">noya0431@126.com</a></td>
              <td>(86)   13194369985</td>
            </tr>
            <tr>
              <td>陈学军</td>
              <td>Nica Chen</td>
              <td>深圳</td>
              <td><a href="mailto:1478970093@qq.com">1478970093@qq.com</a></td>
              <td>(86)   13510083810</td>
            </tr>
            <tr>
              <td>陈靖</td>
              <td>CJ Chen</td>
              <td>广州</td>
              <td><a href="mailto:ecocraft@163.com">ecocraft@163.com</a></td>
              <td>(86)   13922140209</td>
            </tr>
            <tr>
              <td>周菊</td>
              <td>Zhou Ju</td>
              <td>武汉</td>
              <td><a href="mailto:394577595@qq.com">394577595@qq.com</a></td>
              <td>(86)   18071728768</td>
            </tr>
            <tr>
              <td>俞桦</td>
              <td>Yu Hua</td>
              <td>长春</td>
              <td><a href="mailto:23923903@qq.com">23923903@qq.com</a></td>
              <td>(86)   18686606455</td>
            </tr>
            <tr>
              <td>赵克娜</td>
              <td>Zhao Kena</td>
              <td>南宁</td>
              <td><a href="mailto:357060278@qq.com">357060278@qq.com</a></td>
              <td>(86)   13597002902</td>
            </tr>
            <tr>
              <td>桉榛</td>
              <td>An Zhen</td>
              <td>西安/成都</td>
              <td><a href="mailto:248837830@qq.com">248837830@qq.com</a></td>
              <td>(86)   13892849693</td>
            </tr>
            <tr>
              <td>康淑娟</td>
              <td>Kang Shujuan</td>
              <td>天津</td>
              <td><a href="mailto:nancy_mango@126.com">nancy_mango@126.com</a></td>
              <td>(86)   18698071397</td>
            </tr>
          </tbody>
        </table>
        <?php echo ($lang=='cn')?'*注：所有会员均已参加3年制的韵律按摩疗法培训，并已获得歌德大殿颁发的韵律按摩疗法治疗师证书。':''; ?> </div>
      <h5> </h5>
    </div>
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
