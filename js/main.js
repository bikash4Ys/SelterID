document.addEventListener('DOMContentLoaded', () => {
    // Elements for registration page
    const video = document.getElementById('video');
    const canvas = document.getElementById('canvas');
    const captureBtn = document.getElementById('captureBtn');
    const openCameraBtn = document.getElementById('openCameraBtn');
    const context = canvas.getContext('2d');

    // Open camera for registration
    if (openCameraBtn) {
        openCameraBtn.addEventListener('click', () => {
            video.style.display = 'block';
            captureBtn.style.display = 'block';

            navigator.mediaDevices.getUserMedia({ video: true })
                .then((stream) => {
                    video.srcObject = stream;
                    startCapturingImages(stream);
                })
                .catch((err) => {
                    console.log("Error accessing the camera: " + err);
                });
        });
    }

    // Function to capture images every 250ms for 5 seconds
    function startCapturingImages(stream) {
        let count = 0;
        const totalImages = 20;

        const interval = setInterval(() => {
            if (count < totalImages) {
                context.drawImage(video, 0, 0, 320, 240);
                const imageData = canvas.toDataURL('image/png'); // Get image data
                // Prepare to send image data to server
                document.getElementById('registrationForm').insertAdjacentHTML('beforeend', `<input type="hidden" name="imageData${count}" value="${imageData}">`);
                count++;
            } else {
                clearInterval(interval);
                stopCamera(stream);
            }
        }, 250); // Capture every 250ms

        // Stop capturing after 5 seconds
        setTimeout(() => {
            clearInterval(interval);
            stopCamera(stream);
        }, 5000); // 5 seconds
    }

    // // Smooth scrolling for navigation links on the index page
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });

    // // Lazy load sections with fade-in effect on index page
    const sections = document.querySelectorAll('.fade-in');
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('show');
            }
        });
    }, { threshold: 0.1 });

    sections.forEach(section => {
        observer.observe(section);
    });
});
