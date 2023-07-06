// I Optimize this code using ChatGPT
document.addEventListener("DOMContentLoaded", function () {
  //search table
  let table = document.getElementById("AccountTable");
  let tbody = table.querySelector("tbody");
  let rows = Array.from(tbody.querySelectorAll("tr"));
  let search = document.getElementById("SearchBar");
  let prev = document.getElementById("Previous");
  let next = document.getElementById("Next");
  let limit = 10;
  let currentPage = 1;
  let totalPage = Math.ceil(rows.length / limit);
  let currentPageElement = document.getElementById("CurrentPage");
  let totalPageElement = document.getElementById("TotalPage");
  let totalItemElement = document.getElementById("TotalItem");
  let password = document.getElementById("CrePword");
  let conpassword = document.getElementById("CreConPword");
  let showPassword = document.getElementById("showPassword");

  function filterRows() {
    let filter = search.value.toUpperCase();
    rows.forEach(function (row) {
      let td = row.querySelector("td:nth-child(2)");
      let textValue = td.textContent || td.innerText;
      row.style.display = textValue.toUpperCase().includes(filter) ? "" : "none";
    });
    updatePagination();
  }

  function showPage() {
    let start = (currentPage - 1) * limit;
    let end = currentPage * limit;
    rows.forEach(function (row, index) {
      row.style.display = (index >= start && index < end) ? "" : "none";
    });
    updatePagination();
  }

  function updatePagination() {
    prev.classList.toggle("disabled", currentPage === 1);
    next.classList.toggle("disabled", currentPage === totalPage);
    currentPageElement.textContent = currentPage;
    totalPageElement.textContent = totalPage;
    totalItemElement.textContent = rows.length;
  }

  function resetSearch() {
    search.value = "";
    filterRows();
  }

  search.addEventListener("keyup", function () {
    if (search.value === "") {
      resetSearch();
    } else {
      filterRows();
    }
  });

  prev.addEventListener("click", function () {
    if (currentPage > 1) {
      currentPage--;
      showPage();
    }
  });

  next.addEventListener("click", function () {
    if (currentPage < totalPage) {
      currentPage++;
      showPage();
    }
  });

  showPassword.addEventListener("change", function () {
    password.type = showPassword.checked ? "text" : "password";
    conpassword.type = showPassword.checked ? "text" : "password";
  });

  showPage();
});
