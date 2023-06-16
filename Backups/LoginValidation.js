/* document.addEventListener("DOMContentLoaded", function () {
  var showPassword = document.getElementById("flexCheckDefault");
  var password = document.getElementById("password");
  var username = document.getElementById("username");
  var errorDiv = document.querySelector(".error");
  var form = document.querySelector("form");

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

    // Clear the error after 5 seconds
    setTimeout(function () {
      errorDiv.removeChild(error);
    }, 3000);
  }

  // Validate the username and password when the form is submitted
  function UsernameValidation() {
    uname = username.value;

    errorDiv.innerHTML = "";

    if (uname == "") {
      displayError("You must enter a username");
      return false;
    } else if (uname.length < 5) {
      displayError("Username must be at least 5 characters");
      return false;
    } else if (/\s/.test(uname)) {
      displayError("Username cannot contain whitespace");
      return false;
    } else if (/[!@#$%^&*]/.test(uname)) {
      displayError("Username cannot contain special characters");
      return false;
    } else if (
      uname.toLowerCase() == "admin" ||
      uname.toLowerCase() == "administrator"
    ) {
      return true;
    } else {
      return true;
    }
  }

  function PasswordValidation() {
    pwd = password.value;

    errorDiv.innerHTML = "";

    if (pwd == "") {
      displayError("You must enter a password");
      return false;
    } else if (pwd.length < 8) {
      displayError("Password must be at least 8 characters");
      return false;
    } else if (/\s/.test(pwd)) {
      displayError("Password cannot contain whitespace");
      return false;
    } else if (!/\d{2}/.test(pwd)) {
      displayError("Password must contain at least two digits");
      return false;
    } else if (!/[A-Z]/.test(pwd)) {
      displayError("Password must contain at least one uppercase letter");
      return false;
    } else if (!/[a-z]/.test(pwd)) {
      displayError("Password must contain at least one lowercase letter");
      return false;
    } else if (!/[!@#$%^&*]/.test(pwd)) {
      displayError("Password must contain at least one special character");
      return false;
    } else if (uname == pwd) {
      displayError("Username and password cannot be the same");
      return false;
    } else {
      return true;
    }
  }

  function validateForm() {
    if (UsernameValidation() && PasswordValidation()) {
      return true;
    } else {
      return false;
    }
  }

  form.addEventListener("submit", function (event) {
    if (!validateForm()) {
      event.preventDefault();
    } 
  });
}); */


document.addEventListener("DOMContentLoaded", function () {
  var form = document.querySelector("form");
  var errorDiv = document.querySelector(".error");
  var showPassword = document.getElementById("flexCheckDefault");
  var password = document.getElementById("password");
  var attempts = 0;
  var maxAttempts = 3;
  var lockoutTime = 1; // Lockout time in minutes
  var countdownInterval;
  var buttonDisabled = false;

  // Retrieve saved login attempt count and lockout time from localStorage
  if (localStorage.getItem("loginAttempts")) {
    attempts = parseInt(localStorage.getItem("loginAttempts"));
  }

  if (localStorage.getItem("lockoutTime")) {
    lockoutTime = parseInt(localStorage.getItem("lockoutTime"));
  }

  if (localStorage.getItem("buttonDisabled")) {
    buttonDisabled = localStorage.getItem("buttonDisabled") === "true";
    if (buttonDisabled) {
      disableButton();
      startLockoutTimer();
    }
  }

  console.log("attempts: " + attempts);
  console.log("lockoutTime: " + lockoutTime);
  console.log("buttonDisabled: " + buttonDisabled);
  console.log("Is mail valid: " + ValidUsername);

  // Show/hide password
  showPassword.addEventListener("click", function () {
    if (password.type === "password") {
      password.type = "text";
    } else {
      password.type = "password";
    }
  });

  // Validate the username and password when the form is submitted
  form.addEventListener("submit", function (event) {
    event.preventDefault();

    // Clear previous error messages
    errorDiv.innerHTML = "";

    // Get the values from the username and password fields
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;

    // Validate the username and password
    if (username.trim() === "" || password.trim() === "") {
      displayError("Username and password are required");
    } else if (username.length < 8) {
      displayError("Username must have at least 8 characters");
    } else if (password.length < 8) {
      displayError("Password must have at least 8 characters");
    } else if (/\s/.test(username) || /\s/.test(password)) {
      displayError("Username and password cannot contain whitespace");
    } else if (!/\d{2}/.test(password)) {
      displayError("Password must contain at least two digits");
    } else if (!/[A-Z]/.test(password)) {
      displayError("Password must contain at least one uppercase letter");
    } else if (!/[a-z]/.test(password)) {
      displayError("Password must contain at least one lowercase letter");
    } else if (!/[!@#$%^&*]/.test(password)) {
      displayError("Password must contain at least one special character");
    } else if (/[!@#$%^&*]/.test(username)) {
      displayError("Username cannot contain special characters");
    } else if (username === password) {
      displayError("Username and password cannot be the same");
    } else {
      // This is where you would check the username and password against a database
      if (ValidUsername) {
        form.submit();
      } else {
        attempts++;
        if (attempts === maxAttempts) {
          displayAttempt("Maximum login attempts exceeded");
          disableButton();
          startLockoutTimer();
        } else {
          displayAttempt("Invalid login attempt: " + attempts);
        }
      }
    }

    // Save the login attempt count and lockout time in localStorage
    localStorage.setItem("loginAttempts", attempts.toString());
    localStorage.setItem("lockoutTime", lockoutTime.toString());
    localStorage.setItem("buttonDisabled", buttonDisabled.toString());
  });

  function displayError(message) {
    var error = document.createElement("p");
    error.textContent = message;
    errorDiv.appendChild(error);

    // Clear the error after 5 seconds
    setTimeout(function () {
      errorDiv.removeChild(error);
    }, 3000);
  }

  function displayAttempt(message) {
    var attemptMessage = message;
    var attemptDiv = document.createElement("div");
    attemptDiv.textContent = attemptMessage;
    errorDiv.appendChild(attemptDiv);

    // Clear the attempt count after 5 seconds
    setTimeout(function () {
      // Check if the attemptDiv is still in the DOM
      if (errorDiv.contains(attemptDiv)) {
        errorDiv.removeChild(attemptDiv);
      }
    }, 5000);
  }

  function disableButton() {
    var submitButton = document.querySelector('button[name="login"]');
    submitButton.disabled = true;
    buttonDisabled = true;
  }

  function startLockoutTimer() {
    var totalSeconds = lockoutTime * 60;
    var minutes, seconds;
    var timerDiv = document.createElement("div");
    timerDiv.classList.add("lockout-timer");
    errorDiv.appendChild(timerDiv);

    countdownInterval = setInterval(function () {
      minutes = Math.floor(totalSeconds / 60);
      seconds = totalSeconds % 60;

      timerDiv.textContent =
        "Account locked. Please wait " +
        minutes +
        " minutes " +
        seconds +
        " seconds";

      if (totalSeconds <= 0) {
        clearInterval(countdownInterval);
        errorDiv.removeChild(timerDiv);
        enableButton();
        attempts = 0; // Reset login attempts
        // Save the login attempt count and lockout time in localStorage
        localStorage.setItem("loginAttempts", attempts.toString());
        localStorage.setItem("lockoutTime", lockoutTime.toString());
        localStorage.setItem("buttonDisabled", buttonDisabled.toString());
      }

      totalSeconds--;
    }, 1000);
  }

  function enableButton() {
    var submitButton = document.querySelector('button[name="login"]');
    submitButton.disabled = false;
    buttonDisabled = false;
  }
});
