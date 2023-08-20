document.addEventListener("DOMContentLoaded", () => {
  const body = document.querySelector("body");
  const sidebar = body.querySelector("nav");
  const toggle = body.querySelector(".toggle");
  const profile = document.querySelector(".logo-text");

  toggle.addEventListener("click", () => {
    sidebar.classList.toggle("close");

    // for Profile link
    // napipindot kasi yung prifile kahit naka close yung sidebar
    // so i remove the onclick attribute if the sidebar is close
    // kapag hindi naman close yung sidebar, ibabalik ko yung onclick attribute
    // para ma redirect sa profile page
    if (sidebar.classList.contains("close")) {
      profile.removeAttribute("onclick");
    } else {
      // redirect to their respective profile page
      // if body has a class of adminuser, redirect to admin profile page
      if (body.classList.contains("adminuser")) {
        //get profession of the user
        const profession = document.getElementById("profession").value;
        var id = document.getElementById("GlobalID").value;

        //check if the user is an admin or moderator
        if (profession == "administrator") {
          profile.setAttribute("onclick", 'location.href = ""');
          if (window.location.href.indexOf("") > -1) {
            profile.removeAttribute("onclick");
          }
        } else {
          profile.setAttribute(
            "onclick",
            'location.href = "../Components/Proccess/Moderator.php?id=' +
              id +
              '"'
          );
          if (
            window.location.href.indexOf(
              "../Components/Proccess/Moderator.php?id=" + id
            ) > -1
          ) {
            profile.removeAttribute("onclick");
          }
        }
      } else {
        profile.setAttribute("onclick", 'location.href = "UserProfile.php"');
        if (window.location.href.indexOf("UserProfile.php") > -1) {
          profile.removeAttribute("onclick");
        }
      }
    }
  });

  // The code below is for the dark mode toggle switch (uncomment to enable)

  // Check if the dark mode state is stored in localStorage
  // const isDarkMode = localStorage.getItem("darkMode");

  // If it's stored, apply the dark mode class to the body and update the mode text
  /* if (isDarkMode === "true") {
    body.classList.add("dark");
    modeText.innerText = "Light mode";
  } else {
    modeText.innerText = "Dark mode";
  } */

  /*   Add event listener to toggle the dark mode
  modeSwitch.addEventListener("click", () => {
    body.classList.toggle("dark");

    Update the mode text based on the current state of dark mode
    if (body.classList.contains("dark")) {
      modeText.innerText = "Light mode";
      localStorage.setItem("darkMode", true);
    } else {
      modeText.innerText = "Dark mode";
      localStorage.setItem("darkMode", false);
    }
  }); */
});
