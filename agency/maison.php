<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maisons | ImmoTunis</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <?php include './header.php'; ?>

    <main class="villas-container">
        <section class="villas-hero">
            <div class="hero-content">
                <h1>Nos Maisons</h1>
                <p>Découvrez des maisons spacieuses avec jardin dans les meilleurs quartiers</p>
            </div>
        </section>

        <?php
        $maisons = [
            [
                'id' => 1,
                'title' => 'Maison moderne à La Marsa',
                'location' => 'La Marsa',
                'bedrooms' => 4,
                'bathrooms' => 3,
                'size' => 280,
                'price' => 850000,
                'image' => 'https://images.unsplash.com/photo-1564013799919-ab600027ffc6?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80',
                'badge' => 'Exclusivité'
            ],
            [
                'id' => 2,
                'title' => 'Maison traditionnelle à Sidi Bou Said',
                'location' => 'Sidi Bou Said',
                'bedrooms' => 5,
                'bathrooms' => 4,
                'size' => 320,
                'price' => 1200000,
                'image' => 'https://images.unsplash.com/photo-1605146769289-440113cc3d00?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80',
                'badge' => 'Coup de cœur'
            ],
            [
                'id' => 3,
                'title' => 'Maison contemporaine à Gammarth',
                'location' => 'Gammarth',
                'bedrooms' => 6,
                'bathrooms' => 4,
                'size' => 380,
                'price' => 1500000,
                'image' => 'https://images.unsplash.com/photo-1600607687920-4e2a09cf159d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80',
                'badge' => 'Nouveau'
            ]
        ];

        $selectedLocation = $_GET['location'] ?? '';
        $selectedBedrooms = $_GET['bedrooms'] ?? '';
        $minPrice = $_GET['min_price'] ?? '';
        $maxPrice = $_GET['max_price'] ?? '';

        $filteredMaisons = array_filter($maisons, function($maison) use ($selectedLocation, $selectedBedrooms, $minPrice, $maxPrice) {
            if (!empty($selectedLocation) && $maison['location'] !== $selectedLocation) return false;
            if (!empty($selectedBedrooms) && $maison['bedrooms'] < $selectedBedrooms) return false;
            if (!empty($minPrice) && $maison['price'] < $minPrice) return false;
            if (!empty($maxPrice) && $maison['price'] > $maxPrice) return false;
            return true;
        });

        $locations = array_unique(array_column($maisons, 'location'));
        sort($locations);
        ?>

        <section class="property-filter">
            <div class="filter-container">
                <form class="filter-form" id="filterForm" method="GET" action="./maison.php">
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
                        <input type="number" id="min_price" name="min_price" placeholder="Min" value="<?= htmlspecialchars($minPrice) ?>">
                    </div>

                    <div class="filter-group">
                        <label for="max_price">Prix max (€)</label>
                        <input type="number" id="max_price" name="max_price" placeholder="Max" value="<?= htmlspecialchars($maxPrice) ?>">
                    </div>

                    <?php if (!empty($selectedLocation) || !empty($selectedBedrooms) || !empty($minPrice) || !empty($maxPrice)): ?>
                        <a href="./maison.php" class="reset-btn">
                            <i class="fas fa-times"></i> Réinitialiser
                        </a>
                    <?php endif; ?>
                </form>
            </div>
        </section>

        <section class="villas-list">
            <div class="property-grid" id="propertyGrid">
                <?php if (empty($filteredMaisons)): ?>
                    <p class="no-results">Aucune maison ne correspond à vos critères de recherche.</p>
                <?php else: ?>
                    <?php foreach ($filteredMaisons as $maison): ?>
                        <div class="property-card villa-card">
                            <div class="property-badge"><?= htmlspecialchars($maison['badge']) ?></div>
                            <div class="property-img">
                                <img src="<?= htmlspecialchars($maison['image']) ?>" alt="<?= htmlspecialchars($maison['title']) ?>">
                            </div>
                            <div class="property-info">
                                <h3><?= htmlspecialchars($maison['title']) ?></h3>
                                <p class="property-location"><i class="fas fa-map-marker-alt"></i> <?= htmlspecialchars($maison['location']) ?></p>
                                <div class="property-features">
                                    <span><i class="fas fa-bed"></i> <?= $maison['bedrooms'] ?> chambres</span>
                                    <span><i class="fas fa-bath"></i> <?= $maison['bathrooms'] ?> salles de bain</span>
                                    <span><i class="fas fa-ruler-combined"></i> <?= $maison['size'] ?> m²</span>
                                </div>
                                <div class="property-price"><?= number_format($maison['price'], 0, ',', ' ') ?> €</div>
                                <a href="./maison-details.php?id=<?= $maison['id'] ?>" class="property-link">Voir les détails</a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </section>

        <section class="villas-cta">
            <div class="cta-content">
                <h2>Vous ne trouvez pas votre maison idéale ?</h2>
                <p>Nos conseillers peuvent vous aider à trouver la propriété parfaite</p>
                <a href="./index.php#contact" class="cta-btn">Contactez un conseiller</a>
            </div>
        </section>
    </main>

    <?php include './footer.php'; ?>

    <script>
    $(document).ready(function() {
        // Gestion des filtres
        const handleFilterChange = function() {
            const filters = {
                location: $('#location').val(),
                bedrooms: $('#bedrooms').val(),
                min_price: $('#min_price').val(),
                max_price: $('#max_price').val()
            };

            $.ajax({
                url: './maison.php',
                type: 'GET',
                data: filters,
                success: function(response) {
                    $('#propertyGrid').html($(response).find('#propertyGrid').html());
                    history.pushState(null, '', './maison.php?' + $.param(filters));
                },
                error: function(xhr, status, error) {
                    console.error("Erreur AJAX:", status, error);
                }
            });
        };

        $('#location, #bedrooms, #min_price, #max_price').on('change keyup', handleFilterChange);

        $('.reset-btn').on('click', function(e) {
            e.preventDefault();
            window.location.href = './maison.php';
        });
    });
    </script>
</body>
</html>