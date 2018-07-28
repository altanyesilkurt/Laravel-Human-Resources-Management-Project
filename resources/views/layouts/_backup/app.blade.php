@include('layouts.header')
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        @auth
                       {{-- <li><a class="nav-link" href="/companies">Companies</a></li>
                            <li><a class="nav-link" href="/departments">Departments</a></li>
                            <li><a class="nav-link" href="/branches">Branches</a></li>--}}
                            {{--<li><a class="nav-link" href="/titles">Titles</a></li>--}}
                            {{--<li><a class="nav-link" href="/employees">Employees</a></li>
                            <li><a class="nav-link" href="/candidates">Candidates</a></li>
                            <li><a class="nav-link" href="/tasks">Tasks</a></li>
                            <li><a class="nav-link" href="/sms_logs">Sms</a></li>--}}
                            <li><a class="nav-link" href="/companyReports">CompanyReport</a></li>
                            <li><a class="nav-link" href="/departmentReports">DepartmentReport</a></li>
                            <li><a class="nav-link" href="/branchReports">BranchReport</a></li>
                            <li><a class="nav-link" href="/titleReports">TitleReport</a></li>
                            <li><a class="nav-link" href="/employeeReports">EmployeeReport</a></li>

                            <li><a class="nav-link" href="/candidateReports">CandidateReport</a></li>
                            <li><a class="nav-link" href="/tasks">Tasks</a></li>
                            <li><a class="nav-link" href="/reports">Report</a></li>
                        @endauth
                      </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                            <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
@stack('scripts')
</body>
</html>
