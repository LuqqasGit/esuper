/* AJAX HEADERS SETUP */
$.ajaxSetup({
  headers: { 'X-CSRF-TOKEN': "{{csrf_token()}}" }
});

window.onload = function() {
  var formLogin = document.getElementById('login');
  var formSignUp = document.getElementById('signup');
  if (formSignUp) {
    var selectedEmail = formSignUp.querySelector('input[name="email"]');
    var selectedName = formSignUp.querySelector('input[name="fname"]');
    var selectedLname = formSignUp.querySelector('input[name="lname"]');
    var selectedUname = formSignUp.querySelector('input[name="username"]');
    var selectedPassword1 = formSignUp.querySelector('input[name="password1"]');
    var selectedPassword2 = formSignUp.querySelector('input[name="password2"]');
  }
  if (formLogin) {
    var selectedUlogin = formLogin.querySelector('input[name="email"]');
  }
  var loading = $('#loading-div');
  var auth = $('#auth');

  function emailValidate() {
    var emailError = document.getElementById("email-validate-div");
    if (/^\w+([\.-]?\ w+)*@\w+([\.-]?\ w+)*(\.\w{2,3})+$/.test(selectedEmail.value)){
      emailError.className = "signup-validate-div-hidden";
      selectedEmail.className = "signup-imput-ok";
    } else {
      emailError.className = "signup-validate-div";
      selectedEmail.className = "";
    }
  }

  function textFieldValidate(evt) {
    var errorDiv = evt.target.div;
    if (this.value){
      errorDiv.className = "signup-validate-div-hidden";
      this.className = "signup-imput-ok";
    } else {
      console.log(errorDiv);
      errorDiv.className = "signup-validate-div";
      this.className = "";
    }
  }

  function passwordValidate(){
    var passError = document.getElementById("pass-validate-div");
    if (/(?=.*\d)(?=.*[a-z]).{6,}/.test(selectedPassword1.value)){
      passError.className = "signup-validate-div-hidden";
      selectedPassword1.className = "signup-imput-ok";
    }else {
      passError.className = "signup-validate-div";
      selectedPassword1.className = "";
      selectedPassword1.value = "";
    }
  }

  function passwordMatchValidate(){
    var passError2 = document.getElementById("pass2-validate-div");
    if (selectedPassword1.value == selectedPassword2.value){
      passError2.className = "signup-validate-div-hidden";
      selectedPassword2.className = "signup-imput-ok";
    }else {
      passError2.className = "signup-validate-div";
      selectedPassword2.className = "";
      selectedPassword2.value = "";
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

    // Password Strength Validate
    selectedPassword1.addEventListener("blur", passwordValidate);

    // Password Match Validate
    selectedPassword2.addEventListener("blur", passwordMatchValidate);

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

  if (formSignUp) {
    signupValidate();
  }

  if (formLogin) {
    loginValidate();
  }

  //frequently asked questions
  var accordionQ = document.getElementsByClassName("accordionFaq");

  function toggleEvent(item, index, array) {
    item.addEventListener("click", function() {
      item.nextElementSibling.classList.toggle("show");
      for (var i=index+1; i<array.length; i++) {
        array[i].nextElementSibling.classList.remove("show");
      }
      for (var j=index-1; j>=0; j--) {
        array[j].nextElementSibling.classList.remove("show");
      }
    });
  }
  //convert HTMLCollections into arrays
  var questions = Array.prototype.slice.call(accordionQ);

  questions.forEach(toggleEvent);

  /* ADD ITEM TO CART */
  $('a[href="addToCart"]').on('click', function (e) {
    e.preventDefault();
    loading.slideDown('slow');
    $.ajax({
      url: '/add-to-cart/' + $(this).data('id'),
      type: 'patch',
      success: function (msg) {
        $("#refresh-after-ajax").text(msg);
        loading.slideUp('fast');
      },
      error: function () {
        loading.slideUp('fast');
      }
    });
  });
  /* END ADD ITEM TO CART */

  /* SEARCH */
  $('#navbar-search').on('submit', function (e) {
    e.preventDefault();
    window.location.href = "/products/search/" + $('#navbar-search-query').val();
  });

  // $('#navbar-search-query').on('keypress', function(){
  //   $.ajax({
  //     url: '/products/search/'+ $(this).val(),
  //     type: 'get',
  //     success: function (msg) {
  //       console.log(msg);
  //     },
  //     error: function () {
  //       console.log("Error");
  //     }
  //   });
  // });
  /* END SEARCH */

  // Modal box show
  if (!auth.data('auth')) {
  $('#esuper-intro').modal('show');
  }
  // End Modal box show

};
