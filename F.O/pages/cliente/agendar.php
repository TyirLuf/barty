<?php
if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    $idCliente = $user['cliente_id'];
    $email = $user['email'];
    $primeiroNome = $user['primeiro_nome'];
    $ultimoNome = $user['ultimo_nome'];
    $nomeCompleto = $primeiroNome . ' ' . $ultimoNome;
}
?>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: "Inter", Arial, Helvetica, sans-serif;
    }

    .formbold-mb-5 {
        margin-bottom: 20px;
    }

    .formbold-pt-3 {
        padding-top: 12px;
    }

    .formbold-main-wrapper {
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 48px;
    }

    .formbold-form-wrapper {
        margin: 0 auto;
        max-width: 550px;
        width: 100%;
        background: white;
        border: 1px solid #ccc;
        /* Adiciona uma borda */
        border-radius: 8px;
        /* Adiciona borda arredondada */
        padding: 24px;
    }

    .formbold-form-label {
        display: block;
        font-weight: 500;
        font-size: 16px;
        color: #07074d;
        margin-bottom: 12px;
    }

    .formbold-form-label-2 {
        font-weight: 600;
        font-size: 20px;
        margin-bottom: 20px;
    }

    .formbold-form-input {
        width: 100%;
        padding: 12px 24px;
        border-radius: 6px;
        border: 1px solid #e0e0e0;
        background: white;
        font-weight: 500;
        font-size: 16px;
        color: #6b7280;
        outline: none;
        resize: none;
    }

    .formbold-form-input:focus {
        border-color: #b19361;
        box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.05);
    }

    .formbold-btn {
        text-align: center;
        font-size: 16px;
        border-radius: 6px;
        padding: 14px 32px;
        border: none;
        font-weight: 600;
        background-color: #b19361;
        color: white;
        width: 100%;
        cursor: pointer;
    }

    .formbold-btn:hover {
        box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.05);
    }

    .formbold--mx-3 {
        margin-left: -12px;
        margin-right: -12px;
    }

    .formbold-px-3 {
        padding-left: 12px;
        padding-right: 12px;
    }

    .flex {
        display: flex;
    }

    .flex-wrap {
        flex-wrap: wrap;
    }

    .w-full {
        width: 100%;
    }

    /*seletc */
    .select-btn {
        display: flex;
        height: 50px;
        align-items: center;
        justify-content: space-between;
        padding: 0 16px;
        border-radius: 8px;
        cursor: pointer;
        background-color: #fff;
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
    }

    .select-btn .btn-text {
        font-size: 17px;
        font-weight: 400;
        color: #333;
    }

    .select-btn .arrow-dwn {
        display: flex;
        height: 21px;
        width: 21px;
        color: #fff;
        font-size: 14px;
        border-radius: 50%;
        background: #b19361;
        align-items: center;
        justify-content: center;
        transition: 0.3s;
    }

    .select-btn.open .arrow-dwn {
        transform: rotate(-180deg);
    }

    .list-items {
        position: relative;
        margin-top: 15px;
        border-radius: 8px;
        padding: 16px;
        background-color: #fff;
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
        max-height: 220px;
        overflow-y: scroll;
        overflow-x: hidden;
        display: none;
    }

    .select-btn.open~.list-items {
        display: block;
    }

    /* Always show the scrollbar of the dropdown */
    .select-btn.open~.list-items::-webkit-scrollbar {
        width: 8px;
        height: 0;
    }

    .select-btn.open~.list-items::-webkit-scrollbar-thumb {
        background-color: rgba(0, 0, 0, .2);
        border-radius: 8px;
    }

    .select-btn.open~.list-items::-webkit-scrollbar-thumb:hover {
        background-color: rgba(0, 0, 0, .3);
    }

    .list-items .item {
        display: flex;
        align-items: center;
        list-style: none;
        height: 50px;
        cursor: pointer;
        transition: 0.3s;
        padding: 0 15px;
        border-radius: 8px;
    }

    .list-items .item:hover {
        background-color: #e7edfe;
    }

    .item .item-text {
        font-size: 16px;
        font-weight: 400;
        color: #333;
    }

    .item .checkbox {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 16px;
        width: 16px;
        border-radius: 4px;
        margin-right: 12px;
        border: 1.5px solid #c0c0c0;
        transition: all 0.3s ease-in-out;
    }

    .item.checked .checkbox {
        background-color: rgb(91, 73, 255);
        border-color: rgb(91, 73, 255);
    }

    .checkbox .check-icon {
        color: #fff;
        font-size: 11px;
        transform: scale(0);
        transition: all 0.2s ease-in-out;
    }

    .item.checked .check-icon {
        transform: scale(1);
    }

    @media (min-width: 540px) {
        .sm\:w-half {
            width: 50%;
        }
    }
