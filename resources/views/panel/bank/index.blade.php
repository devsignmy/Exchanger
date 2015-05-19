@extends("app")

@section("pageTitle", "Blank Template")

@section("toolbar")
@include('templates.default-toolbar')
@stop

@section("content")

<div style="padding: 16px; max-width: 1312px; margin: 0 auto">
	@include('templates.page-message', compact("success", "error"))
	<div class="table-container">
		<div class="table-title">User Manager <a class="fab" href="/panel/user/add"><i data-icon="plus"></i></a></div>
		<div class="table-responsive">
			<table>
				<thead>
					<tr>
						<th>Bank Name</th>
						<th>Country</th>
						<th>Holder Name</th>
						<th>Holder Number</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach( $banks as $bank)
					<tr>
						<td>{{ $bank->name }}</td>
						<td>{{ $bank->country() }}</td>
						<td>{{ $bank->holder_name }}</td>
						<td>{{ $bank->holder_number }}</td>
						<td style="min-width: 180px">
							<a href="" class="square-button" data-icon="eye"></a>
							<a href="/panel/user/edit/{{ $bank->id }}" class="square-button" data-icon="pencil"></a>
							<a href="/panel/user/delete/{{ $bank->id }}" class="square-button" data-icon="delete"></a>
						</td>
					</tr>
					@endforeach

					@if (count($banks) == 0)
					<tr>
						<td colspan="100" style="text-align:center">No Record Found</td>
					</tr>
					@endif
				</tbody>
			</table>
		</div>
		<div class="table-navigation">
			<div class="pull-right">
				<a href="/panel/user/1" class="square-button @if($page['left_arrow']) disabled @endif" data-icon="chevron-double-left"></a>
				<a href="/panel/user/{{$page["number"]-1}}" class="square-button @if($page['left_arrow']) disabled @endif" data-icon="chevron-left"></a>
				<div class="navigation-text">Page {{$page["number"]}} of {{ $page["total"]}}</div>
				<a href="/panel/user/{{$page["number"]+1}}" class="square-button @if($page['right_arrow']) disabled @endif" data-icon="chevron-right"></a>
				<a href="/panel/user/{{$page["total"]}}" class="square-button @if($page['right_arrow']) disabled @endif" data-icon="chevron-double-right"></a>
			</div>
		</div>
	</div>
</div>

<div class="dialog">
	<div class="dialog-inner">

	</div>
</div>
@stop
