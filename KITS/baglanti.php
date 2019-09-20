<?php
/**
 * Created by PhpStorm.
 * User: Levent
 * Date: 18.12.2018
 * Time: 09:00
 */

try {
    $db = new PDO("mysql:host=localhost; dbname=kits", "", "");
} catch ( PDOException $e ){
    print $e->getMessage();
}
?>