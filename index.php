<?php
$name = $email = "";
$name_err = $email_err = "";
$output_name = $output_email = "";

function secure_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

if($_SERVER['REQUEST_METHOD'] == "POST") {

    if(empty($_POST['name'])) {

        $name_err = "Your Name is Required";
        
    }
    else{
        $name = secure_input($_POST['name']);

        if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
            $name_err = "Only letters and white space allowed";
          }else{
            $output_name = secure_input($_POST['name']);
          }
    }
    
    if(empty($_POST['email'])) {
    
        $email_err = "Your Email is Required";
        
    }
    else{
        $email = secure_input($_POST['email']);

        if (!filter_var($email ,  FILTER_VALIDATE_EMAIL)) {
            $email_err = "Your Email is not correct. Please Enter Your correct email.";
        } else{
            $output_email = secure_input($_POST['email']);
          }

        
    }

}


?>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">

Name: <input type="text" name = "name" value = "<?php echo $name; ?>">
<span class="error">* <?php echo $name_err;?></span><br><br>

Email: <input type="text" name = "email" value = "<?php echo $email; ?>">
<span class="error">* <?php echo $email_err;?></span><br><br>

<input type="submit" value="Submit">


</form>

<br><br>

<h2>Your Input</h2>
Name: <?php echo $output_name; ?><br><br>
Email: <?php echo $output_email; ?><br><br>