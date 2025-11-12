<?php

namespace App\Livewire\Admin\Resorts;

use App\Models\Resort;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use Cloudinary\Cloudinary;

class Edit extends Component
{
    use WithFileUploads;

    public $resort, $resort_name, $resort_address, $slug, $detail, $primary_img, $img_1, $img_2, $img_3, $img_4, $img_5;
    public $existingPrimary_img, $existingImg_1, $existingImg_2, $existingImg_3, $existingImg_4, $existingImg_5;

    public function mount($slug)
    {
        $this->resort = Resort::where('slug', $slug)->firstOrFail();

        $this->resort_name = $this->resort->resort_name;
        $this->resort_address = $this->resort->resort_address;
        $this->slug = $this->resort->slug;
        $this->detail = $this->resort->detail;

        $this->existingPrimary_img = $this->resort->primary_img;
        $this->existingImg_1 = $this->resort->img_1;
        $this->existingImg_2 = $this->resort->img_2;
        $this->existingImg_3 = $this->resort->img_3;
        $this->existingImg_4 = $this->resort->img_4;
        $this->existingImg_5 = $this->resort->img_5;
    }

    protected function rules()
    {
        return [
            'resort_name' => 'required|string|max:255',
            'resort_address' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:resorts,slug,' . $this->resort->id,
            'detail' => 'required|string',
            'primary_img' => 'nullable|image|max:2048',
            'img_1' => 'nullable|image|max:2048',
            'img_2' => 'nullable|image|max:2048',
            'img_3' => 'nullable|image|max:2048',
            'img_4' => 'nullable|image|max:2048',
            'img_5' => 'nullable|image|max:2048',
        ];
    }

    private function uploadImageToCloudinary($file, $existingUrl = null)
    {
        try {
            $cloudinary = new Cloudinary(config('cloudinary.cloud_url'));
            if ($existingUrl) {
                $publicId = pathinfo(parse_url($existingUrl, PHP_URL_PATH), PATHINFO_FILENAME);
                $cloudinary->uploadApi()->destroy("kazan/resorts/{$publicId}");
            }
            $uploaded = $cloudinary->uploadApi()->upload($file->getRealPath(), [
                'folder' => 'kazan/resorts',
                'format' => 'webp',
            ]);

            return $uploaded['secure_url'];
        } catch (\Exception $e) {
            throw new \Exception('Failed to upload image: ' . $e->getMessage());
        }
    }

    public function update()
    {
        $this->validate();

        try {
            $updateData = [
                'resort_name' => $this->resort_name,
                'resort_address' => $this->resort_address,
                'slug' => Str::slug($this->slug),
                'detail' => $this->detail,
            ];

            if ($this->primary_img) {
                $updateData['primary_img'] = $this->uploadImageToCloudinary($this->primary_img, $this->existingPrimary_img);
            }

            for ($i = 1; $i <= 5; $i++) {
                $imgProperty = "img_$i";
                $existingImgProperty = "existingImg_$i";

                if ($this->$imgProperty) {
                    $updateData[$imgProperty] = $this->uploadImageToCloudinary($this->$imgProperty, $this->$existingImgProperty);
                }
            }

            $this->resort->update($updateData);

            $this->dispatch('resortUpdated', message: 'Resort updated successfully.');
        } catch (\Exception $e) {
            $this->dispatch('resortError', message: 'Error updating resort: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.admin.resorts.edit')->layout('admin.layouts.app');
    }
}
