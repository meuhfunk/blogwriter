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
			            <a href="index.php?action=adminIndex"><img id="leather" src="./public/img/jean.jpg" alt="logo_JF" />
			            <h1>Billet simple </h1></a>
			        </div>

			        <div id="admin">
		                <p>Administration</p>

		                <a href="index.php" class="buttonStyle" method="post">Billets</a>
		                <a href="index.php?action=displaySignalisedCommentsAdmin" class="buttonStyle" method="post">Commentaires signalés</a>
		                <a href="index.php?action=adminAccountModificationsForm" class="buttonStyle">Paramètres compte</a>
		                <a href="index.php?action=logout" class="buttonStyle">Déconnexion</a>
                    </div>

                    <div id="pushFooter"></div>

					<div class="footer">

					</div>
				</div>

				<div id="content" class="col-md">
			        <?php echo $content ?>
			    </div>
			</div>
		</div>

<!-- SCRIPTS -->

		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
		<script src="https://use.fontawesome.com/bcf89603c7.js"></script>
	    <script src="public/js/tinymce/tinymce.min.js"></script>
  		<script>tinymce.init({ selector:'textarea' });</script>
	    <script src="public/js/tinymce/jquery.tinymce.min.js"></script>
		<script>$("p:empty").remove();</script> <!-- permet d'enlever les <p> vides générés par tinyMCE -->

	</body>
</html>
