<?php 
        require_once('models/bd_class.php');
      
        if(isset($_POST['btn_conectar']))
        {
            
            $_SESSION['login']= $_POST['txtlogin'];
            $_SESSION['senha']= $_POST['txtsenha'];
            
            $sql="select * from tbl_usuario where login='".$_SESSION['login']."' and senha='".$_SESSION['senha']."'";
            
            $select = mysql_query($sql);
            
            if ( $consulta= mysql_fetch_array($select)){
                
                header("location:home.php");
            }else{
                
                ?>
    <script>
        alert("Usuario inválido!");
    </script>
    <?php
            }
        }

    ?>
 <!DOCTYPE HTML>
<html lang="pt-br">

    <head>
        <meta charset="utf-8" />
        <title>Smart Games</title>
            
        <link href="css/bootstrap.min.css" rel="stylesheet" />
        <link href="css/meucss.css" rel="stylesheet" />
            
        <link rel="shortcut icon" href="imagens/controle.png"> 
    </head>

    <body>
        <div class="container-fluid">
            <header>
                <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
                    <div id="icon"> 
                        <img src="imagens/smart-2.png" width="100%" height="80%" /> 
                    </div>
                </nav>
            </header>
                
            <section class="conteudo">
                <form method="POST" action="index.php" id="form_login">
                    <div class="form-group">
                        <input type="text" name="txtlogin" class="form-control input_modal" placeholder="Login"> 
                    </div>
                    <div class="form-group">
                        <input type="password" name="txtsenha" class="form-control input_modal" placeholder="Senha" /> 
                    </div>
                    <button type="submit" name="btn_conectar" class="button buttonBlue">Conectar-se</button>
                </form>
            </section>
                
                <footer> 
                
                  <div id="rds_sociais">
                        <div class="icons_rc">
                            <img src="imagens/facebook.png" alt="face">
                        </div>
                        <div class="icons_rc">
                            <img src="imagens/instagram.png" alt="insta">
                        </div>
                        <div class="icons_rc">
                            <img src="imagens/twitter.png" alt="twitter">
                        </div>

               
                    </div>
                </footer>
                
            </div>
        </body>

</html>