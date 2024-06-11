<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;


class UserRolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create Permissions

        // Create Permissions for role
        Permission::create(['name' => 'view role']);
        Permission::create(['name' => 'create role']);
        Permission::create(['name' => 'update role']);
        Permission::create(['name' => 'delete role']);


        // Create Permissions for permission
        Permission::create(['name' => 'view permission']);
        Permission::create(['name' => 'create permission']);
        Permission::create(['name' => 'update permission']);
        Permission::create(['name' => 'delete permission']);


        // Create Permissions for user
        Permission::create(['name' => 'view user']);
        Permission::create(['name' => 'create user']);
        Permission::create(['name' => 'update user']);
        Permission::create(['name' => 'delete user']);


        // Create Permissions for category
        Permission::create(['name' => 'view category']);
        Permission::create(['name' => 'create category']);
        Permission::create(['name' => 'update category']);
        Permission::create(['name' => 'delete category']);


        // Create Permissions for product
        Permission::create(['name' => 'view product']);
        Permission::create(['name' => 'create product']);
        Permission::create(['name' => 'update product']);
        Permission::create(['name' => 'delete product']);


        // Create Permissions for unit
        Permission::create(['name' => 'view unit']);
        Permission::create(['name' => 'create unit']);
        Permission::create(['name' => 'update unit']);
        Permission::create(['name' => 'delete unit']);


        // Create Permissions for size
        Permission::create(['name' => 'view size']);
        Permission::create(['name' => 'create size']);
        Permission::create(['name' => 'update size']);
        Permission::create(['name' => 'delete size']);


        // Create Permissions for color
        Permission::create(['name' => 'view color']);
        Permission::create(['name' => 'create color']);
        Permission::create(['name' => 'update color']);
        Permission::create(['name' => 'delete color']);


        // Create Permissions for barcodeType
        Permission::create(['name' => 'view barcodeType']);
        Permission::create(['name' => 'create barcodeType']);
        Permission::create(['name' => 'update barcodeType']);
        Permission::create(['name' => 'delete barcodeType']);


        // Create Permissions for subCategory
        Permission::create(['name' => 'view subCategory']);
        Permission::create(['name' => 'create subCategory']);
        Permission::create(['name' => 'update subCategory']);
        Permission::create(['name' => 'delete subCategory']);
        
        // Create Permissions for brand
        Permission::create(['name' => 'view brand']);
        Permission::create(['name' => 'create brand']);
        Permission::create(['name' => 'update brand']);
        Permission::create(['name' => 'delete brand']);


        // Create Permissions for customer
        Permission::create(['name' => 'view customer']);
        Permission::create(['name' => 'create customer']);
        Permission::create(['name' => 'update customer']);
        Permission::create(['name' => 'delete customer']);


        // Create Permissions for expense-category
        Permission::create(['name' => 'view expense-category']);
        Permission::create(['name' => 'create expense-category']);
        Permission::create(['name' => 'update expense-category']);
        Permission::create(['name' => 'delete expense-category']);


        // Create Permissions for expense
        Permission::create(['name' => 'view expense']);
        Permission::create(['name' => 'create expense']);
        Permission::create(['name' => 'update expense']);
        Permission::create(['name' => 'delete expense']);


        // Create Permissions for payment-method
        Permission::create(['name' => 'view payment-method']);
        Permission::create(['name' => 'create payment-method']);
        Permission::create(['name' => 'update payment-method']);
        Permission::create(['name' => 'delete payment-method']);


        // Create Permissions for contact-type
        Permission::create(['name' => 'view contact-type']);
        Permission::create(['name' => 'create contact-type']);
        Permission::create(['name' => 'update contact-type']);
        Permission::create(['name' => 'delete contact-type']);


        // Create Permissions for contact
        Permission::create(['name' => 'view contact']);
        Permission::create(['name' => 'create contact']);
        Permission::create(['name' => 'update contact']);
        Permission::create(['name' => 'delete contact']);


        // Create Permissions for repair
        Permission::create(['name' => 'view repair']);
        Permission::create(['name' => 'create repair']);
        Permission::create(['name' => 'update repair']);
        Permission::create(['name' => 'delete repair']);

        // Create Permissions for employee
        Permission::create(['name' => 'view employee']);
        Permission::create(['name' => 'create employee']);
        Permission::create(['name' => 'update employee']);
        Permission::create(['name' => 'delete employee']);
        // Create Permissions for attendance
        Permission::create(['name' => 'view attendance']);
        Permission::create(['name' => 'create attendance']);
        Permission::create(['name' => 'update attendance']);
        Permission::create(['name' => 'delete attendance']);
        // Create Permissions for payroll
        Permission::create(['name' => 'view payroll']);
        Permission::create(['name' => 'create payroll']);
        Permission::create(['name' => 'update payroll']);
        Permission::create(['name' => 'delete payroll']);


        // Create Permissions for organization
        Permission::create(['name' => 'view organization']);
        Permission::create(['name' => 'create organization']);
        Permission::create(['name' => 'update organization']);
        Permission::create(['name' => 'updateTheme organization']);


        // Create Permissions for department
        Permission::create(['name' => 'view department']);
        Permission::create(['name' => 'create department']);
        Permission::create(['name' => 'update department']);
        Permission::create(['name' => 'delete department']);


        // Create Permissions for holiday
        Permission::create(['name' => 'view holiday']);
        Permission::create(['name' => 'create holiday']);
        Permission::create(['name' => 'update holiday']);
        Permission::create(['name' => 'delete holiday']);


        // Create Permissions for leaveType
        Permission::create(['name' => 'view leaveType']);
        Permission::create(['name' => 'create leaveType']);
        Permission::create(['name' => 'update leaveType']);
        Permission::create(['name' => 'delete leaveType']);


        // Create Permissions for leaves
        Permission::create(['name' => 'view leave']);
        Permission::create(['name' => 'create leave']);
        Permission::create(['name' => 'update leave']);
        Permission::create(['name' => 'delete leave']);
        // Create Permissions for tax
        Permission::create(['name' => 'view tax']);
        Permission::create(['name' => 'create tax']);
        Permission::create(['name' => 'update tax']);
        Permission::create(['name' => 'delete tax']);

        // Create Permissions for orders
        Permission::create(['name' => 'view orders']);
        Permission::create(['name' => 'create orders']);
        Permission::create(['name' => 'update orders']);
        Permission::create(['name' => 'delete orders']);
        // Create Permissions for slider
        Permission::create(['name' => 'view slider']);
        Permission::create(['name' => 'create slider']);
        Permission::create(['name' => 'update slider']);
        Permission::create(['name' => 'delete slider']);
        // Create Permissions for shipping
        Permission::create(['name' => 'view shipping']);
        Permission::create(['name' => 'create shipping']);
        Permission::create(['name' => 'update shipping']);
        Permission::create(['name' => 'delete shipping']);
        // Create Permissions for shipping
        Permission::create(['name' => 'view variables']);
        Permission::create(['name' => 'create variables']);
        Permission::create(['name' => 'update variables']);
        Permission::create(['name' => 'delete variables']);
        // Create Permissions for blog
        Permission::create(['name' => 'view blog']);
        Permission::create(['name' => 'create blog']);
        Permission::create(['name' => 'update blog']);
        Permission::create(['name' => 'delete blog']);

        
        // Create Permissions for import product
        Permission::create(['name' => 'import product']);

        // Create Permissions for sell-invoice
        Permission::create(['name' => 'create sell-invoice']);






        // Create Roles
        $superAdminRole = Role::create(['name' => 'super-admin']); //as super-admin
        $adminRole = Role::create(['name' => 'admin']);
        $staffRole = Role::create(['name' => 'staff']);
        $userRole = Role::create(['name' => 'user']);

        // Lets give all permission to super-admin role.
        $allPermissionNames = Permission::pluck('name')->toArray();

        $superAdminRole->givePermissionTo($allPermissionNames);


        // Let's give few permissions to admin role.

        // $adminRole->givePermissionTo(['create role', 'view role', 'update role']);
        $adminRole->givePermissionTo(['create permission', 'view permission']);
        $adminRole->givePermissionTo(['create user', 'view user', 'update user']);
        $adminRole->givePermissionTo(['create product', 'view product', 'update product']);


        // $permissions = Permission::all();
        // foreach ($permissions as $permission) {
        //     $adminRole->givePermissionTo(['name' => $permission]);
        // }



        // Let's Create User and assign Role to it.

        $superAdminUser = User::firstOrCreate([
                    'email' => 'superadmin@gmail.com',
                ], [
                    'name' => 'Super Admin',
                    'email' => 'superadmin@gmail.com',
                    'password' => Hash::make ('12345678'),
                ]);

        $superAdminUser->assignRole($superAdminRole);


        $adminUser = User::firstOrCreate([
                            'email' => 'admin@gmail.com'
                        ], [
                            'name' => 'Admin',
                            'email' => 'admin@gmail.com',
                            'password' => Hash::make ('12345678'),
                        ]);

        $adminUser->assignRole($adminRole);


        $staffUser = User::firstOrCreate([
                            'email' => 'staff@gmail.com',
                        ], [
                            'name' => 'Staff',
                            'email' => 'staff@gmail.com',
                            'password' => Hash::make('12345678'),
                        ]);

        $staffUser->assignRole($staffRole);
    }
}