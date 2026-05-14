<div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left">
            <thead
                class="bg-gray-50/80 text-gray-500 uppercase font-bold text-xs border-b border-gray-100 tracking-wider">
                <tr>
                    {{ $thead }}
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50 text-gray-700">
                {{ $slot }}
            </tbody>
        </table>
    </div>
</div>
