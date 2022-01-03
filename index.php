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
				<h4 class="mb-30">Resumo do inventário</h4>
				<div class="row">
					<div class="col-lg-3 col-md-6 col-sm-12 mb-30">
						<div class="bg-white pd-30 box-shadow border-radius-5 height-100-p">
							<div class="progress-box text-center">
								 <input type="text" class="knob dial1" value="66" data-width="120" data-height="120" data-thickness="0.15" data-fgColor="#0099ff" readonly>
								<h5 class="text-blue padding-top-10 weight-500">Total de<br>Ítens</h5>
								<span id="kn1" class="font-14">X Ítens</span>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-6 col-sm-12 mb-30">
						<div class="bg-white pd-30 box-shadow border-radius-5 height-100-p">
							<div class="progress-box text-center">
								 <input type="text" class="knob dial2" value="66" data-width="120" data-height="120" data-thickness="0.15" data-fgColor="#0099ff" readonly>
								<h5 class="text-blue padding-top-10 weight-500">Ítens <br>Contados</h5>
								<span id="kn2" class="font-14">X Ítens</span>
							</div>
						</div>
					</div>
					
					
					<div class="col-lg-3 col-md-6 col-sm-12 mb-30">
						<div class="bg-white pd-30 box-shadow border-radius-5 height-100-p">
							<div class="progress-box text-center">
								 <input type="text" class="knob dial3" value="66" data-width="120" data-height="120" data-thickness="0.15" data-fgColor="#0099ff" readonly>
								<h5 class="text-blue padding-top-10 weight-500">Ítens Não<br>Contados</h5>
								<span id="kn3" class="font-14">X Ítens</span>
							</div>
						</div>
					</div>
					
					<div class="col-lg-3 col-md-6 col-sm-12 mb-30">
						<div class="bg-white pd-30 box-shadow border-radius-5 height-100-p">
							<div class="progress-box text-center">
								 <input type="text" class="knob dial4" value="66" data-width="120" data-height="120" data-thickness="0.15" data-fgColor="#ff0000" readonly>
								<h5 class="text-blue padding-top-10 weight-500">Ítens com <br>Diferença</h5>
								<span id="kn4" class="font-14">X Ítens</span>
							</div>
						</div>
					</div>
				</div>
			</div>

			<?php include('include/footer.php'); ?>
		</div>
	</div>
	<?php include('include/script.php'); ?>
	<script src="src/plugins/highcharts-6.0.7/code/highcharts.js"></script>
	<script src="src/plugins/highcharts-6.0.7/code/highcharts-more.js"></script>
	<script src="src/plugins/jQuery-Knob-master/js/jquery.knob.js"></script>

	<?php
		include('lib/DB.php');
		$sql = "  SELECT 'Total'       as dim, count(*) as qtd FROM inventario where idContratante = '".$_SESSION['usuarioLogin'] ."'
        union all SELECT 'Contado'     as dim, count(*) as qtd FROM inventario where idContratante = '".$_SESSION['usuarioLogin'] ."' and num_total_logico = num_contagem1 and num_contagem1 <> 0  
		union all SELECT 'Não Contado' as dim, count(*) as qtd FROM inventario where idContratante = '".$_SESSION['usuarioLogin'] ."' and num_contagem1 = 0 
		union all SELECT 'Diferença'   as dim, count(*) as qtd FROM inventario where idContratante = '".$_SESSION['usuarioLogin'] ."' and num_total_logico <> num_contagem1 and num_contagem1 <> 0 ";
		$result = $conn->query($sql);
		$v1 = 0.0;
		$v2 = 0.0;
		$v3 = 0.0;
		$v4 = 0.0;
		
		
		
		
		
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				if ($row[dim] == "Total"){
					$v1 = $row[qtd];
				}
				if ($row[dim] == "Contado"){
					$v2 = $row[qtd];
				}
				if ($row[dim] == "Não Contado"){
					$v3 = $row[qtd];
				}
				if ($row[dim] == "Diferença"){
					$v4 = $row[qtd];
				}
			}
		}
		
		echo "<script>document.getElementById('kn1').innerHTML = '" . $v1 . " Ítens';</script>";
		echo "<script>document.getElementById('kn2').innerHTML = '" . $v2 . " Ítens';</script>";
		echo "<script>document.getElementById('kn3').innerHTML = '" . $v3 . " Ítens';</script>";
		echo "<script>document.getElementById('kn4').innerHTML = '" . $v4 . " Ítens';</script>";

		$p1 = 100;
		$p2 = ($v2/$v1) * 100.0;
		$p3 = ($v3/$v1) * 100.0;;
		$p4 = ($v4/$v1) * 100.0;;


	?>



	<script>
		//document.getElementById("kn1").innerHTML = '130 Ítens';
	
		$(".dial1").knob();
		$({animatedVal: 0}).animate({animatedVal: <?php echo $p1; ?>}, {
			duration: 2000,
			easing: "swing",
			step: function() {
				$(".dial1").val(Math.ceil(this.animatedVal)).trigger("change");
			}
		});
		$(".dial2").knob();
		$({animatedVal: 0}).animate({animatedVal: <?php echo $p2; ?>}, {
			duration: 2000,
			easing: "swing",
			step: function() {
				$(".dial2").val(Math.ceil(this.animatedVal)).trigger("change");
			}
		});
		$(".dial3").knob();
		$({animatedVal: 0}).animate({animatedVal: <?php echo $p3; ?>}, {
			duration: 2000,
			easing: "swing",
			step: function() {
				$(".dial3").val(Math.ceil(this.animatedVal)).trigger("change");
			}
		});
		$(".dial4").knob();
		$({animatedVal: 0}).animate({animatedVal: <?php echo $p4; ?>}, {
			duration: 2000,
			easing: "swing",
			step: function() {
				$(".dial4").val(Math.ceil(this.animatedVal)).trigger("change");
			}
		});
		$(".dial5").knob();
	</script>
	
	
</body>
</html>
