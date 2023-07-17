<?php
$id = isset($_GET['id']) ? $_GET['id'] : '';

// Verificar se o ID é válido
if (!empty($id)) {
    // Consulta SQL para obter os dados do funcionário com base no ID
    $sqlFuncionario = "SELECT f.primeiro_nome, f.ultimo_nome, f.telefone, f.email, f.data_nascimento, f.especializacao, f.genero, ts.nome AS nome_funcao FROM funcionarios f LEFT JOIN tipo_servico ts ON f.funcao = ts.id WHERE func_id = '$id'";
    $resultFuncionario = $conn->query($sqlFuncionario);

    if ($resultFuncionario->num_rows > 0) {
        $rowFuncionario = $resultFuncionario->fetch_assoc();

        $primeiro_nome = $rowFuncionario['primeiro_nome'];
        $ultimo_nome = $rowFuncionario['ultimo_nome'];
        $telefone = $rowFuncionario['telefone'];
        $email = $rowFuncionario['email'];
        $data_nascimento = $rowFuncionario['data_nascimento'];
        $especializacao = $rowFuncionario['especializacao'];
        $genero = $rowFuncionario['genero'];
        $nome_funcao = $rowFuncionario['nome_funcao'];
    } else {
        echo 'O ID não corresponde a nenhum funcionário existente!';
        // O ID não corresponde a nenhum funcionário existente, faça o tratamento adequado (exibir mensagem de erro, redirecionar, etc.)
    }
}
?>

<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                    <h5 class="text-uppercase mb-0 mt-0 page-title">Eliminar Funcionário</h5>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                    <ul class="breadcrumb float-right p-0 mb-0">
                        <li class="breadcrumb-item"><a href="./"><i class="fas fa-home"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="./?p=3">Funcionários</a></li>
                        <li class="breadcrumb-item"><span>Eliminar Funcionário</span></li>
                    </ul>
                </div>
            </div>
        </div>
        <form method="POST" action="./pages/processar/proc_deletar_func.php?id=<?php echo $id; ?>">
        <div class="card-box m-b-0">
            <div class="row">
                <div class="col-md-12">
                    <div class="profile-view">
                        <div class="profile-img-wrap">
                            <div class="profile-img">
                                <a href=""><img class="avatar" src="assets/img/user.jpg" alt=""></a>
                            </div>
                        </div>
                        <div class="profile-basic">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="profile-info-left">
                                        <h3 class="user-name m-t-0"><?php echo $primeiro_nome . ' ' . $ultimo_nome; ?></h3>
                                        <h5 class="company-role m-t-0 m-b-0"><?php echo $nome_funcao; ?></h5>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <ul class="personal-info">
                                        <li>
                                            <span class="title">Telefone:</span>
                                            <span class="text">
                                                <?php
                                                if (!empty($telefone)) {
                                                    echo $telefone;
                                                } else {
                                                    echo "<br>";
                                                }
                                                ?>
                                            </span>
                                        </li>
                                        <li>
                                            <span class="title">Email:</span>
                                            <span class="text"><a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></span>
                                        </li>
                                        <li>
                                            <span class="title">Data de Nascimento:</span>
                                            <span class="text"><?php echo $data_nascimento; ?></span>
                                        </li>
                                        <li>
                                            <span class="title">Especializações:</span>
                                            <span class="text">
                                                <?php
                                                if (!empty($especializacao)) {
                                                    echo $especializacao;
                                                } else {
                                                    echo "<br>";
                                                }
                                                ?>
                                            </span>
                                        </li>
                                        <li>
                                            <span class="title">Gênero:</span>
                                            <span class="text"><?php echo $genero; ?></span>
                                        </li>

                                    </ul>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <button class="btn btn-danger btn-rounded float-right"><i class="far fa-trash-alt"></i> Eliminar</button>
        </form>

    </div>
</div>