<?php require "./sql_conn.php";
    function test_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;

    }
    $firstNameerror=$lastNameerror=$emailerror=$passworderror=$PhoneNumbererror=$Gendererror=$languageerror=$ZipCodeerror=$abouterror="";

    $errors = array();

    if($_SERVER["REQUEST_METHOD"]=="POST") { // validate first name 
        if(empty($_POST['firstName'])) { $firstNameerror = "First name is required."; 
            $errors["firstName"] = "First name is required.";}
       
            
        
        
            // validate last name 
        if(empty($_POST['lastName'])) { $lastNameerror= "Last name is required."; 
            $errors["lastName"] = "Last name is required."; } 
       
            
     
         
         
            // validate email 
        if(empty($_POST['email'])) { $emailerror= "Email is required.";
            $errors["email"] =  "Email is required."; } 
 
             
            
            // validate password 
        if(empty($_POST['password'])) { $passworderror = "Password is required."; 
            $errors["password"] = "Password is required.";} 
        
        
        
            // validate phone number 
        if(empty($_POST['PhoneNumber'])) { $PhoneNumbererror = "Phone number is required."; 
            $errors["PhoneNumber"] = "Phone number is required.";} 
        
        // validate gender 
        if(empty($_POST['Gender'])) { $Gendererror = "Gender is required.";
            $errors["Gender"] = "Gender is required."; } 
        
        // validate language 
        if(empty($_POST['language'])) { $languageerror = "Language is required."; 
            $errors["language"] = "Language is required.";  } 
        
        
        // validate zip code 
        if(empty($_POST['ZipCode'])) { $ZipCodeerror = "Zip code is required.";
            $errors["ZipCode"] = "Zip code is required.";} 
            
        // validate about 
        if(empty($_POST['about'])) { $abouterror = "About is required.";
            $errors["about"] = "About is required."; }
       
                            // Validate about

        $conn = OpenCon();
    // If there are no errors, proceed to save to database
        foreach ($errors as $error){
            echo "_". $error . "<br>";
        }
        if (empty($errors) ) {
            $firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
            $lastName = mysqli_real_escape_string($conn, $_POST['lastName']);
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $passwords = mysqli_real_escape_string($conn, $_POST['password']);
            $PhoneNumber = mysqli_real_escape_string($conn, $_POST['PhoneNumber']);
            $Gender = mysqli_real_escape_string($conn, $_POST['Gender']);
            $language = mysqli_real_escape_string($conn, $_POST['language']);
            $ZipCode = mysqli_real_escape_string($conn, $_POST['ZipCode']);
            $about = mysqli_real_escape_string($conn, $_POST['about']);
            // Save data to database
            
            $sql = "INSERT INTO data_table (First_Name , Last_Name , Email , Password, Phone, Gender, language, ZipCode,  	About ) VALUES ('$firstName', '$lastName', '$email', '$passwords','$PhoneNumber' , '$Gender', '$language', '$ZipCode', '$about')";
            // if ($conn->query($sql)===TRUE){
            if(mysqli_query($conn, $sql)){
                echo "Success";
                header("location: search.php");
                
   

            }else {
                echo "Error: ". $sql . "<br>" . mysqli_error($conn);
            }

            CloseCon($conn);
            
        }else{

        }
    }
