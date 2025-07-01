<div class="text-center leading-tight">
    @if (!Auth::user())
        <img src="{{ asset('assets/img/logo.png') }}" alt="Logo Masjid" width="100" class="mx-auto">
        <span class="block font-bold text-xl"><br>Sistem Informasi</span>
        <span class="block font-bold text-xl">Masjid Jami' Al-Muqarrabiin</span>
    @else
        <span class="block font-bold text-xl">Sistem Informasi</span>
        <span class="block font-bold text-xl">Masjid Jami' Al-Muqarrabiin</span>
    @endif
</div>
