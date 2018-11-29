git commit -am "added composer.json file"<?php
$id = $_GET['id'];
if ($id == "Rand"){
    $id = '350177';
$result = Curl("https://gamely.com/m/user/space/$id.htm");

$jojo = explode("data-screenurl='", $result);
$jojo1= explode("&_appVersion=0" , $jojo[1]);

$url4 = $jojo1[0];
$result4 = Curl($url4);
}else {
$result4 = Curl("https://gamely.com/m/user/space/$id.htm");
}

$jeruk = explode('<div class="avatar" style="background:url(https://image-pub.zkh666.com/gamely/image/', $result4);
$jeruknya = explode('/',$jeruk[1]);

$ambilpoto = explode('<div class="avatar" style="background:url(https://image-pub.zkh666.com/gamely/image/'.$jeruknya[0].'/', $result4);
$ambilpoto1 = explode('.jpg',$ambilpoto[1]);

$getstream = explode('data-roomid="', $result4);
$getstream2 = explode('"', $getstream[1]);
if($getstream2[0]==null)
{
	$jampiro  = explode('<p class="line_p">',$result4);
	$jampiro1 = explode('</p>',$jampiro[1]);
	$streamhasil = "TIDAK LIVE YA<br>$jampiro1[0]";
	
}else{
$result1 = Curl("https://gamely.com/m/room/".$getstream2[0].".htm");
$streaminfo = explode('video: "', $result1);
$streaminfo1 = explode('"', $streaminfo[1]);
$chatinfo = explode('gameId: "', $result1);
$chatinfo1 = explode('"',$chatinfo[1]);
$chattai = base64_encode($chatinfo1[0]);
if ($streaminfo1[0]== null)
{
    $streamhasil = "TIDAK LIVE";
    $urlstream   = "Null";
    $urlchat     = "Null";
}
else{
    $streamhasil = 'Stream Now';
    $urlstream   = $streaminfo1[0];
    $urlchat     = $chatinfo1[0];
}

}
    $gettitle  = explode('<p class="user_name ellipsis">', $result1);
    $gettitle2 = explode('</p>', $gettitle[1]);
    $getnama =  $gettitle2[0];
function Curl($url){
$opts = array('http' =>
    array(
        'header'  => 'User-agent: Mozilla/5.0 (iPhone; U; CPU like Mac OS X; en) AppleWebKit/420.1 (KHTML, like Gecko) Version/3.0 Mobile/3B48b Safari/419.3',
    )
);

$context  = stream_context_create($opts);

$result = file_get_contents($url, false, $context);
return $result;
}





$arr = array('Nama' => $getnama, 'Foto' => $ambilpoto1[0], 'Stream' => $streamhasil, 'Url' => $urlstream, 'Chat' => $urlchat, 'IDFoto' => $jeruknya[0] );

echo json_encode($arr);

?>
