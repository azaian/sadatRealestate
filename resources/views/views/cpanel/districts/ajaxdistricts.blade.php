<option value="">غير محدد</option>

@if(!empty($districts))
@foreach($districts as $district)

<option value="{{ $district['id'] }}">{{ $district['name'] }}</option>

@endforeach

@endif