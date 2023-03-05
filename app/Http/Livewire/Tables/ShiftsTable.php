<?php

namespace App\Http\Livewire\Tables;

use App\Constants\Constant;
use App\Models\Shift;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Rules\{Rule, RuleActions};
use PowerComponents\LivewirePowerGrid\Traits\ActionButton;
use PowerComponents\LivewirePowerGrid\{Button, Column, Exportable, Footer, Header, PowerGrid, PowerGridComponent, PowerGridEloquent};

final class ShiftsTable extends PowerGridComponent
{
    use ActionButton;

    public function delete(Shift $shift)
    {
        if (in_array($shift->status, [Constant::COMPLETED])) {
            $this->emit('toast', 'error', 'Error Notfication', 'Cannot delete completed  shift.');
            return;
        }

        $shift->delete();
        $this->emit('toast', 'success', 'Success Notfication', 'Shift was deleted successfully.');
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
        return [
            Exportable::make('export')
                ->striped()
                ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV),
            Header::make()->showSearchInput()->showToggleColumns(),
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
     * @return Builder<\App\Models\Shift>
     */
    public function datasource(): Builder
    {
        return Shift::query()->whereBelongsTo(auth()->user()->manager)->with(['client', 'employee.user']);
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
    */
    public function addColumns(): PowerGridEloquent
    {
        return PowerGrid::eloquent()
            ->addColumn('name')
            ->addColumn('description')
            ->addColumn('expected_pay', fn (Shift $model) => "$model->expected_pay /-")
            ->addColumn('start_time_formatted', fn (Shift $model) => Carbon::parse($model->start_time)->format('d/m/Y H:i:s'))
            ->addColumn('end_time_formatted', fn (Shift $model) => Carbon::parse($model->end_time)->format('d/m/Y H:i:s'))
            ->addColumn('status')
            ->addColumn('client.name')
            ->addColumn('employee.name', function (Shift $model) {
                return $model->employee ? $model->employee->user->name : 'Not Assigned';
            })
            ->addColumn('created_at_formatted', fn (Shift $model) => Carbon::parse($model->created_at)->format('d/m/Y H:i:s'));
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

            Column::make('NAME', 'name')
                ->sortable()
                ->searchable(),

            Column::make('DESCRIPTION', 'description')
                ->sortable()
                ->searchable(),

            Column::make('EXPECTED PAY', 'expected_pay'),

            Column::make('START TIME', 'start_time_formatted', 'start_time')
                ->searchable()
                ->sortable(),

            Column::make('END TIME', 'end_time_formatted', 'end_time')
                ->searchable()
                ->sortable(),

            Column::make('STATUS', 'status')
                ->searchable()
                ->sortable(),

            Column::make('CLIENT NAME', 'client.name'),

            Column::make('EMPLOYEE ID', 'employee.name'),

            Column::make('CREATED AT', 'created_at_formatted', 'created_at')
                ->searchable()
                ->sortable(),

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
     * PowerGrid Shift Action Buttons.
     *
     * @return array<int, Button>
     */


    public function actions(): array
    {
        return [
            Button::add('my-custom-button')
                ->bladeComponent('delete-button', ['user' => 'id']),
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
     * PowerGrid Shift Action Rules.
     *
     * @return array<int, RuleActions>
     */

    /*
    public function actionRules(): array
    {
       return [

           //Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($shift) => $shift->id === 1)
                ->hide(),
        ];
    }
    */
}
