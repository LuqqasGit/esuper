window.onload = function() {
  var btnNav = document.getElementById('toggle-nav-button');
  var navDiv = document.getElementById('nav-div');
  var formLogin = document.getElementById("login");
  var formSignUp = document.getElementById("signup");
  if (formSignUp) {
    var selectedEmail = formSignUp.querySelector('input[name="email"]');
    var selectedName = formSignUp.querySelector('input[name="fname"]');
    var selectedLname = formSignUp.querySelector('input[name="lname"]');
    var selectedUname = formSignUp.querySelector('input[name="username"]');
  }
  if (formLogin) {
    var selectedUlogin = formLogin.querySelector('input[name="userlogin"]');
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

  function textFieldValidate(evt) {
    var errorDiv = document.getElementById(evt.target.div);
    if (this.value){
      errorDiv.className = "signup-validate-div-hidden";
    } else {
      this.value = "";
      errorDiv.className = "signup-validate-div";
    }
  }

  function signupValidate() {
    // Email validate
    selectedEmail.addEventListener("blur", emailValidate);

    // First name validate
    selectedName.div = "fname-validate-div";
    selectedName.addEventListener("blur", textFieldValidate);

    // Last name validate
    selectedLname.div = "lname-validate-div";
    selectedLname.addEventListener("blur", textFieldValidate);

    // User name validate
    selectedUname.div = "uname-validate-div";
    selectedUname.addEventListener("blur", textFieldValidate);

    // // Submit button check
    // var submitButton = document.querySelector('.signup-submit');
    // submitButton.addEventListener("click", submitFunc);
    // function submitFunc(){
    //
    // }

  } // End formValidate()

  function loginValidate() {
  // User name validate (login)
  selectedUlogin.div = "userlogin-validate-div";
  selectedUlogin.addEventListener("blur", textFieldValidate);
  }

  btnNav.addEventListener('click', function() {
    navDiv.classList.toggle("show");
  });

  if (formSignUp) {
    signupValidate();
  }

  if (formLogin) {
    loginValidate();
  }
};
