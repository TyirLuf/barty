<div class="customer-login">
    <div class="container">
        <div class="row justify-content-center"">
                <!--login area start-->
                <div class=" col-lg-6 col-md-6">
            <div class="account_form" data-aos="fade-up" data-aos-delay="0">
                <h3>Fazer Agendamento</h3>
                <form id="form_login" action="./pages/login/valida-login.php" method="POST">
                    <label class="mr-2">Serviço:</label>
                    <div class="sort-select-list d-flex align-items-center">

                        <fieldset>
                            <select name="speed" id="speed">
                                <option>Sort by average rating</option>
                                <option>Sort by popularity</option>
                                <option selected="selected">Sort by newness</option>
                                <option>Sort by price: low to high</option>
                                <option>Sort by price: high to low</option>
                                <option>Product Name: Z</option>
                            </select>
                        </fieldset>

                    </div>
                    <br>
                    <label class="mr-2">Funcionário:</label>
                    <div class="sort-select-list d-flex align-items-center">

                        <fieldset>
                            <select name="speed" id="speed">
                                <option>Sort by average rating</option>
                                <option>Sort by popularity</option>
                                <option selected="selected">Sort by newness</option>
                                <option>Sort by price: low to high</option>
                                <option>Sort by price: high to low</option>
                                <option>Product Name: Z</option>
                            </select>
                        </fieldset>

                    </div>
                    <br>
                    <div class="login_submit text-right">
    <button class="btn btn-md btn-black-default-hover mb-4" type="button" onclick="nextStep()">Próximo</button>
    <button class="btn btn-md btn-black-default-hover mb-4" type="button" onclick="prevStep()">Voltar</button>
</div>

                </form>
            </div>
        </div>
        <!--login area start-->
    </div>
</div>
<script>
    // Variável para controlar a etapa atual
    let currentStep = 1;

    // Função para avançar para a próxima etapa
    function nextStep() {
        // Oculta a etapa atual
        document.getElementById(`form_step${currentStep}`).style.display = 'none';

        // Incrementa o número da etapa
        currentStep++;

        // Exibe a próxima etapa
        document.getElementById(`form_step${currentStep}`).style.display = 'block';
    }

    // Função para voltar para a etapa anterior
    function prevStep() {
        // Oculta a etapa atual
        document.getElementById(`form_step${currentStep}`).style.display = 'none';

        // Decrementa o número da etapa
        currentStep--;

        // Exibe a etapa anterior
        document.getElementById(`form_step${currentStep}`).style.display = 'block';
    }
</script>