<?php
session_start();
require 'dbcon.php';
?>
<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css">
    <!-- Bootstrap CSS -->
    <link href="./node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Controle de Alunas</title>
</head>

<body>

    <div class="container mt-4">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Detalhes do aluno
                            <a href="student-create.php" class="btn btn-primary float-end">Adicionar Aluno</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>Email</th>
                                    <th>Telefone</th>
                                    <th>Curso</th>
                                    <th>Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT * FROM estudantes";
                                $query_run = mysqli_query($con, $query);

                                if (mysqli_num_rows($query_run) > 0) {
                                    foreach ($query_run as $student) {
                                        ?>
                                        <tr>
                                            <td>
                                                <?= $student['id']; ?>
                                            </td>
                                            <td>
                                                <?= $student['name']; ?>
                                            </td>
                                            <td class="email-break">
                                                <?= $student['email']; ?>
                                            </td>
                                            <td>
                                                <?= $student['phone']; ?>
                                            </td>
                                            <td>
                                                <?= $student['course']; ?>
                                            </td>
                                            <td>
                                                <a href="student-view.php?id=<?= $student['id']; ?>"
                                                    class="btn btn-info btn-sm">Visualizar</a>
                                                <a href="student-edit.php?id=<?= $student['id']; ?>"
                                                    class="btn btn-success btn-sm">Editar</a>
                                                <form action="code.php" method="POST" class="d-inline">
                                                    <button type="submit" name="delete_student" value="<?= $student['id']; ?>"
                                                        class="btn btn-danger btn-sm">Deletar</button>
                                                </form>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                } else {
                                    echo "<h5> Nenhum aluno cadastrado </h5>";
                                }
                                ?>

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
</body>

</html>