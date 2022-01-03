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
				include('lib/DB.php');
				$sql = "SELECT * FROM inventario where idContratante = '".$_SESSION['usuarioLogin']."'";
				//$sql = "SELECT * FROM inventario where idContratante = '032419'" ;
				$result = $conn->query($sql);
				?>
				<table border=1 width="8%" class="cell-border display responsive nowrap" id="grid" cellspacing="0">
        <thead>
            <tr style="background-color:#fcfc86; color:#7260fc">
                <th>Cod Barra</th>
                <th>Cod Item</th>
                <th>Desc Item</th>
                <th>Total</th>
				<th>Contagem</th>
            </tr>
        </thead>
        <tfoot>
            <tr style="background-color:#fcfc86; color:#7260fc">
                <th>Cod Barra</th>
                <th>Cod Item</th>
                <th>Desc Item</th>
                <th>Total</th>
				<th>Contagem</th>
            </tr>
        </tfoot>
        <tbody>
			<?php
				if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()) {
						echo "<tr>";

						echo "<td>";
						echo $row[cod_barra];
						echo "</td>";

						echo "<td>";
						echo $row[cod_item];
						echo "</td>";

						echo "<td>";
						echo $row[den_item];
						echo "</td>";

						echo "<td>";
						echo $row[num_total_logico];
						echo "</td>";

						echo "<td>";
						echo $row[num_contagem1];
						echo "</td>";

						echo "</tr>";
					}
				}

			?>

        </tbody>

    </table>
			</div>
		<?php include('include/footer.php'); ?>
		</div>
	</div>
	<?php include('include/script.php'); ?>
	<link rel="stylesheet" type="text/css" href="src/plugins/datatables/media/css/jquery.dataTables.css">
	<link rel="stylesheet" type="text/css" href="src/plugins/datatables/media/css/dataTables.bootstrap4.css">
	<link rel="stylesheet" type="text/css" href="src/plugins/datatables/media/css/responsive.dataTables.css">
	<script src="src/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
	<script src="src/plugins/datatables/media/js/dataTables.bootstrap4.js"></script>
	<script src="src/plugins/datatables/media/js/dataTables.responsive.js"></script>
	<script src="src/plugins/datatables/media/js/responsive.bootstrap4.js"></script>
	<script>
$(document).ready(function() {
    $('#grid').DataTable( {
    	//"scrollY":        "400px",
	    //"scrollCollapse": true,
	    "autoWidth": false,
	    "paging": true,

		"columnDefs": [
			{targets: -1,className: 'dt-body-right'},
			{targets: -2,className: 'dt-body-right'}
		],
		"search":"Pesquisa:",
        "order": [[ 0, "asc" ]],
        //searchPane: {threshold: 0},
		"lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "Todos"]],
        "language": {
			"lengthMenu": "Mostar _MENU_ registros por p&aacute;gina ",
			"zeroRecords": "Nenhum registro encontrado",
			"info": "Monstrando página _PAGE_ de _PAGES_",
			"infoEmpty": "Nenhum registro encontrado",
			"search": "Pesquisa:",
			"searchPlaceholder": "Pesquisa",
			"infoFiltered": "(filtrado para _MAX_ regs)",
			"paginate": {
			"first":      "Primeiro",
			"last":       "&Uacute;ltimo",
			"next":       "Pr&oacute;ximo",
			"previous":   "Anterior"
			},
		}


	} );
} );
</script>
	
	</body>
</html>
