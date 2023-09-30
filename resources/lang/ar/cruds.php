<?php

return [
    'userManagement' => [
        'title'          => 'إدارة المستخدمين',
        'title_singular' => 'إدارة المستخدمين',
    ],
    'permission' => [
        'title'          => 'الصلاحيات',
        'title_singular' => 'الصلاحية',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'العنوان',
            'title_helper'      => ' ',
            'created_at'        => 'تاريخ الإنشاء',
            'created_at_helper' => ' ',
            'updated_at'        => 'تاريخ التحديث',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'تاريخ الحذف',
            'deleted_at_helper' => ' ',
        ],
    ],
    'role' => [
        'title'          => 'المجموعات',
        'title_singular' => 'مجموعة',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'title'              => 'العنوان',
            'title_helper'       => ' ',
            'permissions'        => 'الصلاحيات',
            'permissions_helper' => ' ',
            'created_at'         => 'تاريخ الإنشاء',
            'created_at_helper'  => ' ',
            'updated_at'         => 'تاريخ التحديث',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'تاريخ الحذف',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'user' => [
        'title'          => 'المستخدمين',
        'title_singular' => 'مستخدم',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => ' ',
            'name'                     => 'الاسم',
            'name_helper'              => ' ',
            'email'                    => 'البريد الإلكتروني',
            'email_helper'             => ' ',
            'email_verified_at'        => 'تاريخ تأكيد البريد الإلكتروني',
            'email_verified_at_helper' => ' ',
            'password'                 => 'كلمة المرور',
            'password_helper'          => ' ',
            'roles'                    => 'المجموعات',
            'roles_helper'             => ' ',
            'remember_token'           => 'رمز التذكير',
            'remember_token_helper'    => ' ',
            'created_at'               => 'تاريخ الإنشاء',
            'created_at_helper'        => ' ',
            'updated_at'               => 'تاريخ التحديث',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'تاريخ الحذف',
            'deleted_at_helper'        => ' ',
            'approved'                 => 'تم الموافقة',
            'approved_helper'          => ' ',
            'user_type'                => 'نوع المستخدم',
            'user_type_helper'         => ' ',
            'phone_number'             => 'رقم الهاتف',
            'phone_number_helper'      => ' ',
        ],
    ],
    'auditLog' => [
        'title'          => 'سجلات التدقيق',
        'title_singular' => 'سجل التدقيق',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'description'         => 'الوصف',
            'description_helper'  => ' ',
            'subject_id'          => 'معرف الكائن',
            'subject_id_helper'   => ' ',
            'subject_type'        => 'نوع الكائن',
            'subject_type_helper' => ' ',
            'user_id'             => 'معرف المستخدم',
            'user_id_helper'      => ' ',
            'properties'          => 'الخصائص',
            'properties_helper'   => ' ',
            'host'                => 'المضيف',
            'host_helper'         => ' ',
            'created_at'          => 'تاريخ الإنشاء',
            'created_at_helper'   => ' ',
            'updated_at'          => 'تاريخ التحديث',
            'updated_at_helper'   => ' ',
        ],
    ],
    'userAlert' => [
        'title'          => 'تنبيهات المستخدم',
        'title_singular' => 'تنبيه المستخدم',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'alert_text'        => 'نص التنبيه',
            'alert_text_helper' => ' ',
            'alert_link'        => 'رابط التنبيه',
            'alert_link_helper' => ' ',
            'user'              => 'المستخدمين',
            'user_helper'       => ' ',
            'created_at'        => 'تاريخ الإنشاء',
            'created_at_helper' => ' ',
            'updated_at'        => 'تاريخ التحديث',
            'updated_at_helper' => ' ',
        ],
    ],
    'setting' => [
        'title'          => 'الإعدادات',
        'title_singular' => 'إعداد',
    ],
    'about' => [
        'title'          => 'حول',
        'title_singular' => 'حول',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'logo'              => 'شعار',
            'logo_helper'       => ' ',
            'phone'             => 'رقم الهاتف',
            'phone_helper'      => ' ',
            'email'             => 'البريد الإلكتروني',
            'email_helper'      => ' ',
            'location'          => 'الموقع',
            'location_helper'   => ' ',
            'whatsapp'          => 'واتساب',
            'whatsapp_helper'   => ' ',
            'instagram'         => 'إنستغرام',
            'instagram_helper'  => ' ',
            'twitter'           => 'تويتر',
            'twitter_helper'    => ' ',
            'created_at'        => 'تاريخ الإنشاء',
            'created_at_helper' => ' ',
            'updated_at'        => 'تاريخ التحديث',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'تاريخ الحذف',
            'deleted_at_helper' => ' ',
        ],
    ],
    'project' => [
        'title'          => 'المشاريع',
        'title_singular' => 'مشروع',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => ' ',
            'title'                    => 'العنوان',
            'title_helper'             => ' ',
            'date'                     => 'التاريخ',
            'date_helper'              => ' ',
            'collected'                => 'المبلغ المجموع',
            'collected_helper'         => ' ',
            'goal'                     => 'الهدف',
            'goal_helper'              => ' ',
            'image'                    => 'الصورة',
            'image_helper'             => '440 x 440',
            'file'                     => 'الملف',
            'file_helper'              => ' ',
            'short_description'        => 'الوصف المختصر',
            'short_description_helper' => ' ',
            'description'              => 'الوصف',
            'description_helper'       => ' ',
            'published'                => 'نشر',
            'published_helper'         => ' ',
            'created_at'               => 'تاريخ الإنشاء',
            'created_at_helper'        => ' ',
            'updated_at'               => 'تاريخ التحديث',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'تاريخ الحذف',
            'deleted_at_helper'        => ' ',
        ],
    ],
    'subscribe' => [
        'title'          => 'الاشتراك',
        'title_singular' => 'اشتراك',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'email'             => 'البريد الإلكتروني',
            'email_helper'      => ' ',
            'created_at'        => 'تاريخ الإنشاء',
            'created_at_helper' => ' ',
            'updated_at'        => 'تاريخ التحديث',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'تاريخ الحذف',
            'deleted_at_helper' => ' ',
        ],
    ],
    'payment' => [
        'title'          => 'المدفوعات',
        'title_singular' => 'مدفوعة',
        'fields'         => [
            'id'                     => 'ID',
            'id_helper'              => ' ',
            'user'                   => 'المستخدم',
            'user_helper'            => ' ',
            'payment_orderid'        => 'رقم الطلب للدفع',
            'payment_orderid_helper' => ' ',
            'donation_num'           => 'رقم التبرع',
            'donation_num_helper'    => ' ',
            'donation'               => 'التبرع',
            'donation_helper'        => ' ',
            'payment_status'         => 'حالة الدفع',
            'payment_status_helper'  => ' ',
            'created_at'             => 'تاريخ الإنشاء',
            'created_at_helper'      => ' ',
            'updated_at'             => 'تاريخ التحديث',
            'updated_at_helper'      => ' ',
            'deleted_at'             => 'تاريخ الحذف',
            'deleted_at_helper'      => ' ',
            'completed'              => 'تم الانتهاء',
            'completed_helper'       => ' ',
            'project'                => 'المشروع',
            'project_helper'         => ' ',
            'payment_type'           => 'نوع الدفع',
            'payment_type_helper'    => ' ',
        ],
    ],
];
