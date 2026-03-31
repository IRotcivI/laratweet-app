<script src="{{ asset('back_auth/assets/js/templatemo-glass-admin-script.js') }}"></script>
<script>
function updateFileName(input) {
    const fileNameText = document.getElementById('file-name-text');
    
    if (input.files && input.files.length > 0) {
        // Affiche le nom du fichier sélectionné
        fileNameText.textContent = input.files[0].name;
        
        // Optionnel : change la couleur pour montrer que c'est validé
        fileNameText.style.color = 'var(--emerald-light)';
    } else {
        // Revient au texte par défaut si l'utilisateur annule
        fileNameText.textContent = "{{ isset($post) ? 'Modifier l\'image' : 'Choisir une image' }}";
        fileNameText.style.color = 'var(--text-bright)';
    }
}
</script>