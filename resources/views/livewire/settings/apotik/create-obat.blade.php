<div>
    <x-card title="{{ $cardTitle }}" separator shadow progress-indicator>
		<x-slot:menu>
			<x-button link="/settings/apotik/daftar-obat" icon="o-squares-2x2" label="Daftar Obat" class="btn-sm bg-lime-200" />
		</x-slot:menu>

		<x-form wire:submit="save" class="space-y-2">
			<div class="lg:grid lg:grid-cols-12 lg:gap-4 space-y-3 lg:space-y-0">
				<div class="lg:col-span-3">
					{{-- Asesor --}}
					<x-select
						{{-- label="Daftar Asesor" --}}
						icon="o-document-duplicate"
						:options="$daftarSatuan"
						placeholder="Pilih Satuan (terkecil)"
						placeholder-value="0"
						option-value="satuan"
						option-label="nama"
						wire:model="form.satuan" />
				</div>

				<div class="lg:col-span-7">
					<x-input
						class=""
						wire:model="form.nama_obat"
						placeholder="Nama Obat" />
				</div>

				<div class="lg:col-span-2">
					<x-button label="Submit Data" class="btn-primary shadow-md w-full" type="submit" spinner="save" />
				</div>
			</div>
		</x-form>
	</x-card>
</div>
