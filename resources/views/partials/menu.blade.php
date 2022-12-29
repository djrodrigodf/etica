<div id="sidebar" class="c-sidebar c-sidebar-fixed c-sidebar-lg-show">

    <div class="c-sidebar-brand d-md-down-none">
        <a class="c-sidebar-brand-full h4" href="#">
            {{ trans('panel.site_title') }}
        </a>
    </div>

    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item">
            <a href="{{ route("admin.home") }}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-fw fa-tachometer-alt">

                </i>
                {{ trans('global.dashboard') }}
            </a>
        </li>
        @can('user_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/permissions*") ? "c-show" : "" }} {{ request()->is("admin/roles*") ? "c-show" : "" }} {{ request()->is("admin/users*") ? "c-show" : "" }} {{ request()->is("admin/audit-logs*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.userManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('permission_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.permissions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-unlock-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.permission.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('role_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.roles.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.role.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('user_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.users.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.user.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('audit_log_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.audit-logs.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/audit-logs") || request()->is("admin/audit-logs/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-file-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.auditLog.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('user_alert_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.user-alerts.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/user-alerts") || request()->is("admin/user-alerts/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-bell c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.userAlert.title') }}
                </a>
            </li>
        @endcan
        @can('business_partner_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.business-partners.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/business-partners") || request()->is("admin/business-partners/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-user c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.businessPartner.title') }}
                </a>
            </li>
        @endcan
        @can('construction_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.constructions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/constructions") || request()->is("admin/constructions/*") ? "c-active" : "" }}">
                    <i class="fa-fw far fa-building c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.construction.title') }}
                </a>
            </li>
        @endcan
        @can('admission_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.admissions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/admissions") || request()->is("admin/admissions/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.admission.title') }}
                </a>
            </li>
        @endcan
        @can('hiring_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.hirings.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/hirings") || request()->is("admin/hirings/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-user-tie c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.hiring.title') }}
                </a>
            </li>
        @endcan
        @can('third_party_registration_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.third-party-registrations.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/third-party-registrations") || request()->is("admin/third-party-registrations/*") ? "c-active" : "" }}">
                    <i class="fa-fw far fa-user-circle c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.thirdPartyRegistration.title') }}
                </a>
            </li>
        @endcan
        @can('setup_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/companies*") ? "c-show" : "" }} {{ request()->is("admin/exams*") ? "c-show" : "" }} {{ request()->is("admin/occupations*") ? "c-show" : "" }} {{ request()->is("admin/salaries*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.setup.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('company_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.companies.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/companies") || request()->is("admin/companies/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-building c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.company.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('exam_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.exams.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/exams") || request()->is("admin/exams/*") ? "c-active" : "" }}">
                                <i class="fa-fw fab fa-etsy c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.exam.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('occupation_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.occupations.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/occupations") || request()->is("admin/occupations/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-star c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.occupation.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('salary_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.salaries.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/salaries") || request()->is("admin/salaries/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-hand-holding-usd c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.salary.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @php($unread = \App\Models\QaTopic::unreadCount())
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.messenger.index") }}" class="{{ request()->is("admin/messenger") || request()->is("admin/messenger/*") ? "c-active" : "" }} c-sidebar-nav-link">
                    <i class="c-sidebar-nav-icon fa-fw fa fa-envelope">

                    </i>
                    <span>{{ trans('global.messages') }}</span>
                    @if($unread > 0)
                        <strong>( {{ $unread }} )</strong>
                    @endif

                </a>
            </li>
            @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                @can('profile_password_edit')
                    <li class="c-sidebar-nav-item">
                        <a class="c-sidebar-nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'c-active' : '' }}" href="{{ route('profile.password.edit') }}">
                            <i class="fa-fw fas fa-key c-sidebar-nav-icon">
                            </i>
                            {{ trans('global.change_password') }}
                        </a>
                    </li>
                @endcan
            @endif
            <li class="c-sidebar-nav-item">
                <a href="#" class="c-sidebar-nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    <i class="c-sidebar-nav-icon fas fa-fw fa-sign-out-alt">

                    </i>
                    {{ trans('global.logout') }}
                </a>
            </li>
    </ul>

</div>