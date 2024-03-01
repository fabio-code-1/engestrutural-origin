document.addEventListener("DOMContentLoaded", function () {
  let searchInput = document.getElementById("searchInputProjeto");
  if (searchInput) {
    // Verifica se o campo de pesquisa existe na view
    searchInput.addEventListener("keyup", function () {
      let searchText = this.value.toLowerCase();
      let rows = document.querySelectorAll("#projeto_table tbody tr");

      rows.forEach(function (row) {
        let text = row.textContent.toLowerCase();
        if (text.includes(searchText)) {
          row.style.display = "";
        } else {
          row.style.display = "none";
        }
      });
    });
  }
});
