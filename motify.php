<!DOCTYPE html>
<html>
<head lang="en">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8">
  <title>Stock Transaction System</title>
   <link rel="stylesheet" href="displaydata.css" />
   <link rel="stylesheet" href="homepage2.css" /> 
   <script type="text/javascript" language="javascript" src="userinputvalidate.js"></script> 
</head>
<body>
<div class="header">
  <h1>Stock Market</h1>
</div>

<div class="row">

<div class="col-3 col-m-3 menu">
  <ul>
    <li><a href="homepage2.html">Home</a></li>
    <li><a href="http://ec2-54-69-58-81.us-west-2.compute.amazonaws.com/project2/displaydata.php">Review Records</a></li>
    <li><a href="http://ec2-54-69-58-81.us-west-2.compute.amazonaws.com/project2/userinput.php">Register</a></li>
    <li><a href="#">Companies</li>
  </ul>
</div>
  <title>User Input</title>
  <h4>Welcome to Stock Market</h4>
  <aside>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" id = "mainForm">
      <fieldset>
        <legend>User Input Feilds</legend>
<?php

ini_set('display_errors',1);

$nameErr = $emailErr = $currencyErr = $numErr = $priceErr = $stateErr = "";
$id=$name = $email = $currency = $num = $price =$state = "";
$Errcode = 0;

 $states = array("AL"=>"Alabama","AK"=>"Alaska","AZ"=>"Arizona","AR"=>"Arkansas",
 "CA"=>"California","CO"=>"Colorado","CT"=>"Connecticut","DE"=>"Delaware",
"FL"=>"Florida","GA"=>"Georgia","HI"=>"Hawaii","ID"=>"Idaho",
"IL"=>"Illinois","IN"=>"Indiana","IA"=>"Iowa","KS"=>"Kansas","KY"=>"Kentucky");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["id"])) {
    $Errcode +=1 ;
  } else {
    $id = test_input($_POST["id"]);

  }


  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
    $Errcode +=1 ;
  } else {
    $name = test_input($_POST["name"]);
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Required only letters or white space"; 
       $Errcode += 1 ;
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
    $Errcode += 1 ;
  } else {
    $email = test_input($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid ingredient, example: 123@xxx.xxx";
      $Errcode += 1 ; 
    }
  }

  if (empty($_POST["num"])) {
    $numErr = "numbers is required";
    $Errcode += 1 ;
  } else {
    $num = test_input($_POST["num"]);
    if (!preg_match("/^[0-9]+$/",$num)) {
      $numErr = "Only numbers allowed";
      $Errcode += 1 ; 
    }
  }

  if (empty($_POST["price"])) {
    $priceErr = "price is required";
    $Errcode += 1 ;
  } else {
    $price = test_input($_POST["price"]);
    if (!preg_match("/^[0-9]+$/", $price)) {
      $priceErr = "Only numbers allowed";
      $Errcode += 1 ;
    }
  }
  
  if (empty($_POST["currency"])) {
    $currencyErr = "Currency is required";
    $Errcode += 1 ;
  } else {
    $currency = test_input($_POST["currency"]);
    
  }

  if (empty($_POST["state"])) {
     $stateErr = "State is required";
      $Errcode += 1 ;
  } 
    else {$state = test_input($_POST["state"]);
   
 // check if state is valid uppercase abbv. and two letters

  }


      if($Errcode==0){
        
        if (isset($_POST['submit']))
      { 
        $servername = "localhost";
        $username = "root";
        $password = "3wmV4iVKvdF9";
        $Databasename = "myDBbiyi";


        // Create connection
        $conn = new mysqli($servername, $username, $password, $Databasename);

        // Check connection
         if ($conn->connect_error) {
             die("Connection failed: " . $conn->connect_error);
        }
                            //Stocktransaction
        $sql = "update Stocktransaction set name=? , email=? , num =? , price =? , currency= ? , state=? where id= ? ";

        if( $stmt = $conn->prepare($sql)){
             $stmt->bind_param("ssssssi", $name , $email, $num ,$price,$currency ,$state,$id);
             $stmt->execute(); 
             $conn->close();
             header('Location: http://ec2-54-69-58-81.us-west-2.compute.amazonaws.com/project2/displaydata.php',TRUE, 302);
            //rest of code here
        }else{
           //error !! don't go further
           var_dump($conn->error);
        }

       
       
       
       
        
        // if (!$success) {
        //             $addmsg = "Update failed: $query<br>" .
        //   $conn->error . "<br><br>";
        // }else{
        //     echo "<script><alert>Update successfully</alert></script>";
        //     }
        

        // Update
   // if (isset($_POST['id'])  &&
     // isset($_POST['name'])  &&
      //isset($_POST['email'])  &&
      //isset($_POST['currency'])  &&
      //isset($_POST['num'])  &&
      //isset($_POST['price'])  &&
      //isset($_POST['state']))

    //{
      //$id=get_post($conn, 'id');
      //$name=get_post($conn, 'name');
      //$email=get_post($conn, 'email');
      //$currency=get_post($conn, 'currency');
      //$num=get_post($conn, 'num');
      //$price=get_post($conn, 'price');
      //$state+get_post($conn, 'state');

      //if ($isValid != false){
        //$query="INSERT INTO stocktransaction (id, name, email, currency, num, price, state)
        //VALUE"."('$id', '$name', '$email', '$currency', '$num', '$price', '$state')";
      //}
      //$result=$conn->query($query);
      //if (!$result) echo "INSERT failed: $query<br>" .
        //$conn->error."<br><br>"
    //}

//$conn->close();

//function get_post($conn, $var_dump(expression)){
  //reutrn $conn->real_escape_string($_POST[$var]);
//}
       
      }
    }
}
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET["id"];

    //----------------------------------------RETRIEVE RECORDS - DATABASE--------------------------------------------------
    //Obtain login credentials
    //$Id = $_GET['id'];
    $servername = "localhost";
    $username = "root";
    $password = "3wmV4iVKvdF9";
    $Databasename = "myDBbiyi";


    // Create connection
    $conn = new mysqli($servername, $username, $password, $Databasename);

    // Check connection
     if ($conn->connect_error) {
         die("Connection failed: " . $conn->connect_error);
    }



    //Retrieve records
    $query  = "SELECT * FROM stocktransaction where id = ?" ;

    $stmt = $conn->prepare($query);
    //echo "[debug]id is: ". $id ;    
    $stmt->bind_param("i", $id);
    $success= $stmt->execute();

    
    $stmt->bind_result($Id,  $name , $email, $num, $price , $currency, $state);
    
    $stmt->fetch();
    //echo "[debug]currency is: ". $currency ;    
     
    //Close connection
    $conn->close();
}