</style>

<div class="formbold-main-wrapper">
    <!-- Author: FormBold Team -->
    <!-- Learn More: https://formbold.com -->
    <div class="formbold-form-wrapper">
        <form action="./pages/processos/processa_agendamento1.php" method="POST">
            <input type="hidden" name=" idCliente" value="<?php echo $idCliente; ?>">



            <?php if (isset($_SESSION['user'])) { ?>
    <div class="formbold-mb-5">
        <label for="name" class="formbold-form-label">Nome</label>
        <input type="text" name="name" id="name" class="formbold-form-input" value="<?php echo $nomeCompleto; ?>" readonly />
    </div>
    <div class="formbold-mb-5">
        <label for="email" class="formbold-form-label">Email</label>
        <input type="email" name="email" id="email" class="formbold-form-input" value="<?php echo $email; ?>" readonly />
    </div>
<?php } else { ?>
    <div class="formbold-mb-5">
        <label for="name" class="formbold-form-label">Nome</label>
        <input type="text" name="name" id="name" class="formbold-form-input" />
    </div>
    <div class="formbold-mb-5">
        <label for="email" class="formbold-form-label">Email</label>
        <input type="email" name="email" id="email" class="formbold-form-input" />
    </div>
<?php } ?>

            <div class="formbold-mb-5">
                <label for="servico" class="formbold-form-label">Serviços</label>
                <div class="select-btn">
                    <span class="btn-text">Nenhum dos listados</span>
                    <span class="arrow-dwn">
                        <i class="fa-solid fa-chevron-down"></i>
                    </span>
                </div>
                <?php
                $sql = "SELECT servico_id, nome, preco FROM servicos";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    echo '<ul class="list-items">';
                    while ($row = $result->fetch_assoc()) {
                        $servicoId = $row["servico_id"];
                        $servicoNome = $row["nome"];
                        $preco = $row["preco"];
                        echo '<li class="item">';
                        echo '<input type="checkbox" class="checkbox" name="servico_id[]" value="' . $servicoId . '" >';
                        echo '<span class="item-text">' . $servicoNome . '</span>';
                        echo '<span class="preco-total" style="display: none;">' . $preco . '</span>';
                        echo '</li>';
                    }
                    echo '</ul>';
                } else {
                    echo "Nenhum serviço encontrado.";
                }
                ?>
            </div>

            <input type="hidden" name="preco_servico" id="preco_servico" value="0">
            <br>

            <?php
            $sql = "SELECT func_id, primeiro_nome, ultimo_nome FROM funcionarios ORDER BY primeiro_nome";
            $result = $conn->query($sql);

            // Verificar se a consulta retornou resultados
            if ($result->num_rows > 0) {
                // Montar as opções do menu suspenso com os nomes dos funcionários
                echo '<div class="formbold-mb-5">';
                echo '<label for="funcionario" class="formbold-form-label">Funcionário</label>';
                echo '<div class="default-form-box">';
                echo '<select class="country_option nice-select wide" name="funcionario" id="funcionario">';
                echo '<option value="aleatorio">Aleatório</option>';
                while ($row = $result->fetch_assoc()) {
                    $funcId = $row["func_id"];
                    $primeiroNome = $row["primeiro_nome"];
                    $ultimoNome = $row["ultimo_nome"];
                    $nomeCompleto = $primeiroNome . ' ' . $ultimoNome;
                    echo '<option value="' . $funcId . '">' . $nomeCompleto . '</option>';
                }

                echo '</select>';
                echo '</div>';
                echo '</div>';
            } else {
                echo "Nenhum funcionário encontrado.";
            }
            ?>

            <br> <br> <br>
            <div class="flex flex-wrap formbold--mx-3">
                <div class="w-full sm:w-half formbold-px-3">
                    <div class="formbold-mb-5 w-full">
                        <label for="date" class="formbold-form-label"> Data </label>
                        <input type="date" name="data" id="date" class="formbold-form-input" />
                    </div>
                </div>
                <div class="w-full sm:w-half formbold-px-3">
                    <div class="formbold-mb-5">
                        <label for="time" class="formbold-form-label">Hora</label>
                        <input type="time" name="hora" id="time" class="formbold-form-input" required />
                    </div>
                </div>


            </div>

            <div class="offcanvas-cart-total-price">
                <span class="offcanvas-cart-total-price-text">Subtotal:</span>
                <span class="offcanvas-cart-total-price-value">0.00€</span>
            </div>


            <div>
                <input type="hidden" name="id_cliente" value="<?php echo $id; ?>">
                <button class="formbold-btn" type="submit">Fazer Agendamento</button>
            </div>
        </form>
    </div>
