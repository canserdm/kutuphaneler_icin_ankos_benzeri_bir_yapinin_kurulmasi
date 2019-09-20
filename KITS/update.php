<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sanal Kütüphane</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="style.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="js/cufon-yui.js"></script>
    <script type="text/javascript" src="js/arial.js"></script>
    <script type="text/javascript" src="js/cuf_run.js"></script>
</head>
<body>
<!-- START PAGE SOURCE -->
<div class="main">
    <div class="header">
        <div class="header_resize">
            <div class="logo">
                <h1 ><a href="yon_giris.php">Sanal<span>Kütüphane</span></a> <small>Kaynak Paylaşımının Geleceği</small></h1>
            </div>
            <div class="clr"></div>
            <div class="searchform">
                <?php
                echo '<h2 style="margin-top: -60px;margin-right: 20px"><br /><br /><a href="logout.php">Logout</a></h2>';
                ?>
            </div>
            <div class="menu_nav">
            </div>
            <div class="clr"></div>
        </div>
    </div>
    <?php
include "baglanti.php";
?>
    <?php

    if(isset($_POST['submit'])){
        $demirbas = $_POST['demirbas'];
        if($demirbas!="") {
            $query = $db->prepare("UPDATE kitap SET kitapAdi=?,tur=?,yayinevi=?,yayinyili=?,baski=?,dil=?,adet=?,icerik=?,yazarad=?,kutAd=? WHERE demirbas = $demirbas");
            $guncelle = $query ->execute(array(
                $kitapAdi=$_POST["kitapAdi"],
                $tur=$_POST["tur"],
                $yayinevi=$_POST["yayinevi"],
                $yayinyili=$_POST["yayinyili"],
                $baski=$_POST["baski"],
                $dil=$_POST["dil"],
                $adet=$_POST["adet"],
                $icerik=$_POST["icerik"],
                $yazarAd=$_POST["yazarAd"],
                $kutAd=$_POST["kutAd"],
            ));
        }
        if ($guncelle){
            print("kitap bilgileri başarıyla güncellendi");
        }else
            print("kitap bilgileri güncellenemedi");
    }
    ?>
<div id="content">
        <div class="content_resize">
            <div class="content_resize2">
                <fieldset style="margin-top: 5px;margin-left: 5px; margin-bottom: 5px; margin-right: 10px">
        <?php
        foreach($db->query('SELECT * FROM kitap ') as $listele) {
            $demirbas=$listele["demirbas"];
            $kitapAdi=$listele["kitapAdi"];
            $tur=$listele["tur"];
            $yayinevi=$listele["yayinevi"];
            $yayinyili=$listele["yayinyili"];
            $baski=$listele["baski"];
            $dil=$listele["dil"];
            $adet=$listele["adet"];
            $icerik=$listele["icerik"];
            $yazarAd=$listele["yazarAd"];
            $kutAd=$listele["kutAd"];

            echo "<form method='POST' class='TTWForm' action='update.php'><br><table>"."<th><tbody>".'
Demirbaş:<input type="text" name="demirbas" value="'.$demirbas.'"><br>
Kitap Adı:<input type="text" name="kitapAdi" value="'.$kitapAdi.'"><br>
Tür:<input type="text" name="tur" value="'.$tur.'"><br>
Yayınevi:<input type="text" name="yayinevi" value="'.$yayinevi.'"><br>
Yayınyılı:<input type="text" name="yayinyili" value="'.$yayinyili.'"><br>
Baskı:<input type="text" name="baski" value="'.$baski.'"><br>
Dil:<input type="text" name="dil" value="'.$dil.'"><br>
Adet:<input type="text" name="adet" value="'.$adet.'"><br>
İçerik:<input type="text" name="icerik" value="'.$icerik.'"><br>
Yazar Adı:<input type="text" name="yazarAd" value="'.$yazarAd.'"><br>
Kütüphane Adı:<input type="text" name="kutAd" value="'.$kutAd.'"><br>
<input type="submit" name="submit" value="Güncelle"><br>
'."</tbody></th>"."</table></form>";

        }
        ?>
    </fieldset>
</div>

</div>
</div>

</div>
<!-- END PAGE SOURCE -->
</body>
</html>