@if ($crud->hasAccess('delete') && $entry->reported)
	<a href="javascript:void(0)" onclick="removeReport(this)" data-route="{{ url($crud->route.'/'.$entry->getKey().'/removereport') }}" class="btn btn-sm btn-link" data-button-type="delete"><i class="la la-times-circle"></i> {{ trans('macyo_custom.remove_report') }}</a>
@endif

{{-- Button Javascript --}}
{{-- - used right away in AJAX operations (ex: List) --}}
{{-- - pushed to the end of the page, after jQuery is loaded, for non-AJAX operations (ex: Show) --}}
@push('after_scripts') @if (request()->ajax()) @endpush @endif
<script>

	if (typeof removeReport != 'function') {
	  $("[data-button-type=delete]").unbind('click');

	  function removeReport(button) {
		// ask for confirmation before deleting an item
		// e.preventDefault();
		var route = $(button).attr('data-route');

		swal({
		  title: "{!! trans('macyo_custom.information') !!}",
		  text: "{!! trans('macyo_custom.remove_report_confirm') !!}",
		  icon: "info",
		  buttons: ["{!! trans('backpack::crud.cancel') !!}", "{!! trans('backpack::crud.delete') !!}"],
		  dangerMode: true,
		}).then((value) => {
		    console.log(route);
			if (value) {
				$.ajax({
			      url: route,
			      type: 'POST',
                  data: 'id={{ $entry->getKey() }}',
                  dataType: 'json',
			      success: function(result) {
			          if (result == 1) {
						  // Redraw the table
						  if (typeof crud != 'undefined' && typeof crud.table != 'undefined') {
							  crud.table.draw(false);
						  }

			          	  // Show a success notification bubble
			              new Noty({
		                    type: "success",
		                    text: "{!! '<strong>'.trans('macyo_custom.remove_report_confirmation_title').'</strong><br>'.trans('macyo_custom.remove_report_confirmation_message') !!}"
		                  }).show();

			              // Hide the modal, if any
			              $('.modal').modal('hide');
			          } else {
			              // if the result is an array, it means
			              // we have notification bubbles to show
			          	  if (result instanceof Object) {
			          	  	// trigger one or more bubble notifications
			          	  	Object.entries(result).forEach(function(entry, index) {
			          	  	  var type = entry[0];
			          	  	  entry[1].forEach(function(message, i) {
					          	  new Noty({
				                    type: type,
				                    text: message
				                  }).show();
			          	  	  });
			          	  	});
			          	  } else {// Show an error alert
				              swal({
				              	title: "{!! trans('macyo_custom.remove_report_confirmation_not_title') !!}",
	                            text: "{!! trans('macyo_custom.remove_report_confirmation_not_message') !!}",
				              	icon: "error",
				              	timer: 4000,
				              	buttons: false,
				              });
			          	  }
			          }
			      },
			      error: function(result) {
			          // Show an alert with the result
			          swal({
		              	title: "{!! trans('macyo_custom.remove_report_confirmation_not_title') !!}",
                        text: "{!! trans('macyo_custom.remove_report_confirmation_not_message') !!}",
		              	icon: "error",
		              	timer: 4000,
		              	buttons: false,
		              });
			      }
			  });
			}
		});

      }
	}

	// make it so that the function above is run after each DataTable draw event
	// crud.addFunctionToDataTablesDrawEventQueue('deleteEntry');
</script>
@if (!request()->ajax()) @endpush @endif
