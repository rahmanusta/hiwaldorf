<?php include 'include/head.php'; 
if($_POST['register']){
	
	// prepare data
	$name= strip_tags($_POST['name']);
	$email= strip_tags($_POST['email']);
	$message= strip_tags($_POST['message']);
	$newsletter= strip_tags($_POST['newsletter']);
	
require_once( 'include/recaptchalib.php' );

$privatekey = "6Lfe4ggTAAAAAJBOI1aI8lmi9Z-jhrKuOJjfgxMp";
			
$resp = recaptcha_check_answer ($privatekey,
							$_SERVER["REMOTE_ADDR"],
							$_POST["recaptcha_challenge_field"],
							$_POST["recaptcha_response_field"]);

	
if ($resp->is_valid){	

// send email 	
    //$To = "juliezly@gmail.com";
	$To = "mtachina@126.com";
  	$Subject = "Email from web";
  	$Message = '';
  	$headers = 'MIME-Version: 1.0' . "\r\n" . 'Content-type: text/plain; charset=UTF-8' . "\r\n"; 
  	
	  $Message .= "\n";
	  $Message .= "姓名 : ".$name."\n";
	  $Message .= "邮箱地址: ".$email."\n";
	  $Message .= "信息: \n";
	  $Message .= "--------------------------\n";
	  $Message .= "$message\n";
	  $Message .= "\n";
	  

	  $blnSent = mail($To, $Subject, $Message, $headers."From: $email\r\n");
  	if ($blnSent == true)
		 $submit="yes";	
	}else 
	$submit="no";
}
else 
	$submit="no";
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo MENU_CONTACT; ?></title>
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

<link href="css/carousel.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link href="css/form.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/jquery.validate.css" />
<link rel="stylesheet" href="css/responsive_recaptcha.css" />
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>
<div class="navbar-wrapper">
  <?php include 'include/header.php'; ?>
</div>
<div class="container">
  <div class="whiteBG">
   <img src="images/slides/home7.jpg" width="100%">
    <div class="col-md-offset-1  col-md-10" id="form">
    <div class="clearfix15"></div><h5 style="text-align:center">
  <?php
   if($lang=="cn"){
   ?>
   请发邮件<a href="mailto:mtachina@126.com" >mtachina@126.com</a>或填写以下表单联系我们：
    <?php
   }else{
   ?>
   Please send email to:<a href="mailto:rmtachina@163.com" >rmtachina@163.com</a> or fill in the form to contact us：
   <?php
   }
   ?>
   </h5>
      <?php  
		if ($submit =='no') {
			?>
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <ul class="contactForm">
          <li>
            <div class="labelForm"><?php echo LBL_NAME; ?>: </div>
            <input type="text" id="name" name="name" required  value="<?php echo $name; ?>" / >
          </li>
          <li>
            <div class="labelForm"><?php echo LBL_EMAIL; ?>: </div>
            <input type="text" id="email" name="email" value="<?php echo $email; ?>" required /  >
          </li>
          <li>
            <div class="labelForm"><?php echo LBL_COMMENTS; ?>: </div>
            <textarea name="message" id="message" class="rounded default-value" rows="5" required><?php echo $message; ?></textarea>
            <div  class="clearer"></div>
          </li>
          <li>
            <div class="labelForm">&nbsp;</div>
            <input type="checkbox" id="newsletter" name="newsletter" value="1" CHECKED style="margin-left:5%;">
            <?php echo LBL_NEWSLETTER; ?><br>
            <div  class="clearer"></div>
          </li>
          <li> 
            <script type="text/javascript">
 			var RecaptchaOptions = {
    		theme : 'custom',
    		custom_theme_widget: 'responsive_recaptcha'
 };
 </script>
            <div id="responsive_recaptcha" style="display:none">
              <div id="recaptcha_image"></div>
              <div class="recaptcha_only_if_incorrect_sol" style="color:red">Incorrect please try again</div>
              <label class="solution"> <span class="recaptcha_only_if_image"><?php echo LBL_TYPE_TEXT; ?></span> <span class="recaptcha_only_if_audio"><?php echo LBL_ENTER_NUMBER; ?></span>
                <input type="text" id="recaptcha_response_field" name="recaptcha_response_field" />
              </label>
              <div class="options"> <a href="javascript:Recaptcha.reload()" id="icon-reload"><?php echo LBL_REFRESH_CAPTCHA; ?></a> <a class="recaptcha_only_if_audio" href="javascript:Recaptcha.switch_type('image')" id="icon-image"><?php echo LBL_IMAGE_CAPTCHA; ?> </a> <a href="javascript:Recaptcha.showhelp()" id="icon-help"><?php echo LBL_HELP; ?></a> </div>
            </div>
            <script type="text/javascript"
    src="http://www.google.com/recaptcha/api/challenge?k=6Lfe4ggTAAAAAEXJRWrKNSCYu_zgbjNQBOv5yFX_">
 </script>
            <noscript>
            <iframe src="http://www.google.com/recaptcha/api/noscript?k=6Lfe4ggTAAAAAEXJRWrKNSCYu_zgbjNQBOv5yFX_"
        height="300" width="500" frameborder="0"></iframe>
            <br />
            <textarea name="recaptcha_challenge_field" rows="3" cols="40">
   </textarea>
            <input type="hidden" name="recaptcha_response_field"
        value="manual_challenge" />
            </noscript>
          </li>
          <li>
            <div class="labelForm">&nbsp;</div>
            <input type="submit" value="<?php echo BTN_REGISTER; ?>" class="register" name="register" id="register" />
          </li>
          <div  class="clearer"></div>
        </ul>
      </form>
      <?php }  else {?>
      <div id="thank">
        <p><?php echo TEXT_THANK; ?> </p>
      </div>
      <?php } ?>
    </div>
    <div class="clearfix"></div>
  </div>
</div>
<div class="container">
  <footer>
    <?php include 'include/footer.php'; ?>
  </footer>
</div>
<!-- /.container --> 

<!-- Bootstrap core JavaScript
    ================================================== --> 
<!-- Placed at the end of the document so the pages load faster --> 
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="assets/js/docs.min.js"></script> 
<script src="js/jquery.validate.js" type="text/javascript"></script> 
<script src="js/myjs.js"></script> 
<script type="text/javascript">
$(document).ready(function() {
// form validation
var required = new Array("name","email", "message", "recaptcha_response_field");
for (var i = 0; i < required.length; i++) {
                jQuery("#"+required[i]).validate({
                    expression: "if (VAL) return true;else return false;",
                    message: ""
                });
				
	}


jQuery("#email").validate({
                    expression: "if (VAL.match(/^[^\\W][a-zA-Z0-9\\_\\-\\.]+([a-zA-Z0-9\\_\\-\\.]+)*\\@[a-zA-Z0-9_]+(\\.[a-zA-Z0-9_]+)*\\.[a-zA-Z]{2,4}$/) && VAL) return true; else return false;",
                    message: ""
                });
				

				
});
</script>
</body>
</html>
