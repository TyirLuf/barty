<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                    <h5 class="text-uppercase mb-0 mt-0 page-title">Adicionar Clientes</h5>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                    <ul class="breadcrumb float-right p-0 mb-0">
                        <li class="breadcrumb-item"><a href="./"><i class="fas fa-home"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="index.html">Clientes</a></li>
                        <li class="breadcrumb-item"><span> Adicionar Clientes</span></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="page-content">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                    <form method="post" action="./pages/processar/proc_add_cli.php">
                                                    <div class="form-group">
                                                        <label>Primeiro Nome</label>
                                                        <input type="text" class="form-control" name="prim_nome">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <input type="text" class="form-control" name="email">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Palavra Passe</label>
                                                        <input type="password" class="form-control" name="pass">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Nif</label>
                                                        <input type="text" class="form-control" name="nif">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Género</label>
                                                        <select class="form-control select" name="genero">
                                                            <option>Masculino</option>
                                                            <option>Femenino</option>
                                                        </select>
                                                    </div>

                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-12">

                                                <div class="form-group">
                                                    <label>Último Nome</label>
                                                    <input type="text" class="form-control" name="ult_nome">
                                                </div>
                                                <div class="form-group">
                                                    <label>Username</label>
                                                    <input class="form-control datetimepicker-input datetimepicker" type="text"
                                                        name="username">
                                                </div>
                                                <div class="form-group">
                                                    <label>Confirmar Palavra-Passe</label>
                                                    <input type="password" class="form-control" name="confir_pass">
                                                </div>
                                                <div class="form-group">
                                                    <label>Telefone</label>
                                                    <input type="text" class="form-control" name="telefone">
                                                </div>
                                                <div class="form-group">
                                                        <label>Data de Nascimento</label>
                                                        <input class="form-control datetimepicker-input datetimepicker" type="text"
                                                            name="data_nasc" data-toggle="datetimepicker">
                                                    </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                            </div>
                                
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-12">

                                                <div class="form-group text-center custom-mt-form-group">
                                                    <button class="btn btn-primary mr-2" type="submit">Adicionar</button>
                                                    <button class="btn btn-secondary" type="reset">Cancelar</button>
                                           </div>
                                           </form>  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>