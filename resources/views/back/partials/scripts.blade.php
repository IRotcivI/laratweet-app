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
<script>
    const tagTyper = document.getElementById('tag-typer');
    const tagsWrapper = document.getElementById('tags-wrapper');
    const hiddenTags = document.getElementById('hidden-tags');

    let tagsArray = hiddenTags.value ? hiddenTags.value.split(',') : [];
    if (tagsArray.length > 0 && tagsArray[0] !== "") renderTags();

    tagTyper.addEventListener('keydown', function(e) {
        if (e.key === ',' || e.key === 'Enter') {
            e.preventDefault();
            let tag = tagTyper.value.trim().replace(/,/g, '');

            if (tag && !tagsArray.includes(tag)) {
                tagsArray.push(tag);
                renderTags();
            }
            tagTyper.value = '';
        }
    });

    function renderTags() {
        tagsWrapper.innerHTML = '';
        tagsArray.forEach((tag, index) => {
            if (tag.trim() !== "") {
                const span = document.createElement('span');
                span.classList.add('tag-badge');
                span.innerHTML = `
                    ${tag} 
                    <span class="remove-tag" onclick="removeTag(${index})">&times;</span>
                `;
                tagsWrapper.appendChild(span);
            }
        });
        hiddenTags.value = tagsArray.join(',');
    }

    function removeTag(index) {
        tagsArray.splice(index, 1);
        renderTags();
    }
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"
    integrity="sha512-Zq9o+E00xhhR/7vJ49mxFNJ0KQw1E1TMWkPTxrWcnpfEFDEXgUiwJHIKit93EW/XxE31HSI5GEOW06G6BF1AtA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
