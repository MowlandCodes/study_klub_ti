@props(['active' => false])
<a {{ $attributes }}
    class="h-full flex justify-center items-center px-10 border-b-3 hover:border-b-cyan-400 hover:text-cyan-200 ease-in-out duration-300 {{ $active ? 'border-b-cyan-400 text-cyan-200' : 'border-b-transparent text-neutral-50' }}"
    aria-current="{{ $active ? 'page' : '' }}">
    {{ $slot }}
</a>
