@extends('employer.layouts.default')

@section('content-header')
  Edit Job<small> </small>
@endsection

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Edit Job</h3>
      </div>

        {!! form_start($form) !!}
        <div class="box-body">
          <div class="form-group">
			         {!! form_rest($form) !!}
			    </div>
		    </div>
        {!! form_end($form) !!}

	</div>
</div>
</div>
@stop

@section('page_specific_js')
<script type="text/javascript">
    function getDistrictList(stateElement, districtElement){
        var url = '{{ URL::route('district.by.state') }}';
        var state = $(stateElement).val();
        $district = $(districtElement);
        districtElement = typeof districtElement !== 'undefined' ? districtElement : '';

        if(state!=''){
            $.ajax({ url: url, type: 'POST', data: { state_id: state } }).done(function( msg ) {
                $district.empty();
                $("<option>").val('').text('--Choose--').appendTo($district);
                $.each(msg, function(key, value) {
                    $("<option>").val(value.id).text(value.name).appendTo($district);
                });
                return true;
            });
        }else
            $district.empty();
    }
    function getSelectedDistrict(stateElement, districtElement, district_id){
        var url = '{{ URL::route('district.by.state') }}';
        var state = $(stateElement).val();
        $district = $(districtElement);
        districtElement = typeof districtElement !== 'undefined' ? districtElement : '';

        if(state!=''){
            $.ajax({ url: url, type: 'POST', data: { state_id: state } }).done(function( msg ) {
                $district.empty();
                $("<option>").val('').text('--Choose--').appendTo($district);
                $.each(msg, function(key, value) {
                    $("<option>").val(value.id).text(value.name).appendTo($district);
                });
                $('#place_of_employment_district_id').val(district_id);
                return true;
            });
        }else
            $district.empty();
    }
</script>
@stop

@section('page_specific_scripts')
    $('#place_of_employment_state_id').change(function(e){ getDistrictList(this, $('#place_of_employment_district_id')); });
    //$('#place_of_employment_state_id').trigger('change');
    getSelectedDistrict($('#place_of_employment_state_id'), $('#place_of_employment_district_id'), {{$result->place_of_employment_district_id}});
@stop
