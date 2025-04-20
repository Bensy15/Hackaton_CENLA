@props(['importance' => false])

<div @class(['importance' => $importance, 'card'])>
    {{ $slot }}
    <a {{ $attributes }} class="btn">Заявка</a>
</div>