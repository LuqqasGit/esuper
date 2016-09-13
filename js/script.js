function formValidate(){
  var formReg = document.getElementById("signup");

  // Functions

  function textFieldValidate(evt) {
    var errorDiv = document.getElementById(evt.target.div);
    if (this.value){
      errorDiv.className = "signup-validate-div-hidden";
      console.log("tru");
    } else {
      console.log("fal");
      this.value = "";
      errorDiv.className = "signup-validate-div";
    }
  }

  function emailValidate() {
    var emailError = document.getElementById("email-validate-div");
    if (/^\w+([\.-]?\ w+)*@\w+([\.-]?\ w+)*(\.\w{2,3})+$/.test(selectedEmail.value)){
      emailError.className = "signup-validate-div-hidden";
    } else {
      selectedEmail.value = "";
      emailError.className = "signup-validate-div";
    }
  }

  function passwordValidate(){
    var passError = document.getElementById("pass-validate-div");
    if (/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/.test(selectedPassword.value)){
      console.log("true");
    }else {
      console.log("false");
    }
  }



  // Email validate
  var selectedEmail = formReg.querySelector('input[name="email"]');
  selectedEmail.addEventListener("blur", emailValidate);

  // First name validate
  var selectedName = formReg.querySelector('input[name="fname"]');
  selectedName.div = "fname-validate-div";
  selectedName.addEventListener("blur", textFieldValidate);

  // Last name validate
  var selectedLname = formReg.querySelector('input[name="lname"]');
  selectedLname.div = "lname-validate-div";
  selectedLname.addEventListener("blur", textFieldValidate);

  // User name validate
  var selectedUname = formReg.querySelector('input[name="username"]');
  selectedUname.div = "uname-validate-div";
  selectedUname.addEventListener("blur", textFieldValidate);

  // Password Validate
  var selectedPassword = formReg.querySelector('input[name="password1"]');
  selectedPassword.addEventListener("blur", passwordValidate);


} // End formValidate
window.onload = formValidate;
