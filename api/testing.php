<?php
  $key = "b316e31501577669aac92578252053e5";
  $data = "http://www.imvisile.com:4041/Loginuser&username=dd@dd.hh&password=fffgggh&latitude=76.4545&longitude=30.4545";
  $decodedKey = pack("H*", $key);
  $hmac = hash_hmac("sha1", $data, $decodedKey, TRUE);
  $signature = base64_encode($hmac);
  echo "<br/>key = $key\n";
  echo "<br/>data = $data\n";
  echo "<br/>signature = $signature";


/*
encrypted formed -  e1a4f9b37fc8ce4cea4ee43ef4cda90968d4b61565beb8f8e7894f4bebe6dafb

We'll provide you the above encrypted data only
---------------------------------------------------------

url:
http://www.imvisile.com:4041/Loginuser&username=dd@dd.hh&password=fffgggh&latitude=76.4545&longitude=30.4545

AccessKey: *b316e31501577669aac92578252053e5*

Encryption Technique : cHMAC with SHA256 */

?>