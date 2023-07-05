$(document).ready(function () {
	$('#connexionSubmit').click(function (e) {
		e.preventDefault();
		let emptyInputCount = 0;
		if (emptyInputCount == 0) {
			let emailutilisateur = $('#email').val();
			let motdepasseutilisateur = $('#passe').val();
			let atpos = emailutilisateur.indexOf('@');
			let dotpos = emailutilisateur.lastIndexOf('.com');
			let form_data = new FormData();
			form_data.append('email', emailutilisateur);
			form_data.append('passe', motdepasseutilisateur);
			if (emailutilisateur == '') {
				$('#email').html('Entrez votre email !');
			} else if (
				atpos < 1 ||
				dotpos < atpos + 2 ||
				dotpos + 2 >= emailutilisateur.length
			) {
				//Vérifier si l'-email est valide
				$('#email').html('Entrez un email valide !');
			} else if (motdepasseutilisateur == '') {
				$('#motpass').html('Entrez votre mot de passe!');
			} else {
				$.ajax({
					url: 'traite-connexion-professeur.php',
					type: 'POST',
					dataType: 'script',
					cache: false,
					contentType: false,
					processData: false,
					data: form_data,

					success: function (dat2) {
						if (dat2 == 1) {
							window.location.href = 'professeur.php';
						} else if (dat2 == 0) {
							$('#erreurconnexion').html(
								'<div class="alert alert-danger">' +
									'E-mail ou mot de passe incorrecte !' +
									'</div>',
							);
							$('#email').hide();
						} else alert('Unable to Upload');
					},
				});
			}
		}
	});
});
