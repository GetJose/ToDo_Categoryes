<div class="check-area">
    <label for="{{$name}}">
       {{$label ?? ''}}
    </label>
    <input type="checkbox" @if ($state ) checked @endif id="{{$name}}" name="{{$name}}"  />
</div>