

function validate_password() {

  var pass = document.getElementById('psw').value;
  var confirm_pass = document.getElementById('confirm_pass').value;
  if (pass != confirm_pass) {
    document.getElementById('wrong_pass_alert').style.color = 'red';
    document.getElementById('wrong_pass_alert').innerHTML
      = '☒ Password not matched';
    document.getElementById('create').disabled = true;
    document.getElementById('create').style.opacity = (0.4);
  } else {
    document.getElementById('wrong_pass_alert').style.color = 'green';
    document.getElementById('wrong_pass_alert').innerHTML =
      '🗹 Password Matched';
    document.getElementById('create').disabled = false;
    document.getElementById('create').style.opacity = (1);
  }
}

function wrong_pass_alert() {
  if (document.getElementById('pass').value != "" &&
    document.getElementById('confirm_pass').value != "") {
    alert("Your response is submitted");
  } else {
    alert("Please fill all the fields");
  }
}


var myInput = document.getElementById("psw");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

// When the user clicks on the password field, show the message box
myInput.onfocus = function () {
  document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function () {
  document.getElementById("message").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function () {
  // Validate special characters
  const specialChars = /[`!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?~]/;
  if (myInput.value.match(specialChars)) {
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
  }

  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if (myInput.value.match(upperCaseLetters)) {
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if (myInput.value.match(numbers)) {
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }

  // Validate length
  if (myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}



//show password
function myFunction() {
  var x = document.getElementById("psw");
  var y = document.getElementById("confirm_pass");
  if (x.type && y.type === "password") {
    x.type = "text";
    y.type = "text";
  } else {
    x.type = "password";
    y.type = "password";
  }
}

