@extends('admin.layouts.app')
@section('content')
    <main>
        <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
            <div class="grid grid-cols-1 gap-4 md:grid-cols-2 md:gap-6 xl:grid-cols-4 2xl:gap-7.5">
                <!-- Card Item Start -->
                <div
                    class="rounded-sm border border-stroke bg-white px-7.5 py-6 shadow-default dark:border-strokedark dark:bg-boxdark">
                    <div class="flex h-11.5 w-11.5 items-center justify-center rounded-full bg-meta-2 dark:bg-meta-4">
                        <svg class="fill-primary dark:fill-white" width="22" height="16" viewBox="0 0 22 16"
                            fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M11 15.1156C4.19376 15.1156 0.825012 8.61876 0.687512 8.34376C0.584387 8.13751 0.584387 7.86251 0.687512 7.65626C0.825012 7.38126 4.19376 0.918762 11 0.918762C17.8063 0.918762 21.175 7.38126 21.3125 7.65626C21.4156 7.86251 21.4156 8.13751 21.3125 8.34376C21.175 8.61876 17.8063 15.1156 11 15.1156ZM2.26876 8.00001C3.02501 9.27189 5.98126 13.5688 11 13.5688C16.0188 13.5688 18.975 9.27189 19.7313 8.00001C18.975 6.72814 16.0188 2.43126 11 2.43126C5.98126 2.43126 3.02501 6.72814 2.26876 8.00001Z"
                                fill="" />
                            <path
                                d="M11 10.9219C9.38438 10.9219 8.07812 9.61562 8.07812 8C8.07812 6.38438 9.38438 5.07812 11 5.07812C12.6156 5.07812 13.9219 6.38438 13.9219 8C13.9219 9.61562 12.6156 10.9219 11 10.9219ZM11 6.625C10.2437 6.625 9.625 7.24375 9.625 8C9.625 8.75625 10.2437 9.375 11 9.375C11.7563 9.375 12.375 8.75625 12.375 8C12.375 7.24375 11.7563 6.625 11 6.625Z"
                                fill="" />
                        </svg>
                    </div>

                    <div class="mt-4 flex items-end justify-between">
                        <div>
                            <h4 class="text-title-md font-bold text-black dark:text-white">
                                $3.456K
                            </h4>
                            <span class="text-sm font-medium">Total views</span>
                        </div>

                        <span class="flex items-center gap-1 text-sm font-medium text-meta-3">
                            0.43%
                            <svg class="fill-meta-3" width="10" height="11" viewBox="0 0 10 11" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M4.35716 2.47737L0.908974 5.82987L5.0443e-07 4.94612L5 0.0848689L10 4.94612L9.09103 5.82987L5.64284 2.47737L5.64284 10.0849L4.35716 10.0849L4.35716 2.47737Z"
                                    fill="" />
                            </svg>
                        </span>
                    </div>
                </div>
                <!-- Card Item End -->

                <!-- Card Item Start -->
                <div
                    class="rounded-sm border border-stroke bg-white px-7.5 py-6 shadow-default dark:border-strokedark dark:bg-boxdark">
                    <div class="flex h-11.5 w-11.5 items-center justify-center rounded-full bg-meta-2 dark:bg-meta-4">
                        <svg class="fill-primary dark:fill-white" width="20" height="22" viewBox="0 0 20 22"
                            fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M11.7531 16.4312C10.3781 16.4312 9.27808 17.5312 9.27808 18.9062C9.27808 20.2812 10.3781 21.3812 11.7531 21.3812C13.1281 21.3812 14.2281 20.2812 14.2281 18.9062C14.2281 17.5656 13.0937 16.4312 11.7531 16.4312ZM11.7531 19.8687C11.2375 19.8687 10.825 19.4562 10.825 18.9406C10.825 18.425 11.2375 18.0125 11.7531 18.0125C12.2687 18.0125 12.6812 18.425 12.6812 18.9406C12.6812 19.4219 12.2343 19.8687 11.7531 19.8687Z"
                                fill="" />
                            <path
                                d="M5.22183 16.4312C3.84683 16.4312 2.74683 17.5312 2.74683 18.9062C2.74683 20.2812 3.84683 21.3812 5.22183 21.3812C6.59683 21.3812 7.69683 20.2812 7.69683 18.9062C7.69683 17.5656 6.56245 16.4312 5.22183 16.4312ZM5.22183 19.8687C4.7062 19.8687 4.2937 19.4562 4.2937 18.9406C4.2937 18.425 4.7062 18.0125 5.22183 18.0125C5.73745 18.0125 6.14995 18.425 6.14995 18.9406C6.14995 19.4219 5.73745 19.8687 5.22183 19.8687Z"
                                fill="" />
                            <path
                                d="M19.0062 0.618744H17.15C16.325 0.618744 15.6031 1.23749 15.5 2.06249L14.95 6.01562H1.37185C1.0281 6.01562 0.684353 6.18749 0.443728 6.46249C0.237478 6.73749 0.134353 7.11562 0.237478 7.45937C0.237478 7.49374 0.237478 7.49374 0.237478 7.52812L2.36873 13.9562C2.50623 14.4375 2.9531 14.7812 3.46873 14.7812H12.9562C14.2281 14.7812 15.3281 13.8187 15.5 12.5469L16.9437 2.26874C16.9437 2.19999 17.0125 2.16562 17.0812 2.16562H18.9375C19.35 2.16562 19.7281 1.82187 19.7281 1.37499C19.7281 0.928119 19.4187 0.618744 19.0062 0.618744ZM14.0219 12.3062C13.9531 12.8219 13.5062 13.2 12.9906 13.2H3.7781L1.92185 7.56249H14.7094L14.0219 12.3062Z"
                                fill="" />
                        </svg>
                    </div>

                    <div class="mt-4 flex items-end justify-between">
                        <div>
                            <h4 class="text-title-md font-bold text-black dark:text-white">
                                $45,2K
                            </h4>
                            <span class="text-sm font-medium">Total Profit</span>
                        </div>

                        <span class="flex items-center gap-1 text-sm font-medium text-meta-3">
                            4.35%
                            <svg class="fill-meta-3" width="10" height="11" viewBox="0 0 10 11" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M4.35716 2.47737L0.908974 5.82987L5.0443e-07 4.94612L5 0.0848689L10 4.94612L9.09103 5.82987L5.64284 2.47737L5.64284 10.0849L4.35716 10.0849L4.35716 2.47737Z"
                                    fill="" />
                            </svg>
                        </span>
                    </div>
                </div>
                <!-- Card Item End -->

                <!-- Card Item Start -->
                <div
                    class="rounded-sm border border-stroke bg-white px-7.5 py-6 shadow-default dark:border-strokedark dark:bg-boxdark">
                    <div class="flex h-11.5 w-11.5 items-center justify-center rounded-full bg-meta-2 dark:bg-meta-4">
                        <svg class="fill-primary dark:fill-white" width="22" height="22" viewBox="0 0 22 22"
                            fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M21.1063 18.0469L19.3875 3.23126C19.2157 1.71876 17.9438 0.584381 16.3969 0.584381H5.56878C4.05628 0.584381 2.78441 1.71876 2.57816 3.23126L0.859406 18.0469C0.756281 18.9063 1.03128 19.7313 1.61566 20.3844C2.20003 21.0375 2.99066 21.3813 3.85003 21.3813H18.1157C18.975 21.3813 19.8 21.0031 20.35 20.3844C20.9 19.7656 21.2094 18.9063 21.1063 18.0469ZM19.2157 19.3531C18.9407 19.6625 18.5625 19.8344 18.15 19.8344H3.85003C3.43753 19.8344 3.05941 19.6625 2.78441 19.3531C2.50941 19.0438 2.37191 18.6313 2.44066 18.2188L4.12503 3.43751C4.19378 2.71563 4.81253 2.16563 5.56878 2.16563H16.4313C17.1532 2.16563 17.7719 2.71563 17.875 3.43751L19.5938 18.2531C19.6282 18.6656 19.4907 19.0438 19.2157 19.3531Z"
                                fill="" />
                            <path
                                d="M14.3345 5.29375C13.922 5.39688 13.647 5.80938 13.7501 6.22188C13.7845 6.42813 13.8189 6.63438 13.8189 6.80625C13.8189 8.35313 12.547 9.625 11.0001 9.625C9.45327 9.625 8.1814 8.35313 8.1814 6.80625C8.1814 6.6 8.21577 6.42813 8.25015 6.22188C8.35327 5.80938 8.07827 5.39688 7.66577 5.29375C7.25327 5.19063 6.84077 5.46563 6.73765 5.87813C6.6689 6.1875 6.63452 6.49688 6.63452 6.80625C6.63452 9.2125 8.5939 11.1719 11.0001 11.1719C13.4064 11.1719 15.3658 9.2125 15.3658 6.80625C15.3658 6.49688 15.3314 6.1875 15.2626 5.87813C15.1595 5.46563 14.747 5.225 14.3345 5.29375Z"
                                fill="" />
                        </svg>
                    </div>

                    <div class="mt-4 flex items-end justify-between">
                        <div>
                            <h4 class="text-title-md font-bold text-black dark:text-white">
                                2.450
                            </h4>
                            <span class="text-sm font-medium">Total Product</span>
                        </div>

                        <span class="flex items-center gap-1 text-sm font-medium text-meta-3">
                            2.59%
                            <svg class="fill-meta-3" width="10" height="11" viewBox="0 0 10 11" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M4.35716 2.47737L0.908974 5.82987L5.0443e-07 4.94612L5 0.0848689L10 4.94612L9.09103 5.82987L5.64284 2.47737L5.64284 10.0849L4.35716 10.0849L4.35716 2.47737Z"
                                    fill="" />
                            </svg>
                        </span>
                    </div>
                </div>
                <!-- Card Item End -->

                <!-- Card Item Start -->
                <div
                    class="rounded-sm border border-stroke bg-white px-7.5 py-6 shadow-default dark:border-strokedark dark:bg-boxdark">
                    <div class="flex h-11.5 w-11.5 items-center justify-center rounded-full bg-meta-2 dark:bg-meta-4">
                        <svg class="fill-primary dark:fill-white" width="22" height="18" viewBox="0 0 22 18"
                            fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M7.18418 8.03751C9.31543 8.03751 11.0686 6.35313 11.0686 4.25626C11.0686 2.15938 9.31543 0.475006 7.18418 0.475006C5.05293 0.475006 3.2998 2.15938 3.2998 4.25626C3.2998 6.35313 5.05293 8.03751 7.18418 8.03751ZM7.18418 2.05626C8.45605 2.05626 9.52168 3.05313 9.52168 4.29063C9.52168 5.52813 8.49043 6.52501 7.18418 6.52501C5.87793 6.52501 4.84668 5.52813 4.84668 4.29063C4.84668 3.05313 5.9123 2.05626 7.18418 2.05626Z"
                                fill="" />
                            <path
                                d="M15.8124 9.6875C17.6687 9.6875 19.1468 8.24375 19.1468 6.42188C19.1468 4.6 17.6343 3.15625 15.8124 3.15625C13.9905 3.15625 12.478 4.6 12.478 6.42188C12.478 8.24375 13.9905 9.6875 15.8124 9.6875ZM15.8124 4.7375C16.8093 4.7375 17.5999 5.49375 17.5999 6.45625C17.5999 7.41875 16.8093 8.175 15.8124 8.175C14.8155 8.175 14.0249 7.41875 14.0249 6.45625C14.0249 5.49375 14.8155 4.7375 15.8124 4.7375Z"
                                fill="" />
                            <path
                                d="M15.9843 10.0313H15.6749C14.6437 10.0313 13.6468 10.3406 12.7874 10.8563C11.8593 9.61876 10.3812 8.79376 8.73115 8.79376H5.67178C2.85303 8.82814 0.618652 11.0625 0.618652 13.8469V16.3219C0.618652 16.975 1.13428 17.4906 1.7874 17.4906H20.2468C20.8999 17.4906 21.4499 16.9406 21.4499 16.2875V15.4625C21.4155 12.4719 18.9749 10.0313 15.9843 10.0313ZM2.16553 15.9438V13.8469C2.16553 11.9219 3.74678 10.3406 5.67178 10.3406H8.73115C10.6562 10.3406 12.2374 11.9219 12.2374 13.8469V15.9438H2.16553V15.9438ZM19.8687 15.9438H13.7499V13.8469C13.7499 13.2969 13.6468 12.7469 13.4749 12.2313C14.0937 11.7844 14.8499 11.5781 15.6405 11.5781H15.9499C18.0812 11.5781 19.8343 13.3313 19.8343 15.4625V15.9438H19.8687Z"
                                fill="" />
                        </svg>
                    </div>

                    <div class="mt-4 flex items-end justify-between">
                        <div>
                            <h4 class="text-title-md font-bold text-black dark:text-white">
                                3.456
                            </h4>
                            <span class="text-sm font-medium">Total Users</span>
                        </div>

                        <span class="flex items-center gap-1 text-sm font-medium text-meta-5">
                            0.95%
                            <svg class="fill-meta-5" width="10" height="11" viewBox="0 0 10 11" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M5.64284 7.69237L9.09102 4.33987L10 5.22362L5 10.0849L-8.98488e-07 5.22362L0.908973 4.33987L4.35716 7.69237L4.35716 0.0848701L5.64284 0.0848704L5.64284 7.69237Z"
                                    fill="" />
                            </svg>
                        </span>
                    </div>
                </div>
                <!-- Card Item End -->
            </div>

            <div class="mt-4 grid grid-cols-12 gap-4 md:mt-6 md:gap-6 2xl:mt-7.5 2xl:gap-7.5">
                <!-- ====== Chart One Start -->
                <div
                    class="col-span-12 border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark xl:col-span-8">
                    <div class="px-4 py-6 md:px-6 xl:px-7.5">
                        <h4 class="text-xl font-bold text-black dark:text-white">Top Products</h4>
                    </div>

                    <div
                        class="grid grid-cols-6 border-t border-stroke px-4 py-4.5 dark:border-strokedark sm:grid-cols-8 md:px-6 2xl:px-7.5">
                        <div class="col-span-3 flex items-center">
                            <p class="font-medium">Product Name</p>
                        </div>
                        <div class="col-span-2 hidden items-center sm:flex">
                            <p class="font-medium">Category</p>
                        </div>
                        <div class="col-span-1 flex items-center">
                            <p class="font-medium">Price</p>
                        </div>
                        <div class="col-span-1 flex items-center">
                            <p class="font-medium">Status</p>
                        </div>
                        <div class="col-span-1 flex items-center">
                            <p class="font-medium">Actions</p>
                        </div>
                    </div>

                    <div
                        class="grid grid-cols-6 border-t border-stroke px-4 py-4.5 dark:border-strokedark sm:grid-cols-8 md:px-6 2xl:px-7.5">
                        <div class="col-span-3 flex items-center">
                            <div class="flex flex-col gap-4 sm:flex-row sm:items-center">
                                <div class="h-12.5 w-15 rounded-md">
                                    <img src="src/images/product/product-01.png" alt="Product" />
                                </div>
                                <p class="text-sm font-medium text-black dark:text-white">
                                    Apple Watch Series 7
                                </p>
                            </div>
                        </div>
                        <div class="col-span-2 hidden items-center sm:flex">
                            <p class="text-sm font-medium text-black dark:text-white">Electronics</p>
                        </div>
                        <div class="col-span-1 flex items-center">
                            <p class="text-sm font-medium text-black dark:text-white">$269</p>
                        </div>
                        <div class="col-span-1 flex items-center">
                            <p class="text-sm font-medium text-black dark:text-white">22</p>
                        </div>
                        <div class="col-span-1 flex items-center">
                            <div class="flex items-center space-x-3.5">
                                <button class="hover:text-primary">
                                    <svg class="fill-current" width="18" height="18" viewBox="0 0 18 18"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M8.99981 14.8219C3.43106 14.8219 0.674805 9.50624 0.562305 9.28124C0.47793 9.11249 0.47793 8.88749 0.562305 8.71874C0.674805 8.49374 3.43106 3.20624 8.99981 3.20624C14.5686 3.20624 17.3248 8.49374 17.4373 8.71874C17.5217 8.88749 17.5217 9.11249 17.4373 9.28124C17.3248 9.50624 14.5686 14.8219 8.99981 14.8219ZM1.85605 8.99999C2.4748 10.0406 4.89356 13.5562 8.99981 13.5562C13.1061 13.5562 15.5248 10.0406 16.1436 8.99999C15.5248 7.95936 13.1061 4.44374 8.99981 4.44374C4.89356 4.44374 2.4748 7.95936 1.85605 8.99999Z"
                                            fill="" />
                                        <path
                                            d="M9 11.3906C7.67812 11.3906 6.60938 10.3219 6.60938 9C6.60938 7.67813 7.67812 6.60938 9 6.60938C10.3219 6.60938 11.3906 7.67813 11.3906 9C11.3906 10.3219 10.3219 11.3906 9 11.3906ZM9 7.875C8.38125 7.875 7.875 8.38125 7.875 9C7.875 9.61875 8.38125 10.125 9 10.125C9.61875 10.125 10.125 9.61875 10.125 9C10.125 8.38125 9.61875 7.875 9 7.875Z"
                                            fill="" />
                                    </svg>
                                </button>
                                <button class="hover:text-primary">
                                    <svg class="fill-current" width="18" height="18" viewBox="0 0 18 18"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
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
                                <button class="hover:text-primary">
                                    <svg class="fill-current" width="18" height="18" viewBox="0 0 18 18"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M16.8754 11.6719C16.5379 11.6719 16.2285 11.9531 16.2285 12.3187V14.8219C16.2285 15.075 16.0316 15.2719 15.7785 15.2719H2.22227C1.96914 15.2719 1.77227 15.075 1.77227 14.8219V12.3187C1.77227 11.9812 1.49102 11.6719 1.12539 11.6719C0.759766 11.6719 0.478516 11.9531 0.478516 12.3187V14.8219C0.478516 15.7781 1.23789 16.5375 2.19414 16.5375H15.7785C16.7348 16.5375 17.4941 15.7781 17.4941 14.8219V12.3187C17.5223 11.9531 17.2129 11.6719 16.8754 11.6719Z"
                                            fill="" />
                                        <path
                                            d="M8.55074 12.3469C8.66324 12.4594 8.83199 12.5156 9.00074 12.5156C9.16949 12.5156 9.31012 12.4594 9.45074 12.3469L13.4726 8.43752C13.7257 8.1844 13.7257 7.79065 13.5007 7.53752C13.2476 7.2844 12.8539 7.2844 12.6007 7.5094L9.64762 10.4063V2.1094C9.64762 1.7719 9.36637 1.46252 9.00074 1.46252C8.66324 1.46252 8.35387 1.74377 8.35387 2.1094V10.4063L5.40074 7.53752C5.14762 7.2844 4.75387 7.31252 4.50074 7.53752C4.24762 7.79065 4.27574 8.1844 4.50074 8.43752L8.55074 12.3469Z"
                                            fill="" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div
                        class="grid grid-cols-6 border-t border-stroke px-4 py-4.5 dark:border-strokedark sm:grid-cols-8 md:px-6 2xl:px-7.5">
                        <div class="col-span-3 flex items-center">
                            <div class="flex flex-col gap-4 sm:flex-row sm:items-center">
                                <div class="h-12.5 w-15 rounded-md">
                                    <img src="src/images/product/product-02.png" alt="Product" />
                                </div>
                                <p class="text-sm font-medium text-black dark:text-white">
                                    Macbook Pro M1
                                </p>
                            </div>
                        </div>
                        <div class="col-span-2 hidden items-center sm:flex">
                            <p class="text-sm font-medium text-black dark:text-white">Electronics</p>
                        </div>
                        <div class="col-span-1 flex items-center">
                            <p class="text-sm font-medium text-black dark:text-white">$546</p>
                        </div>
                        <div class="col-span-1 flex items-center">
                            <p class="text-sm font-medium text-black dark:text-white">34</p>
                        </div>
                        <div class="col-span-1 flex items-center">
                            <p class="text-sm font-medium text-meta-3">$125</p>
                        </div>
                    </div>
                    <div
                        class="grid grid-cols-6 border-t border-stroke px-4 py-4.5 dark:border-strokedark sm:grid-cols-8 md:px-6 2xl:px-7.5">
                        <div class="col-span-3 flex items-center">
                            <div class="flex flex-col gap-4 sm:flex-row sm:items-center">
                                <div class="h-12.5 w-15 rounded-md">
                                    <img src="src/images/product/product-03.png" alt="Product" />
                                </div>
                                <p class="text-sm font-medium text-black dark:text-white">
                                    Dell Inspiron 15
                                </p>
                            </div>
                        </div>
                        <div class="col-span-2 hidden items-center sm:flex">
                            <p class="text-sm font-medium text-black dark:text-white">Electronics</p>
                        </div>
                        <div class="col-span-1 flex items-center">
                            <p class="text-sm font-medium text-black dark:text-white">$443</p>
                        </div>
                        <div class="col-span-1 flex items-center">
                            <p class="text-sm font-medium text-black dark:text-white">64</p>
                        </div>
                        <div class="col-span-1 flex items-center">
                            <p class="text-sm font-medium text-meta-3">$247</p>
                        </div>
                    </div>
                    <div
                        class="grid grid-cols-6 border-t border-stroke px-4 py-4.5 dark:border-strokedark sm:grid-cols-8 md:px-6 2xl:px-7.5">
                        <div class="col-span-3 flex items-center">
                            <div class="flex flex-col gap-4 sm:flex-row sm:items-center">
                                <div class="h-12.5 w-15 rounded-md">
                                    <img src="src/images/product/product-04.png" alt="Product" />
                                </div>
                                <p class="text-sm font-medium text-black dark:text-white">
                                    HP Probook 450
                                </p>
                            </div>
                        </div>
                        <div class="col-span-2 hidden items-center sm:flex">
                            <p class="text-sm font-medium text-black dark:text-white">Electronics</p>
                        </div>
                        <div class="col-span-1 flex items-center">
                            <p class="text-sm font-medium text-black dark:text-white">$499</p>
                        </div>
                        <div class="col-span-1 flex items-center">
                            <p class="text-sm font-medium text-black dark:text-white">72</p>
                        </div>
                        <div class="col-span-1 flex items-center">
                            <p class="text-sm font-medium text-meta-3">$103</p>
                        </div>
                    </div>
                </div>

                <!-- ====== Chart One End -->

                <!-- ====== Chart Two Start -->
                <div
                    class="col-span-12 rounded-sm border border-stroke bg-white p-7.5 shadow-default dark:border-strokedark dark:bg-boxdark xl:col-span-4">
                    <div class="mb-4 justify-between gap-4 sm:flex">
                        <div>
                            <h4 class="text-xl font-bold text-black dark:text-white">
                                Profit this week
                            </h4>
                        </div>
                        <div>
                            <div class="relative z-20 inline-block">
                                <select name="#" id="#"
                                    class="relative z-20 inline-flex appearance-none bg-transparent py-1 pl-3 pr-8 text-sm font-medium outline-none">
                                    <option value="">This Week</option>
                                    <option value="">Last Week</option>
                                </select>
                                <span class="absolute right-3 top-1/2 z-10 -translate-y-1/2">
                                    <svg width="10" height="6" viewBox="0 0 10 6" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M0.47072 1.08816C0.47072 1.02932 0.500141 0.955772 0.54427 0.911642C0.647241 0.808672 0.809051 0.808672 0.912022 0.896932L4.85431 4.60386C4.92785 4.67741 5.06025 4.67741 5.14851 4.60386L9.09079 0.896932C9.19376 0.793962 9.35557 0.808672 9.45854 0.911642C9.56151 1.01461 9.5468 1.17642 9.44383 1.27939L5.50155 4.98632C5.22206 5.23639 4.78076 5.23639 4.51598 4.98632L0.558981 1.27939C0.50014 1.22055 0.47072 1.16171 0.47072 1.08816Z"
                                            fill="#637381" />
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M1.22659 0.546578L5.00141 4.09604L8.76422 0.557869C9.08459 0.244537 9.54201 0.329403 9.79139 0.578788C10.112 0.899434 10.0277 1.36122 9.77668 1.61224L9.76644 1.62248L5.81552 5.33722C5.36257 5.74249 4.6445 5.7544 4.19352 5.32924C4.19327 5.32901 4.19377 5.32948 4.19352 5.32924L0.225953 1.61241C0.102762 1.48922 -4.20186e-08 1.31674 -3.20269e-08 1.08816C-2.40601e-08 0.905899 0.0780105 0.712197 0.211421 0.578787C0.494701 0.295506 0.935574 0.297138 1.21836 0.539529L1.22659 0.546578ZM4.51598 4.98632C4.78076 5.23639 5.22206 5.23639 5.50155 4.98632L9.44383 1.27939C9.5468 1.17642 9.56151 1.01461 9.45854 0.911642C9.35557 0.808672 9.19376 0.793962 9.09079 0.896932L5.14851 4.60386C5.06025 4.67741 4.92785 4.67741 4.85431 4.60386L0.912022 0.896932C0.809051 0.808672 0.647241 0.808672 0.54427 0.911642C0.500141 0.955772 0.47072 1.02932 0.47072 1.08816C0.47072 1.16171 0.50014 1.22055 0.558981 1.27939L4.51598 4.98632Z"
                                            fill="#637381" />
                                    </svg>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div>
                        <div id="chartTwo" class="-mb-9 -ml-5"></div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
