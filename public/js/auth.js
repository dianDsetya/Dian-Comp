document.addEventListener('DOMContentLoaded', () => {
    // 1. Entrance Animation
    const loginCard = document.getElementById('login-card');
    if (loginCard) {
        setTimeout(() => {
            loginCard.style.transition = 'all 1s cubic-bezier(0.16, 1, 0.3, 1)';
            loginCard.style.opacity = '1';
            loginCard.style.transform = 'translateY(0)';
        }, 150);
    }

    // 2. Staggered Form Elements
    const formElements = document.querySelectorAll('.animate-fade-up');
    formElements.forEach((el, index) => {
        el.style.opacity = '0';
        setTimeout(() => {
            el.style.animation = `fadeUp 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards`;
        }, 350 + (index * 120));
    });

    // 3. Password Toggle Logic
    const togglePasswordBtn = document.getElementById('toggle-password');
    const passwordInput = document.getElementById('password');
    const iconEye = document.getElementById('icon-eye-password');
    const iconEyeSlash = document.getElementById('icon-eye-slash-password');

    if (togglePasswordBtn && passwordInput) {
        togglePasswordBtn.addEventListener('click', () => {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);

            // Ganti warna saat aktif ke biru
            if (type === 'text') {
                iconEye.classList.add('hidden');
                iconEyeSlash.classList.remove('hidden');
                togglePasswordBtn.classList.add('text-blue-400');
            } else {
                iconEye.classList.remove('hidden');
                iconEyeSlash.classList.add('hidden');
                togglePasswordBtn.classList.remove('text-blue-400');
            }
        });
    }
});