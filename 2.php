<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Naamloos document</title>
</head>
something
<body>
<p>
  <?php
$connectDatabase = mysql_connect('localhost:3306','beautymysql','?KLMbart123') or die('something went wrong');
$selectDB = mysql_select_db('admin_',$connectDatabase);

    
     /*INSERT RECORD SCRIPT*/ 
    
    /*check the condition for set save exist or not*/
    if(isset($_POST['save'])){
        /*variable define*/
        $userName = $_POST['username'];
        $city = $_POST['city'];
        $email = $_POST['email'];
    
        $query = "INSERT INTO `users` (`userID`, `username`, `email`, `city`) VALUES (NULL, '".$userName."', '".$email."', '".$city."')";
        $exQuery = mysql_query($query,$connectDatabase); 
        
        if($exQuery){
            echo "Record successfully inserted.";
           // redirect
        }
    }
   
    $sqlQuery="SELECT *FROM users ";
 $exQuery = mysql_query($sqlQuery,$connectDatabase);
    
?>
    
    
    
    
    
    
   
 


    
    
    
<form id="form1" name="form1" method="post" action="">
  <table width="571" height="183" border="1">
    <tbody>
      <tr>
        <td bgcolor="#D9282B"><input type="submit" name="save" id="submit" value="Verzenden" /></td>
        <td bgcolor="#D9282B"><label for="textfield">:</label>
        <input type="text" name="city" id="city" /></td>
        <td bgcolor="#D9282B"><input type="text" name="username" id="username" /></td>
        <td bgcolor="#D9282B"><input type="text" name="email" id="email" /></td>
      </tr>
      <tr>
        <td bgcolor="#D9282B">ID</td>
        <td bgcolor="#D9282B">city</td>
        <td bgcolor="#D9282B">name</td>
        <td bgcolor="#D9282B">email</td>
      </tr>
      <?php
        while($rows= mysql_fetch_array($exQuery)){?>
      <tr>
        <td><?php echo $rows['userID']; ?></td>
        <td><?php echo $rows['city']; ?></td>
        <td><?php echo $rows['username']; ?></td>
        <td><?php echo $rows['email']; ?></td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
</form>
</body>
</html>
