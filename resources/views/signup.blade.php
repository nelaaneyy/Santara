<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register - Santara</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Exo 2:ital,wght@0,400;1,300;1,500;1,600;1,800&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=JavaneseText:wght@400&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Italianno:wght@400&display=swap" />
</head>
<body>
    <div class="signup-container">
            <button class="close-btn" onclick="closeModal()">&times;</button>
            
            <div class="form-section">
                <div class="logo">
                    <div class="logo-santara">
                        <img src="{{ asset('santaralogo.png') }}" alt="">
                    </div>
                    <div class="logo-text">Santara</div>
                </div>
                
                <h1 class="form-title">Sign Up</h1>
                <p class="form-subtitle">Sign up and gain access to Santara</p>
                
                <form id="signupForm" onsubmit="handleSignup(event)">
                    <div class="form-group">
                        <label class="form-label" for="email">Email</label>
                        <input 
                            type="email" 
                            id="email" 
                            class="form-input" 
                            required
                            placeholder="Enter your email address"
                        >
                        <div class="error-message" id="emailError"></div>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label" for="password">Password</label>
                        <input 
                            type="password" 
                            id="password" 
                            class="form-input" 
                            required
                            placeholder="Create a password"
                            oninput="checkPasswordStrength()"
                        >
                        <div class="password-strength">
                            <div class="password-strength-bar" id="passwordStrengthBar"></div>
                        </div>
                        <div class="error-message" id="passwordError"></div>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label" for="confirmPassword">Confirm Password</label>
                        <input 
                            type="password" 
                            id="confirmPassword" 
                            class="form-input" 
                            required
                            placeholder="Confirm your password"
                            oninput="checkPasswordMatch()"
                        >
                        <div class="error-message" id="confirmPasswordError"></div>
                    </div>
                    
                    <button type="submit" class="signup-btn">Sign Up</button>
                </form>
                
                <div class="sign-in-link">
                    Have an Account? <a href="{{ url('/login') }}">Sign In</a>
                </div>
            </div>
            
            <div class="image-section">
            <div class="image-overlay">
                <div class="model-placeholder">
                    <img src="{{ asset('loginimage.png') }}" alt="">
                </div>
            </div>
        </div>
        </div>
    </div>

    <script>
        // Close modal function
        function closeModal() {
            const modal = document.querySelector('.modal-overlay');
            modal.style.animation = 'fadeOut 0.3s ease-out';
            setTimeout(() => {
                modal.style.display = 'none';
            }, 300);
        }

        // Close modal when clicking outside
        document.querySelector('.modal-overlay').addEventListener('click', function(e) {
            if (e.target === this) {
                closeModal();
            }
        });

        // Password strength checker
        function checkPasswordStrength() {
            const password = document.getElementById('password').value;
            const strengthBar = document.getElementById('passwordStrengthBar');
            const passwordInput = document.getElementById('password');
            
            let strength = 0;
            
            // Check password criteria
            if (password.length >= 8) strength += 25;
            if (password.match(/[a-z]/)) strength += 25;
            if (password.match(/[A-Z]/)) strength += 25;
            if (password.match(/[0-9]/) || password.match(/[^a-zA-Z0-9]/)) strength += 25;
            
            strengthBar.style.width = strength + '%';
            
            // Update input styling based on strength
            if (strength < 50) {
                passwordInput.classList.remove('valid');
                passwordInput.classList.add('invalid');
            } else {
                passwordInput.classList.remove('invalid');
                passwordInput.classList.add('valid');
            }
        }

        // Check password match
        function checkPasswordMatch() {
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirmPassword').value;
            const confirmInput = document.getElementById('confirmPassword');
            const errorMsg = document.getElementById('confirmPasswordError');
            
            if (confirmPassword.length > 0) {
                if (password !== confirmPassword) {
                    confirmInput.classList.add('invalid');
                    confirmInput.classList.remove('valid');
                    errorMsg.textContent = 'Passwords do not match';
                    errorMsg.classList.add('show');
                } else {
                    confirmInput.classList.remove('invalid');
                    confirmInput.classList.add('valid');
                    errorMsg.classList.remove('show');
                }
            }
        }

        // Handle form submission
        function handleSignup(event) {
            event.preventDefault();
            
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirmPassword').value;
            
            // Basic validation
            let isValid = true;
            
            // Email validation
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                showError('emailError', 'Please enter a valid email address');
                isValid = false;
            }
            
            // Password validation
            if (password.length < 8) {
                showError('passwordError', 'Password must be at least 8 characters long');
                isValid = false;
            }
            
            // Confirm password validation
            if (password !== confirmPassword) {
                showError('confirmPasswordError', 'Passwords do not match');
                isValid = false;
            }
            
            if (isValid) {
                // Simulate successful signup
                alert('Sign up successful! Welcome to Santara!');
                closeModal();
            }
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

        // Switch to sign in (placeholder function)
        function switchToSignIn() {
            alert('Sign In modal would open here');
        }

        // Add CSS animation for fadeOut
        const style = document.createElement('style');
        style.textContent = `
            @keyframes fadeOut {
                from { opacity: 1; transform: scale(1); }
                to { opacity: 0; transform: scale(0.9); }
            }
        `;
        document.head.appendChild(style);
    </script>
</body>
</html>