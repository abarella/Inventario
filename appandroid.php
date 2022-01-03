<!DOCTYPE html>
<html>
<head>
	<?php include('include/head.php'); ?>
</head>


<body>
	<?php include('include/header.php'); ?>
	<?php include('include/sidebar.php'); ?>
	<div class="main-container">
		<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
			<div class="bg-white pd-20 box-shadow border-radius-5 mb-30">
			<?php
			
			echo "<div class='fieldSet1'>";
			echo "<br>App Android: Baixe o app android do servidor da ABJ utilizando o qr-code ou no navegador do seu celular acesse o link<br>";
			echo "http://www.abjinfo.com.br/inventario/app/inventario.apk<br>";
			echo "<img class='codBar' src='images/qr_code_inventario.jpg' width='90px' />";
			echo "<br><br>";
			echo "</div>";			
			
			?>
			</div>
		<?php include('include/footer.php'); ?>
		</div>
	</div>
	<?php include('include/script.php'); ?>
	
	
	</body>
</html>
