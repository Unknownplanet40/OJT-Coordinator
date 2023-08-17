// I Optimize this code using ChatGPT
document.addEventListener("DOMContentLoaded", function () {
  //search table
  let PTB = document.getElementById("ProgTable");
  let Ptbody = PTB.querySelector("tbody");
  let Prows = Array.from(Ptbody.querySelectorAll("tr"));
  let Psearch = document.getElementById("ProgSearchBar");
  let Pprev = document.getElementById("ProgPrevious");
  let Pnext = document.getElementById("ProgNext");
  let Plimit = 5;
  let PcurrentPage = 1;
  let PtotalPage = Math.ceil(Prows.length / Plimit);
  let PcurrentPageElement = document.getElementById("ProgCurrentPage");
  let PtotalPageElement = document.getElementById("ProgTotalPage");
  let PtotalItemElement = document.getElementById("ProgTotalItem");
  let noResult = document.getElementById("PnoResult");

  // add a hidden attribute to the noResult element
  noResult.setAttribute("hidden", "");

  //--------------------------------------------------------------------------------
  let displayedRowCount = 0;
  const maxDisplayedRows = Plimit;

  /* function filterRows() {
   let filter = Psearch.value.toUpperCase();
   displayedRowCount = 0; // Reset displayed row count

   Prows.forEach(function (row) {
     let td = row.querySelector("td:nth-child(2)");
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
   
 } */

  function filterRows() {
    let filter = Psearch.value.toUpperCase();
    displayedRowCount = 0; // Reset displayed row count

    Prows.forEach(function (row) {
      let td = row.querySelector("td:nth-child(2)");
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
    let hasRows = Prows.some(function (row) {
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
    let start = (PcurrentPage - 1) * Plimit;
    let end = PcurrentPage * Plimit;
    Prows.forEach(function (row, index) {
      row.style.display = index >= start && index < end ? "" : "none";
    });
    updatePagination();
  }

  function updatePagination() {
    Pprev.classList.toggle("disabled", PcurrentPage === 1);
    Pnext.classList.toggle("disabled", PcurrentPage === PtotalPage);
    PcurrentPageElement.textContent = PcurrentPage;
    PtotalPageElement.textContent = PtotalPage;
    PtotalItemElement.textContent = Prows.length;
  }

  function resetSearch() {
    Psearch.value = "";
    filterRows();
  }

  Psearch.addEventListener("keyup", function () {
    if (Psearch.value === "") {
      resetSearch();
      showPage();
    } else {
      filterRows();
    }
  });

  Pprev.addEventListener("click", function () {
    if (PcurrentPage > 1) {
      PcurrentPage--;
      showPage();
    }
  });

  Pnext.addEventListener("click", function () {
    if (PcurrentPage < PtotalPage) {
      PcurrentPage++;
      showPage();
    }
  });
  showPage();
});
