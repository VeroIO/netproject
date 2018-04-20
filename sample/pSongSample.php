<<<<<<< HEAD:pSongSample.php
<?php 

$data = file_get_contents('1song.json');
$json = json_decode($data);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $json[0]->{2}; ?></title>
    <script src="dist/APlayer.min.js" ></script>
    <link rel="stylesheet" href="dist/APlayer.min.css">
</head>
<body>
    <div id="aplayer"></div>
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
        name: "<?php echo $json[0]->{2}; ?>",
        artist: '<?php echo $json[0]->{3}; ?>',
        url: '<?php echo $json[0]->{7}; ?>',
        cover: '<?php echo $json[0]->{8}; ?>',
    }]
});
</script>
=======
<?php 

$data = file_get_contents('1song.json');
$json = json_decode($data);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $json[0]->{2}; ?></title>
    <script src="dist/APlayer.min.js" ></script>
    <link rel="stylesheet" href="dist/APlayer.min.css">
</head>
<body>
    <div id="aplayer"></div>
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
        name: "<?php echo $json[0]->{2}; ?>",
        artist: '<?php echo $json[0]->{3}; ?>',
        url: '<?php echo $json[0]->{7}; ?>',
        cover: '<?php echo $json[0]->{8}; ?>',
    }]
});
</script>
>>>>>>> 4eb0e18c012d3fc05d9be077eb2fc0895e3c8e71:sample/pSongSample.php
</html>