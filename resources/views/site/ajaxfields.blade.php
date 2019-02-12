@if(!empty($fields))
@foreach($fields as $field)
<div class="col-sm-6">
    <div class="single-query form-group bottom20">
        <label>{{$field['fieldname'] }}</label>
        <input class="form-control" type="text" name="extrafields[{{ $field['id'] }}]" placeholder="{{$field['fieldname'] }}">
    </div><!-- col -->
</div>
@endforeach
@endif