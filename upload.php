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
				Upload<br>
				<form class="form-horizontal" action="functions.php" method="post" name="upload_excel" enctype="multipart/form-data">
					<div class="fieldSet">
					<fieldset>
                        <legend>Importa seus dados da planilha</legend>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="filebutton">Selecione o Arquivo</label>
                            <div class="col-md-4">
                                <input type="file" name="file" id="file" class="input-large"  accept=".csv" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="singlebutton">&nbsp;</label>
                            <div class="col-md-4">
                                <button type="submit" id="submit" name="Importa" class="btn btn-primary button-loading" data-loading-text="Carregando...">Importa</button>
                            </div>
                        </div>
						</fieldset>
						</div>
					</div>
                </form>
				
			</div>
		<?php include('include/footer.php'); ?>
		</div>
	</div>
	<?php include('include/script.php'); ?>
	
	
	</body>
</html>
