<?php
// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtém o ID do funcionário selecionado
    $funcionario_id = $_POST['func_id'];


    // Consulta SQL para obter as informações do funcionário selecionado
    $sql = "SELECT * FROM funcionarios WHERE func_id = $funcionario_id";
    $result = $conn->query($sql);

    // Verifica se o funcionário existe no banco de dados
    if ($result->num_rows > 0) {
        // Obtém os dados do funcionário
        $row = $result->fetch_assoc();
        $primeiro_nome = $row['primeiro_nome'];
        $ultimo_nome = $row['ultimo_nome'];
        $senha = $row['senha'];
        $email = $row['email'];
        $telefone = $row['telefone'];
        $anos_experiencia = $row['anos_experiencia'];
        $genero = $row['genero'];
        $especializacoes = $row['especializacao'];
        $data_nascimento = $row['data_nascimento'];
        $descricao = $row['descricao'];
    } else {
        echo "Funcionário não encontrado.";
        exit;
    }

    // Fecha a conexão com o banco de dados
    $conn->close();
} else {
    echo "Acesso inválido.";
    exit;
}
?>


<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                    <h5 class="text-uppercase mb-0 mt-0 page-title">Edit Employee</h5>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                    <ul class="breadcrumb float-right p-0 mb-0">
                        <li class="breadcrumb-item"><a href="index.html"><i class="fas fa-home"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Management</a></li>
                        <li class="breadcrumb-item"><span> Edit Employee</span></li>
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
                                    <form>
                                        <div class="form-group">
                                            <label>Firstname</label>
                                            <input type="text" class="form-control" value="Sri" name="primeiro_nome">
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="text" class="form-control" value="you@example.com" name="email">
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" class="form-control" name="senha">
                                        </div>
                                        <div class="form-group">
                                            <label>Profession</label>
                                            <input type="text" class="form-control" value="Maths Teacher">
                                        </div>
                                        <div class="form-group">
                                            <label>Gender</label>
                                            <select class="form-control select">
                                                <option>Male</option>
                                                <option>Female</option>
                                            </select>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                    <form>
                                        <div class="form-group">
                                            <label>Lastname</label>
                                            <input type="text" class="form-control" value="bharthi">
                                        </div>
                                        <div class="form-group">
                                            <label>Comfirm Password</label>
                                            <input type="password" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Mobile number</label>
                                            <input type="number" class="form-control" value="9873456121">
                                        </div>
                                        <div class="form-group">
                                            <label>Department</label>
                                            <select class="form-control select">
                                                <option>Computer</option>
                                                <option>Science</option>
                                                <option>Maths</option>
                                                <option>Tamil</option>
                                                <option>English</option>
                                                <option>Social Science</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Birth Date</label>
                                            <input class="form-control datetimepicker-input datetimepicker" type="text" data-toggle="datetimepicker">
                                        </div>
                                    </form>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                    <form>
                                        <div class="form-group">
                                            <label> Address</label>
                                            <textarea class="form-control" placeholder="Premanent Address" rows="4">14,Ganthi street, New Delhi</textarea>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                    <form>
                                        <div class="form-group">
                                            <label>Upload Image</label>
                                            <input type="file" name="pic" accept="image/*" class="form-control">
                                        </div>
                                    </form>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                    <form>
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
    </div>
</div>