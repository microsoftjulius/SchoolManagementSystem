<div id="layoutSidenav_nav">
    <nav class="sidenav shadow-right sidenav-dark">
        <div class="sidenav-menu">
            <div class="nav accordion" id="accordionSidenav">
                <div class="sidenav-menu-heading"></div>
                <a class="nav-link" href="/">
                    <div class="nav-link-icon"><i class="fa fa-dashboard"></i></div>
                    Dashboard 
                </a>
                <a class="nav-link active" href="javascript:void(0);" data-toggle="collapse" data-target="#collapseAccademics" aria-expanded="false" aria-controls="collapseDashboards">
                    <div class="nav-link-icon"><i class="fa fa-folder"></i></div>
                    Accademics 
                    <div class="sidenav-collapse-arrow"><i class="fa fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseAccademics" data-parent="#accordionSidenav">
                    <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPages">
                        <a class="nav-link" href="/get-all-time-tables">Time Tables</a>
                        <a class="nav-link" href="/get-all-subjects">Subjects</a>
                        <a class="nav-link" href="/get-all-home-works">Home Work</a>
                        <a class="nav-link" href="/get-all-exam-marks-for-students">Exam Marks</a>
                        <a class="nav-link" href="/get-all-past-papers">Past Papers</a>
                        <a class="nav-link" href="/get-all-terms">Terms</a>
                    </nav>
                </div>
                <a class="nav-link" href="javascript:void(0);" data-toggle="collapse" data-target="#collapseAccounting" aria-expanded="false" aria-controls="collapseDashboards">
                    <div class="nav-link-icon"><i class="fa fa-money"></i></div>
                    Accounting 
                    <div class="sidenav-collapse-arrow"><i class="fa fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseAccounting" data-parent="#accordionSidenav">
                    <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPages">
                        <a class="nav-link" href="/get-all-fees-payments">Fees</a>
                        <a class="nav-link" href="/get-all-messages">Sms Balance</a>
                    </nav>
                </div>
                <a class="nav-link" href="javascript:void(0);" data-toggle="collapse" data-target="#collapseActivities" aria-expanded="false" aria-controls="collapseDashboards">
                    <div class="nav-link-icon"><i class="fa fa-tasks"></i></div>
                    Activities 
                    <div class="sidenav-collapse-arrow"><i class="fa fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseActivities" data-parent="#accordionSidenav">
                    <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPages">
                        <a class="nav-link" href="/get-all-activities">Co Curricular Activities</a>
                        <a class="nav-link" href="/get-all-duties">Teachers Duties</a>
                        <a class="nav-link" href="/get-all-public-days">Public Days</a>
                    </nav>
                </div>
                <a class="nav-link" href="javascript:void(0);" data-toggle="collapse" data-target="#collapseClasses" aria-expanded="false" aria-controls="collapseDashboards">
                    <div class="nav-link-icon"><i class="fa fa-university"></i></div>
                    Classes 
                    <div class="sidenav-collapse-arrow"><i class="fa fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseClasses" data-parent="#accordionSidenav">
                    <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPages">
                        <a class="nav-link" href="/get-all-class-rooms">Class Rooms</a>
                        <a class="nav-link" href="/get-all-streams">Streams</a>
                    </nav>
                </div>
                {{-- <a class="nav-link" href="javascript:void(0);" data-toggle="collapse" data-target="#collapseMessages" aria-expanded="false" aria-controls="collapseDashboards">
                    <div class="nav-link-icon"><i class="fa fa-envelope-open"></i></div>
                    Messages 
                    <div class="sidenav-collapse-arrow"><i class="fa fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseMessages" data-parent="#accordionSidenav">
                    <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPages">
                        <a class="nav-link" href="/send-message">Send Message</a>
                        <a class="nav-link" href="/sent-messages">Sent Messages</a>
                        <a class="nav-link" href="/pending-messages">Pending Messages</a>
                    </nav>
                </div> --}}
                <a class="nav-link" href="javascript:void(0);" data-toggle="collapse" data-target="#collapseUsers" aria-expanded="false" aria-controls="collapseDashboards">
                    <div class="nav-link-icon"><i class="fa fa-users"></i></div>
                    Users 
                    <div class="sidenav-collapse-arrow"><i class="fa fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseUsers" data-parent="#accordionSidenav">
                    <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPages">
                        <a class="nav-link" href="/get-all-students">Students</a>
                        <a class="nav-link" href="/get-all-employees">Employees</a>
                        <a class="nav-link" href="/get-all-parents">Parents</a>
                    </nav>
                </div>
                <a class="nav-link" href="javascript:void(0);" data-toggle="collapse" data-target="#collapseSecurity" aria-expanded="false" aria-controls="collapseDashboards">
                    <div class="nav-link-icon"><i class="fa fa-cogs"></i></div>
                    Security 
                    <div class="sidenav-collapse-arrow"><i class="fa fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseSecurity" data-parent="#accordionSidenav">
                    <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPages">
                        <a class="nav-link" href="/roles-and-permissions">Roles and Permissions</a>
                        <a class="nav-link" href="/profile">Profile</a>
                    </nav>
                </div>
            </div>
        </div>
        <div class="sidenav-footer">
            <div class="sidenav-footer-content">
                <div class="sidenav-footer-subtitle">Logged in as:</div>
                <div class="sidenav-footer-title">{{ Auth::user()->name }}</div>
            </div>
        </div>
    </nav>
</div>