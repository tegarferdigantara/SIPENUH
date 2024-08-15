@extends('admin.layouts.app')

@section('content')
    <main>
        <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
            <div class="mx-auto max-w-270">
                <!-- Breadcrumb Start -->
                <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                    <h2 class="text-title-md2 font-bold text-black dark:text-white">
                        Tambah Itinerary Baru
                    </h2>
                    <nav>
                        <ol class="flex items-center gap-2">
                            <li><a class="font-medium" href="{{ route('admin.dashboard') }}">Dashboard /</a></li>
                            <li><a class="font-medium"
                                    href="{{ route('admin.package.show', $package->id) }}">{{ $package->name }} /</a>
                            </li>
                            <li class="font-medium text-primary">Tambah Itinerary</li>
                        </ol>
                    </nav>
                </div>
                <!-- Breadcrumb End -->
                <div class="grid grid-cols-5 gap-8">
                    <div class="col-span-5 xl:col-span-3">
                        <div
                            class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
                            <div class="border-b border-stroke py-4 px-6.5 dark:border-strokedark">
                                <h3 class="font-medium text-black dark:text-white">
                                    Detail Itinerary
                                </h3>
                            </div>
                            <form action="{{ route('admin.package.itinerary.store', ['packageId' => $package->id]) }}"
                                id="itineraryForm" method="POST">
                                @csrf
                                <div class="p-6.5">
                                    <div class="mb-4.5">
                                        <label class="mb-2.5 block text-black dark:text-white">
                                            Tanggal <span class="text-meta-1">*</span>
                                        </label>
                                        <div class="relative">
                                            <input
                                                class="form-datepicker w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                                                data-class="flatpickr-right" name="date" placeholder="mm/dd/yyyy" />
                                            <div
                                                class="pointer-events-none absolute inset-0 left-auto right-5 flex items-center">
                                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M15.7504 2.9812H14.2879V2.36245C14.2879 2.02495 14.0066 1.71558 13.641 1.71558C13.2754 1.71558 12.9941 1.99683 12.9941 2.36245V2.9812H4.97852V2.36245C4.97852 2.02495 4.69727 1.71558 4.33164 1.71558C3.96602 1.71558 3.68477 1.99683 3.68477 2.36245V2.9812H2.25039C1.29414 2.9812 0.478516 3.7687 0.478516 4.75308V14.5406C0.478516 15.4968 1.26602 16.3125 2.25039 16.3125H15.7504C16.7066 16.3125 17.5223 15.525 17.5223 14.5406V4.72495C17.5223 3.7687 16.7066 2.9812 15.7504 2.9812ZM1.77227 8.21245H4.16289V10.9968H1.77227V8.21245ZM5.42852 8.21245H8.38164V10.9968H5.42852V8.21245ZM8.38164 12.2625V15.0187H5.42852V12.2625H8.38164V12.2625ZM9.64727 12.2625H12.6004V15.0187H9.64727V12.2625ZM9.64727 10.9968V8.21245H12.6004V10.9968H9.64727ZM13.8379 8.21245H16.2285V10.9968H13.8379V8.21245ZM2.25039 4.24683H3.71289V4.83745C3.71289 5.17495 3.99414 5.48433 4.35977 5.48433C4.72539 5.48433 5.00664 5.20308 5.00664 4.83745V4.24683H13.0504V4.83745C13.0504 5.17495 13.3316 5.48433 13.6973 5.48433C14.0629 5.48433 14.3441 5.20308 14.3441 4.83745V4.24683H15.7504C16.0316 4.24683 16.2566 4.47183 16.2566 4.75308V6.94683H1.77227V4.75308C1.77227 4.47183 1.96914 4.24683 2.25039 4.24683ZM1.77227 14.5125V12.2343H4.16289V14.9906H2.25039C1.96914 15.0187 1.77227 14.7937 1.77227 14.5125ZM15.7504 15.0187H13.8379V12.2625H16.2285V14.5406C16.2566 14.7937 16.0316 15.0187 15.7504 15.0187Z"
                                                        fill="#64748B" />
                                                </svg>
                                            </div>
                                        </div>
                                        @error('date')
                                            <p class="text-meta-1 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-4.5">
                                        <label class="mb-2.5 block text-black dark:text-white">
                                            Judul <span class="text-meta-1">*</span>
                                        </label>
                                        <input type="text" name="title" required placeholder="Masukkan judul itinerary"
                                            class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary @error('title') border-red-500 @enderror">
                                        @error('title')
                                            <p class="text-meta-1 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-6">
                                        <label class="mb-2.5 block text-black dark:text-white">
                                            Aktivitas <span class="text-meta-1">*</span>
                                        </label>
                                        <div id="editor-container" style="height: 200px;"></div>
                                        <input type="hidden" name="activity" id="activity">
                                        @error('activity')
                                            <p class="text-meta-1 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <button type="submit"
                                        class="flex w-full justify-center rounded bg-primary p-3 font-medium text-gray">
                                        Tambah Itinerary
                                    </button>
                                </div>
                            </form>
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
                                @if ($itineraries->isEmpty())
                                    <ul class="list-disc pl-5 pb-3 space-y-2">
                                        <li class="border-b border-stroke px-2 py-3 last:border-b-0 dark:border-strokedark">
                                            <p>Itinerary tidak ditemukan</p>
                                        </li>
                                    </ul>
                                @else
                                    <ul class="list-disc pl-5 pb-3 space-y-2">
                                        @php
                                            $currentDay = null;
                                        @endphp
                                        @foreach ($itineraries as $itinerary)
                                            @php
                                                $date = \Carbon\Carbon::parse($itinerary->date);
                                                $formattedDay = $date->translatedFormat('l'); // Hari dalam bahasa Indonesia
                                                $formattedDate = $date->translatedFormat('d F Y'); // Format tanggal
                                            @endphp

                                            {{-- Tampilkan nama hari hanya jika berbeda dengan hari sebelumnya --}}
                                            @if ($formattedDay !== $currentDay)
                                                <li
                                                    class="border-b border-stroke px-2 py-3 last:border-b-0 dark:border-strokedark">
                                                    <strong>{{ $formattedDay }}, {{ $formattedDate }}</strong>
                                                </li>
                                                @php $currentDay = $formattedDay; @endphp
                                            @endif

                                            {{-- Tampilkan detail itinerary --}}
                                            <li
                                                class="border-b border-stroke px-2 py-3 last:border-b-0 dark:border-strokedark flex justify-between items-center">
                                                <div class="flex-1">
                                                    <div class="flex justify-between items-center mb-2">
                                                        <strong class="text-base font-semibold">
                                                            {{ $itinerary->title }}
                                                        </strong>
                                                        <span class="text-sm text-gray-500">
                                                            Pukul {{ $date->translatedFormat('H:i') }}
                                                        </span>
                                                    </div>
                                                    <p class="text-sm">
                                                        {!! $itinerary->activity !!}
                                                    </p>
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
                                                        id="delete-form-{{ $itinerary->id }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                    <button class="hover:text-primary" title="Delete Itinerary"
                                                        onclick="confirmDelete('delete-form-{{ $itinerary->id }}')">
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
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection


@push('scripts')
    <script>
        // Inisialisasi Quill editor
        var quill = new Quill('#editor-container', {
            theme: 'snow',
            modules: {
                toolbar: [
                    [{
                        'list': 'ordered'
                    }, {
                        'list': 'bullet'
                    }]
                ]
            }
        });

        // Saat form disubmit, salin konten dari editor ke input hidden
        var form = document.querySelector('#itineraryForm');
        form.onsubmit = function() {
            var activity = document.querySelector('input[name=activity]');
            activity.value = quill.root.innerHTML;
        };
        document.addEventListener('DOMContentLoaded', function() {
            flatpickr('.form-datepicker', {
                enableTime: true,
                dateFormat: 'Y-m-d H:i',
            });
        });
    </script>

    @include('admin.components.alerts.notification')
    @include('admin.components.alerts.confirm')
@endpush
