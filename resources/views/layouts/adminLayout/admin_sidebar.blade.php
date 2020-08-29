<?php $url = url()->current(); ?>
{{-- sidebar-menu --}}
<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
  <ul>
    <li <?php if (preg_match("/dashboard/i", $url)){ ?> class="active" <?php } ?>><a href="{{ url('admin/dashboard') }}"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>

        <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Collection</span> <span class="label label-important">2</span></a>
            <ul <?php if (preg_match("/Collection/i", $url)){ ?> style="display:block;" <?php } ?>>
                <li <?php if (preg_match("/add-collection/i", $url)){ ?> class="active" <?php } ?>><a href="{{ url('/admin/add-collection') }}">Add collection</a></li>
                <li <?php if (preg_match("/view-collections/i", $url)){ ?> class="active" <?php } ?>><a href="{{ url('/admin/view-collections') }}">View collection</a></li>
            </ul>
        </li>
        <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Titles</span> <span class="label label-important">2</span></a>
            <ul <?php if (preg_match("/title/i", $url)){ ?> style="display:block;" <?php } ?>>
                <li <?php if (preg_match("/add-title/i", $url)){ ?> class="active" <?php } ?>><a href="{{ url('/admin/add-title') }}">Add title</a></li>
                <li <?php if (preg_match("/view-title/i", $url)){ ?> class="active" <?php } ?>><a href="{{ url('/admin/view-titles') }}">View title</a></li>
            </ul>
        </li>
        <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Organisations</span> <span class="label label-important">2</span></a>
            <ul <?php if (preg_match("/organisation/i", $url)){ ?> style="display:block;" <?php } ?>>
                <li <?php if (preg_match("/add-organisation/i", $url)){ ?> class="active" <?php } ?>><a href="{{ url('/admin/add-organisation') }}">Add organisation</a></li>
                <li <?php if (preg_match("/view-organisations/i", $url)){ ?> class="active" <?php } ?>><a href="{{ url('/admin/view-organisations') }}">View organisations</a></li>
            </ul>
        </li>
        <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Service Type</span> <span class="label label-important">2</span></a>
            <ul <?php if (preg_match("/service_type/i", $url)){ ?> style="display:block;" <?php } ?>>
                <li <?php if (preg_match("/add-service_type/i", $url)){ ?> class="active" <?php } ?>><a href="{{ url('/admin/add-service_type') }}">Add Service Type</a></li>
                <li <?php if (preg_match("/view-service_types/i", $url)){ ?> class="active" <?php } ?>><a href="{{ url('/admin/view-service_types') }}">View Service Types</a></li>
            </ul>
        </li>
        <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Bible Classes</span> <span class="label label-important">2</span></a>
            <ul <?php if (preg_match("/class/i", $url)){ ?> style="display:block;" <?php } ?>>
                <li <?php if (preg_match("/add-class/i", $url)){ ?> class="active" <?php } ?>><a href="{{ url('/admin/add-class') }}">Add Bible class</a></li>
                <li <?php if (preg_match("/view-classes/i", $url)){ ?> class="active" <?php } ?>><a href="{{ url('/admin/view-classes') }}">View Bible classes</a></li>
            </ul>
        </li>
        <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Class Leaders</span> <span class="label label-important">2</span></a>
            <ul <?php if (preg_match("/class_leader/i", $url)){ ?> style="display:block;" <?php } ?>>
                <li <?php if (preg_match("/add-class_leader/i", $url)){ ?> class="active" <?php } ?>><a href="{{ url('/admin/add-class_leader') }}">Add Class Leader</a></li>
                <li <?php if (preg_match("/view-class_leaders/i", $url)){ ?> class="active" <?php } ?>><a href="{{ url('/admin/view-class_leaders') }}">View Class Leaders</a></li>
            </ul>
        </li>
        <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Adult Membership</span> <span class="label label-important">2</span></a>
            <ul <?php if (preg_match("/adult/i", $url)){ ?> style="display:block;" <?php } ?>>
                <li <?php if (preg_match("/view-adult_first-service/i", $url)){ ?> class="active" <?php } ?>><a href="{{ url('/admin/view-adult_first-service') }}">View first-service members</a></li>
                <li <?php if (preg_match("/view-adult_second-service/i", $url)){ ?> class="active" <?php } ?>><a href="{{ url('/admin/view-adult_second-service') }}">View second-service members</a></li>
            </ul>
        </li>
        <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Children Classes</span> <span class="label label-important">2</span></a>
            <ul <?php if (preg_match("/children_class/i", $url)){ ?> style="display:block;" <?php } ?>>
                <li <?php if (preg_match("/add-childclass/i", $url)){ ?> class="active" <?php } ?>><a href="{{ url('/admin/add-childclass') }}">Add Children Class</a></li>
                <li <?php if (preg_match("/view-childclasses/i", $url)){ ?> class="active" <?php } ?>><a href="{{ url('/admin/view-childclasses') }}">View Children Classes</a></li>
            </ul>
        </li>
        <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Children</span> <span class="label label-important">2</span></a>
            <ul <?php if (preg_match("/children/i", $url)){ ?> style="display:block;" <?php } ?>>
                <li <?php if (preg_match("/view-children_first-service/i", $url)){ ?> class="active" <?php } ?>><a href="{{ url('/admin/view-children_first-service') }}">View first-service members</a></li>
                <li <?php if (preg_match("/view-children_second-service/i", $url)){ ?> class="active" <?php } ?>><a href="{{ url('/admin/view-children_second-service') }}">View second-service members</a></li>
            </ul>
        </li>

        <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Children Attendance</span> <span class="label label-important">2</span></a>
            <ul <?php if (preg_match("/attend/i", $url)){ ?> style="display:block;" <?php } ?>>
                <li <?php if (preg_match("/attendance/i", $url)){ ?> class="active" <?php } ?>><a href="{{ url('/admin/attendance') }}">Take Attendance</a></li>
                <li <?php if (preg_match("/view-attend/i", $url)){ ?> class="active" <?php } ?>><a href="{{ url('/admin/attend-view') }}">View Attendance</a></li>
            </ul>
        </li>
        <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Children Marks Entry</span> <span class="label label-important">2</span></a>
            <ul <?php if (preg_match("/marks/i", $url)){ ?> style="display:block;" <?php } ?>>
                <li <?php if (preg_match("/add-year/i", $url)){ ?> class="active" <?php } ?>><a href="{{ url('/admin/add-year') }}">Add Exams Year</a></li>
                <li <?php if (preg_match("/add-marks/i", $url)){ ?> class="active" <?php } ?>><a href="{{ url('/admin/marks') }}">Marks Entry</a></li>
                <li <?php if (preg_match("/view-marks/i", $url)){ ?> class="active" <?php } ?>><a href="{{ url('/admin/view-marks') }}">View Marks</a></li>
            </ul>
        </li>

        <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Admin</span> <span class="label label-important">2</span></a>
            <ul <?php if (preg_match("/admins/i", $url)){ ?> style="display:block;" <?php } ?>>
                <li <?php if (preg_match("/add-admin/i", $url)){ ?> class="active" <?php } ?>><a href="{{ url('/admin/add-admin') }}">Add Admin/Sub-Admin</a></li>
                <li <?php if (preg_match("/view-admins/i", $url)){ ?> class="active" <?php } ?>><a href="{{ url('/admin/view-admins') }}">View Admins/Sub-Admins</a></li>
            </ul>
        </li>
  </ul>
</div>
{{-- sidebar-menu --}}
