<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="header">
						<h4 class="title">Üyelik Düzenle</h4>
					</div>
					<div class="content">
						<div style="color:red"><?=$hata?></div>
						<div style="color:green"><?=$mesaj?></div>
						<form action="" method="post">
						

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Ad Soyad</label>
										<input type="text" value="<?=stripslashes($uye["adSoyad"])?>" class="form-control" name="adSoyad">
									</div>
								</div>
							
								<div class="col-md-6">
									<div class="form-group">
										<label>E-Posta</label>
										<input type="text" value="<?=stripslashes($uye["email"])?>" class="form-control" name="email">
									</div>
								</div>
							</div>
							
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Şifre</label>
										<input type="text" class="form-control" name="sifre">
										<div style="font-size:12px; color:#888; margin-top:5px">Boş bırakırsanız değişmez</div>
									</div>
								</div>
							
								<div class="col-md-6">
									<div class="form-group">
										<label>Rütbe</label>
										<select class="form-control" name="rutbe">
											<option value="0">Engelle</option>
											<option value="1" <?=$uye["rutbe"]==1?'selected':null?>>Üye</option>
											<option value="2" <?=$uye["rutbe"]==2?'selected':null?>>Editör</option>
											<option value="3" <?=$uye["rutbe"]==3?'selected':null?>>Yönetici</option>
										</select>
									</div>
								</div>
							</div>

							<button type="submit" class="btn btn-info btn-fill pull-right">Düzenle</button>
							<div class="clearfix"></div>
						</form>
					</div>
				</div>
			</div>
		   

		</div>
	</div>
</div>


