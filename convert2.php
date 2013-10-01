<html>
<head>

<meta charset="utf-8">
</head>

<?php
$string = '&lt;b&gt;Ürün Özellikleri&lt;/b&gt;&lt;ul&gt;&lt;li&gt;Beyaz koton tişört&lt;/li&gt;&lt;li&gt;Bisiklet yaka, kısa kol&lt;/li&gt;&lt;li&gt;Siyah dantel yazı baskı&lt;/li&gt;&lt;li&gt;%100 koton&lt;/li&gt;&lt;li&gt;Makinede yıkamaya uygun&lt;/li&gt;&lt;/ul&gt;';
$utf8_encode = utf8_encode(html_entity_decode($string));
$replaced=array('Ã');
$replace=array('Ö');

str_replace($replaced,$replace,$utf8_encode);
echo $utf8_encode;


?> </html>