// I Optimize this code using ChatGPT
document.addEventListener("DOMContentLoaded", function () {
  //search table
  let ETB = document.getElementById("EveTable");
  let Etbody = ETB.querySelector("tbody");
  let Erows = Array.from(Etbody.querySelectorAll("tr"));
  let Esearch = document.getElementById("EveSearchBar");
  let Eprev = document.getElementById("EvePrevious");
  let Enext = document.getElementById("EveNext");
  let Elimit = 5;
  let EcurrentPage = 1;
  let EtotalPage = Math.ceil(Erows.length / Elimit);
  let EcurrentPageElement = document.getElementById("EveCurrentPage");
  let EtotalPageElement = document.getElementById("EveTotalPage");
  let EtotalItemElement = document.getElementById("EveTotalItem");

  function filterRows() {
    let filter = Esearch.value.toUpperCase();
    Erows.forEach(function (row) {
      let td = row.querySelector("td:nth-child(2)");
      let textValue = td.textContent || td.innerText;
      row.style.display = textValue.toUpperCase().includes(filter) ? "" : "none";
    });
    updatePagination();
  }

  function showPage() {
    let start = (EcurrentPage - 1) * Elimit;
    let end = EcurrentPage * Elimit;
    Erows.forEach(function (row, index) {
      row.style.display = (index >= start && index < end) ? "" : "none";
    });
    updatePagination();
  }

  function updatePagination() {
    Eprev.classList.toggle("disabled", EcurrentPage === 1);
    Enext.classList.toggle("disabled", EcurrentPage === EtotalPage);
    EcurrentPageElement.textContent = EcurrentPage;
    EtotalPageElement.textContent = EtotalPage;
    EtotalItemElement.textContent = Erows.length;
  }

  function resetSearch() {
    Esearch.value = "";
    filterRows();
  }

  Esearch.addEventListener("keyup", function () {
    if (Esearch.value === "") {
      resetSearch();
    } else {
      filterRows();
    }
  });

  Eprev.addEventListener("click", function () {
    if (EcurrentPage > 1) {
      EcurrentPage--;
      showPage();
    }
  });

  Enext.addEventListener("click", function () {
    if (EcurrentPage < EtotalPage) {
      EcurrentPage++;
      showPage();
    }
  });
  showPage();
});
