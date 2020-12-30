<div>
		<input class="border-green"  wire:dirty.class.remove="border-green" type="text" wire:model.lazy="num1">
		@error('num1')<span>{{ $message }}</span>@enderror<br/><br/>
		<input wire:dirty.class="border-red" type="text" wire:model.lazy="num2">
		@error('num2')<span>{{ $message }}</span>@enderror<br/><br/>
		{{-- @if($photo)
		<div>
			<img src="{{ $photo->temporaryURL() }}" width="150" height="150" />
		</div>
		@endif --}}
		{{-- <input type="file" wire:model.lazy="photo" />
		@error('photo')
		<span>{{ $message }}</span>
		@enderror
		<br><br>
		<button wire:click="downloadFile">Download TOS</button> --}}
		<div wire:loading wire:target="add">
			<p>Loading...</p>
		</div>
		<div wire:offline>
			<p>You are Not Connected with Internet</p>
		</div>
		<p>Result Is: {{ $result }}</p>
		<p>{{ $message }}</p>
		<button wire:click.prefetch="add">Show Result</button>

</div>