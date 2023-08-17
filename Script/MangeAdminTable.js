document.addEventListener("DOMContentLoaded", function () {
  let TTB = document.getElementById("AccountTable");
  let Ttbody = TTB.querySelector("tbody");
  let Trows = Array.from(Ttbody.querySelectorAll("tr"));
  let Tsearch = document.getElementById("SearchBar");
  let Tprev = document.getElementById("Previous");
  let Tnext = document.getElementById("Next");
  let Tlimit = 5;
  let TcurrentPage = 1;
  let TtotalPage = Math.ceil(Trows.length / Tlimit);
  let TcurrentPageElement = document.getElementById("CurrentPage");
  let TtotalPageElement = document.getElementById("TotalPage");
  let TtotalItemElement = document.getElementById("TotalItem");
  let noResult = document.getElementById("noResult");

  // add a hidden attribute to the noResult element
  noResult.setAttribute("hidden", "");

  //--------------------------------------------------------------------------------
  let displayedRowCount = 0;
  const maxDisplayedRows = Tlimit;

  function filterRows() {
    let filter = Tsearch.value.toUpperCase();
    displayedRowCount = 0; // Reset displayed row count

    Trows.forEach(function (row) {
      let td = row.querySelector("td:nth-child(3)");
      let textValue = td.textContent || td.innerText;

      if (
        textValue.toUpperCase().includes(filter) &&
        displayedRowCount < maxDisplayedRows
      ) {
        row.style.display = "";
        displayedRowCount++;
      } else {
        row.style.display = "none";
      }
    });

    updatePagination();

    // Check if there are any rows displayed
    let hasRows = Trows.some(function (row) {
      return row.style.display !== "none";
    });

    // Show "No result found" message if no rows are displayed
    if (!hasRows) {
      noResult.removeAttribute("hidden");
    } else {
      noResult.setAttribute("hidden", "");
    }
  }

  function showPage() {
    let start = (TcurrentPage - 1) * Tlimit;
    let end = TcurrentPage * Tlimit;
    Trows.forEach(function (row, index) {
      row.style.display = index >= start && index < end ? "" : "none";
    });
    updatePagination();
  }

  function updatePagination() {
    Tprev.classList.toggle("disabled", TcurrentPage === 1);
    Tnext.classList.toggle("disabled", TcurrentPage === TtotalPage);
    TcurrentPageElement.textContent = TcurrentPage;
    TtotalPageElement.textContent = TtotalPage;
    TtotalItemElement.textContent = Trows.length;
  }

  function resetSearch() {
    Tsearch.value = "";
    filterRows();
  }

  Tsearch.addEventListener("keyup", function () {
    if (Tsearch.value === "") {
      resetSearch();
      showPage();
    } else {
      filterRows();
    }
  });

  Tprev.addEventListener("click", function () {
    if (TcurrentPage > 1) {
      TcurrentPage--;
      showPage();
    }
  });

  Tnext.addEventListener("click", function () {
    if (TcurrentPage < TtotalPage) {
      TcurrentPage++;
      showPage();
    }
  });
  showPage();
});
