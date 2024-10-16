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

    // Function to stop the camera
    function stopCamera(stream) {
        video.srcObject.getTracks().forEach(track => track.stop()); // Stop the camera
        video.style.display = 'none';
        captureBtn.style.display = 'none';
        canvas.style.display = 'none';
    }

    // Validate password match on registration form submission
    if (document.getElementById('registrationForm')) {
        document.getElementById('registrationForm').addEventListener('submit', function (event) {
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirmPassword').value;

            if (password !== confirmPassword) {
                event.preventDefault();
                document.getElementById('responseMessage').innerHTML = '<p class="text-red-500">Passwords do not match.</p>';
            }
        });
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
