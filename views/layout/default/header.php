<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title><?php echo $this->title;?></title>
    
	<link rel="stylesheet" href="<?php echo APP_URL_CSS.'bootstrap.min.css'; ?>">
	<link rel="stylesheet" href="<?php echo APP_URL_CSS.'style.css'; ?>">
	<link rel="stylesheet" href="<?php echo APP_URL_CSS.'font-awesome/css/all.min.css'; ?>">
</head>
<body class="bg-low-grey">
	<nav class="navbar navbar-expand-lg navbar-dark bg-blue">
		<a class="navbar-brand" href="#">MoneyTracking</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
	    	<span class="navbar-toggler-icon"></span>
	  	</button>
	  	<div class="collapse navbar-collapse" id="navbarNav">
	  		<ul class="navbar-nav">
	  			<li class="nav-item active">
					<a class="nav-link" href="<?php echo APP_URL.'accounts'; ?>">
						<span class="fa fa-credit-card"></span>
						Cuentas
					</a>
				</li>
				<li class="nav-item active">
					<a class="nav-link" href="<?php echo APP_URL.'categories'; ?>">
						<span class="fa fa-bars"></span>
						Categorias
					</a>
				</li>
				<li class="nav-item active">					
					<a class="nav-link" href="<?php echo APP_URL.'transactions'; ?>">
						<span class="fa fa-exchange-alt"></span>
						Transacciones
					</a>
				</li>
	  		</ul>
	  	</div>
	</nav>
