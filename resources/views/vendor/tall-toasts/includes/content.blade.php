<div
        class="overflow-hidden z-50 p-3 bg-white bg-opacity-95 rounded-md shadow cursor-pointer pointer-events-auto select-none ltr:border-l-8 rtl:border-r-8 hover:bg-gray-50 dark:hover:bg-gray-900 dark:bg-black"
        x-bind:class="{
                    'border-blue-700': toast.type === 'info',
                    'border-green-700': toast.type === 'success',
                    'border-yellow-700': toast.type === 'warning',
                    'border-red-700': toast.type === 'danger'
                  }"
>
    <div class="flex justify-between items-center space-x-5 rtl:space-x-reverse">
        <div class="flex ltr:mr-2 rtl:ml-2">
            <div class="mr-2">
                @include('tall-toasts::includes.icon')
            </div>

            <div
                    class="mb-1 text-lg font-black tracking-widest text-gray-900 uppercase font-large dark:text-gray-100"
                    x-html="toast.title"
                    x-show="toast.title !== undefined"
            ></div>

            <div
                    class="text-gray-900 dark:text-gray-200"
                    x-show="toast.message !== undefined"
                    x-html="toast.message"
            ></div>
        </div>
    </div>
</div>
