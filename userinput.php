<!DOCTYPE html>
<html>
<head>
<head lang="en">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Stock Transaction System</title>
  <link rel="stylesheet" href="homepage2.css" /> 
  <link rel="stylesheet" href="userinput.css" />  
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
<?php

ini_set('display_errors',1);

$nameErr = $emailErr = $currencyErr = $numErr = $priceErr = $stateErr = "";
$name = $email = $currency = $num = $price =$state = "";
$Errcode = 0;

 $states = array("AL"=>"Alabama","AK"=>"Alaska","AZ"=>"Arizona","AR"=>"Arkansas",
 "CA"=>"California","CO"=>"Colorado","CT"=>"Connecticut","DE"=>"Delaware",
"FL"=>"Florida","GA"=>"Georgia","HI"=>"Hawaii","ID"=>"Idaho",
"IL"=>"Illinois","IN"=>"Indiana","IA"=>"Iowa","KS"=>"Kansas","KY"=>"Kentucky");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $formOption = $_POST ['state'];

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
        $sql = "INSERT INTO Stocktransaction (name, email, num, price, currency, state) VALUES (?,?,?,?,?,?)";

        if( $stmt = $conn->prepare($sql)){
             $stmt->bind_param("ssssss", $name , $email, $num ,$price,$currency ,$state);
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





function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<p><span class="error">Fields with * are required.</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
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
        <option value="AL- Alabama">Alabama</option>

        <option value="AK - Alaska">Alaska</option>

        <option value="AZ - Arizona">Arizona</option>

        <option value="AR - Arkansas">Arkansas</option>

        <option value="CA - California">California</option>

        <option value="CO - Colorado">Colorado</option>

        <option value="CT - Connecticut">Connecticut</option>

        <option value="DE - Delaware">Delaware</option>

        <option value="FL - Florida">Florida</option>

        <option value="GA - Georgia">Georgia</option>

        <option value="HI - Hawaii">Hawaii</option>

        <option value="ID - Idaho">Idaho</option>

        <option value="IL - Illinois">Illinois</option>

        <option value="IN - Indiana">Indiana</option>

        <option value="IA - Lowa">Lowa</option>

        <option value="KS - Kansas">Kansas</option>

        <option value="KY - Kentucky">Kentucky</option>

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