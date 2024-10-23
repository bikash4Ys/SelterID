// Function to fill in the form with test data
function fillTestData() {
    // Test data
    const testData = {
        name: "YSE",
        email: "yse@test.com",
        password: "1111",
        confirmPassword: "1111",
        dob: "1995-05-15",
        gender: "male",
        address: "123 Test Street, Yokohama, Japan",
        emergencyContact: "080-1234-5678"
    };

    // Fill the form fields with test data
    document.getElementById("name").value = testData.name;
    document.getElementById("email").value = testData.email;
    document.getElementById("password").value = testData.password;
    document.getElementById("confirmPassword").value = testData.confirmPassword;
    document.getElementById("dob").value = testData.dob;
    document.getElementById("gender").value = testData.gender;
    document.getElementById("address").value = testData.address;
    document.getElementById("emergencyContact").value = testData.emergencyContact;
}