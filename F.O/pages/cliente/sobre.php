<br>


<?php

// Consulta SQL para obter os dados da tabela empresa
$sqlEmpresa = "SELECT nome, logo,imagem, descricao, telefone, email, horario_trabalho, endereco, loc FROM empresa";
$resultEmpresa = mysqli_query($conn, $sqlEmpresa);

// Verifica se a consulta da tabela empresa foi executada com sucesso
if ($resultEmpresa) {
    // Obtém os dados da empresa
    $empresa = mysqli_fetch_assoc($resultEmpresa);

    // Armazene os valores das colunas em variáveis
    $nomeEmpresa = $empresa['nome'];
    $logoEmpresa = $empresa['logo'];
    $imagemEmpresa = $empresa['imagem'];
    $descricaoEmpresa = $empresa['descricao'];
    $telefoneEmpresa = $empresa['telefone'];
    $emailEmpresa = $empresa['email'];
    $horarioTrabalhoEmpresa = $empresa['horario_trabalho'];
    $enderecoEmpresa = $empresa['endereco'];
    $locEmpresa = $empresa['loc'];
} else {
    echo "Erro na consulta da tabela empresa: " . mysqli_error($conn);
}

// Consulta SQL para obter os dados da tabela funcionario
$sqlFuncionario = "SELECT f.primeiro_nome, f.ultimo_nome, f.rede_social, f.imagem, t.nome AS funcao, f.descricao
FROM funcionarios f
INNER JOIN tipo_servico t ON f.funcao = t.id";
$resultFuncionario = mysqli_query($conn, $sqlFuncionario);

// Verifica se a consulta da tabela funcionario foi executada com sucesso
if ($resultFuncionario) {
    // Obtém os dados do funcionario
    $funcionario = mysqli_fetch_assoc($resultFuncionario);

    // Armazene os valores das colunas em variáveis
    $primeiroNomeFuncionario = $funcionario['primeiro_nome'];
    $ultimoNomeFuncionario = $funcionario['ultimo_nome'];
    $redeSocialFuncionario = $funcionario['rede_social'];
    $imagemFuncionario = $funcionario['imagem'];
    $funcaoFuncionario = $funcionario['funcao'];
} else {
    echo "Erro na consulta da tabela funcionario: " . mysqli_error($conn);
}

// Consulta SQL para obter os dados da tabela tipo_servicos
$sqlTipoServicos = "SELECT nome, descricao, imagem FROM tipo_servico";
$resultTipoServicos = mysqli_query($conn, $sqlTipoServicos);

// Verifica se a consulta da tabela tipo_servicos foi executada com sucesso
if ($resultTipoServicos) {
    // Obtém os dados do tipo de servicos
    $tipoServicos = mysqli_fetch_assoc($resultTipoServicos);

    // Armazene os valores das colunas em variáveis
    $nomeTipoServicos = $tipoServicos['nome'];
    $descricaoTipoServicos = $tipoServicos['descricao'];
    $imagemTipoServicos = $tipoServicos['imagem'];
} else {
    echo "Erro na consulta da tabela tipo_servicos: " . mysqli_error($conn);
}

// Feche a conexão com o banco de dados


?>



<div class="about-top">
    <div class="container">
        <div class="row d-flex align-items-center justify-content-between d-sm-column">
            <div class="col-md-6">
                <div class="about-img" data-aos="fade-up" data-aos-delay="0">
                    <div class="img-responsive">
                        <img src="<?php echo  $imagemEmpresa; ?>" alt="">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="content" data-aos="fade-up" data-aos-delay="200">
                    <h3 class="title">SOBRE A BARBEARIA BARTY</h3>
                    <p><?php echo  $descricaoEmpresa; ?>.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End About Top -->


<br><br><br>

<!-- Start Service Section -->
<div class="service-promo-section section-top-gap-100">
    <div class="service-wrapper">
        <div class="container">
            <div class="row">
                <?php
                $resultTipoServicos = mysqli_query($conn, $sqlTipoServicos);

                // Verifica se a consulta da tabela tipo_servicos foi executada com sucesso
                if ($resultTipoServicos && mysqli_num_rows($resultTipoServicos) > 0) {
                    while ($tipoServicos = mysqli_fetch_assoc($resultTipoServicos)) {
                        $nomeTipoServicos = $tipoServicos['nome'];
                        $descricaoTipoServicos = $tipoServicos['descricao'];
                        $imagemTipoServicos = $tipoServicos['imagem'];
                ?>
                        <!-- Start Service Promo Single Item -->
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="service-promo-single-item" data-aos="fade-up" data-aos-delay="0">
                                <div class="image">
                                    <img src="<?php echo $imagemTipoServicos; ?>" alt="">
                                </div>
                                <div class="content">
                                    <h6 class="title"><?php echo $nomeTipoServicos; ?></h6>
                                    <p><?php echo $descricaoTipoServicos; ?></p>
                                </div>
                            </div>
                        </div>
                        <!-- End Service Promo Single Item -->
                <?php
                    }
                } else {
                    echo "Nenhum serviço encontrado.";
                }
                ?>
            </div>

        </div>
    </div>
