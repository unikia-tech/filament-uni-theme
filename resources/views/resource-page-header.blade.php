<span class="flex items-center gap-3">
    <span class="flex items-center justify-center h-10 w-10 rounded-lg" style="background: linear-gradient(135deg, var(--color-primary-700), var(--color-primary-400));">
        {{ \Filament\Support\generate_icon_html($icon, null, (new \Illuminate\View\ComponentAttributeBag)->class(['text-white'])) }}
    </span>

    {{ $label }}
</span>
