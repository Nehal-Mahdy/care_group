<?php

namespace App\Repositories;

use App\Interface\SettingRepositoryInterface;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingRepository implements SettingRepositoryInterface
{
    public function getAll()
    {
        return Setting::all();
    }

    public function findFirst()
    {
        return Setting::firstOrFail();
    }

    public function create(array $data)
    {
        $setting = new Setting();
        $setting->title = $data['title'];
        $setting->phone = $data['phone'];
        $setting->email = $data['email'];
        $setting->save();

        $this->saveHeroSlider($setting, $data['hero_slider'] ?? []);

        return $setting;
    }

    public function update(Setting $setting, array $data)
    {
        $setting->update([
            'title' => $data['title'],
            'phone' => $data['phone'],
            'email' => $data['email'],
        ]);

        $this->saveHeroSlider($setting, $data['hero_slider'] ?? []);

        return $setting;
    }

    public function delete(Setting $setting)
    {
        return $setting->delete();
    }

    private function saveHeroSlider(Setting $setting, array $heroSlider)
    {
        $heroSlides = [];

        foreach ($heroSlider as $index => $slide) {
            if (isset($slide['image']) && $slide['image'] instanceof \Illuminate\Http\UploadedFile) {
                $setting->clearMediaCollection("hero_slider_{$index}");
                $mediaItem = $setting->addMedia($slide['image'])->toMediaCollection("hero_slider_{$index}");
                $slide['image'] = $mediaItem->getUrl();
            } else {
                $slide['image'] = asset('image/default.png');
            }

            $heroSlides[] = $slide;
        }

        $setting->hero_slider = $heroSlides;
        $setting->save();
    }
}
