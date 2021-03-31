<option>-- Select Variant --</option>
@if(!empty($variant))
  @foreach($variant as $key => $value)
    <option value="{{ $key }}">{{ $value }}</option>
  @endforeach
@endif
