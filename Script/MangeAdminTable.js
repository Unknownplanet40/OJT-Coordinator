document.addEventListener("DOMContentLoaded", function () {
  let table = document.getElementById("AccountTable");
  let tbody = table.getElementsByTagName("tbody")[0];
  let rows = tbody.getElementsByTagName("tr");
  let seach = document.getElementById("SearchBar");
  let prev = document.getElementById("Previous");
  let next = document.getElementById("Next");
  let limit = 10;

  seach.addEventListener("keyup", function () {
    let filter = seach.value.toUpperCase();
    for (let i = 0; i < limit; i++) {
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
});