</div>

<script>
    const selectBtn = document.querySelector(".select-btn");
    const items = document.querySelectorAll(".item");
    const dateInput = document.getElementById("date");
    const timeInput = document.getElementById("time");
    const precoTotalElement = document.querySelector(".offcanvas-cart-total-price-value");
    let checkedCount = 0;
    let precoTotal = 0;

    selectBtn.addEventListener("click", () => {
        selectBtn.classList.toggle("open");
    });

    dateInput.addEventListener("input", () => {
        const selectedDate = new Date(dateInput.value);
        const selectedDay = selectedDate.getDay(); // 0 = Domingo, 1 = Segunda, ..., 6 = Sábado

        if (selectedDay === 0) {
            dateInput.setCustomValidity("Selecione uma data que não seja domingo.");
        } else {
            dateInput.setCustomValidity("");
        }
    });

    timeInput.addEventListener("input", () => {
        const selectedTime = timeInput.value;
        const [hours, minutes] = selectedTime.split(":");
        const selectedDate = new Date();
        selectedDate.setHours(hours);
        selectedDate.setMinutes(minutes);

        const minTime = new Date();
        minTime.setHours(9);
        minTime.setMinutes(0);

        const maxTime = new Date();
        maxTime.setHours(18);
        maxTime.setMinutes(0);

        if (selectedDate < minTime || selectedDate > maxTime) {
            timeInput.setCustomValidity("Selecione um horário entre 9:00 e 18:00.");
        } else {
            timeInput.setCustomValidity("");
        }
    });

    items.forEach(item => {
        const checkbox = item.querySelector("input[type=checkbox]");

        item.addEventListener("click", () => {
            if (item.classList.contains("checked")) {
                item.classList.remove("checked");
                checkbox.checked = false;
                checkedCount--;
                precoTotal -= parseFloat(item.querySelector(".preco-total").textContent);
            } else {
                if (checkedCount < 2) {
                    item.classList.add("checked");
                    checkbox.checked = true;
                    checkedCount++;
                    precoTotal += parseFloat(item.querySelector(".preco-total").textContent);
                } else {
                    return; // Se já houver 2 itens selecionados, não faz nada
                }
            }
            precoTotalElement.textContent = precoTotal.toFixed(2) + ' €';

            let btnText = document.querySelector(".btn-text");
            if (checkedCount > 0) {
                btnText.innerText = `${checkedCount} Selected`;
            } else {
                btnText.innerText = "Selecionar Serviço";
            }

            // Atualizar o valor do campo oculto com o preço total
            document.getElementById("preco_servico").value = precoTotal.toFixed(2);

        });
    });
</script>