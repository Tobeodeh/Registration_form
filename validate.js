"use strict"

console.log("strimg");

const form = document.getElementById('form');
const firstName = document.getElementById('firstName');
const lastName = document.getElementById('lastName');
const email = document.getElementById('email');
const password= document.getElementById('password');
const phoneNumber = document.getElementById('PhoneNumber');
const male = document.getElementById("male");
const female = document.getElementById("female");
const other = document.getElementById("other");
const language= document.getElementById('language');
const zipCode = document.getElementById('zipCode');
const about= document.getElementById('about');

form.addEventListener('submit', (e) => {
    e.preventDefault();

    validateInputs();
    
});

function setError(input, message){
    const inputControl = input.parentElement;
    const errorDisplay = inputControl.querySelector('small');

    errorDisplay.innerText = message;
    inputControl.classList.add('error');
    inputControl.className = 'error';
};

function setSuccess (input) {
    const inputControl = input.parentElement;
    const errorDisplay = inputControl.querySelector('small');

    errorDisplay.innerText = '';
    inputControl.classList.add('success');
    inputControl.classList.remove('error');
};

function validateInputs(){
    firstNameValidate();
    LastnameValidate();
    emailValidate();
    phonenumberValidate();
    passwordValidate();
    languageValidate();
    genderValidation();
    ZipcodeValidate();
    aboutValidate();
      
    console.log(document.querySelectorAll('.success input').length );

    if (document.querySelectorAll('.success input').length ===9){
        document.getElementById('form').submit();
    
    }

}
    // validate functions
   

function firstNameValidate(){
    const firstNameValue = firstName .value.trim();
    if(firstNameValue === ''){
        setError(firstName, 'First Name is required');
        return false;
    } else{
        setSuccess(firstName);
        return true;
    }
}

    
function LastnameValidate(){
    const lastNameValue = lastName.value.trim();
    if(lastNameValue === ''){
        setError(lastName, 'Last Name is required');
    }else{
        setSuccess(lastName);}

        
}

const IsEmailValid = email => {
    const re = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    return re.test(String(email).toLowerCase());

}




    
const IsNumberValid = phoneNumber => {
    let num = /^\d{11}$/;
    if(phoneNumber.value.match(num)){
        return true;
    }
}
function emailValidate(){
    const emailValue = email.value.trim();
    if(emailValue === ''){
        setError(email, 'E-mail is required');
    } else if(!IsEmailValid(emailValue)){
        setError(email, 'Enter a valid E-mail');
    }else{
        setSuccess(email);

    }
}

function phonenumberValidate(){
    const phoneNumberValue = phoneNumber.value.trim();
    if(phoneNumberValue=== ''){
        setError(phoneNumber, 'Phone number is required');
    } else if(phoneNumberValue.length < 11){
        setError(phoneNumber, 'Phone number should be 11 digits');
    }else if (!IsNumberValid(phoneNumber)){
        setError(phoneNumber, 'Phone number is not valid');
    }else{
        setSuccess(phoneNumber);

    }
}



function passwordValidate(){
    const passwordValue = password.value.trim();
    if(passwordValue === ""){
        setError(password, "password is required")
    }else{
        setSuccess(password)
    }
}


function genderValidation() {
    if (
        male.checked == false &&
        female.checked == false &&
        other.checked == false
    ) {
        setError(male, "Gender is Required");
        
        return false;
        // valid = true
    } else {
        setSuccess(male);
        return true;
    }
    }
    
      //language validation
     
    
   
     
     
      
    function languageValidate()  {
        const languageValue = language.value;
        if (languageValue === "") {
            setError(language, "Please select a language");
            
            return false;
          } else {
            setSuccess(language);
            console.log("selected");
            return true;
        }
    }
       

    function aboutValidate() {
        const aboutValue = about.value.trim();
        if(aboutValue=== ''){
            setError(about, 'About is required');
        } else if(aboutValue.length > 250){
            setError(zipCode, 'About is invalid');
        }else{
            setSuccess(about)
        }
    }
        

      

    function ZipcodeValidate(){
        const zipCodeValue = zipCode.value.trim();
        if(zipCodeValue=== ''){
            setError(zipCode, 'ZipCode is required');
        } else if(zipCodeValue.length > 6){
            setError(zipCode, 'ZipCode is invalid');
        }else{
            setSuccess(zipCode)}
    }
       
      
   

    //input click validation
    firstName.addEventListener("input",firstNameValidate);
    lastName.addEventListener("input",LastnameValidate);
    email.addEventListener("input",emailValidate);
    password.addEventListener("input",passwordValidate);
    phoneNumber.addEventListener("input",phonenumberValidate);
    // language.addEventListener("input",languageValidate);
    zipCode.addEventListener("input",ZipcodeValidate);
    about.addEventListener("input",aboutValidate);
    // firstName.addEventListener("input",firstNameValidate);
    






