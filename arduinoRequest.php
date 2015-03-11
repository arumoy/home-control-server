<?php
$client_ip = $_SERVER['REMOTE_ADDR'];
$link = mysqli_connect('localhost', 'arumoy', 'ohms', 'home_cont', '3306');
$usn = filter_input(INPUT_GET, 'id');
$query = "UPDATE home_cont.userpass SET home_ip = '{$client_ip}' WHERE username = '{$usn}'";
mysqli_query($link, $query);
$query = "select status from home_cont.dat where user_id = '{$usn}'";
$res = mysqli_query($link, $query);
while($row = mysqli_fetch_array($res)) {
    echo $row['status']."|";
}
?>