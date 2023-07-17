# func

<div class="banner-section">
    <div class="banner-wrapper clearfix">
        <!-- Start Banner Single Item -->
        <?php
        $consulta = $conn->query("SELECT func_id, primeiro_nome, ultimo_nome, imagem FROM funcionarios LIMIT 4");

        while ($funcionario = $consulta->fetch_assoc()) {
            $idFuncionario = $funcionario['func_id'];
            $primeiroNome = $funcionario['primeiro_nome'];
            $ultimoNome = $funcionario['ultimo_nome'];
            $imagem = $funcionario['imagem'];

            echo '
            <div class="banner-single-item banner-style-4 banner-animation banner-color--golden float-left img-responsive" data-aos="fade-up" data-aos-delay="0">
                <div class="image">
                    <img class="img-fluid" src="' . $imagem . '" alt="" width="1280" height="1920">
                </div>
                <a href="./?p=10&id=' . $idFuncionario . '" class="content">
                    <div class="inner">
                        <h4 class="title">' . $primeiroNome . ' ' . $ultimoNome . '</h4>
                    </div>
                    <span class="round-btn"><i class="ion-ios-arrow-thin-right"></i></span>
                </a>
            </div>';
        }

        ?>
    </div>
</div>