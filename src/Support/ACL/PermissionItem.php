<?php

namespace Joespace\Core\Support\ACL;

use Joespace\Core\Contracts\PermissionItemInterface;

class PermissionItem implements PermissionItemInterface
{

    public function __construct(
        private string $name,
        private string $module,
        private string $group = ""
    )
    {
        if ($this->group === "")
            $this->group = $this->module;
    }

    public function GetName(): string
    {
        return $this->name;
    }

    public function GetGroup(): string
    {
        return $this->group;
    }

    public function GetModule(): string
    {
        return $this->module;
    }
}