?>
      
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Form</title>
        <link rel = "stylesheet" href = "./style.css">
    </head>
    <body>
        <div class = "form-properties">
            <div class="img-container">
                    <div class ="form-header" ><img src="./passport.jpg" class = "img-style" alt = "My passport"></div>
                    <h1>REGISTRATION FORM</h1>
            </div>
            <form id = "form"  name= "myForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                <div class='form-style'>
                    <label for ="name">First-Name</label>
                    <div>
                        <input class = "input-style input-wrapper" type = "text" name="firstName" id = "firstName">
                        <small class="errorMessage" id="error" ></small>
                        <span class="errorMessage" ><?php echo  $firstNameerror; ?></span>
                    </div>
                </div>
                <div class='form-style'>
                    <label for ="name">Last-Name</label>
                    <div>
                        <input class = "input-style input-wrapper" type = "text" name="lastName" id = "lastName">
                        <small class="errorMessage" id="error"></small>
                        <span class="errorMessage" ><?php echo  $lastNameerror; ?></span>
                    </div>
                </div>       
                
                <div class='form-style'>
                    <label for ="email">Email</label>
                    <div>
                        <input class = "input-style input-wrapper" type = "email" name="email" id = "email">
                        <small class="errorMessage" id="error" > </small>
                        <span class="errorMessage" ><?php echo  $emailerror; ?></span>
                    </div>
                </div>
               
                <div class='form-style'>
                    <label for = "password">Password</label>
                    <div>
                       <input class = "input-style input-wrapper" type = "password" name="password" id = "password">
                        <small class="errorMessage" id="error" ></small>
                        <span class="errorMessage" ><?php echo  $passworderror; ?></span>
                    </div>
                </div>

                <div class='form-style'>
                    <label for = "PhoneNumber">Phone Number: </label>
                    <div>
                        <input class = "input-style input-wrapper" type = "tel" name="PhoneNumber" id = "PhoneNumber">
                        <small class="errorMessage" id="error" ></small>
                        <span class="errorMessage" ><?php echo  $PhoneNumbererror; ?></span>
                    </div>
                </div> 

                <div class='form-style'>
                    <label class="name">Gender: </label>
                    <div class="radio_cont input-wrapper">
                        <label for = "male">Male</label>
                        <input class = "input-style" type = "radio" name="Gender" id = "male" value="Male" onclick="genderValidation()">
                        <label for = "female">Female</label>
                        <input class = "input-style" type = "radio" name="Gender" id = "female" value="Female" onclick="genderValidation()">
                        <label for = "other">Other</label>
                        <input class = "input-style" type = "radio" name="Gender" id = "other" value="Other" onclick="genderValidation()">
                        <small class="errorMessage" id="error" ></small>
                        <span class="errorMessage" ><?php echo  $Gendererror; ?></span>
                    </div>
                </div> 
                
                <div class='form-style'>
                    <label for = "language">Language: </label>
                    <div>
                    <select class = "select-style input-wrapper" name="language" id = "language" onchange="languageValidate()" on="languageValidate()">
                        <option value=""selected disabled hidden> Select Language </option>
                        <?php 
                             $server = "localhost";
                             $user = 'root';
                             $password = '';
                             $db_name = 'Form_db';
                             $conn = new mysqli($server, $user, $password, $db_name) or die("Connection Failed: %s/n".$conn -> error);
                            $sql = "SELECT * FROM languages";
                            $result = $conn ->query($sql);
                            //create options
                            while($row = $result->fetch_assoc()){
                                echo"<option value='".$row["name"]."'>".$row["name"]. "</option>";
                            }
                            mysqli_close($conn);
                        ?>
                    </select>
                    
                    <small class="errorMessage" id="error" ></small>
                    <span class="errorMessage" ><?php echo  $languageerror; ?></span>
                    </div>
                </div> 

                <div class='form-style'>
                    <label for ="ZipCode" >Zip Code: </label>
                    <div>
                        <input class = "input-style input-wrapper" type = "text" name="ZipCode" id = "zipCode">
                        <small  class="errorMessage" id="error" ></small>
                        <span class="errorMessage" ><?php echo  $ZipCodeerror; ?></span>
                    </div>
                </div> 

                <div class='form-style'>
                    <label for = "about"  >About: </label>
                    <div>
                        <textarea class = "text-style input-wrapper" name="about" id = "about" rows="2" cols="30" placeholder="Write about yourself..."></textarea>
                        <small class="errorMessage" id="error"></small>
                        <span class="
                        errorMessage" ><?php echo  $abouterror; ?></span>
                    </div>
                </div> 

                <div class="button-style">
                    <input type = "submit" value="Register" class="submit-btn" id = "btn_submit" name = "btn_submit">
                    <!-- <button type="submit">Register</button> -->
                </div> 
                
            </form>
            
        </div>
        <script type="text/javascript" src="./validate.js"> </script>    
    </body>
</html>