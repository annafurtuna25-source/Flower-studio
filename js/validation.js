document.querySelectorAll(".validate-form").forEach(form => {

    const fields = form.querySelectorAll("[data-validate]");

    function validateField(field) {
        const value = field.value.trim();
        const rule = field.dataset.validate;
        let message = "";

        if (value === "") {
            message = "Acest câmp este obligatoriu.";
        } else {
            switch (rule) {

                case "name":
                    if (value.length < 2) {
                        message = "Introdu minimum 2 caractere.";
                    }
                    break;

                case "email":
                    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

                    if (!emailPattern.test(value)) {
                        message = "Adresa de e-mail este invalidă.";
                    }
                    break;

                case "password":
                    if (field.value.length < 8) {
                        message = "Parola trebuie să conțină minimum 8 caractere.";
                    }
                    break;

                case "confirm":
                    const password = form.querySelector(
                        '[name="password"]'
                    );

                    if (field.value !== password.value) {
                        message = "Parolele nu coincid.";
                    }
                    break;

                case "phone":
                    if (!/^\+?[0-9\s-]{8,16}$/.test(value)) {
                        message = "Numărul de telefon este invalid.";
                    }
                    break;

                case "message":
                    if (value.length < 10) {
                        message = "Introdu minimum 10 caractere.";
                    }
                    break;

                case "price":
                    if (!Number.isFinite(Number(value)) ||
                        Number(value) <= 0) {
                        message = "Prețul trebuie să fie mai mare decât 0.";
                    }
                    break;

                case "stock":
                    if (!Number.isInteger(Number(value)) ||
                        Number(value) < 0) {
                        message = "Introdu o cantitate întreagă pozitivă sau 0.";
                    }
                    break;
            }
        }

        const error = field.closest(".form-group")
                           .querySelector(".field-error");

        error.textContent = message;

        field.classList.toggle("invalid", message !== "");
        field.classList.toggle("valid", message === "");

        field.setAttribute(
            "aria-invalid",
            message !== "" ? "true" : "false"
        );

        return message === "";
    }

    fields.forEach(field => {
        field.addEventListener("input", () => {
            validateField(field);

            const success = form.querySelector(".form-success");

            if (success) {
                success.hidden = true;
            }

            if (field.name === "password") {
                const confirm = form.querySelector(
                    '[name="confirm_password"]'
                );

                if (confirm && confirm.value !== "") {
                    validateField(confirm);
                }
            }
        });

        field.addEventListener("blur", () => {
            validateField(field);
        });
    });

    form.addEventListener("submit", event => {
        event.preventDefault();

        let valid = true;

        fields.forEach(field => {
            if (!validateField(field)) {
                valid = false;
            }
        });

        const success = form.querySelector(".form-success");

        if (success) {
            success.hidden = !valid;
        }

        if (!valid) {
            form.querySelector(".invalid")?.focus();
        }
    });
});