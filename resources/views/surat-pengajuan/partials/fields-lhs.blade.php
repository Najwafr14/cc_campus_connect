<div class="mb-4">
    <x-input-label for="keperluan" :value="__('Keperluan')" />
    <x-text-input id="keperluan" type="text" name="keperluan" class="mt-1 block w-full" required />
    <x-input-error :messages="$errors->get('keperluan')" class="mt-2" />
</div>
