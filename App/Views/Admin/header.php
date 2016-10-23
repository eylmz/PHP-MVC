<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Yönetim Paneli</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <link href="<?=$siteUrl?>Public/AdminAssets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?=$siteUrl?>Public/AdminAssets/css/animate.min.css" rel="stylesheet"/>
    <link href="<?=$siteUrl?>Public/AdminAssets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>
    <link href="<?=$siteUrl?>Public/AdminAssets/css/demo.css" rel="stylesheet" />
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="<?=$siteUrl?>Public/AdminAssets/css/pe-icon-7-stroke.css" rel="stylesheet" />

</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="azure" data-image="assets/img/sidebar-2.jpg">


        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="http://www.creative-tim.com" class="simple-text">
                    SİTE YÖNETİMİ
                </a>
            </div>

            <ul class="nav">
                <li class="active">
                    <a href="<?=$siteUrl?>admin">
                        <i class="pe-7s-graph"></i>
                        <p>Anasayfa</p>
                    </a>
                </li>
                <li>
                    <a href="<?=$siteUrl?>admin/users">
                        <i class="pe-7s-user"></i>
                        <p>Üyeler</p>
                    </a>
                </li>






            </ul>
        </div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?=$siteUrl?>admin/">Yönetim Paneli</a>
                </div>
                <div class="collapse navbar-collapse">


                    <ul class="nav navbar-nav navbar-right">

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                Hesap
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Profil</a></li>
                                <li><a href="#">Ayarlar</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="<?=$siteUrl?>admin/login/logout">
                                Çıkış
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>















