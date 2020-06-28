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
                'title' => 'user_access',
            ],
            [
                'id'    => '16',
                'title' => 'audit_log_show',
            ],
            [
                'id'    => '17',
                'title' => 'audit_log_access',
            ],
            [
                'id'    => '18',
                'title' => 'user_alert_create',
            ],
            [
                'id'    => '19',
                'title' => 'user_alert_show',
            ],
            [
                'id'    => '20',
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => '21',
                'title' => 'user_alert_access',
            ],
            [
                'id'    => '22',
                'title' => 'hr_management_access',
            ],
            [
                'id'    => '23',
                'title' => 'currency_create',
            ],
            [
                'id'    => '24',
                'title' => 'currency_edit',
            ],
            [
                'id'    => '25',
                'title' => 'currency_show',
            ],
            [
                'id'    => '26',
                'title' => 'currency_delete',
            ],
            [
                'id'    => '27',
                'title' => 'currency_access',
            ],
            [
                'id'    => '28',
                'title' => 'general_element_access',
            ],
            [
                'id'    => '29',
                'title' => 'country_create',
            ],
            [
                'id'    => '30',
                'title' => 'country_edit',
            ],
            [
                'id'    => '31',
                'title' => 'country_show',
            ],
            [
                'id'    => '32',
                'title' => 'country_delete',
            ],
            [
                'id'    => '33',
                'title' => 'country_access',
            ],
            [
                'id'    => '34',
                'title' => 'currency_history_create',
            ],
            [
                'id'    => '35',
                'title' => 'currency_history_edit',
            ],
            [
                'id'    => '36',
                'title' => 'currency_history_show',
            ],
            [
                'id'    => '37',
                'title' => 'currency_history_delete',
            ],
            [
                'id'    => '38',
                'title' => 'currency_history_access',
            ],
            [
                'id'    => '39',
                'title' => 'company_create',
            ],
            [
                'id'    => '40',
                'title' => 'company_edit',
            ],
            [
                'id'    => '41',
                'title' => 'company_show',
            ],
            [
                'id'    => '42',
                'title' => 'company_delete',
            ],
            [
                'id'    => '43',
                'title' => 'company_access',
            ],
            [
                'id'    => '44',
                'title' => 'companies_bank_holiday_create',
            ],
            [
                'id'    => '45',
                'title' => 'companies_bank_holiday_edit',
            ],
            [
                'id'    => '46',
                'title' => 'companies_bank_holiday_show',
            ],
            [
                'id'    => '47',
                'title' => 'companies_bank_holiday_delete',
            ],
            [
                'id'    => '48',
                'title' => 'companies_bank_holiday_access',
            ],
            [
                'id'    => '49',
                'title' => 'companies_holiday_create',
            ],
            [
                'id'    => '50',
                'title' => 'companies_holiday_edit',
            ],
            [
                'id'    => '51',
                'title' => 'companies_holiday_show',
            ],
            [
                'id'    => '52',
                'title' => 'companies_holiday_delete',
            ],
            [
                'id'    => '53',
                'title' => 'companies_holiday_access',
            ],
            [
                'id'    => '54',
                'title' => 'resource_create',
            ],
            [
                'id'    => '55',
                'title' => 'resource_edit',
            ],
            [
                'id'    => '56',
                'title' => 'resource_show',
            ],
            [
                'id'    => '57',
                'title' => 'resource_delete',
            ],
            [
                'id'    => '58',
                'title' => 'resource_access',
            ],
            [
                'id'    => '59',
                'title' => 'house_hold_create',
            ],
            [
                'id'    => '60',
                'title' => 'house_hold_edit',
            ],
            [
                'id'    => '61',
                'title' => 'house_hold_show',
            ],
            [
                'id'    => '62',
                'title' => 'house_hold_delete',
            ],
            [
                'id'    => '63',
                'title' => 'house_hold_access',
            ],
            [
                'id'    => '64',
                'title' => 'contract_create',
            ],
            [
                'id'    => '65',
                'title' => 'contract_edit',
            ],
            [
                'id'    => '66',
                'title' => 'contract_show',
            ],
            [
                'id'    => '67',
                'title' => 'contract_delete',
            ],
            [
                'id'    => '68',
                'title' => 'contract_access',
            ],
            [
                'id'    => '69',
                'title' => 'salary_create',
            ],
            [
                'id'    => '70',
                'title' => 'salary_edit',
            ],
            [
                'id'    => '71',
                'title' => 'salary_show',
            ],
            [
                'id'    => '72',
                'title' => 'salary_delete',
            ],
            [
                'id'    => '73',
                'title' => 'salary_access',
            ],
            [
                'id'    => '74',
                'title' => 'benefit_create',
            ],
            [
                'id'    => '75',
                'title' => 'benefit_edit',
            ],
            [
                'id'    => '76',
                'title' => 'benefit_show',
            ],
            [
                'id'    => '77',
                'title' => 'benefit_delete',
            ],
            [
                'id'    => '78',
                'title' => 'benefit_access',
            ],
            [
                'id'    => '79',
                'title' => 'company_calendar_access',
            ],
            [
                'id'    => '80',
                'title' => 'skils_management_access',
            ],
            [
                'id'    => '81',
                'title' => 'education_create',
            ],
            [
                'id'    => '82',
                'title' => 'education_edit',
            ],
            [
                'id'    => '83',
                'title' => 'education_show',
            ],
            [
                'id'    => '84',
                'title' => 'education_delete',
            ],
            [
                'id'    => '85',
                'title' => 'education_access',
            ],
            [
                'id'    => '86',
                'title' => 'holiday_create',
            ],
            [
                'id'    => '87',
                'title' => 'holiday_edit',
            ],
            [
                'id'    => '88',
                'title' => 'holiday_show',
            ],
            [
                'id'    => '89',
                'title' => 'holiday_delete',
            ],
            [
                'id'    => '90',
                'title' => 'holiday_access',
            ],
            [
                'id'    => '91',
                'title' => 'pmp_management_access',
            ],
            [
                'id'    => '92',
                'title' => 'job_grade_create',
            ],
            [
                'id'    => '93',
                'title' => 'job_grade_edit',
            ],
            [
                'id'    => '94',
                'title' => 'job_grade_show',
            ],
            [
                'id'    => '95',
                'title' => 'job_grade_delete',
            ],
            [
                'id'    => '96',
                'title' => 'job_grade_access',
            ],
            [
                'id'    => '97',
                'title' => 'job_experience_create',
            ],
            [
                'id'    => '98',
                'title' => 'job_experience_edit',
            ],
            [
                'id'    => '99',
                'title' => 'job_experience_show',
            ],
            [
                'id'    => '100',
                'title' => 'job_experience_delete',
            ],
            [
                'id'    => '101',
                'title' => 'job_experience_access',
            ],
            [
                'id'    => '102',
                'title' => 'language_create',
            ],
            [
                'id'    => '103',
                'title' => 'language_edit',
            ],
            [
                'id'    => '104',
                'title' => 'language_show',
            ],
            [
                'id'    => '105',
                'title' => 'language_delete',
            ],
            [
                'id'    => '106',
                'title' => 'language_access',
            ],
            [
                'id'    => '107',
                'title' => 'pmp_create',
            ],
            [
                'id'    => '108',
                'title' => 'pmp_edit',
            ],
            [
                'id'    => '109',
                'title' => 'pmp_show',
            ],
            [
                'id'    => '110',
                'title' => 'pmp_delete',
            ],
            [
                'id'    => '111',
                'title' => 'pmp_access',
            ],
            [
                'id'    => '112',
                'title' => 'pmp_detail_create',
            ],
            [
                'id'    => '113',
                'title' => 'pmp_detail_edit',
            ],
            [
                'id'    => '114',
                'title' => 'pmp_detail_show',
            ],
            [
                'id'    => '115',
                'title' => 'pmp_detail_delete',
            ],
            [
                'id'    => '116',
                'title' => 'pmp_detail_access',
            ],
            [
                'id'    => '117',
                'title' => 'presentation_create',
            ],
            [
                'id'    => '118',
                'title' => 'presentation_edit',
            ],
            [
                'id'    => '119',
                'title' => 'presentation_show',
            ],
            [
                'id'    => '120',
                'title' => 'presentation_delete',
            ],
            [
                'id'    => '121',
                'title' => 'presentation_access',
            ],
            [
                'id'    => '122',
                'title' => 'training_create',
            ],
            [
                'id'    => '123',
                'title' => 'training_edit',
            ],
            [
                'id'    => '124',
                'title' => 'training_show',
            ],
            [
                'id'    => '125',
                'title' => 'training_delete',
            ],
            [
                'id'    => '126',
                'title' => 'training_access',
            ],
            [
                'id'    => '127',
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
