<div class="lg:grid lg:grid-cols-12 gap-3">

	<div class="lg:col-span-3">
		<livewire:settings.apotik.form-stok-obat :stok="$stok" />
	</div>

	<div class="lg:col-span-9">
		<livewire:settings.apotik.list-stok-obat :stok="$stok" />
	</div>

</div>