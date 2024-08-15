@extends('admin.layouts.app')

@section('content')
    <main>
        <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
            <div class="mx-auto max-w-270">
                <!-- Breadcrumb Start -->
                <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                    <h2 class="text-title-md2 font-bold text-black dark:text-white">
                        Edit Informasi Pribadi Calon Jemaah
                    </h2>

                    <nav>
                        <ol class="flex items-center gap-2">
                            <li>
                                <a class="font-medium" href="{{ route('admin.dashboard') }}">Dashboard /</a>
                            </li>
                            <li>
                                <a class="font-medium"
                                    href="{{ route('admin.customer.list.by.package', ['packageId' => $customer->umrah_package_id]) }}">{{ $customer->umrahPackage->name }}
                                    /</a>
                            </li>
                            <li>
                                <a class="font-medium"
                                    href="{{ route('admin.customer.detail.by.package', ['packageId' => $customer->umrah_package_id, 'customerId' => $customer->id]) }}">{{ $customer->full_name }}
                                    /</a>
                            </li>
                            <li class="font-medium text-primary">
                                Edit
                            </li>
                        </ol>
                    </nav>
                </div>
                <!-- Breadcrumb End -->

                <!-- ====== Settings Section Start -->
                <div class="grid grid-cols-5 gap-8">
                    <div class="col-span-5 xl:col-span-3">
                        <div
                            class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
                            <div class="border-b border-stroke px-7 py-4 dark:border-strokedark">
                                <h3 class="font-medium text-black dark:text-white">
                                    Informasi Pribadi
                                </h3>
                            </div>
                            <div class="p-7">
                                <form
                                    action="{{ route('admin.customer.detail.by.package.update', ['packageId' => $customer->umrah_package_id, 'customerId' => $customer->id]) }}"
                                    method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-5.5">
                                        <label class="mb-3 block text-sm font-medium text-black dark:text-white"
                                            for="registration_number">Nomor Registrasi</label>
                                        <div class="relative">
                                            <input
                                                class="w-full rounded border border-stroke bg-gray px-4.5 py-3 font-medium text-black focus:border-primary focus-visible:outline-none dark:border-strokedark dark:bg-meta-4 dark:text-white dark:focus:border-primary"
                                                type="text" id="registration_number"
                                                value="{{ $customer->registration_number }}" readonly disabled />
                                        </div>
                                    </div>
                                    <div class="mb-5.5">
                                        <label class="mb-3 block text-sm font-medium text-black dark:text-white"
                                            for="umrah_package_id">
                                            Jenis Paket Umrah
                                        </label>
                                        <div x-data="{ selectedGender: '{{ $customer->umrah_package_id ?? '' }}' }" class="relative z-20 bg-white dark:bg-form-input">
                                            <select x-model="selectedGender" name="umrah_package_id" id="umrah_package_id"
                                                class="relative z-20 w-full appearance-none rounded border border-stroke bg-transparent py-3 pl-5 pr-12 outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input text-black dark:text-white">
                                                @foreach ($umrahPackages as $umrahPackage)
                                                    <option value="{{ $umrahPackage->id }}">
                                                        {{ $umrahPackage->name }} [Kode Paket: {{ $umrahPackage->id }}]
                                                    </option>
                                                @endforeach
                                            </select>
                                            <div
                                                class="absolute right-4 top-1/2 transform -translate-y-1/2 pointer-events-none">
                                                <svg class="fill-current" width="18" height="18" viewBox="0 0 18 18"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M9.0002 12.8249C8.83145 12.8249 8.69082 12.7687 8.5502 12.6562L2.08145 6.2999C1.82832 6.04678 1.82832 5.65303 2.08145 5.3999C2.33457 5.14678 2.72832 5.14678 2.98145 5.3999L9.0002 11.278L15.0189 5.34365C15.2721 5.09053 15.6658 5.09053 15.9189 5.34365C16.1721 5.59678 16.1721 5.99053 15.9189 6.24365L9.45019 12.5999C9.30957 12.7405 9.16895 12.8249 9.0002 12.8249Z"
                                                        fill="#64748B" />
                                                </svg>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-5.5">
                                        <label class="mb-3 block text-sm font-medium text-black dark:text-white"
                                            for="full_name">Nama Lengkap</label>
                                        <div class="relative">
                                            <span class="absolute left-4.5 top-4">
                                                <svg class="fill-current" width="20" height="20" viewBox="0 0 20 20"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <g opacity="0.8">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M3.72039 12.887C4.50179 12.1056 5.5616 11.6666 6.66667 11.6666H13.3333C14.4384 11.6666 15.4982 12.1056 16.2796 12.887C17.061 13.6684 17.5 14.7282 17.5 15.8333V17.5C17.5 17.9602 17.1269 18.3333 16.6667 18.3333C16.2064 18.3333 15.8333 17.9602 15.8333 17.5V15.8333C15.8333 15.1703 15.5699 14.5344 15.1011 14.0655C14.6323 13.5967 13.9964 13.3333 13.3333 13.3333H6.66667C6.00363 13.3333 5.36774 13.5967 4.8989 14.0655C4.43006 14.5344 4.16667 15.1703 4.16667 15.8333V17.5C4.16667 17.9602 3.79357 18.3333 3.33333 18.3333C2.8731 18.3333 2.5 17.9602 2.5 17.5V15.8333C2.5 14.7282 2.93899 13.6684 3.72039 12.887Z"
                                                            fill="" />
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M9.99967 3.33329C8.61896 3.33329 7.49967 4.45258 7.49967 5.83329C7.49967 7.214 8.61896 8.33329 9.99967 8.33329C11.3804 8.33329 12.4997 7.214 12.4997 5.83329C12.4997 4.45258 11.3804 3.33329 9.99967 3.33329ZM5.83301 5.83329C5.83301 3.53211 7.69849 1.66663 9.99967 1.66663C12.3009 1.66663 14.1663 3.53211 14.1663 5.83329C14.1663 8.13448 12.3009 9.99996 9.99967 9.99996C7.69849 9.99996 5.83301 8.13448 5.83301 5.83329Z"
                                                            fill="" />
                                                    </g>
                                                </svg>
                                            </span>
                                            <input
                                                class="w-full rounded border bg-gray px-4.5 pl-11.5 py-3 font-medium text-black focus:border-primary focus-visible:outline-none dark:border-strokedark dark:bg-meta-4 dark:text-white dark:focus:border-primary"
                                                type="text" name="full_name" id="full_name" required autofocus
                                                value="{{ old('full_name', $customer->full_name) }}" />
                                        </div>
                                        @error('full_name')
                                            <p class="text-meta-1 text-sm text-black font-medium mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-5.5">
                                        <label class="mb-3 block text-sm font-medium text-black dark:text-white"
                                            for="gender">
                                            Jenis Kelamin
                                        </label>
                                        <div x-data="{ selectedGender: '{{ $customer->gender ?? '' }}' }" class="relative z-20 bg-white dark:bg-form-input">
                                            <select x-model="selectedGender" id="gender" name="gender"
                                                class="relative z-20 w-full appearance-none rounded border border-stroke bg-transparent py-3 pl-5 pr-12 outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input text-black dark:text-white">
                                                <option value="Laki-Laki">Laki-Laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            </select>
                                            <span class="absolute right-4 top-1/2 z-10 -translate-y-1/2">
                                                <svg class="fill-current" width="18" height="18" viewBox="0 0 18 18"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <g opacity="0.8">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M5.29289 8.29289C5.68342 7.90237 6.31658 7.90237 6.70711 8.29289L12 13.5858L17.2929 8.29289C17.6834 7.90237 18.3166 7.90237 18.7071 8.29289C19.0976 8.68342 19.0976 9.31658 18.7071 9.70711L12.7071 15.7071C12.3166 16.0976 11.6834 16.0976 11.2929 15.7071L5.29289 9.70711C4.90237 9.31658 4.90237 8.68342 5.29289 8.29289Z">
                                                        </path>
                                                    </g>
                                                </svg>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="mb-5.5">
                                        <label class="mb-3 block text-sm font-medium text-black dark:text-white"
                                            for="birth_place">Tempat Lahir</label>
                                        <div class="relative">
                                            <input
                                                class="w-full rounded border border-stroke bg-gray px-4.5 py-3 font-medium text-black focus:border-primary focus-visible:outline-none dark:border-strokedark dark:bg-meta-4 dark:text-white dark:focus:border-primary"
                                                type="text" name="birth_place" id="birth_place"
                                                value="{{ old('birth_place', $customer->birth_place) }}" />
                                        </div>
                                        @error('birth_place')
                                            <p class="text-meta-1 text-sm text-black font-medium mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-5.5">
                                        <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                                            Tanggal Lahir
                                        </label>
                                        <div class="relative">
                                            <input
                                                class="form-datepicker w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                                                value="{{ old('birth_date', \Carbon\Carbon::parse($customer->birth_date)->format('Y-m-d')) }}"
                                                data-class="flatpickr-right" name="birth_date" />
                                            <div
                                                class="pointer-events-none absolute inset-0 left-auto right-5 flex items-center">
                                                <svg class="fill-current" width="18" height="18"
                                                    viewBox="0 0 18 18" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M9.0002 12.8249C8.83145 12.8249 8.69082 12.7687 8.5502 12.6562L2.08145 6.2999C1.82832 6.04678 1.82832 5.65303 2.08145 5.3999C2.33457 5.14678 2.72832 5.14678 2.98145 5.3999L9.0002 11.278L15.0189 5.34365C15.2721 5.09053 15.6658 5.09053 15.9189 5.34365C16.1721 5.59678 16.1721 5.99053 15.9189 6.24365L9.45019 12.5999C9.30957 12.7405 9.16895 12.8249 9.0002 12.8249Z"
                                                        fill="#64748B" />
                                                </svg>
                                            </div>
                                        </div>
                                        @error('birth_date')
                                            <p class="text-meta-1 text-sm text-black font-medium mt-2">{{ $message }}
                                            </p>
                                        @enderror
                                    </div>
                                    <div class="mb-5.5">
                                        <label class="mb-3 block text-sm font-medium text-black dark:text-white"
                                            for="profession">Pekerjaan</label>
                                        <div class="relative">
                                            <input
                                                class="w-full rounded border border-stroke bg-gray px-4.5 py-3 font-medium text-black focus:border-primary focus-visible:outline-none dark:border-strokedark dark:bg-meta-4 dark:text-white dark:focus:border-primary"
                                                type="text" name="profession" id="profession" required
                                                value="{{ old('profession', $customer->profession) }}" />
                                        </div>
                                        @error('profession')
                                            <p class="text-meta-1 text-sm text-black font-medium mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-5.5">
                                        <label class="mb-3 block text-sm font-medium text-black dark:text-white"
                                            for="id_number">Nomor Induk Kependudukan (NIK)</label>
                                        <div class="relative">
                                            <input
                                                class="w-full rounded border border-stroke bg-gray px-4.5 py-3 font-medium text-black focus:border-primary focus-visible:outline-none dark:border-strokedark dark:bg-meta-4 dark:text-white dark:focus:border-primary"
                                                type="text" name="id_number" id="id_number" required
                                                value="{{ old('id_number', $customer->customerDocument->id_number) }}" />
                                        </div>
                                        @error('id_number')
                                            <p class="text-meta-1 text-sm text-black font-medium mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-5.5">
                                        <label class="mb-3 block text-sm font-medium text-black dark:text-white"
                                            for="passport_number">Nomor Paspor</label>
                                        <div class="relative">
                                            <input
                                                class="w-full rounded border border-stroke bg-gray px-4.5 py-3 font-medium text-black focus:border-primary focus-visible:outline-none dark:border-strokedark dark:bg-meta-4 dark:text-white dark:focus:border-primary"
                                                type="text" name="passport_number" id="passport_number" required
                                                value="{{ old('passport_number', $customer->customerDocument->passport_number ? $customer->customerDocument->passport_number : '') }}" />
                                        </div>
                                        @error('passport_number')
                                            <p class="text-meta-1 text-sm text-black font-medium mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-5.5">
                                        <label class="mb-3 block text-sm font-medium text-black dark:text-white"
                                            for="whatsapp_number">Nomor WhatsApp</label>
                                        <div class="relative">
                                            <input
                                                class="w-full rounded border border-stroke bg-gray px-4.5 py-3 font-medium text-black focus:border-primary focus-visible:outline-none dark:border-strokedark dark:bg-meta-4 dark:text-white dark:focus:border-primary"
                                                type="text" name="whatsapp_number" id="whatsapp_number" required
                                                value="{{ old('whatsapp_number', $customer->whatsapp_number) }}" />
                                        </div>
                                        @error('whatsapp_number')
                                            <p class="text-meta-1 text-sm text-black font-medium mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-5.5">
                                        <label class="mb-3 block text-sm font-medium text-black dark:text-white"
                                            for="email">Email</label>
                                        <input
                                            class="w-full rounded border border-stroke bg-gray px-4.5 py-3 font-medium text-black focus:border-primary focus-visible:outline-none dark:border-strokedark dark:bg-meta-4 dark:text-white dark:focus:border-primary"
                                            type="text" name="email" id="email"
                                            value="{{ old('email', $customer->email ? $customer->email : '') }}" />
                                        @error('email')
                                            <p class="text-meta-1 text-sm text-black font-medium mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-5.5">
                                        <label class="mb-3 block text-sm font-medium text-black dark:text-white"
                                            for="family_number">Nomor HP Keluarga</label>
                                        <input
                                            class="w-full rounded border border-stroke bg-gray px-4.5 py-3 font-medium text-black focus:border-primary focus-visible:outline-none dark:border-strokedark dark:bg-meta-4 dark:text-white dark:focus:border-primary"
                                            type="text" name="family_number" id="family_number"
                                            value="{{ old('family_number', $customer->family_number ? $customer->family_number : '') }}" />
                                        @error('family_number')
                                            <p class="text-meta-1 text-sm text-black font-medium mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-5.5">
                                        <label class="mb-3 block text-sm font-medium text-black dark:text-white"
                                            for="address">Alamat</label>
                                        <input
                                            class="w-full rounded border border-stroke bg-gray px-4.5 py-3 font-medium text-black focus:border-primary focus-visible:outline-none dark:border-strokedark dark:bg-meta-4 dark:text-white dark:focus:border-primary"
                                            type="text" name="address" id="address" required
                                            value="{{ old('address', $customer->address) }}" />
                                        @error('address')
                                            <p class="text-meta-1 text-sm text-black font-medium mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-5.5">
                                        <label class="mb-3 block text-sm font-medium text-black dark:text-white"
                                            for="subdistrict">Kecamatan</label>
                                        <input
                                            class="w-full rounded border border-stroke bg-gray px-4.5 py-3 font-medium text-black focus:border-primary focus-visible:outline-none dark:border-strokedark dark:bg-meta-4 dark:text-white dark:focus:border-primary"
                                            type="text" name="subdistrict" id="subdistrict" required
                                            value="{{ old('subdistrict', $customer->subdistrict) }}" />
                                        @error('subdistrict')
                                            <p class="text-meta-1 text-sm text-black font-medium mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-5.5">
                                        <label class="mb-3 block text-sm font-medium text-black dark:text-white"
                                            for="city">Kota/Kab.</label>
                                        <input
                                            class="w-full rounded border border-stroke bg-gray px-4.5 py-3 font-medium text-black focus:border-primary focus-visible:outline-none dark:border-strokedark dark:bg-meta-4 dark:text-white dark:focus:border-primary"
                                            type="text" name="city" id="city" required
                                            value="{{ old('city', $customer->city) }}" />
                                        @error('city')
                                            <p class="text-meta-1 text-sm text-black font-medium mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-5.5">
                                        <label class="mb-3 block text-sm font-medium text-black dark:text-white"
                                            for="province">Provinsi</label>
                                        <input
                                            class="w-full rounded border border-stroke bg-gray px-4.5 py-3 font-medium text-black focus:border-primary focus-visible:outline-none dark:border-strokedark dark:bg-meta-4 dark:text-white dark:focus:border-primary"
                                            type="text" name="province" id="province" required
                                            value="{{ old('province', $customer->province) }}" />
                                        @error('province')
                                            <p class="text-meta-1 text-sm text-black font-medium mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-5.5">
                                        <label class="mb-3 block text-sm font-medium text-black dark:text-white"
                                            for="father_name">Nama Ayah</label>
                                        <input
                                            class="w-full rounded border border-stroke bg-gray px-4.5 py-3 font-medium text-black focus:border-primary focus-visible:outline-none dark:border-strokedark dark:bg-meta-4 dark:text-white dark:focus:border-primary"
                                            type="text" name="father_name" id="father_name" required
                                            value="{{ old('father_name', $customer->father_name) }}" />
                                        @error('father_name')
                                            <p class="text-meta-1 text-sm text-black font-medium mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-5.5">
                                        <label class="mb-3 block text-sm font-medium text-black dark:text-white"
                                            for="mother_name">Nama Ibu</label>
                                        <input
                                            class="w-full rounded border border-stroke bg-gray px-4.5 py-3 font-medium text-black focus:border-primary focus-visible:outline-none dark:border-strokedark dark:bg-meta-4 dark:text-white dark:focus:border-primary"
                                            type="text" name="mother_name" id="mother_name" required
                                            value="{{ old('mother_name', $customer->mother_name) }}" />
                                        @error('mother_name')
                                            <p class="text-meta-1 text-sm text-black font-medium mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="flex justify-end gap-4.5">
                                        <button
                                            class="flex justify-center rounded bg-primary px-6 py-2 font-medium text-gray hover:bg-opacity-90"
                                            type="submit">
                                            Save
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-5 xl:col-span-2">
                        <div
                            class="rounded-sm border border-stroke bg-white shadow-default mb-4 dark:border-strokedark dark:bg-boxdark">
                            @php
                                $fotoJemaah = 'Foto Jemaah';
                            @endphp
                            <div
                                class="border-b border-stroke px-7 py-4 dark:border-strokedark flex justify-between items-center">
                                <h3 class="font-medium text-black dark:text-white">
                                    Ganti {{ $fotoJemaah }}
                                </h3>
                                <form
                                    action="{{ route('admin.customerDocument.rotate.photo', ['customerId' => $customer->id, 'type' => 'customer_photo']) }}"
                                    method="post">
                                    @csrf
                                    <button class="hover:text-primary" title="Putar {{ $fotoJemaah }}">
                                        <svg fill="none" class="fill-current" width="18" height="18"
                                            version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 64 64"
                                            style="enable-background:new 0 0 64 64;" xml:space="preserve">
                                            <path
                                                d="M58.2,26.8c-0.4-1.2-1.6-1.8-2.8-1.5c-1.2,0.4-1.8,1.6-1.5,2.8c0.7,2.2,1.1,4.5,1.1,6.8c0,3.5-0.8,6.8-2.3,9.9
                                                                                        C48.8,52.8,40.9,57.8,32,57.8C19.3,57.8,9,47.5,9,35s10.3-22.8,23-22.8c2.3,0,4.6,0.3,6.7,1l-3.4,1.6c-1.1,0.5-1.6,1.9-1.1,3
                                                                                        c0.4,0.8,1.2,1.3,2,1.3c0.3,0,0.6-0.1,0.9-0.2l8.8-4.1c0.5-0.3,1-0.7,1.2-1.3s0.2-1.2-0.1-1.7L43,3c-0.5-1.1-1.9-1.6-3-1.1
                                                                                        c-1.1,0.5-1.6,1.9-1.1,3l1.9,4.2c-2.8-1-5.8-1.5-8.9-1.5C16.9,7.7,4.5,19.9,4.5,35S16.9,62.3,32,62.3c10.6,0,20.1-5.9,24.7-15.4
                                                                                        c1.8-3.7,2.8-7.7,2.8-11.9C59.5,32.2,59,29.4,58.2,26.8z" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                            <div class="p-2">
                                <form
                                    action="{{ route('admin.customerDocument.update.photo.post', ['customerId' => $customer->id]) }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="p-1">
                                        <a data-fancybox="{{ Str::slug($customer->full_name) }}"
                                            class="relative mb-4 block w-full rounded border border-dashed border-primary bg-gray px-2 py-2 dark:bg-meta-4 sm:py-7.5"
                                            href="{{ asset('storage/' . $customer->customerDocument->customer_photo) }}"
                                            data-options='{"buttons" : ["close"]} ' data-caption="{{ $fotoJemaah }}">
                                            <img src="{{ asset('storage/' . $customer->customerDocument->customer_photo) }}"
                                                alt="{{ $fotoJemaah }}"
                                                class="w-full h-auto rounded cursor-pointer hover:shadow-lg hover:opacity-75 transition duration-300">
                                        </a>
                                        <div class="mb-4">
                                            <label class="mb-3 block text-sm font-medium text-black dark:text-white ">
                                                Upload Foto Baru
                                            </label>
                                            <input type="file" accept="image/jpeg, image/png" name="customer_photo"
                                                class="w-full cursor-pointer rounded-lg border-[1.5px] border-stroke bg-transparent font-normal outline-none transition file:mr-5 file:border-collapse file:cursor-pointer file:border-0 file:border-r file:border-solid file:border-stroke file:bg-whiter file:px-5 file:py-3 file:hover:bg-primary file:hover:bg-opacity-10 focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:file:border-form-strokedark dark:file:bg-white/30 dark:file:text-white dark:focus:border-primary" />
                                        </div>
                                    </div>

                                    <div class="flex justify-end gap-4.5 pb-2">
                                        <button
                                            class="flex justify-center rounded bg-primary px-6 py-2 font-medium text-gray hover:bg-opacity-90"
                                            type="submit">
                                            Save
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div
                            class="rounded-sm border border-stroke bg-white shadow-default mb-4 dark:border-strokedark dark:bg-boxdark">
                            @php
                                $fotoKtp = 'Foto KTP';
                            @endphp
                            <div
                                class="border-b border-stroke px-7 py-4 dark:border-strokedark flex justify-between items-center">
                                <h3 class="font-medium text-black dark:text-white">
                                    Ganti {{ $fotoKtp }}
                                </h3>
                                <form
                                    action="{{ route('admin.customerDocument.rotate.photo', ['customerId' => $customer->id, 'type' => 'id_photo']) }}"
                                    method="post">
                                    @csrf
                                    <button class="hover:text-primary" title="Putar {{ $fotoKtp }}">
                                        <svg fill="none" class="fill-current" width="18" height="18"
                                            version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 64 64"
                                            style="enable-background:new 0 0 64 64;" xml:space="preserve">
                                            <path
                                                d="M58.2,26.8c-0.4-1.2-1.6-1.8-2.8-1.5c-1.2,0.4-1.8,1.6-1.5,2.8c0.7,2.2,1.1,4.5,1.1,6.8c0,3.5-0.8,6.8-2.3,9.9
                                                                                                C48.8,52.8,40.9,57.8,32,57.8C19.3,57.8,9,47.5,9,35s10.3-22.8,23-22.8c2.3,0,4.6,0.3,6.7,1l-3.4,1.6c-1.1,0.5-1.6,1.9-1.1,3
                                                                                                c0.4,0.8,1.2,1.3,2,1.3c0.3,0,0.6-0.1,0.9-0.2l8.8-4.1c0.5-0.3,1-0.7,1.2-1.3s0.2-1.2-0.1-1.7L43,3c-0.5-1.1-1.9-1.6-3-1.1
                                                                                                c-1.1,0.5-1.6,1.9-1.1,3l1.9,4.2c-2.8-1-5.8-1.5-8.9-1.5C16.9,7.7,4.5,19.9,4.5,35S16.9,62.3,32,62.3c10.6,0,20.1-5.9,24.7-15.4
                                                                                                c1.8-3.7,2.8-7.7,2.8-11.9C59.5,32.2,59,29.4,58.2,26.8z" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                            <div class="p-2">
                                <form
                                    action="{{ route('admin.customerDocument.update.photo.post', ['customerId' => $customer->id]) }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="p-1">
                                        <a data-fancybox="{{ Str::slug($customer->full_name) }}"
                                            class="relative mb-4 block w-full rounded border border-dashed border-primary bg-gray px-2 py-2 dark:bg-meta-4 sm:py-7.5"
                                            href="{{ asset('storage/' . $customer->customerDocument->id_photo) }}"
                                            data-options='{"buttons" : ["close"]} ' data-caption="{{ $fotoKtp }}">
                                            <img src="{{ asset('storage/' . $customer->customerDocument->id_photo) }}"
                                                alt="{{ $fotoKtp }}"
                                                class="w-full h-auto rounded cursor-pointer hover:shadow-lg hover:opacity-75 transition duration-300">
                                        </a>
                                        <div class="mb-4">
                                            <label class="mb-3 block text-sm font-medium text-black dark:text-white ">
                                                Upload Foto Baru
                                            </label>
                                            <input type="file" accept="image/jpeg, image/png" name="id_photo"
                                                class="w-full cursor-pointer rounded-lg border-[1.5px] border-stroke bg-transparent font-normal outline-none transition file:mr-5 file:border-collapse file:cursor-pointer file:border-0 file:border-r file:border-solid file:border-stroke file:bg-whiter file:px-5 file:py-3 file:hover:bg-primary file:hover:bg-opacity-10 focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:file:border-form-strokedark dark:file:bg-white/30 dark:file:text-white dark:focus:border-primary" />
                                        </div>
                                    </div>
                                    <div class="flex justify-end gap-4.5 pb-2">
                                        <button
                                            class="flex justify-center rounded bg-primary px-6 py-2 font-medium text-gray hover:bg-opacity-90"
                                            type="submit">
                                            Save
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div
                            class="rounded-sm border border-stroke bg-white shadow-default mb-4 dark:border-strokedark dark:bg-boxdark">
                            @php
                                $fotoKk = 'Foto KK';
                            @endphp
                            <div
                                class="border-b border-stroke px-7 py-4 dark:border-strokedark flex justify-between items-center">
                                <h3 class="font-medium text-black dark:text-white">
                                    Ganti {{ $fotoKk }}
                                </h3>
                                <form
                                    action="{{ route('admin.customerDocument.rotate.photo', ['customerId' => $customer->id, 'type' => 'family_card_photo']) }}"
                                    method="post">
                                    @csrf
                                    <button class="hover:text-primary" title="Putar {{ $fotoKk }}">
                                        <svg fill="none" class="fill-current" width="18" height="18"
                                            version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 64 64"
                                            style="enable-background:new 0 0 64 64;" xml:space="preserve">
                                            <path
                                                d="M58.2,26.8c-0.4-1.2-1.6-1.8-2.8-1.5c-1.2,0.4-1.8,1.6-1.5,2.8c0.7,2.2,1.1,4.5,1.1,6.8c0,3.5-0.8,6.8-2.3,9.9
                                                                                                    C48.8,52.8,40.9,57.8,32,57.8C19.3,57.8,9,47.5,9,35s10.3-22.8,23-22.8c2.3,0,4.6,0.3,6.7,1l-3.4,1.6c-1.1,0.5-1.6,1.9-1.1,3
                                                                                                    c0.4,0.8,1.2,1.3,2,1.3c0.3,0,0.6-0.1,0.9-0.2l8.8-4.1c0.5-0.3,1-0.7,1.2-1.3s0.2-1.2-0.1-1.7L43,3c-0.5-1.1-1.9-1.6-3-1.1
                                                                                                    c-1.1,0.5-1.6,1.9-1.1,3l1.9,4.2c-2.8-1-5.8-1.5-8.9-1.5C16.9,7.7,4.5,19.9,4.5,35S16.9,62.3,32,62.3c10.6,0,20.1-5.9,24.7-15.4
                                                                                                    c1.8-3.7,2.8-7.7,2.8-11.9C59.5,32.2,59,29.4,58.2,26.8z" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                            <div class="p-2">
                                <form
                                    action="{{ route('admin.customerDocument.update.photo.post', ['customerId' => $customer->id]) }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="p-1">
                                        <a data-fancybox="{{ Str::slug($customer->full_name) }}"
                                            class="relative mb-4 block w-full rounded border border-dashed border-primary bg-gray px-2 py-2 dark:bg-meta-4 sm:py-7.5"
                                            href="{{ asset('storage/' . $customer->customerDocument->family_card_photo) }}"
                                            data-options='{"buttons" : ["close"]} ' data-caption="{{ $fotoKk }}">
                                            <img src="{{ asset('storage/' . $customer->customerDocument->family_card_photo) }}"
                                                alt="{{ $fotoKk }}"
                                                class="w-full h-auto rounded cursor-pointer hover:shadow-lg hover:opacity-75 transition duration-300">
                                        </a>
                                        <div class="mb-4">
                                            <label class="mb-3 block text-sm font-medium text-black dark:text-white ">
                                                Upload Foto Baru
                                            </label>
                                            <input type="file" accept="image/jpeg, image/png" name="family_card_photo"
                                                class="w-full cursor-pointer rounded-lg border-[1.5px] border-stroke bg-transparent font-normal outline-none transition file:mr-5 file:border-collapse file:cursor-pointer file:border-0 file:border-r file:border-solid file:border-stroke file:bg-whiter file:px-5 file:py-3 file:hover:bg-primary file:hover:bg-opacity-10 focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:file:border-form-strokedark dark:file:bg-white/30 dark:file:text-white dark:focus:border-primary" />
                                        </div>
                                    </div>

                                    <div class="flex justify-end gap-4.5 pb-2">
                                        <button
                                            class="flex justify-center rounded bg-primary px-6 py-2 font-medium text-gray hover:bg-opacity-90"
                                            type="submit">
                                            Save
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div
                            class="rounded-sm border border-stroke bg-white shadow-default mb-4 dark:border-strokedark dark:bg-boxdark">
                            @php
                                $fotoPaspor = 'Foto Paspor';
                            @endphp
                            <div
                                class="border-b border-stroke px-7 py-4 dark:border-strokedark flex justify-between items-center">
                                <h3 class="font-medium text-black dark:text-white">
                                    Ganti {{ $fotoPaspor }}
                                </h3>
                                <form
                                    action="{{ route('admin.customerDocument.rotate.photo', ['customerId' => $customer->id, 'type' => 'passport_photo']) }}"
                                    method="post">
                                    @csrf
                                    <button class="hover:text-primary" title="Putar {{ $fotoPaspor }}">
                                        <svg fill="none" class="fill-current" width="18" height="18"
                                            version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 64 64"
                                            style="enable-background:new 0 0 64 64;" xml:space="preserve">
                                            <path
                                                d="M58.2,26.8c-0.4-1.2-1.6-1.8-2.8-1.5c-1.2,0.4-1.8,1.6-1.5,2.8c0.7,2.2,1.1,4.5,1.1,6.8c0,3.5-0.8,6.8-2.3,9.9
                                                                                                        C48.8,52.8,40.9,57.8,32,57.8C19.3,57.8,9,47.5,9,35s10.3-22.8,23-22.8c2.3,0,4.6,0.3,6.7,1l-3.4,1.6c-1.1,0.5-1.6,1.9-1.1,3
                                                                                                        c0.4,0.8,1.2,1.3,2,1.3c0.3,0,0.6-0.1,0.9-0.2l8.8-4.1c0.5-0.3,1-0.7,1.2-1.3s0.2-1.2-0.1-1.7L43,3c-0.5-1.1-1.9-1.6-3-1.1
                                                                                                        c-1.1,0.5-1.6,1.9-1.1,3l1.9,4.2c-2.8-1-5.8-1.5-8.9-1.5C16.9,7.7,4.5,19.9,4.5,35S16.9,62.3,32,62.3c10.6,0,20.1-5.9,24.7-15.4
                                                                                                        c1.8-3.7,2.8-7.7,2.8-11.9C59.5,32.2,59,29.4,58.2,26.8z" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                            <div class="p-2">
                                <form
                                    action="{{ route('admin.customerDocument.update.photo.post', ['customerId' => $customer->id]) }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="p-1">
                                        <a data-fancybox="{{ Str::slug($customer->full_name) }}"
                                            class="relative mb-4 block w-full rounded border border-dashed border-primary bg-gray px-2 py-2 dark:bg-meta-4 sm:py-7.5"
                                            href="{{ $customer->customerDocument->passport_photo ? asset('storage/' . $customer->customerDocument->passport_photo) : asset('assets/images/sipenuh-img/passport-no-available.png') }}"
                                            data-options='{"buttons" : ["close"]} ' data-caption="{{ $fotoPaspor }}">
                                            <img src="{{ $customer->customerDocument->passport_photo ? asset('storage/' . $customer->customerDocument->passport_photo) : asset('assets/images/sipenuh-img/passport-no-available.png') }}"
                                                alt="{{ $fotoPaspor }}"
                                                class="w-full h-auto rounded cursor-pointer hover:shadow-lg hover:opacity-75 transition duration-300">
                                        </a>
                                        <div class="mb-4">
                                            <label class="mb-3 block text-sm font-medium text-black dark:text-white ">
                                                Upload Foto Baru
                                            </label>
                                            <input type="file" accept="image/jpeg, image/png" name="passport_photo"
                                                class="w-full cursor-pointer rounded-lg border-[1.5px] border-stroke bg-transparent font-normal outline-none transition file:mr-5 file:border-collapse file:cursor-pointer file:border-0 file:border-r file:border-solid file:border-stroke file:bg-whiter file:px-5 file:py-3 file:hover:bg-primary file:hover:bg-opacity-10 focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:file:border-form-strokedark dark:file:bg-white/30 dark:file:text-white dark:focus:border-primary" />
                                        </div>
                                    </div>

                                    <div class="flex justify-end gap-4.5 pb-2">
                                        <button
                                            class="flex justify-center rounded bg-primary px-6 py-2 font-medium text-gray hover:bg-opacity-90"
                                            type="submit">
                                            Save
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div
                            class="rounded-sm border border-stroke bg-white shadow-default mb-4 dark:border-strokedark dark:bg-boxdark">
                            @php
                                $fotoAkte = 'Foto Akte';
                            @endphp
                            <div
                                class="border-b border-stroke px-7 py-4 dark:border-strokedark flex justify-between items-center">
                                <h3 class="font-medium text-black dark:text-white">
                                    Ganti {{ $fotoAkte }}
                                </h3>
                                <form
                                    action="{{ route('admin.customerDocument.rotate.photo', ['customerId' => $customer->id, 'type' => 'birth_certificate_photo']) }}"
                                    method="post">
                                    @csrf
                                    <button class="hover:text-primary" title="Putar {{ $fotoAkte }}">
                                        <svg fill="none" class="fill-current" width="18" height="18"
                                            version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 64 64"
                                            style="enable-background:new 0 0 64 64;" xml:space="preserve">
                                            <path
                                                d="M58.2,26.8c-0.4-1.2-1.6-1.8-2.8-1.5c-1.2,0.4-1.8,1.6-1.5,2.8c0.7,2.2,1.1,4.5,1.1,6.8c0,3.5-0.8,6.8-2.3,9.9
                                                                                                        C48.8,52.8,40.9,57.8,32,57.8C19.3,57.8,9,47.5,9,35s10.3-22.8,23-22.8c2.3,0,4.6,0.3,6.7,1l-3.4,1.6c-1.1,0.5-1.6,1.9-1.1,3
                                                                                                        c0.4,0.8,1.2,1.3,2,1.3c0.3,0,0.6-0.1,0.9-0.2l8.8-4.1c0.5-0.3,1-0.7,1.2-1.3s0.2-1.2-0.1-1.7L43,3c-0.5-1.1-1.9-1.6-3-1.1
                                                                                                        c-1.1,0.5-1.6,1.9-1.1,3l1.9,4.2c-2.8-1-5.8-1.5-8.9-1.5C16.9,7.7,4.5,19.9,4.5,35S16.9,62.3,32,62.3c10.6,0,20.1-5.9,24.7-15.4
                                                                                                        c1.8-3.7,2.8-7.7,2.8-11.9C59.5,32.2,59,29.4,58.2,26.8z" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                            <div class="p-2">
                                <form
                                    action="{{ route('admin.customerDocument.update.photo.post', ['customerId' => $customer->id]) }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="p-1">
                                        <a data-fancybox="{{ Str::slug($customer->full_name) }}"
                                            class="relative mb-5.5 block w-full rounded border border-dashed border-primary bg-gray px-2 py-2 dark:bg-meta-4 sm:py-7.5"
                                            href="{{ asset('storage/' . $customer->customerDocument->birth_certificate_photo) }}"
                                            data-options='{"buttons" : ["close"]} ' data-caption="{{ $fotoAkte }}">
                                            <img src="{{ asset('storage/' . $customer->customerDocument->birth_certificate_photo) }}"
                                                alt="{{ $fotoAkte }}"
                                                class="w-full h-auto rounded cursor-pointer hover:shadow-lg hover:opacity-75 transition duration-300">
                                        </a>
                                        <div class="mb-4">
                                            <label class="mb-3 block text-sm font-medium text-black dark:text-white ">
                                                Upload Foto Baru
                                            </label>
                                            <input type="file" accept="image/jpeg, image/png"
                                                name="birth_certificate_photo"
                                                class="w-full cursor-pointer rounded-lg border-[1.5px] border-stroke bg-transparent font-normal outline-none transition file:mr-5 file:border-collapse file:cursor-pointer file:border-0 file:border-r file:border-solid file:border-stroke file:bg-whiter file:px-5 file:py-3 file:hover:bg-primary file:hover:bg-opacity-10 focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:file:border-form-strokedark dark:file:bg-white/30 dark:file:text-white dark:focus:border-primary" />
                                        </div>
                                    </div>

                                    <div class="flex justify-end gap-4.5 pb-2">
                                        <button
                                            class="flex justify-center rounded bg-primary px-6 py-2 font-medium text-gray hover:bg-opacity-90"
                                            type="submit">
                                            Save
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ====== Settings Section End -->
            </div>
        </div>
    </main>
@endsection


@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            flatpickr('.form-datepicker', {
                dateFormat: 'Y-m-d',
                defaultDate: '{{ old('birth_date', \Carbon\Carbon::parse($customer->birth_date)->format('Y-m-d')) }}',
            });
        });
    </script>
    @include('admin.components.alerts.notification')
    @include('admin.components.alerts.confirm')
@endpush
