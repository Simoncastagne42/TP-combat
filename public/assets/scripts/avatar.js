const avatarDropdown = document.getElementById('hero-avatar');
const avatarImagePreview = document.getElementById('avatar-image-preview');

avatarDropdown.addEventListener('change', function () {
    const selectedOption = avatarDropdown.options[avatarDropdown.selectedIndex];
    const imageUrl = selectedOption.value; // Utilise la valeur de l'option pour l'URL de l'image
    avatarImagePreview.src = imageUrl;
});