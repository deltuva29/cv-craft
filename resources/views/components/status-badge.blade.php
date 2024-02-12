@props([
    'status' => true,
])

<span @class([
    'inline-flex items-center px-2.5 py-1.5 rounded-sm text-sm font-medium bg-green-500 text-white uppercase' => $status,
    'inline-flex items-center px-2.5 py-1.5 rounded-sm text-sm font-medium bg-gray-200 text-primary uppercase' => !$status
])>
    {{ $status ?
        __('Public') :
        __('Not-Public')
        }}
</span>

