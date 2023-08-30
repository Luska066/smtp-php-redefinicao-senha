<form method="POST" class="col-sm-6">
    <h4>Insira a sua nova senha</h4>
    <label for="">Senha:</label>
    <input type="password" name="password" class="form-control"><br>


    <input type="submit" value="Salvar Alterações" class="btn btn-success btn-lg btn-block "><br>
    <input type="hidden" name="env" value="upd"><br>
</form>

<?php verify_hash($con)?>