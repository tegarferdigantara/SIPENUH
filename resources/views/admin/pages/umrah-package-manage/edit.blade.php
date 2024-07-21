@extends('admin.layouts.app')

@section('content')
    <main>
        <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
            <div class="mx-auto max-w-270">
                <!-- Breadcrumb Start -->
                <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                    <h2 class="text-title-md2 font-bold text-black dark:text-white">
                        Edit Paket Umrah
                    </h2>

                    <nav>
                        <ol class="flex items-center gap-2">
                            <li>
                                <a class="font-medium" href="{{ route('admin.dashboard') }}">Dashboard /</a>
                            </li>
                            <li>
                                <a class="font-medium"
                                    href="{{ route('admin.package.show', $package->id) }}">{{ $package->name }} /</a>
                            </li>
                            <li class="font-medium text-primary">
                                Edit Paket
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
                    <form action="{{ route('admin.package.update', $package->id) }}" id="updateUmrahForm" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="p-6.5">
                            <div class="mb-4.5">
                                <label class="mb-2.5 block text-black dark:text-white">
                                    Nama Paket <span class="text-meta-1">*</span>
                                </label>
                                <input type="text" placeholder="Masukkan nama paket" name="name"
                                    value="{{ old('name', $package->name) }}"
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
                                    value="{{ old('price', $package->price) }}"
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
                                    value="{{ old('quota', $package->quota) }}"
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
                                    class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">{{ old('description', $package->description) }}</textarea>
                                @error('description')
                                    <p class="text-meta-1 text-sm text-black font-medium mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-4.5">
                                <label class="mb-2.5 block text-black dark:text-white">
                                    Tanggal Keberangkatan <span class="text-meta-1">*</span>
                                </label>
                                <input
                                    class="form-datepicker w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                                    value="{{ old('departure_date', \Carbon\Carbon::parse($package->departure_date)->format('Y-m-d')) }}"
                                    data-class="flatpickr-right" name="departure_date" />
                                @error('departure_date')
                                    <p class="text-meta-1 text-sm text-black font-medium mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-4.5">
                                <label class="mb-2.5 block text-black dark:text-white">
                                    Durasi (Hari) <span class="text-meta-1">*</span>
                                </label>
                                <input type="number" placeholder="Masukkan durasi paket" name="duration"
                                    value="{{ old('duration', $package->duration) }}"
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
                                <input type="hidden" name="facility" id="facility"
                                    value="{{ old('facility', $package->facility) }}">
                                @error('facility')
                                    <p class="text-meta-1 text-sm text-black font-medium mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-4.5">
                                <label class="mb-2.5 block text-black dark:text-white">
                                    Destinasi Tujuan <span class="text-meta-1">*</span>
                                </label>
                                <input type="text" placeholder="Masukkan destinasi tujuan" name="destination"
                                    value="{{ old('destination', $package->destination) }}"
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
                                    <option value="ACTIVE"
                                        {{ old('status', $package->status) == 'ACTIVE' ? 'selected' : '' }}>Aktif
                                    </option>
                                    <option value="FULL"
                                        {{ old('status', $package->status) == 'FULL' ? 'selected' : '' }}>Full
                                    </option>
                                    <option value="CLOSED"
                                        {{ old('status', $package->status) == 'CLOSED' ? 'selected' : '' }}>Tutup
                                    </option>
                                </select>
                                @error('status')
                                    <p class="text-meta-1 text-sm text-black font-medium mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <button type="submit"
                                class="flex w-full justify-center rounded bg-primary p-3 font-medium text-gray">
                                Update Paket Umrah
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
        // Inisialisasi Quill editor
        var quill = new Quill('#editor-container', {
            theme: 'snow',
            modules: {
                toolbar: [
                    [{
                        'header': [1, 2, false]
                    }],
                    ['bold', 'italic', 'underline'],
                    ['link'],
                    [{
                        'list': 'ordered'
                    }, {
                        'list': 'bullet'
                    }]
                ]
            },
        });

        // Mengambil nilai facility dari input hidden
        var facilityInput = document.querySelector('input[name=facility]');
        var oldFacility = facilityInput.value;

        // Mengatur konten editor dengan nilai lama jika ada
        if (oldFacility) {
            quill.root.innerHTML = oldFacility;
        }

        // Saat form disubmit, salin konten dari editor ke input hidden
        var form = document.querySelector('#updateUmrahForm');
        form.onsubmit = function() {
            facilityInput.value = quill.root.innerHTML;
        };
        document.addEventListener('DOMContentLoaded', function() {
            flatpickr('.form-datepicker', {
                dateFormat: 'Y-m-d',
                defaultDate: '{{ old('departure_date', \Carbon\Carbon::parse($package->departure_date)->format('Y-m-d')) }}',
            });
        });
    </script>

    @include('admin.components.alerts.notification')
    @include('admin.components.alerts.confirm')
@endpush
