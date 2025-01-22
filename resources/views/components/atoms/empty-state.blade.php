@props(['label' => 'Tidak ada data', 'icon' => 's-inbox'])

<div 
    {{ 
        $attributes->class(
            ['flex items-center justify-center w-full py-4 rounded-lg text-slate-400 bg-slate-400/10']
        ) 
    }}
>
    <span>
        <x-icon name="{{$icon}}" class="w-8 h-8" />
        {{$label}}
    </span>
</div>