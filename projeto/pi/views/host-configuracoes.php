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
              <a class="nav-link active" aria-current="page" href="../views/painel-host.html">Hosts</a>
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
    <!--fumaça, gás natural, metano, propano, butano, GLP, hidrogênio e outros inflamáveis-->
    <div class="container mx-auto">
      <div class="row">
        <h2>Opções de Monitoramento</h2>
        <p>Opções selecionadas vão enviar notificações, o padrão são todas.</p>
        <form class="mb-5">
          <input type="checkbox" id="fumaca" name="gas1" value="Fumaça" checked>
          <label for="fumaca"> Fumaça</label><br>
          <input type="checkbox" id="gas-natural" name="gas2" value="Gás Natural" checked>
          <label for="gas-natural"> Gás Natural</label><br>
          <input type="checkbox" id="metano" name="gas3" value="Metano" checked>
          <label for="metano"> Metano</label><br>
          <input type="checkbox" id="propano" name="gas4" value="Propano" checked>
          <label for="propano"> Propano</label><br>
          <input type="checkbox" id="butano" name="gas5" value="Butano" checked>
          <label for="butano"> Butano</label><br>
          <input type="checkbox" id="glp" name="gas6" value="GLP" checked>
          <label for="glp"> GLP</label><br>
          <input type="checkbox" id="hidrogenio" name="gas7" value="Hidrogênio" checked>
          <label for="hidrogenio"> Hidrogênio</label><br>
        

        <h2 class="mt-5">Mídias</h2>
          <input type="checkbox" name="telegram" id="" checked>
          <label for="telegram">Telegram</label><br>
          <input type="checkbox" name="telegram" id="" checked>
          <label for="telegram">E-mail</label>

          <div class="row mt-5">
            <button class="botao-login" type="submit">Salvar</button>
          </div>
      </div>

    </div>
    

  </main>

  <footer class="bg-light text-center py-4">
    <div class="container">
        <p class="mb-0">© 2024 PuriAr - Seu ar mais puro</p>
    </div>
  </footer>


  <!--javascript-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <!--animacao loading-->
  <script src="../javascript/load.js" defer></script>
</body>
</html>
