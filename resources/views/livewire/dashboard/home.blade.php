<div>
    @role(\App\Constants\Constant::SUPER_ADMIN)
        <livewire:dashboard.components.super-admin.cards-component />
    @endrole

    @role(\App\Constants\Constant::MANAGER)
        <livewire:dashboard.components.manager.popular-employee-and-job-role />

        <livewire:dashboard.components.manager.carer-log-times />
    @endrole

    @hasanyrole([\App\Constants\Constant::COMPANY, \App\Constants\Constant::MANAGER])
        <livewire:dashboard.components.company.shifts-feedback />

        <livewire:dashboard.components.company.shifts-graph />
    @endrole

    @role(\App\Constants\Constant::EMPLOYEE)
        <livewire:dashboard.components.employee.cards-component />

        <div class="row">
            <livewire:dashboard.components.employee.upcoming-shifts />

            <livewire:dashboard.components.employee.shifts-history />
        </div>
    @endrole

    <livewire:dashboard.components.master.chat-component />
</div>
