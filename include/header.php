<?php
include("seguranca.php"); // Inclui o arquivo com o sistema de segurança
protegePagina(); // Chama a função que protege a página
include ("functions.php");
?>
<style>
.innerheader{
	xposition: absolute;
	xbackground-color:red;
	xheight:70px;
	line-height: 70px; /* same as height! */
	padding-left: 50px;
	font-size:4vw;
}
.titulo {
    position: absolute;
    left: 20vw;
    top: 3px;
	background-color:red;

}
.titulo2 {
    position: relative;
	font-size:1.5vw;
}


</style>
	<div class="pre-loader"></div>
	<div class="header clearfix">
		<div class="header-right">
			<div class="brand-logo">
				<a href="index.php">
					<img src="vendors/images/logo.png" alt="" class="mobile-logo">
				</a>
			</div>
			<div class="menu-icon">
				<span></span>
				<span></span>
				<span></span>
				<span></span>
			</div>
			
			<div class="innerheader">Sistema de Inventário
				<span class="titulo2"><?php echo 'Olá ' . $_SESSION['usuarioNome'] . ' - ' . $_SESSION['usuarioLogin']; ?></span>
			</div>
		</div>
	</div>