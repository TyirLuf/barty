<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                    <h5 class="text-uppercase mb-0 mt-0 page-title">Funcioanarios</h5>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                    <ul class="breadcrumb float-right p-0 mb-0">
                        <li class="breadcrumb-item"><a href="./"><i class="fas fa-home"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Funcioanarios</a></li>
                        <li class="breadcrumb-item"><span> Todos Funcioanarios</span></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 col-12">
            </div>
            <div class="col-sm-8 col-12 text-right add-btn-col">
                <a href="./?p=1" class="btn btn-primary btn-rounded float-right"><i class="fas fa-plus"></i> Add funcionario</a>
                <div class="view-icons">
                    <a href="#" class="grid-view btn btn-link active"><i class="fas fa-th"></i></a>
                    <a href="./?p=4" class="list-view btn btn-link"><i class="fas fa-bars"></i></a>
                </div>
            </div>
        </div>
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


        <div class="row staff-grid-row">

            <?php
            // Consulta SQL para obter todos os funcionários e suas funções
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
                    $imagem = $row["imagem"];
                    $id = $row["func_id"];
                    $primeiro_nome = $row["primeiro_nome"];
                    $ultimo_nome = $row["ultimo_nome"];
                    $funcao = $row["nome"];
                    $habilidades = $row["especializacao"];
            ?>
                    <div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
                        <div class="profile-widget">
                            <div class="profile-img">
                                <?php if (!empty($imagem)) { ?>
                                    <a href="profile.html"><img class="avatar" src="../<?php echo $imagem; ?>" alt=""></a>
                                <?php } else { ?>
                                    <a href="student-profile.html" class="avatar"><?php echo substr($primeiro_nome, 0, 1); ?></a>
                                <?php } ?>
                            </div>

                            <div class="dropdown profile-action">
                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fas fa-ellipsis-v"></i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="./?p=4&id=<?php echo $id; ?>"><i class="fas fa-pencil-alt m-r-5"></i> Edit</a>
                                    <a class="dropdown-item" href="./?p=5&id=<?php echo $id; ?>"><i class="fas fa-trash-alt m-r-5"></i> Delete</a>
                                </div>
                            </div>
                            <h4 class="user-name m-t-10 m-b-0 text-ellipsis"><a href="profile.html"><?php echo $primeiro_nome . " " . $ultimo_nome; ?></a></h4>
                            <div class="small text-muted"><?php echo $funcao; ?></div>
                        </div>
                    </div>
            <?php
                }
            } else {
                echo "Nenhum funcionário encontrado.";
            }
            ?>


        </div>

    </div>
</div>

<div id="delete_employee" class="modal" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content modal-md">
            <div class="modal-header">
                <h4 class="modal-title">Deletar Funcioanarios</h4>
            </div>
            <form>
                <div class="modal-body">
                    <p>Tem certeza de que deseja excluir isso?</p>
                    <div class="m-t-20"> <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>