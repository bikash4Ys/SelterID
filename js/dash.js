// JavaScript to control modals

// Edit Profile Modal
const editProfileModal = document.getElementById('editProfileModal');
const editProfileBtn = document.getElementById('editProfileBtn');
const closeEditProfile = document.getElementById('closeEditProfile');

if (editProfileBtn) {
    editProfileBtn.addEventListener('click', () => {
        editProfileModal.classList.add('active');
    });
}

if (closeEditProfile) {
    closeEditProfile.addEventListener('click', () => {
        editProfileModal.classList.remove('active');
    });
}

// Update Evacuation Modal
const updateEvacuationModal = document.getElementById('updateEvacuationModal');
const updateEvacuationBtn = document.getElementById('updateEvacuationBtn');
const closeUpdateEvacuation = document.getElementById('closeUpdateEvacuation');

if (updateEvacuationBtn) {
    updateEvacuationBtn.addEventListener('click', () => {
        updateEvacuationModal.classList.add('active');
    });
}

if (closeUpdateEvacuation) {
    closeUpdateEvacuation.addEventListener('click', () => {
        updateEvacuationModal.classList.remove('active');
    });
}


// Update Face Data Modal
const updateFaceDataModal = document.getElementById('updateFaceDataModal');
const updateFaceDataBtn = document.getElementById('updateFaceDataBtn');
const closeUpdateFaceData = document.getElementById('closeUpdateFaceData');

if (updateFaceDataBtn) {
    updateFaceDataBtn.addEventListener('click', () => {
        updateFaceDataModal.classList.add('active');
    });
}

if (closeUpdateFaceData) {
    closeUpdateFaceData.addEventListener('click', () => {
        updateFaceDataModal.classList.remove('active');
    });
};

// Change Password Modal
const changePasswordModal = document.getElementById('changePasswordModal');
const changePasswordBtn = document.getElementById('changePasswordBtn');
const closeChangePassword = document.getElementById('closeChangePassword');

if (changePasswordBtn) {
    changePasswordBtn.addEventListener('click', () => {
        changePasswordModal.classList.add('active');
    });
}

if (closeChangePassword) {
    closeChangePassword.addEventListener('click', () => {
        changePasswordModal.classList.remove('active');
    });
}
