
 <?php 
        require_once('models/bd_class.php');
      
    $id_jogo=$_GET['id_jogo'];
?>  

<!DOCTYPE HTML>
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
              <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
                    <div id="icon"> 
                        <img src="imagens/smart-2.png" width="100%" height="80%" /> 
                    </div>
                </nav>
            </header>
            <section>
               <?php 
                
                    $sql="select j.nome, j.descricao, j.imagem_jogo,j.imagem_jogo2,j.lançamento, j.dt_lancamento, j.preco,
                    ca.nome_cat, c.desc_console
                    FROM tbl_jogos as j
                    JOIN tbl_categoria as ca
                    ON j.id_categoria = ca.id_categoria
                    JOIN tbl_console as c 
                    ON j.id_console = c.id_console
					
					where id_jogos= ".$id_jogo;
                        
                    //echo($sql);
                    $select=mysql_query($sql);
                
                    while($consulta=mysql_fetch_array($select)){

                
                ?>
					<div id="div_detalhes">
						<div id="apresentacao">
							<p> &nbsp;&nbsp; <?php echo($consulta['nome']);?> - <?php echo($consulta['desc_console']);?></p>
						</div>
                       <div id="desc">
					   		<p><?php echo($consulta['descricao']);?> </p>
                           						
						    <?php 
                                if($consulta['lançamento'] == 1){
                            ?> 
                               <p><?php echo("lançamento");?>	</p>
                            <?php
                                }
                            ?>
						    <p> Data de lancamento : <?php echo($consulta['dt_lancamento']);?></p>
						    <p>Categoria: <?php echo($consulta['nome_cat']);?>	</p>
				    		<p> Por Apenas :<?php echo($consulta['preco']);?>	 </p>
                            <p>Onde encontrar <?php echo($consulta['nome']);?> ? </p>
                            
                            <?php
                                $sql0 ="select lj.id_loja_jogo, j.id_jogos, l.id_loja, l.nome
                                from tbl_loja_jogo as lj 
                                JOIN tbl_loja as l
                                ON lj.id_loja = l.id_loja
                                JOIN tbl_jogos as j
                                ON lj.id_jogos = j.id_jogos
                                where lj.id_jogos=".$id_jogo;

                                $select_loja=mysql_query($sql0);

                                while($consulta_loja=mysql_fetch_array($select_loja)){


                            ?>
                                <p> 
                                   <a href="detalhes_jogos.php?id_loja=<?php echo($consulta_loja['id_loja']);?>"  >  <img src="imagens/localizacao.png" class="icon_localizacao" /></a>

                                    <?php echo($consulta_loja['nome'])?>  


                                </p>
                            <?php 
                                }
                                ?>
                        </div> 
					        
             			<img id="imagem_detalhes" src="imagens/<?php echo($consulta['imagem_jogo2']);?>" width="100%" height="100%">
						

						    
						    
				
					    
					 
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