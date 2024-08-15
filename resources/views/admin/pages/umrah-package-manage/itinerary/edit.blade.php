@extends('admin.layouts.app')

@section('content')
    <main>
        <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
            <div class="mx-auto max-w-270">
                <!-- Breadcrumb Start -->
                <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                    <h2 class="text-title-md2 font-bold text-black dark:text-white">
                        Edit Itinerary
                    </h2>
                    <nav>
                        <ol class="flex items-center gap-2">
                            <li><a class="font-medium" href="{{ route('admin.dashboard') }}">Dashboard /</a></li>
                            <li><a class="font-medium"
                                    href="{{ route('admin.package.show', $package->id) }}">{{ $package->name }}
                                    /</a>
                            </li>
                            <li class="font-medium text-primary">Edit Itinerary</li>
                        </ol>
                    </nav>
                </div>
                <!-- Breadcrumb End -->

                <div class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
                    <div class="border-b border-stroke py-4 px-6.5 dark:border-strokedark">
                        <h3 class="font-medium text-black dark:text-white">
                            Detail Itinerary
                        </h3>
                    </div>
                    <form
                        action="{{ route('admin.package.itinerary.update', ['packageId' => $package->id, 'itineraryId' => $itinerary->id]) }}"
                        id="updateItineraryForm" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="p-6.5">
                            <div class="mb-4.5">
                                <label class="mb-2.5 block text-black dark:text-white">
                                    Tanggal <span class="text-meta-1">*</span>
                                </label>
                                <div class="relative">
                                    <input
                                        class="form-datepicker w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                                        value="{{ old('date', \Carbon\Carbon::parse($itinerary->date)->format('Y-m-d')) }}"
                                        data-class="flatpickr-right" name="date" />
                                    <div class="pointer-events-none absolute inset-0 left-auto right-5 flex items-center">
                                        <svg class="fill-current" width="18" height="18" viewBox="0 0 18 18"
                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M9.0002 12.8249C8.83145 12.8249 8.69082 12.7687 8.5502 12.6562L2.08145 6.2999C1.82832 6.04678 1.82832 5.65303 2.08145 5.3999C2.33457 5.14678 2.72832 5.14678 2.98145 5.3999L9.0002 11.278L15.0189 5.34365C15.2721 5.09053 15.6658 5.09053 15.9189 5.34365C16.1721 5.59678 16.1721 5.99053 15.9189 6.24365L9.45019 12.5999C9.30957 12.7405 9.16895 12.8249 9.0002 12.8249Z"
                                                fill="#64748B" />
                                        </svg>
                                    </div>
                                </div>
                                @error('date')
                                    <p class="text-meta-1 text-sm text-black font-medium mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-4.5">
                                <label class="mb-2.5 block text-black dark:text-white">
                                    Judul <span class="text-meta-1">*</span>
                                </label>
                                <input type="text" name="title" required placeholder="Masukkan judul itinerary"
                                    value="{{ old('title', $itinerary->title) }}"
                                    class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">
                                @error('title')
                                    <p class="text-meta-1 text-sm text-black font-medium mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-4.5">
                                <label class="mb-2.5 block text-black dark:text-white">
                                    Aktivitas
                                </label>
                                <div id="editor-container" style="height: 200px;"></div>
                                <input type="hidden" name="activity" id="activity"
                                    value="{{ old('activity', $itinerary->activity) }}">
                                @error('activity')
                                    <p class="text-meta-1 text-sm text-black font-medium mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <button class="flex w-full justify-center rounded bg-primary p-3 font-medium text-gray">
                                Update Itinerary
                            </button>
                        </div>
                    </form>
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

        // Mengambil nilai activity dari input hidden
        var activityInput = document.querySelector('input[name=activity]');
        var oldActivity = activityInput.value;

        // Mengatur konten editor dengan nilai lama jika ada
        if (oldActivity) {
            quill.root.innerHTML = oldActivity;
        }

        // Saat form disubmit, salin konten dari editor ke input hidden
        var form = document.querySelector('#updateItineraryForm');
        form.onsubmit = function() {
            activityInput.value = quill.root.innerHTML;
        };

        document.addEventListener('DOMContentLoaded', function() {
            flatpickr('.form-datepicker', {
                enableTime: true,
                dateFormat: 'Y-m-d H:i',
                defaultDate: '{{ old('date', \Carbon\Carbon::parse($itinerary->date)->format('Y-m-d H:i')) }}',
            });
        });
    </script>
    @include('admin.components.alerts.notification')
    @include('admin.components.alerts.confirm')
@endpush
