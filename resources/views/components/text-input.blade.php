@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-gray-300 focus:border-[#FF3217] focus:ring-[#FF3217] rounded-md shadow-sm']) }}>
