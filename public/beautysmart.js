// Interactive functionality
document.addEventListener('DOMContentLoaded', function() {
    // Like button toggle
    const likeButtons = document.querySelectorAll('.action-btn');
    
    likeButtons.forEach(button => {
        button.addEventListener('click', function() {
            const icon = this.querySelector('i');
            
            if (this.title === 'Like') {
                if (icon.classList.contains('far')) {
                    icon.classList.remove('far');
                    icon.classList.add('fas');
                    this.style.color = '#e74c3c';
                } else {
                    icon.classList.remove('fas');
                    icon.classList.add('far');
                    this.style.color = '#8b4b47';
                }
            }
            
            if (this.title === 'Bookmark') {
                if (icon.classList.contains('far')) {
                    icon.classList.remove('far');
                    icon.classList.add('fas');
                    this.style.color = '#f39c12';
                } else {
                    icon.classList.remove('fas');
                    icon.classList.add('far');
                    this.style.color = '#8b4b47';
                }
            }
        });
    });

    // Smooth hover effects
    const articleCards = document.querySelectorAll('.article-card');
    
    articleCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transition = 'all 0.3s ease';
        });
    });
});