</div>
<!-- End Service Section -->

<!--  Start  Team Section    -->
<div class="team-section section-top-gap-100 secton-fluid section-inner-bg">
    <!-- Start Section Content Text Area -->
    <div class="section-title-wrapper" data-aos="fade-up" data-aos-delay="0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-content-gap">
                        <div class="secton-content text-center">
                            <h3 class="section-title">Elenco</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Section Content Text Area -->
    <div class="team-wrapper">
        <div class="container">
            <div class="row mb-n6">
                <?php
                $resultFuncionarios = mysqli_query($conn, $sqlFuncionario);

                // Verifica se a consulta de todos os funcionários foi executada com sucesso
                if ($resultFuncionarios && mysqli_num_rows($resultFuncionarios) > 0) {
                    while ($funcionario = mysqli_fetch_assoc($resultFuncionarios)) {
                        $primeiroNomeFuncionario = $funcionario['primeiro_nome'];
                        $ultimoNomeFuncionario = $funcionario['ultimo_nome'];
                        $redeSocialFuncionario = $funcionario['rede_social'];
                        $imagemFuncionario = $funcionario['imagem'];
                        $funcaoFuncionario = $funcionario['funcao'];
                        $descricaoFuncionario = $funcionario['descricao'];
                ?>

                        <div class="col-xl-3 mb-5">
                            <div class="team-single" data-aos="fade-up" data-aos-delay="0">
                                <div class="team-img">
                                    <img class="img-fluid" src="<?php echo $imagemFuncionario; ?>" alt="">
                                </div>
                                <div class="team-content">
                                    <h6 class="team-name font--bold mt-5"><?php echo $primeiroNomeFuncionario . ' ' . $ultimoNomeFuncionario; ?></h6>
                                    <span class="team-title"><?php echo $funcaoFuncionario; ?></span>
                                    <ul class="team-social pos-absolute">
                                    <ul class="team-social pos-absolute">
                <?php
                // Verifica se há links de redes sociais
                if (!empty($redeSocialFuncionario)) {
                    $redesSociais = explode(",", $redeSocialFuncionario);
                    foreach ($redesSociais as $rede) {
                        $rede = trim($rede);
                        $iconClass = "";
                        $url = "";

                        // Verifica o tipo de rede social e define a classe do ícone e URL corretos
                        if (strpos($rede, "facebook") !== false) {
                            $iconClass = "ion-social-facebook";
                            $url = "https://www.facebook.com/" . $rede;
                        } elseif (strpos($rede, "twitter") !== false) {
                            $iconClass = "ion-social-twitter";
                            $url = "https://www.twitter.com/" . $rede;
                        } elseif (strpos($rede, "instagram") !== false) {
                            $iconClass = "ion-social-instagram";
                            $url = "https://www.instagram.com/" . $rede;
                        } elseif (strpos($rede, "linkedin") !== false) {
                            $iconClass = "ion-social-linkedin";
                            $url = "https://www.linkedin.com/in/" . $rede;
                        } elseif (strpos($rede, "rss") !== false) {
                            $iconClass = "ion-social-rss";
                            $url = $rede;
                        }

                        // Exibe o ícone e o link da rede social
                        if (!empty($iconClass) && !empty($url)) {
                ?>
                            <li><a href="<?php echo $url; ?>"><i class="<?php echo $iconClass; ?>"></i></a></li>
                <?php
                        }
                    }
                } else {
                    // Se não houver links de redes sociais, exibe os ícones padrão
                ?>
                    <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                    <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                    <li><a href="#"><i class="ion-social-instagram"></i></a></li>
                <?php
                }
                ?>
            </ul>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <?php
                    }
                } else {
                    echo "Erro na consulta da tabela funcionarios: " . mysqli_error($conn);
                }
    ?>
            </div>
  
        </div>
    </div>

</div>
<!--   End  Team Section   -->