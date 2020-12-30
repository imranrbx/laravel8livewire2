<div>
	<style type="text/css">
		.opacity-25{
			opacity: 0.25;
		}
	</style>

	@if(session()->has('message'))
		<p>{{ session('message') }}</p>
	@endif
	<div x-data="{ open: @entangle('open').defer }" @click.away="open = false">
			<div x-show="open">
			{{-- <input type="text" wire:model.lazy="num1" /> --}}
			<x-inputs type="number" wire:model.lazy="num1" wire:loading.class="opacity-25"/>
			<x-inputs type="number" wire:model.lazy="num2" wire:loading.class="opacity-25"/>
			{{-- <input type="text" wire:model.lazy="num2" /> --}}
			<button wire:click="add()">+</button> | <button wire:click="multiply()">x</button>
			</div>
			<span>Result Is: <span x-text="$wire.result"></span></span>
			<button @click="open=true">Show Result</button>
	</div>
	{{-- @livewire('services.home')
    @livewire('services.web')
    @livewire('services.mobile')
    @livewire('services.desktop') --}}
</div>