<x-filament-panels::page>
    <div class= "grid"  style = "grid-template-columns: repeat(2, minmax(0, 1fr));gap: 10px" >
    <div  class = "col-span-1" >
         <x-filament-panels::form wire:submit="submit">
            {{ $this->form }}
            <x-filament-panels::form.actions :actions="$this->getFormActions()" />
        </x-filament-panels::form>
    </div >
    <div  class = "col-span-1" >
         {{ $this->table }}
    </div >
</ div >
</x-filament-panels::page>
