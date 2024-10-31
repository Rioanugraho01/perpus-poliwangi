$(document).ready(function () {
    var table = $("#data-table").DataTable({
        searching: false,
    });

    $("#customSearchInput").on("input", function () {
        var searchTerm = $(this).val();
        table.search(searchTerm).draw();
    });
});

function filterTable() {
    const searchInput = document
        .getElementById("searchInput")
        .value.toLowerCase();
    const table = document.getElementById("data-table");
    const rows = table.getElementsByTagName("tr");

    for (let i = 1; i < rows.length; i++) {
        const row = rows[i];
        const cells = row.getElementsByTagName("td");
        let found = false;

        for (let j = 0; j < cells.length; j++) {
            const cell = cells[j];
            if (cell) {
                const textValue = cell.textContent || cell.innerText;
                if (textValue.toLowerCase().indexOf(searchInput) > -1) {
                    found = true;
                    break;
                }
            }
        }

        if (found) {
            row.style.display = "";
        } else {
            row.style.display = "none";
        }
    }
}

const searchInput = document.getElementById("searchInput");
searchInput.addEventListener("input", filterTable);

function filterDateTable() {
    const dateInput = document.getElementById("dateInput").value.toLowerCase();
    const tables = document.getElementById("data-table");
    const rows = tables.getElementsByTagName("tr");

    for (let i = 1; i < rows.length; i++) {
        const row = rows[i];
        const cells = row.getElementsByTagName("td");
        let found = false;

        for (let j = 0; j < cells.length; j++) {
            const cell = cells[j];
            if (cell) {
                const textValue = cell.textContent || cell.innerText;
                if (textValue.toLowerCase().indexOf(dateInput) > -1) {
                    found = true;
                    break;
                }
            }
        }

        if (found) {
            row.style.display = "";
        } else {
            row.style.display = "none";
        }
    }
}

const dateInput = document.getElementById("dateInput");
dateInput.addEventListener("input", filterDateTable);

document.getElementById("exportButton").addEventListener("click", function () {
    var table = document.getElementById("data-table");
    var ws = XLSX.utils.table_to_sheet(table);
    var wb = XLSX.utils.book_new();
    XLSX.utils.book_append_sheet(wb, ws, "Sheet1");
    XLSX.writeFile(wb, "table_data.xlsx");
});
