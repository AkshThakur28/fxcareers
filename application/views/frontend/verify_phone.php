<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phone Verification</title>
    <!-- Firebase SDK -->
    <script src="https://www.gstatic.com/firebasejs/10.3.1/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/10.3.1/firebase-auth.js"></script>
</head>
<body>
    <form>
        <input type="text" id="phone" placeholder="Phone Number (10 digits)" required>
        <div id="recaptcha-container"></div> <!-- reCAPTCHA container -->
        <button type="button" onclick="sendOTP()">Send OTP</button>
    </form>

    <form style="margin-top: 20px;">
        <input type="text" id="otp" placeholder="Enter OTP" required>
        <button type="button" onclick="verifyOTP()">Verify OTP</button>
    </form>

    <!-- Custom Script to Initialize Firebase and Handle OTP -->
    <script>
        // Firebase Configuration
        const firebaseConfig = {
            apiKey: "AIzaSyBsuEeF0jAoLem46frekjPf4oCL1q7FMSw",
            authDomain: "fxcareers-77525.firebaseapp.com",
            projectId: "fxcareers-77525",
            storageBucket: "fxcareers-77525.firebasestorage.app",
            messagingSenderId: "416891251494",
            appId: "1:416891251494:web:a26acee8aaeaa546202fe7",
            measurementId: "G-TG6CRHJM7P"
        };

        // Initialize Firebase
        firebase.initializeApp(firebaseConfig);

        let confirmationResult; // Declare globally to access inside verifyOTP()

        // Function to send OTP
        function sendOTP() {
            let phoneNumber = document.getElementById("phone").value;

            // Check if the phone number is in the correct format (10 digits)
            if (phoneNumber.length === 10 && /^[0-9]+$/.test(phoneNumber)) {
                // Prepend country code for Indian numbers
                phoneNumber = "+91" + phoneNumber;
            } else {
                alert("Please enter a valid 10-digit phone number.");
                return;
            }

            // Ensure RecaptchaVerifier is properly set up
            const appVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container', {
                size: 'normal',  // Or 'invisible' if you want it invisible
                callback: function(response) {
                    console.log('ReCAPTCHA solved successfully.');
                },
                'expired-callback': function() {
                    console.error('ReCAPTCHA expired. Please try again.');
                }
            });

            // Render the reCAPTCHA
            appVerifier.render().then(function(widgetId) {
                // Now attempt to send OTP
                firebase.auth().signInWithPhoneNumber(phoneNumber, appVerifier)
                    .then(result => {
                        confirmationResult = result;
                        alert("OTP sent!");
                    })
                    .catch(error => {
                        console.error("Error sending OTP:", error.message);
                        alert("Error sending OTP: " + error.message);
                    });
            }).catch(function(error) {
                console.error("Error rendering ReCAPTCHA:", error);
                alert("Error rendering ReCAPTCHA: " + error.message);
            });
        }

        // Function to verify OTP
        function verifyOTP() {
            const code = document.getElementById("otp").value;

            // Make sure confirmationResult is set
            if (confirmationResult) {
                confirmationResult.confirm(code)
                    .then(result => {
                        alert("Phone number verified successfully!");
                    })
                    .catch(error => {
                        console.error("Error verifying OTP:", error.message);
                        alert("Error verifying OTP: " + error.message);
                    });
            } else {
                alert("OTP not sent. Please try again.");
            }
        }
    </script>
</body>
</html>
