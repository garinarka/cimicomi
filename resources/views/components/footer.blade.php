<footer class="w-full pt-6 text-center">
    <p class="text-sm text-gray-600 dark:text-gray-400">
        &copy; {{ date('Y') }} <a href="#"
            class="inline-flex items-center space-x-1 font-medium underline underline-offset-2 text-[#f53003] dark:text-[#FF4433] ms-1"
            data-popover-target="popover-image">
            <span>CimiComi</span>
        </a>. Built with &#x2764;&#xFE0F; using Laravel & TailwindCSS.
    </p>
    <div data-popover id="popover-image" role="tooltip"
        class="absolute z-10 invisible inline-block text-sm text-gray-500 transition-opacity duration-300 bg-white dark:bg-[#161615] dark:text-[#EDEDEC] border border-gray-200 rounded-lg shadow-xs opacity-0 w-96 dark:border-gray-600">
        <div class="max-w-2xl mx-auto bg-white dark:bg-[#161615] rounded-lg border border-gray-200 dark:border-neutral-700 shadow-sm"
            data-repo="garinarka/cimicomi" data-github-token="">
            <div class="flex items-center justify-between p-6">
                <!-- Repo Info -->
                <div>
                    <a id="repo-link" href="#" target="_blank"
                        class="text-sm text-gray-500 dark:text-gray-400 block">
                        <span id="repo-owner">loading/</span>
                        <span id="repo-name"
                            class="text-xl font-semibold text-gray-900 dark:text-white">Loading...</span>
                    </a>
                    <p id="repo-desc" class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                        Fetching description...
                    </p>
                </div>

                <!-- Logo -->
                <div class="flex-shrink-0">
                    <div id="repo-logo"
                        class="w-16 h-16 flex items-center justify-center rounded-lg bg-red-600 text-white text-2xl font-bold">
                        --
                    </div>
                </div>
            </div>

            <!-- Stats -->
            <div
                class="flex items-center justify-between border-t border-gray-200 dark:border-neutral-700 px-6 py-4 text-sm text-gray-600 dark:text-gray-400">
                <div class="flex items-center gap-6">
                    <div class="flex items-center gap-1">
                        <span id="contributors" class="text-gray-900 dark:text-white">0</span>
                        <span>Contributors</span>
                    </div>
                    <div class="flex items-center gap-1">
                        <span id="issues" class="text-gray-900 dark:text-white">0</span>
                        <span>Issues</span>
                    </div>
                    <div class="flex items-center gap-1">
                        <span id="stars" class="text-gray-900 dark:text-white">0</span>
                        <span>Stars</span>
                    </div>
                    <div class="flex items-center gap-1">
                        <span id="forks" class="text-gray-900 dark:text-white">0</span>
                        <span>Forks</span>
                    </div>
                </div>
            </div>
        </div>
        <div data-popper-arrow></div>
    </div>
</footer>
