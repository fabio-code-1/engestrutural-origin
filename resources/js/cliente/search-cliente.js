document.addEventListener("DOMContentLoaded", function () {
  document.getElementById("searchInput").addEventListener("keyup", function () {
    let searchText = this.value.toLowerCase();
    let rows = document.querySelectorAll("#clientes_table tbody tr");

    rows.forEach(function (row) {
      let text = row.textContent.toLowerCase();
      if (text.includes(searchText)) {
        row.style.display = "";
      } else {
        row.style.display = "none";
      }
    });
  });
});
