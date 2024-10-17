// Access the camera
const video = document.getElementById('video');
const canvas = document.getElementById('canvas');
const captureBtn = document.getElementById('captureBtn');
const nextBtn = document.getElementById('nextBtn');

// Retrieve user_id from the data attribute in the HTML
const userId = document.getElementById('userData').getAttribute('data-user-id');

// Get camera feed
navigator.mediaDevices.getUserMedia({ video: true })
    .then(stream => {
        video.srcObject = stream;
        // Start capturing images automatically after 5 seconds
        setTimeout(() => {
            startCapturingImages();
        }, 5000);  // Wait 5 seconds before starting capture
    })
    .catch(err => {
        console.error("Error accessing the camera: " + err);
    });

let imageCount = 0;
const totalImages = 20;
const images = [];

function startCapturingImages() {
    // First capture 10 images facing straight
    captureImages(10, 200, "Please face straight.");

    // Then capture 5 images while turning left
    setTimeout(() => {
        alert("Please slightly turn your head to the left.");
        captureImages(5, 200, "Turn left slightly.");
    }, 2000);  // Wait 2 seconds before left head capture

    // Finally, capture 5 images while turning right
    setTimeout(() => {
        alert("Please slightly turn your head to the right.");
        captureImages(5, 200, "Turn right slightly.");
    }, 4000);  // Wait 4 seconds before right head capture
}

// Function to capture images and store them
function captureImages(count, interval, instruction) {
    let captureInterval = setInterval(() => {
        if (imageCount < totalImages && count > 0) {
            canvas.getContext('2d').drawImage(video, 0, 0, canvas.width, canvas.height);
            const imageData = canvas.toDataURL('image/png');
            images.push(imageData); // Store the captured image
            count--;
            imageCount++;
        }

        if (imageCount === totalImages) {
            clearInterval(captureInterval);
            saveImages(); // Call function to save images when complete
            nextBtn.classList.remove('hidden');  // Show next button when done
            captureBtn.disabled = true; // Disable capture button after all images captured
        }
    }, interval); // Capture every 200ms
}

// Save images to the server
function saveImages() {
    fetch('save_faces.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ images: images, userId: userId })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            console.log("Images saved successfully.");
        } else {
            console.log("Error saving images.");
        }
    })
    .catch(error => {
        console.error("Error:", error);
    });
}

// Next button redirects to success page
nextBtn.addEventListener('click', () => {
    window.location.href = 'success.php';
});
