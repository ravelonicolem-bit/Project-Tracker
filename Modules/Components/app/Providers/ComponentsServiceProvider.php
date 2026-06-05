<?php

namespace Modules\Components\Providers;

use Illuminate\Support\Facades\Blade;
use Nwidart\Modules\Support\ModuleServiceProvider;

class ComponentsServiceProvider extends ModuleServiceProvider
{
    protected string $name = 'Components';

    protected string $nameLower = 'components';

    /**
     * @var string[]
     */
    protected array $providers = [
        EventServiceProvider::class,
        RouteServiceProvider::class,
    ];

    public function boot(): void
    {
        parent::boot();

        Blade::anonymousComponentPath(
            module_path($this->name, 'resources/views/components'),
            'components'
        );
    }
}
