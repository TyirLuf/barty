<?php
$id = isset($_GET['id']) ? $_GET['id'] : '';

// Verificar se o ID é válido
if (!empty($id)) {
   // Consulta SQL para obter os dados do funcionário com base no ID
   $sqlFuncionario = "SELECT * FROM funcionarios WHERE func_id = '$id'";
   $resultFuncionario = $conn->query($sqlFuncionario);

   if ($resultFuncionario->num_rows > 0) {
      $rowFuncionario = $resultFuncionario->fetch_assoc();
   } else {
      echo 'O ID não corresponde a nenhum funcionário existente!';
      // O ID não corresponde a nenhum funcionário existente, faça o tratamento adequado (exibir mensagem de erro, redirecionar, etc.)
   }
}
?>

<div class="page-wrapper">
   <div class="content container-fluid">
      <div class="page-header">
         <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
               <h5 class="text-uppercase mb-0 mt-0 page-title">Editar Funcionário</h5>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
               <ul class="breadcrumb float-right p-0 mb-0">
                  <li class="breadcrumb-item"><a href="./"><i class="fas fa-home"></i> Home</a></li>
                  <li class="breadcrumb-item"><a href="index.html">Funcionário</a></li>
                  <li class="breadcrumb-item"><span> Editar Funcionário</span></li>
               </ul>
            </div>
         </div>
      </div>
      <div class="page-content">
         <form method="POST" action="./pages/processar/proc_editar_func.php?id=<?php echo $id; ?>">

            <div class="row">
               <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                  <div class="card">
                     <div class="card-body">
                        <div class="row">
                           <div class="col-lg-6 col-md-6 col-sm-6 col-12">

                              <div class="form-group">
                                 <label>Primeiro Nome</label>
                                 <input type="text" class="form-control" name="prim_nome" value="<?php echo $rowFuncionario['primeiro_nome']; ?>">
                              </div>
                              <div class="form-group">
                                 <label>Email</label>
                                 <input type="text" class="form-control" name="email" value="<?php echo $rowFuncionario['email']; ?>">
                              </div>
                              <div class="form-group">
                                 <label>Palavra Passe</label>
                                 <input type="password" class="form-control" name="pass">
                              </div>
                              <div class="form-group">
                                 <label>Anos de Experiência</label>
                                 <input type="text" class="form-control" name="exp" value="<?php echo $rowFuncionario['anos_experiencia']; ?>">
                              </div>
                              <div class="form-group">
                                 <label>Género</label>
                                 <select class="form-control select" name="genero">
                                    <option <?php if ($rowFuncionario['genero'] == 'Masculino') echo 'selected'; ?>>Masculino</option>
                                    <option <?php if ($rowFuncionario['genero'] == 'Feminino') echo 'selected'; ?>>Feminino</option>
                                 </select>
                              </div>
                              <div class="form-group">
                                 <label>Data de Nascimento</label>
                                 <input class="form-control datetimepicker-input datetimepicker" type="text" name="data_nasc" data-toggle="datetimepicker" value="<?php echo $rowFuncionario['data_nascimento']; ?>">
                              </div>

                           </div>
                           <div class="col-lg-6 col-md-6 col-sm-6 col-12">

                              <div class="form-group">
                                 <label>Último Nome</label>
                                 <input type="text" class="form-control" name="ult_nome" value="<?php echo $rowFuncionario['ultimo_nome']; ?>">
                              </div>
                              <div class="form-group">
                                 <label>Username</label>
                                 <input class="form-control" type="text" name="username" value="<?php echo $rowFuncionario['username']; ?>">
                              </div>
                              <div class="form-group">
                                 <label>Confirmar Palavra-Passe</label>
                                 <input type="password" class="form-control" name="confir_pass">
                              </div>
                              <div class="form-group">
                                 <label>Telefone</label>
                                 <input type="text" class="form-control" name="telefone" value="<?php echo $rowFuncionario['telefone']; ?>">
                              </div>
                              <div class="form-group">
                                 <label>Função</label>
                                 <select class="select form-control" name="funcao">
                                    <option value="-1">Nenhum</option>
                                    <?php
                                    // Consulta SQL para obter as funções da tabela tipo_servico
                                    $sqlFuncoes = "SELECT id, nome FROM tipo_servico";
                                    $resultFuncoes = $conn->query($sqlFuncoes);

                                    if ($resultFuncoes->num_rows > 0) {
                                       while ($rowFuncao = $resultFuncoes->fetch_assoc()) {
                                          $idFuncao = $rowFuncao['id'];
                                          $nomeFuncao = $rowFuncao['nome'];
                                          $selected = ($idFuncao == $rowFuncionario['funcao']) ? 'selected' : '';
                                          echo "<option value=\"$idFuncao\" $selected>$nomeFuncao</option>";
                                       }
                                    }
                                    ?>
                                 </select>
                              </div>

                              <div class="form-group">
                                 <label>Especialização</label>
                                 <input type="text" class="form-control" name="especilizacao" value="<?php echo $rowFuncionario['especializacao']; ?>">
                              </div>

                           </div>
                           <div class="col-lg-12 col-md-12 col-sm-12 col-12">

                              <div class="form-group">
                                 <label>Descrição</label>
                                 <textarea class="form-control" rows="4" name="desc"><?php echo $rowFuncionario['descricao']; ?></textarea>
                              </div>

                           </div>
                           <div class="col-lg-12 col-md-12 col-sm-12 col-12">

                              <div class="form-group">
                                 <label>Imagem</label>
                                 <input type="file" name="pic" accept="image/*" class="form-control">
                              </div>

                           </div>

                           <div class="col-lg-12 col-md-12 col-sm-12 col-12">

                              <div class="form-group text-center custom-mt-form-group">
                                 <button class="btn btn-primary mr-2" type="submit">Atualizar</button>
                                 <button class="btn btn-secondary" type="button" onclick="window.history.back();">Cancelar</button>
                              </div>

                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </form>
      </div>
   </div>
</div>