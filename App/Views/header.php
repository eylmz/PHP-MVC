<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="theme-color" content="#1d2833" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Anasayfa</title>
    <link href="<?=$siteUrl?>Public/SiteAssets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=$siteUrl?>Public/SiteAssets/css/style.css" rel="stylesheet">
    <link href="<?=$siteUrl?>Public/tags/bootstrap-tagsinput.css" rel="stylesheet">
	<style type="text/css">
		.icon-github {
    background: no-repeat url('../img/github-16px.png');
    width: 16px;
    height: 16px;
}

.bootstrap-tagsinput {
    width: 100%;
}

.accordion {
    margin-bottom:-3px;
}

.accordion-group {
    border: none;
}

.twitter-typeahead .tt-query,
.twitter-typeahead .tt-hint {
    margin-bottom: 0;
}

.twitter-typeahead .tt-hint
{
    display: none;
}

.tt-menu {
    position: absolute;
    top: 100%;
    left: 0;
    z-index: 1000;
    display: none;
    float: left;
    min-width: 160px;
    padding: 5px 0;
    margin: 2px 0 0;
    list-style: none;
    font-size: 14px;
    background-color: #ffffff;
    border: 1px solid #cccccc;
    border: 1px solid rgba(0, 0, 0, 0.15);
    border-radius: 4px;
    -webkit-box-shadow: 0 6px 12px rgba(0, 0, 0, 0.175);
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.175);
    background-clip: padding-box;
    cursor: pointer;
}

.tt-suggestion {
    display: block;
    padding: 3px 20px;
    clear: both;
    font-weight: normal;
    line-height: 1.428571429;
    color: #333333;
    white-space: nowrap;
}

.tt-suggestion:hover,
.tt-suggestion:focus {
  color: #ffffff;
  text-decoration: none;
  outline: 0;
  background-color: #428bca;
}
	</style>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="<?=$siteUrl?>Public/SiteAssets/js/bootstrap.min.js"></script>
    <script src="http://malsup.github.io/jquery.form.js"></script>
    <script src="<?=$siteUrl?>Public/SiteAssets/js/upload.js"></script>
	<script type="text/javascript">
		$(function () {
		  $('[data-toggle="tooltip"]').tooltip()
		})
	</script>
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-static-top navmenu">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#ustmenu" aria-expanded="false" aria-controls="navbar">
            
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?=$siteUrl?>"><img src="<?=$siteUrl?>Public/SiteAssets/images/logo.png" width="75"></a>
        </div>
        <div id="ustmenu" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="<?=$siteUrl?>">Anasayfa</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Sayfalar <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">Makale Yükleme</a></li> 
                <li><a href="#">S.S.S</a></li> 
              </ul>

            </li>

            <li><a href="#contact">İletişim</a></li>
            
          </ul>
          <ul class="nav navbar-nav navbar-right">
			<?php if(Session::Get("login")){ ?>
				<li class="dropdown">
					<a href = "#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <?=Session::Get("userName")?><span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="<?=$siteUrl?>makaleOlustur"> Makale Ekle</a></li>
						<li><a href ="<?=$siteUrl?>uye/cikisyap"> Çıkış Yap</a></li>
					</ul>
				</li>
			<?php }else{ ?>
				<li><a href="<?=$siteUrl?>uye/kayitol"><span class="glyphicon glyphicon-user"></span> Kayıt Ol</a></li>
				<li><a href="<?=$siteUrl?>uye/girisyap"><span class="glyphicon glyphicon-log-in"></span> Giriş Yap</a></li>
			<?php } ?>
		  </ul>
        </div>
      </div>
    </nav>


  
<div class="container">
	<div class="row">

