<?php
/**
 * Created by PhpStorm.
 * User: arumoy
 * Date: 27/2/15
 * Time: 1:05 AM
 */
$link = mysqli_connect('localhost', 'arumoy', 'ohms', 'arumoy', '3306');
$id_in = intval(filter_input(INPUT_GET, 'id'));
$query = "SELECT status FROM arumoy.dat WHERE appl_id = {$id_in}";
$result = mysqli_query($link, $query);
$row = mysqli_fetch_array($result);
echo $row['status']."";
mysqli_close($link);
?>