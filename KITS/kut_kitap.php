<?php

include "kaynakkodlar/header.php";
include "baglanti.php";
?>
<div class="searchform">
    <?php
    echo '<h2 style="margin-top: -160px;margin-right: 20px"><br /><br /><a href="logout.php">Logout</a></h2>';
    ?>
</div>
<div class="content">
    <div class="content_resize">
        <div class="content_resize2">

            <?php
            $sql = $db->prepare("SELECT * FROM kitap");
            $sql->execute();
            $i=0;
            echo "<h3 style='color: #719794;margin-left: 400px;margin-top: 5px'>Kütüphanedeki Kitaplar</h3>";
            while($kitap=$sql->fetch(PDO::FETCH_ASSOC)) {
                $i++;
                echo "<table class='TTWForm'>".
                    "<colgroup>".
                    "<col span='2'>".
                    "</colgroup>".
                    "<tbody>
                    <td> 
                    &emsp;<img style='width: 80px;height: 80px' src='kitapResim/".$kitap['foto']."'>
                                       
                        <td>&emsp;".$kitap['kitapAdi']." -</td>
                        <td>".$kitap['tur']." -</td>
                        <td>".$kitap['yayinevi']." -</td>
                        <td>".$kitap['yayinyili']." -</td>
                        <td>".$kitap['dil']." -</td>
                        <td>".$kitap['yazarAd']." -</td>
                        <td><a href='kitapDokuman/".$kitap['dokuman']."'><button>indir</button></a></td>
                    </td>
                   
                   
            </tbody>" .
                    "</table>
            ";
            }
            $hata = $sql->errorInfo();
            empty($hata[2]) ?: $hata[2];
            echo "</div>
</div>
<div/>";
            include "kaynakkodlar/footer.php";
            ?>

