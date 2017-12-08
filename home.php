<!DOCTYPE HTML>

<?php 
        require_once('models/bd_class.php');

	
?>
<html lang="pt-br">

    <head>
       
        <meta charset="utf-8" />
        <title>Smart Games</title>
        <link href="css/bootstrap.min.css" rel="stylesheet" /> 
        <link href="css/meucss.css" rel="stylesheet" />
    </head>

    <body>
    
      <div class="container-fluid">
          <header>
             <!-- <div id="icon"> 
                    <img src="imagens/smart-2.png" width="100%" height="80%" /> 
            </div>-->
              <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
                    
                        <ul class="nav nav-pills">
                            <?php 
                                $sql="select * from tbl_console";
                                $select=mysql_query($sql);
                           
                                while($consulta=mysql_fetch_array($select)){
                                ?>
                                 <li class="nav-item">

                                     <a class="nav-link" name="menu" href="home.php?id_console=<?php echo($consulta['id_console']); ?>"><?php echo($consulta['desc_console']); ?></a>
                                </li>
                            <?php
                                }
                            ?>
                        
                        </ul>
                          
                  
                     <form method="post" >
                       <div id="buscar">

                                    <input  id="input_pesquisar" name="txtbusca" placeholder="buscar..."/>

                                    <div id="busca">
                                        <img width="100%" height="100%" src="imagens/buscaa.png"/>
                                    </div>
                        </div>

                  
                    </form>
                   
                   
                  
                 
                </nav>
              
          </header>
          <section>
				
            
                
						
						
				 <?php 
					$sql ="select * from tbl_jogos order by rand()";
				  //echo($sql);
              
                    if(isset($_POST['txtbusca'])){
                        $busca = $_POST['txtbusca'];
                        $sql = "select * from tbl_jogos where nome like '%".$busca."%'";
                        
                     }		
                    if(isset($_GET['id_console'])){
                        $id_console = $_GET['id_console'];
                        
                        $sql="select * from tbl_jogos where id_console=".$id_console;
                        
                    }

					$select = mysql_query($sql);
				   //echo($select);
					while($consulta=mysql_fetch_array($select)){
				?>
                    <div class="jogo">
                       
                        <p><img src="imagens/<?php echo($consulta['imagem_jogo']);?>" width="100%" height="90%" /></p>

                       <p><?php echo($consulta['nome']);?></p>
                       Preço: R$<?php echo($consulta['preco']);?>
                        <a href="detalhes.php?id_jogo=<?php echo($consulta['id_jogos']);?>"> 
                           <div class="verbutton"> 
								Ver mais 
						   </div>
                        </a>
                   </div>
                     
                 
                
            <?php
                }
              ?>
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