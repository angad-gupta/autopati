<option>-- Select Model --</option>
@if(!empty($model))
  @foreach($model as $key => $value)
    <option value="{{ $key }}">{{ $value }}</option>
  @endforeach
@endif
