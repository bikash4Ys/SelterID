document.getElementById('registrationForm').addEventListener('submit', async function (e) {
    e.preventDefault();

    const formData = new FormData(this);
    const responseMessage = document.getElementById('responseMessage');

    try {
        // Send form data to the backend PHP API
        const response = await fetch(API_URL, {
            method: 'POST',
            body: formData,
        });

        if (response.ok) {
            const result = await response.json();
            responseMessage.textContent = result.message || 'Registration Successful!';
        } else {
            throw new Error('Failed to register');
        }
    } catch (error) {
        responseMessage.textContent = `Error: ${error.message}`;
        responseMessage.style.color = 'red';
    }
});
const openCameraBtn = document.getElementById('openCameraBtn');
const video = document.getElementById('video');
const captureBtn = document.getElementById('captureBtn');
const canvas = document.getElementById('canvas');
const photoInput = document.getElementById('photo');

openCameraBtn.addEventListener('click', async () => {
    const stream = await navigator.mediaDevices.getUserMedia({ video: true });
    video.srcObject = stream;
    video.style.display = 'block';
    captureBtn.style.display = 'block';
});

captureBtn.addEventListener('click', () => {
    const context = canvas.getContext('2d');
    context.drawImage(video, 0, 0, canvas.width, canvas.height);
    canvas.toBlob((blob) => {
        const file = new File([blob], 'captured-image.png', { type: 'image/png' });
        const dataTransfer = new DataTransfer();
        dataTransfer.items.add(file);
        photoInput.files = dataTransfer.files;
        video.style.display = 'none';
        captureBtn.style.display = 'none';
    });
});