<div>
    <button wire:click="create" class="flex items-center space-x-2 px-4 py-2 bg-blue-500 rounded-lg text-white">
        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd"
                d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                clip-rule="evenodd"></path>
        </svg>
        <span>
            Income
        </span>
    </button>

    <x-jet-dialog-modal wire:model="showCreateModal">
        <x-slot name="title">
            {{ __('Enter Savings') }}
        </x-slot>

        <x-slot name="content">
            {{ __('Please enter the amount you want to save.') }}

            <div class="mt-4">
                <x-jet-input type="number" class="mt-1 block w-3/4" placeholder="{{ __('Amount') }}" x-ref="amount"
                    wire:model.defer="amount" />

                <x-jet-input-error for="amount" class="mt-2" />
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('showCreateModal')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-button class="ml-2" wire:click="storeSaving">
                {{ __('Save') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
