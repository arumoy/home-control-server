<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>DashBoard :: Home Control</title>
    <link rel="stylesheet" href="../styl/sty.css">
    <script src="../js/f1.js"></script>
</head>
<body>
<header>
    &mdash; Dashboard &mdash;
</header>
<div id="dash">
    <?php
    if(!$link = mysqli_connect('localhost', 'arumoy', 'ohms', 'php_test', '3306')) {
        echo "Connection Failed...\n";
        goto ending;
    }
    $usn = trim(filter_input(INPUT_POST,'username'));
    $pass = md5(trim(filter_input(INPUT_POST,'pass')), false);
    if(empty($usn) || empty($pass)) {
        header("Location: http://localhost");
    }
    $query = "SELECT username FROM arumoy.userpass WHERE username = '{$usn}' AND pass = '{$pass}'";
    if(!$result = mysqli_query($link, $query)) {
        echo "Query Didn't run.";
        goto ending;
    } else {
        $row = mysqli_fetch_array($result);
        if(!($row['username'] == $usn)) {
            header("Location: http://localhost");
            die();
        }
        echo "<p>Welcome, {$row['username']}</p>\n";
    }

    $query = "SELECT DISTINCT room_alias FROM dat WHERE user_id = '{$usn}'";
    $magazine = null;
    if($result = mysqli_query($link, $query)) {
        echo "<span id=\"status_label\"></span>\n";
        echo "<select id=\"ddlist\" onchange='zigbee()'>\n";
        while($row = mysqli_fetch_array($result)) {
            echo "\t<optgroup label=\"".$row['room_alias']."\">\n";
            $qr = "SELECT appliance_alias, appl_id FROM dat WHERE room_alias = '{$row['room_alias']}' AND user_id = '{$usn}'";
            $res = mysqli_query($link, $qr);
            while($banana = mysqli_fetch_array($res)) {
                echo "\t<option value=\"".$banana['appl_id']."\">".$banana['appliance_alias']."</option>\n";

            }
            echo "\t</optgroup>\n";
        }
        echo "</select>\n";
    }
    ending:
    /* End of the End */
    ?>
</div>
</body>
</html>