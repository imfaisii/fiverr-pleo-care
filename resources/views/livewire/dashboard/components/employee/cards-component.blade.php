<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    <div class="row">

        <div class="col-xl-6 col-12">
            <div class="box box-body bg-success">
                <h6 class="text-uppercase">Hours Worked ( This Month )</h6>
                <div class="flexbox mt-2">
                    <span class="fs-30">{{ $data['monthly_minutes'] }}</span>
                    <span class="icon-Like fs-40">
                        <i class="fa fa-clock"></i>
                    </span>
                </div>
            </div>
        </div>
        <!-- /.col -->
        <div class="col-xl-6 col-12">
            <div class="box box-body bg-info">
                <h6 class="text-uppercase">Hours Worked ( This Week )</h6>
                <div class="flexbox mt-2">
                    <span class="icon-Group-chat fs-40">
                        <i class="fa fa-tasks"></i>
                    </span>
                    <span class="fs-30 text-white-70">{{ $data['weekly_minutes'] }}</span>
                </div>
            </div>
        </div>
        <!-- /.col -->
    </div>
</div>
