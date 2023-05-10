<?php require "./sql_conn.php";
    function test_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;

    }

    $errors = array();
    ini_set('display_errors',1);
    ini_set('display_startup_errors',1);
    error_reporting(E_ALL);

    if($_SERVER["REQUEST_METHOD"]=="POST") { // validate first name 
        if(empty($_POST['firstName'])) { $errors['firstName'] = "First name is required."; }
        else { $firstName = test_input($_POST['firstName']); 
            
            // check if name only contains letters and whitespace 
            if (!preg_match("/^[a-zA-Z ]*$/",$firstName)) { $errors['firstName'] = "Only letters and white space allowed"; } } 
        
        
            // validate last name 
        if(empty($_POST['lastName'])) { $errors['lastName'] = "Last name is required."; } 
        else { $lastName = test_input($_POST['lastName']); 
            
            // check if name only contains letters and whitespace 
            if (!preg_match("/^[a-zA-Z ]*$/",$lastName)) { $errors['lastName'] = "Only letters and white space allowed"; } } 
         
         
            // validate email 
        if(empty($_POST['email'])) { $errors['email'] = "Email is required."; } 
        else { $email = test_input($_POST['email']); 
                // check if email is valid i
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { $errors['email'] = "Invalid email format"; } } 
             
            
            // validate password 
        if(empty($_POST['password'])) { $errors['password'] = "Password is required."; } 
        else { $passwords = test_input($_POST['password']); 
                    // check if password meets requirements 
            if (!preg_match("/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/",$passwords)) { $errors['password'] = "Password must contain at least 8 characters, one letter and one number"; } } 
                    
        
        
            // validate phone number 
        if(empty($_POST['PhoneNumber'])) { $errors['PhoneNumber'] = "Phone number is required."; } 
        else { $PhoneNumber = test_input($_POST['PhoneNumber']); 
        // check if phone number is valid 
            if (!preg_match("/^\d{11}$/",$PhoneNumber)) { $errors['PhoneNumber'] = "Invalid phone number format"; } } 
        
        // validate gender 
        if(empty($_POST['Gender'])) { $errors['Gender'] = "Gender is required."; } 
        else { $Gender = test_input($_POST['Gender']); } 
        
        // validate language 
        if(empty($_POST['language'])) { $errors['language'] = "Language is required."; } 
        else { $language = test_input($_POST['language']); } 
        
        // validate zip code 
        if(empty($_POST['ZipCode'])) { $errors['ZipCode'] = "Zip code is required."; } 
        else { $ZipCode = test_input($_POST['ZipCode']); 
            // check if zip code is valid 
            if (!preg_match("/^\d{6}$/",$ZipCode)) { $errors['ZipCode'] = "Invalid zip code format"; } }
            
        // validate about 
        if(empty($_POST['about'])) { $errors['about'] = "About is required."; }
        else { $about = test_input($_POST["about"]);
            // Check if about is too long
                if (strlen($about) > 250) {
                $aboutErr = "About is too long";}
        } 
                            // Validate about

        $conn = OpenCon();
    // If there are no errors, proceed to save to database
        if (empty($errors)) {
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
            if ($conn->query($sql)===TRUE){
                echo "Success";
                // echo '<script>
                //         let notification = document.createElement("div");
                //         notification.textContent = "Data saved successfully";
                //         notification.classList.add("notification");
                //         document.body.appendChild(notification);

                //         setTimeout(function() {
                //             notification.style.display = "none";
                //         }, 5000);</script>';
                header("location: search.php");
                
   

            }else {
                echo "Error: ". $sql . "<br>" . mysqli_error($conn);
            }

            CloseCon($conn);
            
        }else{
            echo "please correct the following errors";
            ?>
  
        
            <form method = "get"></form>
            <link rel = "stylesheet" href = "./validate.css ">
            <?php
            foreach ($errors as $error){
                echo "_".$error . "<br>";
            }
            
            
            // include("index.php");
        }
    }
?>
       <div class='form-style'>
                    <label for ="name">First-Name</label>
                    <div>
                        <input class = "input-style input-wrapper" type = "text" name="firstName" id = "firstName">
                        <small class="errorMessage" id="error" ></small>
                    </div>
                </div>
                <div class='form-style'>
                    <label for ="name">Last-Name</label>
                    <div>
                        <input class = "input-style input-wrapper" type = "text" name="lastName" id = "lastName">
                        <small class="errorMessage" id="error"></small>
                    </div>
                </div>       
                
                <div class='form-style'>
                    <label for ="email">Email</label>
                    <input class = "input-style input-wrapper" type = "email" name="email" id = "email">
                    <small class="errorMessage" id="error" > </small>
                </div>
               
                <div class='form-style'>
                    <label for = "password">Password</label>
                    <input class = "input-style input-wrapper" type = "password" name="password" id = "password">
                    <small class="errorMessage" id="error" ></small>
                </div>

                <div class='form-style'>
                    <label for = "PhoneNumber">Phone Number: </label>
                    <input class = "input-style input-wrapper" type = "tel" name="PhoneNumber" id = "PhoneNumber">
                    <small class="errorMessage" id="error" ></small>
                </div> 

                <div class='form-style'>
                    <label class="name">Gender: </label>
                    <div class="radio_cont input-wrapper">
                    <label for = "male">Male</label>
                    <input class = "input-style" type = "radio" name="Gender" id = "male" value="Male">
                    <label for = "female">Female</label>
                    <input class = "input-style" type = "radio" name="Gender" id = "female" value="Female">
                    <label for = "other">Other</label>
                    <input class = "input-style" type = "radio" name="Gender" id = "other" value="Other">
                    </div>
                   
                    <small class="errorMessage" id="error" ></small>
                
                </div> 
                
                <div class='form-style'>
                    <label for = "language">Language: </label>
                    <select class = "select-style input-wrapper" name="language" id = "language">
                        <option value=""selected disabled hidden> Select Language </option>
                        <?php require "./sql_conn.php";
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
                            // mysqli_close($conn);
                        ?>
                    </select>
                    
                    <small class="errorMessage" id="error" ></small>
                </div> 

                <div class='form-style'>
                    <label for ="ZipCode" >Zip Code: </label>
                    <input class = "input-style input-wrapper" type = "text" name="ZipCode" id = "zipCode">
                    <small  class="errorMessage" id="error" ></small>
                </div> 

                <div class='form-style'>
                    <label for = "about"  >About: </label>
                    <textarea class = "text-style" name="about" id = "about" rows="2" cols="30" placeholder="Write about yourself..."></textarea>
                    <small class="errorMessage" id="error"></small>
                </div> 

                <div class="button-style">

                    <input type = "submit" value="Register" class="submit-btn" id = "btn_submit" name = "btn_submit">
                    <!-- <button type="submit">Register</button> -->
                </div> 
                
            </form>