<?php
    function verifica_dados($conn){
        if(isset($_POST['env']) && $_POST['env'] === 'form'){
            $sql = $conn -> prepare("SELECT * FROM usuarios WHERE email = ? ");
            $sql -> bind_param('s', $_POST['email']);
            $sql ->execute();
            $get = $sql ->get_result();
            $total = $get -> num_rows;

            if($total > 0){ 
                $dados = $get->fetch_assoc();
                add_recover_solicitation($conn,$dados['email']);
               
            }else{
                echo 'no';
            }
        }
    }

    function add_recover_solicitation ($conn,$email){
        $hash = md5(rand());
        $status = 0;
        $sql = $conn -> prepare("INSERT INTO recover_solicitation (email,rash,stats) values(?,?,?)");
        $sql->bind_param('ssi',$email,$hash,$status);
        $sql ->execute();

        if($sql->affected_rows > 0){
            enviar_email($conn,$email,$hash);
        }else{
            return '0';
        }

    }

   function enviar_email($conn,$email,$hash){

        $destnatario = $email;
        $cryp = $hash;

        $subject = "Alteração de Senha";
        $headers = "MIME-Version: 1.0\r\n";
        $headers .= "Content-type:text/html; charset:UTF-8\r\n";
        $headers .= "From: ".$destnatario;
        $message = "<html><head>";
        $message .= "
            <h2>Solicitou uma nova senha?</h2>
            <hr>
            <h3>Se sim, aqui esta o link para recuperação da senha </h3>
            <p>Para recuperar a senha, acesse este link <a href='".sitedir."?pagina=alterar&rash={$cryp}' >".sitedir."?pagina=alterar&rash={$cryp}</a></p>
            </html></head>";

        
       if(mail($destnatario,$subject,$message,$headers)){
            echo '<div class="alert alert-success"> Email Enviado!Acesse para Recuperar</div>';
            mail('',$subject,$message,$headers);
       }else{
            echo '<div class="alert alert-danger"> Erro ao enviar!</div>';
       };
    }

    function verify_hash($conn){
            $sql = $conn ->prepare("SELECT * FROM recover_solicitation where rash = ? ");
            $sql -> bind_param('s', $_GET['rash']);
            $sql -> execute();
            $get = $sql->get_result();
            $total = $get -> num_rows; 

            if($total > 0){

                if(isset($_POST['env']) && $_POST['env'] == 'upd'){
                    $password = addslashes(md5($_POST['password']));
                    $dados = $get -> fetch_assoc();
                       //atualiza 
                       $isDelete = update_user($conn,$dados['email'],$password);
                       if($isDelete){
                            $isOK = delete_recover_solicitation($conn,$dados['email']);
                           
                            if($isOK === true){
                                session_start();
                                $_SESSION["message_ok"] = 'true';
                                

                                header('Location: http://localhost/SMTP-Envio-de-email-php-nativo/');
                                
                            }else {
                                $_SESSION["message_ok"] = 'false';
                                header('Location: http://localhost/SMTP-Envio-de-email-php-nativo/');
                            }

                       }else{
                        $_SESSION["message_ok"] = 'false';
                        header('Location: http://localhost/SMTP-Envio-de-email-php-nativo/');
                       }
                        //deleta;
                }
                echo "<div class='alert alert-success'>Realize a Ateração</div>";
            }else{
  
                $_SESSION["message_ok"] = 'false';
                header('Location: http://localhost/SMTP-Envio-de-email-php-nativo/');
            }
        
    }

    function update_user($conn,$email,$senha){
        $sql = $conn -> prepare("UPDATE usuarios SET senha = ? WHERE email = ?");
        $sql -> bind_param('ss',$senha,$email);
        $sql -> execute();
        
        if($sql -> affected_rows > 0){
            return true;
        }else {
            return false;
        }

    }

    function delete_recover_solicitation($conn,$email){
        $sql =$conn -> prepare('DELETE FROM recover_solicitation where email = ?');
        $sql -> bind_param('s',$email);
        $sql -> execute();

        if($sql -> affected_rows > 0){
            return true;
        }else {
            return false;
        }

    }
    
?>  