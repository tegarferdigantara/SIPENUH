@extends('admin.layouts.app')

@section('content')
    <main>
        <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
            <div class="mx-auto max-w-270">
                <!-- Breadcrumb Start -->
                <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                    <h2 class="text-title-md2 font-bold text-black dark:text-white">
                        {{ $package->name }}
                    </h2>

                    <nav>
                        <ol class="flex items-center gap-2">
                            <li>
                                <a class="font-medium" href="{{ route('admin.dashboard') }}">Dashboard /</a>
                            </li>
                            <li class="font-medium text-primary">
                                {{ $package->name }}
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
                                    Detail
                                </h3>
                                @if ($package->status === 'ACTIVE')
                                    <span
                                        class="block rounded bg-success px-2 py-1 text-xs font-medium text-white">Aktif</span>
                                @elseif ($package->status === 'FULL')
                                    <span
                                        class="block rounded bg-warning px-2 py-1 text-xs font-medium text-white">Full</span>
                                @else
                                    <span
                                        class="block rounded bg-primary px-2 py-1 text-xs font-medium text-white">Tutup</span>
                                @endif
                            </div>

                            <div class="p-7">
                                <div class="relative mb-5.5">
                                    <div class="mb-5.5">
                                        <label class="mb-3 block text-sm font-medium text-black dark:text-white"
                                            for="name">Nama Paket</label>
                                        <div class="relative">
                                            <input
                                                class="w-full rounded border border-stroke bg-gray px-4.5 py-3 font-medium text-black focus:border-primary focus-visible:outline-none dark:border-strokedark dark:bg-meta-4 dark:text-white dark:focus:border-primary"
                                                type="text" name="name" id="name" value="{{ $package->name }}"
                                                readonly disabled />
                                        </div>
                                    </div>
                                    <label class="mb-3 block text-sm font-medium text-black dark:text-white" for="id">
                                        Kode Paket
                                    </label>
                                    <div class="relative">
                                        <input
                                            class="w-full rounded border border-stroke bg-gray px-4.5 py-3 pr-20 font-medium text-black focus:border-primary focus-visible:outline-none dark:border-strokedark dark:bg-meta-4 dark:text-white dark:focus:border-primary"
                                            type="text" id="id" value="{{ $package->id }}" readonly disabled />
                                    </div>
                                </div>
                                <div class="relative mb-5.5">
                                    <label class="mb-3 block text-sm font-medium text-black dark:text-white" for="price">
                                        Harga Paket
                                    </label>
                                    <div class="relative">
                                        <input
                                            class="w-full rounded border border-stroke bg-gray px-4.5 py-3 pr-20 font-medium text-black focus:border-primary focus-visible:outline-none dark:border-strokedark dark:bg-meta-4 dark:text-white dark:focus:border-primary"
                                            type="text" id="price" value="@currency($package->price)" readonly disabled />
                                    </div>
                                </div>
                                <div class="relative mb-5.5">
                                    <label class="mb-3 block text-sm font-medium text-black dark:text-white" for="quota">
                                        Kuota Tersisa
                                    </label>
                                    <div class="relative">
                                        <input
                                            class="w-full rounded border border-stroke bg-gray px-4.5 py-3 pr-20 font-medium text-black focus:border-primary focus-visible:outline-none dark:border-strokedark dark:bg-meta-4 dark:text-white dark:focus:border-primary"
                                            type="text" id="quota" value="{{ $package->quota }}" readonly disabled />
                                    </div>
                                </div>
                                <div class="mb-5.5">
                                    <label class="mb-3 block text-sm font-medium text-black dark:text-white"
                                        for="description">Deskripsi</label>
                                    <textarea rows="6" disabled id="description"
                                        class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary dark:disabled:bg-black">{{ $package->description }}</textarea>
                                </div>
                                <div class="mb-5.5 flex flex-col gap-5.5 sm:flex-row">
                                    <div class="w-full sm:w-1/2">
                                        <label class="mb-3 block text-sm font-medium text-black dark:text-white"
                                            for="departure_date">Tanggal Keberangkatan</label>

                                        <input
                                            class="w-full rounded border border-stroke bg-gray px-4.5 py-3 font-medium text-black focus:border-primary focus-visible:outline-none dark:border-strokedark dark:bg-meta-4 dark:text-white dark:focus:border-primary"
                                            type="text" name="departure_date" id="departure_date"
                                            value="{{ $formattedDate }}" readonly disabled />
                                    </div>

                                    <div class="w-full sm:w-1/2">
                                        <label class="mb-3 block text-sm font-medium text-black dark:text-white"
                                            for="duration">Durasi</label>
                                        <input
                                            class="w-full rounded border border-stroke bg-gray px-4.5 py-3 font-medium text-black focus:border-primary focus-visible:outline-none dark:border-strokedark dark:bg-meta-4 dark:text-white dark:focus:border-primary"
                                            type="text" name="duration" id="duration"
                                            value="{{ $package->duration }} Hari" readonly disabled />
                                    </div>
                                </div>
                                <div class="mb-5.5">
                                    <label class="mb-3 block text-sm font-medium text-black dark:text-white"
                                        for="facility">Fasilitas</label>
                                    <div id="facility"
                                        class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary dark:disabled:bg-black">
                                        {!! $package->facility !!}
                                    </div>
                                </div>
                                <div class="mb-5.5">
                                    <label class="mb-3 block text-sm font-medium text-black dark:text-white"
                                        for="destination">Destinasi Tujuan</label>
                                    <div class="relative">
                                        <input
                                            class="w-full rounded border border-stroke bg-gray px-4.5 py-3 font-medium text-black focus:border-primary focus-visible:outline-none dark:border-strokedark dark:bg-meta-4 dark:text-white dark:focus:border-primary"
                                            type="text" name="destination" id="destination"
                                            value="{{ $package->destination }}" readonly disabled />

                                    </div>
                                </div>
                                <div class="mb-5.5">
                                    <label class="mb-3 block text-sm font-medium text-black dark:text-white"
                                        for="user_creator_id">Pembuat Paket</label>
                                    <input
                                        class="w-full rounded border border-stroke bg-gray px-4.5 py-3 font-medium text-black focus:border-primary focus-visible:outline-none dark:border-strokedark dark:bg-meta-4 dark:text-white dark:focus:border-primary"
                                        type="text" name="user_creator_id" id="user_creator_id"
                                        value="{{ $package->userCreator->name }}" readonly disabled />
                                </div>
                                <div class="mb-5.5">
                                    <label class="mb-3 block text-sm font-medium text-black dark:text-white"
                                        for="created_at">Tanggal Pembuatan Paket</label>
                                    <input
                                        class="w-full rounded border border-stroke bg-gray px-4.5 py-3 font-medium text-black focus:border-primary focus-visible:outline-none dark:border-strokedark dark:bg-meta-4 dark:text-white dark:focus:border-primary"
                                        type="text" name="created_at" id="created_at"
                                        value="{{ \Carbon\Carbon::parse($package->created_at)->translatedFormat('l, d F Y H:i') }}"
                                        readonly disabled />
                                </div>
                                <div class="mb-5.5">
                                    <label class="mb-3 block text-sm font-medium text-black dark:text-white"
                                        for="updated_at">Tanggal Paket di Update</label>
                                    <input
                                        class="w-full rounded border border-stroke bg-gray px-4.5 py-3 font-medium text-black focus:border-primary focus-visible:outline-none dark:border-strokedark dark:bg-meta-4 dark:text-white dark:focus:border-primary"
                                        type="text" name="updated_at" id="updated_at"
                                        value="{{ \Carbon\Carbon::parse($package->updated_at)->translatedFormat('l, d F Y H:i') }}"
                                        readonly disabled />
                                </div>
                                <div class="flex justify-end gap-4.5">
                                    <a class="flex justify-center rounded bg-primary px-6 py-2 font-medium text-white hover:bg-opacity-90"
                                        href="{{ route('admin.package.edit', ['packageId' => $package->id]) }}">
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
                                        Edit Paket Umrah
                                    </a>
                                    <form id="delete-form" action="#" method="POST" style="display: none;">
                                        @csrf
                                        @method('Delete')
                                    </form>
                                    @if ($package->customers()->count() == 0)
                                        <button
                                            class="flex justify-center rounded bg-meta-1 px-6 py-2 font-medium text-white hover:bg-opacity-90"
                                            href="{{ route('admin.package.destroy', ['packageId' => $package->id]) }}"
                                            onclick="confirmDelete()">
                                            <span>
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
                                            </span>
                                            Hapus Paket Umrah
                                        </button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-5 xl:col-span-2">
                        <div
                            class="rounded-sm border border-stroke bg-white shadow-default mb-4 dark:border-strokedark dark:bg-boxdark">
                            <div class="border-b border-stroke px-5 py-4 dark:border-strokedark">
                                <h3 class="font-medium text-black dark:text-white">
                                    Itinerary Perjalanan
                                </h3>
                            </div>
                            <div class="p-4">
                                <ul class="list-disc pl-5 pb-3 space-y-2">
                                    @php
                                        $currentDay = null;
                                    @endphp
                                    @forelse ($itineraries as $itinerary)
                                        @php
                                            $date = \Carbon\Carbon::parse($itinerary->date);
                                            $formattedDay = $date->translatedFormat('l'); // Hari dalam bahasa Inggris
                                            $formattedDateItinerary = $date->translatedFormat('d F Y'); // Format tanggal
                                        @endphp

                                        {{-- Tampilkan nama hari hanya jika berbeda dengan hari sebelumnya --}}
                                        @if ($formattedDay !== $currentDay)
                                            <li
                                                class="border-b border-stroke px-2 py-3 last:border-b-0 dark:border-strokedark">
                                                <strong>{{ $formattedDay }}, {{ $formattedDateItinerary }}</strong>
                                            </li>
                                            @php $currentDay = $formattedDay; @endphp
                                        @endif

                                        {{-- Tampilkan detail itinerary --}}
                                        <li
                                            class="border-b border-stroke px-2 py-3 last:border-b-0 dark:border-strokedark flex justify-between items-center">
                                            <div>
                                                <strong>{{ $itinerary->title }}</strong>
                                                <p>{!! $itinerary->activity !!}</p>
                                            </div>
                                            <div class="flex items-center space-x-2">
                                                <a class="hover:text-primary"
                                                    href="{{ route('admin.package.itinerary.edit', ['packageId' => $package->id, 'itineraryId' => $itinerary->id]) }}"
                                                    title="Edit Itinerary">
                                                    <svg class="fill-current" width="18" height="18"
                                                        fill="none" version="1.1" id="lni_lni-pencil-alt"
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

                                                <form
                                                    action="{{ route('admin.package.itinerary.destroy', ['packageId' => $package->id, 'itineraryId' => $itinerary->id]) }}"
                                                    id="delete-itinerary-form" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                                <button class="hover:text-primary" title="Delete Itinerary"
                                                    onclick="confirmDeleteItinerary()">
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
                                            </div>
                                        </li>
                                    @empty
                                        <ul class="list-disc pl-5 pb-3 space-y-2">
                                            <li
                                                class="border-b border-stroke px-2 py-3 last:border-b-0 dark:border-strokedark">
                                                <p>Itinerary tidak ditemukan</p>
                                            </li>
                                        </ul>
                                    @endforelse
                                </ul>
                                <div class="flex px-2 py-3 justify-end gap-2.5">
                                    <a class="flex justify-center rounded bg-primary px-6 py-2 font-medium text-white hover:bg-opacity-90"
                                        href="{{ route('admin.package.itinerary.create', ['packageId' => $package->id]) }}">
                                        <span>
                                            <svg fill="none" class="fill-current mr-2" width="20" height="20"
                                                version="1.1" id="lni_lni-circle-plus"
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                viewBox="0 0 64 64" style="enable-background:new 0 0 64 64;"
                                                xml:space="preserve">
                                                <g>
                                                    <path
                                                        d="M42.2,29.7C42.2,29.7,42.2,29.7,42.2,29.7l-8,0l0-7.9c0-1.2-1-2.2-2.3-2.2c0,0,0,0,0,0c-1.2,0-2.2,1-2.2,2.3l0,7.9l-7.9,0
                                                                                                                                                                            c-1.2,0-2.2,1-2.2,2.3c0,1.2,1,2.2,2.3,2.2c0,0,0,0,0,0l7.9,0l0,7.9c0,1.2,1,2.2,2.3,2.2c0,0,0,0,0,0c1.2,0,2.2-1,2.2-2.3l0-7.9
                                                                                                                                                                            l7.9,0c1.2,0,2.2-1,2.2-2.3C44.4,30.7,43.4,29.7,42.2,29.7z" />
                                                    <path
                                                        d="M32,1.8C15.3,1.8,1.8,15.3,1.8,32c0,16.7,13.6,30.3,30.3,30.3c16.7,0,30.3-13.6,30.3-30.3C62.3,15.3,48.7,1.8,32,1.8z
                                                                                                                                                                             M32,57.8C17.8,57.8,6.3,46.2,6.3,32S17.8,6.3,32,6.3S57.8,17.8,57.8,32S46.2,57.8,32,57.8z" />
                                                </g>
                                            </svg>

                                        </span>
                                        Tambah
                                    </a>
                                </div>
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
    @include('admin.components.alerts.notification')
    @include('admin.components.alerts.confirm')
@endpush
