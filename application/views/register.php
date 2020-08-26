<html>

<head>
    <title>Cadastro de usuários</title>
    <link rel="stylesheet" href="<?php echo base_url() . 'assets/css/bootstrap.css'; ?>">
    <link rel="stylesheet" href="<?php echo base_url() . 'assets/css/style.css'; ?>">

</head>
<!-- Utilizando biblioteca jquery para usar máscara de telefone -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>

<body>
    <div class="container">
        <?php
        $msg = $this->session->flashdata('msg');
        if ($msg != "") {
            echo "<div class='alert alert-success'>'$msg'</div>";
        }
        ?>
        <div class="col-md-6">
            <div class="card mt-5">
                <div class="card-header">
                    <div class="text-center">
                        <h4>Registre-se aqui</h4>
                    </div>
                </div>
                <form action="<?php echo base_url() . 'index.php/Auth/register' ?>" name="registerForm" id="registerForm" method="post">

                    <div class="card-body register">
                        <p class="card-text">Por favor, complete seus dados.</p>
                        <div class="form-group">
                            <label for="name">Nome</label>
                            <input type="text" name="name" id="name" value="<?php echo set_value('name') ?>" class="form-control <?php echo (form_error('name') != "") ? 'is-invalid' : ''; ?>" placeholder="Nome">
                            <p class="invalid-feedback"><?php echo strip_tags(form_error('name')); ?></p>
                        </div>

                        <div class="form-group">
                            <label for="Email">Email</label>
                            <input type="text" name="email" id="email" value="<?php echo set_value('email') ?>" class="form-control <?php echo (form_error('email') != "") ? 'is-invalid' : ''; ?>" placeholder="Email">
                            <p class="invalid-feedback"><?php echo strip_tags(form_error('email')); ?></p>
                        </div>

                        <div class="form-group">
                            <label for="name">Telefone</label>
                            <input type="text" maxlength="10" name="telefone" id="telefone" value="<?php echo set_value('telefone') ?>" class="form-control <?php echo (form_error('telefone') != "") ? 'is-invalid' : ''; ?>" placeholder="Telefone">
                            <p class="invalid-feedback"><?php echo strip_tags(form_error('telefone')); ?></p>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-block btn-primary">Registrar agora</button>
                        </div>
                    </div>
                </form>

                <!-- Tabela de apresentação de registros -->
                <table class="table">
                    <div class="card-header">
                        <div class="text-center">
                            <h4>
                                <p>Clientes cadastrados</p>
                            </h4>
                        </div>
                    </div>
                    <tr>
                        <td><b>Nome</b></td>
                        <td><b>Email</b></td>
                        <td><b>Telefone</b></td>

                    </tr>
                    <?php
                    $con = mysqli_connect("h20.meuserver.com", "meucopoe_teste_fred", "teste-fred@4321","meucopoe_teste_fred","3306",null);
                    $query = "SELECT * FROM clientes order by nome asc";
                    $select = mysqli_query($con, $query) or die (mysqli_error($con));
                    while ($row = mysqli_fetch_assoc($select)) {
                    ?>
                        <tr>
                            <td><?= $row["nome"]; ?></td>
                            <td><?= $row["email"]; ?></td>
                            <td><?= $row["telefone"]; ?></td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>

    <script>
        // Definindo a máscara de telefone
        $("#telefone").mask("(99) 99999-9999")
    </script>

</body>

</html>