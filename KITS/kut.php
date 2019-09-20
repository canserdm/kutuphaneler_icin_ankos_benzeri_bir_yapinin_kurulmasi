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
            session_start();

            $sql = $db->prepare("SELECT * FROM kutuphane");
            $sql->execute();
            echo "<h3 style='color: #719794;margin-left: 400px;margin-top: 5px'>Kütüphaneler</h3>";
$i=0;
            while($kut=$sql->fetch(PDO::FETCH_ASSOC)) {
                $i++;
                $_SESSION['kut_isim']=$i;
                echo "<table class='TTWForm'>".
                    "<colgroup>".
                    "<col span='2'>".
                    "</colgroup>".
                    "<tbody>
                    <td> 
                    "."
                        <td><a name='bul' href='http://localhost/KITS/library.php?kut_id=".$_SESSION['kut_isim']."'>".$kut['kut_isim']."</a></td>
                        </td>
                   
                   
            </tbody>
            </table>";
            }


            $hata = $sql->errorInfo();
            empty($hata[2]) ?: $hata[2];
            echo "</div>
</div>
<div/>";
            include "kaynakkodlar/footer.php";
            ?>

