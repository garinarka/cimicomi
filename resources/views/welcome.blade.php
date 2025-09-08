<x-layouts.wlcm :title="__('Welcome')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <!-- Heading -->
        <div class="relative overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
            <div
                class="relative overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700 bg-white dark:bg-[#161615] dark:text-[#EDEDEC] p-4 md:p-6 lg:p-8 sm:max-h-[280px]">

                <h1 class="mb-1 font-medium text-lg">Let's get started</h1>
                <p class="mb-3 text-sm text-[#706f6c] dark:text-[#A1A09A] leading-relaxed">
                    Laravel has an incredibly rich ecosystem. <br>
                    We suggest starting with the following.
                </p>

                <ul class="flex flex-col mb-3">
                    <li
                        class="flex items-center gap-3 py-1.5 relative before:border-l before:border-[#e3e3e0] dark:before:border-[#3E3E3A] before:top-1/2 before:bottom-0 before:left-[0.4rem] before:absolute">
                        <span class="relative py-0.5 bg-white dark:bg-[#161615]">
                            <span
                                class="flex items-center justify-center rounded-full bg-[#FDFDFC] dark:bg-[#161615] shadow w-3 h-3 border dark:border-[#3E3E3A] border-[#e3e3e0]">
                                <span class="rounded-full bg-[#dbdbd7] dark:bg-[#3E3E3A] w-1 h-1"></span>
                            </span>
                        </span>
                        <span class="text-sm">
                            Read the
                            <a href="https://laravel.com/docs" target="_blank"
                                class="inline-flex items-center space-x-1 font-medium underline underline-offset-4 text-[#f53003] dark:text-[#FF4433] ms-1">
                                <span>Documentation</span>
                                <svg width="10" height="11" viewBox="0 0 10 11" fill="none"
                                    xmlns="http://www.w3.org/2000/svg" class="w-2.5 h-2.5">
                                    <path d="M7.70833 6.95834V2.79167H3.54167M2.5 8L7.5 3.00001" stroke="currentColor"
                                        stroke-linecap="square" />
                                </svg>
                            </a>
                        </span>
                    </li>

                    <li
                        class="flex items-center gap-3 py-1.5 relative before:border-l before:border-[#e3e3e0] dark:before:border-[#3E3E3A] before:bottom-1/2 before:top-0 before:start-[0.4rem] before:absolute">
                        <span class="relative py-0.5 bg-white dark:bg-[#161615]">
                            <span
                                class="flex items-center justify-center rounded-full bg-[#FDFDFC] dark:bg-[#161615] shadow w-3 h-3 border dark:border-[#3E3E3A] border-[#e3e3e0]">
                                <span class="rounded-full bg-[#dbdbd7] dark:bg-[#3E3E3A] w-1 h-1"></span>
                            </span>
                        </span>
                        <span class="text-sm">
                            Watch video tutorials at
                            <a href="https://laracasts.com" target="_blank"
                                class="inline-flex items-center space-x-1 font-medium underline underline-offset-4 text-[#f53003] dark:text-[#FF4433] ms-1">
                                <span>Laracasts</span>
                                <svg width="10" height="11" viewBox="0 0 10 11" fill="none"
                                    xmlns="http://www.w3.org/2000/svg" class="w-2.5 h-2.5">
                                    <path d="M7.70833 6.95834V2.79167H3.54167M2.5 8L7.5 3.00001" stroke="currentColor"
                                        stroke-linecap="square" />
                                </svg>
                            </a>
                        </span>
                    </li>
                </ul>

                <ul class="flex gap-3 text-sm leading-normal">
                    <li>
                        <a href="https://cloud.laravel.com" target="_blank"
                            class="inline-block dark:bg-[#eeeeec] dark:border-[#eeeeec] dark:text-[#1C1C1A] dark:hover:bg-white dark:hover:border-white hover:bg-black hover:border-black px-4 py-1.5 bg-[#1b1b18] rounded-sm border border-black text-white text-sm">
                            Deploy now
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="grid auto-rows-min gap-4 md:grid-cols-3">
            <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                <x-placeholder-pattern
                    class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" />
            </div>

            <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                <x-placeholder-pattern
                    class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" />
            </div>

            <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                <x-placeholder-pattern
                    class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" />
            </div>
        </div>
    </div>
</x-layouts.wlcm>
