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
if($row['status'] == "on") {
    $query = "UPDATE dat SET status = 'off' WHERE appl_id = {$id_in}";
    $result = mysqli_query($link, $query);
} elseif ($row['status'] == "off") {
    $query = "UPDATE dat SET status = 'on' WHERE  appl_id = {$id_in}";
    $result = mysqli_query($link, $query);
}
$query = "SELECT status FROM arumoy.dat WHERE appl_id = {$id_in}";
$result = mysqli_query($link, $query);
$row = mysqli_fetch_array($result);
echo $row['status']."";
mysqli_close($link);
?>