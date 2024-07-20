@extends('admin.layouts.app')
@section('content')
    <main>
        <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
            <div class="grid grid-cols-1 gap-4 md:grid-cols-2 md:gap-6 xl:grid-cols-4 2xl:gap-7.5">
                <!-- Card Item Start -->
                <div
                    class="rounded-sm border border-stroke bg-white px-7.5 py-6 shadow-default dark:border-strokedark dark:bg-boxdark">
                    <div class="flex h-11.5 w-11.5 items-center justify-center rounded-full bg-meta-2 dark:bg-meta-4">
                        <svg class="fill-primary dark:fill-white" width="18" height="18" fill="none" version="1.1"
                            id="lni_lni-package" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 64 64"
                            style="enable-background: new 0 0 64 64" xml:space="preserve">
                            <g>
                                <path
                                    d="M31.9,18.4c4.2,0,7.5-3.4,7.5-7.5s-3.4-7.5-7.5-7.5s-7.5,3.4-7.5,7.5S27.7,18.4,31.9,18.4z M31.9,7.8c1.7,0,3,1.4,3,3
                                                                                                                                                                                                    s-1.4,3-3,3s-3-1.4-3-3S30.2,7.8,31.9,7.8z" />
                                <path
                                    d="M23.6,28.5c2.1-2.3,5.2-3.7,8.4-3.7c3.2,0,6.3,1.3,8.4,3.7c0.4,0.5,1,0.7,1.7,0.7c0.5,0,1.1-0.2,1.5-0.6
                                                                                                                                                                                                    c0.9-0.8,1-2.3,0.1-3.2c-3-3.2-7.3-5.1-11.7-5.1s-8.7,1.9-11.7,5.1c-0.8,0.9-0.8,2.3,0.1,3.2C21.3,29.5,22.7,29.4,23.6,28.5z" />
                                <path
                                    d="M13.4,50.1c4.2,0,7.5-3.4,7.5-7.5c0-4.2-3.4-7.5-7.5-7.5s-7.5,3.4-7.5,7.5C5.8,46.8,9.2,50.1,13.4,50.1z M13.4,39.5
                                                                                                                                                                                                    c1.7,0,3,1.4,3,3c0,1.7-1.4,3-3,3s-3-1.4-3-3C10.3,40.9,11.7,39.5,13.4,39.5z" />
                                <path
                                    d="M13.1,51.8c-4.4,0-8.7,1.9-11.7,5.1c-0.8,0.9-0.8,2.3,0.1,3.2C2.4,61,3.8,60.9,4.7,60c2.1-2.3,5.2-3.7,8.4-3.7
                                                                                                                                                                                                    c3.2,0,6.3,1.3,8.4,3.7c0.4,0.5,1,0.7,1.7,0.7c0.5,0,1.1-0.2,1.5-0.6c0.9-0.8,1-2.3,0.1-3.2C21.8,53.7,17.5,51.8,13.1,51.8z" />
                                <path
                                    d="M50.4,50.1c4.2,0,7.5-3.4,7.5-7.5c0-4.2-3.4-7.5-7.5-7.5c-4.2,0-7.5,3.4-7.5,7.5C42.9,46.8,46.3,50.1,50.4,50.1z
                                                                                                                                                                                                    M50.4,39.5c1.7,0,3,1.4,3,3c0,1.7-1.4,3-3,3c-1.7,0-3-1.4-3-3C47.4,40.9,48.8,39.5,50.4,39.5z" />
                                <path
                                    d="M62.7,57c-3-3.2-7.3-5.1-11.7-5.1s-8.7,1.9-11.7,5.1c-0.8,0.9-0.8,2.3,0.1,3.2c0.9,0.8,2.3,0.8,3.2-0.1
                                                                                                                                                                                                    c2.1-2.3,5.2-3.7,8.4-3.7c3.2,0,6.3,1.3,8.4,3.7c0.4,0.5,1,0.7,1.7,0.7c0.5,0,1.1-0.2,1.5-0.6C63.4,59.3,63.5,57.9,62.7,57z" />
                                <path
                                    d="M39.2,40.9c0.5-1.1,0-2.5-1.1-3l-3.9-1.8V32c0-1.2-1-2.3-2.2-2.3s-2.3,1-2.3,2.3v4l-4,1.9c-1.1,0.5-1.6,1.9-1.1,3
                                                                                                                                                                                                    c0.5,1.1,1.9,1.6,3,1.1l4.2-2l4.5,2c0.3,0.1,0.6,0.2,0.9,0.2C38,42.2,38.8,41.7,39.2,40.9z" />
                            </g>
                        </svg>
                    </div>

                    <div class="mt-4 flex items-end justify-between">
                        <div>
                            <h4 class="text-title-md font-bold text-black dark:text-white">
                                {{ $registeredJemaah }}
                            </h4>
                            <span class="text-sm font-medium">Total Jemaah Terdaftar</span>
                        </div>
                    </div>
                </div>
                <!-- Card Item End -->
                <!-- Card Item Start -->
                <div
                    class="rounded-sm border border-stroke bg-white px-7.5 py-6 shadow-default dark:border-strokedark dark:bg-boxdark">
                    <div class="flex h-11.5 w-11.5 items-center justify-center rounded-full bg-meta-2 dark:bg-meta-4">
                        <svg class="fill-primary dark:fill-white" width="22" height="18" viewBox="0 0 22 18"
                            fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M7.18418 8.03751C9.31543 8.03751 11.0686 6.35313 11.0686 4.25626C11.0686 2.15938 9.31543 0.475006 7.18418 0.475006C5.05293 0.475006 3.2998 2.15938 3.2998 4.25626C3.2998 6.35313 5.05293 8.03751 7.18418 8.03751ZM7.18418 2.05626C8.45605 2.05626 9.52168 3.05313 9.52168 4.29063C9.52168 5.52813 8.49043 6.52501 7.18418 6.52501C5.87793 6.52501 4.84668 5.52813 4.84668 4.29063C4.84668 3.05313 5.9123 2.05626 7.18418 2.05626Z"
                                fill="" />
                            <path
                                d="M15.8124 9.6875C17.6687 9.6875 19.1468 8.24375 19.1468 6.42188C19.1468 4.6 17.6343 3.15625 15.8124 3.15625C13.9905 3.15625 12.478 4.6 12.478 6.42188C12.478 8.24375 13.9905 9.6875 15.8124 9.6875ZM15.8124 4.7375C16.8093 4.7375 17.5999 5.49375 17.5999 6.45625C17.5999 7.41875 16.8093 8.175 15.8124 8.175C14.8155 8.175 14.0249 7.41875 14.0249 6.45625C14.0249 5.49375 14.8155 4.7375 15.8124 4.7375Z"
                                fill="" />
                            <path
                                d="M15.9843 10.0313H15.6749C14.6437 10.0313 13.6468 10.3406 12.7874 10.8563C11.8593 9.61876 10.3812 8.79376 8.73115 8.79376H5.67178C2.85303 8.82814 0.618652 11.0625 0.618652 13.8469V16.3219C0.618652 16.975 1.13428 17.4906 1.7874 17.4906H20.2468C20.8999 17.4906 21.4499 16.9406 21.4499 16.2875V15.4625C21.4155 12.4719 18.9749 10.0313 15.9843 10.0313ZM2.16553 15.9438V13.8469C2.16553 11.9219 3.74678 10.3406 5.67178 10.3406H8.73115C10.6562 10.3406 12.2374 11.9219 12.2374 13.8469V15.9438H2.16553V15.9438ZM19.8687 15.9438H13.7499V13.8469C13.7499 13.2969 13.6468 12.7469 13.4749 12.2313C14.0937 11.7844 14.8499 11.5781 15.6405 11.5781H15.9499C18.0812 11.5781 19.8343 13.3313 19.8343 15.4625V15.9438H19.8687Z"
                                fill="" />
                        </svg>
                    </div>

                    <div class="mt-4 flex items-end justify-between">
                        <div>
                            <h4 class="text-title-md font-bold text-black dark:text-white">
                                {{ $customers->count() }}
                            </h4>
                            <span class="text-sm font-medium">Pendaftar Baru Bulan Ini</span>
                        </div>
                    </div>
                </div>
                <!-- Card Item End -->

                <!-- Card Item Start -->
                <div
                    class="rounded-sm border border-stroke bg-white px-7.5 py-6 shadow-default dark:border-strokedark dark:bg-boxdark">
                    <div class="flex h-11.5 w-11.5 items-center justify-center rounded-full bg-meta-2 dark:bg-meta-4">
                        <svg class="fill-primary dark:fill-white" width="18" height="18" fill="none"
                            version="1.1" id="lni_lni-package" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 64 64"
                            style="enable-background: new 0 0 64 64" xml:space="preserve">
                            <path
                                d="M62,21.3l-4.5-14c-0.8-2.6-3.3-4.4-6-4.4H13.1c-2.7,0-5.1,1.7-6,4.2l-5,14.1c-0.2,0.6-0.3,1.2-0.3,1.9v30.3
                                                                                                                                                                                                                        c0,4.3,3.5,7.7,7.7,7.7h45.1c4.3,0,7.7-3.5,7.7-7.7V23C62.3,22.5,62.2,21.9,62,21.3z M53.2,8.7l3.7,11.6H34.3V7.4h17.2
                                                                                                                                                                                                                        C52.2,7.4,53,7.9,53.2,8.7z M11.3,8.6c0.3-0.7,1-1.2,1.7-1.2h16.7v12.9H7.2L11.3,8.6z M54.5,56.6H9.5c-1.8,0-3.2-1.4-3.2-3.2V24.8
                                                                                                                                                                                                                        h51.5v28.6C57.8,55.2,56.3,56.6,54.5,56.6z" />
                        </svg>
                    </div>

                    <div class="mt-4 flex items-end justify-between">
                        <div>
                            <h4 class="text-title-md font-bold text-black dark:text-white">
                                {{ $totalActivePackage }}
                            </h4>
                            <span class="text-sm font-medium">Paket Umrah Tersedia</span>
                        </div>
                    </div>
                </div>
                <!-- Card Item End -->
            </div>

            <div class="mt-4 grid grid-cols-12 gap-4 md:mt-6 md:gap-6 2xl:mt-7.5 2xl:gap-7.5">
                <!-- ====== Chart One Start -->
                <div
                    class="col-span-12 border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark px-4 py-6 md:px-6 xl:px-7.5 ">
                    <div class="pb-6">
                        <h4 class="text-xl font-bold text-black dark:text-white">Jemaah Baru Bulan Ini</h4>
                    </div>
                    <table class="w-full table-auto" id="recentCustomerTable">
                        <thead>
                            <tr class="bg-gray-2 text-left dark:bg-meta-4">
                                <th class="min-w-[220px] px-4 py-4 font-medium text-black dark:text-white xl:pl-11">
                                    Nama
                                </th>
                                <th class="min-w-[150px] px-4 py-4 font-medium text-black dark:text-white">
                                    Jenis Kelamin
                                </th>
                                <th class="min-w-[120px] px-4 py-4 font-medium text-black dark:text-white">
                                    Tempat, Tanggal Lahir
                                </th>
                                <th class="px-4 py-4 font-medium text-black dark:text-white">
                                    Alamat
                                </th>
                                <th class="px-4 py-4 font-medium text-black dark:text-white">
                                    Nomor WhatsApp
                                </th>
                                <th class="px-4 py-4 font-medium text-black dark:text-white">
                                    Tanggal Pendaftaran
                                </th>
                                <th class="px-4 py-4 font-medium text-black dark:text-white">
                                    Jenis Paket
                                </th>
                                <th class="px-4 py-4 font-medium text-black dark:text-white">
                                    Status Paket
                                </th>
                                <th class="px-4 py-4 font-medium text-black dark:text-white">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @isset($customers)
                                @foreach ($customers as $customer)
                                    <tr>
                                        <td class="border-b border-[#eee] px-4 py-5 pl-9 dark:border-strokedark xl:pl-11">
                                            <div class="flex flex-col gap-4 sm:flex-row sm:items-center">
                                                <div class="h-10.5 w-10.5 rounded-md">
                                                    <img src="
                                                   {{ asset('storage/' . $customer->customerDocument->customer_photo) }}"
                                                        alt="{{ $customer->full_name }}" />
                                                </div>
                                                <div class="grid-item">
                                                    <h5 class="font-medium text-black dark:text-white">
                                                        {{ $customer->full_name }}
                                                    </h5>
                                                    <p class="text-sm">{{ $customer->registration_number }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="border-b border-[#eee] px-4 py-5 dark:border-strokedark">
                                            <p class="text-black dark:text-white">{{ $customer->gender }}</p>
                                        </td>
                                        <td class="border-b border-[#eee] px-4 py-5 dark:border-strokedark">
                                            <p class="text-black dark:text-white">
                                                {{ $customer->birth_place }}, {{ $customer->birth_date }}
                                            </p>
                                        </td>
                                        <td class="border-b border-[#eee] px-4 py-5 dark:border-strokedark">
                                            <p class="text-black dark:text-white">
                                                {{ $customer->address . ', ' . $customer->subdistrict . ', ' . $customer->city . ', ' . $customer->province }}
                                            </p>
                                        </td>
                                        <td class="border-b border-[#eee] px-4 py-5 dark:border-strokedark">
                                            <p class="text-black dark:text-white">{{ $customer->whatsapp_number }}</p>
                                        </td>
                                        <td class="border-b border-[#eee] px-4 py-5 dark:border-strokedark">
                                            {{ \Carbon\Carbon::parse($customer->created_at)->translatedFormat('l, d F Y H:i') }}
                                        </td>
                                        <td class="border-b border-[#eee] px-4 py-5 dark:border-strokedark">
                                            {{ $customer->umrahPackage->name }}
                                        </td>
                                        <td class="border-b border-[#eee] px-4 py-5 dark:border-strokedark">
                                            @if ($customer->umrahPackage->status === 'ACTIVE')
                                                <span class="rounded bg-success px-4 py-2 text-white hover:bg-opacity-90">
                                                    Aktif
                                                </span>
                                            @elseif ($customer->umrahPackage->status === 'FULL')
                                                <span class="rounded bg-warning px-4 py-2 text-white hover:bg-opacity-90">
                                                    Full
                                                </span>
                                            @else
                                                <span class="rounded bg-primary px-4 py-2 text-white hover:bg-opacity-90">
                                                    Tutup
                                                </span>
                                            @endif
                                        </td>
                                        <td class="border-b border-[#eee] px-4 py-5 dark:border-strokedark">
                                            <div class="flex items-center space-x-3.5">
                                                <a class="hover:text-primary"
                                                    href="{{ route('admin.customer.detail.by.package', ['packageId' => $customer->umrah_package_id, 'customerId' => $customer->id]) }}"
                                                    title="Lihat Detail Jemaah">
                                                    <svg class="fill-current" width="18" height="18" viewBox="0 0 18 18"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M8.99981 14.8219C3.43106 14.8219 0.674805 9.50624 0.562305 9.28124C0.47793 9.11249 0.47793 8.88749 0.562305 8.71874C0.674805 8.49374 3.43106 3.20624 8.99981 3.20624C14.5686 3.20624 17.3248 8.49374 17.4373 8.71874C17.5217 8.88749 17.5217 9.11249 17.4373 9.28124C17.3248 9.50624 14.5686 14.8219 8.99981 14.8219ZM1.85605 8.99999C2.4748 10.0406 4.89356 13.5562 8.99981 13.5562C13.1061 13.5562 15.5248 10.0406 16.1436 8.99999C15.5248 7.95936 13.1061 4.44374 8.99981 4.44374C4.89356 4.44374 2.4748 7.95936 1.85605 8.99999Z"
                                                            fill="" />
                                                        <path
                                                            d="M9 11.3906C7.67812 11.3906 6.60938 10.3219 6.60938 9C6.60938 7.67813 7.67812 6.60938 9 6.60938C10.3219 6.60938 11.3906 7.67813 11.3906 9C11.3906 10.3219 10.3219 11.3906 9 11.3906ZM9 7.875C8.38125 7.875 7.875 8.38125 7.875 9C7.875 9.61875 8.38125 10.125 9 10.125C9.61875 10.125 10.125 9.61875 10.125 9C10.125 8.38125 9.61875 7.875 9 7.875Z"
                                                            fill="" />
                                                    </svg>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @endisset
                        </tbody>
                    </table>
                </div>

                <!-- ====== Chart One End -->
            </div>
        </div>
    </main>
@endsection

@push('scripts')
    <script>
        new DataTable('#recentCustomerTable')
    </script>

    @include('admin.components.alerts.notification')
@endpush
