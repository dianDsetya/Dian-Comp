document.addEventListener('DOMContentLoaded', function () {
    // --- 1. ELEMEN SIDEBAR ---
    const sidebar = document.getElementById('sidebar');
    const toggleBtn = document.getElementById('sidebar-toggle');
    const overlay = document.getElementById('sidebar-overlay');
    const menuLinks = document.querySelectorAll('#sidebar-menu a');

    if (!sidebar || !toggleBtn || !overlay) {
        console.error('JS Gagal: Elemen UI Sidebar tidak ditemukan!');
    } else {
        function openMobileSidebar() {
            sidebar.classList.remove('-translate-x-full');
            overlay.classList.remove('hidden');
            setTimeout(() => overlay.classList.remove('opacity-0'), 10);
        }

        function closeMobileSidebar() {
            sidebar.classList.add('-translate-x-full');
            overlay.classList.add('opacity-0');
            setTimeout(() => overlay.classList.add('hidden'), 300);
        }

        toggleBtn.addEventListener('click', function (e) {
            e.preventDefault();
            const isMobile = window.innerWidth < 768;

            if (isMobile) {
                if (sidebar.classList.contains('-translate-x-full')) {
                    openMobileSidebar();
                } else {
                    closeMobileSidebar();
                }
            } else {
                sidebar.classList.toggle('md:-ml-64');
            }
        });

        overlay.addEventListener('click', closeMobileSidebar);

        menuLinks.forEach(function (link) {
            link.addEventListener('click', function () {
                if (window.innerWidth < 768) {
                    closeMobileSidebar();
                }
            });
        });
    }

    // --- 2. FUNGSI SCROLL HEADER (GLASSMORPHISM) ---
    const mainScroll = document.getElementById('main-scroll');
    const topNavbar = document.getElementById('top-navbar');

    if (mainScroll && topNavbar) {
        mainScroll.addEventListener('scroll', function () {
            if (mainScroll.scrollTop > 10) {
                topNavbar.classList.remove('bg-white/90', 'border-gray-200', 'shadow-sm');
                topNavbar.classList.add('bg-white/40', 'border-transparent', 'backdrop-blur-xl');
            } else {
                topNavbar.classList.add('bg-white/90', 'border-gray-200', 'shadow-sm');
                topNavbar.classList.remove('bg-white/40', 'border-transparent', 'backdrop-blur-xl');
            }
        });
    }
});

// =======================================================
// FUNGSI GLOBAL (Bisa dipanggil dari mana saja)
// =======================================================

// --- A. BUKA TUTUP MODAL TAILWIND ---
window.openModal = function (modalId) {
    const modal = document.getElementById(modalId);
    const modalBox = document.getElementById(modalId + 'Box');

    if (modal && modalBox) {
        modal.classList.remove('hidden');
        setTimeout(() => {
            modal.classList.remove('opacity-0');
            modalBox.classList.remove('scale-95');
        }, 10);
    }
};

window.closeModal = function (modalId) {
    const modal = document.getElementById(modalId);
    const modalBox = document.getElementById(modalId + 'Box');

    if (modal && modalBox) {
        modal.classList.add('opacity-0');
        modalBox.classList.add('scale-95');
        setTimeout(() => modal.classList.add('hidden'), 300);
    }
};

// --- B. SWEETALERT KONFIRMASI HAPUS ---
window.confirmDelete = function (formId, itemName = 'data ini') {
    if (typeof Swal !== 'undefined') {
        Swal.fire({
            title: 'Hapus Data?',
            text: `Anda yakin ingin menghapus ${itemName}? Data tidak dapat dikembalikan.`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#ef4444',
            cancelButtonColor: '#94a3b8',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal',
            customClass: {
                popup: 'rounded-[1.5rem] shadow-2xl border border-slate-100',
                confirmButton: 'rounded-xl px-6 py-2 font-bold shadow-md hover:scale-105 transition-transform',
                cancelButton: 'rounded-xl px-6 py-2 font-bold shadow-md hover:scale-105 transition-transform'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById(formId).submit();
            }
        });
    }
};
window.toggleExportMenu = function () {
    const menu = document.getElementById('exportMenu');
    menu.classList.toggle('hidden');
}; window.toggleExportMenuCustomer = function () {
    document.getElementById('exportMenuCustomer').classList.toggle('hidden');
};