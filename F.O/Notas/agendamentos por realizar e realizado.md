# agendamentos por realizar e realizado

// Contagem de serviços realizados
$sqlServicosRealizados = "SELECT COUNT(*) AS total_servicos_realizados FROM agendamentos WHERE estado_agendamento = 'realizado'";
$resultServicosRealizados = $conn->query($sqlServicosRealizados);
$rowServicosRealizados = $resultServicosRealizados->fetch_assoc();
$totalServicosRealizados = $rowServicosRealizados['total_servicos_realizados'];

// Contagem de serviços por realizar
$sqlServicosPorRealizar = "SELECT COUNT(*) AS total_servicos_por_realizar FROM agendamentos WHERE estado_agendamento = 'por realizar'";
$resultServicosPorRealizar = $conn->query($sqlServicosPorRealizar);
$rowServicosPorRealizar = $resultServicosPorRealizar->fetch_assoc();
$totalServicosPorRealizar = $rowServicosPorRealizar['total_servicos_por_realizar'];
