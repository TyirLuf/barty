




<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                    <h5 class="text-uppercase mb-0 mt-0 page-title">Adicionar Funcionários</h5>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                    <ul class="breadcrumb float-right p-0 mb-0">
                        <li class="breadcrumb-item"><a href="index.html"><i class="fas fa-home"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Funcionários</a></li>
                        <li class="breadcrumb-item"><span>Adicionar Funcionários</span></li>
                    </ul>
                </div>
            </div>
        </div>



        <div class="page-content1">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <div class="card-body">
                            <form method="POST" action="./pages/funcionario/processa_add.php" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-12">

                                        <div class="form-group">
                                            <label>Primeiro Nome</label>
                                            <input type="text" class="form-control" name="prim_nome">
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" class="form-control" name="pass">
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" class="form-control" name="email">
                                        </div>
                                        <div class="form-group">
                                            <label>Anos de experiência</label>
                                            <input type="text" class="form-control" name="exp">
                                        </div>
                                        <div class="form-group">
                                            <label>Gênero</label>
                                            <select class="form-control select">
                                                <option>Masculino</option>
                                                <option>Femenino</option>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-12">

                                        <div class="form-group">
                                            <label>Ultimo Nome</label>
                                            <input type="text" class="form-control" name="ult_nome">
                                        </div>
                                        <div class="form-group">
                                            <label>Confirmar Password</label>
                                            <input type="password" class="form-control" name="conf_pass">
                                        </div>
                                        <div class="form-group">
                                            <label>Telefone</label>
                                            <input type="number" class="form-control" name="telefone">
                                        </div>
                                        <div class="form-group">
                                            <label>Especializações</label>
                                            <select name="espec" class="form-control select">
                                                <option value="0" selected></option>
                                                <?php
                                                $query = "SELECT funcionarios.*, servicos.nome FROM funcionarios LEFT JOIN servicos ON idservico=id WHERE idfunc='$id_agendamento'";

                                                $query = "SELECT * FROM tipo_servico order by nome";
                                                $query2 = mysqli_query($mysqli, $query);

                                                if (mysqli_num_rows($query2) > 0) {
                                                    foreach ($query2 as $row) {
                                                ?>
                                                        <option value="<?= $row['id']; ?>"><?= $row['nome']; ?></option>
                                                <?php
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Data de nascimento</label>
                                            <input class="form-control datetimepicker-input datetimepicker" type="date" data-toggle="datetimepicker" name="data_nascimento">
                                        </div>

                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">

                                        <div class="form-group">
                                            <label>Descrição</label>
                                            <textarea class="form-control" rows="4" name="desc"></textarea>
                                        </div>

                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">

                                        <div class="form-group">
                                            <label>Escolher Imagem</label>
                                            <input type="file" name="pic" accept="image/*" class="form-control">
                                        </div>

                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">

                                        <div class="form-group text-center">
                                            <button class="btn btn-primary mr-2" type="submit">Salvar</button>
                                            <button class="btn btn-secondary" type="reset">Cancelar</button>
                                        </div>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>