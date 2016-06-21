<div class="container">
  <header>
    <div class="logo" > <a href="index.php"><img src="images/logo_<?php echo $lang; ?>.png" class="img-responsive" /></a> </div>
  </header>
  <div class="navbar navbar-inverse navbar-static-top" role="navigation">
    <div class="col-lg-9 col-md-9 col-sm-6 col-xs-6" >
      <div class="row container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo MENU_RMT; ?><b class="caret"></b></a>
              <ul class="dropdown-menu">
                <!-- <li class="dropdown-header">By floor</li>-->
                <li><a href="anthroposophy.php"><?php echo MENU_ANTHROPOSOPHY; ?> </a></li>
                <li><a href="anthroposophy-medicine.php"><?php echo MENU_ANTHROPOSOPHY_MEDICINE; ?> </a></li>
                <li><a href="rhythmical-massage-therapy.php"><?php echo MENU_RMT; ?> </a></li>
              </ul>
            </li>
            <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo MENU_RMTCA; ?><b class="caret"></b></a>
              <ul class="dropdown-menu">
                
                <li><a href="about.php"><?php echo MENU_ABOUT_RMTCA; ?></a></li>
                <li><a href="application.php"><?php echo MENU_BE_RMTCA; ?></a></li>
                <li><a href="find-a-therapist.php"><?php echo MENU_RMTCA_FOUND; ?> </a></li>
              </ul>
            </li>
            <li><a href="articles.php"><?php echo MENU_ARTICLES; ?></a></li>
            <li><a href="events.php"><?php echo MENU_EVENTS; ?></a></li>
            <li><a href="links.php"><?php echo MENU_LINKS; ?></a></li>
            <li><a href="contact.php"><?php echo MENU_CONTACT; ?></a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 lang" > <a href="<?php echo $currentUrl.'?lang='.$langChoice; ?>">
      <?php 
                if ($lang=='cn') echo MENU_ENGLISH;
                  else echo MENU_CHINESE;
               ?>
      </a></div>
    <div class="clearfix"></div>
  </div>
</div>
