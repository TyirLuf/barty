# sobre backup

   <div class="team-single" data-aos="fade-up" data-aos-delay="0">
        <div class="team-img">
            <img class="img-fluid" src="caminho/para/imagem/<?php echo $imagemFuncionario; ?>" alt="">
        </div>
        <div class="team-content">
            <h6 class="team-name font--bold mt-5"><?php echo $primeiroNomeFuncionario . ' ' . $ultimoNomeFuncionario; ?></h6>
            <span class="team-title"><?php echo $funcaoFuncionario; ?></span>
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
                }
                ?>
            </ul>
        </div>
    </div>



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

                        <!-- Código HTML para exibir cada funcionário -->
                        <div class="col-xl-3 mb-5">

                            <div class="team-single" data-aos="fade-up" data-aos-delay="0">
                                <div class="team-img">
                                    <img class="img-fluid" src="caminho/para/imagem/<?php echo $imagemFuncionario; ?>" alt="">
                                </div>
                                <div class="team-content">
                                    <h6 class="team-name font--bold mt-5"><?php echo $primeiroNomeFuncionario . ' ' . $ultimoNomeFuncionario; ?></h6>
                                    <span class="team-title"><?php echo $funcaoFuncionario; ?></span>
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
                                        }
                                        ?>
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