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
            <div class="menu_nav">
            </div>
            <div class="clr"></div>
        </div>
    </div><div class="searchform">
        <?php
        echo '<h2 style="margin-top: -170px;margin-right: 170px"><br /><br /><a href="logout.php">Logout</a></h2>';
        ?>
    </div>
    <?php

    ?>
    <div class="menu_nav">
        <form method="post" style="margin: -9px -250px 0px 50px;padding: 50px 80px 50px 80px;border: outset;" action="kaydet.php" enctype="multipart/form-data">
            <table>
                <h2 style="margin: 0px 5px 0px 55px">Kitap Kaydı</h2>
                <tr>
                    <td><p>Fotoğraf:</p> </td>
                    <td><p><input type="file" name="foto"></p></td>
                </tr>
                <tr>
                    <td><p>Doküman:</p> </td>
                    <td><p><input type="file" name="dokuman"></p></td>
                </tr>
                <tr>
                    <td><p>Kitap Adı:</p> </td>
                    <td><p><input type="text" name="kitapAdi"></p></td>
                </tr>
                <tr>
                    <td><p>Tür:</p> </td>
                    <td><p><input type="text" name="tur"></p></td>
                </tr>
                <tr>
                    <td><p>Yayınevi:</p> </td>
                    <td><p><input type="text" name="yayinevi"></p></td>
                </tr>
                <tr>
                    <td><p>Yayınyılı:</p> </td>
                    <td><p><input type="text" name="yayinyili"></p></td>
                </tr>
                <tr>
                    <td><p>Baskı:</p> </td>
                    <td><p><input type="text" name="baski"></p></td>
                </tr>
                <tr>
                    <td><p>Dil:</p> </td>
                    <td><p><input type="text" name="dil"></p></td>
                </tr>
                <tr>
                    <td><p>Adet:</p> </td>
                    <td><p><input type="text" name="adet"></p></td>
                </tr>
                <tr>
                    <td><p>İçerik:</p> </td>
                    <td><p><input type="text" name="icerik"></p></td>
                </tr>
                <tr>
                    <td><p>Yazar Adı:</p> </td>
                    <td><p><input type="text" name="yazarAd"></p></td>
                </tr>
                <tr>
                    <td><p>Kütüphane Adı:</p> </td>
                    <td><p><input type="text" name="kutAd"></p></td>
                </tr><tr>
                    <td><p>Kütüphane Id:</p> </td>
                    <td><p><input type="text" name="kutId"></p></td>
                </tr>


            </table>
            <p style="margin: 0px 0px 0px 80px"><input type="submit" name="kitap_kayıt" value="KAYDET"></p>
        </form>
    </div>
</div>
<!-- END PAGE SOURCE -->

</body>
</html>