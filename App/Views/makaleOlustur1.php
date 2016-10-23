<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script>tinymce.init({ selector:'.tinymce' });</script>

<div class="col-md-9">
	<?php if($hata){ ?>
		<div class="alert alert-danger" role="alert">
			<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
			<span class="sr-only">Hata:</span>
			<?=$hata?>
		</div>
	<?php } ?>

	<div class="panel panel-default pnl">
		<div class="panel-heading">
			<div class="baslik">Makale Oluştur</div>
		</div>
		<div class="panel-body">
		
			<form action="" method="post">
				<div class="form-group">
					<label for="emailLabel">Makale Adı</label>
					<input type="text" name="makaleAdi" class="form-control" id="emailLabel" placeholder="Makale Adı" required>
				</div>
				
				<div class="form-group">
					<label for="ozetLabel">Makale Özeti</label>
					<textarea name="makaleOzet" class="form-control" id="ozetLabel" placeholder="Makale Özeti" required></textarea>
				</div>
				
				<div class="form-group">
					<label for="icerikLabel">Makale İçeriği</label>
					<textarea name="makaleMetin" class="form-control tinymce" id="icerikLabel"></textarea>
				</div>
				
				<div class="form-group pull-right">
					<button type="submit" class="btn btn-success">Devam Et</button>
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