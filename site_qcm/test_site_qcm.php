<?php
	if (isset($_POST['val'])) {
		var_dump($_POST);
	}

?>


<!DOCTYPE html>

<html>
	<head>
		<title>Test Site QCM</title>
		<meta charset="utf-8"/>
		<link rel="stylesheet" type="text/css" href="style.css"/>

		<script type="text/javascript">
			var i = 1;
			var j = 2;

			function ajouter_question(num_q,element) {
				var formulaire = document.questionnaire;

				//initule de la question
				var champ = document.createElement("input");
				champ.name = "titreq"+num_q;
				champ.type = "text";
				champ.placeholder = "Question : ";

				var saut = document.createElement("br");

				//bouton ajout réponse
				var champ_reponse = document.createElement("input");
				champ_reponse.type="button";
				champ_reponse.value="Ajouter réponse";
				champ_reponse.onclick= function onclick(event) {ajouter_reponse(num_q,i,this);};

				//bouton supprimer
				var sup = document.createElement("input");
				sup.value = "supprimer un champ";
				sup.type = "button";
				// Ajout de l'événement onclick
				sup.onclick = function onclick(event)
				{suppression_question(this);};

				var bloc = document.createElement("div");
				bloc.id="question"+num_q;
				bloc.style.background = "grey";
				bloc.style.margin = "5px 5px 5px 5px";
				bloc.style.width = "80%";

				bloc.appendChild(sup);
				bloc.appendChild(champ);
				bloc.appendChild(saut);
				bloc.appendChild(champ_reponse);

				//formulaire.appendChild(bloc);

				formulaire.insertBefore(bloc,element);

				j = j + 1;
			}


			function ajouter_reponse(num_q,num_el,element) {
				//formulaire = window.document.questionnaire;

				var mon_id = "question"+num_q;

				//alert(mon_id);

				var formulaire = document.getElementById(mon_id);

				// Crée un nouvel élément de type "input texte"
				var champ = document.createElement("input");
				champ.name = "rep"+num_q+num_el;
				champ.type = "text";
				champ.placeholder = "Reponse : ";
				
				var champ_radio = document.createElement("input");
				champ_radio.name = "repq"+num_q;
				champ_radio.type = "radio";
				champ_radio.value = "q"+num_q+"rep"+num_el;

				var sup = document.createElement("input");
				sup.value = "supprimer un champ";
				sup.type = "button";
				// Ajout de l'événement onclick
				sup.onclick = function onclick(event)
				{suppression_reponse(num_q,this);};
				     
				// On crée un nouvel élément de type "p" et on insère le champ l'intérieur.
				var bloc = document.createElement("div");
				bloc.class="reponse";
				bloc.appendChild(sup);
				bloc.appendChild(champ);
				bloc.appendChild(champ_radio);

				//formulaire.appendChild(bloc);

				formulaire.insertBefore(bloc, element);

  				//				formulaire.insertBefore(ajout, element);
  				//				formulaire.insertBefore(sup, element);
  				//				formulaire.insertBefore(bloc, element);

				i = i + 1;
			}

			function suppression_reponse(num_q,element){
				var formulaire = window.document.questionnaire;

				var mon_id = "question"+num_q;

				var formulaire = document.getElementById(mon_id);

  
  				formulaire.removeChild(element.parentNode);
				// Supprime le champ
				//				formulaire.removeChild(element.nextSibling);
				// Supprime le bouton de suppression
				//				formulaire.removeChild(element);
			}

			function suppression_question(element) {
				var formulaire = window.document.questionnaire;

				formulaire.removeChild(element.parentNode);
			}

		</script>
	</head>

	<body>
		<div id="page">
			<form method="POST" action="" name="questionnaire">
				<input type="text" placeholder="Titre" name="titre"/>
				<br/><br/>

				<div id="question1">
					<input  type="text" placeholder="Question :" name="titreq1"/>
					<br/>
					<input type="button" onclick="javascript:ajouter_reponse(1,i,this)" value="Ajouter réponse"/>
						
				</div>

				<input type="button" onclick="javascript:ajouter_question(j,this)" value="Ajouter question" />
				<br/>
				<div id="envoyer">
					<input type="submit" name="val" value="Valider" />
				</div>

			</form>
		</div>
	</body>

</html>