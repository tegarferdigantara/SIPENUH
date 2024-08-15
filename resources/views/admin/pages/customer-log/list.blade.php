@extends('admin.layouts.app')

@section('content')
    <main>
        <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
            <!-- Breadcrumb Start -->
            <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                <h2 class="text-title-md2 font-bold text-black dark:text-white">
                    Riwayat Penghapusan Data Jemaah
                </h2>

                <nav>
                    <ol class="flex items-center gap-2">
                        <li>
                            <a class="font-medium" href="{{ route('admin.dashboard') }}">Dashboard /</a>
                        </li>
                        <li class="font-medium text-primary">
                            Riwayat Penghapusan Data Jemaah
                        </li>
                    </ol>
                </nav>
            </div>
            <!-- Breadcrumb End -->

            <!-- ====== Table Section Start -->
            <div class="flex flex-col gap-10">
                <div
                    class="rounded-sm border border-stroke bg-white px-5 pb-2.5 pt-6 shadow-default dark:border-strokedark dark:bg-boxdark sm:px-7.5 xl:pb-1">
                    <div class="max-w-full overflow-x-auto">
                        @if ($logs->isEmpty())
                            <p>No logs found.</p>
                        @else
                            <table class="display min-w-full divide-y divide-gray-200" id="customerAuditLog">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="min-w-[220px] px-4 py-4 font-medium text-black dark:text-white xl:pl-11">
                                            Nama Lengkap</th>
                                        <th class="px-4 py-4 font-medium text-black dark:text-white">
                                            Nomor WhatsApp Penghapus</th>
                                        <th class="px-4 py-4 font-medium text-black dark:text-white">
                                            Aksi</th>
                                        <th class="px-4 py-4 font-medium text-black dark:text-white">
                                            Nama Paket Sebelumnya</th>
                                        <th class="px-4 py-4 font-medium text-black dark:text-white">
                                            Data Sebelumnya</th>
                                        <th class="px-4 py-4 font-medium text-black dark:text-white">
                                            Tanggal Penghapusan</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($logs as $log)
                                        <tr class="bg-gray-2 text-left dark:bg-meta-4">
                                            <td class="px-4 py-4 font-medium text-black dark:text-white">
                                                {{ $log->full_name }}</td>
                                            <td class="px-4 py-4 font-medium text-black dark:text-white">
                                                {{ $log->whatsapp_number }}</td>
                                            <td class="px-4 py-4 font-medium text-black dark:text-white">
                                                {{ $log->action }}</td>
                                            <td class="px-4 py-4 font-medium text-black dark:text-white">
                                                {{ $log->umrahPackage->name }}</td>
                                            <td class="px-4 py-4 font-medium text-black dark:text-white">
                                                @php
                                                    $oldData = json_decode($log->old_data, true);
                                                @endphp

                                                @if ($log->old_data)
                                                    <pre>{{ print_r($oldData, true) }}</pre>
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            <td class="px-4 py-4 font-medium text-black dark:text-white">
                                                {{ $log->created_at->format('Y-m-d H:i:s') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@push('scripts')
    <script>
        new DataTable('#customerAuditLog', {
            searchable: true,
            sortable: true,
            perPage: 10,
            perPageSelect: [5, 10, 20, 50, 100],
        });
    </script>
@endpush
