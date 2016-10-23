<div class="col-md-9">
	<?php if($basarili){ ?>
		<div class="alert alert-success" role="alert">
			<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
			<span class="sr-only">Başarılı:</span>
			<?=$basarili?>
		</div>
	<?php } ?>
	<div class="panel panel-default pnl">
		<div class="panel-heading">
			<div class="baslik">Makale Detayları</div>
		</div>
		<div class="panel-body">
			<div class="form-group">
				<label for="emailLabel">Dosya Yükleme</label>
				<form id="dosyayukle" action="<?=$siteUrl?>ajax/dosyaupload" method="post" enctype="multipart/form-data">
					 <input type="file" name="dosya" class="pull-left">
					 <input type="hidden" name="makaleID" value="<?=$makaleID?>" />
					 <button type="submit" class="btn btn-primary pull-right">Yükle</button>
					 <div class="clearfix"></div>
				 </form>
				 <br/>
				<div class="progress">
				  <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">
					0%
				  </div>
				</div>
				
				
				<div id="mesaj">
					
				</div>
			</div>
			
			<div class="form-group">
				<ul id="eklenenDosyalar" class="list-group">
		
				</ul>
			</div>
			
			<div class="form-group">
				<label>URL Ekleme</label>
				<form id="urlekle" action="<?=$siteUrl?>ajax/urlekle" method="post">
					<div class="form-group">
						<div class="input-group">
							<input type="hidden" name="makaleID" value="<?=$makaleID?>" />
							<input type="text" name="url" id="url" class="form-control">
							<span class="input-group-btn">
								<button class="btn btn-primary" id="eklebtn" type="submit">Ekle</button>
							</span>
						</div>
					</div>
				</form>
				<ul class="list-group" id="eklenenURL"></ul>

			</div>
			
			<div class="form-group">
				<label>Makale Sahipleri (Siz Hariç)</label>
				<form id="uyeekle" action="<?=$siteUrl?>ajax/uyeekle" method="post">
					<div class="form-group">
						<div class="input-group">
							<input type="hidden" name="makaleID" value="<?=$makaleID?>" />
							<input type="text" name="eposta" id="uye" class="form-control">
							<span class="input-group-btn">
								<button class="btn btn-primary" id="eklebtn" type="submit">Ekle</button>
							</span>
						</div>
					</div>
				</form>
				<ul class="list-group" id="eklenenUye"></ul>

			</div>
			
			<div class="form-group">
				<a href="<?=$siteUrl?>" class="btn btn-success pull-right">Bitir</a>
			</div>
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


<script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>
	<script src="<?=$siteUrl?>Public/tags/bootstrap-tagsinput.js"></script>
	
	<script>
var cities = new Bloodhound({
  datumTokenizer: Bloodhound.tokenizers.obj.whitespace('text'),
  queryTokenizer: Bloodhound.tokenizers.whitespace,
  prefetch: '<?=$siteUrl?>ajax/uyeler2'
});
cities.initialize();

var elt = $('input.isimler');
elt.tagsinput({
  itemValue: 'value',
  itemText: 'text',
  typeaheadjs: {
    name: 'cities',
    displayKey: 'text',
    source: cities.ttAdapter()
  }
});
//elt.tagsinput('add', { "value": 1 , "text": "Amsterdam"   , "continent": "Europe"    });
</script>
