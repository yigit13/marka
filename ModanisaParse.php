<?php
set_time_limit(10000);
header("Content-Type: text/html; charset=utf8");
include "config.php";


for($i=0;$i<77;$i++){

    $xmllink = 'http://feed.reklamaction.com/result/get/xml?q=1d9a9c48d829867ceae294dfe5f0c2ba&sira=1&limit=200&sayfa='.$i;
    $a=simplexml_load_file("$xmllink");

    $counter=0;

//Modanisa Ürünleri

    foreach ($a->Products->Product as $konu) {

        $urun_xml_code  =   $konu   ->  ID;
$k="k";

        $urun_xml_id        =   $konu   ->  Code;

        $urun_xml_url      =   $konu   ->  URL;

        $urun_adi        =   $konu   ->  Title;

        $urun_aciklama    =   $konu   ->  FullDesc;

        $normal_fiyat    =   $konu   ->  ListPrice;

        $indirimli_fiyat =   $konu   ->  SalePrice;

        $urun_kur       =   $konu   ->  Curr;

        $kategori_ra_id =   $konu   ->  Category;

        $kategori_ra_isim   =   $konu   ->  CategoryName;

        $urun_xml_main_category_name    =   $konu   ->  MainCategoryName;

        $kategori_site_isim    =    $konu   ->  AdvertiserCategory;

        $magaza_advertiser  =   $konu   ->  Advertiser;

        $urun_cinsiyet   =   $konu   ->  Gender;

        $urun_xml_brand  =   $konu   ->  Brand;

        $resim_url       =   $konu   ->  Image;

        $urun_update     =   date("Ymd");




        include "convert.php";
        include "convert3.php";
        $querycount =$db ->query("SELECT marka_id FROM marka WHERE marka_adi = '$urun_xml_brand'");
        $rowCount = $querycount ->rowCount();

        if($rowCount>0){

            $querymarka="SELECT marka_id FROM marka WHERE marka_adi='$urun_xml_brand'";

            $querymarka2=$db -> query($querymarka);
            $marka_id1 = $querymarka2-> fetchAll(PDO::FETCH_ASSOC);
            $marka_id=$marka_id1[0]['marka_id'];

        }
        else{

            $querymarka3="INSERT INTO marka (marka_adi) VALUES('$urun_xml_brand')";
            $querymarka4=$db -> prepare($querymarka3);
            $querymarka4->execute();
            $marka_id=$db ->lastInsertId();


        }

        $katsor =   $db ->query("SELECT kategori_ra_id FROM kategori WHERE kategori_ra_id='$kategori_ra_id'");
        $rowCount2  = $katsor->rowCount();

        if ($rowCount2>0){

            $katsor2    =   "SELECT kategori_id FROM kategori WHERE kategori_ra_id = '$kategori_ra_id'";
            $katsor3    =   $db -> query($katsor2);
            $kategori_id1=$katsor3->fetchAll(PDO::FETCH_ASSOC);
            $kategori_id    =   $kategori_id1[0]['kategori_id'];

        }

        else {

            $katsor4 = "INSERT INTO kategori (kategori_ra_id,kategori_ra_isim,kategori_site_isim) VALUES ('$kategori_ra_id','$kategori_ra_isim','$kategori_site_isim')";
            $katsor5 = $db->prepare($katsor4);
            $katsor5->execute();
            $kategori_id=$db -> lastInsertId();


        }

        $magsor=  $db ->query("SELECT magaza_advertiser FROM magaza WHERE magaza_advertiser='$magaza_advertiser'");
        $rowCount3  = $magsor->rowCount();

        if($rowCount3 >0){

            $magsor2    =   "SELECT magaza_id FROM magaza WHERE magaza_advertiser='$magaza_advertiser'";
            $magsor3    =   $db -> query($magsor2);
            $magaza_id1=$magsor3->fetchAll(PDO::FETCH_ASSOC);
            $magaza_id    =   $magaza_id1[0]['magaza_id'];


        }else{

            $magsor4 = "INSERT INTO magaza (magaza_advertiser) VALUES ('$magaza_advertiser')";
            $magsor5 = $db->prepare($magsor4);
            $magsor5->execute();
            $magaza_id=$db -> lastInsertId();

        }

        $ressor="INSERT INTO resim (resim_url) VALUES ('$resim_url')";
        $ressor2=$db->prepare($ressor);
        $ressor2->execute();
        echo "$resim_url";



        try{
            $sorgu="INSERT INTO urun (urun_adi,urun_aciklama,urun_xml_url,urun_xml_id,urun_cinsiyet,indirimli_fiyat,normal_fiyat,urun_url,urun_xml_code,urun_xml_brand,urun_xml_main_category_name,urun_update,urun_kur,marka_id,kategori_id,magaza_id)
        VALUES ('$urun_adi','$urun_aciklama','$urun_xml_url','$urun_xml_id','$urun_cinsiyet','$indirimli_fiyat','$normal_fiyat','$urun_url','$urun_xml_code','$urun_xml_brand','$urun_xml_main_category_name','$urun_update','$urun_kur','$marka_id','$kategori_id','$magaza_id')";
            $sorgu2 = $db -> prepare($sorgu);
            $sorgu2 -> execute();
            echo "$urun_adi"."<br />"."$urun_aciklama"."<br />"."$urun_xml_url"."<br />"."$urun_xml_id"."<br />"."$urun_cinsiyet"."<br />"."$indirimli_fiyat"."<br />"."$normal_fiyat"."<br />"."$urun_url"."<br />"."$urun_xml_code"."<br />"."$urun_xml_brand"."<br />"."$urun_xml_main_category_name"."<br />"."$urun_update"."<br />"."$urun_kur"."<br />"."$marka_id"."<br />"."$kategori_id"."<br />"."$magaza_id"."<br />"."<br />"."<br />" ;

        }
        catch(exception  $e){
            echo 'message:'.$e->getMessage();
        }



    }



}
?>
