document.addEventListener("DOMContentLoaded", function () {
  var errorDiv = document.querySelector(".error");
  var showPassword = document.getElementById("flexCheckDefault");
  const form = document.getElementById("form");

  // prevent from being checked by default
  showPassword.checked = false;

  console.log("RegisterValidation.js loaded");

  // input fields
  var password = document.getElementById("password");
  var confirmPassword = document.getElementById("confirm");
  var age = document.getElementById("age");
  var serialnumber = document.getElementById("usn");
  var mail = document.getElementById("mail");
  var name = document.getElementById("Traineename");
  var username = document.getElementById("username");


  // Show/hide password
  showPassword.addEventListener("click", function () {
    if (password.type === "password") {
      password.type = "text";
      confirmPassword.type = "text";
    } else {
      password.type = "password";
      confirmPassword.type = "password";
    }
  });

  age.addEventListener("input", function () {
    age.value = age.value.replace(/[^0-9]/g, "").slice(0, 2);
  });

  serialnumber.addEventListener("input", function () {
    serialnumber.value = serialnumber.value
      .replace(/\D/g, "") // Remove non-numeric characters
      .slice(0, 10); // Limit to 10 characters
  });

  function displayError(message) {
    var error = document.createElement("p");
    error.textContent = message;
    errorDiv.appendChild(error);
    errorDiv.scrollIntoView();

    // Clear the error after 5 seconds
    setTimeout(function () {
      errorDiv.removeChild(error);
    }, 3000);
  }

  function validateForm(){
    var name = document.forms["form"]["Traineename"].value;
    var username = document.forms["form"]["username"].value;
    var mail = document.forms["form"]["mail"].value;
    var age = document.forms["form"]["age"].value;
    var serialnumber = document.forms["form"]["usn"].value;
    var password = document.forms["form"]["password"].value;
    var confirmPassword = document.forms["form"]["confirm"].value;

    if (empty(name) || empty(username) || empty(mail) || empty(age) || empty(serialnumber) || empty(password) || empty(confirmPassword)) {
      displayError("Please fill out all fields");
      return false;
    } else if (password !== confirmPassword) {
      displayError("Passwords do not match");
      return false;
    }
  }
});

