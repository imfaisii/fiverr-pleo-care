<?php

namespace App\Http\Livewire\Tables;

use App\Enums\ShiftsEnum;
use App\Models\ShiftProposal;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Rules\{Rule, RuleActions};
use PowerComponents\LivewirePowerGrid\Traits\ActionButton;
use PowerComponents\LivewirePowerGrid\{Button, Column, Exportable, Footer, Header, PowerGrid, PowerGridComponent, PowerGridEloquent};

final class ShiftProposalsTable extends PowerGridComponent
{
    use ActionButton;

    public function proposalUpdate(ShiftProposal $model, string $status)
    {
        $model->load('shift');
        if ($model->shift->status->value !== ShiftsEnum::COMPLETED) {
            $model->update(['status' => $status, 'manager_id' => auth()->user()->manager->id]);

            $this->emit('toast', 'success', 'Success Notfication', 'Shift status was updated successfully.');
        } else {
            $this->emit('toast', 'error', 'Error Notfication', 'Cannot change status of already completed shift.');
        }
    }
    /*
    |--------------------------------------------------------------------------
    |  Features Setup
    |--------------------------------------------------------------------------
    | Setup Table's general features
    |
    */
    public function setUp(): array
    {
        $this->showCheckBox();

        return [
            Exportable::make('export')
                ->striped()
                ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV),
            Header::make()->showSearchInput(),
            Footer::make()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    /*
    |--------------------------------------------------------------------------
    |  Datasource
    |--------------------------------------------------------------------------
    | Provides data to your Table using a Model or Collection
    |
    */

    /**
     * PowerGrid datasource.
     *
     * @return Builder<\App\Models\ShiftProposal>
     */
    public function datasource(): Builder
    {
        return ShiftProposal::query()->where('company_id', auth()->user()->manager->company_id)->with(['shift', 'employee.user', 'manager.user']);
    }

    /*
    |--------------------------------------------------------------------------
    |  Relationship Search
    |--------------------------------------------------------------------------
    | Configure here relationships to be used by the Search and Table Filters.
    |
    */

    /**
     * Relationship search.
     *
     * @return array<string, array<int, string>>
     */
    public function relationSearch(): array
    {
        return [];
    }

    /*
    |--------------------------------------------------------------------------
    |  Add Column
    |--------------------------------------------------------------------------
    | Make Datasource fields available to be used as columns.
    | You can pass a closure to transform/modify the data.
    |
    | ❗ IMPORTANT: When using closures, you must escape any value coming from
    |    the database using the `e()` Laravel Helper function.
    |
    */
    public function addColumns(): PowerGridEloquent
    {
        return PowerGrid::eloquent()
            ->addColumn('shift_id', fn (ShiftProposal $model) => $model->shift->address_address)
            ->addColumn('employee_id', fn (ShiftProposal $model) => $model->employee->user->name)
            ->addColumn('manager_id', fn (ShiftProposal $model) => $model->manager?->user?->name ?? 'No manager yet')
            ->addColumn('status')

            /** Example of custom column using a closure **/
            ->addColumn('status_lower', function (ShiftProposal $model) {
                return strtolower(e($model->status));
            })

            ->addColumn('created_at_formatted', fn (ShiftProposal $model) => Carbon::parse($model->created_at)->format('d/m/Y H:i:s'))
            ->addColumn('updated_at_formatted', fn (ShiftProposal $model) => Carbon::parse($model->updated_at)->format('d/m/Y H:i:s'));
    }

    /*
    |--------------------------------------------------------------------------
    |  Include Columns
    |--------------------------------------------------------------------------
    | Include the columns added columns, making them visible on the Table.
    | Each column can be configured with properties, filters, actions...
    |
    */

    /**
     * PowerGrid Columns.
     *
     * @return array<int, Column>
     */
    public function columns(): array
    {
        return [

            Column::make('SHIFT ADDRESS', 'shift_id')
                ->sortable()
                ->searchable(),


            Column::make('EMPLOYEE ID', 'employee_id')
                ->sortable()
                ->searchable(),

            Column::make('MANAGER ID', 'manager_id')
                ->sortable()
                ->searchable(),

            Column::make('STATUS', 'status')
                ->sortable()
                ->searchable(),

            Column::make('CREATED AT', 'created_at_formatted', 'created_at')
                ->sortable()
                ->searchable(),

            Column::make('UPDATED AT', 'updated_at_formatted', 'updated_at')
                ->sortable()
                ->searchable(),


        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Actions Method
    |--------------------------------------------------------------------------
    | Enable the method below only if the Routes below are defined in your app.
    |
    */

    /**
     * PowerGrid ShiftProposal Action Buttons.
     *
     * @return array<int, Button>
     */


    public function actions(): array
    {
        return [
            Button::add('my-custom-button')
                ->bladeComponent('proposal-submit', ['shiftId' => 'id', 'status' => 'status']),
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Actions Rules
    |--------------------------------------------------------------------------
    | Enable the method below to configure Rules for your Table and Action Buttons.
    |
    */

    /**
     * PowerGrid ShiftProposal Action Rules.
     *
     * @return array<int, RuleActions>
     */

    /*
    public function actionRules(): array
    {
       return [

           //Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($shift-proposal) => $shift-proposal->id === 1)
                ->hide(),
        ];
    }
    */
}
