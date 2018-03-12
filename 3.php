<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Naamloos document</title>
</head>

<body>
<p>
  <?php
$connectDatabase = mysql_connect('localhost:3306','beautymysql','?KLMbart123') or die('something went wrong');
$selectDB = mysql_select_db('admin_',$connectDatabase);

    
    /*file uploading script*/
    $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES["foto"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
    
    
     /*INSERT RECORD SCRIPT*/ 
    
    /*check the condition for set save exist or not*/
    if(isset($_POST['save'])){
        /*variable define*/
        $userName = $_POST['username'];
        $city = $_POST['city'];
        $email = $_POST['email'];
        $password =$_POST['password'];
        $photoName=$_FILES["foto"]["name"];
        
        /*File uploading script*/
         if ($target_file == "images/") {
           echo  $msg = "cannot be empty";
             $uploadOk = 0;
        } // Check if file already exists
        else if (file_exists($target_file)) {
          echo  $msg = "Sorry, file already exists.";
            $uploadOk = 0;
        } // Check file size
        else if ($_FILES["foto"]["size"] > 5000000) {
          echo  $msg = "Sorry, your file is too large.";
            $uploadOk = 0;
        } // Check if $uploadOk is set to 0 by an error
        else if ($uploadOk == 0) {
           echo $msg = "Sorry, your file was not uploaded.";

            // if everything is ok, try to upload file
        } else {
           // echo 'success';
            if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
              echo  $msg = "The file " . basename($_FILES["foto"]["name"]) . " has been uploaded.";
            }
        }
        
        /*End*/
        $key = md5(microtime().rand());
        $stpass = $key.''.$password;
         $pass =md5($stpass);
           $hashed_password = password_hash($ps, PASSWORD_DEFAULT);
        $query = "INSERT INTO `users` (`userID`, `username`, `email`, `city`,`photo`,`password`) VALUES
        (NULL, '".$userName."', '".$email."', '".$city."','".$photoName."','".$hashed_password."')";
       $exQuery = mysql_query($query,$connectDatabase); 
        
        if($exQuery){
            echo "Record successfully inserted.";
           // redirect
        }
    }
   
    $sqlQuery="SELECT *FROM users ";
 $exQuery = mysql_query($sqlQuery,$connectDatabase);
    
?>
    
    
    
    
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table width="571" height="183" border="1">
    <tbody>
      <tr>
        <td bgcolor="#D9282B">&nbsp;</td>
        <td bgcolor="#D9282B"><input type="submit" name="save" id="submit" value="Verzenden" /></td>
        <td bgcolor="#D9282B"><input type="text" name="city" id="city" /></td>
        <td bgcolor="#D9282B"><input type="text" name="username" id="username" /></td>
        <td bgcolor="#D9282B"><input type="text" name="email" id="email" /></td>
        <td bgcolor="#D9282B">
        <input type="file" name="foto" id="foto" /></td>
        <td bgcolor="#D9282B"><input type="password" name="password" id="password" /></td>
      </tr>
      <tr>
        <td bgcolor="#D9282B">&nbsp;</td>
        <td bgcolor="#D9282B">ID</td>
        <td bgcolor="#D9282B">city</td>
        <td bgcolor="#D9282B">name</td>
        <td bgcolor="#D9282B">email</td>
        <td bgcolor="#D9282B">picture</td> 
        <td bgcolor="#D9282B">password</td>
      </tr>
      <?php
        
        while($rows= mysql_fetch_array($exQuery)){
       $ps =$rows['password'];
             $qDecoded      = rtrim( mcrypt_decrypt( MCRYPT_RIJNDAEL_256, md5( $ps ), base64_decode( $q ), MCRYPT_MODE_CBC, md5( md5( $ps ) ) ), "\0");
        ?>
      <tr>
        <td>delete</td>
        <td><?php echo $rows['userID']; ?></td>
        <td><?php echo $rows['city']; ?></td>
        <td><?php echo $rows['username']; ?></td>
        <td><?php echo $rows['email']; ?></td>
        <td><?php  echo $ps =$rows['password']; ?></td>
        <td><?php echo $qDecoded; ?></td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
</form>
</body>
</html>