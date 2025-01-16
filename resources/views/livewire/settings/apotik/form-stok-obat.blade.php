<div>

	<x-card title="{{ $cardTitle }}" separator shadow progress-indicator>
		<x-form wire:submit="save" class="space-y-2">
			{{-- <div class="lg:grid lg:grid-cols-12 lg:gap-4 space-y-3 lg:space-y-0"> --}}
				<div class="lg:col-span-3">
					{{-- Asesor --}}
					<x-input
						wire:model="form.stok"
						placeholder="Stok" />
				</div>

				{{-- <div class="lg:col-span-2">
					<x-input
						class=""
						wire:model="form.nama_obat"
						placeholder="Nama Obat" />
				</div> --}}

				<div class="lg:col-span-9">
					<x-button label="Submit Data" class="btn-primary shadow-md w-full" type="submit" spinner="save" />
				</div>
			{{-- </div> --}}
		</x-form>
	</x-card>

</div>