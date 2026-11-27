
const buttons = document.querySelectorAll(".filter-btn");
const products = document.querySelectorAll(".product-card");

buttons.forEach(button => {

    button.addEventListener("click", function () {

        const filter = this.dataset.filter;

        buttons.forEach(btn => {
            btn.classList.remove("active");
        });

        this.classList.add("active");

        products.forEach(product => {

            const price = Number(product.dataset.price);

            let visible = false;

            if (filter === "all") {
                visible = true;
            } else if (filter === "low") {
                visible = price < 500;
            } else if (filter === "medium") {
                visible = price >= 500 && price <= 700;
            } else if (filter === "high") {
                visible = price > 700;
            }

            product.style.display = visible ? "" : "none";

        });

    });

});
