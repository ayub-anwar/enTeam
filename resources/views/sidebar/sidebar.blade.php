<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            @if (Auth::user()->role_name=='Admin')
            <ul>
                <li class="menu-title">
                    <span>Main</span>
                </li>
                <li class="{{set_active(['home'])}} submenu">
                    <a href="#" class="{{ set_active(['home']) ? 'noti-dot' : '' }}">
                        <i class="la la-dashboard"></i>
                        <span> Dashboard</span> <span class="menu-arrow"></span>
                    </a>
                    <ul style="{{ request()->is('/*') ? 'display: block;' : 'display: none;' }}">
                        <li><a class="{{set_active(['home'])}}" href="{{ route('home') }}">Admin Dashboard</a></li>

                    </ul>
                </li>

                <li class="menu-title"> <span>Authentication</span> </li>
                <li class="{{set_active(['search/user/list','userManagement','activity/log','activity/login/logout'])}} submenu">
                    <a href="#" class="{{ set_active(['search/user/list','userManagement','activity/log','activity/login/logout']) ? 'noti-dot' : '' }}">
                        <i class="la la-user-secret"></i> <span> User Controller</span> <span class="menu-arrow"></span>
                    </a>
                    <ul style="{{ request()->is('/*') ? 'display: block;' : 'display: none;' }}">
                        <li><a class="{{set_active(['search/user/list','userManagement'])}}" href="{{ route('userManagement') }}">Users</a></li>
                        <li><a class="{{set_active(['activity/login/logout'])}}" href="{{ route('activity/login/logout') }}">Activity User</a></li>
                    </ul>
                </li>
                <li class="menu-title"> <span>Employees</span> </li>
                <li class="{{set_active(['all/employee/list','all/employee/list','all/employee/card','form/leaves/new','attendance/page','attendanceRecord','salary/page','form/departments/page','form/designations/page','task'])}} submenu">
                    <a href="#" class="{{ set_active(['all/employee/list','all/employee/card','form/holidays/new','form/leaves/new',
                    'form/leavesemployee/new','attendance/page','attendanceRecord', 'form/departments/page','form/designations/page','task']) ? 'noti-dot' : '' }}">
                        <i class="la la-user"></i> <span> Employees</span> <span class="menu-arrow"></span>
                    </a>
                    <ul style="{{ request()->is('/*') ? 'display: block;' : 'display: none;' }}">
                        <li><a class="{{set_active(['all/employee/card'])}}" href="{{ route('all/employee/card') }}">All Employees</a></li>
                        <li><a class="{{set_active(['form/holidays/new'])}}" href="{{ route('form/holidays/new') }}">Holidays</a></li>
                        <li><a class="{{set_active(['form/leaves/new'])}}" href="{{ route('form/leaves/new') }}">Leaves</a> </li>
                        <li><a class="{{set_active(['attendanceRecord'])}}" href="{{ route('attendanceRecord') }}">Attendance </a></li>
                        <li><a class="{{set_active(['attendance/page'])}}" href="{{ route('attendance/page') }}">Attendance (Admin)</a></li>
                        <li><a class="{{set_active(['task'])}}" href="{{ route('task') }}">Task </a></li>
                        <li><a class="{{set_active(['form/departments/page'])}}" href="{{ route('form/departments/page') }}">Departments</a></li>
                        <li><a class="{{set_active(['form/designations/page'])}}" href="{{ route('form/designations/page') }}">Designations</a></li>
                    </ul>
                </li>
                <li class="menu-title"> <span>Payments</span> </li>
                <li class="{{set_active(['form/salary/page','form/payroll/items'])}} submenu">
                    <a href="#" class="{{ set_active(['salary/page']) ? 'noti-dot' : '' }}">
                        <i class="la la-money"></i> <span> Payroll </span> <span class="menu-arrow"></span></a>
                    <ul style="{{ request()->is('/*') ? 'display: block;' : 'display: none;' }}">
                        <li><a class="{{set_active(['salary/page'])}}" href="{{ route('salary/page') }}"> Salary </a></li>
                    </ul>
                </li>              
                <li class="menu-title"> <span>Feedback</span> </li>
                <li class="{{set_active(['form/salary/page','form/payroll/items'])}} submenu">
                    <a href="#" class="{{ set_active(['form/feedback/page']) ? 'noti-dot' : '' }}"><i class="la la-comment"></i>
                        <span> Feedback </span><span class="menu-arrow"></span> </a>
                    <ul style="{{ request()->is('/*') ? 'display: block;' : 'display: none;' }}">
                        <li><a class="{{set_active(['form/feedback/page'])}}" href="{{ route('adminfeeback') }}"> Feedback </a></li>
                    </ul>
                </li>

                <li class="menu-title"> <span>Performance</span> </li>
                <li class="{{set_active(['form/performance/indicator/page','form/performance/page','form/performance/appraisal/page'])}} submenu">
                    <a href="#" class="{{ set_active(['form/performance/indicator/page','form/performance/page','form/performance/appraisal/page']) ? 'noti-dot' : '' }}"><i class="la la-graduation-cap"></i>
                        <span> Performance </span> <span class="menu-arrow"></span></a>
                    <ul style="{{ request()->is('/*') ? 'display: block;' : 'display: none;'}}">
                        <li><a class="{{set_active(['performance'])}}" href="{{ route('performance') }}"> Performance Employee </a></li>
                    </ul>
                </li>
                <li class="menu-title"> <span>En-Team Health Matrix</span> </li>
                <li class="{{set_active(['Health'])}} submenu">
                    <a href="#" class="{{ set_active(['Health']) ? 'noti-dot' : '' }}"><i class="la la-user-nurse"></i>
                        <span> Health Matrix </span> <span class="menu-arrow"></span></a>
                    <ul style="{{ request()->is('/*') ? 'display: block;' : 'display: none;'}}">
                        <li><a class="{{set_active(['Health'])}}" href="{{ route('Health') }}"> Set Appointments </a></li>
                        <li><a class="{{set_active(['Health2'])}}" href="{{ route('Health2') }}"> Health View </a></li>
                    </ul>
                </li>

                <li class="menu-title"> <span>Administration</span> </li>
                <li class="{{set_active(['user/dashboard/index','jobs/dashboard/index','user/dashboard/all','user/dashboard/applied/jobs','user/dashboard/interviewing','user/dashboard/offered/jobs','user/dashboard/visited/jobs','user/dashboard/archived/jobs','user/dashboard/save','jobs','job/applicants','job/details','page/manage/resumes','page/shortlist/candidates','page/interview/questions','page/offer/approvals','page/experience/level','page/candidates','page/schedule/timing','page/aptitude/result'])}} submenu">
                    <a href="#" class="{{ set_active(['user/dashboard/index','jobs/dashboard/index','user/dashboard/all','user/dashboard/save','jobs','job/applicants','job/details']) ? 'noti-dot' : '' }}"><i class="la la-briefcase"></i>
                        <span> Jobs </span> <span class="menu-arrow"></span>
                    </a>
                    <ul style="{{ request()->is('/*') ? 'display: block;' : 'display: none;' }} {{ (request()->is('job/applicants/*')) ? 'display: block;' : 'display: none;' }}">
                        <li><a class="{{set_active(['jobs/dashboard/index'])}}" href="{{ route('jobs/dashboard/index') }}"> Jobs Dasboard </a></li>
                        <li><a class="{{set_active(['jobs','job/applicants','job/details'])}} {{ (request()->is('job/applicants/*')) ? 'active' : '' }}" href="{{ route('jobs') }} "> Manage Jobs </a></li>
                        <li><a class="{{set_active(['page/manage/resumes'])}}" href="{{ route('page/manage/resumes') }}"> Manage Resumes </a></li>
                    </ul>
                </li>
            </ul>
            @else
            <ul>
                <li class="menu-title">
                    <span>Main</span>
                </li>
                <li class="{{set_active(['em/dashboard'])}} submenu">
                    <a href="#" class="{{ set_active(['em/dashboard']) ? 'noti-dot' : '' }}">
                        <i class="la la-dashboard"></i>
                        <span> Dashboard</span> <span class="menu-arrow"></span>
                    </a>
                    <ul style="{{ request()->is('/*') ? 'display: block;' : 'display: none;' }}">
                        <li><a class="{{set_active(['em/dashboard'])}}" href="{{ route('em/dashboard') }}">Employee Dashboard</a></li>
                    </ul>
                </li>
                <li class="menu-title"> <span>Employees</span> </li>
                <li class="{{set_active(['all/employee/list','all/employee/list','all/employee/card','form/leaves/new',
                    'form/leavesemployee/new','form/leavesettings/page','attendance/page',
                    'attendance/employee/page','form/departments/page','form/designations/page',
                    'form/timesheet/page','form/shiftscheduling/page','form/overtime/page'])}} submenu">
                    <a href="#" class="{{ set_active(['all/employee/list','all/employee/card','form/holidays/new','form/leaves/new',
                    'form/leavesemployee/new','form/leavesettings/page','attendance/page',
                    'attendance/employee/page','form/departments/page','form/designations/page',
                    'form/timesheet/page','form/shiftscheduling/page','form/overtime/page']) ? 'noti-dot' : '' }}">
                        <i class="la la-user"></i> <span> Employees</span> <span class="menu-arrow"></span>
                    </a>
                    <ul style="{{ request()->is('/*') ? 'display: block;' : 'display: none;' }}">
                        <li><a class="{{set_active(['form/holidays/new'])}}" href="{{ route('form/holidays/new') }}">Holidays</a></li>
                        <li><a class="{{set_active(['form/leavesemployee/new'])}}" href="{{route('form/leavesemployee/new')}}">Leaves</a></li>
                        <li><a class="{{set_active(['attendance/page'])}}" href="{{ route('attendance/page') }}">Attendance </a></li>
                        <li><a class="{{set_active(['task'])}}" href="{{ route('task') }}">Task </a></li>

                    </ul>
                </li>

                <li class="menu-title"> <span>Payments</span> </li>
                <li class="{{set_active(['form/salary/page','form/payroll/items'])}} submenu">
                    <a href="#" class="{{ set_active(['form/salary/page','form/payroll/items']) ? 'noti-dot' : '' }}"><i class="la la-money"></i>
                        <span> Payroll </span> <span class="menu-arrow"></span></a>
                    <ul style="{{ request()->is('/*') ? 'display: block;' : 'display: none;' }}">
                        <li><a href="{{ route('form/salary/page') }}"> Salary </a></li>
                    </ul>
                </li>

                <li class="menu-title"> <span>Performance</span> </li>
                <li class="{{set_active(['form/performance/indicator/page','form/performance/page','form/performance/appraisal/page'])}} submenu">
                    <a href="#" class="{{ set_active(['form/performance/indicator/page','form/performance/page','form/performance/appraisal/page']) ? 'noti-dot' : '' }}"><i class="la la-graduation-cap"></i>
                        <span> Performance </span> <span class="menu-arrow"></span></a>
                    <ul style="{{ request()->is('/*') ? 'display: block;' : 'display: none;' }}">
                        <li><a class="{{set_active(['performance/employee'])}}" href="{{ route('performance/employee') }}"> Performance </a></li>
                    </ul>
                </li>                
                <li class="menu-title"> <span>Feedback</span> </li>
                <li class="{{set_active(['form/salary/page','form/payroll/items'])}} submenu">
                    <a href="#" class="{{ set_active(['form/feedback/page']) ? 'noti-dot' : '' }}"><i class="la la-comment"></i>
                        <span> Feedback </span><span class="menu-arrow"></span> </a>
                    <ul style="{{ request()->is('/*') ? 'display: block;' : 'display: none;' }}">
                        <li><a class="{{set_active(['form/feedback/page'])}}" href="{{ route('form/feedback/page') }}"> Feedback  </a></li>
                    </ul>
                </li>

                <li class="menu-title"> <span>En-Team Health Matrix</span> </li>
                <li class="{{set_active(['Health'])}} submenu">
                    <a href="#" class="{{ set_active(['Health']) ? 'noti-dot' : '' }}"><i class="la la-user-nurse"></i>
                        <span> Health Matrix </span> <span class="menu-arrow"></span></a>
                    <ul style="{{ request()->is('/*') ? 'display: block;' : 'display: none;'}}">
                        <li><a class="{{set_active(['HealthEmployee'])}}" href="{{ route('HealthEmployee') }}"> Health Appointment </a></li>
                    </ul>
                </li>
            </ul>
            @endif
        </div>
    </div>
</div>
<!-- /Sidebar -->