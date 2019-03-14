<?php include('PostClass.php');
$Api = new PostClass();
$Api->setApikey("APIKEY");
$Api->setSecret("SECRET");
$Api->setBitcoinaddress(NULL);//Bitcoin Para Brimini İstediğiniz Bir Adrese Almak İstiyorsanız Lütfen Adres Giriniz. NULL bırakırsanız partner sayfamızdan istediğiniz zaman çekebilirsiniz.
