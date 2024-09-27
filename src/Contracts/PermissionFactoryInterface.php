<?php

namespace Joespace\Core\Contracts;


use Joespace\Core\Support\ACL\PermissionItem;

interface PermissionFactoryInterface
{
    /**
     * @param PermissionItem[] $permissionsItems
     * @return static
     */
    public static function Make(array $permissionsItems = []): static;

    public function Merge(PermissionFactoryInterface $factory): static;

    public function Add(PermissionItemInterface $item): static;

    public function MakeCRUDItems(string $module, string $group = ""): static;

    /**
     * @return PermissionItemInterface[]
     */
    public function GetAll(): array;


}