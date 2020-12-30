<div>
	<div>
		<input type="search" wire:model.debounce.300ms="search" />
	</div>
	<div wire:loading>
			<p>Loading Users Data...</p>
	</div>
<div wire:init="loadUsers"></div>
@if(count($users) > 0)
<ul wire:loading.remove>
@foreach($users as $user)
<li><h2>{{ $user->name }}</h2><p>{{ $user->email }}</p></li>
@endforeach

</ul>
<div>
	{{ $users->links() }}
</div>
@else
 <p>No Record Found...</p>
@endif

</div>
