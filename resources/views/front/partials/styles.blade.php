<link rel="stylesheet" href="{{ asset('front/assets/css/templatemo-glass-admin-style.css') }}">
<style>
    /* Ajustements spécifiques au Front */
    body {
        overflow-x: hidden;
    }

    .public-nav {
        position: sticky;
        top: 0;
        z-index: 1000;
        margin-bottom: 2rem;
    }

    .hero-section {
        padding: 60px 0;
        text-align: center;
    }

    .posts-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
        gap: 30px;
        padding: 20px;
    }

    .post-card {
        transition: transform 0.3s ease;
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    .post-card:hover {
        transform: translateY(-10px);
    }

    .post-image {
        width: 100%;
        height: 200px;
        object-fit: cover;
        border-radius: 12px;
        margin-bottom: 15px;
        border: 1px solid var(--glass-border);
    }

    .post-category {
        color: var(--emerald-light);
        font-size: 0.8rem;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .post-tags {
        margin-top: auto;
        padding-top: 15px;
    }

    .tag-pill {
        display: inline-block;
        padding: 2px 10px;
        background: rgba(255, 255, 255, 0.05);
        border-radius: 20px;
        font-size: 0.7rem;
        color: var(--gold-light);
        margin-right: 5px;
    }
</style>
<style>
    /* Style pour le contenu rendu par l'éditeur (CKEditor/TinyMCE) */
    .post-content p {
        margin-bottom: 1.5rem;
    }

    .post-content h2 {
        color: var(--emerald-light);
        margin: 2rem 0 1rem;
        font-size: 1.8rem;
    }

    .post-content h3 {
        color: var(--gold-light);
        margin: 1.5rem 0 1rem;
        font-size: 1.5rem;
    }

    .post-content ul,
    .post-content ol {
        margin-bottom: 1.5rem;
        padding-left: 20px;
    }

    .post-content li {
        margin-bottom: 0.5rem;
    }

    .post-content blockquote {
        border-left: 4px solid var(--emerald-light);
        padding: 10px 25px;
        background: rgba(255, 255, 255, 0.03);
        font-style: italic;
        margin: 2rem 0;
    }
</style>
<style>
    /* Harmonisation du contenu HTML */
    .post-content p {
        margin-bottom: 1.6rem;
    }

    .post-content h2 {
        color: #fff;
        margin-top: 2.5rem;
        font-size: 1.8rem;
    }

    .post-content img {
        max-width: 100%;
        border-radius: 12px;
        margin: 2rem 0;
    }

    /* Animation douce à l'arrivée uniquement */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>
