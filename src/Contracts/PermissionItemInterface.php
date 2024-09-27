<?php

namespace Joespace\Core\Contracts;

interface PermissionItemInterface
{
    public function GetName();
    public function GetGroup();
    public function GetModule();

}