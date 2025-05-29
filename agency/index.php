<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ImmoTunis - Votre agence immobilière</title>
    <link rel="stylesheet" href="style.css">
    <script src="controle.js"></script>
<body>
<?php include 'header.php'; ?>
    <!-- Hero Section -->
    <section class="hero" id="home">
        <h1>Trouvez la propriété de vos rêves</h1>
        <p>Notre agence vous accompagne dans tous vos projets immobiliers en Tunisie avec professionnalisme et transparence.</p>
        <div class="cta-buttons">
            <a href="#acheter" class="btn btn-primary">Acheter</a>
            <a href="#louer" class="btn btn-secondary">Louer</a>
        </div>
    </section>

    <!-- Acheter Section -->
    <section class="services" id="acheter">
        <div class="section-title">
            <h2>Propriétés à Vendre</h2>
        </div>
        <div class="services-grid">
            <div class="service-card">
                <div class="service-img">
                    <img src="https://images.unsplash.com/photo-1564013799919-ab600027ffc6?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" alt="Maison">
                </div>
                <div class="service-content">
                    <h3>Maisons</h3>
                    <p>Découvrez notre sélection de maisons spacieuses avec jardins dans les meilleurs quartiers.</p>
                    <a href="#" class="service-link">Voir les offres <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
            <div class="service-card">
                <div class="service-img">
                    <img src="https://images.unsplash.com/photo-1502672260266-1c1ef2d93688?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1680&q=80" alt="Appartement">
                </div>
                <div class="service-content">
                    <h3>Appartements</h3>
                    <p>Appartements modernes et fonctionnels en centre-ville ou en bord de mer.</p>
                    <a href="appartement.php" class="service-link">Voir les offres <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
            <div class="service-card">
                <div class="service-img">
                    <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" alt="Villa">
                </div>
                <div class="service-content">
                    <h3>Villas</h3>
                    <p>Villas de luxe avec piscine et vue imprenable pour une vie de standing.</p>
                    <a href="#" class="service-link">Voir les offres <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </section>

    <!-- Louer Section -->
    <section class="services" id="louer" style="background: #f0f4f8;">
        <div class="section-title">
            <h2>Propriétés à Louer</h2>
        </div>
        <div class="services-grid">
            <div class="service-card">
                <div class="service-img">
                    <img src="https://images.unsplash.com/photo-1522708323590-d24dbb6b0267?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" alt="Appartement à louer">
                </div>
                <div class="service-content">
                    <h3>Location courte durée</h3>
                    <p>Appartements meublés et équipés pour vos séjours temporaires en toute sérénité.</p>
                    <a href="#" class="service-link">Voir les offres <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
            <div class="service-card">
                <div class="service-img">
                    <img src="https://images.unsplash.com/photo-1554469384-e58fac16e23a?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1374&q=80" alt="Bureau">
                </div>
                <div class="service-content">
                    <h3>Locaux professionnels</h3>
                    <p>Bureaux, commerces et espaces professionnels dans les zones d'activité stratégiques.</p>
                    <a href="#" class="service-link">Voir les offres <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
            <div class="service-card">
                <div class="service-img">
                    <img src="https://images.unsplash.com/photo-1582268611958-ebfd161ef9cf?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" alt="Maison à louer">
                </div>
                <div class="service-content">
                    <h3>Location longue durée</h3>
                    <p>Maisons et appartements pour vos projets de vie à moyen et long terme.</p>
                    <a href="#" class="service-link">Voir les offres <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </section>

    <!-- Qui sommes-nous Section -->
    <section class="about" id="about">
        <div class="about-container">
            <div class="about-img">
                <img src="https://images.unsplash.com/photo-1600880292203-757bb62b4baf?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" alt="Notre équipe">
            </div>
            <div class="about-content">
                <h2>Qui sommes-nous</h2>
                <p>ImmoTunis est une agence immobilière tunisienne créée en 2010, spécialisée dans l'achat, la vente et la location de biens immobiliers de qualité.</p>
                <p>Notre équipe de professionnels vous accompagne avec expertise et transparence dans tous vos projets immobiliers, que vous soyez acheteur, vendeur ou locataire.</p>
                <div class="stats">
                    <div class="stat-item">
                        <h3>12+</h3>
                        <p>Années d'expérience</p>
                    </div>
                    <div class="stat-item">
                        <h3>500+</h3>
                        <p>Clients satisfaits</p>
                    </div>
                    <div class="stat-item">
                        <h3>200+</h3>
                        <p>Propriétés disponibles</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="contact" id="contact">
        <div class="section-title">
            <h2>Contactez-nous</h2>
        </div>
        <div class="contact-container">
            <div class="contact-info">
                <div class="contact-item">
                    <div class="contact-icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <div class="contact-text">
                        <h3>Adresse</h3>
                        <p>123 Avenue Habib Bourguiba, Tunis</p>
                    </div>
                </div>
                <div class="contact-item">
                    <div class="contact-icon">
                        <i class="fas fa-phone-alt"></i>
                    </div>
                    <div class="contact-text">
                        <h3>Téléphone</h3>
                        <p><a href="tel:+21670123456">+216 70 123 456</a></p>
                    </div>
                </div>
                <div class="contact-item">
                    <div class="contact-icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div class="contact-text">
                        <h3>Email</h3>
                        <p><a href="mailto:contact@immotunis.tn">contact@immotunis.tn</a></p>
                    </div>
                </div>
                <div class="contact-item">
                    <div class="contact-icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div class="contact-text">
                        <h3>Heures d'ouverture</h3>
                        <p>Lundi - Vendredi: 9h - 18h</p>
                        <p>Samedi: 9h - 13h</p>
                    </div>
                </div>
            </div>
            <div class="contact-form">
                <form>
                    <div class="form-group">
                        <label for="name">Nom complet</label>
                        <input type="text" id="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Téléphone</label>
                        <input type="tel" id="phone" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="subject">Sujet</label>
                        <select id="subject" class="form-control">
                            <option value="achat">Achat d'une propriété</option>
                            <option value="location">Location</option>
                            <option value="estimation">Estimation de bien</option>
                            <option value="autre">Autre demande</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea id="message" class="form-control" required></textarea>
                    </div>
                    <button type="submit" class="submit-btn">Envoyer le message</button>
                </form>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php include 'footer.php'; ?>
</body>
</html>