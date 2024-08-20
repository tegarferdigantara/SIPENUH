@extends('admin.layouts.app')

@section('content')
    <main>
        <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
            <div class="mx-auto max-w-270">
                <!-- Breadcrumb Start -->
                <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                    <h2 class="text-title-md2 font-bold text-black dark:text-white">
                        Kelola Testimoni - Tambah Testimoni
                    </h2>
                    <nav>
                        <ol class="flex items-center gap-2">
                            <li>
                                <a class="font-medium" href="{{ route('admin.dashboard') }}">Dashboard /</a>
                            </li>
                            <li>
                                <a class="font-medium" href="{{ route('admin.testimonial.list') }}">Daftar Testimoni /</a>
                            </li>
                            <li class="font-medium text-primary">
                                Tambah Testimoni
                            </li>
                        </ol>
                    </nav>
                </div>
                <!-- Breadcrumb End -->

                <!-- ====== Form Section Start -->
                <div class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
                    <div class="border-b border-stroke px-6.5 py-4 dark:border-strokedark">
                        <h3 class="font-medium text-black dark:text-white">
                            Detail Testimoni
                        </h3>
                    </div>
                    <form action="{{ route('admin.testimonial.store') }}" method="POST">
                        @csrf
                        <div class="p-6.5">
                            <div class="mb-4.5">
                                <label class="mb-2.5 block text-black dark:text-white
                                "
                                    for="customer_id">
                                    Nama Jemaah <span class="text-meta-1">*</span>
                                </label>

                                <select name="customer_id" id="customer_id" required
                                    class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">
                                    @foreach ($customers as $customer)
                                        <option value="{{ $customer->id }}">
                                            {{ mb_convert_case($customer->full_name, MB_CASE_TITLE, 'UTF-8') }} (Jemaah
                                            {{ $customer->umrahPackage->name }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-4.5">
                                <label class="mb-2.5 block text-black dark:text-white" for="review">
                                    Ulasan <span class="text-meta-1">*</span>
                                </label>
                                <textarea type="text" placeholder="Ulasan" name="review" value="{{ old('review') }}" rows="10" required
                                    class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"></textarea>
                                @error('review')
                                    <p class="text-meta-1 text-sm text-black font-medium mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-4.5">
                                <label class="mb-2.5 block text-black dark:text-white" for="rating">
                                    Rating (Maksimal 5) <span class="text-meta-1">*</span>
                                </label>
                                <input type="number" name="rating" value="{{ old('rating', 1) }}" min="1"
                                    max="5"
                                    class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary" />
                                @error('rating')
                                    <p class="text-meta-1 text-sm text-black font-medium mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <button type="submit"
                                class="flex w-full justify-center rounded bg-primary p-3 font-medium text-gray">
                                Tambah Testimoni
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
    @include('admin.components.alerts.notification')
    @include('admin.components.alerts.confirm')
@endpush
