document.addEventListener("DOMContentLoaded", function () {
  var showPassword = document.getElementById("flexCheckDefault");
  var password = document.getElementById("password");
  showPassword.checked = false;

  // Show/hide password
  showPassword.addEventListener("click", function () {
    if (password.type === "password") {
      password.type = "text";
    } else {
      password.type = "password";
    }
  });
});

// Path: Script\LoginValidation.js
