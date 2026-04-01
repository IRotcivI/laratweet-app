<section class="content-grid">
    <!-- Chart Card -->
    <div class="glass-card chart-card">
        <div class="card-header">
            <div>
                <h2 class="card-title">Statistiques de Publication (Exemple)</h2>
                <p class="card-subtitle">Volume d'articles par mois</p>
            </div>
        </div>
        <div class="chart-wrapper">
            <div class="chart-container">
                <div class="chart-y-axis">
                    <span class="y-value">50</span>
                    <span class="y-value">40</span>
                    <span class="y-value">30</span>
                    <span class="y-value">20</span>
                    <span class="y-value">10</span>
                    <span class="y-value">0</span>
                </div>
                <div class="chart-placeholder">
                    <div class="chart-bar-group">
                        <div class="chart-bar bar-emerald" style="height: 40px;"></div><span
                            class="chart-label">Oct</span>
                    </div>
                    <div class="chart-bar-group">
                        <div class="chart-bar bar-gold" style="height: 80px;"></div><span class="chart-label">Nov</span>
                    </div>
                    <div class="chart-bar-group">
                        <div class="chart-bar bar-coral" style="height: 120px;"></div><span
                            class="chart-label">Dec</span>
                    </div>
                    <div class="chart-bar-group">
                        <div class="chart-bar bar-teal" style="height: {{ $postsCount * 2 }}px;"></div><span
                            class="chart-label">Jan</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Activity Feed -->
    <div class="glass-card activity-card">
        <div class="card-header">
            <div>
                <h2 class="card-title">Activité Récente</h2>
                <p class="card-subtitle">Dernières publications</p>
            </div>
        </div>
        <div class="activity-list">
            @foreach ($postsRecent as $post)
                <div class="activity-item">
                    <div class="activity-avatar"
                        style="background: linear-gradient(135deg, var(--emerald-light), var(--emerald));">
                        {{ strtoupper(substr($post->user->name, 0, 1)) }}
                    </div>
                    <div class="activity-content">
                        <p class="activity-text"><strong>{{ $post->user->name }}</strong> a publié
                            <em>{{ Str::limit($post->content, 30) }}</em>
                        </p>
                        <span class="activity-time">{{ $post->created_at->diffForHumans() }}</span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Data Table -->
    <div class="glass-card table-card">
        <div class="card-header">
            <div>
                <h2 class="card-title">Tous les Articles</h2>
                <p class="card-subtitle">Gestion rapide du contenu</p>
            </div>
            <div class="card-actions">
                <a href="{{ route('posts.create') }}" class="card-btn active">Nouveau Post</a>
            </div>
        </div>
        <div class="table-wrapper">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Auteur</th>
                        <th>Titre / Aperçu</th>
                        <th>Catégorie</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($postsRecent as $post)
                        <tr>
                            <td>
                                <div class="table-user">
                                    <div class="table-avatar"
                                        style="background: linear-gradient(135deg, var(--gold), var(--amber));">
                                        {{ strtoupper(substr($post->user->name, 0, 1)) }}
                                    </div>
                                    <div class="table-user-info">
                                        <span class="table-user-name">{{ $post->user->name }}</span>
                                    </div>
                                </div>
                            </td>
                            <td>{{ Str::limit($post->content, 40) }}</td>
                            <td><span class="status-badge processing">{{ $post->category->name ?? 'Sans' }}</span></td>
                            <td>{{ $post->created_at->translatedFormat('d M Y') }}</td>
                            <td>
                                <div class="table-actions">
                                    <a href="{{ route('posts.edit', $post) }}"
                                        style="color: var(--emerald-light); margin-right: 10px;">Edit</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
