<?php

namespace App\View\Components;

use App\Models\Module;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class DynamicImage extends Component
{
    public string $module;
    public string $key;
    public string $fallback;
    public string $alt;
    public ?string $class;

    /**
     * Create a new component instance.
     */
    public function __construct(
        string $module,
        string $key,
        string $fallback = '',
        string $alt = '',
        ?string $class = null
    ) {
        $this->module = $module;
        $this->key = $key;
        $this->fallback = $fallback;
        $this->alt = $alt;
        $this->class = $class;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        // Cacheia a consulta por 1 hora (ou até ser limpo) para evitar queries repetidas
        $cacheKey = "dynamic_image_{$this->module}_{$this->key}";

        $imageData = Cache::remember($cacheKey, 3600, function () {
            $moduleRecord = Module::where('slug', $this->module)->first();

            if ($moduleRecord) {
                return $moduleRecord->images()->where('key', $this->key)->first();
            }

            return null;
        });

        $src = ($imageData && $imageData->path) ? Storage::url($imageData->path) : asset($this->fallback);
        $altText = ($imageData && $imageData->alt_text) ? $imageData->alt_text : $this->alt;

        return view('components.dynamic-image', [
            'src' => $src,
            'altText' => $altText,
            'cssClass' => $this->class,
        ]);
    }
}
