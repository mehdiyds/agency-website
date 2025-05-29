<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appartements à vendre et à louer | ImmoTunis</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <?php include 'header.php'; ?>
    <!-- Hero Section -->
    <section class="hero" style="background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('https://images.unsplash.com/photo-1502672260266-1c1ef2d93688?auto=format&fit=crop&w=1680&q=80') center/cover no-repeat;">
        <h1>Nos Appartements</h1>
        <p>Explorez notre sélection d'appartements modernes disponibles à l'achat ou à la location.</p>
    </section>

    <!-- Apartment Listings -->
    <section class="services" style="padding-top: 2rem;">
        <div class="section-title">
            <h2>Appartements Disponibles</h2>
        </div>
        <div class="services-grid">

            <div class="service-card">
                <div class="service-img">
                    <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=1470&q=80" alt="Appartement 1">
                </div>
                <div class="service-content">
                    <h3>Appartement Haut Standing - La Marsa</h3>
                    <p>Appartement 3 pièces avec balcon, cuisine équipée, proche de la plage.</p>
                    <a href="#" class="service-link">Détails <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>

            <div class="service-card">
                <div class="service-img">
                    <img src="https://images.unsplash.com/photo-1560448204-e02f11c3d0e2?auto=format&fit=crop&w=1470&q=80" alt="Appartement 2">
                </div>
                <div class="service-content">
                    <h3>Appartement Moderne - Centre-Ville Tunis</h3>
                    <p>Appartement lumineux avec 2 chambres, vue dégagée et parking privé.</p>
                    <a href="#" class="service-link">Détails <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>

            <div class="service-card">
                <div class="service-img">
                    <img src="https://images.unsplash.com/photo-1600585152930-bc3c732ae3f7?auto=format&fit=crop&w=1470&q=80" alt="Appartement 3">
                </div>
                <div class="service-content">
                    <h3>Appartement avec Terrasse - Ariana</h3>
                    <p>Surface 100 m² avec grande terrasse, proche des transports publics.</p>
                    <a href="#" class="service-link">Détails <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>

        </div>
    </section>

    <!-- Footer -->
<?php include 'footer.php'; ?>
</body>
</html>
