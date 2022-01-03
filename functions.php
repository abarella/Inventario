<?php
include ("lib/DB.php");
session_start();
 if(isset($_POST["Importa"])){
		$filename=$_FILES["file"]["tmp_name"];
		 if($_FILES["file"]["size"] > 0)
		 {
		  	$file = fopen($filename, "r");
			$flag = true;
			$sql = "delete from inventario where idContratante = '" .$_SESSION['usuarioLogin']."'";
			//$sql = "delete from inventario where idContratante = '032419'";
			mysqli_query($conn, $sql);
	        while (($getData = fgetcsv($file, 10000, ";")) !== FALSE)
	         {
			   if($flag) { $flag = false; continue; }
			   if ($getData[0]!=''){
						$sql = "
			           INSERT into inventario (
					   idContratante,
					   cod_barra,
					   cod_item,
					   den_item,
					   num_total_logico,
					   num_contagem1)
                       values (
					   '"
					   .$_SESSION['usuarioLogin'].
					   "','"
					   .$getData[1].
					   "','"
					   .$getData[2].
					   "','"
					   .$getData[3].
					   "','"
					   .$getData[4].
					   "','"
					   .$getData[5].
					   "')";


				   $result = mysqli_query($conn, $sql);
			    }
				if(!isset($result))
				{
					echo "<script type=\"text/javascript\">
							alert(\"Arquivo Inválido:Por favor faça Upload de um arquivo CSV.\");
							window.location = \"index.php?page=lista_geral\"
						  </script>";
				}
				else {
					  echo "<script type=\"text/javascript\">
						alert(\"Aqruivo importado com sucesso.\");
						window.location = \"index.php?page=lista_geral\"
					</script>";
				}
	         }

	         fclose($file);
		 }
	}


 if(isset($_POST["ORI_Exporta"])){

      header('Content-Type: text/csv; charset=utf-8');
      header('Content-Disposition: attachment; filename=data.csv');
      $output = fopen("php://output", "w");
      fputcsv($output, array('contratante', 'cod_de_barra', 'cod_item', 'descricao', 'qtd', 'contagem'));
      $query = "SELECT idContratante, cod_barra, cod_item, den_item, num_total_logico, num_contagem1 from inventario where idContratante = '" .$_SESSION['usuarioLogin']."'";
      $result = mysqli_query($conn, $query);
      while($row = mysqli_fetch_assoc($result))
      {
           fputcsv($output, $row);
      }
      fclose($output);
 }

 if(isset($_POST["Exporta"])){

      header('Content-Type: text/csv; charset=utf-8');
      header('Content-Disposition: attachment; filename=data.csv');
      $output = fopen("php://output", "w");
      echo "contratante;cod de barra;cod item;descricao;qtd;contagem".PHP_EOL;
      $query = "SELECT idContratante, cod_barra, cod_item, den_item, num_total_logico, num_contagem1 from inventario where idContratante = '" .$_SESSION['usuarioLogin']."'";
      $result = mysqli_query($conn, $query);
      while($row = $result->fetch_assoc())
      {
	  	   echo $row[idContratante].";";
		   echo $row[cod_barra].";";
		   echo $row[cod_item].";";
		   echo $row[den_item].";";
		   echo $row[num_total_logico].";";
		   echo $row[num_contagem1].";";
		   echo PHP_EOL;
      }
      fclose($output);
 }

 
 
 ?>
