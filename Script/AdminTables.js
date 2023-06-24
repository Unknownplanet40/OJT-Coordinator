document.addEventListener("DOMContentLoaded", function () {
    var currentPage = 1; // Current page number
    var itemsPerPage = 5; // Number of items to display per page
    var rows = []; // Array to store table rows
  
    var table = document.getElementById("Trainee-Table");
    rows = table.getElementsByTagName("tr");
  
    function filterTable() {
      var input = document.getElementById("TL");
      var limit = 5;
      var count = 0;
  
      for (var i = 0; i < rows.length; i++) {
        var cells = rows[i].getElementsByTagName("td");
  
        // Make sure the row has cells and the desired column index exists
        if (cells.length > 0 && cells[0].innerHTML) {
          var name = cells[0].innerHTML;
  
          if (name.toLowerCase().includes(input.value.toLowerCase())) {
            rows[i].style.display = "";
            count++;
  
            if (count > limit) {
              rows[i].style.display = "none";
            }
          } else {
            rows[i].style.display = "none";
          }
        }
      }
    }
  
    var input = document.getElementById("TL");
    input.addEventListener("keyup", filterTable);
  
    function showPage(page) {
      var startIndex = (page - 1) * itemsPerPage;
      var endIndex = startIndex + itemsPerPage;
  
      // Show rows within the range and hide the rest
      for (var i = 0; i < rows.length; i++) {
        if (i >= startIndex && i < endIndex) {
          rows[i].style.display = "";
        } else {
          rows[i].style.display = "none";
        }
      }
    }
  
    function goToPreviousPage(event) {
      event.preventDefault();
      if (currentPage > 1) {
        currentPage--;
        showPage(currentPage);
      }
    }
  
    function goToNextPage(event) {
      event.preventDefault();
      var totalPages = Math.ceil(rows.length / itemsPerPage);
      if (currentPage < totalPages) {
        currentPage++;
        showPage(currentPage);
      }
    }
  
    var previousPageLink = document.getElementById("previousPage");
    var nextPageLink = document.getElementById("nextPage");
  
    previousPageLink.addEventListener("click", goToPreviousPage);
    nextPageLink.addEventListener("click", goToNextPage);
  
    showPage(currentPage);
  });
  