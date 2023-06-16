document.addEventListener("DOMContentLoaded", function () {
  //var errorDiv = document.querySelector(".error");
  var showPassword = document.getElementById("flexCheckDefault");

  // prevent from being checked by default
  showPassword.checked = false;

  // input fields
  var password = document.getElementById("password");
  var confirmPassword = document.getElementById("confirm");
  var age = document.getElementById("age");
  var serialnumber = document.getElementById("usn");
  var mail = document.getElementById("mail");

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

  /* function displayError(message) {
    var error = document.createElement("p");
    error.textContent = message;
    errorDiv.appendChild(error);
    errorDiv.scrollIntoView();

    // Clear the error after 5 seconds
    setTimeout(function () {
      errorDiv.removeChild(error);
    }, 3000);
  } */
});

