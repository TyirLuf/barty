<?php
// Consulta SQL para obter o número total de agendamentos
$sqlAgendamentos = "SELECT COUNT(*) AS total_agendamentos FROM agendamentos";
$resultAgendamentos = $conn->query($sqlAgendamentos);
$rowAgendamentos = $resultAgendamentos->fetch_assoc();
$totalAgendamentos = $rowAgendamentos['total_agendamentos'];

// Consulta SQL para obter o número total de clientes
$sqlClientes = "SELECT COUNT(*) AS total_clientes FROM clientes";
$resultClientes = $conn->query($sqlClientes);
$rowClientes = $resultClientes->fetch_assoc();
$totalClientes = $rowClientes['total_clientes'];

// Consulta SQL para obter o número total de funcionários
$sqlFuncionarios = "SELECT COUNT(*) AS total_funcionarios FROM funcionarios";
$resultFuncionarios = $conn->query($sqlFuncionarios);
$rowFuncionarios = $resultFuncionarios->fetch_assoc();
$totalFuncionarios = $rowFuncionarios['total_funcionarios'];

// Consulta SQL para obter o número total de serviços
$sqlServicos = "SELECT COUNT(*) AS total_servicos FROM servicos";
$resultServicos = $conn->query($sqlServicos);
$rowServicos = $resultServicos->fetch_assoc();
$totalServicos = $rowServicos['total_servicos'];
?>

<div class="dash-widget dash-widget5">
    <span class="float-left"><img src="assets/img/dash/dash-1.png" alt="" width="80" /></span>
    <div class="dash-widget-info text-right">
        <span>Agendamentos</span>
        <h3><?php echo $totalAgendamentos; ?></h3>
    </div>
</div>

<div class="dash-widget dash-widget5">
    <span class="float-left"><img src="assets/img/dash/dash-2.png" alt="" width="80" /></span>
    <div class="dash-widget-info text-right">
        <span>Clientes</span>
        <h3><?php echo $totalClientes; ?></h3>
    </div>
</div>

<div class="dash-widget dash-widget5">
    <span class="float-left"><img src="assets/img/dash/dash-3.png" alt="" width="80" /></span>
    <div class="dash-widget-info text-right">
        <span>Funcionários</span>
        <h3><?php echo $totalFuncionarios; ?></h3>
    </div>
</div>

<div class="dash-widget dash-widget5">
    <span class="float-left"><img src="assets/img/dash/dash-4.png" alt="" width="80" /></span>
    <div class="dash-widget-info text-right">
        <span>Serviços</span>
        <h3><?php echo $totalServicos; ?></h3>
    </div>
</div>


