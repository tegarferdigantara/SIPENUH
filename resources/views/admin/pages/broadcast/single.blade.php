@extends('admin.layouts.app')

@section('content')
    <main>
        <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
            <div class="mx-auto max-w-270">
                <!-- Breadcrumb Start -->
                <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                    <h2 class="text-title-md2 font-bold text-black dark:text-white">
                        Pesan WhatsApp - Tunggal
                    </h2>

                    <nav>
                        <ol class="flex items-center gap-2">
                            <li>
                                <a class="font-medium" href="{{ route('admin.dashboard') }}">Dashboard /</a>
                            </li>
                            <li class="font-medium text-primary">
                                Pesan Tunggal
                            </li>
                        </ol>
                    </nav>
                </div>
                <!-- Breadcrumb End -->

                <!-- ====== Form Section Start -->
                <div class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
                    <div class="border-b border-stroke px-6.5 py-4 dark:border-strokedark">
                        <h3 class="font-medium text-black dark:text-white">
                            Detail
                        </h3>
                    </div>
                    <form action="{{ route('admin.message.single.store') }}" method="POST">
                        @csrf
                        <div class="p-6.5">
                            <div class="mb-4.5">
                                <label class="mb-2.5 block text-black dark:text-white">
                                    Target Pesan (1 Jemaah) <span class="text-meta-1">*</span>
                                </label>
                                <div x-data="{ isOptionSelected: false }" class="relative z-20 bg-white dark:bg-form-input">
                                    <select autofocus
                                        class="relative z-20 w-full appearance-none rounded border border-stroke bg-transparent py-3 pl-5 pr-12 outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input"
                                        :class="isOptionSelected && 'text-black dark:text-white'"
                                        @change="isOptionSelected = true" name="whatsapp_number" required>
                                        @forelse ($customers as $customer)
                                            <option value="{{ $customer->whatsapp_number }}" class="text-body">
                                                {{ $customer->full_name }} (Jemaah {{ $customer->umrahPackage->name }})
                                            </option>
                                        @empty
                                            <option value="" class="text-body">Tidak ada jemaah</option>
                                        @endforelse
                                    </select>
                                    <span class="absolute right-4 top-1/2 z-20 -translate-y-1/2">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g opacity="0.8">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M5.29289 8.29289C5.68342 7.90237 6.31658 7.90237 6.70711 8.29289L12 13.5858L17.2929 8.29289C17.6834 7.90237 18.3166 7.90237 18.7071 8.29289C19.0976 8.68342 19.0976 9.31658 18.7071 9.70711L12.7071 15.7071C12.3166 16.0976 11.6834 16.0976 11.2929 15.7071L5.29289 9.70711C4.90237 9.31658 4.90237 8.68342 5.29289 8.29289Z"
                                                    fill="#637381"></path>
                                            </g>
                                        </svg>
                                    </span>
                                    @error('whatsapp_number')
                                        <p class="text-meta-1 text-sm text-black font-medium mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4.5">
                                <label class="mb-2.5 block text-black dark:text-white">
                                    Pesan <span class="text-meta-1">*</span>
                                </label>
                                <textarea rows="10" placeholder="Masukkan pesan" name="message" required
                                    class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">{{ old('message') }}</textarea>
                                @error('message')
                                    <p class="text-meta-1 text-sm text-black font-medium mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-4.5">
                                <label class="mb-2.5 block text-black dark:text-white">
                                    Delay Pengiriman Pesan (Detik) <span class="text-meta-1">*</span>
                                </label>
                                <input type="number" placeholder="Masukkan delay waktu pengiriman pesan" name="delay"
                                    class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                                    value="{{ old('delay', 15) }}" min="15" required />
                                @error('delay')
                                    <p class="text-meta-1 text-sm text-black font-medium mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <form id="messageForm">
                                <!-- Form fields here -->
                                <button id="sendMessageButton" type="button"
                                    class="flex w-full justify-center rounded bg-primary p-3 font-medium text-gray">
                                    Kirim Pesan
                                </button>
                            </form>

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
        document.addEventListener('DOMContentLoaded', function() {
            var sendMessageButton = document.getElementById('sendMessageButton');
            var form = sendMessageButton.closest('form');

            sendMessageButton.addEventListener('click', function(event) {
                event.preventDefault();

                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: 'Apakah anda yakin ingin mengirim pesan ini?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    </script>
    @include('admin.components.alerts.notification')
@endpush
