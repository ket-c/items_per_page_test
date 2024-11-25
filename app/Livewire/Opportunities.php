<?php

namespace App\Livewire;

use App\Models\Item;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;
use Livewire\WithPagination;

class Opportunities extends Component
{
    use WithPagination;
    public $perPage = 5; // Default number of items per page
    public $options = [5, 10, 15, 20]; // Options for items per page
    protected $queryString = ['perPage']; // Keep perPage in the URL
    public $search = '';
    public $sortColumn = 'name';
    public $sortDirection = 'ASC';

    public function updatingPerPage()
    {
        $this->resetPage(); // Reset to the first page when perPage changes
    }
    public function render()
    {
        $cacheKey = $this->cacheKey();

        $items = Cache::remember($cacheKey, now()->addMinutes(30), function () { // expire cache every 30 minutes
            return Item::query()
                ->select('name')
                ->when($this->search, fn($query) =>
                    $query->where('name', 'like', '%' . $this->search . '%')
                )
                ->orderBy($this->sortColumn, $this->sortDirection)
                ->paginate($this->perPage);
        });

        return view('livewire.opportunities', [
            'items' => $items,
        ]);
    }

    //function to handle dynamic sorting on table columns
    public function sortBy($column)
    {
        if ($this->sortColumn === $column) {
            $this->sortDirection = $this->sortDirection === 'ASC' ? 'DESC' : 'ASC';
        } else {
            $this->sortColumn = $column;
            $this->sortDirection = 'ASC';
        }
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
    //use user input parameters to form cache key (so that different users fetch same records will be served from cache instead)
    private function cacheKey()
    {
        return $this->sortColumn . '-' . $this->sortDirection . '-' . $this->perPage . '-' . $this->getPage().'-' . $this->search;
    }
}
