@props(['size' => 5, 'color' => 'currentColor', 'class' => ''])
<svg {{ $attributes->merge(['class' => 'h-' . $size . ' w-' . $size . ' ' . $class]) }} xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000">
    <path d="M1000 500c0 277-223 500-500 500S0 777 0 500 223 0 500 0s500 223 500 500zM375 260c-1-41-32-73-83-73-50 0-83 32-83 73s32 73 82 73h1c51 0 83-32 83-73zm-21 136H229v354h125V396zm458 166c0-114-56-187-146-187-50 0-87 30-104 75l-4-54H434c1 13 3 83 3 83v271h125V562c0-50 23-83 62-83 38 0 63 20 63 83v188h125V562z"></path>
</svg>
