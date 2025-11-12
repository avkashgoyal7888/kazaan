<?php

namespace App\Livewire\Web;

use Livewire\Component;
use App\Models\Gallery as GalleryModel;

class Gallery extends Component
{
    public $galleries = [];
    public $hasMore = true;
    public $perPage = 1;
    public $currentPage = 1;
    public $filter = 'all';
    public $totalLoaded = 0;

    public function mount()
    {
        $this->loadGalleries();
    }

    public function loadGalleries()
    {
        $query = GalleryModel::where('status', 'Active')
            ->orderBy('id', 'desc');

        if ($this->filter !== 'all') {
            $query->where('type', ucfirst($this->filter));
        }

        $totalCount = $query->count();

        $newGalleries = $query->skip(($this->currentPage - 1) * $this->perPage)
            ->take($this->perPage)
            ->get();

        if ($this->currentPage === 1) {
            $this->galleries = $newGalleries->toArray();
        } else {
            if ($newGalleries->count() > 0) {
                $this->galleries = array_merge($this->galleries, $newGalleries->toArray());
            }
        }

        $this->totalLoaded = count($this->galleries);

        $this->hasMore = $this->totalLoaded < $totalCount && $newGalleries->count() > 0;
    }

    public function loadMore()
    {
        $this->currentPage++;
        $this->loadGalleries();
    }

    public function setFilter($filter)
    {
        $this->filter = $filter;
        $this->currentPage = 1;
        $this->galleries = [];
        $this->totalLoaded = 0;
        $this->hasMore = true;
        $this->loadGalleries();
    }

    public function render()
    {
        return view('livewire.web.gallery')->layout('web.layouts.app');
    }
}
