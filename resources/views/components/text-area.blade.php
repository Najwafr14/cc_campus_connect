<textarea name="{{ $name }}" id="{{ $name }}" 
    class="block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm {{ $class }}"
    {{ $required ? 'required' : '' }}>{{ old($name, $value) }}</textarea>