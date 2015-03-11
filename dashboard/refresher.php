<?php
/**
 * Created by PhpStorm.
 * User: arumoy
 * Date: 27/2/15
 * Time: 1:05 AM
 */
$link = mysqli_connect('localhost', 'arumoy', 'ohms', 'home_cont', '3306');
$id_in = intval(filter_input(INPUT_GET, 'id'));
$query = "SELECT status FROM home_cont.dat WHERE appl_id = {$id_in}";
$result = mysqli_query($link, $query);
$row = mysqli_fetch_array($result);
echo $row['status']."";
mysqli_close($link);
?>