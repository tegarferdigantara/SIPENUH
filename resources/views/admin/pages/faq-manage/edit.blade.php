@extends('admin.layouts.app')

@section('content')
    <main>
        <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
            <div class="mx-auto max-w-270">
                <!-- Breadcrumb Start -->
                <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                    <h2 class="text-title-md2 font-bold text-black dark:text-white">
                        Edit FAQ: {{ $faqData->id }}
                    </h2>
                    <nav>
                        <ol class="flex items-center gap-2">
                            <li><a class="font-medium" href="{{ route('admin.dashboard') }}">Dashboard /</a></li>
                            <li><a class="font-medium" href="{{ route('admin.faq.list') }}">FAQ /</a>
                            </li>
                            <li class="font-medium text-primary">Edit</li>
                        </ol>
                    </nav>
                </div>
                <!-- Breadcrumb End -->
                <div class="grid grid-cols-5 gap-12">
                    <div class="col-span-5 xl:col-span-12">
                        <div
                            class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
                            <div class="border-b border-stroke py-4 px-6.5 dark:border-strokedark">
                                <h3 class="font-medium text-black dark:text-white">
                                    Detail FAQ
                                </h3>
                            </div>
                            <form action="{{ route('admin.faq.update', ['faqId' => $faqData->id]) }}" id="updateFaqForm"
                                method="POST">
                                @csrf
                                @method('PUT')
                                <div class="p-6.5">
                                    <div class="mb-4.5">
                                        <label class="mb-2.5 block text-black dark:text-white">
                                            Pertanyaan <span class="text-meta-1">*</span>
                                        </label>
                                        <input type="text" name="question" required
                                            value="{{ old('question', $faqData->question) }}"
                                            class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary @error('question') border-meta-1 @enderror">
                                        @error('question')
                                            <p class="text-meta-1 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-6">
                                        <label class="mb-2.5 block text-black dark:text-white">
                                            Jawaban <span class="text-meta-1">*</span>
                                        </label>
                                        <div id="editor-container" style="height: 200px;"></div>
                                        <input type="hidden" name="answer" id="answer"
                                            value="{{ old('answer', $faqData->answer) }}">
                                        @error('answer')
                                            <p class="text-meta-1 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <button type="submit"
                                        class="flex w-full justify-center rounded bg-primary p-3 font-medium text-gray">
                                        Update FAQ
                                    </button>
                                </div>
                            </form>
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
            }
        });

        // Mengambil nilai facility dari input hidden
        var answerInput = document.querySelector('input[name=answer]');
        var oldAnswer = answerInput.value;

        // Mengatur konten editor dengan nilai lama jika ada
        if (oldAnswer) {
            quill.root.innerHTML = oldAnswer;
        }

        // Saat form disubmit, salin konten dari editor ke input hidden
        var form = document.querySelector('#updateFaqForm');
        form.onsubmit = function() {
            answerInput.value = quill.root.innerHTML;
        };
    </script>

    @include('admin.components.alerts.notification')
    @include('admin.components.alerts.confirm')
@endpush
