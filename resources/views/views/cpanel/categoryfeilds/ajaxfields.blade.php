@if(!empty($fields))
@foreach($fields as $field)
<div class="row mg-b-25">
    <div class="col-lg">
        <input class="form-control" type="text" name="extrafields[{{ $field['id'] }}]" placeholder="{{$field['fieldname'] }}" >
    </div><!-- col -->
</div>
@endforeach
@endif
