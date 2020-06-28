<?php

use App\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => '1',
                'title' => 'user_management_access',
            ],
            [
                'id'    => '2',
                'title' => 'permission_create',
            ],
            [
                'id'    => '3',
                'title' => 'permission_edit',
            ],
            [
                'id'    => '4',
                'title' => 'permission_show',
            ],
            [
                'id'    => '5',
                'title' => 'permission_delete',
            ],
            [
                'id'    => '6',
                'title' => 'permission_access',
            ],
            [
                'id'    => '7',
                'title' => 'role_create',
            ],
            [
                'id'    => '8',
                'title' => 'role_edit',
            ],
            [
                'id'    => '9',
                'title' => 'role_show',
            ],
            [
                'id'    => '10',
                'title' => 'role_delete',
            ],
            [
                'id'    => '11',
                'title' => 'role_access',
            ],
            [
                'id'    => '12',
                'title' => 'user_create',
            ],
            [
                'id'    => '13',
                'title' => 'user_edit',
            ],
            [
                'id'    => '14',
                'title' => 'user_show',
            ],
            [
                'id'    => '15',
                'title' => 'user_delete',
            ],
            [
                'id'    => '16',
                'title' => 'user_access',
            ],
            [
                'id'    => '17',
                'title' => 'audit_log_show',
            ],
            [
                'id'    => '18',
                'title' => 'audit_log_access',
            ],
            [
                'id'    => '19',
                'title' => 'user_alert_create',
            ],
            [
                'id'    => '20',
                'title' => 'user_alert_show',
            ],
            [
                'id'    => '21',
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => '22',
                'title' => 'user_alert_access',
            ],
            [
                'id'    => '23',
                'title' => 'hr_management_access',
            ],
            [
                'id'    => '24',
                'title' => 'currency_create',
            ],
            [
                'id'    => '25',
                'title' => 'currency_edit',
            ],
            [
                'id'    => '26',
                'title' => 'currency_show',
            ],
            [
                'id'    => '27',
                'title' => 'currency_delete',
            ],
            [
                'id'    => '28',
                'title' => 'currency_access',
            ],
            [
                'id'    => '29',
                'title' => 'general_element_access',
            ],
            [
                'id'    => '30',
                'title' => 'country_create',
            ],
            [
                'id'    => '31',
                'title' => 'country_edit',
            ],
            [
                'id'    => '32',
                'title' => 'country_show',
            ],
            [
                'id'    => '33',
                'title' => 'country_delete',
            ],
            [
                'id'    => '34',
                'title' => 'country_access',
            ],
            [
                'id'    => '35',
                'title' => 'currency_history_create',
            ],
            [
                'id'    => '36',
                'title' => 'currency_history_edit',
            ],
            [
                'id'    => '37',
                'title' => 'currency_history_show',
            ],
            [
                'id'    => '38',
                'title' => 'currency_history_delete',
            ],
            [
                'id'    => '39',
                'title' => 'currency_history_access',
            ],
            [
                'id'    => '40',
                'title' => 'company_create',
            ],
            [
                'id'    => '41',
                'title' => 'company_edit',
            ],
            [
                'id'    => '42',
                'title' => 'company_show',
            ],
            [
                'id'    => '43',
                'title' => 'company_delete',
            ],
            [
                'id'    => '44',
                'title' => 'company_access',
            ],
            [
                'id'    => '45',
                'title' => 'companies_bank_holiday_create',
            ],
            [
                'id'    => '46',
                'title' => 'companies_bank_holiday_edit',
            ],
            [
                'id'    => '47',
                'title' => 'companies_bank_holiday_show',
            ],
            [
                'id'    => '48',
                'title' => 'companies_bank_holiday_delete',
            ],
            [
                'id'    => '49',
                'title' => 'companies_bank_holiday_access',
            ],
            [
                'id'    => '50',
                'title' => 'companies_holiday_create',
            ],
            [
                'id'    => '51',
                'title' => 'companies_holiday_edit',
            ],
            [
                'id'    => '52',
                'title' => 'companies_holiday_show',
            ],
            [
                'id'    => '53',
                'title' => 'companies_holiday_delete',
            ],
            [
                'id'    => '54',
                'title' => 'companies_holiday_access',
            ],
            [
                'id'    => '55',
                'title' => 'resource_create',
            ],
            [
                'id'    => '56',
                'title' => 'resource_edit',
            ],
            [
                'id'    => '57',
                'title' => 'resource_show',
            ],
            [
                'id'    => '58',
                'title' => 'resource_delete',
            ],
            [
                'id'    => '59',
                'title' => 'resource_access',
            ],
            [
                'id'    => '60',
                'title' => 'house_hold_create',
            ],
            [
                'id'    => '61',
                'title' => 'house_hold_edit',
            ],
            [
                'id'    => '62',
                'title' => 'house_hold_show',
            ],
            [
                'id'    => '63',
                'title' => 'house_hold_delete',
            ],
            [
                'id'    => '64',
                'title' => 'house_hold_access',
            ],
            [
                'id'    => '65',
                'title' => 'contract_create',
            ],
            [
                'id'    => '66',
                'title' => 'contract_edit',
            ],
            [
                'id'    => '67',
                'title' => 'contract_show',
            ],
            [
                'id'    => '68',
                'title' => 'contract_delete',
            ],
            [
                'id'    => '69',
                'title' => 'contract_access',
            ],
            [
                'id'    => '70',
                'title' => 'salary_create',
            ],
            [
                'id'    => '71',
                'title' => 'salary_edit',
            ],
            [
                'id'    => '72',
                'title' => 'salary_show',
            ],
            [
                'id'    => '73',
                'title' => 'salary_delete',
            ],
            [
                'id'    => '74',
                'title' => 'salary_access',
            ],
            [
                'id'    => '75',
                'title' => 'benefit_create',
            ],
            [
                'id'    => '76',
                'title' => 'benefit_edit',
            ],
            [
                'id'    => '77',
                'title' => 'benefit_show',
            ],
            [
                'id'    => '78',
                'title' => 'benefit_delete',
            ],
            [
                'id'    => '79',
                'title' => 'benefit_access',
            ],
            [
                'id'    => '80',
                'title' => 'company_calendar_access',
            ],
            [
                'id'    => '81',
                'title' => 'skils_management_access',
            ],
            [
                'id'    => '82',
                'title' => 'education_create',
            ],
            [
                'id'    => '83',
                'title' => 'education_edit',
            ],
            [
                'id'    => '84',
                'title' => 'education_show',
            ],
            [
                'id'    => '85',
                'title' => 'education_delete',
            ],
            [
                'id'    => '86',
                'title' => 'education_access',
            ],
            [
                'id'    => '87',
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
