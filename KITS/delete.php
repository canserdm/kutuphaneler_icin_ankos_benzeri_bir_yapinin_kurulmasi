<?php
/**
 * Created by PhpStorm.
 * User: Levent
 * Date: 3.12.2018
 * Time: 15:44
 */

include 'baglanti.php';

    if(isset($_GET['id'])) {
        $query = $db->prepare("DELETE FROM kitap WHERE demirbas=?");
        $delete = $query ->execute(array(

            $id = $_GET['id']
        ));
    }
    include 'yon_giris.php';
    ?>
</div>