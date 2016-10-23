<div class="col-md-9">
	<?php if($hata){ ?>
		<div class="alert alert-danger" role="alert">
			<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
			<span class="sr-only">Hata:</span>
			<?=$hata?>
		</div>
	<?php } ?>
	
	<?php if($basarili){ ?>
		<div class="alert alert-success" role="alert">
			<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
			<span class="sr-only">Başarılı:</span>
			<?=$basarili?>
		</div>
	<?php } ?>

	<div class="panel panel-default pnl">
		<div class="panel-heading">
			<div class="baslik">Kayıt Ol</div>
		</div>
		<div class="panel-body">
		
			<form action="" method="post">
				<div class="form-group col-md-6">
					<label for="emailLabel">Ad Soyad</label>
					<input type="text" name="userName" class="form-control" id="emailLabel" placeholder="Ad Soyad" required>
				</div>
				<div class="form-group col-md-6">
					<label for="emailLabel">Email Adresi</label>
					<input type="email" name="userEmail" class="form-control" id="emailLabel" placeholder="Email" required>
				</div>
				<div class="form-group col-md-6">
					<label for="passLabel">Parola</label>
					<input type="password" name="userPassword" class="form-control" id="passLabel" placeholder="Parola" required>
				</div>
				<div class="form-group col-md-6">
					<label for="passLabelt">Parola Tekrar</label>
					<input type="password" name="userPassword2" class="form-control" id="passLabelt" placeholder="Parola Tekrar" required>
				</div>
				<div class="form-group pull-right">
					<button type="submit" class="btn btn-success">Kayıt Ol</button>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="col-md-3 col-xs-12">
	<div class="yan-menu">
		<h4>Kategoriler</h4>
		<div class="list-group">
			<a href="#" class="list-group-item">İnternet</a>
			<a href="#" class="list-group-item">Programlama</a>
			<a href="#" class="list-group-item">Donanım</a>
			<a href="#" class="list-group-item">Bilim</a>
		</div>
	</div>
</div>