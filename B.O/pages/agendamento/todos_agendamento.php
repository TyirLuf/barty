<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                    <h5 class="text-uppercase mb-0 mt-0 page-title">Agendamentos</h5>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                    <ul class="breadcrumb float-right p-0 mb-0">
                        <li class="breadcrumb-item"><a href="./"><i class="fas fa-home"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="">Agendamentos</a></li>
                        <li class="breadcrumb-item"><span>Todos Agendamentos</span></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="content-page">
            <div class="row">
                <div class="col-sm-8 col-6">
                </div>
                <div class="col-sm-4 col-6 text-right add-btn-col">
                    <a href="#" class="btn btn-primary btn-rounded" data-toggle="modal" data-target="#add_tax"><i class="fas fa-plus"></i> Add Tax</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table custom-table mb-0">
                            <thead class="thead-light">
                                <tr>
                                    <th>Nome Cliente</th>
                                    <th>Serviço</th>
                                    <th>Funcionario</th>
                                    <th>Hora</th>
                                    <th>Data</th>
                                    <th>Estado</th>
                                    <th>Preço Total</th>
                                    <th class="text-right">Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // Consulta SQL para obter todos os agendamentos
                                $sql = "SELECT a.*, c.primeiro_nome AS cliente_primeiro_nome, c.ultimo_nome AS cliente_ultimo_nome, f.primeiro_nome AS func_primeiro_nome, f.ultimo_nome AS func_ultimo_nome, s.nome As servico_nome
                      FROM agendamentos a
                      JOIN clientes c ON a.id_cliente = c.cliente_id
                      JOIN servicos s ON a.id_servico = s.servico_id
                      JOIN funcionarios f ON a.id_funcionario = f.func_id
                      ORDER BY a.data ASC";
                                $result = $conn->query($sql);

                                // Exibir os agendamentos
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        $id = $row['id'];
                                        $cliente_primeiro_nome = $row['cliente_primeiro_nome'];
                                        $cliente_ultimo_nome = $row['cliente_ultimo_nome'];
                                        $func_primeiro_nome = $row['func_primeiro_nome'];
                                        $func_ultimo_nome = $row['func_ultimo_nome'];
                                        $servico_nome = $row['servico_nome'];
                                        $servico_id = $row["id_servico"];
                                        $hora = $row["hora"];
                                        $data = $row["data"];
                                        $preco_total = $row["preco_total"];

                                ?>

                                        <tr>
                                            <td> <?php echo $cliente_primeiro_nome . ' ' . $cliente_ultimo_nome; ?></td>
                                            <td> <?php echo $servico_nome; ?></td>
                                            <td> <?php echo $func_primeiro_nome . ' ' . $func_ultimo_nome; ?></td>
                                            <td><?php echo $hora; ?></td>
                                            <td><?php echo $data; ?></td>
                                            <td>

                                                <?php
                                                $status = $row['status'];

                                                if ($status == 'por realizar') {
                                                    echo '<a class="btn btn-white btn-sm btn-rounded " aria-expanded="false">
                <i class="far fa-dot-circle text-danger"></i> Por realizar
            </a>
          ';
                                                } elseif ($status == 'cancelado') {
                                                    echo '<a class="btn btn-white btn-sm btn-rounded " aria-expanded="false">
                <i class="far fa-dot-circle text-danger"></i> Cancelado
            </a>';
                                                } elseif ($status == 'realizado') {
                                                    echo '<a class="btn btn-white btn-sm btn-rounded " aria-expanded="false">
                <i class="far fa-dot-circle text-success"></i> Realizado
            </a>';
                                                }
                                                ?>

                                            </td>
                                            <td><?php echo $preco_total; ?> €</td>
                                            <td class="text-right">
                                                <div class="dropdown dropdown-action">
                                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fas fa-ellipsis-v"></i></a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="#edit_tax?id=<?php echo $id; ?>" data-toggle="modal" data-target="#edit_tax" title="Edit">
                                                            <i class="fas fa-pencil-alt m-r-5"></i> Editar
                                                        </a>


                                                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_tax" title="Delete"><i class="fas fa-trash-alt m-r-5"></i> Deletar</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                <?php
                                    }
                                } else {
                                    echo "Nenhum agendamento encontrado.";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="add_tax" class="modal" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content modal-md">
                <div class="modal-header">
                    <h4 class="modal-title">Add Tax</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label>Tax Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Tax Percentage (%) <span class="text-danger">*</span></label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <select class="form-control select">
                                <label>status <span class="text-danger">*</span></label>
                                <option>Pending</option>
                                <option>Approved</option>
                            </select>
                        </div>
                        <div class="m-t-20 text-center">
                            <button class="btn btn-primary btn-lg">Create Tax</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div id="edit_tax" class="modal" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content modal-md">
            <div class="modal-header">
                <h4 class="modal-title">Edit Tax</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <?php
                // Recupera o ID do parâmetro da URL
                $id = isset($_GET['id']) ? $_GET['id'] : '';
                if (!empty($id)) {
                    // Consulta SQL para obter os dados do agendamento com base no ID
                    $sqlAgendamento = "SELECT a.*, c.primeiro_nome AS cliente_primeiro_nome, c.ultimo_nome AS cliente_ultimo_nome, f.primeiro_nome AS func_primeiro_nome, f.ultimo_nome AS func_ultimo_nome, s.nome AS servico_nome
                        FROM agendamentos a
                        JOIN clientes c ON a.id_cliente = c.cliente_id
                        JOIN servicos s ON a.id_servico = s.servico_id
                        JOIN funcionarios f ON a.id_funcionario = f.func_id
                        WHERE a.id = '$id'";
                    $resultAgendamento = $conn->query($sqlAgendamento);

                    if ($resultAgendamento->num_rows > 0) {
                        $rowAgendamento = $resultAgendamento->fetch_assoc();
                        $cliente_nome = $rowAgendamento["cliente_primeiro_nome"];
                    } else {
                        echo 'O ID não corresponde a nenhum agendamento existente!';
                        // O ID não corresponde a nenhum agendamento existente, faça o tratamento adequado (exibir mensagem de erro, redirecionar, etc.)
                    }
                }
                ?>
                <form>
                    <div class="form-group">
                        <label>Nome Cliente <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" value="<?php echo isset($rowAgendamento) ? $rowAgendamento['cliente_primeiro_nome'] : ''; ?>">
                    </div>
                    <div class="form-group">
                        <label>Funcionário<span class="text-danger">*</span></label>
                        <select class="form-control select" name="funcionario">
                            <?php
                            // Consulta SQL para obter todos os funcionários
                            $sqlFuncionarios = "SELECT * FROM funcionarios Order by primeiro_nome asc";
                            $resultFuncionarios = $conn->query($sqlFuncionarios);

                            if ($resultFuncionarios->num_rows > 0) {
                                while ($rowFuncionario = $resultFuncionarios->fetch_assoc()) {
                                    $func_id = $rowFuncionario['func_id'];
                                    $func_nome = $rowFuncionario['primeiro_nome'];
                                    $func_ultimo = $rowFuncionario['ultimo_nome'];

                                    // Exibir uma opção para cada funcionário
                                    echo '<option value="' . $func_id . '">' . $func_nome . ' ' . $func_ultimo . '</option>';
                                }
                            } else {
                                echo '<option>Nenhum funcionário encontrado</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Serviço<span class="text-danger">*</span></label>
                        <select class="form-control select" name="servico">
                            <?php
                            // Consulta SQL para obter todos os serviços
                            $sqlServicos = "SELECT * FROM servicos";
                            $resultServicos = $conn->query($sqlServicos);

                            if ($resultServicos->num_rows > 0) {
                                while ($rowServico = $resultServicos->fetch_assoc()) {
                                    $servicoId = $rowServico['servico_id'];
                                    $servicoNome = $rowServico['nome'];
                                    $selected = ($servicoId == $rowAgendamento['id_servico']) ? 'selected' : '';

                                    // Exibir uma opção para cada serviço
                                    echo "<option value=\"$servicoId\" $selected>$servicoNome</option>";
                                }
                            } else {
                                echo '<option>Nenhum serviço encontrado</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Data<span class="text-danger">*</span></label>
                        <input type="date" class="form-control datetimepicker-input datetimepicker" name="data" data-toggle="datetimepicker">
                    </div>
                    <div class="form-group">
                        <label>Hora<span class="text-danger">*</span></label>
                        <input type="time" class="form-control datetimepicker-input datetimepicker" name="hora">
                    </div>
                    <div class="m-t-20 text-center">
                        <button class="btn btn-primary btn-lg mb-3">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
