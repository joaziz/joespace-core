<?php

namespace Joespace\Core\Contracts\Filament;

use Filament\Contracts\Plugin;
use Joespace\Core\Contracts\PermissionFactoryInterface;

interface ActivePluginInterface extends Plugin
{
    public function GetPermissionsLookup(): PermissionFactoryInterface;
}