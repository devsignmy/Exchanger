@extends("app")

@section("pageTitle", "Blank Template")

@section("content")
	<div class="toolbar">
		<div class="toolbar-inner shadow fixed">
			<a class="icon-button ripple morph" href="javascript:" data-side-navigation=".side-navigation">
				<i data-icon="menu" class="white" ></i>
				<i data-icon="arrow-left" class="white" ></i>
			</a>
			<div class="toolbar-title">Devsign.My</div>
			<div style="padding-left: 16px; padding-right: 16px;">
				<div class="pull-right">
					<a class="icon-button ripple" href="javascript:" data-popup=".popup">
						<i data-icon="bell" class="white"></i>
					</a>
					<div class="popup">
						<div class="row">
							<div class="col-xs-1">
								<img src="/img/profile.png" class="img-responsive" />
							</div>
							<div class="col-xs">
								
							</div>
						</div>
					</div>
					<input type="checkbox" class="white-blue large" data-switch="" name="value_1" value="1" />
				</div>
			</div>
			
		</div>
	</div>
	
	<div style="padding: 16px; max-width: 1312px; margin: 0 auto">
		<div class="alert">
			This is Naqib! This alert needs your attention, but it's not super important.
		</div>
		<div class="table-container">
			<div class="table-title">User Manager <a class="fab" href=""><i data-icon="plus"></i></a></div>
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
									<a href="" class="square-button" data-icon="pencil"></a>
									<a href="" class="square-button" data-icon="delete"></a>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			
			<div class="table-navigation">
				<div class="pull-right">
					<a href="/panel/user/{{$page["number"]-1}}" class="square-button @if($page['left_arrow']) disabled @endif" data-icon="arrow-left"></a>
					<div class="navigation-text">Page {{$page["number"]}} of {{ $page["total"]}}</div>
					<a href="/panel/user/{{$page["number"]+1}}" class="square-button @if($page['right_arrow']) disabled @endif" data-icon="arrow-right"></a>
				</div>
			</div>	
		</div>
	</div>

	<div class="dialog">
		<div class="dialog-inner">
			
		</div>
	</div>
@stop