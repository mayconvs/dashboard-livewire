{{-- resources/views/components/input-phone.blade.php --}}
@props([
    'label',
    'name',
    'wire_model',
    'initial_country' => 'br',
    'placeholder' => '(11) 98765-4321',
])

<div class="mb-6" wire:ignore>
    @if($label)
        <label class="block text-base text-left font-medium text-[var(--gray-900)] dark:text-[var(--gray-50)] mb-2">
            {{ $label }}
        </label>
    @endif



    <input
        type="tel"
        name="{{ $name }}"        
        placeholder="{{ $placeholder }}"
        class="form-input w-full rounded-lg border border-[var(--gray-700)] placeholder:text-[var(--gray-500)]
                 bg-[var(--gray-50)] dark:bg-[var(--gray-900)] text-[var(--gray-900)] dark:text-[var(--gray-50)]
                 h-14 p-[15px] focus:border-primary focus:outline-0"
        autocomplete="tel"
        wire:model="{{ $wire_model }}"
        x-data
        x-init="
        const iti = window.intlTelInput($el, {
            initialCountry: 'br',
            strictMode: true,
            formatAsYouType: true,
            {{-- separateDialCode: true, --}}
            loadUtils: () => intlTelInputUtils,
        });
    
        const sync = () => {
            const number = iti.getNumber();
            $wire.set('{{ $wire_model }}', number || null);
            console.log(number);
        };
    
        $el.addEventListener('blur', sync);
    
        $el.addEventListener('countrychange', () => {
            const country = iti.getSelectedCountryData();
    
            // se o input estiver vazio, injeta o DDI
            if (!$el.value || $el.value.trim() === '') {
                iti.setNumber('+' + country.dialCode);
            }
    
            sync();
        });
        "
    />
    <input type="hidden" wire:model="{{ $wire_model }}">


    @error($wire_model)
        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>
