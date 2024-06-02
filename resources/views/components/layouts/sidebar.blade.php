<div class="sidebar sidebar-dark sidebar-main sidebar-expand-md">

    <!-- Sidebar mobile toggler -->
    <div class="sidebar-mobile-toggler text-center">
        <a href="#" class="sidebar-mobile-main-toggle">
            <i class="icon-arrow-left8"></i>
        </a>
        Navigation
        <a href="#" class="sidebar-mobile-expand">
            <i class="icon-screen-full"></i>
            <i class="icon-screen-normal"></i>
        </a>
    </div>
    <!-- /sidebar mobile toggler -->


    <!-- Sidebar content -->
    <div class="sidebar-content">

        <!-- User menu -->
        <div class="sidebar-user">
            <div class="card-body">
                <div class="media">
                    <div class="mr-3">
                        <a href="#"><img src="{{ avatar() }}" width="38" height="38"
                                class="rounded-circle" alt=""></a>
                    </div>

                    <div class="media-body">
                        <div class="media-title font-weight-semibold">Victoria Baker</div>
                        <div class="font-size-xs opacity-50">
                            <i class="icon-pin font-size-sm"></i> &nbsp;Santa Ana, CA
                        </div>
                    </div>

                    <div class="ml-3 align-self-center">
                        <a href="#" class="text-white"><i class="icon-cog3"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /user menu -->


        <!-- Main navigation -->
        <div class="card card-sidebar-mobile">
            <ul class="nav nav-sidebar" data-nav-type="accordion">

                <!-- Main -->
                <li class="nav-item-header">
                    <div class="text-uppercase font-size-xs line-height-xs">Main</div> <i class="icon-menu"
                        title="Main"></i>
                </li>
                <li class="nav-item">

                    <a href="{{ route('dashboard') }}"
                        class="nav-link {{ request()->is('dashboard*') ? 'active' : '' }}">
                        <i class="icon-home4"></i>
                        <span>
                            Dashboard
                        </span>
                    </a>
                </li>
                <li class="nav-item nav-item-submenu">
                    <a href="" class="nav-link {{ request()->is('swift-sale*') ? 'active' : '' }}">
                        <i class="icon-users"></i>
                        <span>Application Settings</span>
                    </a>
                    <ul class="nav nav-group-sub" data-submenu-title="User Management">
                        <li class="nav-item">
                            @can('view organization')
                                <a href="{{ route('organization.index') }}"
                                    class="nav-link {{ request()->routeIs('organization.index') ? 'active' : '' }}">
                                    <i class="icon-copy"></i>
                                    <span>Organization</span>
                                </a>
                            @endcan
                        </li>
                        <li class="nav-item">

                            <a href="{{ route('smtp.create') }}"
                                class="nav-link {{ request()->routeIs('smtp.create') ? 'active' : '' }}">
                                <i class="icon-cogs"></i>
                                <span>Application Smtp</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('sms.create') }}"
                                class="nav-link {{ request()->routeIs('sms.create') ? 'active' : '' }}">
                                <i class="icon-puzzle2"></i>
                                <span>SMS Gateway</span>
                            </a>
                        </li>
                    </ul>

                </li>

                <li class="nav-item nav-item-submenu">
                    <a href="" class="nav-link ">
                        <i class="icon-users"></i>
                        <span>User Management</span>
                    </a>
                    <ul class="nav nav-group-sub" data-submenu-title="User Management">
                        @can('view user')
                            <li class="nav-item">
                                <a href="{{ route('users.index') }}" class="nav-link ">
                                    <i class="icon-user-plus"></i>Add User
                                </a>
                            </li>
                        @endcan
                        <li class="nav-item">
                            @can('view role')
                                <a href="{{ route('roles.index') }}" class="nav-link ">
                                    <i class="icon-accessibility2"></i>Manage Role
                                </a>
                            </li>
                        @endcan
                        <li class="nav-item">
                            @can('view permission')
                                <a href="{{ route('permissions.index') }}" class="nav-link ">
                                    <i class="icon-list2"></i>Manage Permission
                                </a>
                            @endcan
                        </li>
                    </ul>
                </li>

                <!-- Uncomment the following section -->

                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link {{ request()->is('product*') ? 'active' : '' }}">
                        <i class="icon-versions"></i>
                        <span>Product</span>
                    </a>
                    <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                        <li class="nav-item">
                            @can('view product')
                                <a href="{{ route('product.index') }}"
                                    class="nav-link {{ request()->routeIs('product.index') ? 'active' : '' }}">
                                    <i class="icon-list"></i>Product List
                                </a>
                            @endcan
                        </li>
                        <li class="nav-item">
                            @can('create product')
                                <a href="{{ route('product.create') }}"
                                    class="nav-link {{ request()->routeIs('product.create') ? 'active' : '' }}">
                                    <i class="icon-add-to-list"></i>Product Add
                                </a>
                            @endcan
                        </li>
                        <li class="nav-item">
                            @can('view product')
                                <a href="{{ route('product.import') }}"
                                    class="nav-link {{ request()->routeIs('product.import') ? 'active' : '' }}">
                                    <i class="icon-file-upload"></i>Product Import
                                </a>
                            @endcan
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('slider.index') }}"
                                class="nav-link {{ request()->routeIs('slider.index') ? 'active' : '' }}">
                                <i class="icon-certificate"></i>Slider
                            </a>
                        </li>

                        <li class="nav-item">
                            @can('view brand')
                                <a href="{{ route('brand.index') }}"
                                    class="nav-link {{ request()->routeIs('brand.index') ? 'active' : '' }}">
                                    <i class="icon-certificate"></i>Brand
                                </a>
                            @endcan
                        </li>
                        <li class="nav-item">
                            @can('view product')
                                <a href="{{ route('category.index') }}"
                                    class="nav-link {{ request()->routeIs('category.index') ? 'active' : '' }}">
                                    <i class="icon-align-left"></i>Category
                                </a>
                            @endcan
                        </li>
                        <li class="nav-item">
                            @can('view subCategory')
                                <a href="{{ route('subCategory.index') }}"
                                    class="nav-link {{ request()->routeIs('subCategory.index') ? 'active' : '' }}">
                                    <i class="icon-align-left"></i>Sub Category
                                </a>
                            @endcan
                        </li>
                        <li class="nav-item">
                            @can('view unit')
                                <a href="{{ route('unit.index') }}"
                                    class="nav-link {{ request()->routeIs('unit.index') ? 'active' : '' }}">
                                    <i class="icon-meter-fast"></i>Unit
                                </a>
                            @endcan
                        </li>
                        <li class="nav-item">
                            @can('view barcodeType')
                                <a href="{{ route('barcodeType.index') }}"
                                    class="nav-link {{ request()->routeIs('barcodeType.index') ? 'active' : '' }}">
                                    <i class="icon-file-upload"></i>Barcode Type
                                </a>
                            @endcan
                        </li>
                        <li class="nav-item">
                            @can('view color')
                                <a href="{{ route('color.index') }}"
                                    class="nav-link {{ request()->routeIs('color.index') ? 'active' : '' }}">
                                    <i class="icon-paint-format"></i>Color
                                </a>
                            @endcan
                        </li>
                        <li class="nav-item">
                            @can('view size')
                                <a href="{{ route('size.index') }}"
                                    class="nav-link {{ request()->routeIs('size.index') ? 'active' : '' }}">
                                    <i class="icon-align-top"></i>Size
                                </a>
                            @endcan
                        </li>


                        <li class="nav-item">
                            @can('view size')
                                <a href="{{ route('shipping.index') }}"
                                    class="nav-link {{ request()->routeIs('shipping.index') ? 'active' : '' }}">
                                    <i class="icon-align-top"></i>shipping
                                </a>
                            @endcan
                        </li>

                        <li class="nav-item">
                            @can('view size')
                                <a href="{{ route('coupon.index') }}"
                                    class="nav-link {{ request()->routeIs('coupon.index') ? 'active' : '' }}">
                                    <i class="icon-align-top"></i>Coupon
                                </a>
                            @endcan
                        </li>
                    </ul>
                </li>


                <!-- End of uncommented section -->

                <li class="nav-item">
                    {{-- @can('view ') --}}
                    <a href="{{ route('pos.create') }}"
                        class="nav-link {{ request()->is('pos*') ? 'active' : '' }}">
                        <i class="icon-store2"></i>
                        <span>Point Of Sale</span>
                    </a>
                    {{-- @endcan --}}
                </li>
                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link {{ request()->is('expense*') ? 'active' : '' }}">
                        <i class="icon-minus3"></i>
                        <span>Expense</span>
                    </a>
                    <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                        <li class="nav-item">
                            @can('view payment-method')
                                <a href="{{ route('payment-method.index') }}"
                                    class="nav-link {{ request()->is('payment-method*') ? 'active' : '' }}">
                                    <i class="icon-paragraph-left2"></i>Payment Method
                                </a>
                            @endcan
                        </li>
                        <li class="nav-item">
                            @can('view expense-category')
                                <a href="{{ route('expense-category.index') }}"
                                    class="nav-link {{ request()->is('expense-category*') ? 'active' : '' }}">
                                    <i class="icon-paragraph-left2"></i>Expense Category
                                </a>
                            @endcan
                        </li>
                        <li class="nav-item">
                            @can('view expense')
                                <a href="{{ route('expenses.index') }}"
                                    class="nav-link {{ request()->is('expenses*') ? 'active' : '' }}">
                                    <i class="icon-list2"></i>Expenses
                                </a>
                            @endcan
                        </li>
                    </ul>
                </li>
                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link {{ request()->is('contacts*') ? 'active' : '' }}">
                        <i class="icon-users"></i>
                        <span>Contacts</span>
                    </a>
                    <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                        <li class="nav-item">
                            @can('view contact')
                                <a href="{{ route('contacts.index', ['type' => 'supplier']) }}"
                                    class="nav-link {{ request()->input('type') === 'supplier' ? 'active' : '' }}">
                                    <i class="icon-paragraph-left2"></i>Supplier
                                </a>
                            @endcan
                        </li>
                        <li class="nav-item">
                            @can('view customer')
                                <a href="{{ route('contacts.index', ['type' => 'customer']) }}"
                                    class="nav-link {{ request()->input('type') === 'customer' ? 'active' : '' }}">
                                    <i class="icon-paragraph-left2"></i>Customer
                                </a>
                            @endcan
                        </li>
                        <li class="nav-item">
                            @can('view contact')
                                <a href="{{ route('contacts.index') }}"
                                    class="nav-link {{ !request()->input('type') ? 'active' : '' }}">
                                    <i class="icon-paragraph-left2"></i>All Contacts
                                </a>
                            @endcan
                        </li>
                    </ul>
                </li>


                <li class="nav-item">
                    @can('view product')
                        <a href="{{ route('repair.index') }}"
                            class="nav-link {{ request()->is('repair*') ? 'active' : '' }}">
                            <i class="icon-users"></i>
                            <span>Repair</span>
                        </a>
                    @endcan
                </li>


                <li class="nav-item">
                    {{-- @can('view product') --}}
                    <a href="{{ route('blogs.index') }}"
                        class="nav-link {{ request()->is('blog*') ? 'active' : '' }}">
                        <i class="icon-users"></i>
                        <span>Blog</span>
                    </a>
                    {{-- @endcan --}}
                </li>

                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link {{ request()->is('campaign*') ? 'active' : '' }}">
                        <i class="icon-target2"></i>
                        <span>Campaign</span>
                    </a>
                    <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                        <li class="nav-item">
                            @can('view product')
                                <a href="{{ route('campaign.index') }}"
                                    class="nav-link {{ request()->is('campaign*') ? 'active' : '' }}">
                                    <i class="icon-paragraph-left2"></i>All Campaign
                                </a>
                            @endcan
                        </li>

                    </ul>
                </li>
                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link {{ request()->is('campaign*') ? 'active' : '' }}">
                        <i class="icon-target2"></i>
                        <span>HRM</span>
                    </a>
                    <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                        <li class="nav-item">
                            @can('view department')
                                <a href="{{ route('department.index') }}"
                                    class="nav-link {{ request()->routeIs('department.index') ? 'active' : '' }}">
                                    <i class="icon-align-top"></i>Department
                                </a>
                            @endcan
                        </li>
                        <li class="nav-item">
                            @can('view employee')
                                <a href="{{ route('employee.index') }}"
                                    class="nav-link {{ request()->is('employee*') ? 'active' : '' }}">
                                    <i class="icon-users"></i>
                                    <span>Employee</span>
                                </a>
                            @endcan
                        </li>
                        <li class="nav-item">
                            @can('view attendance')
                                <a href="{{ route('attendance.index') }}"
                                    class="nav-link {{ request()->is('attendance*') ? 'active' : '' }}">
                                    <i class="icon-users"></i>
                                    <span>Attendance</span>
                                </a>
                            @endcan
                        </li>
                        <li class="nav-item">
                            @can('view payroll')
                                <a href="{{ route('payroll.index') }}"
                                    class="nav-link {{ request()->is('payroll*') ? 'active' : '' }}">
                                    <i class="icon-users"></i>
                                    <span>Payroll</span>
                                </a>
                            @endcan
                        </li>

                        <li class="nav-item">
                            @can('view holiday')
                                <a href="{{ route('holiday.index') }}"
                                    class="nav-link {{ request()->routeIs('holiday.index') ? 'active' : '' }}">
                                    <i class="icon-align-top"></i>Holiday
                                </a>
                            @endcan
                        </li>

                        <li class="nav-item">
                            @can('view leaveType')
                                <a href="{{ route('leaveType.index') }}"
                                    class="nav-link {{ request()->routeIs('leaveType.index') ? 'active' : '' }}">
                                    <i class="icon-align-top"></i>Leave Type
                                </a>
                            @endcan
                        </li>

                        <li class="nav-item">
                            @can('view leave')
                                <a href="{{ route('leave.index') }}"
                                    class="nav-link {{ request()->routeIs('leave.index') ? 'active' : '' }}">
                                    <i class="icon-align-top"></i>Leave
                                </a>
                            @endcan
                        </li>

                    </ul>
                </li>
            </ul>
        </div>

        <!-- /main navigation -->

    </div>
    <!-- /sidebar content -->

</div>
