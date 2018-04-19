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
    <link rel="stylesheet" href="css/docute.css">
    <script src="dist/APlayer.min.js" ></script>
    <link rel="stylesheet" href="dist/APlayer.min.css"> 
    <style>
        body {
        text-rendering: auto;
        }
        #evanyou-canvas {
        z-index: -1 !important;
        }
        .aplayer-wrap {
        max-width: 700px;
        margin: 20px 0;
        }
        .sidebar-toggle {
        z-index: 90;
        }
    </style>    
</head>
<body>
    <div id="app">
    </div>
    <script src="js/docsearch.js"></script>
    <script src="js/docute.js"></script>
    <script src="js/evanyou.min.js"></script>
</body>
<script>
docute.init({
    landing: 'landing.html',
    plugins: [
        evanyou(),
        player()
    ]
});
function player () {
    return function (context) {
        context.event.on('landing:updated', function () {
            console.log('landing:updated');
            clearPlayer();
            aplayer1();
        });
        context.event.on('content:updated', function () {
            console.log('content:updated');
            clearPlayer();
            for (let i = 0; i < document.querySelectorAll('.load').length; i++) {
                document.querySelectorAll('.load')[i].addEventListener('click', function () {
                    window[this.parentElement.id] && window[this.parentElement.id]();
                });
            }
        });
    };
}

function clearPlayer () {
    for (let i = 0; i < 10; i++) {  
        if (window['ap' + i]) {
            window['ap' + i].destroy();
        }
    }
}

function aplayer1 () {
    window.ap1 = new APlayer({
        container: document.getElementById('aplayer1'),
        mini: false,
        autoplay: true,
        loop: 'all',
        order: 'random',
        preload: 'auto',
        volume: 0.7,
        mutex: true,
        listFolded: false,
        listMaxHeight: '90px',
        lrcType: 3,    
        audio: [{
            name: '<?php echo $songdata->{2}; ?>',
            artist: '<?php echo $songdata->{3}; ?>',
            url: '<?php echo $songdata->{7}; ?>',
            cover: '<?php echo $songdata->{8}; ?>',
        }]
    });
}
</script>
</html>