<!DOCTYPE html>
<html lang="en">
<head>
    <title>Giris Sayfasi</title>
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
                <h1 ><a href="index.php">Sanal<span>Kütüphane</span></a> <small>Kaynak Paylaşımının Geleceği</small></h1>
            </div>
            <div class="clr"></div>
            <div class="searchform">
                <h2 style="border-color: moccasin;border-style: outset; background-color:#eeeacf;padding:auto">

                       <form method="post" style="margin-top:-8px;margin-bottom:-10px;margin-right: 10px;margin-left: 10px">
                           <label>Kullanıcı Adı:</label>
                           <input type="text" name="username" class="form-control" />

                           <label>Şifre:</label>
                           <input type="password" name="password" class="form-control" />

                           <input type="submit" name="login" class="btn btn-info" value="GİRİŞ" />
                       </form>
                </h2>
            </div>
            <div class="clr"></div>
        </div>
    </div>
    <div class="menu_nav">

        <form method="post" style="margin: 10px 200px 0px 100px; padding: 50px 80px 50px 80px;border: outset">
            <table>
                <h2 style="margin: 0px 5px 0px 55px">Yönetici Kaydı</h2>
                <tr>
                    <td><p>Kullanıcı Adı:</p> </td>
                    <td><p><input type="text" name="yon_username"></p></td>
                </tr>
                <tr>
                    <td><p>E-posta:</p> </td>
                    <td><p><input type="text" name="yon_mail"></p></td>
                </tr>
                <tr>
                    <td><p>Adres:</p> </td>
                    <td><p><input type="text" name="yon_adres"></p></td>
                </tr>
                <tr>
                    <td><p>Şifre:</p> </td>
                    <td><p><input type="password" name="yon_password"></p></td>
                </tr>

            </table>
            <p style="margin: 0px 0px 0px 80px"><input type="submit" name="yon_kayıt" value="KAYDOL"></p>
        </form>
    </div>
    <div class="menu_nav">
        <form method="post" style="margin: -90px -250px 0px 650px;padding: 50px 80px 50px 80px;border: outset;">
            <table>
                <h2 style="margin: 0px 5px 0px 55px">Üye Kaydı</h2>
                <tr>
                    <td><p>Kullanıcı Adı:</p> </td>
                    <td><p><input type="text" name="uye_username"></p></td>
                </tr>
                <tr>
                    <td><p>E-posta:</p> </td>
                    <td><p><input type="text" name="uye_mail"></p></td>
                </tr>
                <tr>
                    <td><p>Adres:</p> </td>
                    <td><p><input type="text" name="uye_adres"></p></td>
                </tr>
                <tr>
                    <td><p>Şifre:</p> </td>
                    <td><p><input type="password" name="uye_password"></p></td>
                </tr>

            </table>
            <p style="margin: 0px 0px 0px 80px"><input type="submit" name="uye_kayıt" value="KAYDOL"></p>
        </form>
    </div>
</div>
<!-- END PAGE SOURCE -->

<?php
include "baglanti.php";
session_start();
$message="";
try{
    if(isset($_POST["login"])){
        if(empty($_POST["username"]) || empty($_POST["password"]))
        {
            print ('All fields are required');
        }
        else
        {
            $query = "SELECT * FROM uye WHERE uyeAdi = :username AND uyeSifre = :password";
            $statement = $db->prepare($query);
            $statement->execute(array(
                    'username'     =>     $_POST["username"],
                    'password'     =>     $_POST["password"],
                )
            );
            $count = $statement->rowCount();
            $query2="SELECT * FROM yonetici WHERE yoneticiAdi = :username AND yoneticiSifre = :password";
            $statement2 = $db->prepare($query2);
            $statement2->execute(array(
                    'username'     =>     $_POST["username"],
                    'password'     =>     $_POST["password"],
                )
            );
            $count2 = $statement2->rowCount();
            if($count > 0 )
            {
                $_SESSION["uyeAdi"] = $_POST["username"];
                header("location:uye_giris.php");
            }
            elseif ($count2 > 0)
            {
                $_SESSION["yoneticiAdi"] = $_POST["username"];
                header("location:yon_giris.php");
            }
            else
            {
                print ('Wrong Data');
                header("location:index.php");
            }
        }
    }
}
catch(PDOException $error)
{
    $message = $error->getMessage();
}
if (isset($_POST["yon_kayıt"])){
    $query=$db->prepare("INSERT INTO yonetici SET yoneticiAdi=?,yoneticiSifre=?,yonAdres=?,yonMail=?");
    $insert=$query->execute(array(
            $yoneticiAdi=$_POST["yon_username"],
            $yoneticiSifre=$_POST["yon_password"],
            $yonAdres=$_POST["yon_adres"],
            $yonMail=$_POST["yon_mail"],

    ));
    if ($insert){
        print("yonetici bilgileri başarıyla kaydedildi");
    }else
        print("yonetici bilgileri kaydedilmedi");
}

if (isset($_POST["uye_kayıt"])){
    $query=$db->prepare("INSERT INTO uye SET uyeAdi=?,uyeSifre=?,uyeAdres=?,uyeMail=?");
    $insert=$query->execute(array(
        $uyeAdi=$_POST["uye_username"],
        $uyeSifre=$_POST["uye_password"],
        $uyeAdres=$_POST["uye_adres"],
        $uyeMail=$_POST["uye_mail"],
    ));
    if ($insert){
        print ("uye bilgileri başarıyla kaydedildi");
    }else
        print("uye bilgileri kaydedilmedi");
}
?>
</body>
</html>