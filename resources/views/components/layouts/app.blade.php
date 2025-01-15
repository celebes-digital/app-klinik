<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="corporate">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, viewport-fit=cover">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>{{ isset($title) ? $title.' - '.config('app.name') : config('app.name') }}</title>

	@vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen font-sans antialiased bg-base-200/50 dark:bg-base-200">

	{{-- The navbar with `sticky` and `full-width` --}}
	<x-nav-custom sticky full-width>

		<x-slot:brand>
			{{-- Drawer toggle for "main-drawer" --}}
			{{-- <label for="main-drawer" class="mr-3 lg:hidden">
				<x-icon name="o-bars-3" class="cursor-pointer" />
			</label> --}}

			{{-- Brand --}}
			<div>
				<img src="/assets/img/logo/logo-klinik-medika.png" alt="" width="140" />
			</div>
		</x-slot:brand>

		{{-- Right side actions --}}
		<x-slot:actions class="!gap-1">

			<x-menu class="flex flex-row" activate-by-route>
				<x-menu-item title="Home" icon="o-home" link="/" />
				<x-menu-item title="Antrian" icon="o-users" link="/antrian" />
				<x-nav-menu-sub title="Registrasi" icon="o-pencil">
					<x-menu-item title="IGD" icon="o-wifi" link="/igd" />
					<x-menu-item title="Kunjungan" icon="o-wifi" link="/kunjungan" />
				</x-nav-menu-sub>
				<x-nav-menu-sub title="Settings" icon="o-cog">
					<x-menu-item title="Pasien" icon="o-users" link="/settings/pasien" />
					<x-menu-item title="Profil" icon="o-home-modern" link="/settings/profil" />
					<x-menu-item title="Poliklinik" icon="o-building-library" link="/settings/poliklinik" />
					<x-menu-item title="Obat" icon="o-beaker" link="/settings/apotik/daftar-obat" />
					<x-menu-item title="Tenaga Medis" icon="o-user-circle" link="/settings/tenaga-medis" />
					<x-menu-item title="Staff" icon="o-user-group" link="/settings/staff" />
					<x-menu-item title="Tindakan Medis" icon="o-archive-box" link="/settings/tindakan-medis" />
					<x-menu-item title="Penunjang Medis" icon="o-archive-box" link="/settings/penunjang-medis" />
					<x-menu-item title="Ruang Perawatan" icon="o-archive-box" link="/settings/ruang-perawatan" />
					<x-menu-item title="Kamar Perawatan" icon="o-archive-box" link="/settings/kamar-perawatan" />
				</x-nav-menu-sub>
			</x-menu>

			<div class="flex gap-1">
				<x-theme-toggle class="btn btn-circle btn-ghost" />
				<x-avatar placeholder="RT" class="!w-10" />
			</div>
		</x-slot:actions>
	</x-nav-custom>

	{{-- The main content with `full-width` --}}
	<x-main with-nav full-width>

		{{-- The `$slot` goes here --}}
		<x-slot:content>
			{{-- <div> --}}
				<x-header :title="$title ?? ''" separator>
					<x-slot:actions>
						{{ $headerActions ?? '' }}
					</x-slot:actions>
				</x-header>
			{{-- </div> --}}
			{{ $slot }}
		</x-slot:content>
	</x-main>

	{{--  TOAST area --}}
	<x-toast />

</body>
</html>