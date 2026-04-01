<section class="stats-grid">
    <div class="glass-card glass-card-3d stat-card">
        <div class="stat-card-inner">
            <div class="stat-info">
                <h3>Total Posts</h3>
                <div class="stat-value">{{ $postsCount }}</div>
                <span class="stat-change positive">Créés</span>
            </div>
            <div class="stat-icon cyan">
                <svg viewBox="0 0 24 24" fill="none" stroke="var(--emerald-light)" stroke-width="2">
                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z" />
                    <polyline points="14 2 14 8 20 8" />
                    <line x1="16" y1="13" x2="8" y2="13" />
                    <line x1="16" y1="17" x2="8" y2="17" />
                    <polyline points="10 9 9 9 8 9" />
                </svg>
            </div>
        </div>
    </div>

    <div class="glass-card glass-card-3d stat-card">
        <div class="stat-card-inner">
            <div class="stat-info">
                <h3>Catégories</h3>
                <div class="stat-value">{{ $totalCategories }}</div>
                <span class="stat-change positive">Catégories</span>
            </div>
            <div class="stat-icon magenta">
                <svg viewBox="0 0 24 24" fill="none" stroke="var(--gold)" stroke-width="2">
                    <path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z" />
                </svg>
            </div>
        </div>
    </div>

    <div class="glass-card glass-card-3d stat-card">
        <div class="stat-card-inner">
            <div class="stat-info">
                <h3>Tags Uniques</h3>
                <div class="stat-value">{{ $totalTags }}</div>
                <span class="stat-change positive">Mots-clés</span>
            </div>
            <div class="stat-icon purple">
                <svg viewBox="0 0 24 24" fill="none" stroke="var(--coral)" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path d="M12 2L2 7l10 5 10-5-10-5z"></path>
                    <path d="M2 17l10 5 10-5"></path>
                    <path d="M2 12l10 5 10-5"></path>
                </svg>
            </div>
        </div>
    </div>

    <div class="glass-card glass-card-3d stat-card">
        <div class="stat-card-inner">
            <div class="stat-info">
                <h3>Personnes</h3>
                <div class="stat-value">{{ $users }}</div>
                <span class="stat-change positive">Utilisateurs</span>
            </div>
            <div class="stat-icon success">
                <svg viewBox="0 0 24 24" fill="none" stroke="var(--success)" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path d="M17 21v-2a4 4 0 0 0-3.38-3.87"></path>
                    <path d="M9 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                    <circle cx="9" cy="7" r="4"></circle>
                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                </svg>
            </div>
        </div>
    </div>
</section>
