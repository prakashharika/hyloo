@php
use Illuminate\Support\Facades\Auth;
    $vendor = Auth::guard('vendor')->user();
@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
<head>
    @include('partials.head')
</head>

<body class="min-h-screen bg-white dark:bg-zinc-800">

<flux:sidebar sticky stashable
    class="border-e border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">

    <a href="{{ route('vendor.dashboard') }}" class="me-5 flex items-center space-x-2">
        <x-app-logo />
    </a>

    <flux:navlist>
        <flux:navlist.item
            icon="home"
            :href="route('vendor.dashboard')"
            :current="request()->routeIs('vendor.dashboard')">
            Dashboard
        </flux:navlist.item>
    </flux:navlist>

    <flux:spacer />

    <flux:dropdown class="hidden lg:block" position="bottom" align="start">

        <flux:profile
            :name="$vendor?->full_name"
            :initials="$vendor?->initials()"
            icon:trailing="chevrons-up-down"
        />

        <flux:menu class="w-[220px]">

            <div class="p-2 text-sm">
                <div class="flex items-center gap-2">
                    <span class="flex h-8 w-8 items-center justify-center rounded-lg bg-neutral-200 dark:bg-neutral-700">
                        {{ $vendor?->initials() }}
                    </span>

                    <div class="grid">
                        <span class="font-semibold truncate">{{ $vendor?->full_name }}</span>
                        <span class="text-xs truncate">{{ $vendor?->email }}</span>
                    </div>
                </div>
            </div>

            <flux:menu.separator />
            
            <flux:menu.item
                :href="route('vendor.dashboard')"
                icon="cog">
                {{ __('Settings') }}
            </flux:menu.item>

            <flux:menu.separator />
            
            <flux:menu.item
                :href="route('vendor.logout')"
                icon="arrow-right-start-on-rectangle">
                {{ __('Log Out') }}
            </flux:menu.item>

        </flux:menu>
    </flux:dropdown>

</flux:sidebar>

<!-- ✅ Flux main content area -->
<flux:main class="p-6">
    @yield('header')
    @yield('content')
</flux:main>

@fluxScripts
</body>
</html>
