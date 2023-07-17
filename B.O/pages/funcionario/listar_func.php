<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                    <h5 class="text-uppercase mb-0 mt-0 page-title">Funcioanários</h5>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                    <ul class="breadcrumb float-right p-0 mb-0">
                        <li class="breadcrumb-item"><a href="index.html"><i class="fas fa-home"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Funcioanários</a></li>
                        <li class="breadcrumb-item"><span> Todos Funcioanários</span></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 col-12">
            </div>
            <div class="col-sm-8 col-12 text-right add-btn-col">
                <a href="./?p=1" class="btn btn-primary float-right btn-rounded"><i class="fas fa-plus"></i> Adicionar Funcionários</a>
                <div class="view-icons">
                    <a href="./?p=3" class="grid-view btn btn-link"><i class="fas fa-th"></i></a>
                    <a href="#" class="list-view btn btn-link active"><i class="fas fa-bars"></i></a>
                </div>
            </div>
        </div>
        <div class="content-page">
            <div class="row filter-row">
                <div class="col-sm-6 col-md-3">
                    <div class="form-group form-focus">
                        <input type="text" class="form-control floating">
                        <label class="focus-label">Nome</label>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="form-group form-focus">
                        <input type="text" class="form-control floating">
                        <label class="focus-label">Especialização</label>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="form-group form-focus select-focus">
                        <select class="select form-control" id="filtro-funcao">
                            <option value="">Todos</option>
                            <?php
                            // Consulta SQL para obter as funções da tabela tipo_servico
                            $sqlFuncoes = "SELECT nome FROM tipo_servico";
                            $resultFuncoes = $conn->query($sqlFuncoes);

                            if ($resultFuncoes->num_rows > 0) {
                                while ($rowFuncao = $resultFuncoes->fetch_assoc()) {
                                    $nomeFuncao = $rowFuncao['nome'];
                                    echo "<option value=\"$nomeFuncao\">$nomeFuncao</option>";
                                }
                            }
                            ?>
                        </select>
                        <label class="focus-label">Função</label>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <a href="#" class="btn btn-search rounded btn-block mb-3"> Procurar </a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mb-3">
                    <div class="table-responsive">
                        <table class="table custom-table datatable">
                            <thead class="thead-light">
                                <tr>
                                    <th style="min-width:50px;">Nome</th>
                                    <th style="min-width:50px;">Função</th>
                                    <th style="min-width:50px;">Especialização</th>
                                    <th style="min-width:80px;">Data de Nascimento</th>
                                    <th style="min-width:50px;">Email</th>
                                    <th style="min-width:50px;">Telefone</th>
                                    <th class="text-right" style="width:15%;">Action</th>
                                </tr>
                            </thead>
                            <?php
                            // Consulta SQL para obter todos os funcionários
                            $sql = "
                                SELECT f.*, ts.nome
                                FROM funcionarios AS f
                                INNER JOIN tipo_servico AS ts ON f.funcao = ts.id
                                ORDER BY f.primeiro_nome ASC
                            ";
                            $result = $conn->query($sql);

                            // Exibir os funcionários
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $id = $row['func_id'];
                                    $email = $row['email'];
                                    $imagem = $row["imagem"];
                                    $primeiro_nome = $row["primeiro_nome"];
                                    $ultimo_nome = $row["ultimo_nome"];
                                    $funcao = $row["nome"];
                                    $habilidades = $row["especializacao"];
                                    $datanas = $row["data_nascimento"];
                                    $exp = $row["anos_experiencia"];
                                    $telefone = $row["telefone"];
                            ?>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <a href="profile.html" class="avatar"><?php echo substr($primeiro_nome, 0, 1); ?></a>
                                                <h2><a href="profile.html"><?php echo $primeiro_nome . ' ' . $ultimo_nome; ?> <span><?php echo $habilidades; ?></span></a></h2>
                                            </td>
                                            <td><?php echo $funcao; ?></td>
                                            <td><?php echo $habilidades; ?></td>
                                            <td><?php echo $datanas; ?></td>
                                            <td><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="5a373339323b3f362c382f2e2e3b28291a3f223b372a363f74393537"><?php echo $email; ?></a></td>
                                            <td><?php echo $telefone; ?></td>
                                            <td class="text-right">
                                                <a href="./?p=5&id=<?php echo $id; ?>" class="btn btn-primary btn-sm mb-1">
                                                    <i class="far fa-edit"></i>
                                                </a>
                                                <a class="btn btn-danger btn-sm mb-1" href="./?p=6&id=<?php echo $id; ?>">
                                                    <i class="far fa-trash-alt"></i>
                                                </a>

                                            </td>
                                        </tr>
                                    </tbody>
                            <?php
                                }
                            } else {
                                echo "Nenhum funcionário encontrado.";
                            }

                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<div id="delete_employee" class="modal" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content modal-md">
            <div class="modal-header">
                <h4 class="modal-title">Delete Employee</h4>
            </div>
            <form>
                <div class="modal-body">
                    <p>Are you sure want to delete this?</p>
                    <div class="m-t-20"> <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>