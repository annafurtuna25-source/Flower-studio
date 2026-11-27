
document.addEventListener("DOMContentLoaded", function () {

    // Navigarea in meniul lateral

    const links = document.querySelectorAll(".menu-link");
    const sections = document.querySelectorAll(".admin-section");

    links.forEach(link => {

        link.addEventListener("click", function (event) {

            event.preventDefault();

            links.forEach(item => {
                item.classList.remove("active");
            });

            this.classList.add("active");

            sections.forEach(section => {
                section.hidden = section.id !== this.dataset.section;
            });

        });

    });


    // Notificari

    const notification = document.getElementById("notification");

    let notificationTimer;

    function showNotification(message) {

        notification.textContent = message;
        notification.hidden = false;

        clearTimeout(notificationTimer);

        notificationTimer = setTimeout(function () {
            notification.hidden = true;
        }, 3500);

    }


    // Cautare si paginare

    const tables = document.querySelectorAll(".data-table");

    tables.forEach(table => {

        const card = table.closest(".table-card");

        const search = card.querySelector(".search-input");
        const pagination = card.querySelector(".pagination");

        const rowsPerPage = 3;

        let currentPage = 1;

        function renderTable() {

            const rows = Array.from(
                table.querySelectorAll("tbody tr")
            );

            const query = search
                ? search.value.toLowerCase().trim()
                : "";

            const filteredRows = rows.filter(row => {

                return row.textContent
                    .toLowerCase()
                    .includes(query);

            });

            const totalPages = Math.max(
                1,
                Math.ceil(filteredRows.length / rowsPerPage)
            );

            currentPage = Math.min(currentPage, totalPages);

            const start = (currentPage - 1) * rowsPerPage;
            const end = start + rowsPerPage;

            rows.forEach(row => {
                row.hidden = true;
            });

            filteredRows.slice(start, end).forEach(row => {
                row.hidden = false;
            });

            if (!pagination) return;

            pagination.innerHTML = "";

            const info = document.createElement("span");

            info.textContent = filteredRows.length === 0
                ? "Nu există rezultate."
                : "Afișare " + (start + 1) +
                  "–" + Math.min(end, filteredRows.length) +
                  " din " + filteredRows.length +
                  " înregistrări";

            pagination.appendChild(info);

            const buttons = document.createElement("div");

            buttons.className = "pagination-buttons";

            for (let page = 1; page <= totalPages; page++) {

                const button = document.createElement("button");

                button.className = "page-btn";

                button.textContent = page;

                if (page === currentPage) {
                    button.classList.add("active");
                }

                button.addEventListener("click", function () {

                    currentPage = page;
                    renderTable();

                });

                buttons.appendChild(button);

            }

            pagination.appendChild(buttons);

        }

        if (search) {

            search.addEventListener("input", function () {

                currentPage = 1;
                renderTable();

            });

        }

        table.addEventListener("click", function (event) {

            const deleteButton = event.target.closest(".delete-btn");

            if (deleteButton) {

                const confirmed = confirm(
                    "Sigur dorești să elimini această înregistrare?"
                );

                if (confirmed) {

                    deleteButton.closest("tr").remove();

                    renderTable();

                    showNotification(
                        "Înregistrarea a fost eliminată din interfața demonstrativă."
                    );

                }

            }

        });

        renderTable();

    });


    // Butoane Adauga

    document.querySelectorAll(".add-btn").forEach(button => {

        button.addEventListener("click", function () {

            showNotification(
                "Adăugarea în baza de date va fi implementată la backend."
            );

        });

    });


    // Butoane Editeaza

    document.querySelectorAll(".edit-btn").forEach(button => {

        button.addEventListener("click", function () {

            showNotification(
                "Editarea permanentă va fi disponibilă după conectarea bazei de date."
            );

        });

    });


    // Modificarea statusului comenzilor

    document.querySelectorAll(".status-select").forEach(select => {

        select.addEventListener("change", function () {

            showNotification(
                "Status actualizat în interfață: " + this.value
            );

        });

    });

});
