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
							<th>Fullname</th>
							<th>Email</th>
							<th>Username</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						@foreach( $users as $user)
							<tr>
								<td>{{ $user->fullname() }}</td>
								<td>{{ $user->email }}</td>
								<td>{{ $user->username }}</td>
								<td style="min-width: 180px">
									<a href="" class="square-button" data-icon="eye"></a>
									<a href="/panel/user/edit/{{ $user->id }}" class="square-button" data-icon="pencil"></a>
									<a href="/panel/user/password/{{ $user->id }}" class="square-button" data-icon="key-change"></a>
									<a href="/panel/user/delete/{{ $user->id }}" class="square-button" data-icon="delete"></a>
								</td>
							</tr>
						@endforeach

						@if (count($users) == 0)
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
