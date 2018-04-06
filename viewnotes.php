<h1>HI</h1>
<?php
mysql_connect("cristiancdb.cristiancuda.com", "cricud", "Tropicalisima1,");
mysql_select_db("snotepad");
//$dbh = new PDO("mysql:host=localhost;dbname=blog2","root", NULL);
$result = mysql_query("select * from notes");
while ($row = mysql_fetch_object($result)) {
    //echo $row->username;
    echo $row->note;
    echo " - ";

}
mysql_free_result($result);
?>


        <form action="logout.php" method="post">
    <input type="submit" value="Log Out" />
</form>
<form action="create_note.php" method="post">
    <input type="submit" value="Create note" />
</form>
    </body>
</html>
