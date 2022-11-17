<?php
session_start();
require 'connection.php';
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda</title>
    <link href="css/style.css" rel="stylesheet">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    
    <!--    <?php echo '
    <script>
    Swal.fire({
        icon: "error",
        title: "Invalid",
        text: "Input Fields Cant Be Empty"
    })
</script>';
            ?>
!-->
    <div class="container box mt-4">
        <div class="row">
            <div class="col-md-12">

                <div class="card border border-secondary">
                    <div class="card-body">

                        <form class="row g-2" action="?act=save" method="POST" name="form1">
                            <h1>AGENDA</h1>
                            <input type="hidden" name="id" <?php
                                                            // Preenche o id no campo id com um valor "value"
                                                            if (isset($id) && $id != null || $id != "") {
                                                                echo "value=\"{$id}\"";
                                                            }
                                                            ?> />
                            <div class="col-auto">
                                Nome:
                                <input class="form-control" type="text" name="nome" <?php
                                                                                    // Preenche o nome no campo nome com um valor "value"
                                                                                    if (isset($nome) && $nome != null || $nome != "") {
                                                                                        echo "value=\"{$nome}\"";
                                                                                    }
                                                                                    ?> />
                            </div>
                            <div class="col-auto">
                                E-mail:
                                <input class="form-control" type="text" name="email" <?php
                                                                                        // Preenche o email no campo email com um valor "value"
                                                                                        if (isset($email) && $email != null || $email != "") {
                                                                                            echo "value=\"{$email}\"";
                                                                                        }
                                                                                        ?> />
                            </div>
                            <div class="col-auto">
                                Celular:
                                <input class="form-control" type="text" name="celular" <?php
                                                                                        // Preenche o celular no campo celular com um valor "value"
                                                                                        if (isset($celular) && $celular != null || $celular != "") {
                                                                                            echo "value=\"{$celular}\"";
                                                                                        }
                                                                                        ?> />
                            </div>
                            <br>
                            <div class="col-auto"  style="padding-top:23px">
                                
                                    <input class="btn btn-outline-dark" type="submit" value="salvar" />
                                    <input class="btn btn-outline-dark" type="reset" value="Novo" />
                               
                            </div>

                        </form>
                        <br>
                        <table class="table table-striped table-hover">
                            <tr>
                                <th>Nome</th>
                                <th>E-mail</th>
                                <th>Celular</th>
                                <th>Ações</th>
                            </tr>
                            <?php
                            try {
                                $stmt = $conexao->prepare("SELECT * FROM contatos");

                                if ($stmt->execute()) {
                                    while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {
                                        echo "<tr>";
                                        echo "<td>" . $rs->nome . "</td><td>" . $rs->email . "</td><td>" . $rs->celular
                                            . "</td><td><center><a name='alterar' class='btn btn-outline-dark' href=\"?act=upd&id=" . $rs->id . "\">Alterar</a>"
                                            . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"
                                            . "<a class='btn btn-outline-dark' href=\"?act=del&id=" . $rs->id . "\">Excluir</a></center></td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "Erro: Não foi possível recuperar os dados do banco de dados";
                                }
                            } catch (PDOException $erro) {
                                echo "Erro: " . $erro->getMessage();
                            }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>