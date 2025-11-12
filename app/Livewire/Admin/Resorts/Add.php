<?php

namespace App\Livewire\Admin\Resorts;

use App\Models\Resort;
use Livewire\Component;
use Livewire\WithFileUploads;
use Cloudinary\Cloudinary;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class Add extends Component
{
    use WithFileUploads;

    public $resort_name;
    public $resort_address;
    public $slug;
    public $detail;
    public $primary_img;
    public $img_1;
    public $img_2;
    public $img_3;
    public $img_4;
    public $img_5;

    protected $rules = [
        'resort_name' => 'required|string|max:255',
        'resort_address' => 'required|string|max:255',
        'slug' => 'required|string|max:255|unique:resorts,slug',
        'detail' => 'required|string',
        'primary_img' => 'required|image|max:2048',
        'img_1' => 'required|image|max:2048',
        'img_2' => 'required|image|max:2048',
        'img_3' => 'required|image|max:2048',
        'img_4' => 'required|image|max:2048',
        'img_5' => 'required|image|max:2048',
    ];

    protected $messages = [
        'resort_name.required' => 'Resort name is required.',
        'resort_name.max' => 'Resort name cannot exceed 255 characters.',
        'resort_address.required' => 'Resort address is required.',
        'resort_address.max' => 'Resort address cannot exceed 255 characters.',
        'slug.required' => 'Slug is required.',
        'slug.unique' => 'This slug is already taken.',
        'detail.required' => 'Detail is required.',
        'primary_img.required' => 'Primary image is required.',
        'primary_img.image' => 'Primary image must be a valid image file.',
        'primary_img.max' => 'Primary image size cannot exceed 2MB.',
        '*.image' => 'File must be a valid image.',
        '*.max' => 'Image size cannot exceed 2MB.',
    ];

    public function store()
    {
        try {
            $this->validate();
            $cloudinary = new Cloudinary(config('cloudinary.cloud_url'));
            $primaryImageUrl = $this->uploadToCloudinary($cloudinary, $this->primary_img, 'primary');
            $imageUrls = [];
            $images = [
                'img_1' => $this->img_1,
                'img_2' => $this->img_2,
                'img_3' => $this->img_3,
                'img_4' => $this->img_4,
                'img_5' => $this->img_5,
            ];

            foreach ($images as $key => $image) {
                $imageUrls[$key] = $this->uploadToCloudinary($cloudinary, $image, $key);
            }
            $resortData = [
                'resort_name' => $this->resort_name,
                'resort_address' => $this->resort_address,
                'slug' => Str::slug($this->slug),
                'detail' => $this->detail,
                'primary_img' => $primaryImageUrl,
                'img_1' => $imageUrls['img_1'],
                'img_2' => $imageUrls['img_2'],
                'img_3' => $imageUrls['img_3'],
                'img_4' => $imageUrls['img_4'],
                'img_5' => $imageUrls['img_5'],
            ];
            $resort = Resort::create($resortData);
            $this->reset();
            $this->dispatch('resortCreated', message: 'Resort added successfully.');
        } catch (\Exception $e) {
            $this->dispatch('resortError', message: 'Error creating resort try again later');
        }
    }

    private function uploadToCloudinary($cloudinary, $file, $type)
    {
        try {
            if (!$file) {
                throw new \Exception("No file provided for upload type: $type");
            }

            $uploaded = $cloudinary->uploadApi()->upload($file->getRealPath(), [
                'folder' => 'kazan/resorts',
                'format' => 'webp',
                'public_id' => 'resort_' . time() . '_' . $type . '_' . uniqid(),
                'transformation' => [
                    'quality' => 'auto',
                    'fetch_format' => 'auto'
                ]
            ]);

            if (!isset($uploaded['secure_url'])) {
                throw new \Exception("Failed to get secure URL from Cloudinary response for type: $type");
            }

            return $uploaded['secure_url'];
        } catch (\Exception $e) {
            Log::error("Cloudinary upload failed for type $type: " . $e->getMessage());
            throw $e;
        }
    }

    public function render()
    {
        return view('livewire.admin.resorts.add')->layout('admin.layouts.app');
    }
}
