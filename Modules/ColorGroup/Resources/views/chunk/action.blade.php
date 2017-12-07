<a
    class="btn btn-primary btn-xs remote_modal"
        rel="tooltip"
        data-title="{{ trans('lang.edit') }}"
        href="#"
        ajax_target="/{{ $resource }}/{{ $id }}/edit"
        style="width:25px;"
>
    <i class="fa fa-gear"></i>
</a>

<form
	class="remove-resource"
	method="POST"
	style="display:inline"
	data-section="delete_{{$id}}"
	action="/{{ $resource }}/destroy/{{ $id }}"
>
	<input name="_method" type="hidden" value="DELETE"/>
	<button
		type="submit"
		class="btn btn-danger btn-xs"
		rel="tooltip"
		data-title="{{ trans('lang.delete')}}"
		style="width:25px;"
	>
		<i class="fa fa-trash-o"></i>
	</button>
</form>