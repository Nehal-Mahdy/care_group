<?php

namespace App\Interface;

use App\Models\Setting;
use Illuminate\Http\Request;

interface SettingRepositoryInterface
{
    public function getAll();
    public function findFirst();
    public function create(array $data);
    public function update(Setting $setting, array $data);
    public function delete(Setting $setting);
}
