<div>
    {{-- The Master doesn't talk, he acts. --}}
    <div class="col-xl-12">
        <div class="box">
            <div class="box-header">
                <h4 class="box-title">Carer Login/Logout Records
                    <small class="subtitle">Details of carer logging in and logging out of the system.</small>
                </h4>
            </div>
            <div class="box-body p-0">
                <div class="table-responsive">
                    <table class="table no-border table-vertical-center">
                        <thead>
                            <tr>
                                <th class="p-0" style="width: 50px"></th>
                                <th class="p-0" style="min-width: 150px"></th>
                                <th class="p-0" style="min-width: 100px"></th>
                                <th class="p-0" style="min-width: 100px"></th>
                                <th class="p-0" style="min-width: 100px"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($carers as $carer)
                                <tr>
                                    <td>
                                        <div class="bg-lightest h-50 w-50 l-h-50 rounded text-center">
                                            <img src="{{ asset('images/avatar/avatar-4.png') }}" class="h-30"
                                                alt="Glass SVG">
                                        </div>
                                    </td>
                                    <td>
                                        <a href="#" class="text-dark fw-600 hover-primary fs-16">
                                            {{ $carer->user->name }}
                                        </a>
                                    </td>
                                    <td>
                                        <span class="text-fade">
                                            {{ $carer->user?->user_agent[0]['login_at'] ?? 'No login found.' }}
                                            <div>
                                                <small>( login ) </small>
                                            </div>
                                        </span>
                                    </td>
                                    <td>
                                        <span class="text-fade">
                                            {{ $carer->user?->user_agent[0]['logout_at'] ?? 'No logout found.' }}
                                            <div>
                                                <small>( logout ) </small>
                                            </div>
                                        </span>
                                    </td>
                                    <td>
                                        <span class="text-fade">
                                            {{ $carer->user?->user_agent[0]['ip'] ?? 'No IP found.' }}
                                            <div>
                                                <small>{{ $carer->user?->user_agent[0]['country'] ?? 'No country found.' }}</small>
                                            </div>
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
