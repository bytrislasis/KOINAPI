<?php

class PostClass
{
    private $apikey;
    private $bitcoinaddress = null;
    private $secret;
    private $koinkart;

    public function sendPost(){
        $PostData = array(
            'apikey' => $this->getApikey(),
            'secret' => $this->getSecret(),
            'bitcoinaddress' => $this->getBitcoinaddress(),
            'kart' => $this->getKoinkart()
        );
        $ch = curl_init();
        curl_setopt_array($ch, $this->PostSettings($PostData));
        echo curl_exec($ch);
    }

    public function PostSettings($PostData){
        return array(
            CURLOPT_URL => 'https://partner.bytrislasis.tk/rest/api',
            CURLOPT_HEADER => false,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION, false,
            CURLOPT_POST, true,
            CURLOPT_POSTFIELDS => $PostData,
            CURLOPT_SSL_VERIFYPEER => false
        );
    }

    /**
     * @return mixed
     */
    public function getApikey()
    {
        return $this->apikey;
    }

    /**
     * @param mixed $apikey
     */
    public function setApikey($apikey)
    {
        ($apikey == "" || $apikey != "APIKEY")?$this->apikey = $apikey:die("APIKEY Alanını Kullanmadınız");
    }

    /**
     * @return null
     */
    public function getBitcoinaddress()
    {
        return $this->bitcoinaddress;
    }

    /**
     * @param null $bitcoinaddress
     */
    public function setBitcoinaddress($bitcoinaddress)
    {
        $this->bitcoinaddress = $bitcoinaddress;
    }

    /**
     * @return mixed
     */
    public function getSecret()
    {
        return $this->secret;

    }

    /**
     * @param mixed $secret
     */
    public function setSecret($secret)
    {
        ($secret == "" || $secret != "SECRET")?$this->secret = $secret:die("Secret Alanını Kullanmadınız");
    }

    /**
     * @return mixed
     */
    public function getKoinkart()
    {
        return $this->koinkart;
    }

    /**
     * @param mixed $koinkart
     */
    public function setKoinkart($koinkart)
    {
        ($koinkart != "")?$this->koinkart = $koinkart:die("Koin Kart Alanı Boş Olamaz");

    }

    public function __destruct()
    {
        $this->sendPost();
    }
}