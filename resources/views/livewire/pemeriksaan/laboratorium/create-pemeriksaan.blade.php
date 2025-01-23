<div>
    <x-card title="{{ $cardTitle }}" shadow separator progress-indicator>
		<x-form wire:submit="save" class="space-y-2">
			<div class="border-b-2 border-b-gray-500-300 pb-4">
				<h4 class="text-xl font-thin text-lime-600">Pemeriksaan Darah Lengkap</h4>
				<div class="grid grid-cols-8 gap-4">
					<div>
						<h5>Hemoglobin</h5>
						<x-input
							class=""
							wire:model="form.hasil.hemoglobin"
							placeholder="Hasil pemeriksaan..." />
					</div>

					<div>
						<h5>Rhesus</h5>
						<x-input
							class=""
							wire:model="form.hasil.rhesus"
							placeholder="Hasil pemeriksaan..." />
					</div>

					<div>
						<h5>Golongan Darah</h5>
						<x-input
							class=""
							wire:model="form.hasil.golongan_darah"
							placeholder="Hasil pemeriksaan..." />
					</div>

					<div>
						<h5>Hematologi Rutin</h5>
						<x-input
							class=""
							wire:model="form.hasil.golongan_darah"
							placeholder="Hasil pemeriksaan..." />
					</div>

					<div>
						<h5>Golongan Darah</h5>
						<x-input
							class=""
							wire:model="form.hasil.golongan_darah"
							placeholder="Hasil pemeriksaan..." />
					</div>

					<div>
						<h5>Golongan Darah</h5>
						<x-input
							class=""
							wire:model="form.hasil.golongan_darah"
							placeholder="Hasil pemeriksaan..." />
					</div>

					<div>
						<h5>Golongan Darah</h5>
						<x-input
							class=""
							wire:model="form.hasil.golongan_darah"
							placeholder="Hasil pemeriksaan..." />
					</div>
				</div>
			</div>

			<div class="border-b-2 border-b-gray-500-300 pb-4">
				<h4 class="text-xl font-thin text-lime-600">Pemeriksaan Urine</h4>
				<div class="grid grid-cols-6 gap-4">
					<div>
						<h5>Endapan</h5>
						<x-input
							class=""
							wire:model="form.hasil.hemoglobin"
							placeholder="Hasil pemeriksaan..." />
					</div>

					<div>
						<h5>Kapur</h5>
						<x-input
							class=""
							wire:model="form.hasil.rhesus"
							placeholder="Hasil pemeriksaan..." />
					</div>

					<div>
						<h5>Golongan Darah</h5>
						<x-input
							class=""
							wire:model="form.hasil.golongan_darah"
							placeholder="Hasil pemeriksaan..." />
					</div>
				</div>
			</div>

			<div class="border-b-2 border-b-gray-500-300 pb-4">
				<h4 class="text-xl font-thin text-lime-600">Pemeriksaan Kimia</h4>
				<div class="grid grid-cols-6 gap-4">
					<div>
						<h5>Eritrosit</h5>
						<x-input
							class=""
							wire:model="form.hasil.hemoglobin"
							placeholder="Hasil pemeriksaan..." />
					</div>

					<div>
						<h5>Leukosit</h5>
						<x-input
							class=""
							wire:model="form.hasil.rhesus"
							placeholder="Hasil pemeriksaan..." />
					</div>

					<div>
						<h5>Martosit</h5>
						<x-input
							class=""
							wire:model="form.hasil.golongan_darah"
							placeholder="Hasil pemeriksaan..." />
					</div>
				</div>
			</div>

			<x-slot:actions>
				<x-button label="Submit Data" class="btn-primary shadow-md" type="submit" spinner="save" />
			</x-slot:actions>
		</x-form>
	</x-card>
</div>
