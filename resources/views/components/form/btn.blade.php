

<button class="btn {{$type == 'submit' ? 'btn-primary' : ''}}"  type="{{ $type }}">
    {{ $slot }}
</button>
