    <?php

    $query = mysqli_query($conn, "SELECT * FROM clientes");
    if ($query->num_rows > 0) {
        while ($usuario = $query->fetch_array()) {
            $id = $usuario['cliente_id'];
        }
    }

    $resultado = mysqli_query($conn, "SELECT * FROM clientes WHERE cliente_id = $id");

    if (!$resultado) {
        echo "Erro ao executar a consulta: " . mysqli_error($conn);
        exit;
    }
    $linha = mysqli_fetch_assoc($resultado);

    $resultado2 = mysqli_query($conn, "SELECT nif FROM clientes WHERE cliente_id = $id");

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
                    <form class="row g-3" action="./pages/processa_agendamento.php" method="post">
                        <div class="col-md-6">
                            <label class="form-label text-white">Primeiro Nome</label>
                            <input type="text" value="<?php echo $linha['primeiro_nome']; ?>" placeholder="" class="form-control" id="nome">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label text-white">Ultimo Nome</label>
                            <input type="text" value="<?php echo $linha['ultimo_nome']; ?>" placeholder="" class="form-control" id="nome">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label text-white">Email</label>
                            <input type="email" value="<?php echo $linha['ultimo_nome']; ?>" placeholder="" class="form-control" id="nome">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label text-white">Nif</label>
                            <input type="number" value="<?php echo $linha2['nif']; ?>" class="form-control" id="cpf">
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

                        <center>
                            <h4 style="color:white">Serviços</h4>
                            <p style="color:white">Escolha um Serviço!</p>
                        </center>
                        <div class="col-md-6">
                            <label class="form-label" style="color:white">Serviços</label>
                            <select class="form-select" name="funcionario">
                                <option value="aleatorio">Aleatório</option>
                                <?php
                                $funcionariosQuery = mysqli_query($conn, "SELECT * FROM servicos");
                                if ($funcionariosQuery->num_rows > 0) {
                                    while ($funcionario = $funcionariosQuery->fetch_array()) {
                                        $servicoid = $funcionario['servico_id'];
                                        $nome = $funcionario['nome'];
                                        $preco = $funcionario['preco'];
                                        $nomeCompleto = $nome . ' - $' . $preco;
                                        $nomeVisivel = $nome;
                                        echo '<option value="' . $servicoid . '" data-preco="' . $preco . '">' . $nomeCompleto . '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>




                        <!--Funcionairo -->
                        <center>
                            <h4 style="color:white">Funcionário</h4>
                            <p style="color:white">Escolha um funcionário disponíveis!</p>
                        </center>

                        <div class="col-md-6">
                            <label class="form-label" style="color:white">Funcionários</label>
                            <select class="form-select" name="funcionario">
                                <option value="Aleatório">Aleatório</option>
                                <?php
                                $funcionariosQuery = mysqli_query($conn, "SELECT func_id, primeiro_nome, ultimo_nome FROM funcionarios");
                                if ($funcionariosQuery->num_rows > 0) {
                                    while ($funcionario = $funcionariosQuery->fetch_array()) {
                                        $idFuncionario = $funcionario['func_id'];
                                        $primeiroNome = $funcionario['primeiro_nome'];
                                        $ultimoNome = $funcionario['ultimo_nome'];
                                        $nomeCompleto = $primeiroNome . ' ' . $ultimoNome;
                                        echo '<option value="' . $idFuncionario . '">' . $nomeCompleto . '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <br><br><br><br> <br><br>


                        <input type="submit" name="btnPagamento" value="Realizar Agendamento" class="btn btn-outline-warning">

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