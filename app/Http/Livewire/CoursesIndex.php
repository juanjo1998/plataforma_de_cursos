<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Course;
use App\Models\Level;
use Livewire\Component;
use Livewire\WithPagination;

class CoursesIndex extends Component
{
    use WithPagination;
    
    public $categories_name = 'Categorías';
    public $levels_name = 'Niveles';
    public $category_id;
    public $level_id;

    public function updatedCategoryId()
    {
        $category_name = Category::find($this->category_id)->name;
        $this->categories_name = $category_name;
    }

    public function updatedLevelId()
    {
        $level_name = Level::find($this->level_id)->name;
        $this->levels_name = $level_name;
    }

    public function resetFilter()
    {
        $this->reset(['category_id','level_id','categories_name']);
    }

    public function render()
    {
        $categories = Category::all();
        $levels = Level::all();

        $courses = Course::where('status',3)
        ->category($this->category_id)
        ->level($this->level_id)
        ->latest('id')
        ->paginate();

        return view('livewire.courses-index',compact('courses','categories','levels'));
    }
}
