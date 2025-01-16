<div>

	<x-card title="{{ $cardTitle }}" separator shadow progress-indicator>
		<x-alert title="Harap diperhatikan, jumlah stok dimasukkan menggunakan satuan terkecil obat" icon="o-exclamation-triangle" shadow class="mb-5" />

		<x-form wire:submit="save" class="space-y-2">

			<div class="md:grid md:grid-cols-12 md:gap-4 space-y-3 md:space-y-0">
				<div class="md:col-span-3">
					<x-input
						wire:model="form.stok"
						autofocus
						placeholder="Stok" />
				</div>

				<div class="md:col-span-9">
					<x-datepicker
					icon="o-calendar"
					wire:model="form.tgl_restok"
					:config="['altFormat' => 'd/m/Y']"
					placeholder="Tgl. Restok" />
				</div>
			</div>

			<div class="md:grid md:grid-cols-1">
				<x-input
					wire:model="form.produsen"
					autofocus
					placeholder="Produsen"
				/>
			</div>

			<div class="md:grid md:grid-cols-1">
				<x-textarea
					label="Keterangan"
					wire:model="keterangan"
					placeholder="..."
					hint="Max 1000 chars"
					rows="2"
					inline
				/>
			</div>

			<x-button label="Submit Data" class="btn-primary shadow-md w-full" type="submit" spinner="save" />

		</x-form>
	</x-card>

</div>