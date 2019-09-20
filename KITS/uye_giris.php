<?php
include "kaynakkodlar/header.php";

?>
<div class="searchform">
    <?php
    echo '<h2 style="margin-top: -160px;margin-right: 80px"><br /><br /><a href="logout.php">Logout</a></h2>';
    ?>
</div>
<div class="content">
    <div class="content_resize">
        <div class="content_resize2">
            <div class="mainbar">
                <div class="article">
                    <h2><span>Amacımız</span></h2>
                    <div class="clr"></div>
                    <img src="images/images.jpg" width="540" height="220" />
                    <br><br><p>Ülkemizdeki akademisyen ve öğrencilerin yerel (lokal) ve küresel (global) bilgi ağlarına
                        en üst düzeyde erişimlerini gerçekleştirerek, eğitim ve araştırmalarına destek olacak bir
                        yapıyı ortaya koymaktır. </p>
                    <?php
                    include "baglanti.php";
                    $sql = $db->prepare("SELECT * FROM kitap");
                    $sql->execute();
                    echo "<table style='border:solid; margin: -400px -320px 300px 660px'>
                        <tr>
                            <td><h2><span>En Son Eklenen Kitaplar</span></h2></td>
                        </tr>";
                    $i=1;
                            while($kitap=$sql->fetch(PDO::FETCH_ASSOC)) {
                                echo "<tr>
                                        <td>".$i.". ".$kitap['kitapAdi']." - ".$kitap['tur']." - ".$kitap['yazarAd']."</td>
                                    </tr>";
                                $i++;
                            }
                            $hata = $sql->errorInfo();
                            empty($hata[2]) ?: $hata[2];

                            ?>
                        <hr>

                    </table></div>
            </div>
            <div class="clr"></div>
        </div>
    </div>
</div>


<?php
include "kaynakkodlar/footer.php";
?>
