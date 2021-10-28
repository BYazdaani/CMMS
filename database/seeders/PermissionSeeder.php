<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $permissions = [
            'user_management_access',

            'permission_create',
            'permission_edit',
            'permission_show',
            'permission_delete',
            'permission_access',

            'role_create',
            'role_edit',
            'role_show',
            'role_delete',
            'role_access',

            'admin_create',
            'admin_edit',
            'admin_show',
            'admin_delete',
            'admin_access',

            'user_create',
            'user_edit',
            'user_show',
            'user_delete',
            'user_access',

            'equipment_create',
            'equipment_edit',
            'equipment_show',
            'equipment_delete',
            'equipment_access',

            'instrument_create',
            'instrument_edit',
            'instrument_show',
            'instrument_delete',
            'instrument_access',

            'spare_part_create',
            'spare_part_edit',
            'spare_part_show',
            'spare_part_delete',
            'spare_part_access',

            'technical_file_create',
            'technical_file_edit',
            'technical_file_show',
            'technical_file_delete',
            'technical_file_access',

            'preventive_plan_create',
            'preventive_plan_edit',
            'preventive_plan_show',
            'preventive_plan_delete',
            'preventive_plan_access',

            'stock_create',
            'stock_edit',
            'stock_show',
            'stock_delete',
            'stock_access',

            'purchase_create',
            'purchase_edit',
            'purchase_show',
            'purchase_delete',
            'purchase_access',

            'work_request_create',
            'work_request_edit',
            'work_request_show',
            'work_request_delete',
            'work_request_access',

            'work_order_create',
            'work_order_edit',
            'work_order_show',
            'work_order_delete',
            'work_order_access',

            'intervention_report_create',
            'intervention_report_edit',
            'intervention_report_show',
            'intervention_report_delete',
            'intervention_report_access',
        ];

        foreach ($permissions as $permission) {
            Permission::create([
                'name' => $permission
            ]);
        }

        //gets all permissions vie Gate::before rule; see AuthServiceProvider
        Role::create(['name' => 'Super Admin']);

        $role = Role::create(['name' => 'Admin']);

        $adminPermissions = [
            'user_create',
            'user_edit',
            'user_show',
            'user_delete',
            'user_access',

            'equipment_create',
            'equipment_edit',
            'equipment_show',
            'equipment_delete',
            'equipment_access',

            'instrument_create',
            'instrument_edit',
            'instrument_show',
            'instrument_delete',
            'instrument_access',

            'spare_part_create',
            'spare_part_edit',
            'spare_part_show',
            'spare_part_delete',
            'spare_part_access',

            'technical_file_create',
            'technical_file_edit',
            'technical_file_show',
            'technical_file_delete',
            'technical_file_access',

            'preventive_plan_create',
            'preventive_plan_edit',
            'preventive_plan_show',
            'preventive_plan_delete',
            'preventive_plan_access',

            'stock_create',
            'stock_edit',
            'stock_show',
            'stock_delete',
            'stock_access',

            'purchase_create',
            'purchase_edit',
            'purchase_show',
            'purchase_delete',
            'purchase_access',

            'work_request_create',
            'work_request_edit',
            'work_request_show',
            'work_request_delete',
            'work_request_access',

            'work_order_create',
            'work_order_edit',
            'work_order_show',
            'work_order_delete',
            'work_order_access',

            'intervention_report_create',
            'intervention_report_edit',
            'intervention_report_show',
            'intervention_report_delete',
            'intervention_report_access',
        ];

        foreach ($adminPermissions as $permission){
            $role->givePermissionTo($permission);
        }

        $role = Role::create(['name' => 'Client']);

        $clientPermissions = [
            'work_request_create',
            'work_request_edit',
            'work_request_show',
            'work_request_delete',
            'work_request_access',

            'equipment_show',
            'equipment_access',

            'instrument_show',
            'instrument_access',

            'preventive_plan_show',
            'preventive_plan_access',
        ];

        foreach ($clientPermissions as $permission){
            $role->givePermissionTo($permission);
        }

        $role = Role::create(['name' => 'Maintenance Technician']);

        $maintenanceTechniciantPermissions = [
            'work_request_create',
            'work_request_edit',
            'work_request_show',
            'work_request_delete',
            'work_request_access',

            'work_order_create',
            'work_order_edit',
            'work_order_show',
            'work_order_delete',
            'work_order_access',

            'intervention_report_create',
            'intervention_report_edit',
            'intervention_report_show',
            'intervention_report_delete',
            'intervention_report_access',

            'equipment_show',
            'equipment_access',

            'instrument_show',
            'instrument_access',

            'preventive_plan_show',
            'preventive_plan_access',

            'technical_file_show',
            'technical_file_access',

            'spare_part_show',
            'spare_part_access',

        ];

        foreach ($maintenanceTechniciantPermissions as $permission){
            $role->givePermissionTo($permission);
        }

    }
}
