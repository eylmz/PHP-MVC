<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="<?=$siteUrl?>Public/AdminAssets/css/style.css">
    <link rel="icon" type="image/png" href="<?=$siteUrl?>Public/AdminAssets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Yönetim Paneli Giriş</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <link href="<?=$siteUrl?>Public/AdminAssets/css/bootstrap.min.css" rel="stylesheet" />

    <link href="<?=$siteUrl?>Public/AdminAssets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>
    <link href="<?=$siteUrl?>Public/AdminAssets/css/demo.css" rel="stylesheet" />
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>



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
                            <h4 class="title">Giriş Yap</h4>
                        </div>

                        <div class="content">
                            <div style="color:red"><?=$hata?></div>
                            <form action="" method="post">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>E-Posta Adresi</label>
                                            <input type="email" class="form-control" name="email" required>
                                        </div>
                                    </div></div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Parola</label>
                                            <input type="password" class="form-control" name="parola" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row"><div class="col-md-12">
                                        <button type="submit" class="btn btn-info btn-fill pull-right">Giriş</button>
                                        <div class="clearfix"></div></div></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div></div>

</body>

<script src="<?=$siteUrl?>Public/AdminAssets/js/jquery-1.10.2.js" type="text/javascript"></script>
<script src="<?=$siteUrl?>Public/AdminAssets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?=$siteUrl?>Public/AdminAssets/js/bootstrap-checkbox-radio-switch.js"></script>
<script src="<?=$siteUrl?>Public/AdminAssets/js/chartist.min.js"></script>
<script src="<?=$siteUrl?>Public/AdminAssets/js/bootstrap-notify.js"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script src="<?=$siteUrl?>Public/AdminAssets/js/light-bootstrap-dashboard.js"></script>
<script src="<?=$siteUrl?>Public/AdminAssets/js/demo.js"></script>
</html>
