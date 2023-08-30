<form method="POST" class="col-sm-6">
    <h4>Recuperar Senha</h4>
    <label for="">Insira o email Cadastrado</label>
    <input type="text" name="email" class="form-control"><br>
    <code>Insira o email para redefinir a conta</code><br><br><br>

    <input type="submit"  class="btn btn-primary btn-lg btn-block "><br>
    <input type="hidden" name="env" value="form">
</form>

<?php

    echo verifica_dados($con);
?>