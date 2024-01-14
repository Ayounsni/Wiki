
   $(document).ready(function(){
    $('#searchInputMain').on('input', function(){
        var searchTerm = $(this).val();

        // Ajoutez une condition pour vérifier si la barre de recherche est vide
        if (searchTerm === '') {
            // Barre de recherche vide, chargez la première page normalement
            loadFirstPage();
        } else {
            // Barre de recherche non vide, effectuez la requête AJAX
            $.ajax({
                url: 'http://localhost/wiki/users/searchAjax',
                type: 'GET',
                data: { term: searchTerm },
                success: function(data) {
                    // Mettez à jour le contenu de #searchResults avec les résultats
                    displaySearchResults(data);
                },
                dataType: 'json'
            });
        }
    });

    function loadFirstPage() {
        // Charger la première page ici
         window.location.href = 'http://localhost/wiki/users/index';
    }
        // Fonction pour afficher les résultats de recherche
        function displaySearchResults(results) {
            var searchResultsContainer = $('#searchResults');
            searchResultsContainer.empty();

            if (results.length > 0) {
                // Bouclez à travers les résultats de la recherche
                for (var i = 0; i < results.length; i++) {
                    var searchResult = results[i];

                    // Créez la structure HTML pour chaque résultat de recherche
                    var resultItem = $('<div class="wi d-flex flex-column my-3">');
                    resultItem.append('<h3 class="text-center fs-5 fw-bolder border rounded-2">' + searchResult.titre + '</h3>');
                    resultItem.append('<a href="#"><img src="http://localhost/wiki/image/art.jpg" alt="img" class="edito-poster shadow-sm rounded" height="5"></a>');
                    resultItem.append('<p class="fs-6 orange1 fw-bold m-0 ">Catégorie : <span class="text-black fw-medium">' + searchResult.categorie_name + '</span></p>');
                    resultItem.append('<p class="truncate-text my-1">' + searchResult.contenu + '</p>');
                    resultItem.append('<p class="fs-6 orange1 fw-bold m-0 ">Tags : <span class="fw-medium text-success">#' + searchResult.tag_name + '/</span></p>');
                    resultItem.append('<div class="text-center"><a href="<?php echo URLROOT; ?>/users/contenu/' + searchResult.id_wiki + '" class="btn btn-sm orange text-light text-center w-50 my-4 "><i class="bi bi-book"></i> Read more</a></div>');

                    // Ajoutez l'élément de résultat à la liste des résultats
                    searchResultsContainer.append(resultItem);
                }
            } else {
                // Aucun résultat trouvé
                searchResultsContainer.text('Aucun résultat trouvé.');
            }
        }
    });