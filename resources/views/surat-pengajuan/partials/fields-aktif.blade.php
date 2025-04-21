<div class="mb-4">
    <x-input-label for="semester" :value="__('Semester')" />
    <x-text-input id="semester" type="text" name="semester" class="mt-1 block w-full" required />
    <x-input-error :messages="$errors->get('semester')" class="mt-2" />
</div>

<div class="mb-4">
    <x-input-label for="keperluan" :value="__('Keperluan')" />
    <x-text-input id="keperluan" type="text" name="keperluan" class="mt-1 block w-full" required />
    <x-input-error :messages="$errors->get('keperluan')" class="mt-2" />
</div>
