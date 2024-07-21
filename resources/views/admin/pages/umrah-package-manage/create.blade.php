@extends('admin.layouts.app')

@section('content')
    <main>
        <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
            <div class="mx-auto max-w-270">
                <!-- Breadcrumb Start -->
                <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                    <h2 class="text-title-md2 font-bold text-black dark:text-white">
                        Tambah Paket Umrah Baru
                    </h2>

                    <nav>
                        <ol class="flex items-center gap-2">
                            <li>
                                <a class="font-medium" href="{{ route('admin.dashboard') }}">Dashboard /</a>
                            </li>
                            <li class="font-medium text-primary">
                                Buat Paket Umrah
                            </li>
                        </ol>
                    </nav>
                </div>
                <!-- Breadcrumb End -->

                <!-- ====== Form Section Start -->
                <div class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
                    <div class="border-b border-stroke px-6.5 py-4 dark:border-strokedark">
                        <h3 class="font-medium text-black dark:text-white">
                            Detail Paket Umrah
                        </h3>
                    </div>
                    <form action="{{ route('admin.package.store') }}" id="createUmrahForm" method="POST">
                        @csrf
                        <div class="p-6.5">
                            <div class="mb-4.5">
                                <label class="mb-2.5 block text-black dark:text-white">
                                    Nama Paket <span class="text-meta-1">*</span>
                                </label>
                                <input type="text" placeholder="Masukkan nama paket" name="name"
                                    class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary" />
                                @error('name')
                                    <p class="text-meta-1 text-sm text-black font-medium mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-4.5">
                                <label class="mb-2.5 block text-black dark:text-white">
                                    Harga <span class="text-meta-1">*</span>
                                </label>
                                <input type="number" placeholder="Masukkan harga paket" name="price"
                                    class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary" />
                                @error('price')
                                    <p class="text-meta-1 text-sm text-black font-medium mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-4.5">
                                <label class="mb-2.5 block text-black dark:text-white">
                                    Kuota <span class="text-meta-1">*</span>
                                </label>
                                <input type="number" placeholder="Masukkan kuota paket" name="quota"
                                    class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary" />
                                @error('quota')
                                    <p class="text-meta-1 text-sm text-black font-medium mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-4.5">
                                <label class="mb-2.5 block text-black dark:text-white">
                                    Deskripsi
                                </label>
                                <textarea rows="6" placeholder="Masukkan deskripsi paket" name="description"
                                    class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"></textarea>
                                @error('description')
                                    <p class="text-meta-1 text-sm text-black font-medium mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-4.5">
                                <label class="mb-2.5 block text-black dark:text-white">
                                    Tanggal Keberangkatan <span class="text-meta-1">*</span>
                                </label>
                                <div class="relative">
                                    <input
                                        class="form-datepicker w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                                        data-class="flatpickr-right" name="departure_date" placeholder="yyyy/mm/dd" />
                                    <div class="pointer-events-none absolute inset-0 left-auto right-5 flex items-center">
                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M15.7504 2.9812H14.2879V2.36245C14.2879 2.02495 14.0066 1.71558 13.641 1.71558C13.2754 1.71558 12.9941 1.99683 12.9941 2.36245V2.9812H4.97852V2.36245C4.97852 2.02495 4.69727 1.71558 4.33164 1.71558C3.96602 1.71558 3.68477 1.99683 3.68477 2.36245V2.9812H2.25039C1.29414 2.9812 0.478516 3.7687 0.478516 4.75308V14.5406C0.478516 15.4968 1.26602 16.3125 2.25039 16.3125H15.7504C16.7066 16.3125 17.5223 15.525 17.5223 14.5406V4.72495C17.5223 3.7687 16.7066 2.9812 15.7504 2.9812ZM1.77227 8.21245H4.16289V10.9968H1.77227V8.21245ZM5.42852 8.21245H8.38164V10.9968H5.42852V8.21245ZM8.38164 12.2625V15.0187H5.42852V12.2625H8.38164V12.2625ZM9.64727 12.2625H12.6004V15.0187H9.64727V12.2625ZM9.64727 10.9968V8.21245H12.6004V10.9968H9.64727ZM13.8379 8.21245H16.2285V10.9968H13.8379V8.21245ZM2.25039 4.24683H3.71289V4.83745C3.71289 5.17495 3.99414 5.48433 4.35977 5.48433C4.72539 5.48433 5.00664 5.20308 5.00664 4.83745V4.24683H13.0504V4.83745C13.0504 5.17495 13.3316 5.48433 13.6973 5.48433C14.0629 5.48433 14.3441 5.20308 14.3441 4.83745V4.24683H15.7504C16.0316 4.24683 16.2566 4.47183 16.2566 4.75308V6.94683H1.77227V4.75308C1.77227 4.47183 1.96914 4.24683 2.25039 4.24683ZM1.77227 14.5125V12.2343H4.16289V14.9906H2.25039C1.96914 15.0187 1.77227 14.7937 1.77227 14.5125ZM15.7504 15.0187H13.8379V12.2625H16.2285V14.5406C16.2566 14.7937 16.0316 15.0187 15.7504 15.0187Z"
                                                fill="#64748B" />
                                        </svg>
                                    </div>
                                </div>
                                @error('departure_date')
                                    <p class="text-meta-1 text-sm text-black font-medium mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-4.5">
                                <label class="mb-2.5 block text-black dark:text-white">
                                    Durasi (Hari) <span class="text-meta-1">*</span>
                                </label>
                                <input type="number" placeholder="Masukkan durasi paket" name="duration"
                                    class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary" />
                                @error('duration')
                                    <p class="text-meta-1 text-sm text-black font-medium mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-4.5">
                                <label class="mb-2.5 block text-black dark:text-white">
                                    Fasilitas
                                </label>
                                <div id="editor-container" style="height: 200px;"></div>
                                <input type="hidden" name="facility" id="facility">
                                @error('facility')
                                    <p class="text-meta-1 text-sm text-black font-medium mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-4.5">
                                <label class="mb-2.5 block text-black dark:text-white">
                                    Destinasi Tujuan <span class="text-meta-1">*</span>
                                </label>
                                <input type="text" placeholder="Masukkan destinasi tujuan" name="destination"
                                    class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary" />
                                @error('destination')
                                    <p class="text-meta-1 text-sm text-black font-medium mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-4.5">
                                <label class="mb-2.5 block text-black dark:text-white">
                                    Status
                                </label>
                                <select name="status"
                                    class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">
                                    <option value="ACTIVE">Aktif</option>
                                    <option value="FULL">Full</option>
                                    <option value="CLOSED">Tutup</option>
                                </select>
                                @error('status')
                                    <p class="text-meta-1 text-sm text-black font-medium mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <input type="hidden" name="user_creator_id" value="{{ auth()->user()->id }}">

                            <button type="submit"
                                class="flex w-full justify-center rounded bg-primary p-3 font-medium text-gray">
                                Tambah Paket Umrah
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
        var quill = new Quill('#editor-container', {
            theme: 'snow',
            modules: {
                toolbar: [
                    [{
                        'header': [1, 2, false]
                    }],
                    ['bold', 'italic', 'underline'],
                    ['link'], // Tidak ada opsi gambar
                    [{
                        'list': 'ordered'
                    }, {
                        'list': 'bullet'
                    }]
                ]
            }
        });

        // Saat form disubmit, salin konten dari editor ke input hidden
        var form = document.querySelector('#createUmrahForm');
        form.onsubmit = function() {
            var facility = document.querySelector('input[name=facility]');
            facility.value = quill.root.innerHTML;
        };

        document.addEventListener('DOMContentLoaded', function() {
            flatpickr('.form-datepicker', {
                dateFormat: 'Y-m-d',
            });
        });
    </script>
    @include('admin.components.alerts.notification')
    @include('admin.components.alerts.confirm')
@endpush
