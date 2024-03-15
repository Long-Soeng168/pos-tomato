@props(['value'])

<td {{ $attributes->merge(['class' => 'px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white ']) }}>
    {{ $value ?? $slot }}
</td>
