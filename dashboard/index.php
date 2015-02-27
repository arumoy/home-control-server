<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>DashBoard :: Home Control</title>
    <link rel="stylesheet" href="../styl/sty.css">
    <script src="../js/jquery.js"></script>
    <script src="../js/f1.js"></script>
    <link href='http://fonts.googleapis.com/css?family=Shadows+Into+Light' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Play:700' rel='stylesheet' type='text/css'>
</head>
<body>
<header>
    &mdash; Dashboard &mdash;
</header>
<div id="dash">
    <?php
    if(!$link = mysqli_connect('localhost', 'arumoy', 'ohms', 'arumoy', '3306')) {
        echo "Connection Failed...\n";
        goto ending;
    }
    $usn = trim(filter_input(INPUT_POST,'username'));
    $pass = md5(trim(filter_input(INPUT_POST,'pass')), false);
    if(empty($usn) || empty($pass)) {
        header("Location: ".$_SERVER['HTTP_REFERER']);
    }
    $query = "SELECT username FROM arumoy.userpass WHERE username = '{$usn}' AND pass = '{$pass}'";
    if(!$result = mysqli_query($link, $query)) {
        echo "Query Didn't run.";
        goto ending;
    } else {
        $row = mysqli_fetch_array($result);
        if(!($row['username'] == $usn)) {
            header("Location: ".$_SERVER['HTTP_REFERER']);
            die();
        }
        echo "<p>Welcome, {$row['username']}</p>\n";
        echo "<span style='background: red; color: white'><b>RED</b></span> elements are switched off. Click them to turn them on<br>";
        echo "<span style='background: green; color: white'><b>GREEN</b></span> elements are switched on. Click them to turn them off";
    }

    $query = "SELECT DISTINCT room_alias FROM dat WHERE user_id = '{$usn}'";
    $magazine = null;
    if($result = mysqli_query($link, $query)) {
        echo "<div id=\"ddlist\">\n";
        while($row = mysqli_fetch_array($result)) {
            echo "\t<div id=\"".$row['room_alias']."\">\n";
            echo "\t<h3>".$row['room_alias']."</h3>\n";
            $qr = "SELECT appliance_alias, appl_id, status FROM dat WHERE room_alias = '{$row['room_alias']}' AND user_id = '{$usn}'";
            $res = mysqli_query($link, $qr);
            while($banana = mysqli_fetch_array($res)) {
                /**
                 * Render every single alliance
                 */
                echo "\t\t<button id=\"".$banana['appl_id']."\" class=\"appl\" ";
                if($banana['status'] == "off") {
                    echo "style=\"background: red;\"";
                } elseif ($banana['status'] == "on") {
                    echo "style=\"background: green;\"";
                }
                echo " onclick=\"toggleStatus(this.id);\"><b>".$banana['appliance_alias'].
                    "<script>blobReload(".$banana['appl_id'].")</script>"."</b></button>\n";

            }
            echo "\t</div>\n";
        }
        echo "</div>\n";
    }
    ending:
    /* End of the End */
    ?>
</div>
</body>
</html>