<div class="page-wrapper">
  <div class="content container-fluid">
    <div class="page-header">
      <div class="row">
        <div class="col-md-6">
          <h3 class="page-title mb-0">Home</h3>
        </div>
        <div class="col-md-6">
          <ul class="breadcrumb mb-0 p-0 float-right">
            <li class="breadcrumb-item">
              <a href="./"><i class="fas fa-home"></i> Home</a>
            </li>
            <li class="breadcrumb-item"><span>Dashboard</span></li>
          </ul>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
        <div class="dash-widget dash-widget5">
          <span class="float-left"><img src="assets/img/dash/dash-1.png" alt="" width="80" /></span>
          <div class="dash-widget-info text-right">
            <span>Agendamentos</span>
            <h3><?php echo $totalAgendamentos; ?></h3>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
        <div class="dash-widget dash-widget5">
          <div class="dash-widget-info text-left d-inline-block">
            <span>Clientes</span>
            <h3><?php echo $totalClientes; ?></h3>
          </div>
          <span class="float-right"><img src="assets/img/dash/dash-2.png" width="80" alt="" /></span>
        </div>
      </div>
      <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
        <div class="dash-widget dash-widget5">
          <span class="float-left"><img src="assets/img/dash/dash-3.png" alt="" width="80" /></span>
          <div class="dash-widget-info text-right">
            <span>Funcionários</span>
            <h3><?php echo $totalFuncionarios; ?></h3>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
        <div class="dash-widget dash-widget5">
          <div class="dash-widget-info d-inline-block text-left">
            <span>Total de Agendamdos Realizados</span>
            <h3><?php echo $totalServicos; ?></h3>
          </div>
          <span class="float-right"><img src="assets/img/dash/dash-4.png" alt="" width="80" /></span>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-6 col-md-12 col-12 d-flex">
        <div class="card flex-fill">
          <div class="card-header">
            <div class="row align-items-center">
              <div class="col-auto">
                <div class="page-title">Events</div>
              </div>
              <div class="col text-right">
                <div class="mt-sm-0 mt-2">
                  <button class="btn btn-light" type="button" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <i class="fas fa-ellipsis-h"></i>
                  </button>
                  <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="#">Action</a>
                    <div role="separator" class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div role="separator" class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div id="calendar" class="overflow-hidden"></div>
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-md-12 col-12 d-flex">
        <div class="card flex-fill">
          <div class="card-header">
            <div class="row align-items-center">
              <div class="col-auto">
                <div class="page-title">Total Member</div>
              </div>
            </div>
          </div>
          <div class="card-body d-flex align-items-center justify-content-center overflow-hidden">
            <div id="chart3"></div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-6 d-flex">
        <div class="card flex-fill">
          <div class="card-header">
            <div class="row align-items-center">
              <div class="col-auto">
                <div class="page-title">Agendamentos</div>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <div class="table-responsive">
                  <table class="table custom-table">
                    <thead class="thead-light">
                      <tr>
                        <th>Nome Cliente</th>
                        <th>Serviço</th>
                        <th>Funcionario</th>
                        <th>Hora</th>
                        <th>Data</th>
                        <th>Preço Total</th>
                        <th class="text-right">Ação</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      // Consulta SQL para obter todos os funcionários
                      $sql = "SELECT a.*, c.primeiro_nome AS cliente_primeiro_nome, c.ultimo_nome AS cliente_ultimo_nome, f.primeiro_nome AS func_primeiro_nome, f.ultimo_nome AS func_ultimo_nome
                      FROM agendamentos a
                      JOIN clientes c ON a.id_cliente = c.cliente_id
                      JOIN funcionarios f ON a.id_funcionario = f.func_id
                      ORDER BY a.data ASC";
                      $result = $conn->query($sql);

                      // Exibir os funcionários
                      if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                          $id = $row['id'];
                          $cliente_primeiro_nome = $row['cliente_primeiro_nome'];
                          $cliente_ultimo_nome = $row['cliente_ultimo_nome'];
                          $func_primeiro_nome = $row['func_primeiro_nome'];
                          $func_ultimo_nome = $row['func_ultimo_nome'];
                          $servico_id = $row["id_servico"]; 
                          $hora = $row["hora"];
                          $data = $row["data"];
                          $preco_total = $row["preco_total"];

                          ?>
                          <tr>
                          <td class="text-center">
                <?php echo $cliente_primeiro_nome . ' ' . $cliente_ultimo_nome; ?>
            </td>
                            
                            <td class="text-center">
                              <?php echo $servico_id; ?>
                            </td>
                            <td class="text-center">
                <?php echo $func_primeiro_nome . ' ' . $func_ultimo_nome; ?>
            </td>
                            <td class="text-center">
                              <?php echo $hora; ?>
                            </td>
                            <td class="text-center">
                              <?php echo $data; ?>
                            </td>
                            <td class="text-center">
                              <?php echo $preco_total; ?>
                            </td>
                            <td class="text-right">
                          <a href="edit-exam.html" class="btn btn-primary btn-sm mb-1">
                            <i class="far fa-edit"></i>
                          </a>
                          <button type="submit" data-toggle="modal" data-target="#delete_employee"
                            class="btn btn-danger btn-sm mb-1">
                            <i class="far fa-trash-alt"></i>
                          </button>
                        </td>
                          </tr>
                          <?php
                        }
                      } else {
                        echo "Nenhum funcionário encontrado.";
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
            <div class="row align-items-center">
              <div class="col-sm-6">
                <div class="page-title">Todos Funcionários</div>
              </div>
              <div class="col-sm-6 text-sm-right">
                <div class="mt-sm-0 mt-2">
                  <button class="btn btn-outline-primary mr-2">
                    <img src="assets/img/excel.png" alt="" /><span class="ml-2">Excel</span>
                  </button>
                  <button class="btn btn-outline-danger mr-2">
                    <img src="assets/img/pdf.png" alt="" height="18" /><span class="ml-2">PDF</span>
                  </button>
                </div>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table custom-table">
                <thead class="thead-light">
                  <tr>
                    <th>Nome</th>
                    <th>Especialização</th>
                    <th>Experiência</th>
                    <th>Email</th>
                    <th>Telefone</th>
                    <th>Data de Nascimento</th>
                    <th class="text-right">Ação</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  // Consulta SQL para obter todos os funcionários
                  $sql = "SELECT * FROM funcionarios ORDER BY primeiro_nome ASC";
                  $result = $conn->query($sql);

                  // Exibir os funcionários
                  if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                      $id = $row['func_id'];
                      $email = $row['email'];
                      $imagem = $row["imagem"];
                      $primeiro_nome = $row["primeiro_nome"];
                      $ultimo_nome = $row["ultimo_nome"];
                      $habilidades = $row["especializacao"];
                      $datanas = $row["data_nascimento"];
                      $exp = $row["anos_experiencia"];
                      $telefone = $row["telefone"];
                      ?>
                      <tr>
                        <td>
                          <a href="profile.html" class="avatar">
                            <?php echo substr($primeiro_nome, 0, 1); ?>
                          </a>
                          <h2><a href="profile.html">
                              <?php echo $primeiro_nome . ' ' . $ultimo_nome; ?>
                            </a></h2>
                        </td>
                        <td class="text-center">
                          <?php echo $habilidades; ?>
                        </td>

                        <td>
                          <?php echo !empty($exp) ? $exp : "[Campo Vazio]"; ?>
                        </td>
                        <td><a href="#" class="__cf_email__"
                            data-cfemail="5a373339323b3f362c382f2e2e3b28291a3f223b372a363f74393537">
                            <?php echo $email; ?>
                          </a></td>
                        <td>
                          <?php echo !empty($telefone) ? $telefone : "[Sem telefone registrado]"; ?>
                        </td>
                        <td>
                          <?php echo $datanas; ?>
                        </td>
                        <td class="text-right">
                          <a href="edit-exam.html" class="btn btn-primary btn-sm mb-1">
                            <i class="far fa-edit"></i>
                          </a>
                          <button type="submit" data-toggle="modal" data-target="#delete_employee"
                            class="btn btn-danger btn-sm mb-1">
                            <i class="far fa-trash-alt"></i>
                          </button>
                        </td>
                      </tr>
                      <?php
                    }
                  } else {
                    echo "Nenhum funcionário encontrado.";
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <div class="row align-items-center">
            <div class="col-sm-6">
              <div class="page-title">Clientes</div>
            </div>
            <div class="col-sm-6 text-sm-right">
              <div class="mt-sm-0 mt-2">
                <button class="btn btn-outline-primary mr-2">
                  <img src="assets/img/excel.png" alt="" /><span class="ml-2">Excel</span>
                </button>
                <button class="btn btn-outline-danger mr-2">
                  <img src="assets/img/pdf.png" alt="" height="18" /><span class="ml-2">PDF</span>
                </button>

              </div>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
              <div class="table-responsive">
                <table class="table custom-table">
                  <thead class="thead-light">
                    <tr>
                      <th>Nome</th>
                      <th>Username</th>
                      <th>Email</th>
                      <th>Telefone</th>
                      <th>Data de Nascimento</th>
                      <th>Estado</th>
                      <th class="text-right">Ação</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    // Consulta SQL para obter todos os clientes novos
                    $sql = "SELECT * FROM clientes ORDER BY data_cadastro DESC";
                    $result = $conn->query($sql);

                    // Exibir os clientes
                    if ($result->num_rows > 0) {
                      while ($row = $result->fetch_assoc()) {
                        $id = $row['cliente_id'];
                        $primeiro_nome = $row["primeiro_nome"];
                        $ultimo_nome = $row["ultimo_nome"];
                        $username = $row["username"];
                        $email = $row['email'];
                        $telefone = $row["telefone"];
                        $datanas = $row["data_nascimento"];
                        $estado = $row["estado_id"];

                        ?>
                        <tr>
                          <td>
                            <a href="profile.html" class="avatar">
                              <?php echo substr($primeiro_nome, 0, 1); ?>
                            </a>
                            <h2><a href="profile.html">
                                <?php echo $primeiro_nome . ' ' . $ultimo_nome; ?>
                              </a></h2>
                          </td>
                          <td class="text-center">
                            <?php echo $username; ?>
                          </td>
                          <td><a href="#" class="__cf_email__"
                              data-cfemail="5a373339323b3f362c382f2e2e3b28291a3f223b372a363f74393537">
                              <?php echo $email; ?>
                            </a></td>
                          <td>
                            <?php echo !empty($telefone) ? $telefone : "[Sem telefone registrado]"; ?>
                          </td>
                          <td>
                            <?php echo $datanas; ?>
                          </td>
                          <td>
                            <?php echo $estado; ?>
                          </td>
                          <td class="text-right">
                            <a href="edit-exam.html" class="btn btn-primary btn-sm mb-1">
                              <i class="far fa-edit"></i>
                            </a>
                            <button type="submit" data-toggle="modal" data-target="#delete_employee"
                              class="btn btn-danger btn-sm mb-1">
                              <i class="far fa-trash-alt"></i>
                            </button>
                          </td>
                        </tr>
                        <?php
                      }
                    } else {
                      echo "Nenhum funcionário encontrado.";
                    }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="notification-box">
    <div class="msg-sidebar notifications msg-noti">
      <div class="topnav-dropdown-header">
        <span>Messages</span>
      </div>
      <div class="drop-scroll msg-list-scroll">
        <ul class="list-box">
          <li>
            <a href="chat.html">
              <div class="list-item">
                <div class="list-left">
                  <span class="avatar">R</span>
                </div>
                <div class="list-body">
                  <span class="message-author">Richard Miles </span>
                  <span class="message-time">12:28 AM</span>
                  <div class="clearfix"></div>
                  <span class="message-content">Lorem ipsum dolor sit amet, consectetur
                    adipiscing</span>
                </div>
              </div>
            </a>
          </li>
          <li>
            <a href="chat.html">
              <div class="list-item new-message">
                <div class="list-left">
                  <span class="avatar">J</span>
                </div>
                <div class="list-body">
                  <span class="message-author">Ruth C. Gault</span>
                  <span class="message-time">1 Aug</span>
                  <div class="clearfix"></div>
                  <span class="message-content">Lorem ipsum dolor sit amet, consectetur
                    adipiscing</span>
                </div>
              </div>
            </a>
          </li>
          <li>
            <a href="chat.html">
              <div class="list-item">
                <div class="list-left">
                  <span class="avatar">T</span>
                </div>
                <div class="list-body">
                  <span class="message-author"> Tarah Shropshire </span>
                  <span class="message-time">12:28 AM</span>
                  <div class="clearfix"></div>
                  <span class="message-content">Lorem ipsum dolor sit amet, consectetur
                    adipiscing</span>
                </div>
              </div>
            </a>
          </li>
          <li>
            <a href="chat.html">
              <div class="list-item">
                <div class="list-left">
                  <span class="avatar">M</span>
                </div>
                <div class="list-body">
                  <span class="message-author">Mike Litorus</span>
                  <span class="message-time">12:28 AM</span>
                  <div class="clearfix"></div>
                  <span class="message-content">Lorem ipsum dolor sit amet, consectetur
                    adipiscing</span>
                </div>
              </div>
            </a>
          </li>
          <li>
            <a href="chat.html">
              <div class="list-item">
                <div class="list-left">
                  <span class="avatar">C</span>
                </div>
                <div class="list-body">
                  <span class="message-author">
                    Catherine Manseau
                  </span>
                  <span class="message-time">12:28 AM</span>
                  <div class="clearfix"></div>
                  <span class="message-content">Lorem ipsum dolor sit amet, consectetur
                    adipiscing</span>
                </div>
              </div>
            </a>
          </li>
          <li>
            <a href="chat.html">
              <div class="list-item">
                <div class="list-left">
                  <span class="avatar">D</span>
                </div>
                <div class="list-body">
                  <span class="message-author"> Domenic Houston </span>
                  <span class="message-time">12:28 AM</span>
                  <div class="clearfix"></div>
                  <span class="message-content">Lorem ipsum dolor sit amet, consectetur
                    adipiscing</span>
                </div>
              </div>
            </a>
          </li>
          <li>
            <a href="chat.html">
              <div class="list-item">
                <div class="list-left">
                  <span class="avatar">B</span>
                </div>
                <div class="list-body">
                  <span class="message-author"> Buster Wigton </span>
                  <span class="message-time">12:28 AM</span>
                  <div class="clearfix"></div>
                  <span class="message-content">Lorem ipsum dolor sit amet, consectetur
                    adipiscing</span>
                </div>
              </div>
            </a>
          </li>
          <li>
            <a href="chat.html">
              <div class="list-item">
                <div class="list-left">
                  <span class="avatar">R</span>
                </div>
                <div class="list-body">
                  <span class="message-author"> Rolland Webber </span>
                  <span class="message-time">12:28 AM</span>
                  <div class="clearfix"></div>
                  <span class="message-content">Lorem ipsum dolor sit amet, consectetur
                    adipiscing</span>
                </div>
              </div>
            </a>
          </li>
          <li>
            <a href="chat.html">
              <div class="list-item">
                <div class="list-left">
                  <span class="avatar">C</span>
                </div>
                <div class="list-body">
                  <span class="message-author"> Claire Mapes </span>
                  <span class="message-time">12:28 AM</span>
                  <div class="clearfix"></div>
                  <span class="message-content">Lorem ipsum dolor sit amet, consectetur
                    adipiscing</span>
                </div>
              </div>
            </a>
          </li>
          <li>
            <a href="chat.html">
              <div class="list-item">
                <div class="list-left">
                  <span class="avatar">M</span>
                </div>
                <div class="list-body">
                  <span class="message-author">Melita Faucher</span>
                  <span class="message-time">12:28 AM</span>
                  <div class="clearfix"></div>
                  <span class="message-content">Lorem ipsum dolor sit amet, consectetur
                    adipiscing</span>
                </div>
              </div>
            </a>
          </li>
          <li>
            <a href="chat.html">
              <div class="list-item">
                <div class="list-left">
                  <span class="avatar">J</span>
                </div>
                <div class="list-body">
                  <span class="message-author">Jeffery Lalor</span>
                  <span class="message-time">12:28 AM</span>
                  <div class="clearfix"></div>
                  <span class="message-content">Lorem ipsum dolor sit amet, consectetur
                    adipiscing</span>
                </div>
              </div>
            </a>
          </li>
          <li>
            <a href="chat.html">
              <div class="list-item">
                <div class="list-left">
                  <span class="avatar">L</span>
                </div>
                <div class="list-body">
                  <span class="message-author">Loren Gatlin</span>
                  <span class="message-time">12:28 AM</span>
                  <div class="clearfix"></div>
                  <span class="message-content">Lorem ipsum dolor sit amet, consectetur
                    adipiscing</span>
                </div>
              </div>
            </a>
          </li>
          <li>
            <a href="chat.html">
              <div class="list-item">
                <div class="list-left">
                  <span class="avatar">T</span>
                </div>
                <div class="list-body">
                  <span class="message-author">Tarah Shropshire</span>
                  <span class="message-time">12:28 AM</span>
                  <div class="clearfix"></div>
                  <span class="message-content">Lorem ipsum dolor sit amet, consectetur
                    adipiscing</span>
                </div>
              </div>
            </a>
          </li>
        </ul>
      </div>
      <div class="topnav-dropdown-footer">
        <a href="chat.html">See all messages</a>
      </div>
    </div>
  </div>
</div>
</div>