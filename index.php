<?php include_once('lib/include.php');?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Hello, world!</title>
  </head>
  <body>
    
    <div class="p-5  d-flex align-items-center justify-content-center flex-column">
        <div class="col-sm-5 d-flex align-items-center justify-content-center flex-column">
            <h1>Entrar</h1>
            <?php
            
            //$_SESSION['message_ok'] = true;
                if(isset($_SESSION['message_ok']) && $_SESSION['message_ok'] == true){
                    
                    

                    $text = "<div class='alert alert-success'>Alteração realizada com Sucesso!</div>";
                    echo $text;
                    
                    sleep(0.5);

                    session_destroy();
                    if( ! isset($_SESSION['message_ok'])){
                        echo '';
                    }
                  
                    
                }else if(isset($_SESSION['message_ok']) && $_SESSION['message_ok'] == false){
                    $text = "<div class='alert alert-danger'>Falha</div>";
                    echo $text;
                    
                    sleep(0.5);

                    session_destroy();
                    if( ! isset($_SESSION['message_ok'])){
                        echo '';
                    }
                }
            ?>
            <?php
                $url = isset($_GET['pagina']) ? $_GET['pagina'] : 'inicio';
                $dir = "pags/";
                $ext = '.php';
                 //var_dump( $_GET['pagina']);
                //echo $dir.$url.$ext;
                if(file_exists($dir.$url.$ext)){
                    include($dir.$url.$ext);
                }else{
                    echo "<div class='alert alert-danger'> Página não encontrada </div>";
                }
            ?>
        </div>
    </div>
    

   
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    
  </body>
</html>