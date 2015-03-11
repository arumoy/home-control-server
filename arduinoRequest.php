<?php
/**
 * Created by PhpStorm.
 * User: arumoy
 * Date: 11/3/15
 * Time: 12:33 PM
 */
$client_ip = $_SERVER['REMOTE_ADDR'];
$link = mysqli_connect('localhost', 'arumoy', 'ohms', 'home_cont', '3306');
$usn = filter_input(INPUT_GET, usr_id);
$query = "UPDATE home_cont.userpass SET home_ip = '{$client_ip}' WHERE username = '{$usn}'";
mysqli_query($link, $query);
$query = "select appl_id, status from dat where user_id = '{$usn}'";
$result = mysqli_query($link, $query);
$bell = "";
while($row = mysql_fetch_array($result)) {
    $bell = $bell." "."{$row['status']}";
}
echo $bell;
?>