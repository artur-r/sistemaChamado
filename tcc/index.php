<!DOCTYPE html>
<html lang="pt_br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <a href="cadastroChamado.php">Novo chamado</a>
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
                $consulta = "SELECT * FROM chamados ORDER BY id_chamado DESC";
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
                    echo "<td><a href='finalizar_chamado.php?id=" . $dados['id_chamado'] . "'>Finalizar</a></td>";
                    echo "</tr>";
                }

                if($_SESSION['setor'] == 'Administrador'){
                    echo "<a href=\"cad_usuario.php\">Cadastrar novo usuário </p>";
                }
                //pra verificar se a sessão está funcionando
                // echo $_SESSION['usuario']

                ?>
            </tr>
        </table>
    </div>
           
</body>

</html>