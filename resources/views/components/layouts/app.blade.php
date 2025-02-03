<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="corporate">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, viewport-fit=cover">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>{{ isset($title) ? $title.' - '.config('app.name') : config('app.name') }}</title>

	{{-- Font --}}
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

	<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.css" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
	<script type="text/javascript" src="https://cdn.jsdelivr.net/gh/robsontenorio/mary@0.44.2/libs/currency/currency.js"></script>
	@vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen antialiased bg-base-200/50 dark:bg-base-200">

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
			
			<x-menu class="flex flex-row gap-1" activate-by-route>
				<x-menu-item title="Home" icon="o-home" link="/" />
				<x-menu-item title="Antrian" icon="o-users" link="/antrian" />
				<x-nav-menu-sub title="Registrasi" icon="o-pencil">
					<x-menu-item title="IGD" icon="o-truck" link="/igd" />
					<x-menu-item title="Kunjungan" icon="o-finger-print" link="/kunjungan" />
				</x-nav-menu-sub>
				<x-nav-menu-sub title="Setting" icon="o-cog-8-tooth">
					<x-menu-item title="Pasien" icon="o-user-plus" link="/pasien" />
					<x-menu-item title="Profil" icon="o-building-office-2" link="/setting/profil" />
					<x-menu-item title="Poliklinik" icon="o-building-library" link="/setting/poliklinik" />
					<x-menu-item title="Apotek" icon="o-building-storefront" link="/apotek" />
					<x-menu-item title="Tenaga Medis" icon="o-user-group" link="/tenaga-medis" />
					<x-menu-item title="Staff" icon="o-users" link="/staff" />
					<x-menu-item title="Tindakan Medis" icon="o-scissors" link="/setting/tindakan-medis" />
					<x-menu-item title="Penunjang Medis" icon="o-beaker" link="/setting/penunjang-medis" />
					<x-menu-item title="Ruangan Perawatan" icon="o-rectangle-stack" link="/ruangan-perawatan" />
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

		{{-- This is a sidebar that works also as a drawer on small screens --}}
		{{-- Notice the `main-drawer` reference here --}}
		{{-- <x-slot:sidebar drawer="main-drawer" collapsible class="bg-base-200"> --}}

			{{-- User --}}
			{{-- @if($user = auth()->user())
				<x-list-item :item="$user" value="name" sub-value="email" no-separator no-hover class="pt-2">
					<x-slot:actions>
						<x-button icon="o-power" class="btn-circle btn-ghost btn-xs" tooltip-left="logoff" no-wire-navigate link="/logout" />
					</x-slot:actions>
				</x-list-item>

				<x-menu-separator />
			@endif --}}

			{{-- Activates the menu item when a route matches the `link` property --}}
			{{-- <x-menu activate-by-route>
				<x-menu-item title="Home" icon="o-home" link="###" />
				<x-menu-item title="Messages" icon="o-envelope" link="###" />
				<x-menu-sub title="Settings" icon="o-cog-6-tooth">
					<x-menu-item title="Wifi" icon="o-wifi" link="####" />
					<x-menu-item title="Archives" icon="o-archive-box" link="####" />
				</x-menu-sub>
			</x-menu> --}}
		{{-- </x-slot:sidebar> --}}

		{{-- The `$slot` goes here --}}
		<x-slot:content>
			<div>
				<x-header :title="$title ?? ''">
					<x-slot:actions>
						{{ $headerActions ?? '' }}
					</x-slot:actions>
				</x-header>
			</div>
			{{ $slot }}
		</x-slot:content>
	</x-main>

	{{--  TOAST area --}}
	<x-toast />

</body>
</html>
