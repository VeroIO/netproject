<?php 

$data = file_get_contents('jsonDtb.json');
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
    order: 'list',
    preload: 'auto',
    volume: 0.7,
    mutex: true,
    listFolded: false,
    listMaxHeight: '300px',
    lrcType: 0,    
    audio: [
    <?php foreach ($json as $song ) {
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