<?php

namespace Joespace\Core\Support\ACL;

use Illuminate\Support\Str;
use Joespace\Core\Contracts\PermissionFactoryInterface;
use Joespace\Core\Contracts\PermissionItemInterface;

class PermissionFactory implements PermissionFactoryInterface
{
    /**
     * @var PermissionItemInterface[]
     */
    private array $list;

    public function __construct()
    {
        $this->list = [];
    }

    /**
     * @param PermissionItem[] $permissionsItems
     * @return static
     */
    public static function Make(array $permissionsItems = []): static
    {
        $self = new static();
        foreach ($permissionsItems as $item) {
            $self->Add($item);
        }
        return $self;
    }

    public function Add(PermissionItemInterface $item): static
    {
        $this->list[] = $item;
        return $this;
    }

    public function MakeCRUDItems(string $module, string $group = ""): static
    {
        $module = Str::plural($module);
        $singular = Str::singular($module);

        if ($group === "")
            $group = $module;

        $this->Add(new PermissionItem("list_" . $module, $module, $group));
        $this->Add(new PermissionItem("create_" . $singular, $module, $group));
        $this->Add(new PermissionItem("edit_" . $singular, $module, $group));
        $this->Add(new PermissionItem("view_" . $singular, $module, $group));
        return $this;

    }

    public function Merge(PermissionFactoryInterface $factory): static
    {
        foreach ($factory->GetAll() as $item) {
            $this->Add($item);
        }
        return $this;
    }

    /**
     * @return PermissionItemInterface[]
     */
    public function GetAll(): array
    {
        return $this->list;
    }
}