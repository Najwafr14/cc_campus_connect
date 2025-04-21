<div class="mb-4">
    <x-input-label for="kode_mk" :value="__('Kode Mata Kuliah')" />
    <x-text-input id="kode_mk" class="block mt-1 w-full" type="text" name="kode_mk" :value="old('kode_mk')" required />
    <x-input-error :messages="$errors->get('kode_mk')" class="mt-2" />
</div>

<div class="mb-4">
    <x-input-label for="nama_mk" :value="__('Nama Mata Kuliah')" />
    <x-text-input id="nama_mk" class="block mt-1 w-full" type="text" name="nama_mk" :value="old('nama_mk')" required />
    <x-input-error :messages="$errors->get('nama_mk')" class="mt-2" />
</div>

<div class="mb-4">
    <x-input-label for="tujuan" :value="__('Tujuan')" />
    <x-text-area id="tujuan" class="block mt-1 w-full" name="tujuan" required>{{ old('tujuan') }}</x-text-area>
    <x-input-error :messages="$errors->get('tujuan')" class="mt-2" />
</div>

<div class="mb-4">
    <x-input-label for="topik" :value="__('Topik')" />
    <x-text-area id="topik" class="block mt-1 w-full" name="topik" required>{{ old('topik') }}</x-text-area>
    <x-input-error :messages="$errors->get('topik')" class="mt-2" />
</div>