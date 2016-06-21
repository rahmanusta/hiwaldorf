<?php 

$idName = '';
$f=$rest = substr($_GET['r'], 0, 1);

$cat1 = array('302', '304', '306');
$cat2 = array('309', '310', '409', '410');
$cat3 = array('308', '408');
$cat4 = array('405', '505', '605', '705', '805', '905', '1005', '1105', '1205', '1405','1505');
$cat5 = array('401', '801', '901', '1001', '1101', '1201', '1401','1501' ,'1601');
$cat6 = array('403', '503', '603', '703', '803', '903', '1003', '1103', '1203', '1403','1503');
$cat7 = array('501', '601', '701');
$cat8 = array('502', '602', '702');
$cat9 = array('802', '902', '1002', '1102', '1202', '1402', '504', '604', '704', '804', '904', '1004', '1104', '1204', '1404', '806', '906', '1006', '1106', '1206', '1406', '1603', '1605');
$cat10 = array('507', '607', '707', '807', '907', '1007', '1107', '1207', '1407', '1507', '1607');
$cat11 = array('508', '608', '708', '808', '908', '1008', '1108', '1208', '1408', '1508', '1608');
$cat12 = array('1502', '1504', '1506');

switch($_GET['r']){
	case in_array($_GET['r'], $cat1) == 1:
		$idName = 'Plan_Vente-2_CHAMBRES-condoplex';												
    break;
	case in_array($_GET['r'], $cat2) == 1:
		$idName = 'Plan_Vente-1_CHAMBRE-loggia';												
    break;
	case in_array($_GET['r'], $cat3) == 1:
		$idName = 'Plan_Vente-2_CHAMBRES-loggia';												
    break;
	case in_array($_GET['r'], $cat4) == 1:
		$idName = 'Plan_Vente-1_CHAMBRE_PLUS';												
    break;
	case in_array($_GET['r'], $cat5) == 1:
		$idName = 'Plan_Vente-3_CHAMBRES';												
    break;
	case in_array($_GET['r'], $cat6) == 1:
		$idName = 'Plan_Vente-STUDIO';												
    break;
    case in_array($_GET['r'], $cat7) == 1:
		$idName = 'Plan_Vente-2_CHAMBRES-tupper';												
    break;
 	case in_array($_GET['r'], $cat8) == 1:
		$idName = 'Plan_Vente-2_CHAMBRES-master';												
    break;
	case in_array($_GET['r'], $cat9) == 1:
		$idName = 'Plan_Vente-1_CHAMBRE';												
    break;
	case in_array($_GET['r'], $cat10) == 1:
		$idName = 'Plan_Vente-2_CHAMBRES-coin_CV';												
    break;
    case in_array($_GET['r'], $cat11) == 1:
		$idName = 'Plan_Vente-2_CHAMBRES-coin_montagne';												
    break;   
     case in_array($_GET['r'], $cat12) == 1:
		$idName = 'Plan_Vente-PENTHOUSE';												
    break;      
    default:
       $idName = $_GET['r'];
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php include 'include/head.php'; ?>
<meta name="description" content="">
<meta name="author" content="">
<meta name="description" content="">
<link rel="shortcut icon" href="assets/ico/favicon.ico">
<title>map</title>

<!-- Bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/style.css" />

<!--			<link rel="stylesheet" type="text/css" href="css/layout.css">
-->
<link rel="stylesheet" type="text/css" href="css/plan.css">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script type="text/javascript" src="http://www.condoscrescent.com/js/smartresize.js"></script>
<script type="text/javascript" src="http://www.condoscrescent.com/js/modernizr.js"></script>
<script type="text/javascript" src="js/main.js"></script>
<style>
.col-md-10 img{width:100%;}
</style>

<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

<!-- Custom styles for this template -->
<link href="css/carousel.css" rel="stylesheet">
</head>
<!-- NAVBAR
================================================== -->
<body>
<div class="navbar-wrapper">
  <?php include 'include/header.php'; ?>
</div>
<div class="container">
<div class="row featurette">
  <div class="col-md-10" style="position: relative;">
    <img src="floorplans/images/<?php echo $idName; ?>.jpg" ></div>
  <div class="col-md-2" >

 <a href="floorplan.php?f=<?php echo $f; ?>"> <div id="floor_number_floor"><?php echo LBL_FLOOR.' '.$f; ?> </div></a>
     <a href="floorplans/pdf/<?php echo $idName; ?>.pdf" target="_blank" ><img src="images/pdf.png" width="40" ></a> Download</li>
  </div>
  </div>
   <hr>
 <!-- FOOTER -->
  <footer>
    <?php include 'include/footer.php'; ?>
  </footer>
</div>

<!-- Placed at the end of the document so the pages load faster --> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="assets/js/docs.min.js"></script>
</body>
</html>
