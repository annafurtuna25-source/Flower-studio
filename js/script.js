
document.addEventListener("DOMContentLoaded", function () {

    // Filtrarea produselor dupa pret

    const filterButtons = document.querySelectorAll(".filter-btn");
    const productCards = document.querySelectorAll(".product-card");

    filterButtons.forEach(button => {

        button.addEventListener("click", function () {

            filterButtons.forEach(btn => {
                btn.classList.remove("active");
            });

            this.classList.add("active");

            const filter = this.dataset.filter;

            productCards.forEach(card => {

                const price = Number(card.dataset.price);

                let visible = false;

                if (filter === "all") {
                    visible = true;
                }

                if (filter === "under500" && price < 500) {
                    visible = true;
                }

                if (filter === "500to700" &&
                    price >= 500 && price <= 700) {
                    visible = true;
                }

                if (filter === "over700" && price > 700) {
                    visible = true;
                }

                card.hidden = !visible;

            });

        });

    });


    // Selectarea cantitatii

    const quantity = document.getElementById("quantity");
    const minus = document.getElementById("minus");
    const plus = document.getElementById("plus");
    const totalPrice = document.getElementById("totalPrice");

    if (quantity && minus && plus && totalPrice) {

        function updateTotal() {

            const price = Number(totalPrice.dataset.price);

            const total = price * Number(quantity.value);

            totalPrice.textContent = total.toFixed(2) + " MDL";

        }

        minus.addEventListener("click", function () {

            if (Number(quantity.value) > 1) {

                quantity.value = Number(quantity.value) - 1;

                updateTotal();

            }

        });

        plus.addEventListener("click", function () {

            if (Number(quantity.value) < Number(quantity.max)) {

                quantity.value = Number(quantity.value) + 1;

                updateTotal();

            }

        });

    }


    // Butonul pentru cos

    const addToCart = document.getElementById("addToCart");
    const productMessage = document.getElementById("productMessage");

    if (addToCart && productMessage && quantity) {

        addToCart.addEventListener("click", function () {

            productMessage.textContent =
                "Ai selectat " + quantity.value +
                " buc. Funcționalitate demonstrativă.";

        });

    }


    // Butonul pentru favorite

    const favoriteButton = document.getElementById("favoriteButton");

    if (favoriteButton) {

        favoriteButton.addEventListener("click", function () {

            const active = this.classList.toggle("favorite-active");

            this.setAttribute("aria-pressed", String(active));

            this.textContent = active
                ? "♥ Selectat la favorite"
                : "♡ Adaugă la favorite";

        });

    }


    // Navigarea intre sectiunile profilului

    const profileTabs = document.querySelectorAll(".profile-tab");
    const profilePanels = document.querySelectorAll(".profile-panel");

    profileTabs.forEach(tab => {

        tab.addEventListener("click", function () {

            profileTabs.forEach(item => {
                item.classList.remove("active");
            });

            this.classList.add("active");

            profilePanels.forEach(panel => {

                panel.hidden = panel.id !== this.dataset.tab;

            });

        });

    });


    // Formularul profilului

    const profileForm = document.getElementById("profileForm");
    const profileMessage = document.getElementById("profileMessage");

    if (profileForm && profileMessage) {

        profileForm.addEventListener("submit", function (event) {

            event.preventDefault();

            profileMessage.textContent =
                "Datele au fost completate corect. " +
                "Salvarea permanentă va fi disponibilă ulterior.";

        });

    }

});
