<!DOCTYPE html>
<html lang="pt_br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Clamarie</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
      <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Chamados abertos
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="index.php">suporte</a></li>
            <li><a class="dropdown-item" href="chamados_dev.php">desenvolvimento</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="chamados_finalizados.php">Chamados Finalizados</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cadastroChamado.php">Criar chamado</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Pricing</a>
        </li>
        <li class="nav-item dropdown">
        
      </ul>
    </div>
  </div>


</nav>
    <div>
        <table>

            <tr>
                <th>Id</th>
                <th>Título</th>
                <th>Descrição</th>
                <th>Whatsapp</th>
                <th>Data abertura</th>
                <th>Hora abertura</th>
                <th>Usuário criação</th>
                <th>Categoria</th>
            </tr>

            <tr>
                <?php

                include_once("conexao.php");
                include_once("verifica_login.php");
                
                //consulta da tabela 
                $consulta = "SELECT * FROM chamados_dev ORDER BY id_chamado DESC";
                $resultado = mysqli_query($conn, $consulta);

                while ($dados = mysqli_fetch_assoc($resultado)) {
                    echo "<tr>";
                    echo "<td>" . '<a href="alterar_chamado.php">' . $dados['id_chamado'] . '</a>' . "</td>";
                    echo "<td>" . $dados['titulo_chamado'] . "</td>";
                    echo "<td>" . $dados['descricao'] . "</td>";
                    echo "<td>" . $dados['whats'] . "</td>";
                    echo "<td>" . $dados['data_abertura'] . "</td>";
                    echo "<td>" . $dados['hora_abertura'] . "</td>";
                    echo "<td>" . $dados['usuario_abertura'] . "</td>";
                    echo "<td>" . $dados['categoria_chamado'] . "</td>";
                    echo "<td><a href='mover_chamado_sup.php?id=" . $dados['id_chamado'] . "'>Mover</a></td>";
                    echo "</tr>";
                }

                if($_SESSION['setor'] == 'administrador'){
                    echo "<a href=\"cad_usuario.php\">Cadastrar novo usuário </p>";
                }
                //pra verificar se a sessão está funcionando
                // echo $_SESSION['usuario']

                ?>
            </tr>
        </table>
    </div>
        
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>