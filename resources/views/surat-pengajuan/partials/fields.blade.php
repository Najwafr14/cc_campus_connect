<div class="mb-4">
    <x-input-label for="semester" :value="__('Semester')" />
    <x-text-input id="semester" class="block mt-1 w-full" type="text" name="semester" :value="old('semester')" required />
    <x-input-error :messages="$errors->get('semester')" class="mt-2" />
</div>

<div class="mb-4">
    <x-input-label for="keperluan" :value="__('Keperluan')" />
    <x-text-area id="keperluan" class="block mt-1 w-full" name="keperluan" required>{{ old('keperluan') }}</x-text-area>
    <x-input-error :messages="$errors->get('keperluan')" class="mt-2" />
</div>