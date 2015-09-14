<?php 

    // user_form.php
    
    // ERRORid
    $email_error = "";
    $password_error = "";
    
    $name_error = "";
    
    // Muutujad väärtustega
    $email = "";
    $password = "";
    
    
    // kontrolli ainult siis kui kasutaja vajutab logi sisse nuppu
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        
        // kontrollin kas muutuja $_POST["login"], ehk login nupp
        if(isset($_POST["login"])){
            
            //Kontrollime kasutaja e-posti, et see ei ole tühi
            if(empty($_POST["email"])) {
                $email_error = "Ei saa olle tühi";
            } else {
                
                // annan väärtuse
                $email = test_input($_POST["email"]);
                
            }
            
            // Kontrollime parooli
            if(empty($_POST["password"])) {
                $password_error = "Ei saa olle tühi";
            } else {
                $password = test_input($_POST["password"]);
            }
            
            
        } elseif(isset($_POST["create"])){
            
            // siin kontrollida create vormi väljasid
            
        }
        
    }
    
    function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

?>
<?php 
    // lehe nimi
    $page_title = "Login leht";
    
    // faili nimi
    $page_file_name = "login.php";
    
?>
<?php require_once("../header.php"); ?>  
    
    <h2>Login</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <input name="email" type="email" placeholder="E-post" value="<?php echo $email; ?>" >* <?php echo $email_error; ?> <br><br>
        <input name="password" type="password" placeholder="Parool" >* <?php echo $password_error; ?><br><br>
        
        <input name="login" type ="submit" value="Logi sisse">
    </form>
    
    <h2>Create user</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <input name="name" type="text" placeholder="Nimi" >* <?php echo $name_error; ?> <br><br>
        <input name="create" type ="submit" value="Create user">
    </form>
        
<?php require_once("../footer.php"); ?>  