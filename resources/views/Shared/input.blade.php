@php
$name ??= null;
$label ??= '';
$class ??= '';
$type ??= 'text';
$value ??= '';
$inputForm ??= '';
@endphp

@if ($inputForm === 'checkbox')
    <div class="form-check form-switch">
        <input type="hidden" value="0" name="{{$name}}">
        <input @checked(old($name, $value ?? false)) type="checkbox" value="1" name="{{$name}}" role="switch" class="form-check-input @error($name) is-invalid @enderror" id="{{ $name}}" value="{{ old($value)}}">
        <label for="{{ $name }}" class="form-check-label">Vendu</label>
    </div>

@elseif ($inputForm === 'select')
    @php $option_id = $property->options()->pluck('id') @endphp
    <div class="form-group">
        <label for="{{$name}}">{{ $label}}</label>
        <select name="{{$name}}[]" id="{{$name}}" class="{{$class}}" multiple>
            @foreach ($options as $option)
                <option  @selected($option_id->contains($option->id)) value="{{ $option->id}}">{{ $option->name}}</option>
            @endforeach
        </select>
    </div>
@else

    <div class="form-group col">
            <label for="{{$name}}">{{ $label }}</label>
            @if ($type === 'textarea')
                <textarea name="{{$name}}" id="{{$name}}"  class="{{ $class}} @error($name) is-invalid @enderror">{{old($name, $value)}}</textarea>
            @else
                <input type="{{ $type }}" name="{{$name}}" id="{{ $name}}" class="{{ $class}} @error($name) is-invalid @enderror" value="{{ old($name, $value)}}">
            @endif
            @error($name)
                    <div class="invalid-feedback">{{$message}}</div>
            @enderror
    </div>
@endif