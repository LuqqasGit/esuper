function signupValidate(){
  var formReg = document.getElementById("signup");

  // Email validate
  var selectedEmail = formReg.querySelector('input[name="email"]');
  selectedEmail.addEventListener("blur", emailValidate);
  function emailValidate() {
    var emailError = document.getElementById("email-validate-div");
    if (/^\w+([\.-]?\ w+)*@\w+([\.-]?\ w+)*(\.\w{2,3})+$/.test(selectedEmail.value)){
      emailError.className = "signup-validate-div-hidden";
    } else {
      selectedEmail.value = "";
      emailError.className = "signup-validate-div";
    }
  }

  // First name validate
  var selectedName = formReg.querySelector('input[name="fname"]');
  selectedName.div = "fname-validate-div";
  selectedName.addEventListener("blur", textFieldValidate);

  // Last name validate
  var selectedLname = formReg.querySelector('input[name="lname"]');
  selectedLname.div = "lname-validate-div";
  selectedLname.addEventListener("blur", textFieldValidate);

  // User name validate (signup)
  var selectedUname = formReg.querySelector('input[name="username"]');
  selectedUname.div = "uname-validate-div";
  selectedUname.addEventListener("blur", textFieldValidate);

  function textFieldValidate(evt) {
    var errorDiv = document.getElementById(evt.target.div);
    if (this.value){
      errorDiv.className = "signup-validate-div-hidden";
    } else {
      this.value = "";
      errorDiv.className = "signup-validate-div";
    }
  }

  // // Submit button check
  // var submitButton = document.querySelector('.signup-submit');
  // submitButton.addEventListener("click", submitFunc);
  // function submitFunc(){
  //
  // }

} // End formValidate


function loginValidate(){
var formReg = document.getElementById("login");
// User name validate (login)
var selectedUlogin = formReg.querySelector('input[name="userlogin"]');
console.log(selectedUlogin[0]);
selectedUlogin.div = "userlogin-validate-div";
selectedUlogin.addEventListener("blur", textFieldValidate);
}

window.onload = signupValidate;
// window.onload = loginValidate;
