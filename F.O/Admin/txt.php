        <div class="page-content1">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                    <form method="POST" action="./pages/funcionario/processa_add.php" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>Primeiro Nome</label>
                                            <input type="text" class="form-control" name="primeiro_nome" autocomplete="off">
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="text" class="form-control" name="email" autocomplete="off">
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" class="form-control" name="password" autocomplete="off">
                                        </div>
                                        <div class="form-group">
                                            <label>Função</label>
                                            <input type="text" class="form-control" name="funcao">
                                        </div>
                                        <div class="form-group">
                                            <label>Gênero</label>
                                            <select class="form-control select" name="genero">
                                                <option>Masculino</option>
                                                <option>Feminino</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Último Nome</label>
                                            <input type="text" class="form-control" name="ultimo_nome" autocomplete="off">
                                        </div>
                                        <div class="form-group">
                                            <label>Confirmar Password</label>
                                            <input type="password" class="form-control" name="confirmar_password" autocomplete="off">
                                        </div>
                                        <div class="form-group">
                                            <label>Telefone</label>
                                            <input type="number" class="form-control" name="telefone">
                                        </div>
                                        <div class="form-group">
                                            <label>Departamento</label>
                                            <select class="form-control select" name="departamento">
                                                <option>Computação</option>
                                                <option>Ciência</option>
                                                <option>Matemática</option>
                                                <option>Tâmil</option>
                                                <option>Inglês</option>
                                                <option>Ciências Sociais</option>
                                                <option>Biblioteca</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Data de Nascimento</label>
                                            <input class="form-control datetimepicker-input datetimepicker" type="text" data-toggle="datetimepicker">
                                        </div>
                                        <div class="form-group">
                                            <label>Descrição</label>
                                            <textarea class="form-control" rows="4" name="descricao"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Escolher Imagem</label>
                                            <input type="file" name="imagem" accept="image/*" class="form-control">
                                        </div>
                                        <div class="form-group text-center">
                                            <button class="btn btn-primary mr-2" type="submit">Submit</button>
                                            <button class="btn btn-secondary" type="reset">Cancel</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>