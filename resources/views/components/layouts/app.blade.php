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
	<x-navcustom sticky full-width>

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
		<x-slot:actions class="gap-0">
			<x-button label="Home" icon="o-home" class="btn-ghost" link="/" />
			<x-button label="Antrian" icon="o-users" class="btn-ghost" />

			<x-dropdown label="Registrasi">
				<x-slot:trigger>
					<x-button label="Registrasi" icon="o-pencil" icon-right="o-chevron-down" class="btn-ghost" />
				</x-slot:trigger>
				<x-menu-item title="IGD" icon="o-wifi" link="####" />
				<x-menu-item title="Kunjungan" icon="o-wifi" link="####" />
			</x-dropdown>

			<x-dropdown label="Setting">
				<x-slot:trigger>
					<x-button label="Setting" icon="o-cog-8-tooth" icon-right="o-chevron-down" class="btn-ghost" />
				</x-slot:trigger>
				<x-menu-item title="Pasien" icon="o-wifi" link="pasien" />
				<x-menu-item title="Profil" icon="o-archive-box" link="####" />
				<x-menu-item title="Poliklinik" icon="o-archive-box" link="####" />
				<x-menu-item title="Apotek" icon="o-archive-box" link="####" />
				<x-menu-item title="Tenaga Medis" icon="o-archive-box" link="####" />
				<x-menu-item title="Staff" icon="o-archive-box" link="####" />
				<x-menu-item title="Tindakan Medis" icon="o-archive-box" link="####" />
				<x-menu-item title="Penunjang Medis" icon="o-archive-box" link="####" />
				<x-menu-item title="Ruang Perawatan" icon="o-archive-box" link="####" />
				<x-menu-item title="Kamar Perawatan" icon="o-archive-box" link="####" />
			</x-dropdown>

			<div class="flex gap-1">
				<x-theme-toggle class="btn btn-circle btn-ghost" />
				<x-avatar placeholder="RT" class="!w-10" />
			</div>
		</x-slot:actions>
	</x-navcustom>

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
			{{ $slot }}
		</x-slot:content>
	</x-main>

	{{--  TOAST area --}}
	<x-toast />

</body>
</html>
