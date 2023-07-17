<?php
$id = isset($_GET['id']) ? $_GET['id'] : '';

// Verificar se o ID é válido
if (!empty($id)) {
    // Consulta SQL para obter os dados do funcionário com base no ID
    $sqlFuncionario = "SELECT primeiro_nome,ultimo_nome,telefone,email,data_nascimento,genero FROM clientes WHERE cliente_id = '$id'";
    $resultFuncionario = $conn->query($sqlFuncionario);

    if ($resultFuncionario->num_rows > 0) {
        $rowFuncionario = $resultFuncionario->fetch_assoc();

        $primeiro_nome = $rowFuncionario['primeiro_nome'];
        $ultimo_nome = $rowFuncionario['ultimo_nome'];
        $telefone = $rowFuncionario['telefone'];
        $email = $rowFuncionario['email'];
        $data_nascimento = $rowFuncionario['data_nascimento'];
        $genero = $rowFuncionario['genero'];
    } else {
        echo 'O ID não corresponde a nenhum cliente existente!';
        // O ID não corresponde a nenhum cliente existente, faça o tratamento adequado (exibir mensagem de erro, redirecionar, etc.)
    }
}
?>

<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                    <h5 class="text-uppercase mb-0 mt-0 page-title">Eliminar Cliente</h5>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                    <ul class="breadcrumb float-right p-0 mb-0">
                        <li class="breadcrumb-item"><a href="./"><i class="fas fa-home"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="./?p=10">Clientes</a></li>
                        <li class="breadcrumb-item"><span>Eliminar Cliente</span></li>
                    </ul>
                </div>
            </div>
        </div>
        <form method="POST" action="./pages/processar/proc_deletar_cli.php?id=<?php echo $id; ?>">

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
                                                <span class="text">
                                                    <?php
                                                    if (!empty($email)) {
                                                        echo '<a href="mailto:' . $email . '">' . $email . '</a>';
                                                    } else {
                                                        echo "<br>";
                                                    }
                                                    ?>
                                                </span>


                                            </li>
                                            <li>
                                                <span class="title">Data de Nascimento:</span>
                                                <span class="text">
                                                    <?php
                                                    if (!empty($data_nascimento)) {
                                                        echo $data_nascimento;
                                                    } else {
                                                        echo "<br>";
                                                    }
                                                    ?>
                                                </span>

                                            </li>
                                            <li>
                                                <span class="title">Gênero:</span>
                                                <span class="text">
                                                    <?php
                                                    if (!empty($genero)) {
                                                        echo $genero;
                                                    } else {
                                                        echo "<br>";
                                                    }
                                                    ?>
                                                </span>
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