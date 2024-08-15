@extends('admin.layouts.app')

@section('content')
    <main>
        <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
            <div class="mx-auto max-w-270">
                <!-- Breadcrumb Start -->
                <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                    <h2 class="text-title-md2 font-bold text-black dark:text-white">
                        Kelola Akun - Edit Akun: {{ $user->name }}
                    </h2>

                    <nav>
                        <ol class="flex items-center gap-2">
                            <li>
                                <a class="font-medium" href="{{ route('admin.dashboard') }}">Dashboard /</a>
                            </li>
                            <li>
                                <a class="font-medium" href="{{ route('admin.users.index') }}">Daftar Akun /</a>
                            </li>
                            <li class="font-medium text-primary">
                                Edit Akun
                            </li>
                        </ol>
                    </nav>
                </div>
                <!-- Breadcrumb End -->

                <!-- ====== Form Section Start -->
                <div class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
                    <div class="border-b border-stroke px-6.5 py-4 dark:border-strokedark">
                        <h3 class="font-medium text-black dark:text-white">
                            Detail Akun
                        </h3>
                    </div>
                    <form action="{{ route('admin.users.update', ['userId' => $user->id]) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="p-6.5">
                            <div class="mb-4.5">
                                <label class="mb-2.5 block text-black dark:text-white" for="name">
                                    Nama <span class="text-meta-1">*</span>
                                </label>
                                <input type="text" placeholder="Nama" name="name" id="name" required autofocus
                                    value="{{ old('name', $user->name) }}"
                                    class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary" />
                                @error('name')
                                    <p class="text-meta-1 text-sm text-black font-medium mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-4.5">
                                <label class="mb-2.5 block text-black dark:text-white" for="role">
                                    Jabatan <span class="text-meta-1">*</span>
                                </label>
                                <select name="role" id="role" disabled
                                    class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->name }}"
                                            {{ old('role', $user->roles->first()->name) === $role->name ? 'selected' : '' }}>
                                            {{ mb_convert_case($role->name, MB_CASE_TITLE, 'UTF-8') }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('role')
                                    <p class="text-meta-1 text-sm text-black font-medium mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-4.5">
                                <label class="mb-2.5 block text-black dark:text-white" for="whatsapp_number">
                                    Nomor WhatsApp <span class="text-meta-1">*</span>
                                </label>
                                <input type="tel" placeholder="Nomor WhatsApp" name="whatsapp_number"
                                    value="{{ old('whatsapp_number', $user->whatsapp_number) }}" id="whatsapp_number"
                                    maxlength="13" value="{{ old('whatsapp_number') }}" required
                                    class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary" />
                                @error('whatsapp_number')
                                    <p class="text-meta-1 text-sm text-black font-medium mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-4.5">
                                <label class="mb-2.5 block text-black dark:text-white">
                                    Email <span class="text-meta-1">*</span>
                                </label>
                                <input type="email" placeholder="Email" name="email"
                                    value="{{ old('email', $user->email) }}" disabled
                                    class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary" />
                                @error('email')
                                    <p class="text-meta-1 text-sm text-black font-medium mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-4.5">
                                <label class="mb-2.5 block text-black dark:text-white" for="password">
                                    Password Baru <span class="text-meta-1">*</span>
                                </label>
                                <div class="relative">
                                    <input type="password" placeholder="Password" name="password" id="password" required
                                        minlength="8"
                                        class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary" />

                                </div>
                                <small id="passwordFeedback" class="text-success"></small>
                                @error('password')
                                    <p class="text-meta-1 text-sm text-black font-medium mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-4.5">
                                <label class="mb-2.5 block text-black dark:text-white" for="password_confirmation">
                                    Konfirmasi Password Baru <span class="text-meta-1">*</span>
                                </label>
                                <input type="password" placeholder="Konfirmasi Password" name="password_confirmation"
                                    required id="password_confirmation"
                                    class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary" />
                                @error('password_confirmation"')
                                    <p class="text-meta-1 text-sm text-black font-medium mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <button type="submit"
                                class="flex w-full justify-center rounded bg-primary p-3 font-medium text-gray">
                                Edit Akun
                            </button>
                        </div>
                    </form>
                </div>
                <!-- ====== Form Section End -->
            </div>
        </div>
    </main>
@endsection


@push('scripts')
    <script>
        function validatePassword(password) {
            const errors = [];
            if (password.length < 8) errors.push('Password terlalu pendek.');
            if (!/[A-Z]/.test(password)) errors.push('Harus mengandung huruf besar.');
            if (!/[a-z]/.test(password)) errors.push('Harus mengandung huruf kecil.');
            if (!/[0-9]/.test(password)) errors.push('Harus mengandung angka.');
            if (!/[!@#$%^&*()_+{}\[\]:;"\'<>,.?]/.test(password)) errors.push('Harus mengandung karakter khusus.');

            return errors;
        }

        const passwordInput = document.getElementById('password');
        const feedback = document.getElementById('passwordFeedback');

        passwordInput.addEventListener('input', () => {
            const errors = validatePassword(passwordInput.value);
            feedback.textContent = errors.length > 0 ? errors.join(' ') : 'Password kuat.';
        });
    </script>
    @include('admin.components.alerts.notification')
    @include('admin.components.alerts.confirm')
@endpush
