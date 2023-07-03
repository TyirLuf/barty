<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                    <h5 class="text-uppercase mb-0 mt-0 page-title">my Profile</h5>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                    <ul class="breadcrumb float-right p-0 mb-0">
                        <li class="breadcrumb-item"><a href="index.html"><i class="fas fa-home"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="breadcrumb-item"><span> Profile</span></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="card-box m-b-0">
            <?php
            // Consulta SQL para obter todos os funcionários
            $sql = "SELECT * FROM funcionarios LIMIT 1";

            $result = $conn->query($sql);

            // Exibir os funcionários
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $imagem = $row["imagem"];
                    $exp = $row["anos_experiencia"];
                    $id = $row["func_id"];
                    $email = $row["email"];
                    $tel = $row["telefone"];
                    $gen = $row["genero"];
                    $data_nasc = $row["data_nascimento"];
                    $primeiro_nome = $row["primeiro_nome"];
                    $ultimo_nome = $row["ultimo_nome"];
                    $habilidades = $row["especializacao"];
            ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="profile-view">
                                <div class="profile-img-wrap">
                                    <div class="profile-img">
                                        <?php if (!empty($imagem)) { ?>
                                            <a href="#"><img class="avatar" src="../<?php echo $imagem; ?>" alt=""></a>
                                        <?php } else { ?>
                                            <a href="#" class="avatar"><?php echo substr($primeiro_nome, 0, 1); ?></a>
                                        <?php } ?>
                                    </div>

                                </div>
                                <div class="profile-basic">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="profile-info-left">
                                                <h3 class="user-name m-t-0"><?php echo $primeiro_nome . " " . $ultimo_nome; ?></h3>
                                                <h5 class="company-role m-t-0 m-b-0"><?php echo $habilidades; ?></h5>
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <ul class="personal-info">
                                                <li>
                                                    <span class="title">Telefone:</span>
                                                    <span class="text"><a href=""><?php echo $tel; ?></a></span>
                                                </li>
                                                <li>
                                                    <span class="title">Email:</span>
                                                    <span class="text"><a href=""><span class="__cf_email__" data-cfemail="422827242427303b2f352d2c2502273a232f322e276c212d2f">[<?php echo $email; ?>&#160;]</span></a></span>
                                                </li>
                                                <li>
                                                    <span class="title">Data de Nascimento:</span>
                                                    <span class="text"><?php echo $data_nasc; ?></span>
                                                </li>
                                                <li>
                                                    <span class="title">Anos de experiência:</span>
                                                    <span class="text"><?php echo $exp; ?></span>
                                                </li>
                                                <li>
                                                    <span class="title">Genero:</span>
                                                    <span class="text"><?php echo $gen; ?></span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php
                }
            } else {
                echo "Nenhum funcionário encontrado.";
            }

            ?>
        </div>
        <div class="col-sm-8 col-12 text-right add-btn-col">
            <a href="./?p=" class="btn btn-primary btn-rounded float-right"><i class="fas fa-trash"></i> Eliminar</a>
        </div>
    </div>
</div>