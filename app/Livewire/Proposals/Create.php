<?php

namespace App\Livewire\Proposals;

use App\Models\Project;
use Livewire\Component;
use Illuminate\Validation\Rule;

class Create extends Component
{
    public Project $project;
    public bool $modal = false;
    public string $email = '';
    public int $hours = 0;

    protected $rules = [
        'email' => ['required', 'email'],
        'hours' => ['required', 'numeric', 'gt:0'],
    ];

    public bool $agree = false;

    public function save()
    {
        
        $this->validate();
        
        if (! $this->agree) {
            $this->addError('agree', 'Você precisa aceitar os termos e condicoes');
            return;
        }

        $this->project->proposals()
            ->updateOrCreate([
                'email' => $this->email,
            ], [
                'hours' => $this->hours,
            ]);
        
        $this->modal = false;
    }

    public function render()
    {
        return view('livewire.proposals.create');
    }
}
