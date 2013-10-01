
<?php

set_time_limit(100);
header("Content-Type: text/html; charset=utf8");
include "config.php";




$a=simplexml_load_file("mustafa.xml");



$counter=0;

//Lidyana Ürünleri

foreach ($a->urun as $konu) {

    $counter++;
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





    if($counter<20){






        $src2=$db->query("select Diger_id from urun where Diger_id = '$urun_id'");
        $src2->fetchAll(PDO::FETCH_ASSOC);



        $rowNum2=$src2->rowCount();

        //O ürün varsa UPDATE edecek
        if($rowNum2 > 0)

        {

            $sorgu="UPDATE urun(Indirimli_fiyat,Normal_fiyat) SET ('$indirimlifiyat','$fiyat')";
            $sorgu2=$db->prepare($sorgu);
            $sorgu2->execute();

            $queryPic2 = "UPDATE marka (Marka_adi) SET
          ('$marka') ";
            $q4 = $db ->prepare($queryPic2);
            $q4 ->execute();




        }

        //Yok ise ilk defa ekleyecek
        else{
            $sorgu3="INSERT INTO urun(Adi,Aciklama,URL,Diger_id,Cinsiyet,Indirimli_fiyat,Normal_fiyat) VALUES ('$baslik','$metin',          '$urun_url','$urun_id','$cinsiyet','$indirimlifiyat','$fiyat')";
            $sorgu4=$db->prepare($sorgu3);
            $sorgu4->execute();


            $queryMarka = "INSERT INTO marka(Marka_adi,Urun_id) VALUES ('$marka','$urun_id') ";
            $q3 = $db ->prepare($queryMarka);
            $q3 ->execute();



            $queryPic = "INSERT INTO resim (Resim_Url,Urun_id) VALUES
        ('$resimurl','$urun_id') ";
            $q2 = $db ->prepare($queryPic);
            $q2 ->execute();


        }






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