<?php

namespace App\Http\Livewire\Dashboard\Components\SuperAdmin;

use App\Models\Company;
use Carbon\Carbon;
use Livewire\Component;

class CardsComponent extends Component
{
    public $companies, $graphData;

    public function mount()
    {
        $this->companies = Company::with('user')->withCount('shifts')->get();
        [$this->graphData['companies'], $this->graphData['months']] = $this->getCompaniesByMonth();
    }

    public function getCompaniesByMonth()
    {
        $start_date = Carbon::now()->startOfYear();
        $end_date = Carbon::now()->endOfYear();

        $data = Company::whereBetween('created_at', [$start_date, $end_date])
            ->selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->groupBy('month')
            ->get();

        $companiesPerMonth = $data->map(fn ($d) => $d['count']);
        $months = $data->map(fn ($d) => Carbon::createFromFormat('!m', $d['month'])->format('F'));

        return [$companiesPerMonth, $months];
    }

    public function render()
    {
        return view('livewire.dashboard.components.super-admin.cards-component');
    }
}
