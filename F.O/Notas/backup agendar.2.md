# backup agendar.2

<script>
    const selectBtn = document.querySelector(".select-btn");
    const items = document.querySelectorAll(".item");
    const checkboxServicos = document.querySelectorAll(".checkbox");
    const precoTotalElement = document.querySelector(".offcanvas-cart-total-price-value");
    let checkedCount = 0;

    selectBtn.addEventListener("click", () => {
        selectBtn.classList.toggle("open");
    });

    checkboxServicos.forEach(checkbox => {
        checkbox.addEventListener('change', () => {
            let precoTotal = 0;
            checkboxServicos.forEach(checkbox => {
                if (checkbox.checked) {
                    const preco = parseFloat(checkbox.parentElement.querySelector('.preco-total').textContent);
                    precoTotal += preco;
                }
            });
            precoTotalElement.textContent = '€' + precoTotal.toFixed(2);
        });
    });

    items.forEach(item => {
        item.addEventListener("click", () => {
            if (item.classList.contains("checked")) {
                item.classList.remove("checked");
                checkedCount--;
            } else {
                if (checkedCount < 2) {
                    item.classList.add("checked");
                    checkedCount++;
                }
            }

            const checkbox = item.querySelector("input[type=checkbox]");
            checkbox.checked = item.classList.contains("checked");

            let btnText = document.querySelector(".btn-text");
            if (checkedCount > 0) {
                btnText.innerText = `${checkedCount} Selected`;
            } else {
                btnText.innerText = "Selecionar Serviço";
            }
        });
    });
</script>













    items.forEach(item => {
    item.addEventListener("click", () => {
        const checkbox = item.querySelector("input[type=checkbox]");
        checkbox.checked = !checkbox.checked;

        if (checkbox.checked) {
            if (checkedCount < 2) {
                item.classList.add("checked");
                checkedCount++;
            } else {
                checkbox.checked = false;
            }
        } else {
            item.classList.remove("checked");
            checkedCount--;
        }

        updatePrecoTotal();
    });

    const itemText = item.querySelector(".item");
    itemText.addEventListener("click", () => {
        const checkbox = item.querySelector("input[type=checkbox]");
        checkbox.checked = !checkbox.checked;

        if (checkbox.checked) {
            if (checkedCount < 2) {
                item.classList.add("checked");
                checkedCount++;
            } else {
                checkbox.checked = false;
            }
        } else {
            item.classList.remove("checked");
            checkedCount--;
        }

        updatePrecoTotal();
    });
});

function updatePrecoTotal() {
    let precoTotal = 0;
    checkboxServicos.forEach(checkbox => {
        if (checkbox.checked) {
            const preco = parseFloat(checkbox.parentElement.querySelector('.preco-total').textContent);
            precoTotal += preco;
        }
    });
    precoTotalElement.textContent = '€' + precoTotal.toFixed(2);
}