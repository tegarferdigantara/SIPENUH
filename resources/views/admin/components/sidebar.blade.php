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
        <nav class="mt-5 px-4 py-4 lg:mt-9 lg:px-6" x-data="{ selected: $persist('Dashboard') }">
            <!-- Dashboard -->
            <div>
                <ul class="mb-6 flex flex-col gap-1.5">
                    <!-- Menu Item Dashboard -->
                    <div>
                        <ul>
                            <li>
                                <a class="group relative flex items-center gap-2.5 rounded-sm px-4 py-2 font-medium text-bodydark1 duration-300 ease-in-out{{ Request::routeIs('admin.dashboard') ? 'bg-graydark dark:bg-meta-4' : '' }} hover:bg-graydark dark:hover:bg-meta-4"
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
                                    <path d="M31.9,18.4c4.2,0,7.5-3.4,7.5-7.5s-3.4-7.5-7.5-7.5s-7.5,3.4-7.5,7.5S27.7,18.4,31.9,18.4z M31.9,7.8c1.7,0,3,1.4,3,3
                                        s-1.4,3-3,3s-3-1.4-3-3S30.2,7.8,31.9,7.8z" />
                                    <path
                                        d="M23.6,28.5c2.1-2.3,5.2-3.7,8.4-3.7c3.2,0,6.3,1.3,8.4,3.7c0.4,0.5,1,0.7,1.7,0.7c0.5,0,1.1-0.2,1.5-0.6
                                        c0.9-0.8,1-2.3,0.1-3.2c-3-3.2-7.3-5.1-11.7-5.1s-8.7,1.9-11.7,5.1c-0.8,0.9-0.8,2.3,0.1,3.2C21.3,29.5,22.7,29.4,23.6,28.5z" />
                                    <path d="M13.4,50.1c4.2,0,7.5-3.4,7.5-7.5c0-4.2-3.4-7.5-7.5-7.5s-7.5,3.4-7.5,7.5C5.8,46.8,9.2,50.1,13.4,50.1z M13.4,39.5
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
                                        <li x-data="{ isActive: false }" x-init="let routes = [
                                            '{{ route('admin.customer.list.by.package', [$umrahPackage->id]) }}'
                                        ];
                                        @if (isset($customer->id)) routes.push('{{ route('admin.customer.detail.by.package', ['packageId' => $umrahPackage->id, 'customerId' => $customer->id]) }}');
                                            routes.push('{{ route('admin.customer.detail.by.package.edit', ['packageId' => $umrahPackage->id, 'customerId' => $customer->id]) }}'); @endif
                                        isActive = routes.includes('{{ Request::url() }}');"
                                            class="relative flex items-center gap-2.5 rounded-md px-4 font-medium text-bodydark2 duration-300 ease-in-out hover:text-white"
                                            :class="{ 'text-white': isActive }">
                                            <div class="flex items-center w-full">
                                                <a class="group relative flex-grow"
                                                    href="{{ route('admin.customer.list.by.package', [$umrahPackage->id]) }}">
                                                    <span class="inline-block">{{ $umrahPackage->name }}
                                                    </span>
                                                </a>
                                                <span class="absolute right-0 top-1/2 -translate-y-1/2">
                                                    @if ($umrahPackage->status === 'ACTIVE')
                                                        <span
                                                            class="block rounded bg-success px-2 py-1 text-xs font-medium text-white">Aktif</span>
                                                    @elseif ($umrahPackage->status === 'FULL')
                                                        <span
                                                            class="block rounded bg-warning px-2 py-1 text-xs font-medium text-white">Full</span>
                                                    @else
                                                        <span
                                                            class="block rounded bg-primary px-2 py-1 text-xs font-medium text-white">Tutup</span>
                                                    @endif
                                                </span>
                                            </div>
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
                    <!-- Kelola Jemaah Umrah -->
                    <li x-data="{
                        isOpen: false,
                        checkIfActive() {
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
                                <path d="M62,21.3l-4.5-14c-0.8-2.6-3.3-4.4-6-4.4H13.1c-2.7,0-5.1,1.7-6,4.2l-5,14.1c-0.2,0.6-0.3,1.2-0.3,1.9v30.3
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
                                @isset($umrahPackages)
                                    @foreach ($umrahPackages as $umrahPackage)
                                        <li x-data="{ isActive: false }" x-init="isActive = '{{ route('admin.package.show', [$umrahPackage->id]) === Request::url() }}'"
                                            class="relative flex items-center gap-2.5 rounded-md px-4 font-medium text-bodydark2 duration-300 ease-in-out hover:text-white"
                                            :class="{ 'text-white': isActive }">
                                            <div class="flex items-center w-full">
                                                <a class="group relative flex-grow"
                                                    href="{{ route('admin.package.show', [$umrahPackage->id]) }}">
                                                    <span class="inline-block">{{ $umrahPackage->name }}</span>
                                                </a>
                                                <span class="absolute right-0 top-1/2 -translate-y-1/2">
                                                    @if ($umrahPackage->status === 'ACTIVE')
                                                        <span
                                                            class="block rounded bg-success px-2 py-1 text-xs font-medium text-white">Aktif</span>
                                                    @elseif ($umrahPackage->status === 'FULL')
                                                        <span
                                                            class="block rounded bg-warning px-2 py-1 text-xs font-medium text-white">Full</span>
                                                    @else
                                                        <span
                                                            class="block rounded bg-primary px-2 py-1 text-xs font-medium text-white">Tutup</span>
                                                    @endif
                                                </span>
                                            </div>
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
                    <!-- Menu Item Dashboard -->
                    <li>
                        <a class="group relative flex items-center gap-2.5 rounded-sm px-4 py-2 font-medium text-bodydark1 duration-300 ease-in-out hover:bg-graydark dark:hover:bg-meta-4"
                            href="index.html" @click="selected = (selected === 'FAQ Chatbot' ? '':'FAQ Chatbot')"
                            :class="{ 'bg-graydark dark:bg-meta-4': (selected === 'FAQ Chatbot') }">
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
                    <!-- Menu Item Dashboard -->
                </ul>
            </div>
            <!-- Manajemen Akun Group -->
            <div>
                <h3 class="mb-4 ml-4 text-sm font-medium text-bodydark2">
                    MANAJEMEN AKUN
                </h3>

                <ul class="mb-6 flex flex-col gap-1.5">
                    <!-- Menu Item Kelola Akun -->
                    <li>
                        <a class="group relative flex items-center gap-2.5 rounded-sm px-4 py-2 font-medium text-bodydark1 duration-300 ease-in-out hover:bg-graydark dark:hover:bg-meta-4"
                            href="#" @click.prevent="selected = (selected === 'Kelola Akun' ? '':'Kelola Akun')"
                            :class="{
                                'bg-graydark dark:bg-meta-4': (selected === 'Kelola Akun') || (
                                    page === 'formElements' || page === 'formLayout')
                            }">
                            <svg class="fill-current" width="18" height="18" fill="none" version="1.1"
                                id="lni_lni-package" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 64 64"
                                style="enable-background: new 0 0 64 64" xml:space="preserve">
                                <g>
                                    <path d="M31.9,18.4c4.2,0,7.5-3.4,7.5-7.5s-3.4-7.5-7.5-7.5s-7.5,3.4-7.5,7.5S27.7,18.4,31.9,18.4z M31.9,7.8c1.7,0,3,1.4,3,3
                                    s-1.4,3-3,3s-3-1.4-3-3S30.2,7.8,31.9,7.8z" />
                                    <path
                                        d="M23.6,28.5c2.1-2.3,5.2-3.7,8.4-3.7c3.2,0,6.3,1.3,8.4,3.7c0.4,0.5,1,0.7,1.7,0.7c0.5,0,1.1-0.2,1.5-0.6
                                    c0.9-0.8,1-2.3,0.1-3.2c-3-3.2-7.3-5.1-11.7-5.1s-8.7,1.9-11.7,5.1c-0.8,0.9-0.8,2.3,0.1,3.2C21.3,29.5,22.7,29.4,23.6,28.5z" />
                                    <path d="M13.4,50.1c4.2,0,7.5-3.4,7.5-7.5c0-4.2-3.4-7.5-7.5-7.5s-7.5,3.4-7.5,7.5C5.8,46.8,9.2,50.1,13.4,50.1z M13.4,39.5
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

                            <svg class="absolute right-4 top-1/2 -translate-y-1/2 fill-current"
                                :class="{ 'rotate-180': (selected === 'Forms') }" width="20" height="20"
                                viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M4.41107 6.9107C4.73651 6.58527 5.26414 6.58527 5.58958 6.9107L10.0003 11.3214L14.4111 6.91071C14.7365 6.58527 15.2641 6.58527 15.5896 6.91071C15.915 7.23614 15.915 7.76378 15.5896 8.08922L10.5896 13.0892C10.2641 13.4147 9.73651 13.4147 9.41107 13.0892L4.41107 8.08922C4.08563 7.76378 4.08563 7.23614 4.41107 6.9107Z"
                                    fill="" />
                            </svg>
                        </a>

                        <!-- Dropdown Menu Start -->
                        <div class="translate transform overflow-hidden"
                            :class="(selected === 'Kelola Akun') ? 'block' : 'hidden'">
                            <ul class="mb-5.5 mt-4 flex flex-col gap-2.5 pl-6">
                                <li>
                                    <a class="group relative flex items-center gap-2.5 rounded-md px-4 font-medium text-bodydark2 duration-300 ease-in-out hover:text-white"
                                        href="form-elements.html"
                                        :class="page === 'formElements' && '!text-white'">Form
                                        Elements
                                        <span
                                            class="absolute right-4 block rounded bg-primary px-2 py-1 text-xs font-medium text-white">Pro</span></a>
                                </li>
                                <li>
                                    <a class="group relative flex items-center gap-2.5 rounded-md px-4 font-medium text-bodydark2 duration-300 ease-in-out hover:text-white"
                                        href="form-layout.html" :class="page === 'formLayout' && '!text-white'">Umrah
                                        Spesial Ramadhan
                                        2024
                                        <span
                                            class="right-4 rounded bg-primary px-2 py-1 text-xs font-medium text-white">Pro</span></a>
                                </li>
                            </ul>
                        </div>
                        <!-- Dropdown Menu End -->
                    </li>
                    <!-- Menu Item Kelola Akun -->
                </ul>
            </div>
            <!-- Utilitas Group -->
            <div>
                <h3 class="mb-4 ml-4 text-sm font-medium text-bodydark2">UTILITAS</h3>

                <ul class="mb-6 flex flex-col gap-1.5">
                    <!-- Menu Item Pesan Broadcast -->
                    <li>
                        <a class="group relative flex items-center gap-2.5 rounded-sm px-4 py-2 font-medium text-bodydark1 duration-300 ease-in-out hover:bg-graydark dark:hover:bg-meta-4"
                            href="calendar.html" @click="selected = (selected === 'Calendar' ? '':'Calendar')"
                            :class="{
                                'bg-graydark dark:bg-meta-4': (selected === 'Calendar') && (
                                    page === 'calendar')
                            }">
                            <svg class="fill-current" width="18" height="18" fill="none" version="1.1"
                                id="lni_lni-package" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 64 64"
                                style="enable-background: new 0 0 64 64" xml:space="preserve">
                                <path d="M55.9,1.8h-8.1c-3.2,0-5.9,2.4-6.2,5.5L17.2,9.7H8.1c-3.4,0-6.2,2.7-6.2,6v16.5c0,2.3,1.4,4.4,3.4,5.4l3.5,19.3
                                c0.7,3.1,3.6,5.4,6.9,5.4c2.2,0,4.3-1,5.7-2.7c1.2-1.5,1.7-3.4,1.3-5.2l-2.7-15.6L41.5,43c0.2,3.3,2.9,5.9,6.2,5.9h8.1
                                c3.4,0,6.3-2.8,6.3-6.3V8C62.1,4.6,59.3,1.8,55.9,1.8z M19.6,14l21.9-2.2v26.6l-21.9-4.3V14z M6.4,15.7c0-0.7,0.7-1.5,1.7-1.5h7
                                v19.5h-7c-0.9,0-1.7-0.7-1.7-1.5V15.7z M17.9,56.8c-0.5,0.6-1.3,1-2.2,1c-1.2,0-2.3-0.8-2.5-1.7L10,38.2h5.3l2.9,17l0,0.1
                                C18.4,56,18.1,56.5,17.9,56.8z M57.6,42.6c0,1-0.8,1.8-1.8,1.8h-8.1c-1,0-1.8-0.8-1.8-1.8V8c0-1,0.8-1.8,1.8-1.8h8.1
                                c1,0,1.8,0.8,1.8,1.8V42.6z" />
                            </svg>

                            Pesan Broadcast
                        </a>
                    </li>
                    <!-- Menu Item Pesan Broadcast-->
                </ul>
            </div>
        </nav>
        <!-- Sidebar Menu -->
    </div>
</aside>
