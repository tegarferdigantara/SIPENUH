<aside :class="sidebarToggle ? 'translate-x-0' : '-translate-x-full'"
    class="absolute left-0 top-0 z-9999 flex h-screen w-72.5 flex-col overflow-y-hidden bg-black duration-300 ease-linear dark:bg-boxdark lg:static lg:translate-x-0"
    @click.outside="sidebarToggle = false">
    <!-- SIDEBAR HEADER -->
    <div class="flex items-center justify-between gap-2 px-6 py-5.5 lg:py-6.5">
        <a href="{{ route('admin.dashboard') }}">
            <img src="{{ asset('assets/images/logo/logo.svg') }}" alt="Logo" />
        </a>

        <button class="block lg:hidden" @click.stop="sidebarToggle = !sidebarToggle">
            <svg class="fill-current" width="20" height="18" viewBox="0 0 20 18" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M19 8.175H2.98748L9.36248 1.6875C9.69998 1.35 9.69998 0.825 9.36248 0.4875C9.02498 0.15 8.49998 0.15 8.16248 0.4875L0.399976 8.3625C0.0624756 8.7 0.0624756 9.225 0.399976 9.5625L8.16248 17.4375C8.31248 17.5875 8.53748 17.7 8.76248 17.7C8.98748 17.7 9.17498 17.625 9.36248 17.475C9.69998 17.1375 9.69998 16.6125 9.36248 16.275L3.02498 9.8625H19C19.45 9.8625 19.825 9.4875 19.825 9.0375C19.825 8.55 19.45 8.175 19 8.175Z"
                    fill="" />
            </svg>
        </button>
    </div>
    <!-- SIDEBAR HEADER -->

    <div class="no-scrollbar flex flex-col overflow-y-auto duration-300 ease-linear">
        <!-- Sidebar Menu -->
        <nav class="mt-5 px-4 py-4 lg:mt-9 lg:px-6">
            <!-- Dashboard -->
            <div>
                <ul class="mb-6 flex flex-col gap-1.5">
                    <!-- Menu Item Dashboard -->
                    <div>
                        <ul>
                            <li>
                                <a class="group relative flex items-center gap-2.5 rounded-sm px-4 py-2 font-medium text-bodydark1 duration-300 ease-in-out {{ Request::routeIs('admin.dashboard') ? 'bg-graydark dark:bg-meta-4' : '' }} hover:bg-graydark dark:hover:bg-meta-4"
                                    href="{{ route('admin.dashboard') }}">
                                    <svg class="fill-current" width="18" height="18" viewBox="0 0 18 18"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M6.10322 0.956299H2.53135C1.5751 0.956299 0.787598 1.7438 0.787598 2.70005V6.27192C0.787598 7.22817 1.5751 8.01567 2.53135 8.01567H6.10322C7.05947 8.01567 7.84697 7.22817 7.84697 6.27192V2.72817C7.8751 1.7438 7.0876 0.956299 6.10322 0.956299ZM6.60947 6.30005C6.60947 6.5813 6.38447 6.8063 6.10322 6.8063H2.53135C2.2501 6.8063 2.0251 6.5813 2.0251 6.30005V2.72817C2.0251 2.44692 2.2501 2.22192 2.53135 2.22192H6.10322C6.38447 2.22192 6.60947 2.44692 6.60947 2.72817V6.30005Z"
                                            fill="" />
                                        <path
                                            d="M15.4689 0.956299H11.8971C10.9408 0.956299 10.1533 1.7438 10.1533 2.70005V6.27192C10.1533 7.22817 10.9408 8.01567 11.8971 8.01567H15.4689C16.4252 8.01567 17.2127 7.22817 17.2127 6.27192V2.72817C17.2127 1.7438 16.4252 0.956299 15.4689 0.956299ZM15.9752 6.30005C15.9752 6.5813 15.7502 6.8063 15.4689 6.8063H11.8971C11.6158 6.8063 11.3908 6.5813 11.3908 6.30005V2.72817C11.3908 2.44692 11.6158 2.22192 11.8971 2.22192H15.4689C15.7502 2.22192 15.9752 2.44692 15.9752 2.72817V6.30005Z"
                                            fill="" />
                                        <path
                                            d="M6.10322 9.92822H2.53135C1.5751 9.92822 0.787598 10.7157 0.787598 11.672V15.2438C0.787598 16.2001 1.5751 16.9876 2.53135 16.9876H6.10322C7.05947 16.9876 7.84697 16.2001 7.84697 15.2438V11.7001C7.8751 10.7157 7.0876 9.92822 6.10322 9.92822ZM6.60947 15.272C6.60947 15.5532 6.38447 15.7782 6.10322 15.7782H2.53135C2.2501 15.7782 2.0251 15.5532 2.0251 15.272V11.7001C2.0251 11.4188 2.2501 11.1938 2.53135 11.1938H6.10322C6.38447 11.1938 6.60947 11.4188 6.60947 11.7001V15.272Z"
                                            fill="" />
                                        <path
                                            d="M15.4689 9.92822H11.8971C10.9408 9.92822 10.1533 10.7157 10.1533 11.672V15.2438C10.1533 16.2001 10.9408 16.9876 11.8971 16.9876H15.4689C16.4252 16.9876 17.2127 16.2001 17.2127 15.2438V11.7001C17.2127 10.7157 16.4252 9.92822 15.4689 9.92822ZM15.9752 15.272C15.9752 15.5532 15.7502 15.7782 15.4689 15.7782H11.8971C11.6158 15.7782 11.3908 15.5532 11.3908 15.272V11.7001C11.3908 11.4188 11.6158 11.1938 11.8971 11.1938H15.4689C15.7502 11.1938 15.9752 11.4188 15.9752 11.7001V15.272Z"
                                            fill="" />
                                    </svg>
                                    Dashboard
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- Menu Item Dashboard -->
                </ul>
            </div>
            <!-- Manajemen Umrah Group -->
            <div>
                <h3 class="mb-4 ml-4 text-sm font-medium text-bodydark2">
                    MANAJEMEN UMRAH
                </h3>

                <ul class="mb-6 flex flex-col gap-1.5">

                    @role('manager')
                        <!-- Kelola Jemaah Umrah -->
                        <li x-data="{
                            isOpen: false,
                            checkIfActive() {
                                // Check if any item in the dropdown is active
                                this.isOpen = {{ request()->routeIs('admin.customer.list.all') ? 'true' : 'false' }};
                                @foreach ($umrahPackages as $umrahPackage)
                                this.isOpen = this.isOpen || {{ Request::is('admin/jemaah-umrah/' . $umrahPackage->id . '*') ? 'true' : 'false' }}; @endforeach
                            }
                        }" x-init="checkIfActive">
                            <a class="group relative flex items-center gap-2.5 rounded-sm px-4 py-2 font-medium text-bodydark1 duration-300 ease-in-out hover:bg-graydark dark:hover:bg-meta-4"
                                href="#kelola-jemaah" @click.prevent="isOpen = !isOpen"
                                :class="{ 'bg-graydark dark:bg-meta-4': isOpen }">
                                <svg class="fill-current" width="18" height="18" fill="none" version="1.1"
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
                                Kelola Jemaah Umrah
                                <svg class="absolute right-4 top-1/2 -translate-y-1/2 fill-current"
                                    :class="{ 'rotate-180': isOpen }" width="20" height="20" viewBox="0 0 20 20"
                                    fill="none" xmlns="http://www.w3.org/1999/xlink">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M4.41107 6.9107C4.73651 6.58527 5.26414 6.58527 5.58958 6.9107L10.0003 11.3214L14.4111 6.91071C14.7365 6.58527 15.2641 6.58527 15.5896 6.91071C15.915 7.23614 15.915 7.76378 15.5896 8.08922L10.5896 13.0892C10.2641 13.4147 9.73651 13.4147 9.41107 13.0892L4.41107 8.08922C4.08563 7.76378 4.08563 7.23614 4.41107 6.9107Z"
                                        fill="" />

                                </svg>
                            </a>

                            <!-- Dropdown Menu Start -->
                            <div x-show="isOpen" class="translate transform overflow-hidden block">
                                <ul class="mb-5.5 mt-4 flex flex-col gap-2.5 pl-6">
                                    <li x-data="{ isActive: '{{ route('admin.customer.list.all') === Request::url() }}' }"
                                        class="relative flex items-center gap-2.5 rounded-md px-4 font-medium text-bodydark2 duration-300 ease-in-out hover:text-white"
                                        :class="{ 'text-white': isActive }">
                                        <div class="flex items-center w-full">
                                            <a class="group relative flex-grow"
                                                href="{{ route('admin.customer.list.all') }}">
                                                <span class="inline-block">Daftar Semua Jemaah</span>
                                            </a>
                                        </div>
                                    </li>
                                    @isset($umrahPackages)
                                        @foreach ($umrahPackages as $umrahPackage)
                                            <li x-data="{ isActive: false }" x-init="isActive = [
                                                '{{ route('admin.customer.list.by.package', [$umrahPackage->id]) }}',
                                                @if (isset($customer->id)) '{{ route('admin.customer.detail.by.package', ['packageId' => $umrahPackage->id, 'customerId' => $customer->id]) }}',
                                        '{{ route('admin.customer.detail.by.package.edit', ['packageId' => $umrahPackage->id, 'customerId' => $customer->id]) }}', @endif
                                            ].includes('{{ Request::url() }}')"
                                                class="relative flex items-center gap-2.5 rounded-md px-4 font-medium text-bodydark2 duration-300 ease-in-out hover:text-white"
                                                :class="{ 'text-white': isActive }">

                                                <a href="{{ route('admin.customer.list.by.package', [$umrahPackage->id]) }}"
                                                    class="group relative flex items-center px-2 w-full">
                                                    <span class="inline-block">{{ $umrahPackage->name }}</span>

                                                    <span class="absolute right-0 top-1/2 -translate-y-1/2">
                                                        @switch($umrahPackage->status)
                                                            @case('ACTIVE')
                                                                <span
                                                                    class="block rounded bg-success px-2 py-1 text-xs font-medium text-white">Aktif</span>
                                                            @break

                                                            @case('FULL')
                                                                <span
                                                                    class="block rounded bg-warning px-2 py-1 text-xs font-medium text-white">Full</span>
                                                            @break

                                                            @default
                                                                <span
                                                                    class="block rounded bg-primary px-2 py-1 text-xs font-medium text-white">Tutup</span>
                                                        @endswitch
                                                    </span>
                                                </a>
                                            </li>
                                        @endforeach
                                    @else
                                        <li class="mb-2">
                                            <span class="block p-2">No package available</span>
                                        </li>
                                    @endisset
                                </ul>
                            </div>
                            <!-- Dropdown Menu End -->
                            <!-- Kelola Jemaah Umrah -->
                        </li>
                        <!-- Kelola Paket Umrah -->
                        <li x-data="{
                            isOpen: false,
                            checkIfActive() {
                                this.isOpen = {{ request()->routeIs('admin.package.create') ? 'true' : 'false' }};
                                // Check if any item in the dropdown is active
                                @foreach ($umrahPackages as $umrahPackage)
                                this.isOpen = this.isOpen || {{ Request::is('admin/paket-umrah/' . $umrahPackage->id . '*') ? 'true' : 'false' }}; @endforeach
                            }
                        }" x-init="checkIfActive">
                            <a class="group relative flex items-center gap-2.5 rounded-sm px-4 py-2 font-medium text-bodydark1 duration-300 ease-in-out hover:bg-graydark dark:hover:bg-meta-4"
                                href="#kelola-paket" @click.prevent="isOpen = !isOpen"
                                :class="{ 'bg-graydark dark:bg-meta-4': isOpen }">
                                <svg class="fill-current" width="18" height="18" fill="none" version="1.1"
                                    id="lni_lni-package" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 64 64"
                                    style="enable-background: new 0 0 64 64" xml:space="preserve">
                                    <path
                                        d="M62,21.3l-4.5-14c-0.8-2.6-3.3-4.4-6-4.4H13.1c-2.7,0-5.1,1.7-6,4.2l-5,14.1c-0.2,0.6-0.3,1.2-0.3,1.9v30.3
                                                                                                                                                                                                                                                                                                                                            c0,4.3,3.5,7.7,7.7,7.7h45.1c4.3,0,7.7-3.5,7.7-7.7V23C62.3,22.5,62.2,21.9,62,21.3z M53.2,8.7l3.7,11.6H34.3V7.4h17.2
                                                                                                                                                                                                                                                                                                                                            C52.2,7.4,53,7.9,53.2,8.7z M11.3,8.6c0.3-0.7,1-1.2,1.7-1.2h16.7v12.9H7.2L11.3,8.6z M54.5,56.6H9.5c-1.8,0-3.2-1.4-3.2-3.2V24.8
                                                                                                                                                                                                                                                                                                                                            h51.5v28.6C57.8,55.2,56.3,56.6,54.5,56.6z" />
                                </svg>
                                Kelola Paket Umrah
                                <svg class="absolute right-4 top-1/2 -translate-y-1/2 fill-current"
                                    :class="{ 'rotate-180': isOpen }" width="20" height="20" viewBox="0 0 20 20"
                                    fill="none" xmlns="http://www.w3.org/1999/xlink">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M4.41107 6.9107C4.73651 6.58527 5.26414 6.58527 5.58958 6.9107L10.0003 11.3214L14.4111 6.91071C14.7365 6.58527 15.2641 6.58527 15.5896 6.91071C15.915 7.23614 15.915 7.76378 15.5896 8.08922L10.5896 13.0892C10.2641 13.4147 9.73651 13.4147 9.41107 13.0892L4.41107 8.08922C4.08563 7.76378 4.08563 7.23614 4.41107 6.9107Z"
                                        fill="" />

                                </svg>
                            </a>

                            <!-- Dropdown Menu Start -->
                            <div x-show="isOpen" class="translate transform overflow-hidden block">
                                <ul class="mb-5.5 mt-4 flex flex-col gap-2.5 pl-6">
                                    <li x-data="{ isActive: '{{ route('admin.package.create') === Request::url() }}' }"
                                        class="relative flex items-center gap-2.5 rounded-md px-4 font-medium text-bodydark2 duration-300 ease-in-out hover:text-white"
                                        :class="{ 'text-white': isActive }">
                                        <div class="flex items-center w-full">
                                            <a class="group relative flex-grow"
                                                href="{{ route('admin.package.create') }}">
                                                <span class="inline-block">(+) Buat Paket Baru</span>
                                            </a>
                                        </div>
                                    </li>
                                    @isset($umrahPackages)
                                        @foreach ($umrahPackages as $umrahPackage)
                                            <li x-data="{ isActive: false }" x-init="isActive = [
                                                '{{ route('admin.package.show', [$umrahPackage->id]) }}',
                                                '{{ route('admin.package.edit', [$umrahPackage->id]) }}',
                                                '{{ route('admin.package.itinerary.create', [$umrahPackage->id]) }}',
                                                @if (isset($itinerary)) '{{ route('admin.package.itinerary.edit', ['packageId' => $umrahPackage->id, 'itineraryId' => $itinerary->id]) }}', @endif
                                            ].includes('{{ Request::url() }}')"
                                                class="relative flex items-center gap-2.5 rounded-md px-4 font-medium text-bodydark2 duration-300 ease-in-out hover:text-white"
                                                :class="{ 'text-white': isActive }">

                                                <a href="{{ route('admin.package.show', [$umrahPackage->id]) }}"
                                                    class="group relative flex items-center px-2 w-full">
                                                    <span class="inline-block">{{ $umrahPackage->name }}</span>

                                                    <span class="absolute right-0 top-1/2 -translate-y-1/2">
                                                        @switch($umrahPackage->status)
                                                            @case('ACTIVE')
                                                                <span
                                                                    class="block rounded bg-success px-2 py-1 text-xs font-medium text-white">Aktif</span>
                                                            @break

                                                            @case('FULL')
                                                                <span
                                                                    class="block rounded bg-warning px-2 py-1 text-xs font-medium text-white">Full</span>
                                                            @break

                                                            @default
                                                                <span
                                                                    class="block rounded bg-primary px-2 py-1 text-xs font-medium text-white">Tutup</span>
                                                        @endswitch
                                                    </span>
                                                </a>
                                            </li>
                                        @endforeach
                                    @else
                                        <li class="mb-2">
                                            <span class="block p-2">No packages available</span>
                                        </li>
                                    @endisset
                                </ul>
                            </div>
                            <!-- Dropdown Menu End -->
                        </li>
                    @endrole
                    {{-- kelola paket umrah --}}

                    {{-- kelola faq chatbot --}}
                    <li>
                        <a class="group relative flex items-center gap-2.5 rounded-sm px-4 py-2 font-medium text-bodydark1 duration-300 ease-in-out hover:bg-graydark dark:hover:bg-meta-4 {{ request()->is('admin/faq*') ? 'bg-graydark dark:bg-meta-4' : '' }}"
                            href="{{ route('admin.faq.list') }}">
                            <svg class="fill-current" width="18" height="18" fill="none" version="1.1"
                                id="lni_lni-package" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 64 64"
                                style="enable-background: new 0 0 64 64" xml:space="preserve">
                                <g>
                                    <path
                                        d="M32,1.8C15.3,1.8,1.8,15.3,1.8,32S15.3,62.3,32,62.3S62.3,48.7,62.3,32S48.7,1.8,32,1.8z M32,57.8
                                            C17.8,57.8,6.3,46.2,6.3,32C6.3,17.8,17.8,6.3,32,6.3c14.2,0,25.8,11.6,25.8,25.8C57.8,46.2,46.2,57.8,32,57.8z" />
                                    <path d="M33.8,12.1c-2.9-0.5-5.9,0.3-8.1,2.2c-2.2,1.9-3.5,4.6-3.5,7.6c0,1.1,0.2,2.2,0.6,3.3c0.4,1.2,1.7,1.8,2.9,1.4
                                            c1.2-0.4,1.8-1.7,1.4-2.9c-0.2-0.6-0.3-1.2-0.3-1.8c0-1.6,0.7-3.1,1.9-4.1c1.2-1,2.8-1.5,4.5-1.2c2.1,0.4,3.9,2.2,4.3,4.3
                                            c0.4,2.5-0.9,5-3.2,6c-2.6,1.1-4.3,3.7-4.3,6.7v6.2c0,1.2,1,2.3,2.3,2.3c1.2,0,2.3-1,2.3-2.3v-6.2c0-1.1,0.6-2.1,1.5-2.5
                                            c4.3-1.8,6.8-6.3,6-10.9C41,16.1,37.8,12.8,33.8,12.1z" />
                                    <path
                                        d="M32.1,45.8h-0.3c-1.2,0-2.3,1-2.3,2.3s1,2.3,2.3,2.3h0.3c1.2,0,2.2-1,2.2-2.3S33.4,45.8,32.1,45.8z" />
                                </g>
                            </svg>
                            FAQ Chatbot
                        </a>
                    </li>
                    {{-- kelola faq chatbot --}}
                </ul>
            </div>
            <!-- Manajemen Akun Group -->
            @role('admin')
                <div>
                    <h3 class="mb-4 ml-4 text-sm font-medium text-bodydark2">
                        MANAJEMEN WEBSITE
                    </h3>
                    <ul class="mb-6 flex flex-col gap-1.5">
                        <!-- Menu Item Kelola Akun -->
                        <li>
                            <a class="group relative flex items-center gap-2.5 rounded-sm px-4 py-2 font-medium text-bodydark1 duration-300 ease-in-out hover:bg-graydark dark:hover:bg-meta-4 {{ request()->is('admin/users*') ? 'bg-graydark dark:bg-meta-4' : '' }}"
                                href="{{ route('admin.users.index') }}">
                                <svg class="fill-current" width="18" height="18" fill="none" version="1.1"
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
                                Kelola Akun
                            </a>
                        </li>
                        <!-- Menu Item Kelola Akun -->
                        <!-- Menu Item Kelola Testimonial -->
                        <li>
                            <a class="group relative flex items-center gap-2.5 rounded-sm px-4 py-2 font-medium text-bodydark1 duration-300 ease-in-out hover:bg-graydark dark:hover:bg-meta-4 {{ request()->is('admin/testimoni*') ? 'bg-graydark dark:bg-meta-4' : '' }}"
                                href="{{ route('admin.testimonial.list') }}">
                                <svg fill="none" class="fill-current" width="20" height="20" version="1.1"
                                    id="lni_lni-comments-reply" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 64 64"
                                    style="enable-background:new 0 0 64 64;" xml:space="preserve">
                                    <g>
                                        <path
                                            d="M56,7.8H8c-3.4,0-6.2,2.8-6.2,6.2v37.7c0,1.6,0.9,3.1,2.4,3.8c0.6,0.3,1.2,0.4,1.8,0.4c1,0,1.9-0.3,2.7-1l8.5-7h5.1
                                                                                c1.2,0,2.3-1,2.3-2.3s-1-2.3-2.3-2.3h-5.9c-0.5,0-1,0.2-1.4,0.5l-8.6,7.1V14C6.3,13,7,12.3,8,12.3H56c0.9,0,1.7,0.8,1.7,1.7v31.7
                                                                                c0,1.2,1,2.3,2.3,2.3s2.3-1,2.3-2.3V14C62.3,10.6,59.5,7.8,56,7.8z" />
                                        <path
                                            d="M53,43.6c-2.3-2.3-5.3-3.9-8.7-4.6v-2.2c0-1.3-0.7-2.5-1.9-3c-1.2-0.6-2.5-0.4-3.6,0.4l-10.1,8.1c-0.8,0.6-1.3,1.6-1.3,2.6
                                                                                c0,1,0.5,2,1.3,2.6l10.1,8.1c0.6,0.5,1.4,0.7,2.1,0.7c0.5,0,1-0.1,1.5-0.3c1.2-0.6,1.9-1.7,1.9-3v-1.2c2.1,0.5,4.5,1.6,7.1,3.2
                                                                                c1.1,0.7,2.4,0.7,3.5,0c1.1-0.6,1.7-1.8,1.7-3.1c0-0.8-0.1-1.4-0.2-1.8C55.8,47.4,54.9,45.5,53,43.6z M43.9,47
                                                                                c-1-0.2-2,0.1-2.8,0.8c-0.8,0.7-1.2,1.6-1.2,2.7v0.1l-7.1-5.7l7.1-5.7v0.7c0,1.7,1.2,3.1,2.9,3.4c2.8,0.5,5.2,1.7,7.1,3.5
                                                                                c1,1,1.5,1.8,1.9,3C49.4,48.6,46.7,47.5,43.9,47z" />
                                        <path
                                            d="M9.6,24.9c0,3.4,2.7,6.1,6.1,6.1s6.1-2.7,6.1-6.1s-2.7-6.1-6.1-6.1S9.6,21.5,9.6,24.9z M17.4,24.9c0,0.9-0.7,1.6-1.6,1.6
                                                                                c-0.9,0-1.6-0.7-1.6-1.6c0-0.9,0.7-1.6,1.6-1.6C16.7,23.2,17.4,24,17.4,24.9z" />
                                        <path
                                            d="M32,31c3.4,0,6.1-2.7,6.1-6.1s-2.7-6.1-6.1-6.1s-6.1,2.7-6.1,6.1S28.6,31,32,31z M32,23.2c0.9,0,1.6,0.7,1.6,1.6
                                                                                c0,0.9-0.7,1.6-1.6,1.6c-0.9,0-1.6-0.7-1.6-1.6C30.4,24,31.1,23.2,32,23.2z" />
                                        <path
                                            d="M48.2,31c3.4,0,6.1-2.7,6.1-6.1s-2.7-6.1-6.1-6.1s-6.1,2.7-6.1,6.1S44.9,31,48.2,31z M48.2,23.2c0.9,0,1.6,0.7,1.6,1.6
                                                                                c0,0.9-0.7,1.6-1.6,1.6s-1.6-0.7-1.6-1.6C46.6,24,47.3,23.2,48.2,23.2z" />
                                    </g>
                                </svg>
                                Kelola Testimoni
                            </a>
                        </li>
                        <!-- Menu Item Kelola Testimonial -->
                    </ul>
                </div>
            @endrole
            <!-- Utilitas Group -->
            <div>
                <h3 class="mb-4 ml-4 text-sm font-medium text-bodydark2">UTILITAS</h3>

                <ul class="mb-6 flex flex-col gap-1.5">
                    <!-- Menu Item Riwayat Penghapusan Data Jemaah -->
                    @role('manager')
                        <li>
                            <a class="group relative flex items-center gap-2.5 rounded-sm px-4 py-2 font-medium text-bodydark1 duration-300 ease-in-out hover:bg-graydark dark:hover:bg-meta-4 {{ request()->is('admin/riwayat-penghapusan*') ? 'bg-graydark dark:bg-meta-4' : '' }}"
                                href="{{ route('admin.customer.audit.log') }}">
                                <svg class="fill-current" fill="none" width="18" height="18" version="1.1"
                                    id="lni_lni-popup" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 64 64"
                                    style="enable-background:new 0 0 64 64;" xml:space="preserve">
                                    <g>
                                        <path
                                            d="M56,5H8c-3.4,0-6.2,2.8-6.2,6.2v32.8c0,3.4,2.8,6.2,6.2,6.2h14.6l6.9,8.4C30.1,59.6,31,60,32,60s1.9-0.4,2.5-1.2l6.9-8.4
                                                                                                                                                                                H56c3.4,0,6.2-2.8,6.2-6.2V11.3C62.2,7.8,59.4,5,56,5z M57.8,44.1c0,1-0.8,1.8-1.8,1.8H41.3c-1.1,0-2.2,0.4-3,1.2
                                                                                                                                                                                c-0.1,0.1-0.1,0.1-0.2,0.2L32,54.8l-6.1-7.5c-0.1-0.1-0.1-0.1-0.2-0.2c-0.8-0.8-1.8-1.2-3-1.2H8c-1,0-1.8-0.8-1.8-1.8V11.3
                                                                                                                                                                                c0-1,0.8-1.8,1.8-1.8h48c1,0,1.8,0.8,1.8,1.8V44.1z" />
                                        <path
                                            d="M17.2,19.7h27.5c1.2,0,2.2-1,2.2-2.2s-1-2.2-2.2-2.2H17.2c-1.2,0-2.2,1-2.2,2.2S16,19.7,17.2,19.7z" />
                                        <path
                                            d="M17.2,30h19.9c1.2,0,2.2-1,2.2-2.2s-1-2.2-2.2-2.2H17.2c-1.2,0-2.2,1-2.2,2.2S16,30,17.2,30z" />
                                        <path
                                            d="M47.3,35.7H17.2c-1.2,0-2.2,1-2.2,2.2s1,2.2,2.2,2.2h30.1c1.2,0,2.2-1,2.2-2.2S48.5,35.7,47.3,35.7z" />
                                    </g>
                                </svg>
                                Riwayat Penghapusan
                            </a>
                        </li>
                    @endrole
                    <!-- Menu Item Riwayat Penghapusan Data Jemaah-->
                    <!-- Menu Item Pesan Broadcast -->
                    @role('admin')
                        <li x-data="{
                            isOpen: false,
                            checkIfActive() {
                                this.isOpen = {{ request()->routeIs('admin.package.create') ? 'true' : 'false' }};
                                // Check if any item in the dropdown is active
                                this.isOpen = this.isOpen || {{ Request::is('admin/pesan-tunggal') || Request::is('admin/pesan-siaran') ? 'true' : 'false' }};
                            }
                        }" x-init="checkIfActive">
                            <a class="group relative flex items-center gap-2.5 rounded-sm px-4 py-2 font-medium text-bodydark1 duration-300 ease-in-out hover:bg-graydark dark:hover:bg-meta-4"
                                href="#pesan-broadcast" @click.prevent="isOpen = !isOpen"
                                :class="{ 'bg-graydark dark:bg-meta-4': isOpen }">
                                <svg fill="none" class="fill-current" width="18" height="18"
                                    viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M54 9.90039C48.2 4.10039 40.3 0.900391 32.2 0.900391C15.2 0.900391 1.3 14.7004 1.3 31.7004C1.3 37.2004 2.7 42.4004 5.4 47.2004L1 63.1004L17.5 58.9004C22 61.3004 27.1 62.7004 32.3 62.7004C49.2 62.6004 63 48.8004 63 31.7004C63 23.5004 59.8 15.8004 54 9.90039ZM32.1 57.4004C27.6 57.4004 22.9 56.1004 19 53.7004L18 53.1004L8.3 55.6004L11 46.2004L10.4 45.2004C7.9 41.1004 6.5 36.3004 6.5 31.5004C6.5 17.4004 17.9 6.00039 32.1 6.00039C38.9 6.00039 45.3 8.70039 50.1 13.5004C54.9 18.3004 57.6 24.8004 57.6 31.7004C57.8 46.0004 46.2 57.4004 32.1 57.4004ZM46.2 38.2004C45.4 37.8004 41.7 35.9004 40.8 35.8004C40.1 35.5004 39.5 35.4004 39.1 36.2004C38.7 37.0004 37.1 38.6004 36.7 39.2004C36.3 39.6004 35.9 39.8004 35 39.3004C34.2 38.9004 31.8 38.2004 28.8 35.4004C26.5 33.4004 24.9 30.9004 24.6 30.0004C24.2 29.2004 24.5 28.9004 25 28.4004C25.4 28.0004 25.8 27.6004 26.1 27.0004C26.5 26.6004 26.5 26.2004 26.9 25.7004C27.3 25.3004 27 24.7004 26.8 24.3004C26.5 23.9004 25.1 20.1004 24.4 18.5004C23.8 16.9004 23.1 17.2004 22.7 17.2004C22.3 17.2004 21.7 17.2004 21.3 17.2004C20.9 17.2004 19.9 17.3004 19.3 18.2004C18.6 19.0004 16.6 20.9004 16.6 24.7004C16.6 28.5004 19.3 32.0004 19.8 32.7004C20.2 33.1004 25.3 41.0004 32.9 44.4004C34.7 45.2004 36.1 45.7004 37.3 46.1004C39.1 46.7004 40.8 46.5004 42.1 46.4004C43.6 46.3004 46.6 44.6004 47.3 42.7004C47.9 41.0004 47.9 39.3004 47.7 39.0004C47.5 38.8004 46.9 38.5004 46.2 38.2004Z" />
                                </svg>
                                Pesan WhatsApp
                                <svg class="absolute right-4 top-1/2 -translate-y-1/2 fill-current"
                                    :class="{ 'rotate-180': isOpen }" width="20" height="20" viewBox="0 0 20 20"
                                    fill="none" xmlns="http://www.w3.org/1999/xlink">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M4.41107 6.9107C4.73651 6.58527 5.26414 6.58527 5.58958 6.9107L10.0003 11.3214L14.4111 6.91071C14.7365 6.58527 15.2641 6.58527 15.5896 6.91071C15.915 7.23614 15.915 7.76378 15.5896 8.08922L10.5896 13.0892C10.2641 13.4147 9.73651 13.4147 9.41107 13.0892L4.41107 8.08922C4.08563 7.76378 4.08563 7.23614 4.41107 6.9107Z"
                                        fill="" />

                                </svg>
                            </a>

                            <!-- Dropdown Menu Start -->
                            <div x-show="isOpen" class="translate transform overflow-hidden block">
                                <ul class="mb-5.5 mt-4 flex flex-col gap-2.5 pl-6">
                                    <li x-data="{ isActive: '{{ route('admin.message.broadcast.index') === Request::url() }}' }"
                                        class="relative flex items-center gap-2.5 rounded-md px-4 font-medium text-bodydark2 duration-300 ease-in-out hover:text-white"
                                        :class="{ 'text-white': isActive }">
                                        <div class="flex items-center w-full">
                                            <a class="group relative flex-grow"
                                                href="{{ route('admin.message.broadcast.index') }}">
                                                <span class="inline-block">Pesan Siaran</span>
                                            </a>
                                        </div>
                                    </li>
                                    <li x-data="{ isActive: '{{ route('admin.message.single.index') === Request::url() }}' }"
                                        class="relative flex items-center gap-2.5 rounded-md px-4 font-medium text-bodydark2 duration-300 ease-in-out hover:text-white"
                                        :class="{ 'text-white': isActive }">
                                        <div class="flex items-center w-full">
                                            <a class="group relative flex-grow"
                                                href="{{ route('admin.message.single.index') }}">
                                                <span class="inline-block">Pesan Tunggal</span>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <!-- Dropdown Menu End -->
                        </li>
                    @endrole
                    <!-- Menu Item Pesan Broadcast-->
                </ul>
            </div>
        </nav>
        <!-- Sidebar Menu -->
    </div>
</aside>
