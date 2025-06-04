<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Forgot Password - Santara</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Exo 2:ital,wght@0,400;1,300;1,500;1,600;1,800&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=JavaneseText:wght@400&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Italianno:wght@400&display=swap" />

</head>

<body>

<div class="forgot-password-container">
        <button class="close-btn" onclick="closeModal()" aria-label="Close">&times;</button>
        
        <div class="form-section">
            <div class="logo">
                <div class="logo-santara">
                    <img src="{{ asset('santaralogo.png') }}" alt="">
                </div>
                <div class="logo-text">Santara</div>
            </div>
            
            <h1 class="form-title">Forgot Password</h1>
            <p class="form-subtitle">Enter your email address to reset your password</p>
            
            <form id="forgotPasswordForm" onsubmit="handleForgotPassword(event)">
                <div class="form-group">
                    <label class="form-label" for="email">Email</label>
                    <input 
                        type="email" 
                        id="email" 
                        class="form-input" 
                        required
                        placeholder="Enter your email address"
                        autocomplete="email"
                    >
                    <div class="error-message" id="emailError"></div>
                    <div class="success-message" id="emailSuccess"></div>
                </div>
                
                <button type="submit" class="reset-btn" id="resetBtn">Send Reset Link</button>
            </form>
            
            <div class="return-link">
                ← <a href="{{ url('/login') }}" onclick="returnToLogin()">Return to the login page</a>
            </div>
        </div>
        
        <div class="image-section">
            <div class="image-overlay">
                <div class="model-placeholder">
                    <img src="{{ asset('loginimage.png') }}" alt="Beauty image">
                </div>
            </div>
        </div>
    </div>

    <script>
        // Close modal function
        function closeModal() {
            const container = document.querySelector('.forgot-password-container');
            container.style.animation = 'fadeOut 0.3s ease-out';
            setTimeout(() => {
                // In a real app, this would close or hide the modal
                console.log('Modal would be closed');
            }, 300);
        }

        // Handle form submission
        function handleForgotPassword(event) {
            event.preventDefault();
            
            const email = document.getElementById('email').value;
            const emailInput = document.getElementById('email');
            const resetBtn = document.getElementById('resetBtn');
            
            // Clear previous messages
            document.querySelectorAll('.error-message, .success-message').forEach(el => el.classList.remove('show'));
            
            // Basic validation
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                showError('emailError', 'Please enter a valid email address');
                emailInput.classList.add('invalid');
                emailInput.classList.remove('valid');
                return;
            }

            // Mark as valid
            emailInput.classList.remove('invalid');
            emailInput.classList.add('valid');
            
            // Disable button and show loading state
            resetBtn.disabled = true;
            resetBtn.textContent = 'Sending...';
            resetBtn.classList.add('loading');
            
            // Simulate API call
            setTimeout(() => {
                // Show success message
                showSuccess('emailSuccess', 'Password reset link has been sent to your email!');
                
                // Reset button state
                resetBtn.disabled = false;
                resetBtn.textContent = 'Send Reset Link';
                resetBtn.classList.remove('loading');
                
                // In a real app, you might redirect or show additional instructions
                setTimeout(() => {
                    alert('Check your email for password reset instructions.');
                }, 1000);
            }, 2000);
        }

        // Show error message
        function showError(elementId, message) {
            const errorElement = document.getElementById(elementId);
            errorElement.textContent = message;
            errorElement.classList.add('show');
            
            setTimeout(() => {
                errorElement.classList.remove('show');
            }, 5000);
        }

        // Show success message
        function showSuccess(elementId, message) {
            const successElement = document.getElementById(elementId);
            successElement.textContent = message;
            successElement.classList.add('show');
            
            setTimeout(() => {
                successElement.classList.remove('show');
            }, 8000);
        }

        // Return to login
        function returnToLogin() {
            alert('Would redirect to login page');
        }

        // Prevent zoom on iOS when focusing inputs
        if (/iPad|iPhone|iPod/.test(navigator.userAgent)) {
            const viewportMeta = document.querySelector('meta[name="viewport"]');
            if (viewportMeta) {
                viewportMeta.content = 'width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no';
            }
        }

        // Handle orientation change
        window.addEventListener('orientationchange', function() {
            setTimeout(function() {
                window.scrollTo(0, 1);
            }, 500);
        });
    </script>

</body>

</html>
