<div>
	{{-- {{ dd($daftarObat) }} --}}
	@php
		$headers = [
			['key' => 'id_obat', 'label' => 'NOMOR', 'class' => 'w-1/12'],
			['key'	=> 'nama_obat', 'label' => 'NAMA OBAT', 'class' => 'w-auto'],
			['key'	=> 'kelas_terapi', 'label' => 'KELAS TERAPI', 'class' => 'w-auto'],
			['key'	=> 'stok.stok', 'label' => 'STOK', 'class' => 'w-1/12 text-right'],
			['key'	=> 'satuan', 'label' => 'SATUAN', 'class' => 'w-1/12']
		];
	@endphp

    <x-card title="{{ $cardTitle }}" separator shadow progress-indicator>
		<x-slot:menu>
			<x-button link="/settings/apotik/tambah-obat" icon="o-squares-plus" label="Tambah Obat" class="btn-sm bg-teal-400" />
		</x-slot:menu>

		<div class="lg:w-3/12 w-auto mb-5">
			<x-input wire:model="filter" placeholder="Cari obat..." class="border-stone-600" clearable />
		</div>

		<x-table :headers="$headers" :rows="$daftarObat" with-pagination>
			<x-slot:empty>
				<x-icon name="o-cube" label="Belum ada data obat!" />
			</x-slot:empty>

			@scope('actions', $obat)
				<div class="w-[180px]">
					<x-button icon="o-pencil-square" link="/settings/apotik/obat/{{ $obat->id_obat }}/edit" label="Edit" spinner class="btn-sm bg-amber-300" />
					<x-button icon="o-rectangle-stack" link="/settings/apotik/stok-obat/{{ $obat->id_obat }}" label="Stock" spinner class="btn-sm" />
				</div>
			@endscope
		</x-table>
	</x-card>
</div>
