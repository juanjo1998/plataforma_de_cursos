<?php

namespace App\Http\Livewire;

use App\Models\Course;
use Livewire\Component;
use App\Models\Lesson;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CourseStatus extends Component
{
    use AuthorizesRequests;

    public $course;
    public $current;

    public function mount(Course $course)
    {
        $this->course = $course;

        foreach($course->lessons as $lesson){
            if (!$lesson->completed) {
                
                $this->current = $lesson;

                break;
            }
        }

        if (!$this->current) {
            $this->current = $course->lessons->last();
        }

        //policy

        $this->authorize('enrolled',$course);

    }

    /* methods */

    public function changeLesson(Lesson $lesson)
    {
        $this->current = $lesson;       
    }

    public function completed()
    {
        if ($this->current->completed) {
            //Eliminar registro culminado
            $this->current->users()->detach(auth()->user()->id);

        }else{
            //Agregar registro como culminado
            $this->current->users()->attach(auth()->user()->id);
        }

        $this->current = Lesson::find($this->current->id);
        $this->course = Course::find($this->course->id);
    }

    /* computed properties */

    public function getIndexProperty()
    {
        /* index */
        return $this->course->lessons->pluck('id')->search($this->current->id);
    }

    public function getPreviousProperty()
    {
        if ($this->index == 0) {
            return null;           
        }else{
            /* previous */
            return $this->course->lessons[$this->index - 1];
        }
    }

    public function getNextProperty()
    {
        if ($this->index == $this->course->lessons->count() - 1) {
            /* next */
            return null;
        }else{
            return $this->course->lessons[$this->index + 1];
        }
    }

    public function getAdvanceProperty()
    {
        $i = 0;

        foreach($this->course->lessons as $lesson){
            if ($lesson->completed) {
                $i++;
            }
        }

        $advance = ($i * 100) / ($this->course->lessons->count());

        return round($advance,2);
    }

    public function render()
    {
        return view('livewire.course-status');
    }
}
