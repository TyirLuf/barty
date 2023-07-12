<style>
    .center-div {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 15vh;
        flex-direction: column;
    }

    label {
        display: flex;
        align-items: center;
    }
	button {
        display: inline-block;
        margin: 5px 5px 0 0;
        padding: 10px 30px;
        outline: 0;
        border: 0;
        cursor: pointer;
        background: #5185a8;
        color: #fff;
        text-decoration: none;
        font-family: arial, verdana, sans-serif;
        font-size: 14px;
        font-weight: 100;
    }

    input {
        width: 100%;
        margin: 0 0 5px 0;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 0;
        font-family: arial, verdana, sans-serif;
        font-size: 14px;
        box-sizing: border-box;
        -webkit-appearance: none;
    }

    .mbsc-page {
        padding: 1em;
    }

</style>

<!-- Importar CSS do Select2 -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" />

<div class="customer-login">
    <div class="container">
        <div class="row justify-content-center">
            <!--login area start-->
            <div class="col-lg-6 col-md-6">
                <div class="account_form" data-aos="fade-up" data-aos-delay="0">
                    <h3>Fazer Agendamento</h3>
                    <form id="form_login" action="./pages/login/valida-login.php" method="POST">

                        <div id="form_step1" class="center-div">
                            <div class="sort-select-list d-flex align-items-center">
                                <label class="mr-2">Serviço:</label>
                                <fieldset>
                                    <select name="servico" id="servico" class="select2">
                                        <?php
                                        // Conexão com o banco de dados
                                        // Consulta SQL para obter os nomes dos serviços
                                        $sqlServicos = "SELECT nome FROM servicos";
                                        $resultServicos = mysqli_query($conn, $sqlServicos);

                                        // Verifica se a consulta foi executada com sucesso
                                        if ($resultServicos && mysqli_num_rows($resultServicos) > 0) {
                                            while ($row = mysqli_fetch_assoc($resultServicos)) {
                                                echo '<option>' . $row['nome'] . '</option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                </fieldset>
                            </div>
                            <br><br>
                            <div class="sort-select-list d-flex align-items-center">
                                <label class="mr-2">Funcionário:</label>
                                <fieldset>
                                    <select name="funcionario" id="funcionario" class="select2">
                                        <?php
                                        // Consulta SQL para obter os nomes dos funcionários
                                        $sqlFuncionarios = "SELECT primeiro_nome, ultimo_nome FROM funcionarios";
                                        $resultFuncionarios = mysqli_query($conn, $sqlFuncionarios);

                                        // Verifica se a consulta foi executada com sucesso
                                        if ($resultFuncionarios && mysqli_num_rows($resultFuncionarios) > 0) {
                                            while ($row = mysqli_fetch_assoc($resultFuncionarios)) {
                                                echo '<option>' . $row['primeiro_nome'] . ' ' . $row['ultimo_nome'] . '</option>';
                                            }
                                        }

                                        // Fecha a conexão com o banco de dados
                                        mysqli_close($conn);
                                        ?>
                                    </select>
                                </fieldset>
                            </div>
                        </div>

                        <div id="form_step2" class="center-div" style="display: none;">
						<div mbsc-page class="demo-date-time-picker">
        <div style="height:100%">
                <div id="demo"></div>
    <div id="demo-timegrid"></div>
        </div>
    </div>
                        </div>

                        <br><br><br>
                        <div class="login_submit text-right">
                            <button class="btn btn-md btn-black-default-hover mb-4" type="button" onclick="nextStep()">Próximo</button>
                            <button class="btn btn-md btn-black-default-hover mb-4" type="button" onclick="prevStep()">Voltar</button>
                        </div>

                    </form>
                </div>
            </div>
            <!--login area end-->
        </div>
    </div>
</div>

<!-- Importar biblioteca Select2 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

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

    $(document).ready(function() {
        // Inicializa o Select2 nos elementos .select2
        $('.select2').select2();
    });
	mobiscroll.setOptions({
        locale: mobiscroll.localePtPT,       // Specify language like: locale: mobiscroll.localePl or omit setting to use default
        theme: 'ios',                        // Specify theme like: theme: 'ios' or omit setting to use default
        themeVariant: 'light'                // More info about themeVariant: https://docs.mobiscroll.com/5-25-1/javascript/calendar#opt-themeVariant
    });
    
    mobiscroll.datepicker('#demo', {
        controls: ['calendar', 'time'],      // More info about controls: https://docs.mobiscroll.com/5-25-1/javascript/calendar#opt-controls
        display: 'inline'                    // Specify display mode like: display: 'bottom' or omit setting to use default
    });
    
</script>
