
<?php

set_time_limit(100);
header("Content-Type: text/html; charset=utf8");
include "config.php";




$a=simplexml_load_file("mustafa.xml");



$counter=0;


foreach ($a->urun as $konu) {

    $counter++;



    if($counter<3){

        $urun_url    =   $konu   ->  urun_url;

        $urun_id     =   $konu   ->  urun_id;

        $marka       =   $konu   ->  marka;

        $baslik      =   $konu   ->  baslik;

        $metin       =   $konu   ->  metin;

        $fiyat       =   $konu   ->  fiyat;

        $indirimlifiyat= $konu   ->  indirimlifiyat;

        $kategori    =   $konu   ->  kategori;

        $sehir       =   $konu   ->  sehir;

        $cinsiyet    =   $konu   ->  cinsiyet;

        $resimurl    =   $konu   ->  resimurl;

        $stok        =   $konu   ->  stok;

        $sql = "INSERT INTO urun (Adi,Aciklama,URL,Diger_id,Cinsiyet,Indirimli_fiyat,Normal_fiyat)
 VALUES ('$baslik','$metin','$urun_url','$urun_id','$cinsiyet','$indirimlifiyat','$fiyat')";

        $q = $db->prepare($sql);

        $q->execute();
    }

            // query














    }


/*
{
        $mfoni=simplexml_load_file("markafoni-5022.xml");
    $counter=0;

    foreach($mfoni->product as $konu){
        $counter++;
        if($counter<10){
        $urun_url    =   $konu   ->  product_url;

        $urun_id     =   $konu   ->  product_id;

        $marka       =   $konu   ->  brand_name;

        $baslik      =   $konu   ->  title;

        $fiyat       =   $konu   ->  deal_price;

        $indirimlifiyat= $konu   ->  price;

        $kategori    =   $konu   ->  merchant_category;

        $basTarihi   =   $konu   ->  start_date;

        $bitTarihi   =   $konu   ->  end_date;


    }
    }




}
*/
?>