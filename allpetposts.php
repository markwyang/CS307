<?php
require_once "inc/global.inc.php";
$ph = new PetPostsHandler();
$user = unserialize($_SESSION['user']);
$posts = $ph->fetchAllPosts();
if (!strcmp($_GET['s'], "ml")) {
	$posts = $ph->fetchlocation($user->state);
}
?>

<!doctype html>

<html>
<head>

    <meta charset="utf-8">
    <title>
        All Posts | Mippsy
    </title>
    <link rel="stylesheet" href="css/style.css" type="text/css" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script type="text/javascript" src="pp.js"></script>
</head>

<body>
<div id="wrapper">
    <div id="header">
        <?php
        $page = $_SERVER['PHP_SELF'];
        include "inc/menu.php";
        ?>
    </div>
    <div id="content">
        <br>
        <center>
            <h1>All Pets Posts</h1>
            <body>
		<a href="allpetposts.php?s=ap">All Posts</a>
		<a href="allpetposts.php?s=ml">My Location</a>
	    </body>
            <table id="Posts">
                <?php
                    $len = sizeof($posts);
                    for ($i = $len - 1; $i >= 0; $i--) {
                        echo "<tr>";
                        //echo "<td>".$i."</td>";
                        echo "<td>"."<a href='petpost.php?id=".$posts[$i]['id']."'>".$posts[$i]['petName']."</a>" ."</td>";
                        echo "<td>".$posts[$i]['age']."<td>";
                        echo "<td>".$posts[$i]['species']."<td>";
                        echo "<td>".$posts[$i]['date']."<td>";
                        echo "</tr>";
                    }
                ?>
            </table>
        </center>
    </div>
    <div id="footer">
        <?php include "inc/footer.php"; ?>
    </div>
</div>
</body>

</html>