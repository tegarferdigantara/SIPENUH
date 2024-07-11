@extends('admin.layouts.app')

@section('content')
    <main>
        <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
            <!-- Breadcrumb Start -->
            <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                <h2 class="text-title-md2 font-bold text-black dark:text-white">
                    {{ request()->routeIs('admin.customer.list.all') ? 'Daftar Semua Jemaah' : 'Daftar Jemaah - ' . $umrahPackage->name }}
                </h2>

                <nav>
                    <ol class="flex items-center gap-2">
                        <li>
                            <a class="font-medium" href="{{ route('admin.dashboard') }}">Dashboard /</a>
                        </li>
                        <li class="font-medium text-primary">
                            {{ request()->routeIs('admin.customer.list.all') ? 'Daftar Semua Jemaah' : $umrahPackage->name }}
                        </li>
                    </ol>
                </nav>
            </div>
            <!-- Breadcrumb End -->

            <!-- ====== Table Section Start -->
            <div class="flex flex-col gap-10">
                <!-- ====== Table Three Start -->
                <div
                    class="rounded-sm border border-stroke bg-white px-5 pb-2.5 pt-6 shadow-default dark:border-strokedark dark:bg-boxdark sm:px-7.5 xl:pb-1">
                    <div class="max-w-full overflow-x-auto">
                        <div class="flex justify-between items-center m-4">
                            <div class="flex gap-4">
                                @if (Route::currentRouteName() === 'admin.customer.list.by.package')
                                    <a href="#"
                                        class="inline-flex items-center justify-center gap-2.5 rounded bg-primary px-4 py-2 text-center font-medium text-white hover:bg-opacity-90 lg:px-8 xl:px-10">
                                        <span>
                                            <svg class="fill-current" fill="none" width="20" height="20"
                                                data-fancybox data-type="iframe" version="1.1" id="lni_lni-printer"
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                viewBox="0 0 64 64" style="enable-background: new 0 0 64 64"
                                                xml:space="preserve">
                                                <g>
                                                    <path
                                                        d="M54.6,14.5V7c0-2.9-2.4-5.3-5.3-5.3H14.6c-2.9,0-5.3,2.4-5.3,5.3v7.5c-2.8,0.1-5.1,2.4-5.1,5.2v14.4c0,2.8,2.3,5.1,5.1,5.2
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              V57c0,2.9,2.4,5.3,5.3,5.3h34.8c2.9,0,5.3-2.4,5.3-5.3V39.3c2.8-0.1,5.1-2.4,5.1-5.2V19.7C59.7,16.9,57.4,14.6,54.6,14.5z M13.9,7
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              c0-0.4,0.3-0.8,0.8-0.8h34.8c0.4,0,0.8,0.3,0.8,0.8v7.5H13.9V7z M50.1,57c0,0.4-0.3,0.8-0.8,0.8H14.6c-0.4,0-0.8-0.3-0.8-0.8V39.3
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              h36.3V57z M55.2,34.1c0,0.4-0.3,0.8-0.8,0.8H9.5c-0.4,0-0.8-0.3-0.8-0.8V19.7c0-0.4,0.3-0.8,0.8-0.8h44.9c0.4,0,0.8,0.3,0.8,0.8
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              V34.1z" />
                                                    <path
                                                        d="M24.5,47h15c1.2,0,2.3-1,2.3-2.3s-1-2.3-2.3-2.3h-15c-1.2,0-2.3,1-2.3,2.3S23.3,47,24.5,47z" />
                                                    <path
                                                        d="M50,23.2h-7.5c-1.2,0-2.3,1-2.3,2.3s1,2.3,2.3,2.3H50c1.2,0,2.3-1,2.3-2.3S51.3,23.2,50,23.2z" />
                                                    <path
                                                        d="M24.5,54.6h15c1.2,0,2.3-1,2.3-2.3s-1-2.3-2.3-2.3h-15c-1.2,0-2.3,1-2.3,2.3S23.3,54.6,24.5,54.6z" />
                                                </g>
                                            </svg>
                                        </span>
                                        Export Semua Data
                                    </a>
                                    <a href="{{ route('download.manifest', ['packageId' => $umrahPackage->id]) }}"
                                        target="_blank" data-fancybox data-type="iframe"
                                        class="inline-flex items-center justify-center gap-2.5 rounded bg-primary px-4 py-2 text-center font-medium text-white hover:bg-opacity-90 lg:px-8 xl:px-10">
                                        <span>
                                            <svg class="fill-current" fill="none" width="20" height="20"
                                                version="1.1" id="lni_lni-download" xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                viewBox="0 0 64 64" style="enable-background: new 0 0 64 64"
                                                xml:space="preserve">
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
                                        Download Manifest
                                    </a>
                                @endif
                            </div>
                        </div>
                        <table class="w-full table-auto" id="customerTable">
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
                                    @if (Route::currentRouteName() === 'admin.customer.list.all')
                                        <th class="px-4 py-4 font-medium text-black dark:text-white">
                                            Jenis Paket
                                        </th>
                                        <th class="px-4 py-4 font-medium text-black dark:text-white">
                                            Status Paket
                                        </th>
                                    @endif
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
                                                {{ $customer->created_at }}
                                            </td>
                                            @if (Route::currentRouteName() === 'admin.customer.list.all')
                                                <td class="border-b border-[#eee] px-4 py-5 dark:border-strokedark">
                                                    {{ $customer->umrahPackage->name }}
                                                </td>
                                                <td class="border-b border-[#eee] px-4 py-5 dark:border-strokedark">
                                                    @if ($customer->umrahPackage->status === 'ACTIVE')
                                                        <span
                                                            class="rounded bg-success px-4 py-2 text-white hover:bg-opacity-90">
                                                            Aktif
                                                        </span>
                                                    @elseif ($customer->umrahPackage->status === 'FULL')
                                                        <span
                                                            class="rounded bg-warning px-4 py-2 text-white hover:bg-opacity-90">
                                                            Full
                                                        </span>
                                                    @else
                                                        <span
                                                            class="rounded bg-primary px-4 py-2 text-white hover:bg-opacity-90">
                                                            Tutup
                                                        </span>
                                                    @endif
                                                </td>
                                            @endif
                                            <td class="border-b border-[#eee] px-4 py-5 dark:border-strokedark">
                                                <div class="flex items-center space-x-3.5">
                                                    <a class="hover:text-primary"
                                                        href="{{ route('admin.customer.detail.by.package', ['packageId' => $customer->umrah_package_id, 'customerId' => $customer->id]) }}"
                                                        title="Lihat Detail Jemaah">
                                                        <svg class="fill-current" width="18" height="18"
                                                            viewBox="0 0 18 18" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M8.99981 14.8219C3.43106 14.8219 0.674805 9.50624 0.562305 9.28124C0.47793 9.11249 0.47793 8.88749 0.562305 8.71874C0.674805 8.49374 3.43106 3.20624 8.99981 3.20624C14.5686 3.20624 17.3248 8.49374 17.4373 8.71874C17.5217 8.88749 17.5217 9.11249 17.4373 9.28124C17.3248 9.50624 14.5686 14.8219 8.99981 14.8219ZM1.85605 8.99999C2.4748 10.0406 4.89356 13.5562 8.99981 13.5562C13.1061 13.5562 15.5248 10.0406 16.1436 8.99999C15.5248 7.95936 13.1061 4.44374 8.99981 4.44374C4.89356 4.44374 2.4748 7.95936 1.85605 8.99999Z"
                                                                fill="" />
                                                            <path
                                                                d="M9 11.3906C7.67812 11.3906 6.60938 10.3219 6.60938 9C6.60938 7.67813 7.67812 6.60938 9 6.60938C10.3219 6.60938 11.3906 7.67813 11.3906 9C11.3906 10.3219 10.3219 11.3906 9 11.3906ZM9 7.875C8.38125 7.875 7.875 8.38125 7.875 9C7.875 9.61875 8.38125 10.125 9 10.125C9.61875 10.125 10.125 9.61875 10.125 9C10.125 8.38125 9.61875 7.875 9 7.875Z"
                                                                fill="" />
                                                        </svg>
                                                    </a>
                                                    <a class="hover:text-primary"
                                                        href="{{ route('admin.customer.detail.by.package.edit', ['packageId' => $customer->umrah_package_id, 'customerId' => $customer->id]) }}"
                                                        title="Edit Data Jemaah">
                                                        <svg class="fill-current" width="18" height="18" fill="none"
                                                            version="1.1" id="lni_lni-pencil-alt"
                                                            xmlns="http://www.w3.org/2000/svg"
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
                                                    </a>
                                                    <button class="hover:text-primary" title="Delete Data Jemaah">
                                                        <svg class="fill-current" width="18" height="18"
                                                            viewBox="0 0 18 18" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M13.7535 2.47502H11.5879V1.9969C11.5879 1.15315 10.9129 0.478149 10.0691 0.478149H7.90352C7.05977 0.478149 6.38477 1.15315 6.38477 1.9969V2.47502H4.21914C3.40352 2.47502 2.72852 3.15002 2.72852 3.96565V4.8094C2.72852 5.42815 3.09414 5.9344 3.62852 6.1594L4.07852 15.4688C4.13477 16.6219 5.09102 17.5219 6.24414 17.5219H11.7004C12.8535 17.5219 13.8098 16.6219 13.866 15.4688L14.3441 6.13127C14.8785 5.90627 15.2441 5.3719 15.2441 4.78127V3.93752C15.2441 3.15002 14.5691 2.47502 13.7535 2.47502ZM7.67852 1.9969C7.67852 1.85627 7.79102 1.74377 7.93164 1.74377H10.0973C10.2379 1.74377 10.3504 1.85627 10.3504 1.9969V2.47502H7.70664V1.9969H7.67852ZM4.02227 3.96565C4.02227 3.85315 4.10664 3.74065 4.24727 3.74065H13.7535C13.866 3.74065 13.9785 3.82502 13.9785 3.96565V4.8094C13.9785 4.9219 13.8941 5.0344 13.7535 5.0344H4.24727C4.13477 5.0344 4.02227 4.95002 4.02227 4.8094V3.96565ZM11.7285 16.2563H6.27227C5.79414 16.2563 5.40039 15.8906 5.37227 15.3844L4.95039 6.2719H13.0785L12.6566 15.3844C12.6004 15.8625 12.2066 16.2563 11.7285 16.2563Z"
                                                                fill="" />
                                                            <path
                                                                d="M9.00039 9.11255C8.66289 9.11255 8.35352 9.3938 8.35352 9.75942V13.3313C8.35352 13.6688 8.63477 13.9782 9.00039 13.9782C9.33789 13.9782 9.64727 13.6969 9.64727 13.3313V9.75942C9.64727 9.3938 9.33789 9.11255 9.00039 9.11255Z"
                                                                fill="" />
                                                            <path
                                                                d="M11.2502 9.67504C10.8846 9.64692 10.6033 9.90004 10.5752 10.2657L10.4064 12.7407C10.3783 13.0782 10.6314 13.3875 10.9971 13.4157C11.0252 13.4157 11.0252 13.4157 11.0533 13.4157C11.3908 13.4157 11.6721 13.1625 11.6721 12.825L11.8408 10.35C11.8408 9.98442 11.5877 9.70317 11.2502 9.67504Z"
                                                                fill="" />
                                                            <path
                                                                d="M6.72245 9.67504C6.38495 9.70317 6.1037 10.0125 6.13182 10.35L6.3287 12.825C6.35683 13.1625 6.63808 13.4157 6.94745 13.4157C6.97558 13.4157 6.97558 13.4157 7.0037 13.4157C7.3412 13.3875 7.62245 13.0782 7.59433 12.7407L7.39745 10.2657C7.39745 9.90004 7.08808 9.64692 6.72245 9.67504Z"
                                                                fill="" />
                                                        </svg>
                                                    </button>
                                                    <a class="hover:text-primary" data-fancybox data-type="iframe"
                                                        href="{{ route('download.rekom.by.customerId', ['customerId' => $customer->id]) }}"
                                                        target="_blank" title="Download Surat Rekomendasi Jemaah">
                                                        <svg class="fill-current" width="18" height="18"
                                                            viewBox="0 0 18 18" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M16.8754 11.6719C16.5379 11.6719 16.2285 11.9531 16.2285 12.3187V14.8219C16.2285 15.075 16.0316 15.2719 15.7785 15.2719H2.22227C1.96914 15.2719 1.77227 15.075 1.77227 14.8219V12.3187C1.77227 11.9812 1.49102 11.6719 1.12539 11.6719C0.759766 11.6719 0.478516 11.9531 0.478516 12.3187V14.8219C0.478516 15.7781 1.23789 16.5375 2.19414 16.5375H15.7785C16.7348 16.5375 17.4941 15.7781 17.4941 14.8219V12.3187C17.5223 11.9531 17.2129 11.6719 16.8754 11.6719Z"
                                                                fill="" />
                                                            <path
                                                                d="M8.55074 12.3469C8.66324 12.4594 8.83199 12.5156 9.00074 12.5156C9.16949 12.5156 9.31012 12.4594 9.45074 12.3469L13.4726 8.43752C13.7257 8.1844 13.7257 7.79065 13.5007 7.53752C13.2476 7.2844 12.8539 7.2844 12.6007 7.5094L9.64762 10.4063V2.1094C9.64762 1.7719 9.36637 1.46252 9.00074 1.46252C8.66324 1.46252 8.35387 1.74377 8.35387 2.1094V10.4063L5.40074 7.53752C5.14762 7.2844 4.75387 7.31252 4.50074 7.53752C4.24762 7.79065 4.27574 8.1844 4.50074 8.43752L8.55074 12.3469Z"
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
                </div>

                <!-- ====== Table Three End -->
            </div>
            <!-- ====== Table Section End -->
        </div>
    </main>
@endsection

@push('scripts')
    <script>
        new DataTable('#customerTable')
    </script>
@endpush
