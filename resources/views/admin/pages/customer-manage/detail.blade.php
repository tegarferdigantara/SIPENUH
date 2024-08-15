@extends('admin.layouts.app')

@section('content')
    <main>
        <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
            <div class="mx-auto max-w-270">
                <!-- Breadcrumb Start -->
                <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                    <h2 class="text-title-md2 font-bold text-black dark:text-white">
                        Informasi Pribadi Calon Jemaah
                    </h2>

                    <nav>
                        {{-- @dd($customers) --}}
                        <ol class="flex items-center gap-2">
                            <li>
                                <a class="font-medium" href="{{ route('admin.dashboard') }}">Dashboard /</a>
                            </li>
                            <li>
                                <a class="font-medium"
                                    href="{{ route('admin.customer.list.by.package', ['packageId' => $customer->umrah_package_id]) }}">{{ $customer->umrahPackage->name }}
                                    /</a>
                            </li>
                            <li class="font-medium text-primary">
                                {{ $customer->full_name }}
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
                            <div
                                class="border-b border-stroke px-7 py-4 dark:border-strokedark flex justify-between items-center">
                                <h3 class="font-medium text-black dark:text-white">
                                    Informasi Pribadi
                                </h3>
                                <a data-fancybox data-type="iframe"
                                    class="inline-flex items-center justify-center gap-2.5 rounded bg-primary px-4 py-2 text-center font-medium text-white text-xs hover:bg-opacity-90"
                                    href="{{ route('download.rekom.by.customerId', ['customerId' => $customer->id]) }}">
                                    <span>
                                        <svg class="fill-current" fill="none" width="15" height="15"
                                            version="1.1" id="lni_lni-download" xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 64 64"
                                            style="enable-background: new 0 0 64 64" xml:space="preserve">
                                            <g>
                                                <path
                                                    d="M60,44c-1.2,0-2.3,1-2.3,2.3v8.9c0,0.9-0.7,1.6-1.6,1.6H7.9c-0.9,0-1.6-0.7-1.6-1.6v-8.9C6.3,45,5.2,44,4,44
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      s-2.3,1-2.3,2.3v8.9c0,3.4,2.7,6.1,6.1,6.1h48.3c3.4,0,6.1-2.7,6.1-6.1v-8.9C62.3,45,61.2,44,60,44z" />
                                                <path
                                                    d="M30.4,46.5c0.4,0.4,1,0.6,1.6,0.6s1.1-0.2,1.6-0.6l14.5-14.1c0.9-0.9,0.9-2.3,0-3.2c-0.9-0.9-2.3-0.9-3.2,0L34.3,39.6V5
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      c0-1.2-1-2.3-2.3-2.3c-1.2,0-2.3,1-2.3,2.3v34.6L19.1,29.2c-0.9-0.9-2.3-0.8-3.2,0c-0.9,0.9-0.8,2.3,0,3.2L30.4,46.5z" />
                                            </g>
                                        </svg>
                                    </span>
                                    Print Surat Rekomendasi
                                </a>
                            </div>

                            <div class="p-7">
                                <div class="mb-5.5">
                                    <label class="mb-3 block text-sm font-medium text-black dark:text-white"
                                        for="registration_number">Nomor Registrasi</label>
                                    <div class="relative">
                                        <input
                                            class="w-full rounded border border-stroke bg-gray px-4.5 py-3 font-medium text-black focus:border-primary focus-visible:outline-none dark:border-strokedark dark:bg-meta-4 dark:text-white dark:focus:border-primary"
                                            type="text" name="registration_number" id="registration_number"
                                            value="{{ $customer->registration_number }}" readonly disabled />
                                    </div>
                                </div>
                                <div class="relative mb-5.5">
                                    <label class="mb-3 block text-sm font-medium text-black dark:text-white"
                                        for="umrah_package_name">
                                        Paket Umrah Yang di Pilih
                                    </label>
                                    <div class="relative">
                                        <input
                                            class="w-full rounded border border-stroke bg-gray px-4.5 py-3 pr-20 font-medium text-black focus:border-primary focus-visible:outline-none dark:border-strokedark dark:bg-meta-4 dark:text-white dark:focus:border-primary"
                                            type="text" name="umrah_package_name" id="umrah_package_name"
                                            value="{{ $customer->umrahPackage->name }}" readonly disabled />

                                        @if ($customer->umrahPackage->status === 'ACTIVE')
                                            <div
                                                class="absolute top-1/2 right-4 transform -translate-y-1/2 bg-success text-white text-xs font-bold rounded px-2 py-1">
                                                Aktif
                                            </div>
                                        @elseif ($customer->umrahPackage->status === 'FULL')
                                            <div
                                                class="absolute top-1/2 right-4 transform -translate-y-1/2 bg-warning text-white text-xs font-bold rounded px-2 py-1">
                                                Full
                                            </div>
                                        @else
                                            <div
                                                class="absolute top-1/2 right-4 transform -translate-y-1/2 bg-primary text-white text-xs font-bold rounded px-2 py-1">
                                                Tutup
                                            </div>
                                        @endif
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
                                            class="w-full rounded border border-stroke bg-gray px-4.5 pl-11.5 py-3 font-medium text-black focus:border-primary focus-visible:outline-none dark:border-strokedark dark:bg-meta-4 dark:text-white dark:focus:border-primary"
                                            type="text" name="full_name" id="full_name"
                                            value="{{ $customer->full_name }}" readonly disabled />
                                    </div>
                                </div>
                                <div class="mb-5.5">
                                    <label class="mb-3 block text-sm font-medium text-black dark:text-white"
                                        for="gender">Jenis Kelamin</label>
                                    <input
                                        class="w-full rounded border border-stroke bg-gray px-4.5 py-3 font-medium text-black focus:border-primary focus-visible:outline-none dark:border-strokedark dark:bg-meta-4 dark:text-white dark:focus:border-primary"
                                        type="text" name="gender" id="gender" value="{{ $customer->gender }}"
                                        readonly disabled />
                                </div>
                                <div class="mb-5.5 flex flex-col gap-5.5 sm:flex-row">
                                    <div class="w-full sm:w-1/2">
                                        <label class="mb-3 block text-sm font-medium text-black dark:text-white"
                                            for="birth_place">Tempat Lahir</label>
                                        <input
                                            class="w-full rounded border border-stroke bg-gray px-4.5 py-3 font-medium text-black focus:border-primary focus-visible:outline-none dark:border-strokedark dark:bg-meta-4 dark:text-white dark:focus:border-primary"
                                            type="text" name="birth_place" id="birth_place"
                                            value="{{ $customer->birth_place }}" readonly disabled />
                                    </div>

                                    <div class="w-full sm:w-1/2">
                                        <label class="mb-3 block text-sm font-medium text-black dark:text-white"
                                            for="birth_date">Tanggal Lahir</label>
                                        <input
                                            class="w-full rounded border border-stroke bg-gray px-4.5 py-3 font-medium text-black focus:border-primary focus-visible:outline-none dark:border-strokedark dark:bg-meta-4 dark:text-white dark:focus:border-primary"
                                            type="text" name="birth_date" id="birth_date"
                                            value="{{ $customer->birth_date }}" readonly disabled />
                                    </div>
                                </div>
                                <div class="mb-5.5">
                                    <label class="mb-3 block text-sm font-medium text-black dark:text-white"
                                        for="profession">Pekerjaan</label>
                                    <input
                                        class="w-full rounded border border-stroke bg-gray px-4.5 py-3 font-medium text-black focus:border-primary focus-visible:outline-none dark:border-strokedark dark:bg-meta-4 dark:text-white dark:focus:border-primary"
                                        type="text" name="profession" id="profession"
                                        value="{{ $customer->profession }}" readonly disabled />
                                </div>
                                <div class="mb-5.5 flex flex-col gap-5.5 sm:flex-row">
                                    <div class="w-full sm:w-1/2">
                                        <label class="mb-3 block text-sm font-medium text-black dark:text-white"
                                            for="id_number">Nomor Induk Kependudukan (NIK)</label>
                                        <input
                                            class="w-full rounded border border-stroke bg-gray px-4.5 py-3 font-medium text-black focus:border-primary focus-visible:outline-none dark:border-strokedark dark:bg-meta-4 dark:text-white dark:focus:border-primary"
                                            type="text" name="id_number" id="id_number"
                                            value="{{ $customer->customerDocument->id_number }}" readonly disabled />
                                    </div>

                                    <div class="w-full sm:w-1/2">
                                        <label class="mb-3 block text-sm font-medium text-black dark:text-white"
                                            for="passport_number">Nomor Paspor</label>
                                        <input
                                            class="w-full rounded border border-stroke bg-gray px-4.5 py-3 font-medium text-black focus:border-primary focus-visible:outline-none dark:border-strokedark dark:bg-meta-4 dark:text-white dark:focus:border-primary"
                                            type="text" name="passport_number" id="passport_number"
                                            value="{{ $customer->customerDocument->passport_number ? $customer->customerDocument->passport_number : 'Belum Buat Paspor' }}"
                                            readonly disabled />
                                    </div>
                                </div>
                                <div class="mb-5.5">
                                    <label class="mb-3 block text-sm font-medium text-black dark:text-white"
                                        for="whatsapp_number">Nomor WhatsApp</label>
                                    <div class="relative">
                                        <input
                                            class="w-full rounded border border-stroke bg-gray px-4.5 py-3 font-medium text-black focus:border-primary focus-visible:outline-none dark:border-strokedark dark:bg-meta-4 dark:text-white dark:focus:border-primary"
                                            type="text" name="whatsapp_number" id="whatsapp_number"
                                            value="{{ $customer->whatsapp_number }}" readonly disabled />
                                        <button
                                            class="absolute top-1/2 right-4 transform -translate-y-1/2 bg-success text-white text-xs font-bold rounded px-2 py-1 flex items-center gap-1 hover:bg-opacity-90"
                                            id="sendMessageButton">
                                            <svg fill="#ffffff" width="20" height="20" viewBox="0 0 64 64"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M54 9.90039C48.2 4.10039 40.3 0.900391 32.2 0.900391C15.2 0.900391 1.3 14.7004 1.3 31.7004C1.3 37.2004 2.7 42.4004 5.4 47.2004L1 63.1004L17.5 58.9004C22 61.3004 27.1 62.7004 32.3 62.7004C49.2 62.6004 63 48.8004 63 31.7004C63 23.5004 59.8 15.8004 54 9.90039ZM32.1 57.4004C27.6 57.4004 22.9 56.1004 19 53.7004L18 53.1004L8.3 55.6004L11 46.2004L10.4 45.2004C7.9 41.1004 6.5 36.3004 6.5 31.5004C6.5 17.4004 17.9 6.00039 32.1 6.00039C38.9 6.00039 45.3 8.70039 50.1 13.5004C54.9 18.3004 57.6 24.8004 57.6 31.7004C57.8 46.0004 46.2 57.4004 32.1 57.4004ZM46.2 38.2004C45.4 37.8004 41.7 35.9004 40.8 35.8004C40.1 35.5004 39.5 35.4004 39.1 36.2004C38.7 37.0004 37.1 38.6004 36.7 39.2004C36.3 39.6004 35.9 39.8004 35 39.3004C34.2 38.9004 31.8 38.2004 28.8 35.4004C26.5 33.4004 24.9 30.9004 24.6 30.0004C24.2 29.2004 24.5 28.9004 25 28.4004C25.4 28.0004 25.8 27.6004 26.1 27.0004C26.5 26.6004 26.5 26.2004 26.9 25.7004C27.3 25.3004 27 24.7004 26.8 24.3004C26.5 23.9004 25.1 20.1004 24.4 18.5004C23.8 16.9004 23.1 17.2004 22.7 17.2004C22.3 17.2004 21.7 17.2004 21.3 17.2004C20.9 17.2004 19.9 17.3004 19.3 18.2004C18.6 19.0004 16.6 20.9004 16.6 24.7004C16.6 28.5004 19.3 32.0004 19.8 32.7004C20.2 33.1004 25.3 41.0004 32.9 44.4004C34.7 45.2004 36.1 45.7004 37.3 46.1004C39.1 46.7004 40.8 46.5004 42.1 46.4004C43.6 46.3004 46.6 44.6004 47.3 42.7004C47.9 41.0004 47.9 39.3004 47.7 39.0004C47.5 38.8004 46.9 38.5004 46.2 38.2004Z" />
                                            </svg>

                                            Kirim Pesan
                                        </button>
                                    </div>
                                </div>
                                <div class="mb-5.5">
                                    <label class="mb-3 block text-sm font-medium text-black dark:text-white"
                                        for="email">Email</label>
                                    <input
                                        class="w-full rounded border border-stroke bg-gray px-4.5 py-3 font-medium text-black focus:border-primary focus-visible:outline-none dark:border-strokedark dark:bg-meta-4 dark:text-white dark:focus:border-primary"
                                        type="text" name="email" id="email"
                                        value="{{ $customer->email ? $customer->email : 'Tidak Ada Email' }}" readonly
                                        disabled />
                                </div>
                                <div class="mb-5.5">
                                    <label class="mb-3 block text-sm font-medium text-black dark:text-white"
                                        for="family_number">Nomor HP Keluarga</label>
                                    <input
                                        class="w-full rounded border border-stroke bg-gray px-4.5 py-3 font-medium text-black focus:border-primary focus-visible:outline-none dark:border-strokedark dark:bg-meta-4 dark:text-white dark:focus:border-primary"
                                        type="text" name="family_number" id="family_number"
                                        value="{{ $customer->family_number ? $customer->family_number : 'Tidak Ada Nomor Keluarga' }}"
                                        readonly disabled />
                                </div>
                                <div class="mb-5.5">
                                    <label class="mb-3 block text-sm font-medium text-black dark:text-white"
                                        for="address">Alamat</label>
                                    <input
                                        class="w-full rounded border border-stroke bg-gray px-4.5 py-3 font-medium text-black focus:border-primary focus-visible:outline-none dark:border-strokedark dark:bg-meta-4 dark:text-white dark:focus:border-primary"
                                        type="text" name="address" id="address" value="{{ $customer->address }}"
                                        readonly disabled />
                                </div>
                                <div class="mb-5.5">
                                    <label class="mb-3 block text-sm font-medium text-black dark:text-white"
                                        for="subdistrict">Kecamatan</label>
                                    <input
                                        class="w-full rounded border border-stroke bg-gray px-4.5 py-3 font-medium text-black focus:border-primary focus-visible:outline-none dark:border-strokedark dark:bg-meta-4 dark:text-white dark:focus:border-primary"
                                        type="text" name="subdistrict" id="subdistrict"
                                        value="{{ $customer->subdistrict }}" readonly disabled />
                                </div>
                                <div class="mb-5.5 flex flex-col gap-5.5 sm:flex-row">
                                    <div class="w-full sm:w-1/2">
                                        <label class="mb-3 block text-sm font-medium text-black dark:text-white"
                                            for="city">Kota/Kab.</label>
                                        <input
                                            class="w-full rounded border border-stroke bg-gray px-4.5 py-3 font-medium text-black focus:border-primary focus-visible:outline-none dark:border-strokedark dark:bg-meta-4 dark:text-white dark:focus:border-primary"
                                            type="text" name="city" id="city" value="{{ $customer->city }}"
                                            readonly disabled />
                                    </div>

                                    <div class="w-full sm:w-1/2">
                                        <label class="mb-3 block text-sm font-medium text-black dark:text-white"
                                            for="province">Provinsi</label>
                                        <input
                                            class="w-full rounded border border-stroke bg-gray px-4.5 py-3 font-medium text-black focus:border-primary focus-visible:outline-none dark:border-strokedark dark:bg-meta-4 dark:text-white dark:focus:border-primary"
                                            type="text" name="province" id="province"
                                            value="{{ $customer->province }}" readonly disabled />
                                    </div>
                                </div>
                                <div class="mb-5.5 flex flex-col gap-5.5 sm:flex-row">
                                    <div class="w-full sm:w-1/2">
                                        <label class="mb-3 block text-sm font-medium text-black dark:text-white"
                                            for="father_name">Nama Ayah</label>
                                        <input
                                            class="w-full rounded border border-stroke bg-gray px-4.5 py-3 font-medium text-black focus:border-primary focus-visible:outline-none dark:border-strokedark dark:bg-meta-4 dark:text-white dark:focus:border-primary"
                                            type="text" name="father_name" id="father_name"
                                            value="{{ $customer->father_name }}" readonly disabled />
                                    </div>
                                    <div class="w-full sm:w-1/2">
                                        <label class="mb-3 block text-sm font-medium text-black dark:text-white"
                                            for="mother_name">Nama Ibu</label>
                                        <input
                                            class="w-full rounded border border-stroke bg-gray px-4.5 py-3 font-medium text-black focus:border-primary focus-visible:outline-none dark:border-strokedark dark:bg-meta-4 dark:text-white dark:focus:border-primary"
                                            type="text" name="mother_name" id="mother_name"
                                            value="{{ $customer->mother_name }}" readonly disabled />
                                    </div>
                                </div>
                                <div class="flex justify-end gap-4.5">
                                    <a class="flex justify-center rounded bg-primary px-6 py-2 font-medium text-white hover:bg-opacity-90"
                                        href="{{ route('admin.customer.detail.by.package.edit', ['packageId' => $customer->umrah_package_id, 'customerId' => $customer->id]) }}">
                                        <span>
                                            <svg class="fill-current mr-2" width="18" height="18" fill="none"
                                                version="1.1" id="lni_lni-pencil-alt" xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                viewBox="0 0 64 64" style="enable-background: new 0 0 64 64"
                                                xml:space="preserve">
                                                <path
                                                    d="M62.2,11.9c0-0.8-0.3-1.6-0.9-2.2c-1.2-1.2-2.4-2.4-3.5-3.6c-1.1-1.1-2.1-2.2-3.2-3.2c-0.5-0.6-1.1-1-1.9-1.1
                                                                                                                                                                                                                                                                                c-0.9-0.1-1.7,0.1-2.4,0.7l-6.8,6.8H8.1c-3.4,0-6.3,2.8-6.3,6.3V56c0,3.4,2.8,6.3,6.3,6.3h40.5c3.4,0,6.3-2.8,6.3-6.3V20.5l6.5-6.5
                                                                                                                                                                                                                                                                                C61.9,13.4,62.2,12.7,62.2,11.9z M32.8,36c-0.1,0.1-0.1,0.1-0.2,0.1l-7.2,2.4l2.4-7.2c0-0.1,0.1-0.1,0.1-0.2l18-18l5,4.9L32.8,36z
                                                                                                                                                                                                                                                                                M50.3,56c0,1-0.8,1.8-1.8,1.8H8.1c-1,0-1.8-0.8-1.8-1.8V15.5c0-1,0.8-1.8,1.8-1.8h30.8L24.7,28c-0.5,0.5-1,1.2-1.2,2l-3.7,11.2
                                                                                                                                                                                                                                                                                c-0.3,0.8-0.1,1.5,0.3,2.2c0.3,0.4,0.9,1,2,1h0.4l11.5-3.8c0.7-0.2,1.4-0.7,1.9-1.2L50.3,25V56z M54,14.9L49,10l3.1-3.1
                                                                                                                                                                                                                                                                                c0.8,0.8,4.1,4.1,4.9,5L54,14.9z" />
                                            </svg>
                                        </span>
                                        Edit Data Jemaah
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-span-5 xl:col-span-2">
                        <div
                            class="rounded-sm border border-stroke bg-white shadow-default mb-4 dark:border-strokedark dark:bg-boxdark">
                            @php
                                $fotoJemaah = 'Foto Jemaah';
                            @endphp
                            <div class="border-b border-stroke px-7 py-4 dark:border-strokedark">
                                <h3 class="font-medium text-black dark:text-white">
                                    {{ $fotoJemaah }}
                                </h3>
                            </div>
                            <div class="p-1">
                                <a data-fancybox="{{ Str::slug($customer->full_name) }}"
                                    class="relative mb-5.5 block w-full rounded border border-dashed border-primary bg-gray px-2 py-2 dark:bg-meta-4 sm:py-7.5"
                                    href="{{ asset('storage/' . $customer->customerDocument->customer_photo) }}"
                                    data-options='{"buttons" : ["close"]} ' data-caption="{{ $fotoJemaah }}">
                                    <img src="{{ asset('storage/' . $customer->customerDocument->customer_photo) }}"
                                        alt="{{ $fotoJemaah }}"
                                        class="w-full h-auto rounded cursor-pointer hover:shadow-lg hover:opacity-75 transition duration-300">
                                </a>
                            </div>
                        </div>
                        <div
                            class="rounded-sm border border-stroke bg-white shadow-default mb-4 dark:border-strokedark dark:bg-boxdark">
                            @php
                                $fotoKtp = 'Foto KTP';
                            @endphp
                            <div class="border-b border-stroke px-7 py-4 dark:border-strokedark">
                                <h3 class="font-medium text-black dark:text-white">
                                    {{ $fotoKtp }}
                                </h3>
                            </div>
                            <div class="p-1">
                                <a data-fancybox="{{ Str::slug($customer->full_name) }}"
                                    class="relative mb-5.5 block w-full rounded border border-dashed border-primary bg-gray px-2 py-2 dark:bg-meta-4 sm:py-7.5"
                                    href="{{ asset('storage/' . $customer->customerDocument->id_photo) }}"
                                    data-options='{"buttons" : ["close"]} ' data-caption="{{ $fotoKtp }}">
                                    <img src="{{ asset('storage/' . $customer->customerDocument->id_photo) }}"
                                        alt="{{ $fotoKtp }}"
                                        class="w-full h-auto rounded cursor-pointer hover:shadow-lg hover:opacity-75 transition duration-300">
                                </a>
                            </div>
                        </div>
                        <div
                            class="rounded-sm border border-stroke bg-white shadow-default mb-4 dark:border-strokedark dark:bg-boxdark">
                            @php
                                $fotoKk = 'Foto KK';
                            @endphp
                            <div class="border-b border-stroke px-7 py-4 dark:border-strokedark">
                                <h3 class="font-medium text-black dark:text-white">
                                    {{ $fotoKk }}
                                </h3>
                            </div>
                            <div class="p-1">
                                <a data-fancybox="{{ Str::slug($customer->full_name) }}"
                                    class="relative mb-5.5 block w-full rounded border border-dashed border-primary bg-gray px-2 py-2 dark:bg-meta-4 sm:py-7.5"
                                    href="{{ asset('storage/' . $customer->customerDocument->family_card_photo) }}"
                                    data-options='{"buttons" : ["close"]} ' data-caption="{{ $fotoKk }}">
                                    <img src="{{ asset('storage/' . $customer->customerDocument->family_card_photo) }}"
                                        alt="{{ $fotoKk }}"
                                        class="w-full h-auto rounded cursor-pointer hover:shadow-lg hover:opacity-75 transition duration-300">
                                </a>
                            </div>
                        </div>
                        <div
                            class="rounded-sm border border-stroke bg-white shadow-default mb-4 dark:border-strokedark dark:bg-boxdark">
                            @php
                                $fotoPaspor = 'Foto Paspor';
                            @endphp
                            <div class="border-b border-stroke px-7 py-4 dark:border-strokedark">
                                <h3 class="font-medium text-black dark:text-white">
                                    {{ $fotoPaspor }}
                                </h3>
                            </div>
                            <div class="p-1">
                                <a data-fancybox="{{ Str::slug($customer->full_name) }}"
                                    class="relative mb-5.5 block w-full rounded border border-dashed border-primary bg-gray px-2 py-2 dark:bg-meta-4 sm:py-7.5"
                                    href="{{ $customer->customerDocument->passport_photo ? asset('storage/' . $customer->customerDocument->passport_photo) : asset('assets/images/sipenuh-img/passport-no-available.png') }}"
                                    data-options='{"buttons" : ["close"]} ' data-caption="{{ $fotoPaspor }}">
                                    <img src="{{ $customer->customerDocument->passport_photo ? asset('storage/' . $customer->customerDocument->passport_photo) : asset('assets/images/sipenuh-img/passport-no-available.png') }}"
                                        alt="{{ $fotoPaspor }}"
                                        class="w-full h-auto rounded cursor-pointer hover:shadow-lg hover:opacity-75 transition duration-300">
                                </a>
                            </div>
                        </div>
                        <div
                            class="rounded-sm border border-stroke bg-white shadow-default mb-4 dark:border-strokedark dark:bg-boxdark">
                            @php
                                $fotoAkte = 'Foto Akte';
                            @endphp
                            <div class="border-b border-stroke px-7 py-4 dark:border-strokedark">
                                <h3 class="font-medium text-black dark:text-white">
                                    {{ $fotoAkte }}
                                </h3>
                            </div>
                            <div class="p-1">
                                <a data-fancybox="{{ Str::slug($customer->full_name) }}"
                                    class="relative mb-5.5 block w-full rounded border border-dashed border-primary bg-gray px-2 py-2 dark:bg-meta-4 sm:py-7.5"
                                    href="{{ asset('storage/' . $customer->customerDocument->birth_certificate_photo) }}"
                                    data-options='{"buttons" : ["close"]} ' data-caption="{{ $fotoAkte }}">
                                    <img src="{{ asset('storage/' . $customer->customerDocument->birth_certificate_photo) }}"
                                        alt="{{ $fotoAkte }}"
                                        class="w-full h-auto rounded cursor-pointer hover:shadow-lg hover:opacity-75 transition duration-300">
                                </a>
                            </div>
                        </div>
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
        document.getElementById('sendMessageButton').addEventListener('click', function() {
            const whatsappNumber = document.getElementById('whatsapp_number').value;
            Swal.fire({
                title: 'Kirim Pesan',
                html: `
                <textarea id="swal-message" class="swal2-textarea" placeholder="Pesan"></textarea>
                <input id="swal-delay" type="number" class="swal2-input" placeholder="Delay (detik)" min="15" value="15">
            `,
                focusConfirm: false,
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Kirim',
                cancelButtonText: 'Batal',
                preConfirm: () => {
                    const message = Swal.getPopup().querySelector('#swal-message').value;
                    const delay = Swal.getPopup().querySelector('#swal-delay').value;
                    if (!message) {
                        Swal.showValidationMessage('Pesan harus diisi');
                    }
                    if (!delay || delay < 15) {
                        Swal.showValidationMessage('Delay minimal 15 detik');
                    }
                    return {
                        message,
                        delay
                    };
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    const {
                        message,
                        delay
                    } = result.value;
                    fetch('{{ route('admin.message.single.store') }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                    .getAttribute('content')
                            },
                            body: JSON.stringify({
                                message: message,
                                whatsapp_number: whatsappNumber,
                                delay: parseInt(delay)
                            })
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                Swal.fire('Sukses!', data.message, 'success');
                            } else {
                                Swal.fire('Gagal!', data.message ||
                                    'Terjadi kesalahan saat mengirim pesan.', 'error');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            Swal.fire('Gagal!', 'Terjadi kesalahan saat mengirim pesan.', 'error');
                        });
                }
            });
        });
    </script>
@endpush
