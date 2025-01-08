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
            updateProfileImage();
        }
        reader.readAsDataURL(file);
    }
}


function updateProfileImage() {
    const fileInput = document.getElementById('profilePic');
    const file = fileInput.files[0];
    if (file) {
        const formData = new FormData();
        formData.append('profilePic', file);

        fetch('upload_profile_image.php', {
            method: 'POST',
            body: formData,
        })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    alert('Profile image updated successfully');
                } else {
                    alert('Error: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
    } else {
        alert('No file selected');
    }
}
