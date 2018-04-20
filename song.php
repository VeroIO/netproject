<?php
    $data = file_get_contents('jsonDtb.json');
    $json = json_decode($data);
    $songId=$_GET['id'];
    foreach ($json as $song) {
        if($songId==$song->{1}){
            $songdata=$song;
        };
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $songdata->{2}; ?></title>
    <script src="dist/APlayer.min.js" ></script>
    <link rel="stylesheet" href="dist/APlayer.min.css">
    <link rel="stylesheet" href="css/color.css">  
</head>
<body>
    <div id="app">
        <div class="landing">
            <h1>Meow Player Site</h1>
            <h3>🍭 Have A Good Time With Oursite.</h3>               
            <div class="aplayer-wrap">
                <div id="aplayer"></div>
            </div>
        </div>
    </div>   
    <canvas id="evanyou-canvas"></canvas>
    <script src="js/color.js"></script>
</body>
<script>
const ap = new APlayer({
        container: document.getElementById('aplayer'),
        mini: false,
        autoplay: true,
        loop: 'all',
        order: 'random',
        preload: 'auto',
        volume: 0.7,
        mutex: true,
        listFolded: false,
        listMaxHeight: '90px',
        lrcType: 0,    
        audio: [{
            name: '<?php echo $songdata->{2}; ?>',
            artist: '<?php echo $songdata->{3}; ?>',
            url: '<?php echo $songdata->{7}; ?>',
            cover: '<?php echo $songdata->{8}; ?>',
        }]
    });
</script>
</html>