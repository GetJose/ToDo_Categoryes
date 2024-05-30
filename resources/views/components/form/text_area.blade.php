<div class="input_area">
    <label for="{{$name}}">
       {{$label ?? ''}}
    </label>
    <textarea id="{{$name}}" name="{{$name}}" placeholder="{{$placeholder ?? ''}}" {{ empty($required ) ? '' : 'required' }} > {{$value ?? ''}}</textarea>
</div>