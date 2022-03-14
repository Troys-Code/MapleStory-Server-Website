<?php session_start();
include('config.php');
include('includes/connect.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $name; ?> - Admin CP</title>
<link href="styles.css" rel="stylesheet" type="text/css" />
<?php include('includes/styles.php'); ?>
</head>
<body>
<div class="container">
<div class="main">
	<div class="banner"><?php echo $name; ?><span><br /><?php echo $slogan; ?></span></div>
	<div class="navLeft"></div>
	<div class="navCenter"><?php include('includes/navigation.php'); ?></div>
	<div class="navRight"></div><br />
	<div class="contentContainer">
		<div class="navReflection"></div>
		<div class="content">
		<?php include('includes/admin_cp.php'); ?>
		</div>
		<?php include('includes/sidebar.php'); ?>
	</div>
	<?php include('includes/footer.php'); ?>
</div>
</div>
</body>
</html>