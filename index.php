<?php 

$datarank = file_get_contents('rankSong.json');
$jsonrank = json_decode($datarank);
$c=0;
$data = file_get_contents('jsonDtb.json');
$json = json_decode($data);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home Page</title>
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap-theme.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/home.css">
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-default">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Meow Music Site</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#"><i class="fa fa-home"> Home</i><span class="sr-only">(current)</span></a></li>
                <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-list"> PlayList </i> <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="allsong.php">All Song</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#">One more separated link</a></li>
                </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#"><i class="fa fa-facebook-official"> About Me</i> </a></li>
            </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
        </nav>
        <div class="col-md-8">
            <div class="jumbotron">
                <div class="owl-carousel">
                    <div><a href="song.php?id=E5wdPNL5smiv"><img src="img/1523865053496_org.jpg" style="width:610px;height: 300px;"></a></div>
                    <div><a href="song.php?id=l6FPmkS3Yf8f"><img src="img/maxresdefault.jpg" style="width:610px;height: 300px;"></a></div>
                </div>
            </div>
            <div class="panel panel-primary">
                <div class="panel-heading">Danh Sách Ngẫu Nhiên</div>
                <div class="panel-body">
                    <div class="row">
                    <?php for ($i=0; $i < 4 ; $i++) { 
                        $random_keys=array_rand($json,1);    
                    ?> 
                    <div class="col-md-3">
                        <a href="song.php?id=<?php echo $json[$random_keys]->{1}; ?>"><img src="<?php echo $json[$random_keys]->{8}; ?>" style="height:150px"></a>
                        <div>
                            <a href="song.php?id=<?php echo $json[$random_keys]->{1}; ?>"><h4><?php echo $json[$random_keys]->{2}; ?></h4></a>
                            <a href="artist.php?name=<?php echo $json[$random_keys]->{3}; ?>"><h5><?php echo $json[$random_keys]->{3}; ?></h5>
                        </div>                   
                    </div>
                    <?php } ?>
                    </div>
                    <div class="row">
                    <?php for ($i=0; $i < 4 ; $i++) { 
                        $random_keys=array_rand($json,1);    
                    ?> 
                    <div class="col-md-3">
                        <a href="song.php?id=<?php echo $json[$random_keys]->{1}; ?>"><img src="<?php echo $json[$random_keys]->{8}; ?>" style="height:150px"></a>
                        <div>
                            <a href="song.php?id=<?php echo $json[$random_keys]->{1}; ?>"><h4><?php echo $json[$random_keys]->{2}; ?></h4></a>
                            <a href="artist.php?name=<?php echo $json[$random_keys]->{3}; ?>"><h5><?php echo $json[$random_keys]->{3}; ?></h5>
                        </div>                   
                    </div>
                    <?php } ?>
                    </div>                    
                    <div class="row">
                    <?php for ($i=0; $i < 4 ; $i++) { 
                        $random_keys=array_rand($json,1);    
                    ?> 
                    <div class="col-md-3">
                        <a href="song.php?id=<?php echo $json[$random_keys]->{1}; ?>"><img src="<?php echo $json[$random_keys]->{8}; ?>" style="height:150px"></a>
                        <div>
                            <a href="song.php?id=<?php echo $json[$random_keys]->{1}; ?>"><h4><?php echo $json[$random_keys]->{2}; ?></h4></a>
                            <a href="artist.php?name=<?php echo $json[$random_keys]->{3}; ?>"><h5><?php echo $json[$random_keys]->{3}; ?></h5>
                        </div>                   
                    </div>
                    <?php } ?>
                    </div>                    
                    <div class="row">
                    <?php for ($i=0; $i < 4 ; $i++) { 
                        $random_keys=array_rand($json,1);    
                    ?> 
                    <div class="col-md-3">
                        <a href="song.php?id=<?php echo $json[$random_keys]->{1}; ?>"><img src="<?php echo $json[$random_keys]->{8}; ?>" style="height:150px"></a>
                        <div>
                            <a href="song.php?id=<?php echo $json[$random_keys]->{1}; ?>"><h4><?php echo $json[$random_keys]->{2}; ?></h4></a>
                            <a href="artist.php?name=<?php echo $json[$random_keys]->{3}; ?>"><h5><?php echo $json[$random_keys]->{3}; ?></h5>
                        </div>                   
                    </div>
                    <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-primary">
                  <div class="panel-heading">
                        <h3 class="panel-title">Bảng Xếp Hạng</h3>
                  </div>
                  <div class="panel-body">
                        <ul>
                            <?php foreach ($jsonrank as $rank) { $c++?>
                            <li style="height:100px;">
                                <a style="padding-right:10px;" class="pull-left" href="song.php?id=<?php echo $rank->{1}; ?>">
                                    <img src="<?php echo $rank->{8}; ?>" style="height:90px">
                                </a>
                                <div >
                                    <h3><?php echo $c; ?></h3>
                                    <a href="song.php?id=<?php echo $rank->{1}; ?>"><h4><?php echo $rank->{2}; ?></h4></a>
                                    <a href="artist.php?name=<?php echo $rank->{3}; ?>"><h5><?php echo $rank->{3}; ?></h5></a>                                 
                                </div>                  
                            </li>
                            <hr>
                            <?php } ?>                           
                        </ul>
                  </div>
            </div>
            <div class="panel panel-primary">
                  <div class="panel-heading">
                        <h3 class="panel-title">Playlist Của Tuần</h3>
                  </div>
                  <div class="panel-body">
                  </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script>
        $(document).ready(function(){
         $(".owl-carousel").owlCarousel({
            items:1,
            loop:true,
            autoplay:true,
            autoplayTimeout:3000,
         });
        });    
    </script>
</body>
</html>