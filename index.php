<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Naamloos document</title>
</head>

<body>
<?php
$connectDatabase = mysql_connect('localhost:3306','beautymysql','?KLMbart123') or die('something went wrong');
$selectDB = mysql_select_db('admin_',$connectDatabase);

 $sqlQuery="SELECT * FROM users";
 $exQuery = mysql_query($sqlQuery);
 
    $rows= mysql_fetch_assoc($exQuery);
    
    
    echo "<table align='center' width='100%' border='1' >";
        echo "<th>ID</th>";
        echo "<th>username</th>";
        echo "<th>email</th>";
        echo "<th>city</th>";
    echo "<tr>";
    
    foreach($rows as $key=>$value)   {     
         echo "<td>".$value."</td>";          
    }
        echo "</tr>";
    echo "</table>";
?>
</body>
</html>