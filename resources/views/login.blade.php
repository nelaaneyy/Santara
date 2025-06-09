<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login - Santara</title>
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
    <div class="login-container">
        <button class="close-btn" onclick="closeModal()">&times;</button>

        <div class="form-section">
            <div class="logo">
                <div class="logo-santara">
                    <img src="{{ asset('santaralogo.png') }}" alt="">
                </div>
                <span class="logo-text">Santara</span>
            </div>

            <h1 class="form-title">Sign In</h1>
            <p class="form-subtitle">Welcome back! Please enter your details.</p>

            <form id="loginForm" onsubmit="handleLogin(event)">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                    <div class="password-strength">
                        <div class="password-strength-bar" id="passwordStrengthBar"></div>
                    </div>
                </div>
                <div class="form-options">
                    <div class="remember-me">
                        <input type="checkbox" id="rememberMe" name="rememberMe">
                        <label for="rememberMe">Remember me</label>
                        <a href="{{ url('/forgotpassword') }}" class="forgot-password-link" onclick="handleForgotPassword(event)">Forgot Password</a>
                    </div>
                </div>

                <button type="submit" class="sign-in-btn" id="submitBtn">Sign In</button>
            </form>

            <div class="signup-link">
                Don't Have an Account? <a href="{{ url('/signup') }}">Sign Up</a>
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

    <script>
        function handleLogin(event) {
            event.preventDefault();

            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            const submitBtn = document.getElementById('submitBtn');

            // Basic validation
            if (!email || !password) {
                alert('Please fill in all fields');
                return;
            }

            // Add loading state
            submitBtn.textContent = 'Signing In...';
            submitBtn.classList.add('loading');
            submitBtn.disabled = true;

            // Simulate API call
            setTimeout(() => {
                // Reset button state
                submitBtn.textContent = 'Sign In';
                submitBtn.classList.remove('loading');
                submitBtn.disabled = false;

                // For demo purposes - show success
                alert(`Welcome back! Logged in as: ${email}`);

                // In a real app, you would redirect or update the UI
                // window.location.href = '/dashboard';
            }, 2000);
        }

        //password strength
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

        function closeModal() {
            // In a real app, this would close the modal or redirect
            alert('Close button clicked - would close modal or redirect');
        }

        function showSignUp() {
            // In a real app, this would show the sign up form
            alert('Sign Up clicked - would show registration form');
        }

        // Add input focus animations
        document.querySelectorAll('input').forEach(input => {
            input.addEventListener('focus', function () {
                this.parentElement.style.transform = 'translateY(-2px)';
            });

            input.addEventListener('blur', function () {
                this.parentElement.style.transform = 'translateY(0)';
            });
        });

        // Keyboard navigation
        document.addEventListener('keydown', function (event) {
            if (event.key === 'Escape') {
                closeModal();
            }
        });

    </script>

</body>

</html>
