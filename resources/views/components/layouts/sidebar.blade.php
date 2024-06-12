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
                <li
                    class="nav-item nav-item-submenu {{ request()->routeIs('organization*') || request()->routeIs('smtp*') || request()->routeIs('sms*') || request()->routeIs('tax*') ? 'nav-item-expanded nav-item-open' : '' }}">
                    <a href="#"
                        class="nav-link {{ request()->routeIs('organization*') || request()->routeIs('smtp*') || request()->routeIs('sms*') ? 'active' : '' }}">
                        <i class="icon-users"></i>
                        <span>Application Settings</span>
                    </a>
                    <ul class="nav nav-group-sub" data-submenu-title="User Management">
                        @can('view organization')
                            <li class="nav-item">
                                <a href="{{ route('organization.index') }}"
                                    class="nav-link {{ request()->routeIs('organization.index') || request()->routeIs('organization.create') || request()->routeIs('organization.edit') ? 'active' : '' }}">
                                    <i class="icon-copy"></i>
                                    <span>Organization</span>
                                </a>
                            </li>
                        @endcan
                        <li class="nav-item">
                            <a href="{{ route('smtp.create') }}"
                                class="nav-link {{ request()->routeIs('smtp.create') || request()->routeIs('smtp.create') || request()->routeIs('smtp.edit') ? 'active' : '' }}">
                                <i class="icon-cogs"></i>
                                <span>Application Smtp</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('sms.create') }}"
                                class="nav-link {{ request()->routeIs('sms.create') || request()->routeIs('sms.create') || request()->routeIs('sms.edit') ? 'active' : '' }}">
                                <i class="icon-puzzle2"></i>
                                <span>SMS Gateway</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            @can('view tax')
                                <a href="{{ route('tax.index') }}"
                                    class="nav-link {{ request()->routeIs('tax.index') || request()->routeIs('tax.create') || request()->routeIs('tax.edit') ? 'active' : '' }}">
                                    <i class="icon-certificate"></i>Tax
                                </a>
                            @endcan
                        </li>
                    </ul>
                </li>


                <li
                    class="nav-item nav-item-submenu {{ request()->routeIs('users*') || request()->routeIs('roles*') || request()->routeIs('permissions*') || request()->routeIs('permissions*') ? 'nav-item-expanded nav-item-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="icon-users"></i>
                        <span>User Management</span>
                    </a>
                    <ul class="nav nav-group-sub" data-submenu-title="User Management">
                        @can('view user')
                            <li class="nav-item">
                                <a href="{{ route('users.index') }}"
                                    class="nav-link {{ request()->routeIs('users.index') || request()->routeIs('users.create') || request()->routeIs('users.edit') ? 'active' : '' }}">
                                    <i class="icon-user-plus"></i>Add User
                                </a>
                            </li>
                        @endcan
                        @can('view role')
                            <li class="nav-item">
                                <a href="{{ route('roles.index') }}"
                                    class="nav-link {{ request()->routeIs('roles.index') || request()->routeIs('roles.create') || request()->routeIs('roles.edit') ? 'active' : '' }}">
                                    <i class="icon-accessibility2"></i>Manage Role
                                </a>
                            </li>
                        @endcan
                        @can('view permission')
                            <li class="nav-item">
                                <a href="{{ route('permissions.index') }}"
                                    class="nav-link {{ request()->routeIs('permissions.index') || request()->routeIs('permissions.create') || request()->routeIs('permissions.edit') ? 'active' : '' }}">
                                    <i class="icon-users4"></i>Manage Permission
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>

                <li
                    class="nav-item nav-item-submenu {{ request()->routeIs('product*') || request()->routeIs('brand.index') || request()->routeIs('category*') || request()->routeIs('subCategory*') || request()->routeIs('unit*') || request()->is('variables*') || request()->routeIs('barcodeType*') ? 'nav-item-expanded nav-item-open' : '' }}">
                    <a href="#"
                        class="nav-link {{ request()->routeIs('product*') || request()->routeIs('brand.index') || request()->routeIs('category*') || request()->routeIs('subCategory*') || request()->is('variables*') || request()->routeIs('unit*') || request()->routeIs('barcodeType*') ? 'active' : '' }}">
                        <i class="icon-basket"></i>
                        <span>Product</span>
                    </a>
                    <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                        <li class="nav-item">
                            @can('view variables')
                                <a href="{{ route('variables.index') }}"
                                    class="nav-link {{ request()->routeIs('variables.index') || request()->routeIs('variables.edit') ? 'active' : '' }}">
                                    <i class="icon-certificate"></i>Product Variations
                                </a>
                            @endcan
                        </li>
                        @can('view product')
                            <li class="nav-item">
                                <a href="{{ route('product.index') }}"
                                    class="nav-link {{ request()->routeIs('product.index') || request()->routeIs('product.edit') || request()->routeIs('product.view') ? 'active' : '' }}">
                                    <i class="icon-list"></i>Product List
                                </a>
                            </li>
                        @endcan
                        @can('create product')
                            <li class="nav-item">
                                <a href="{{ route('product.create') }}"
                                    class="nav-link {{ request()->routeIs('product.create') ? 'active' : '' }}">
                                    <i class="icon-add-to-list"></i>Product Add
                                </a>
                            </li>
                        @endcan
                        @can('view product')
                            <li class="nav-item">
                                <a href="{{ route('product.import') }}"
                                    class="nav-link {{ request()->routeIs('product.import') ? 'active' : '' }}">
                                    <i class="icon-file-upload"></i>Product Import
                                </a>
                            </li>
                        @endcan
                        @can('view brand')
                            <li class="nav-item">
                                <a href="{{ route('brand.index') }}"
                                    class="nav-link {{ request()->routeIs('brand.index') || request()->routeIs('brand.create') || request()->routeIs('brand.edit') ? 'active' : '' }}">
                                    <i class="icon-certificate"></i>Brand
                                </a>
                            </li>
                        @endcan
                        @can('view product')
                            <li class="nav-item">
                                <a href="{{ route('category.index') }}"
                                    class="nav-link {{ request()->routeIs('category.index') || request()->routeIs('category.create') || request()->routeIs('category.edit') ? 'active' : '' }}">
                                    <i class="icon-align-left"></i>Category
                                </a>
                            </li>
                        @endcan
                        @can('view subCategory')
                            <li class="nav-item">
                                <a href="{{ route('subCategory.index') }}"
                                    class="nav-link {{ request()->routeIs('subCategory.index') || request()->routeIs('subCategory.create') || request()->routeIs('subCategory.edit') ? 'active' : '' }}">
                                    <i class="icon-menu7"></i>Sub Category
                                </a>
                            </li>
                        @endcan
                        @can('view unit')
                            <li class="nav-item">
                                <a href="{{ route('unit.index') }}"
                                    class="nav-link {{ request()->routeIs('unit.index') || request()->routeIs('unit.create') || request()->routeIs('unit.edit') ? 'active' : '' }}">
                                    <i class="icon-meter-fast"></i>Unit
                                </a>
                            </li>
                        @endcan
                        @can('view barcodeType')
                            <li class="nav-item">
                                <a href="{{ route('barcodeType.index') }}"
                                    class="nav-link {{ request()->routeIs('barcodeType.index') || request()->routeIs('barcodeType.create') || request()->routeIs('barcodeType.edit') ? 'active' : '' }}">
                                    <i class="icon-barcode2"></i>Barcode Type
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>


                <li class="nav-item">
                    {{-- @can('view ') --}}
                    <a href="{{ route('pos.create') }}"
                        class="nav-link {{ request()->is('pos*') ? 'active' : '' }}">
                        <i class="icon-store2"></i>
                        <span>Point Of Sale</span>
                    </a>
                    {{-- @endcan --}}
                </li>
                <li
                    class="nav-item nav-item-submenu {{ request()->is('expense*') || request()->is('payment-method*') || request()->is('expense-category*') || request()->is('expenses*') ? 'nav-item-expanded nav-item-open' : '' }}">
                    <a href="#"
                        class="nav-link {{ request()->is('expense*') || request()->is('payment-method*') || request()->is('expense-category*') || request()->is('expenses*') ? 'active' : '' }}">
                        <i class="icon-coin-dollar"></i>
                        <span>Expense</span>
                    </a>
                    <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                        @can('view payment-method')
                            <li class="nav-item">
                                <a href="{{ route('payment-method.index') }}"
                                    class="nav-link {{ request()->is('payment-method*') ? 'active' : '' }}">
                                    <i class="icon-cash"></i>Payment Method
                                </a>
                            </li>
                        @endcan
                        @can('view expense-category')
                            <li class="nav-item">
                                <a href="{{ route('expense-category.index') }}"
                                    class="nav-link {{ request()->is('expense-category*') ? 'active' : '' }}">
                                    <i class="icon-wallet"></i>Expense Category
                                </a>
                            </li>
                        @endcan
                        @can('view expense')
                            <li class="nav-item">
                                <a href="{{ route('expenses.index') }}"
                                    class="nav-link {{ request()->is('expenses*') ? 'active' : '' }}">
                                    <i class="icon-coins"></i>Expenses
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>

                <li
                    class="nav-item nav-item-submenu {{ request()->is('contacts*') || request()->is('campaign*') ? 'nav-item-expanded nav-item-open' : '' }}">
                    <a href="#"
                        class="nav-link {{ request()->is('contacts*') || request()->is('campaign*') ? 'active' : '' }}">
                        <i class="icon-users"></i>
                        <span>Peoples</span>
                    </a>
                    <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                        <li class="nav-item">
                            @can('view contact')
                                <a href="{{ route('contacts.index', ['type' => 'supplier']) }}"
                                    class="nav-link {{ request()->input('type') === 'supplier' ? 'active' : '' }}">
                                    <i class="icon-finder"></i>Supplier
                                </a>
                            @endcan
                        </li>
                        <li class="nav-item">
                            @can('view customer')
                                <a href="{{ route('contacts.index', ['type' => 'customer']) }}"
                                    class="nav-link {{ request()->input('type') === 'customer' ? 'active' : '' }}">
                                    <i class="icon-users"></i>Customer
                                </a>
                            @endcan
                        </li>
                        <li class="nav-item">
                            @can('view product')
                                <a href="{{ route('campaign.index') }}"
                                    class="nav-link {{ request()->is('campaign*') && request()->routeIs('campaign.index') ? 'active' : '' }}">
                                    <i class="icon-file-text3"></i>Campaign List
                                </a>
                            @endcan
                        </li>
                        <li class="nav-item">
                            @can('view product')
                                <a href="{{ route('campaign.create') }}"
                                    class="nav-link {{ request()->is('campaign*') && request()->routeIs('campaign.create') ? 'active' : '' }}">
                                    <i class="icon-file-eye2"></i>Create Campaign
                                </a>
                            @endcan
                        </li>
                    </ul>
                </li>



                <li class="nav-item">
                    @can('view repair')
                        <a href="{{ route('repair.index') }}"
                            class="nav-link {{ request()->is('repair*') ? 'active' : '' }}">
                            <i class="icon-wrench3"></i>
                            <span>Repair</span>
                        </a>
                    @endcan
                </li>


                <li class="nav-item">
                    <a href="{{ route('comments.index') }}"
                        class="nav-link {{ request()->is('comment*') ? 'active' : '' }}">
                        <i class="icon-bubble8"></i>
                        <span>Comment </span>
                    </a>
                </li>
                    @can('view blog')
                        <a href="{{ route('blogs.index') }}"
                            class="nav-link {{ request()->is('blog*') ? 'active' : '' }}">
                            <i class="icon-file-video2"></i>
                            <span>Blog</span>
                        </a>
                    @endcan
                </li>
                <li
                    class="nav-item nav-item-submenu {{ request()->is('department*') || request()->is('employee*') || request()->is('attendance*') || request()->is('payroll*') || request()->is('holiday*') || request()->is('leaveType*') || request()->is('leave*') ? 'nav-item-expanded nav-item-open' : '' }}">
                    <a href="#"
                        class="nav-link {{ request()->is('department*') || request()->is('employee*') || request()->is('attendance*') || request()->is('payroll*') || request()->is('holiday*') || request()->is('leaveType*') || request()->is('leave*') ? 'active' : '' }}">
                        <i class="icon-user-tie"></i>
                        <span>HRM</span>
                    </a>
                    <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                        <li class="nav-item">
                            @can('view department')
                                <a href="{{ route('department.index') }}"
                                    class="nav-link {{ request()->routeIs('department.index') || request()->routeIs('department.create') || request()->routeIs('department.edit') ? 'active' : '' }}">
                                    <i class="icon-folder-open"></i>Department
                                </a>
                            @endcan
                        </li>
                        <li class="nav-item">
                            @can('view employee')
                                <a href="{{ route('employee.index') }}"
                                    class="nav-link {{ request()->is('employee*') || request()->routeIs('employee.create') || request()->routeIs('employee.edit') ? 'active' : '' }}">
                                    <i class="icon-users"></i>
                                    <span>Employee</span>
                                </a>
                            @endcan
                        </li>
                        <li class="nav-item">
                            @can('view attendance')
                                <a href="{{ route('attendance.index') }}"
                                    class="nav-link {{ request()->is('attendance*') || request()->routeIs('attendance.create') || request()->routeIs('attendance.edit') ? 'active' : '' }}">
                                    <i class="icon-point-rights"></i>
                                    <span>Attendance</span>
                                </a>
                            @endcan
                        </li>
                        <li class="nav-item">
                            @can('view payroll')
                                <a href="{{ route('payroll.index') }}"
                                    class="nav-link {{ request()->is('payroll*') || request()->routeIs('payroll.create') || request()->routeIs('payroll.edit') ? 'active' : '' }}">
                                    <i class="icon-price-tag"></i>
                                    <span>Payroll</span>
                                </a>
                            @endcan
                        </li>
                        <li class="nav-item">
                            @can('view holiday')
                                <a href="{{ route('holiday.index') }}"
                                    class="nav-link {{ request()->routeIs('holiday.index') || request()->routeIs('holiday.create') || request()->routeIs('hoiiday.edit') ? 'active' : '' }}">
                                    <i class="icon-home5"></i>Holiday
                                </a>
                            @endcan
                        </li>
                        <li class="nav-item">
                            @can('view leaveType')
                                <a href="{{ route('leaveType.index') }}"
                                    class="nav-link {{ request()->routeIs('leaveType.index') || request()->routeIs('leaveType.create') || request()->routeIs('leaveType.edit') ? 'active' : '' }}">
                                    <i class="icon-file-empty2"></i>Leave Type
                                </a>
                            @endcan
                        </li>
                        <li class="nav-item">
                            @can('view leave')
                                <a href="{{ route('leave.index') }}"
                                    class="nav-link {{ request()->routeIs('leave.index') || request()->routeIs('leave.create') || request()->routeIs('leave.edit') ? 'active' : '' }}">
                                    <i class="icon-file-plus"></i>Leave Application
                                </a>
                            @endcan
                        </li>
                    </ul>
                </li>
                <li
                    class="nav-item nav-item-submenu {{ request()->is('slider*') || request()->is('shipping*') || request()->is('coupon*') || request()->is('coupon.create*') || request()->is('orders*') ? 'nav-item-expanded nav-item-open' : '' }}">
                    <a href="#"
                        class="nav-link {{ request()->is('slider*') || request()->is('shipping*') || request()->is('coupon*') || request()->is('coupon.create*') || request()->is('orders*') ? 'active' : '' }}">
                        <i class="icon-store"></i>
                        <span>E-commerce</span>
                    </a>
                    <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                        <li class="nav-item">
                            @can('view slider')
                                <a href="{{ route('slider.index') }}"
                                    class="nav-link {{ request()->routeIs('slider.index') || request()->routeIs('slider.create') || request()->routeIs('slider.edit') ? 'active' : '' }}">
                                    <i class="icon-gradient"></i>Slider
                                </a>
                            @endcan
                        </li>
                        <li class="nav-item">
                            @can('view shipping')
                                <a href="{{ route('shipping.index') }}"
                                    class="nav-link {{ request()->routeIs('shipping.index') || request()->routeIs('shipping.edit') || request()->routeIs('shipping.create') ? 'active' : '' }}">
                                    <i class="icon-truck"></i>Shipping
                                </a>
                            @endcan
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('coupon.index') }}"
                                class="nav-link {{ request()->routeIs('coupon.index') || request()->routeIs('coupon.create') ? 'active' : '' }}">
                                <i class="icon-stack-empty"></i>Coupon
                            </a>
                        </li>
                        <li class="nav-item">
                            @can('view orders')
                                <a href="{{ route('orders.index') }}"
                                    class="nav-link {{ request()->routeIs('orders.index') ? 'active' : '' }}">
                                    <i class="icon-cart5"></i>Orders
                                </a>
                            @endcan
                        </li>
                    </ul>
                </li>


        </div>

        <!-- /main navigation -->

    </div>
    <!-- /sidebar content -->

</div>
