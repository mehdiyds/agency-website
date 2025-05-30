<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Villas de Luxe | ImmoTunis</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <?php include 'header.php'; ?>

    <main class="villas-container">
        <section class="villas-hero">
            <div class="hero-content">
                <h1>Nos Villas de Luxe</h1>
                <p>Découvrez des propriétés exclusives avec piscine, jardin et vue imprenable</p>
            </div>
        </section>

        <?php
        // Tableau de données des villas
        $villas = [
            [
                'id' => 1,
                'title' => 'Villa moderne à Carthage',
                'location' => 'Carthage',
                'bedrooms' => 5,
                'bathrooms' => 4,
                'size' => 350,
                'price' => 1250000,
                'image' => 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80',
                'badge' => 'Exclusivité'
            ],
            [
                'id' => 2,
                'title' => 'Villa contemporaine à Hammamet',
                'location' => 'Hammamet',
                'bedrooms' => 6,
                'bathrooms' => 5,
                'size' => 420,
                'price' => 1750000,
                'image' => 'https://images.unsplash.com/photo-1605276374104-dee2a0ed3cd6?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80',
                'badge' => 'Nouveau'
            ],
            [
                'id' => 3,
                'title' => 'Villa spacieuse à Sousse',
                'location' => 'Sousse',
                'bedrooms' => 4,
                'bathrooms' => 3,
                'size' => 300,
                'price' => 950000,
                'image' => 'https://images.unsplash.com/photo-1582268611958-ebfd161ef9cf?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80',
                'badge' => 'Coup de cœur'
            ]
        ];

        // Récupération des filtres
        $selectedLocation = $_GET['location'] ?? '';
        $selectedBedrooms = $_GET['bedrooms'] ?? '';
        $minPrice = $_GET['min_price'] ?? '';
        $maxPrice = $_GET['max_price'] ?? '';

        // Filtrage des villas
        $filteredVillas = array_filter($villas, function($villa) use ($selectedLocation, $selectedBedrooms, $minPrice, $maxPrice) {
            // Filtre par localisation
            if (!empty($selectedLocation) && $villa['location'] !== $selectedLocation) {
                return false;
            }
            
            // Filtre par nombre de chambres
            if (!empty($selectedBedrooms) && $villa['bedrooms'] < $selectedBedrooms) {
                return false;
            }
            
            // Filtre par prix minimum
            if (!empty($minPrice) && $villa['price'] < $minPrice) {
                return false;
            }
            
            // Filtre par prix maximum
            if (!empty($maxPrice) && $villa['price'] > $maxPrice) {
                return false;
            }
            
            return true;
        });

        // Extraire les localisations uniques pour le filtre
        $locations = array_unique(array_column($villas, 'location'));
        sort($locations);
        ?>

        <!-- Filtres avancés -->
        <section class="property-filter">
            <div class="filter-container">
                <form class="filter-form" id="filterForm" method="GET" action="villa.php">
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
                            <option value="5" <?= $selectedBedrooms == 5 ? 'selected' : '' ?>>5+</option>
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
                        <a href="villa.php" class="reset-btn">
                            <i class="fas fa-times"></i> Réinitialiser
                        </a>
                    <?php endif; ?>
                </form>
            </div>
        </section>

        <!-- Liste des villas filtrées -->
        <section class="villas-list">
            <div class="property-grid" id="propertyGrid">
                <?php if (empty($filteredVillas)): ?>
                    <p class="no-results">Aucune villa ne correspond à vos critères de recherche.</p>
                <?php else: ?>
                    <?php foreach ($filteredVillas as $villa): ?>
                        <div class="property-card villa-card">
                            <div class="property-badge"><?= htmlspecialchars($villa['badge']) ?></div>
                            <div class="property-img">
                                <img src="<?= htmlspecialchars($villa['image']) ?>" alt="<?= htmlspecialchars($villa['title']) ?>">
                            </div>
                            <div class="property-info">
                                <h3><?= htmlspecialchars($villa['title']) ?></h3>
                                <p class="property-location"><i class="fas fa-map-marker-alt"></i> <?= htmlspecialchars($villa['location']) ?></p>
                                <div class="property-features">
                                    <span><i class="fas fa-bed"></i> <?= htmlspecialchars($villa['bedrooms']) ?> chambres</span>
                                    <span><i class="fas fa-bath"></i> <?= htmlspecialchars($villa['bathrooms']) ?> salles de bain</span>
                                    <span><i class="fas fa-ruler-combined"></i> <?= htmlspecialchars($villa['size']) ?> m²</span>
                                </div>
                                <div class="property-price"><?= number_format($villa['price'], 0, ',', ' ') ?> €</div>
                                <a href="villa-details.php?id=<?= htmlspecialchars($villa['id']) ?>" class="property-link">Voir les détails</a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </section>

        <section class="villas-cta">
            <div class="cta-content">
                <h2>Vous ne trouvez pas votre villa idéale ?</h2>
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

            // Envoyer une requête AJAX pour filtrer les villas
            $.ajax({
                url: 'villa.php',
                type: 'GET',
                data: filters,
                success: function(response) {
                    // Extraire le contenu de la section des villas
                    var filteredContent = $(response).find('#propertyGrid').html();
                    $('#propertyGrid').html(filteredContent);

                    // Mettre à jour l'URL sans recharger la page
                    history.pushState(null, '', 'villa.php?' + $.param(filters));
                }
            });
        });

        // Gérer le bouton de réinitialisation
        $('.reset-btn').on('click', function(e) {
            e.preventDefault();
            window.location.href = 'villa.php';
        });
    });
    </script>
</body>
</html>