// const form = document.getElementById('form');
// const first_name = document.getElementById('firstName');
// const last_name = document.getElementById('lastName');
// const email = document.getElementById('email');
// const password= document.getElementById('password');
// const phoneNumber = document.getElementById('phoneNumber');
// const Gender = document.getElementByName('gender');
// const language= document.getElementById('language');
// const zipCode = document.getElementById('zipCode');
// const about= document.getElementById('about');

form.addEventListener('Register', (e) => {
    e.preventDefault();

    ValidateInputs();
    
});
function setError(element, message){
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');

    errorDisplay.innerText = message;
    inputControl.classList.add('error');
}
function validateForm(){
    let firstName = document.forms["myForm"]["firstName"].value;
    let lastName = document.forms["myForm"]["lastName"].value;
    let phoneNumber = document.forms["myForm"]["phoneNumber"].value;
    let email = document.forms["myForm"]["email"].value;
    let gender = document.querySelector('input[name="gender"]:checked');
    let language = document.forms["myForm"]["language"].value;
  
    if (firstName == "" || lastName == "" || phoneNumber == "" || email == "" || !gender || language == "") {
      alert("All fields must be filled out");
      setError(firstName, 'First Name is required');
      return false;
    }
}
 

  // Add other necessary validations here