function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<p><span class="error">Fields with * are required.</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
<input type="hidden" name="id" value="<?php echo $id;?>">
<table>
  <tr><td>UserName: </td><td><input type="text" name="name" value="<?php echo $name;?>"></td><td><span class="error">* <?php echo $nameErr;?></span></td></tr>
   
  <tr><td>E-mail: </td><td><input type="text" name="email" value="<?php echo $email;?>"></td><td><span class="error">* <?php echo $emailErr;?></span></td></tr>   

    <tr><td>Phone Number: </td><td><input type="text" name="num" value="<?php echo $num;?>"></td><td><span class="error">* <?php echo $numErr;?></span></td></tr>    

      <tr><td>Stock Price: </td><td><input type="text" name="price" value="<?php echo $price;?>"></td><td> <span class="error">* <?php echo $priceErr;?></span></td></tr>    

        <tr><td>Currency: </td><td><input type="radio" name="currency" <?php if (isset($currency) && $currency=="dollars") echo "checked";?> value="dollars">Dollars<input type="radio" name="currency" <?php if (isset($currency) && $currency=="RMB") echo "checked";?> value="RMB">RMB</td><td><span class="error">* <?php echo $currencyErr;?></span</td></tr>     

     <tr>

      <td>State: </td>
      <td>
      <select name="state">
        <option value=""> </option>
        <option value="AL- Alabama" <?php if (isset($state) && $state=="AL- Alabama") echo "selected";?>>Alabama</option>

        <option value="AK - Alaska" <?php if (isset($state) && $state=="AK - Alaska") echo "selected";?>>Alaska</option>

        <option value="AZ - Arizona"<?php if (isset($state) && $state=="AZ - Arizona") echo "selected";?>>Arizona</option>

        <option value="AR - Arkansas"<?php if (isset($state) && $state=="AR - Arkansas") echo "selected";?>>Arkansas</option>

        <option value="CA - California"<?php if (isset($state) && $state=="CA - California") echo "selected";?>>California</option>

        <option value="CO - Colorado"<?php if (isset($state) && $state=="CO - Colorado") echo "selected";?>>Colorado</option>

        <option value="CT - Connecticut"<?php if (isset($state) && $state=="CT - Connecticut") echo "selected";?>>Connecticut</option>

        <option value="DE - Delaware"<?php if (isset($state) && $state=="DE - Delaware") echo "selected";?>>Delaware</option>

        <option value="FL - Florida"<?php if (isset($state) && $state=="FL - Florida") echo "selected";?>>Florida</option>

        <option value="GA - Georgia"<?php if (isset($state) && $state=="GA - Georgia") echo "selected";?>>Georgia</option>

        <option value="HI - Hawaii"<?php if (isset($state) && $state=="HI - Hawaii") echo "selected";?>>Hawaii</option>

        <option value="ID - Idaho"<?php if (isset($state) && $state=="ID - Idaho") echo "selected";?>>Idaho</option>

        <option value="IL - Illinois"<?php if (isset($state) && $state=="IL - Illinois") echo "selected";?>>Illinois</option>

        <option value="IN - Indiana"<?php if (isset($state) && $state=="IN - Indiana") echo "selected";?>>Indiana</option>

        <option value="IA - Lowa"<?php if (isset($state) && $state=="IA - Lowa") echo "selected";?>>Lowa</option>

        <option value="KS - Kansas"<?php if (isset($state) && $state=="KS - Kansas") echo "selected";?>>Kansas</option>

        <option value="KY - Kentucky"<?php if (isset($state) && $state=="KY - Kentucky") echo "selected";?>>Kentucky</option>

      </select>
      </td>
      <td><span class="error">* <?php echo  $stateErr;?></span></td></td>
    </tr>
    <tr> <td><input type="submit" name="submit" value="Submit"></td> <td><input type="reset" /></td></tr>
  

</table> 
</form>

       
        <p>
          <label style="color:red; float:right;" >*</label><label style="color:red; float:right;">Require fill out</label>
        </p>

      </fieldset>
  </aside>


<div class="footer">
    <p><a href="homepage.html">Home</a> | <a href="#">About us</a> | <a href="#">Contract us</a></p>
    <p><em>Copyright &copy; 2016 Turbo Zone</em></p>
</div>

</body>
</html>