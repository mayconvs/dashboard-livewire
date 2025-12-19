<?php

namespace App\Livewire\Users;

use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class UsersTable extends Component
{
    use WithPagination;

    public $search = '';
    public $role = '';
    public $status = '';
    public $sortField = 'name';
    public $sortDirection = 'asc';
    public $perPage = 30;

    protected $queryString = [
        'search' => ['except' => ''],
        'role' => ['except' => ''],
        'status' => ['except' => ''],
        'sortField',
        'sortDirection',
        'perPage'
    ];

    #[On('user_updated')]
    public function refreshTable()
    {
        $this->resetPage();
    }

    public function render()
    {
        $users = null;

        if($this->search) {
            $users = User::where('name', 'like', '%' . $this->search . '%')
                          ->orWhere('last_name', 'like', '%' . $this->search . '%')
                          ->orWhere('email', 'like', '%' . $this->search . '%')
                          ->orWhere('phone', 'like', '%' . $this->search . '%')
                          ->paginate($this->perPage);
        } else {
            $users = User::paginate($this->perPage);
        }
        /* $users = User::query()
            ->when($this->search, function ($query) {
                $query->where(function ($query) {
                    $query->where('name', 'like', '%' . $this->search . '%')
                        ->orWhere('email', 'like', '%' . $this->search . '%')
                        ->orWhere('phone', 'like', '%' . $this->search . '%');
                });
            })
            ->when($this->role, fn($q) => $q->where('role', $this->role))
            ->when($this->status !== '', fn($q) => $q->where('active', $this->status))
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate($this->perPage); */

        return view('livewire.users.users-table')->with('users', $users);
    }

    public function openEditModal($user_id)
    {
        $this->dispatch('open-edit-user-modal', id: $user_id);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingPerPage()
    {
        $this->resetPage();
    }

    public function updatingRole()
    {
        $this->resetPage();
    }

    public function updatingStatus()
    {
        $this->resetPage();
    }


    /* 

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortDirection = 'asc';
        }

        $this->sortField = $field;
    }

    

    public function render()
    {
        $users = User::query()
            ->when($this->search, function ($query) {
                $query->where(function ($query) {
                    $query->where('name', 'like', '%' . $this->search . '%')
                        ->orWhere('email', 'like', '%' . $this->search . '%')
                        ->orWhere('phone', 'like', '%' . $this->search . '%');
                });
            })
            ->when($this->role, fn($q) => $q->where('role', $this->role))
            ->when($this->status !== '', fn($q) => $q->where('active', $this->status))
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate($this->perPage);

        return view('livewire.users.users-table', [
            'users' => $users
        ]);
    } */
}
