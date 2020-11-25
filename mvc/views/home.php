<!DOCTYPE html>
<html lang="en">
<head>
	<base href="http://localhost/PRO1014/">
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Viettel Store</title>
	<link rel="stylesheet" type="text/css" href="public/fonts/fontawesome-pro-5.14.0-web/css/all.min.css">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
  	<link rel="stylesheet" type="text/css" href="public/plugin/owlcarousel/assets/owl.carousel.min.css">
	<link rel="stylesheet" type="text/css" href="public/plugin/owlcarousel/assets/owl.theme.default.min.css">
	<link rel="stylesheet" type="text/css" href="public/css/reset.css">
  <link rel="stylesheet" type="text/css" href="public/css/style.css">
  
</head>
<body>
	<div class="wrapper" style="background:<?= isset($data["Background"]) ? $data["Background"]: "" ?>">
		<?php require_once "./mvc/views/blocks/header_nav_home.php" ?>
		<div class="container">
			<?php require_once "./mvc/views/pages/".$data["Page"].".php" ?>
		</div>
		<?php require_once "./mvc/views/blocks/footer.php" ?>
	</div>

  <script type="text/javascript" src="public/javascripts/jquery-3.5.0.min.js"></script>
  <script type="text/javascript" src="public/plugin/owlcarousel/owl.carousel.min.js"></script>
  <script type="text/javascript" src="public/javascripts/js.js"></script>
</body>
</html>
