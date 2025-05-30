<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appartements | ImmoTunis</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <?php include 'header.php'; ?>

    <main class="villas-container">
        <section class="villas-hero">
            <div class="hero-content">
                <h1>Nos Appartements</h1>
                <p>Découvrez des appartements modernes en centre-ville ou en bord de mer</p>
            </div>
        </section>

        <?php
        // Tableau de données des appartements
        $appartements = [
            [
                'id' => 1,
                'title' => 'Appartement moderne à Tunis',
                'location' => 'Tunis Centre',
                'bedrooms' => 3,
                'bathrooms' => 2,
                'size' => 120,
                'price' => 450000,
                'image' => 'https://images.unsplash.com/photo-1502672260266-1c1ef2d93688?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1680&q=80',
                'badge' => 'Nouveau'
            ],
            [
                'id' => 2,
                'title' => 'Appartement vue mer à Sousse',
                'location' => 'Sousse',
                'bedrooms' => 2,
                'bathrooms' => 1,
                'size' => 90,
                'price' => 320000,
                'image' => 'https://images.unsplash.com/photo-1522708323590-d24dbb6b0267?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80',
                'badge' => 'Vue mer'
            ],
            [
                'id' => 3,
                'title' => 'Appartement standing à Lac',
                'location' => 'Lac Tunis',
                'bedrooms' => 4,
                'bathrooms' => 2,
                'size' => 150,
                'price' => 650000,
                'image' => 'https://images.unsplash.com/photo-1554469384-e58fac16e23a?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1374&q=80',
                'badge' => 'Standing'
            ]
        ];

        // Récupération des filtres
        $selectedLocation = $_GET['location'] ?? '';
        $selectedBedrooms = $_GET['bedrooms'] ?? '';
        $minPrice = $_GET['min_price'] ?? '';
        $maxPrice = $_GET['max_price'] ?? '';

        // Filtrage des appartements
        $filteredAppartements = array_filter($appartements, function($appartement) use ($selectedLocation, $selectedBedrooms, $minPrice, $maxPrice) {
            // Filtre par localisation
            if (!empty($selectedLocation) && $appartement['location'] !== $selectedLocation) {
                return false;
            }
            
            // Filtre par nombre de chambres
            if (!empty($selectedBedrooms) && $appartement['bedrooms'] < $selectedBedrooms) {
                return false;
            }
            
            // Filtre par prix minimum
            if (!empty($minPrice) && $appartement['price'] < $minPrice) {
                return false;
            }
            
            // Filtre par prix maximum
            if (!empty($maxPrice) && $appartement['price'] > $maxPrice) {
                return false;
            }
            
            return true;
        });

        // Extraire les localisations uniques pour le filtre
        $locations = array_unique(array_column($appartements, 'location'));
        sort($locations);
        ?>

        <!-- Filtres avancés -->
        <section class="property-filter">
            <div class="filter-container">
                <form class="filter-form" id="filterForm" method="GET" action="appartements.php">
                    <div class="filter-group">
                        <label for="location">Localisation</label>
                        <select id="location" name="location">
                            <option value="">Toutes</option>
                            <?php foreach ($locations as $loc): ?>
                                <option value="<?= htmlspecialchars($loc) ?>" <?= $selectedLocation === $loc ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($loc) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="filter-group">
                        <label for="bedrooms">Chambres minimum</label>
                        <select id="bedrooms" name="bedrooms">
                            <option value="">Tous</option>
                            <option value="1" <?= $selectedBedrooms == 1 ? 'selected' : '' ?>>1+</option>
                            <option value="2" <?= $selectedBedrooms == 2 ? 'selected' : '' ?>>2+</option>
                            <option value="3" <?= $selectedBedrooms == 3 ? 'selected' : '' ?>>3+</option>
                            <option value="4" <?= $selectedBedrooms == 4 ? 'selected' : '' ?>>4+</option>
                        </select>
                    </div>

                    <div class="filter-group">
                        <label for="min_price">Prix min (€)</label>
                        <input type="number" id="min_price" name="min_price" placeholder="Min" 
                               value="<?= htmlspecialchars($minPrice) ?>">
                    </div>

                    <div class="filter-group">
                        <label for="max_price">Prix max (€)</label>
                        <input type="number" id="max_price" name="max_price" placeholder="Max" 
                               value="<?= htmlspecialchars($maxPrice) ?>">
                    </div>

                    <?php if (!empty($selectedLocation) || !empty($selectedBedrooms) || !empty($minPrice) || !empty($maxPrice)): ?>
                        <a href="appartements.php" class="reset-btn">
                            <i class="fas fa-times"></i> Réinitialiser
                        </a>
                    <?php endif; ?>
                </form>
            </div>
        </section>

        <!-- Liste des appartements filtrés -->
        <section class="villas-list">
            <div class="property-grid" id="propertyGrid">
                <?php if (empty($filteredAppartements)): ?>
                    <p class="no-results">Aucun appartement ne correspond à vos critères de recherche.</p>
                <?php else: ?>
                    <?php foreach ($filteredAppartements as $appartement): ?>
                        <div class="property-card villa-card">
                            <div class="property-badge"><?= htmlspecialchars($appartement['badge']) ?></div>
                            <div class="property-img">
                                <img src="<?= htmlspecialchars($appartement['image']) ?>" alt="<?= htmlspecialchars($appartement['title']) ?>">
                            </div>
                            <div class="property-info">
                                <h3><?= htmlspecialchars($appartement['title']) ?></h3>
                                <p class="property-location"><i class="fas fa-map-marker-alt"></i> <?= htmlspecialchars($appartement['location']) ?></p>
                                <div class="property-features">
                                    <span><i class="fas fa-bed"></i> <?= htmlspecialchars($appartement['bedrooms']) ?> chambres</span>
                                    <span><i class="fas fa-bath"></i> <?= htmlspecialchars($appartement['bathrooms']) ?> salles de bain</span>
                                    <span><i class="fas fa-ruler-combined"></i> <?= htmlspecialchars($appartement['size']) ?> m²</span>
                                </div>
                                <div class="property-price"><?= number_format($appartement['price'], 0, ',', ' ') ?> €</div>
                                <a href="appartement-details.php?id=<?= htmlspecialchars($appartement['id']) ?>" class="property-link">Voir les détails</a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </section>

        <section class="villas-cta">
            <div class="cta-content">
                <h2>Vous ne trouvez pas votre appartement idéal ?</h2>
                <p>Nos conseillers peuvent vous aider à trouver la propriété parfaite</p>
                <a href="index.php#contact" class="cta-btn">Contactez un conseiller</a>
            </div>
        </section>
    </main>

    <?php include 'footer.php'; ?>

    <script>
    $(document).ready(function() {
        // Écouter les changements sur les éléments de filtre
        $('#location, #bedrooms, #min_price, #max_price').on('change keyup', function() {
            // Récupérer les valeurs des filtres
            var filters = {
                location: $('#location').val(),
                bedrooms: $('#bedrooms').val(),
                min_price: $('#min_price').val(),
                max_price: $('#max_price').val()
            };

            // Envoyer une requête AJAX pour filtrer les appartements
            $.ajax({
                url: 'appartements.php',
                type: 'GET',
                data: filters,
                success: function(response) {
                    // Extraire le contenu de la section des appartements
                    var filteredContent = $(response).find('#propertyGrid').html();
                    $('#propertyGrid').html(filteredContent);

                    // Mettre à jour l'URL sans recharger la page
                    history.pushState(null, '', 'appartements.php?' + $.param(filters));
                }
            });
        });

        // Gérer le bouton de réinitialisation
        $('.reset-btn').on('click', function(e) {
            e.preventDefault();
            window.location.href = 'appartements.php';
        });
    });
    </script>
</body>
</html>