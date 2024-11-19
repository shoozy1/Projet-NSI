<script>
    document.addEventListener('DOMContentLoaded', function () {
        let likeButtons = document.querySelectorAll('.btn-success');

        likeButtons.forEach(function (button) {
            button.addEventListener('click', function () {
                let message_id = button.parentElement.querySelector('input[name="message_id"]').value;

                // Simule une requête Ajax (remplacez cela par une vraie requête Ajax)
                // Vous devriez effectuer une requête Ajax vers likes.php avec les données du formulaire

                // Exemple de requête Ajax fictive :
                /*
                fetch('likes.php', {
                    method: 'POST',
                    body: JSON.stringify({ message_id }),
                    headers: {
                        'Content-Type': 'application/json',
                    },
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Si la requête est réussie, ajoute la classe "liked" et redirige
                        button.classList.add('liked');
                        alert('J\'aime ajouté avec succès!');
                        window.location.href = 'index.php';
                    } else {
                        // Si la requête échoue, affiche un message d'erreur
                        alert(data.message);
                    }
                })
                .catch(error => {
                    console.error('Erreur de requête Ajax:', error);
                });
                */

                // Remplacez la requête fictive ci-dessus par une vraie requête Ajax vers likes.php

                // Supprimez la ligne ci-dessous une fois que vous utilisez une vraie requête Ajax
                alert('J\'aime ajouté avec succès!');
                window.location.href = 'index.php';
            });
        });
    });
</script>
