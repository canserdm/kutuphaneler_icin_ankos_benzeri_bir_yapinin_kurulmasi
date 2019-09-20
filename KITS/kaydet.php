
<?php

$target_dir2 = "kitapDokuman/";
$target_file2 = $target_dir2 . basename($_FILES["dokuman"]["name"]);
$uploadOk2 = 1;
$imageFileType2 = strtolower(pathinfo($target_file2, PATHINFO_EXTENSION));

if (isset($_POST["submit"])) {
    $check2 = getimagesize($_FILES["dokuman"]["tmp_name"]);
    if ($check2 !== false) {
        //echo "File is an image - " . $check["mime"] . ".";
        $uploadOk2 = 1;
    } else {
        echo "Dokuman Bulunamadı !!! ";
        $uploadOk2 = 0;
    }
}

if (file_exists($target_file2)) {
    //echo "Yüklemeye Çalıştığınız Fotoğraf Sistemde Yüklü !!! ";
    $uploadOk2 = 0;
}

if ($uploadOk2 == 0) {
    echo "Dokuman yükleme başarısız :(.";

} else {
    if (move_uploaded_file($_FILES["dokuman"]["tmp_name"], $target_file2)) {
        echo "Tebrikler!" . basename($_FILES["dokuman"]["name"]) . "  yüklendi. :) </br>";
        echo $target_file2;
    } else {
        echo "Dokuman Yüklenemedi :( !!!";
    }
}




$target_dir = "kitapResim/";
$target_file = $target_dir . basename($_FILES["foto"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["foto"]["tmp_name"]);
    if ($check !== false) {
        //echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "Fotoğraf Bulunamadı !!! ";
        $uploadOk = 0;
    }
}

if (file_exists($target_file)) {
    //echo "Yüklemeye Çalıştığınız Fotoğraf Sistemde Yüklü !!! ";
    $uploadOk = 0;
}

if ($_FILES["foto"]["size"] > 500000) {
    echo "Fotoğfraf boyutu 3Mb den büyük olamaz !!! ";
    $uploadOk = 0;
}

if ($uploadOk == 0) {
    echo "yükleme başarısız :(.";

} else {
    if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
        echo "Tebrikler!" . basename($_FILES["foto"]["name"]) . "  yüklendi. :) </br>";
        echo $target_file;
    } else {
        echo "Fotoğraflarınız Yüklenemedi :( !!!";
    }
}

include "baglanti.php";
if (isset($_POST["kitap_kayıt"])){
    $query=$db->prepare("INSERT INTO kitap SET foto=?,dokuman=?,kitapAdi=?,tur=?,yayinevi=?,yayinyili=?,baski=?,dil=?,adet=?,icerik=?,yazarAd=?,kutAd=?,kutId=?");
    $insert=$query->execute(array(
        $foto=$_FILES["foto"]["name"],
        $dokuman=$_FILES["dokuman"]["name"],
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
        $kutId=$_POST["kutId"],

    ));
    if ($insert){
        print("kitap bilgileri başarıyla kaydedildi");
    }else
        print("kitap bilgileri kaydedilmedi");
}
include "insert.php";
?>
