<?php
error_reporting(0);

function gettoken()
{
	$headers = array();
	$headers[] = 'Content-Type: application/x-www-form-urlencoded';
	$headers[] = 'Host: graph.nhaccuatui.com';
	$headers[] = 'Connection: Keep-Alive';
	
	$json ='deviceinfo={"DeviceID":"dd03852ada21ec149103d02f76eb0a04","DeviceName":"HellCatVN:S7:NMF26X","OsName":"ANDROID","OsVersion":"8.0","AppName":"NCTTablet","UserName":"hellcatvn","QualityPlay":"128","QualityDownload":"128","QualityCloud":"128","Network":"WIFI","Provider":"NCTCorp"}&md5=ebd547335f855f3e4f7136f92ccc6955&timestamp=1499177482892';
	$urlencode = urldecode($json);
	$c = curl_init();
	curl_setopt($c, CURLOPT_URL, "https://graph.nhaccuatui.com/v1/commons/token");
	curl_setopt($c, CURLOPT_SSL_VERIFYPEER,false);
	curl_setopt($c, CURLOPT_SSL_VERIFYHOST,false);
	curl_setopt($c, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($c, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($c, CURLOPT_POST, 1);
	curl_setopt($c, CURLOPT_POSTFIELDS,$urlencode);


	$page = curl_exec($c);
	curl_close($c);
	
	$infotoken = json_decode($page);
	$token = $infotoken->data->accessToken;
	return $token;
}


function getlink($idbaihat,$token)
{
	//echo $idbaihat;
	$linklist = 'https://graph.nhaccuatui.com/v1/songs/'.$idbaihat.'?access_token='.$token;
	$c = curl_init();
	curl_setopt($c, CURLOPT_URL, $linklist);
	curl_setopt($c, CURLOPT_SSL_VERIFYPEER,false);
	curl_setopt($c, CURLOPT_SSL_VERIFYHOST,false);
	curl_setopt($c, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($c, CURLOPT_RETURNTRANSFER, true);

	$page = curl_exec($c);
	curl_close($c);
	
	$data = json_decode($page);
	return $data;
}

?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Demo</title>
    <link href="http://getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="audioplayerengine/initaudioplayer-1.css">
    

    
  </head>

  <body>

    <div class="container">
		
		<div class="panel panel-primary" style="margin-top: 20px;">
		  <div class="panel-heading">Demo Get Link NhacCuaTui.Com</div>
		  <div class="panel-body">
		    <form class="form-horizontal" action="" method="POST">
				<fieldset>
				<div class="form-group">
				  <div class="col-md-10">
				  <input id="url" name="url" placeholder="Nhập link Bài hát của NhacCuaTui" class="form-control input-md" value="http://www.nhaccuatui.com/bai-hat/yeu-la-tha-thu-em-chua-18-ost-onlyc.vmjlLAAxhof5.html" type="text">
				  </div>
				  <div class="col-md-2">
				    <button id="Submit" name="submit" value="submit" class="btn btn-primary">Get link</button>
				  </div>
				</div>
				</fieldset>
				</form>
				

			
			<div class="row">
				<div class="col-md-12" style="text-align: center;">
					<?php 
					if(isset($_POST['url']))
					{
						$url = $_POST['url'];
						$temp = explode(".",$url);
						$idbaihat = trim($temp[3]);
						if($idbaihat != "")
						{
							$token = gettoken();
							if($token != "")
							{
								$data = getlink($idbaihat,$token);

								$linkplay = $data->data->{7};
								$link128 = $data->data->{11};
								$link320 = $data->data->{12};
								$linklossless = $data->data->{19};
								$thumbnail = $data->data->{8};
								$tenbaihat = $data->data->{2};
								$casy = $data->data->{3};
								if($tenbaihat != "")
								{
									$tenfile = "$tenbaihat - $casy";
									$msg.= '<div style="margin:12px auto;">
										<div id="amazingaudioplayer-1" style="display:block;position:relative;width:300px;height:300px;margin:0px auto 0px;">
											<ul class="amazingaudioplayer-audios" style="display:none;">
												<li data-artist="" data-title="'.$tenbaihat.' - '.$casy.'" data-album="" data-info="" data-image="'.$thumbnail.'" data-duration="0">
													<div class="amazingaudioplayer-source" data-src="'.$linkplay.'" data-type="audio/mpeg" />
												</li>
											</ul>
										</div>
									</div>';

									$msg.= ' <a target="_banks" href="'.$link128.'"><button type="button" class="btn btn-success"><i class="fa fa-cloud-download"></i> 128 Kbps</button></a> ';

									$msg.= ' <a target="_banks" href="'.$link320.'"><button type="button" class="btn btn-success"><i class="fa fa-cloud-download"></i> 320 Kbps</button></a> ';

									$msg.= ' <a target="_banks" href="'.$linklossless.'"><button type="button" class="btn btn-success"><i class="fa fa-cloud-download"></i> Lossless</button></a> ';

									echo $msg;
								}
								else
								{
									echo "Lỗi cmnr: Không thể get bài này!!";
								}
							}
							else
							{
								echo "Lỗi cmnr: tạo token!";
							}
						}
						else
						{
							echo "Lỗi cmnr: Không tìm thấy ID bài hát! Link phải có dạng: http://www.nhaccuatui.com/bai-hat/yeu-la-tha-thu-em-chua-18-ost-onlyc.vmjlLAAxhof5.html";
						}
						
					}

					?>
				</div>
			</div>
			
			</div>
			
		  </div>

      <footer class="footer">
        <p>Trolyfacebook.com &copy; 2017</p>
      </footer>

    </div> <!-- /container -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="audioplayerengine/amazingaudioplayer.js"></script>
<script src="audioplayerengine/initaudioplayer-1.js"></script>
	
	


  </body>
</html>





