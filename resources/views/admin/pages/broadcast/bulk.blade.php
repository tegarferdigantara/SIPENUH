@extends('admin.layouts.app')

@section('content')
    <main>
        <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
            <div class="mx-auto max-w-270">
                <!-- Breadcrumb Start -->
                <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                    <h2 class="text-title-md2 font-bold text-black dark:text-white">
                        Pesan Broadcast
                    </h2>

                    <nav>
                        <ol class="flex items-center gap-2">
                            <li>
                                <a class="font-medium" href="{{ route('admin.dashboard') }}">Dashboard /</a>
                            </li>
                            <li class="font-medium text-primary">
                                Pesan Broadcast
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
                    <form action="{{ route('admin.broadcast.broadcast') }}" method="POST">
                        @csrf
                        <div class="p-6.5">
                            <div class="mb-4.5">
                                <label class="mb-2.5 block text-black dark:text-white">
                                    Target Pesan
                                </label>
                                <div x-data="{ isOptionSelected: false }" class="relative z-20 bg-white dark:bg-form-input">
                                    <select
                                        class="relative z-20 w-full appearance-none rounded border border-stroke bg-transparent py-3 pl-5 pr-12 outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input"
                                        :class="isOptionSelected && 'text-black dark:text-white'"
                                        @change="isOptionSelected = true" name="umrah_package_id" required>
                                        @foreach ($umrahPackages as $package)
                                            <option value="{{ $package->id }}" class="text-body">{{ $package->name }}
                                            </option>
                                        @endforeach
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
                                    @error('umrah_package_id')
                                        <p class="text-meta-1 text-sm text-black font-medium mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4.5">
                                <label class="mb-2.5 block text-black dark:text-white">
                                    Pesan
                                </label>
                                <textarea rows="6" placeholder="Masukkan pesan" name="message"
                                    class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">{{ old('message') }}</textarea>
                                @error('message')
                                    <p class="text-meta-1 text-sm text-black font-medium mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-4.5">
                                <label class="mb-2.5 block text-black dark:text-white">
                                    Delay <span class="text-meta-1">*</span>
                                </label>
                                <input type="number" placeholder="Masukkan delay waktu pengiriman pesan" name="delay"
                                    class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                                    value="{{ old('delay') }}" required />
                                @error('delay')
                                    <p class="text-meta-1 text-sm text-black font-medium mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <button type="submit"
                                class="flex w-full justify-center rounded bg-primary p-3 font-medium text-gray">
                                Kirim Pesan
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
    @include('admin.components.alerts.confirm')
    @include('admin.components.alerts.notification')
@endpush
