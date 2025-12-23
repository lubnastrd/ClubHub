<div class="flex items-start max-md:flex-col" style="color: #1f2937;">
    <div class="me-10 w-full pb-4 md:w-[220px]">
        <flux:navlist>
            <flux:navlist.item :href="route('profile.edit')" wire:navigate style="color: #1f2937;">{{ __('Profile') }}</flux:navlist.item>
            <flux:navlist.item :href="route('user-password.edit')" wire:navigate style="color: #1f2937;">{{ __('Password') }}</flux:navlist.item>
            @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                <flux:navlist.item :href="route('two-factor.show')" wire:navigate style="color: #1f2937;">{{ __('Two-Factor Auth') }}</flux:navlist.item>
            @endif
            <flux:navlist.item :href="route('appearance.edit')" wire:navigate style="color: #1f2937;">{{ __('Appearance') }}</flux:navlist.item>
        </flux:navlist>
    </div>

    <flux:separator class="md:hidden" />

    <div class="flex-1 self-stretch max-md:pt-6" style="color: #1f2937;">
        <flux:heading style="color: #1f2937;">{{ $heading ?? '' }}</flux:heading>
        <flux:subheading style="color: #4b5563;">{{ $subheading ?? '' }}</flux:subheading>

        <div class="mt-5 w-full max-w-lg" style="color: #1f2937;">
            {{ $slot }}
        </div>
    </div>
</div>
