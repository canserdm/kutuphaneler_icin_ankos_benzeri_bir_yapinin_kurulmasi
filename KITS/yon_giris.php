<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>SanalKütüphane</title>
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
                <h1><a href="yon_giris.php">Sanal<span>Kütüphane</span></a> <small>Kaynak Paylaşımının Geleceği</small></h1>
            </div>
            <div class="clr"></div>
            <div class="searchform">
                <?php
                echo '<h2 style="margin-top: -60px"><br /><br /><a href="logout.php">Logout</a></h2>';
                ?>
            </div>
            <div class="menu_nav">
                <ul style="background-color: inherit">
                    <li><a href="yon_giris.php">Ana Sayfa</a></li>
                    <li><a href="insert.php">Kitap Ekle</a></li>
                </ul>
            </div>
            <div class="clr"></div>
        </div>
    </div>
</div>
<?php
include "baglanti.php";
$sql = $db->prepare("SELECT * FROM kitap");
$sql->execute();
echo "<h3 style='color: #719794;margin-left: 400px;margin-top: 5px'>Kitapların Listesi</h3>";
while($kitap=$sql->fetch(PDO::FETCH_ASSOC)) {
    echo "<form method='post' style='margin: 0px 50px -150px 50px;padding: 5px 80px 50px 80px;border: outset;'>".
        "<table class='TTWForm'>".
        "<colgroup>".
        "<col span='2'>".
        "</colgroup>".
                "<tbody>
                    <tr>
                        <td><img style='width: 80px;height: 80px' src='kitapResim/".$kitap['foto']."'></td>
                        <td>".$kitap['demirbas']."-</td>
                        <td>".$kitap['kitapAdi']."-</td>
                        <td>".$kitap['tur']."-</td>
                        <td>".$kitap['yayinevi']."-</td>
                        <td>".$kitap['yayinyili']."-</td>
                        <td>".$kitap['baski']."-</td>
                        <td>".$kitap['dil']."-</td>
                        <td>".$kitap['adet']."-</td>
                        <td>".$kitap['yazarAd']."-</td>
                        <td>".$kitap['kutAd']."</td>
                        <td><a type='submit' name='submit' style='color: red;' href='update.php?demirbas=".$kitap['demirbas']."'>Güncelle</a></td>
                        <td><a href='delete.php?id=".$kitap['demirbas']."'>Sil</a></td>
                    </tr>
                </tbody>".
            "</table>";
}
$hata = $sql->errorInfo();
empty($hata[2]) ?: $hata[2];

?>