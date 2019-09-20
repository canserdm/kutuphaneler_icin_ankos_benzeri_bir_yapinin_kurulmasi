<?php
/**
 * Created by PhpStorm.
 * User: Levent
 * Date: 17.1.2019
 * Time: 20:20
 */

include "kaynakkodlar/header.php";
?>
<div class="searchform">

    <?php
    echo '<h2 style="margin-top: -160px;margin-right: 20px"><br /><br /><a href="logout.php">Logout</a></h2>';
    ?>
</div>
<?php
include "baglanti.php";
$aranan=$_POST["editbox_search"];
$ara=$db->query("select * from kitap where kitapAdi like '%$aranan%' order by kitapAdi");//isim sütununda a harfi geçenleri çektik.
$miktar=$ara->rowCount();//verilerin hepsini saydırdık.
?>
<div class="content">
    <div class="content_resize">
        <div class="content_resize2">
<?php
if(empty($aranan)){
    echo "&emsp;aranacak kelime yok";
}else{
    if($ara) {//eğer veri çekildiyse
        echo "veri çekildi <br />";

        if ($miktar > 0) {
            $i=0;
            foreach ($ara as $al) {//foreach $arada ki tüm verileri tek tek $al değişkenine aktaracak
                $i++;
                echo "&emsp; ".$i.".<br> &emsp;&emsp;  <img style='width: 80px;height: 80px' src='kitapResim/".$al["foto"] ."'/>&emsp;&emsp;  "
                    .$al["kitapAdi"] ."- " .$al["tur"]."- ".$al["dil"]."- " .$al["yayinevi"]."- " .$al["yazarAd"]."- "
                    .$al["kutAd"]."&emsp;<td><a href='kitapDokuman/".$al["dokuman"]."'><button>indir</button></a></td><br /><br>";//Aldığımız verilerden isim sütununu ekrana bastırdık
                $siralama=array($al["kitapAdi"]);
            }
        } else {
            echo "&emsp;Aranan kelime yok.";
        }
    }
}
?>
        </div>
    </div>
</div>
<?php
include "kaynakkodlar/footer.php";
?>