<?php

    $data = file_get_contents('jsonDtb.json');
    $json = json_decode($data);

    $artist = $_GET['name'];
    $artistsong=[];
    foreach ($json as $song) {
        if($artist==$song->{3}){
            array_push($artistsong,$song);
        };
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Song of <?php echo $_GET['name']; ?> </title>
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
    order: 'list',
    preload: 'auto',
    volume: 0.7,
    mutex: true,
    listFolded: false,
    listMaxHeight: '300px',
    lrcType: 0,    
    audio: [
    <?php foreach ($artistsong as $song ) {
    ?>
    {
        name: "<?php echo $song->{2}; ?>",
        artist: "<?php echo $song->{3}; ?>",
        url: '<?php echo $song->{7}; ?>',
        cover: '<?php echo $song->{8}; ?>',
    },
    <?php
    }
    ?>
    ]
});
</script>
</html>