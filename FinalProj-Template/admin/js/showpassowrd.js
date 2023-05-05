 //show password
 function myFunction() {
    var x = document.getElementById("psw");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }

  function myFunction2() {
    var x = document.getElementById("confirm_pass");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }