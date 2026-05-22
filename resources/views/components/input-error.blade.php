@props(['field'])


    <!-- Simplicity is the ultimate sophistication. - Leonardo da Vinci -->



    @error($field)
    <p class="text-white font-bold text-center broder    rounded-2xl border-2 uppercase bg-red-500">{{ $message }}</p>
    @enderror
