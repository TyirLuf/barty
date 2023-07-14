<?php

$user = $_SESSION['user'];
$idCliente = $user['cliente_id'];

$query = "SELECT a.id, a.id_servico, s.nome AS nome_servico, f.primeiro_nome, f.ultimo_nome, a.hora, a.data, a.preco_total, a.status
FROM agendamentos a
INNER JOIN servicos s ON a.id_servico = s.servico_id
INNER JOIN funcionarios f ON a.id_funcionario = f.func_id
WHERE a.id_cliente = $idCliente";


$result = mysqli_query($conn, $query);
?>

<br> <br>
<div class="cart-table-wrapper" data-aos="fade-up" data-aos-delay="0">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="table_desc">
                    <div class="table_page table-responsive">
                        <?php
                        if (mysqli_num_rows($result) > 0) {
                            echo '<table>';
                            echo '<thead>';
                            echo '<tr>';
                            echo '<th class="product_thumb">Serviço</th>';
                            echo '<th class="product_name">Funcionário</th>';
                            echo '<th class="product-price">Hora</th>';
                            echo '<th class="product_quantity">Data</th>';
                            echo '<th class="product_total">Total</th>';
                            echo '<th class="product_total">Estado</th>';
                            echo '<th class="product_remove">Ação</th>';
                            echo '</tr>';
                            echo '</thead>';
                            echo '<tbody>';
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<tr>';
                                echo '<td class="product_name"><a href="./?p=2">' . $row['nome_servico'] . '</a></td>';
                                echo '<td class="product_name"><a href="./?p=2">' . $row['primeiro_nome'] . ' ' . $row['ultimo_nome'] . '</a></td>';
                                echo '<td class="product-price">' . $row['hora'] . '</td>';
                                echo '<td class="product_name"><a href="./?p=2">' . $row['data'] . '</a></td>';
                                echo '<td class="product_total">' . $row['preco_total'] . '€</td>';
                                echo '<td class="product_total">' . $row['status'] . '</td>';
                              echo '<td class="product_remove"><a href="./pages/apagar_agendamentos.php?id=' . $row['id'] . '"><i class="fa fa-trash-o"></i></a></td>';


                            }
                            echo '</tbody>';
                            echo '</table>';
                            echo '<div class="cart_submit">';
                            echo '<form action="./pages/apagar_agendamentos.php" method="post">';
                            echo '<button class="btn btn-md btn-golden" type="submit" name="limpar">Limpar Histórico</button>';
                            echo '</form>';
                            
                            echo '</div>';
                        } else {
                            echo '<div class="emptycart-content text-center">';
                            echo '<div class="image">';
                            echo '<img class="img-fluid" src="assets/images/emprt-cart/icon.png" alt="">';
                            echo '</div>';
                            echo '<h4 class="title">Seu Histórico está vazio</h4>';
                            echo '<h6 class="sub-title">Desculpe amigo(a)... Nenhum agendamento encontrado em seu nome!!</h6>';
                            echo '<a href="./?p=1" class="btn btn-lg btn-golden">Clique para Agendar</a>';
                            echo '</div>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
