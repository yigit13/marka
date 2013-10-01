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
