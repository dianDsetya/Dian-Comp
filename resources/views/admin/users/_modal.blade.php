{{-- 1. MODAL FORM ADMIN (TAMBAH & EDIT) --}}
<x-modal id="modalUserForm" title="Form Admin" maxWidth="md">
    <form id="userForm" method="POST" action="">
        @csrf
        <div id="method-put"></div>

        <div class="space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                <input type="text" name="name" id="inputName" required
                    class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500/50 focus:border-blue-500 transition-all bg-gray-50 text-gray-800">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input type="email" name="email" id="inputEmail" required
                    class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500/50 focus:border-blue-500 transition-all bg-gray-50 text-gray-800">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Kata Sandi</label>
                <div class="relative w-full">
                    <input type="password" name="password" id="inputPassword" required
                        class="w-full px-4 pr-12 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500/50 focus:border-blue-500 transition-all bg-gray-50 text-gray-800">

                    <button type="button" onclick="togglePassword()" tabindex="-1"
                        class="absolute inset-y-0 right-0 flex items-center pr-4 text-gray-400 hover:text-blue-600 transition-colors focus:outline-none">
                        <svg id="eyeIcon" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                            </path>
                        </svg>
                    </button>
                </div>
                <p class="text-xs text-gray-500 mt-1" id="passwordHelp">Minimal 8 karakter.</p>
            </div>
        </div>

        <x-slot name="footer">
            <button type="button" onclick="closeModal('modalUserForm')"
                class="px-5 py-2.5 text-sm font-semibold text-gray-600 bg-gray-100 hover:bg-gray-200 rounded-xl transition-colors cursor-pointer">Batal</button>
            <button type="submit" form="userForm" id="btnSubmit"
                class="px-5 py-2.5 text-sm font-bold bg-blue-600 text-white rounded-xl hover:bg-blue-700 hover:shadow-[0_0_15px_rgba(37,99,235,0.4)] transition-all cursor-pointer">Simpan</button>
        </x-slot>
    </form>
</x-modal>

{{-- 2. MODAL KONFIRMASI HAPUS --}}
<x-modal id="modalDelete" maxWidth="sm">
    <div class="text-center">
        <div
            class="w-16 h-16 rounded-full bg-red-100 text-red-500 flex items-center justify-center mx-auto mb-4 border border-red-200">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z">
                </path>
            </svg>
        </div>
        <h3 class="text-xl font-bold text-gray-900 mb-2">Hapus Admin?</h3>
        <p class="text-sm text-gray-500">Anda yakin ingin menghapus <span id="deleteUserName"
                class="font-bold text-gray-800"></span>?</p>
    </div>

    <x-slot name="footer">
        <form id="deleteForm" method="POST" action="" class="w-full flex gap-3">
            @csrf @method('DELETE')
            <button type="button" onclick="closeModal('modalDelete')"
                class="w-1/2 px-5 py-2.5 text-sm font-semibold text-gray-600 bg-gray-200 hover:bg-gray-300 rounded-xl transition-colors cursor-pointer text-center">Batal</button>
            <button type="submit"
                class="w-1/2 px-5 py-2.5 text-sm font-bold bg-red-500 text-white rounded-xl hover:bg-red-600 hover:shadow-[0_0_15px_rgba(239,68,68,0.4)] transition-all cursor-pointer text-center">Ya,
                Hapus</button>
        </form>
    </x-slot>
</x-modal>

{{-- 3. JAVASCRIPT LOGIC --}}
@push('scripts')
    <script>
        /**
         * Fungsi untuk membuka modal form (Tambah / Edit)
         */
        function formModal(mode, id = '', name = '', email = '') {
            try {
                const form = document.getElementById('userForm');
                const methodPut = document.getElementById('method-put');
                const title = document.querySelector('#modalUserForm h3') || document.querySelector(
                '#modalUserForm header');
                const btnSubmit = document.getElementById('btnSubmit');
                const inputName = document.getElementById('inputName');
                const inputEmail = document.getElementById('inputEmail');
                const inputPassword = document.getElementById('inputPassword');
                const passwordHelp = document.getElementById('passwordHelp');

                // Reset status password field
                inputPassword.type = 'password';
                document.getElementById('eyeIcon').innerHTML =
                    '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>';

                if (mode === 'add') {
                    if (title) title.innerText = 'Tambah Admin Baru';
                    if (btnSubmit) btnSubmit.innerText = 'Simpan Data';

                    if (form) form.action = "{{ route('users.store') }}";
                    if (methodPut) methodPut.innerHTML = '';

                    if (inputName) inputName.value = '';
                    if (inputEmail) inputEmail.value = '';
                    if (inputPassword) {
                        inputPassword.value = '';
                        inputPassword.required = true;
                    }
                    if (passwordHelp) passwordHelp.innerHTML = 'Minimal 8 karakter.';
                } else {
                    if (title) title.innerText = 'Edit Data Admin';
                    if (btnSubmit) btnSubmit.innerText = 'Update Data';

                    let updateUrl = "{{ route('users.update', ':id') }}";
                    if (form) form.action = updateUrl.replace(':id', id);

                    if (methodPut) methodPut.innerHTML = `{!! method_field('PUT') !!}`;

                    if (inputName) inputName.value = name;
                    if (inputEmail) inputEmail.value = email;
                    if (inputPassword) {
                        inputPassword.value = '';
                        inputPassword.required = false;
                    }
                    if (passwordHelp) passwordHelp.innerHTML =
                        '<span class="text-blue-600 font-medium italic">Kosongkan jika tidak ingin mengubah sandi.</span>';
                }

                if (typeof window.openModal === 'function') {
                    window.openModal('modalUserForm');
                }
            } catch (error) {
                console.error("Error pada formModal:", error);
            }
        }

        /**
         * Fungsi untuk membuka modal konfirmasi hapus
         */
        function deleteModalFunc(id, name) {
            try {
                const deleteNameObj = document.getElementById('deleteUserName');
                const deleteFormObj = document.getElementById('deleteForm');

                if (deleteNameObj) deleteNameObj.innerText = name;

                let deleteUrl = "{{ route('users.destroy', ':id') }}";
                if (deleteFormObj) deleteFormObj.action = deleteUrl.replace(':id', id);

                if (typeof window.openModal === 'function') {
                    window.openModal('modalDelete');
                }
            } catch (error) {
                console.error("Error pada deleteModalFunc:", error);
            }
        }

        /**
         * Fungsi untuk toggle show/hide password
         */
        function togglePassword() {
            const passwordInput = document.getElementById('inputPassword');
            const eyeIcon = document.getElementById('eyeIcon');
            const btn = eyeIcon.parentElement;

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                btn.classList.add('text-blue-600');
                eyeIcon.innerHTML =
                    '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"></path>';
            } else {
                passwordInput.type = 'password';
                btn.classList.remove('text-blue-600');
                eyeIcon.innerHTML =
                    '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>';
            }
        }

        /**
         * Fungsi khusus toggle menu export
         */
        function toggleExportMenu() {
            const menu = document.getElementById('exportMenu');
            if (menu) {
                menu.classList.toggle('hidden');

                // Close menu when clicking outside
                document.addEventListener('click', function closeMenu(e) {
                    if (!e.target.closest('.relative')) {
                        menu.classList.add('hidden');
                        document.removeEventListener('click', closeMenu);
                    }
                });
            }
        }
    </script>
@endpush
