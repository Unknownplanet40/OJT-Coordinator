document.addEventListener("DOMContentLoaded", function () {
  var showPassword = document.getElementById("flexCheckDefault");
  var form = document.querySelector("form");
  var password = document.getElementById("password");
  var errorDiv = document.querySelector(".error");
  showPassword.checked = false;

  // Show/hide password
  showPassword.addEventListener("click", function () {
    if (password.type === "password") {
      password.type = "text";
    } else {
      password.type = "password";
    }
  });

  function displayError(message) {
    var error = document.createElement("p");
    error.textContent = message;
    errorDiv.appendChild(error);
    errorDiv.scrollIntoView();

    // Clear the error after 5 seconds
    setTimeout(function () {
      if (errorDiv.contains(error)) {
        errorDiv.removeChild(error);
      }
    }, 3000);
  }

  form.addEventListener("submit", function (event) {
    event.preventDefault();

    errorDiv.innerHTML = "&nbsp;";

    var password = document.getElementById("password");
    var username = document.getElementById("username");

    uname = username.value;
    pword = password.value;

    if (uname.trim() === "") {
      displayError("Username cannot be empty");
    } else if (pword.trim() === "") {
      displayError("Password cannot be empty");
    } else if (uname.length < 5) {
      displayError("Username must be at least 5 characters long");
    } else if (pword.length < 8) {
      displayError("Password must be at least 8 characters long");
    } //  password must contain at least one uppercase letter, one lowercase letter, one number, and one special character
    else if (!pword.match(/[A-Z]/)) {
      displayError("Password must contain at least one uppercase letter");
    } else if (!pword.match(/[a-z]/)) {
      displayError("Password must contain at least one lowercase letter");
    } else if (!pword.match(/[0-9]/)) {
      displayError("Password must contain at least one number"); // .
    } else {
      form.submit();
    }
  });
});

// Path: Script\LoginValidation.js
