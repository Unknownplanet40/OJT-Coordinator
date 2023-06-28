document.addEventListener("DOMContentLoaded", function () {
  //search table
  let table = document.getElementById("AccountTable");
  let tbody = table.getElementsByTagName("tbody")[0];
  let rows = tbody.getElementsByTagName("tr");
  let seach = document.getElementById("SearchBar");
  let prev = document.getElementById("Previous");
  let next = document.getElementById("Next");
  let AdminTable = document.getElementById("AdminTable");
  let AdminTab = document.getElementById("AdminTab");
  let limit = 10;

  seach.addEventListener("keyup", function () {
    let filter = seach.value.toUpperCase();
    let rows = document.getElementsByTagName("tr");

    for (let i = 0; i < rows.length; i++) {
      let td = rows[i].getElementsByTagName("td")[1];
      if (td) {
        let textValue = td.textContent || td.innerHTML;
        if (textValue.toUpperCase().indexOf(filter) > -1) {
          rows[i].style.display = "";
        } else {
          rows[i].style.display = "none";
        }
      }
    }
  });

  //limit table row
  let page = 1;
  let start = (page - 1) * limit;
  let end = page * limit;
  let totalPage = Math.ceil(rows.length / limit);
  let totalItem = rows.length;
  let currentPage = document.getElementById("CurrentPage");
  let total = document.getElementById("TotalPage");
  let item = document.getElementById("TotalItem");

  if (page == 1) {
    prev.classList.add("disabled");
  } else {
    prev.classList.remove("disabled");
  }

  if (page == totalPage) {
    next.classList.add("disabled");
  } else {
    next.classList.remove("disabled");
  }

  currentPage.innerHTML = page;
  total.innerHTML = totalPage;
  item.innerHTML = totalItem;

  function showPage() {
    for (let i = 0; i < rows.length; i++) {
      if (i >= start && i < end) {
        rows[i].style.display = "";
      } else {
        rows[i].style.display = "none";
      }
    }
  }
  showPage();

  prev.addEventListener("click", function () {
    if (page > 1) {
      page--;
      start = (page - 1) * limit;
      end = page * limit;
      currentPage.innerHTML = page;
      showPage();
    }
  });

  next.addEventListener("click", function () {
    if (page < totalPage) {
      page++;
      start = (page - 1) * limit;
      end = page * limit;
      currentPage.innerHTML = page;
      showPage();
    }
  });

  // show password

  let show = document.getElementById("showPassword");

  show.addEventListener("click", function () {
    let password = document.getElementById("CrePword");
    let conpassword = document.getElementById("CreConPword");
    if (show.checked) {
      password.type = "text";
      conpassword.type = "text";
    } else {
      password.type = "password";
      conpassword.type = "password";
    }
  });
});
