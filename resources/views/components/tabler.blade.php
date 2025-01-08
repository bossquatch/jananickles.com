<!-- tabler icon, pulls from public/tabler folder. Accepts:
    strokeWidth   defaults to "1"
    class         defaults to "inline-block relative h-2"
-->

<svg viewBox="0 0 24 24" stroke="currentColor"
	 stroke-width="{{ $strokeWidth ?? 1 }}"
	 class="inline-block relative {{ $class ?? '' }}"
	{{ $attributes->except(['class','icon']) }}
>
	<use xlink:href="{{ asset('storage/images/tabler-sprite.svg') }}#tabler-{{$icon}}" />
</svg>
