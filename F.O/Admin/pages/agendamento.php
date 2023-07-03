    <?php

    $query = mysqli_query($conn, "SELECT * FROM clientes");
    if ($query->num_rows > 0) {
        while ($usuario = $query->fetch_array()) {
            $id = $usuario['cliente_id'];
        }
    }

    $resultado = mysqli_query($conn, "SELECT primeiro_nome, ultimo_nome FROM cliente WHERE cliente_id = $id");

    if (!$resultado) {
        echo "Erro ao executar a consulta: " . mysqli_error($conn);
        exit;
    }
    $linha = mysqli_fetch_assoc($resultado);

    $resultado2 = mysqli_query($conn, "SELECT nif FROM cliente WHERE cliente_id = $id");

    if (!$resultado2) {
        echo "Erro ao executar a consulta: " . mysqli_error($conn);
        exit;
    }
    $linha2 = mysqli_fetch_assoc($resultado2);
    //trazer dados do usuario

    ?>

    <div class="container">
        <div class="row ">
            <div class="col-sm-6 offset-sm-3 ">
                <div class="shadow p-3 mb-5 bg-dark rounded ">
                    <!--Cliente-->

                    <center>
                        <h4 style="color:white;">Cliente</h4>
                    </center>
                    <form class="row g-3" action="cadastra_agendamento.php" method="post">
                        <div class="col-md-6">
                            <label class="form-label text-white">Nome</label>
                            <input type="text" value="<?php echo $linha['primeiro_nome']; ?>" placeholder="" class="form-control" id="nome">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label text-white">Nif</label>
                            <input type="number" value="<?php echo $linha2['cpf']; ?>" class="form-control" id="cpf">
                        </div>
                        <!--Cliente-->
                        <center>
                            <h4 style="color:white;">Agendamento</h4>
                        </center>
                        <label class="text-white"><b>Data</b></label>
                        <input type="date" name="data" placeholder="Digite a data para agendar" required="required" class="form-control" />
                        <br />
                        <label class="text-white"><b>Hora</b></label>
                        <input type="time" name="hora" placeholder="Digite a hora para agendar" required="required" class="form-control" />
                        <br />
                        <!--<input type="submit" value="Cadastrar" class="btn btn-outline-success" name='cadastrar' />
                    </form>-->


                        <!--Cliente-->


                        <div class="modal-body" style="color:white">
                            <center>
                                <h1>Serviços</h1>
                                <p>Escolha os serviços desejados!</p>
                            </center>
                            <?php
                            $servicosQuery = mysqli_query($conn, "SELECT nome, preco FROM servico");
                            if ($servicosQuery->num_rows > 0) {
                                while ($servico = $servicosQuery->fetch_array()) {
                                    $nome = $servico['nome'];
                                    $preco = $servico['preco'];
                                    echo '
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="servicos[]" value="' . $preco . '">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        ' . $nome . ' = € ' . $preco . '
                                    </label>
                                </div>
                                ';
                                }
                            }
                            ?>
                        </div>


                        <!--Pagamento-->
                        <center>
                            <h4 style="color:white">Pagamento</h4>
                            <p style="color:white">Escolha a forma de pagamento!</p>
                        </center>

                        <div class="col-md-6">
                            <label class="form-label" style="color:white">Forma de Pagamento</label>
                            <select id="inputState" class="form-select">
                                <option selected>Pagamento presencial</option>
                                <option>Pix</option>
                                <options id="presencial">Cartão de Crédito</option>
                                    <option>Boleto Bancário</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" style="color:white">Código Promocional</label>
                            <input type="text" class="form-control" id="inputZip">
                        </div>
                        <br />
                        <input type="submit" name="btnPagamento" value="Realizar Pagamento" class="btn btn-outline-success">

                        <!--Serviços-->

                    </form>
                    <?php
                    if (isset($_POST['btnPagamento'])) {

                        echo "<script language='javascript' type/javascript'>
            alert('Pagamento realizado com sucesso!');
            window.location.href='../home/index.html';
            </script>";
                    }
                    ?>
                </div>
            </div>


        </div><!--shadow-->
    </div><!--col-->
    </div><!--row-->
    </div><!--container-->