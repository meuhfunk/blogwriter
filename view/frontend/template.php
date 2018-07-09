<!doctype html>
<html lang="fr">
	<head>
	    <meta charset="utf-8" />
	    <title><?php echo $title ?></title>
	   	<meta name="description" content="Jean Forteroche : Billet simple pour l'Alaska..." />
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" />
		<link rel="stylesheet" href="public/css/style.css" type="text/css" />
	    <meta name="viewport" content="initial-scale=1.0" />
	    <link rel="icon" type="image/png" href="./public/img/favicon.png" />
	</head>

	<body>
		<div class="container-fluid introContainer">
			<div class="row introRow">
				<div id="header" class="col-md-4">
					<div id="titleBlog">
			            <p>JEAN FORTEROCHE</p>
			            <h1>Billet simple pour l'Alaska</h1></a>
			        </div>

			        <div id="biography">
			                <strong><p>Poème, roman, chronique, venez découvrir mon esprit pleins de mots et de maux..., Jean Forteroche vous propose aujourd'hui de découvrir son dernier livre, par publication régulière sur son blog.</p></strong>
			        </div>

			        <div class="adminPart">
						<div id="adminLinks">
							<a href="mailto:jean-forteroche@blog.com"><i class="fa fa-envelope-o fa-2x" aria-hidden="true"></i></a>
							<a href=""><i class="fa fa-facebook-square fa-2x" aria-hidden="true"></i></a>
							<a href=""><i class="fa fa-twitter fa-2x" aria-hidden="true"></i></a>
						</div>
					</div>

					<div id="pushFooter"></div>

					<div class="adminPart">
						<a href="index.php?action=loginForm" class="buttonStyle" id="adminConnexion">Connexion administrateur</a>
					</div>

                    <div class="footer">
						<p>Site de LEYMARIE Nicolas 2018</p>
					</div>
				</div>

				<div id="content" class="col-md">
			        <?php echo $content ?>
			    </div>
			</div>
		</div>

<!-- SCRIPTS -->

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script><script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<script src="https://use.fontawesome.com/bcf89603c7.js"></script>
	<script src="public/js/tinymce/tinymce.min.js"></script>
	<script>tinymce.init({ selector:'textarea' });</script>
	<script src="public/js/tinymce/jquery.tinymce.min.js"></script>
	<script>$("p:empty").remove();</script> <!-- permet d'enlever les <p> vides générés par tinyMCE -->

	<?php
	if (!empty($signalised)) {
	?>
	    <script> $('#modalSignal').modal('show'); </script> <!-- display la modal lorsqu'un commentaire est signalé (passe en true dans la bdd) -->
	<?php
	}
	?>
	</body>
</html>
