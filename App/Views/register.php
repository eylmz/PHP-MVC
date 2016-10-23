<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="<?=$siteUrl?>Public/AdminAssets/css/style.css">
    <link rel="icon" type="image/png" href="<?=$siteUrl?>Public/AdminAssets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Sayfa Adı - Admin Panel</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <link href="<?=$siteUrl?>Public/AdminAssets/css/bootstrap.min.css" rel="stylesheet" />

    <link href="<?=$siteUrl?>Public/AdminAssets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>
    <link href="<?=$siteUrl?>Public/AdminAssets/css/demo.css" rel="stylesheet" />
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <script src="<?=$siteUrl?>Public/AdminAssets/js/jquery-1.10.2.js" type="text/javascript"></script>
    <script src="<?=$siteUrl?>Public/AdminAssets/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?=$siteUrl?>Public/AdminAssets/js/bootstrap-checkbox-radio-switch.js"></script>
    <script src="<?=$siteUrl?>Public/AdminAssets/js/chartist.min.js"></script>
    <script src="<?=$siteUrl?>Public/AdminAssets/js/bootstrap-notify.js"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
    <script src="<?=$siteUrl?>Public/AdminAssets/js/light-bootstrap-dashboard.js"></script>
    <script src="<?=$siteUrl?>Public/AdminAssets/js/demo.js"></script>

    <style type="text/css">

    </style>

</head>
<body  style="background: #eee">

<div class="cont">
    <br /><br />
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Kayıt Ol</h4>
                        </div>

                        <div class="content">
                            <?php
                                if($hata)
                                    echo '<div style="color:red">'.$hata.'</div>';
                            ?>

                            <?php
                            if($mesaj)
                                echo '<div style="color:green">'.$mesaj.'</div>';
                            ?>
                            <form action="" method="post">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Ad Soyad</label>
                                            <input type="text" class="form-control" name="adSoyad" id="kadi" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>E-Posta</label>
                                            <input type="email" class="form-control" name="email"  id="mail" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Şifre</label>
                                            <input type="password" class="form-control" name="sifre" id="password" required>
											<span id="passstrength">Güvenli Değil</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Şifre Tekrarı</label>
                                            <input type="password" class="form-control" name="sifret" id="parola2" required>
                                            <p id="error"> </p>
                                        </div>
                                    </div>
                                </div>
								<input type="hidden" value="0" name="guv" id="guv" />
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-info btn-fill pull-right" id="kayit">Kayıt Ol</button>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div></div>

<script>
    $( document ).ready(function() {

    });


    $( "#parola2,#parola" ).keyup(function() {
        var parola = $("#password").val();
        var parola2 = $( "#password" ).val();
        if(parola != parola2){

            $( "#error" ).text("Şifreler aynı değil");
        }
        else{
            $( "#error" ).text("");
            
        }
    }).keyup();


</script>

</body>

<script src="<?=$siteUrl?>Public/AdminAssets/js/password.js"></script>
</html>
