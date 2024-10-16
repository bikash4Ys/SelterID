// JavaScript functionality for dashboard
document.querySelector('.edit-btn').addEventListener('click', function() {
    alert('Edit profile clicked');
});

document.querySelector('.face-scan-btn').addEventListener('click', function() {
    alert('Face scan clicked');
});
function previewImage(event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const imgElement = document.getElementById('profileImage');
            imgElement.src = e.target.result; // Set the image source to the selected file
        }
        reader.readAsDataURL(file);
    }
}
