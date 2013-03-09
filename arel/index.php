<html>
    <head>
    	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    	<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
       	<script type="text/javascript" src="http://dev.junaio.com/arel/js/arel.js"></script>
    	<script type="text/javascript" src="logic_LBS9.js"></script>
    	<link href="style.css" rel="stylesheet" type="text/css" />
    	<title>First Arel</title>

	<script>
		
		$(document).ready(function(){
		  hideAll();

		  $("#filterButton").click(function(){
   		    hideAll();
		    $(".dropdown").show();
		  });

		  $("#searchButton").click(function(){
		    hideAll();
		    $(".step").show();
		  });

		  $("#addButton").click(function(){
		    hideAll();
		    $("#addForm").show();
		  });

		  $("#deleteButton").click(function(){
		    hideAll();
		    $("#delete").show();
		  });

		  $(".text").click(function(){
		    $("#content").text("Texto:");
		    $("#multimediaContent").show();
		  });

		  $(".link").click(function(){
                    $("#content").text("Enlace:");
		    //$("#inputContent").type("url");
		    $("#multimediaContent").show();
		  });
		});


		function hideAll() {
			$("#addForm").hide();
			$(".dropdown").hide();
			$(".step").hide();
			$("#multimediaContent").hide();
		};
	</script>
    </head>
	<body>
		<div class="filteroptions">
			<div class="filterbuttonArea">	
				<a href="#" class="filterButton">Options</a>
			</div>
			<div class="filterOptionsInner">
				<div class="dropdown">
					<div class="label">Category (Server):</div>
					<select id="filter">
						<option value="">All categories</option>
						<option value="">All categories</option>
					</select>
				</div>
				<div class="step">
					<form>
						<div class="label">Search (Locally):</div><input type="text" id="searchlocal" autocorrect="off" autocapitalize="off"/>				
					</form>
				</div>
				<form id="addForm" name="input" action="html_form_action.asp" method="post">
					Nombre: <input type="text" name="nombre"><br>
					Descripcion: <input type="text" name="descripcion">
					Multimedia: </br>
					<input class="text" type="radio" name="multimedia" value="texto">Texto
					<input class="link" type="radio" name="multimedia" value="imagen">Imagen
					<input class="link" type="radio" name="multimedia" value="sonido">Sonido
					<input class="link" type="radio" name="multimedia" value="video">Video<br>
					<div id="multimediaContent">
						<p id ="content">Texto:</p><input id="inputContent" type="text" name="contenido">
					</div>
					Categorias: </br>
					<?php
						$categorias = BD::consultarElem(new Categoria());
						foreach ($categorias as $value) {
						?>
						<input type="checkbox" name="categoria" value=<?php echo $value->nombre; ?> ><?php echo $value->nombre; ?><br>
					<?php   } ?>
					<input type="submit" value="Create">
				</form>
				<div id="buttonOptions">
					<button id="filterButton">Filtrar</button>
					<button id="searchButton">Buscar</button>
					<button id="addButton">Agregar</button>
					<button id="deleteButton">Eliminar</button>
				</div>
			</div>	
			
		</div>

	</body>            
</html>
