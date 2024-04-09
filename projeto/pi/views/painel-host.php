<?php
// Verificador de sessão
require "../php/verificar-login.php";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PuriAr - Seu ar mais puro</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- CSS personalizado -->
  <link rel="stylesheet" href="../css/style.css">
</head>
<body>

  <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="../views/painel-adm.html"><img class="img-logo0" src="../imgs/logo.svg" width="28" height="28" alt="" srcset=""></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <li class="nav-item texto-0 sopro-vento">
              <a class="nav-link active" aria-current="page" href="">Hosts</a>
            </li>
            <li class="nav-item texto-0 sopro-vento">
              <a class="nav-link" href="">Monitoramento</a>
            </li>
            <li class="nav-item texto-0 sopro-vento">
              <a class="nav-link" href="../views/index.html">Sair</a>
            </li>
            </div>
          </ul>
        </div>
      </div>
    </nav>
  </header>

  <main>
    <div class="container">
      <h2 class="mt-3 mb-3">Lista de Hosts</h2>
      <table class="table table-bordered table-striped table-hover table-responsive">
        <thead>
          <tr>
            <th>#</th>
            <th>Host</th>
            <th>Status</th>
            <th>Última Atualização</th>
          </tr>
        </thead>
        <tbody>
          <?php
          // Defina o range de IPs que você deseja verificar
          $start_ip = "192.168.2.180";
          $end_ip = "192.168.2.190";

          // Função para verificar se um IP está respondendo
          function ping($ip) {
            exec("/bin/ping -c 1 -W 1 $ip", $output, $result);
            return $result === 0;
          }

          // Itera sobre o range de IPs e exibe os resultados na tabela
          $index = 1;
          for ($i = ip2long($start_ip); $i <= ip2long($end_ip); $i++) {
            $current_ip = long2ip($i);
            if (ping($current_ip)) {
              $host_name = gethostbyaddr($current_ip);
              $status = "Ativo";
              $last_update = date("Y-m-d H:i:s");

              echo "<tr>";
              echo "<td>$index</td>";
              echo "<td>$host_name</td>";
              echo "<td><div class='host-status status-" . strtolower($status) . "'>$status</div></td>";
              echo "<td>$last_update</td>";
              echo "<td><button class='btn btn-sm btn-secondary config-toggle' data-target='config-$index'><a href='../views/host-configuracoes.html'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='white' class='bi bi-gear-fill' viewBox='0 0 16 16'><path d='M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z'/></svg></a></button></td>";
              echo "</tr>";
              $index++;
            }
          }
          ?>
        </tbody>
      </table>
    </div>
  </main>

  <footer class="bg-light text-center py-4">
    <div class="container">
        <p class="mb-0">© 2024 PuriAr - Seu ar mais puro</p>
    </div>
  </footer>


  <!--javascript-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    setTimeout(function(){
        window.location.reload(1);
    }, 60000); // Tempo em milissegundos (60 segundos)
</script>

  <!--animacao loading-->
  <script src="../javascript/load.js" defer></script>
</body>
</html>
