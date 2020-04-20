<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximun-scale=1.0, minimun-scale=1.0">
   <link href="https://fonts.googleapis.com/css?family=Slabo+27px&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="css/styles.css">
   <title>Galeria</title>
  
</head>
<body>
   <header>
       <div class="contenedor">
        	<h1 class="titulo">Mi increible galeria en PHP y MySQL</h1>
       </div>
   </header>

   
     <a href="subir.php" class="subir">Subir nueva imagen</a>
  

   <section class="fotos">
   	 <div class="contenedor">
     	<!--- diseño de las fotos -->
       <?php foreach ($fotos as $foto): ?>
   	 	    <div class="thumb">
   	 	    	<a href="foto.php?id=<?php echo $foto['ID'];?>">
   	 	 	    	<img src="fotos/<?php echo $foto['imagen']?>" alt="">
   	 	    	</a>
   	 	    </div>
        <?php endforeach; ?>   	    
   	 </div>

         <!--- diseño de la paginacion -->
     <div class="paginacion">           <!--- usando font awesome iconos -->
         <?php if ($pagina_actual > 1): ?>
             <a href="index.php?p=<?php echo $pagina_actual - 1; ?>" class="izquierda"><i class="fa fa-long-arrow-left"></i> Pagina Anterior</a>
         <?php endif ?>
           
           
         <?php if ($total_paginas != $pagina_actual): ?>  
             <a href="index.php?p=<?php echo $pagina_actual + 1?>" class="derecha">Pagina Siguiente <i class="fa fa-long-arrow-right"></i></a>
         <?php endif ?>
       </div>   
   </section> 	

   <footer>
   	   <p class="copyright">Galeria creada por Dieva Leon</p>
   </footer>	   
  
</body>
</html> 