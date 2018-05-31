<?php

use Illuminate\Database\Seeder;

class ConfigsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('configs')->delete();

        DB::table('configs')->insert(array (
            0 =>
                array (
                    'id' => 1,
                    'name' => 'WEB_NAME',
                    'val' => '李迪博客',
                    'created_at' => '2017-04-25 12:12:00',
                    'updated_at' => '2017-04-25 12:12:00',
                    'deleted_at' => NULL,
                ),
            1 =>
                array (
                    'id' => 2,
                    'name' => 'WEB_KEYWORDS',
                    'val' => '个人博客,laravel博客,php博客,技术博客,李迪',
                    'created_at' => '2017-04-25 12:12:00',
                    'updated_at' => '2017-06-21 22:51:54',
                    'deleted_at' => NULL,
                ),
            2 =>
                array (
                    'id' => 3,
                    'name' => 'WEB_DESCRIPTION',
                    'val' => '李迪的php博客,个人技术博客,工作日志',
                    'created_at' => '2017-04-25 12:12:00',
                    'updated_at' => '2017-04-25 12:12:00',
                    'deleted_at' => NULL,
                ),
            3 =>
                array (
                    'id' => 4,
                    'name' => 'WEB_STATUS',
                    'val' => '1',
                    'created_at' => '2017-04-25 12:12:00',
                    'updated_at' => '2017-04-25 12:12:00',
                    'deleted_at' => NULL,
                ),
            5 =>
                array (
                    'id' => 6,
                    'name' => 'WATER_TYPE',
                    'val' => '1',
                    'created_at' => '2017-04-25 12:12:00',
                    'updated_at' => '2017-04-25 12:12:00',
                    'deleted_at' => NULL,
                ),
            6 =>
                array (
                    'id' => 7,
                    'name' => 'TEXT_WATER_WORD',
                    'val' => 'lidicode.com',
                    'created_at' => '2017-04-25 12:12:00',
                    'updated_at' => '2017-04-25 12:12:00',
                    'deleted_at' => NULL,
                ),
            7 =>
                array (
                    'id' => 8,
                    'name' => 'TEXT_WATER_TTF_PTH',
                    'val' => './Public/static/font/ariali.ttf',
                    'created_at' => '2017-04-25 12:12:00',
                    'updated_at' => '2017-04-25 12:12:00',
                    'deleted_at' => NULL,
                ),
            8 =>
                array (
                    'id' => 9,
                    'name' => 'TEXT_WATER_FONT_SIZE',
                    'val' => '15',
                    'created_at' => '2017-04-25 12:12:00',
                    'updated_at' => '2017-04-25 12:12:00',
                    'deleted_at' => NULL,
                ),
            9 =>
                array (
                    'id' => 10,
                    'name' => 'TEXT_WATER_COLOR',
                    'val' => '#008CBA',
                    'created_at' => '2017-04-25 12:12:00',
                    'updated_at' => '2017-04-25 12:12:00',
                    'deleted_at' => NULL,
                ),
            10 =>
                array (
                    'id' => 11,
                    'name' => 'TEXT_WATER_ANGLE',
                    'val' => '0',
                    'created_at' => '2017-04-25 12:12:00',
                    'updated_at' => '2017-04-25 12:12:00',
                    'deleted_at' => NULL,
                ),
            11 =>
                array (
                    'id' => 12,
                    'name' => 'TEXT_WATER_LOCATE',
                    'val' => '9',
                    'created_at' => '2017-04-25 12:12:00',
                    'updated_at' => '2017-04-25 12:12:00',
                    'deleted_at' => NULL,
                ),
            12 =>
                array (
                    'id' => 13,
                    'name' => 'IMAGE_WATER_PIC_PTAH',
                    'val' => './Upload/image/logo/logo.png',
                    'created_at' => '2017-04-25 12:12:00',
                    'updated_at' => '2017-04-25 12:12:00',
                    'deleted_at' => NULL,
                ),
            13 =>
                array (
                    'id' => 14,
                    'name' => 'IMAGE_WATER_LOCATE',
                    'val' => '9',
                    'created_at' => '2017-04-25 12:12:00',
                    'updated_at' => '2017-04-25 12:12:00',
                    'deleted_at' => NULL,
                ),
            14 =>
                array (
                    'id' => 15,
                    'name' => 'IMAGE_WATER_ALPHA',
                    'val' => '80',
                    'created_at' => '2017-04-25 12:12:01',
                    'updated_at' => '2017-04-25 12:12:01',
                    'deleted_at' => NULL,
                ),
            15 =>
                array (
                    'id' => 16,
                    'name' => 'WEB_CLOSE_WORD',
                    'val' => '网站升级中，请稍后访问。',
                    'created_at' => '2017-04-25 12:12:01',
                    'updated_at' => '2017-04-25 12:12:01',
                    'deleted_at' => NULL,
                ),
            16 =>
                array (
                    'id' => 17,
                    'name' => 'WEB_ICP_NUMBER',
                    'val' => '豫ICP备14009546号-3',
                    'created_at' => '2017-04-25 12:12:01',
                    'updated_at' => '2017-04-25 12:12:01',
                    'deleted_at' => NULL,
                ),
            17 =>
                array (
                    'id' => 18,
                    'name' => 'ADMIN_EMAIL',
                    'val' => 'baijunyao@baijunyao.com',
                    'created_at' => '2017-04-25 12:12:01',
                    'updated_at' => '2017-06-21 22:51:54',
                    'deleted_at' => NULL,
                ),
            18 =>
                array (
                    'id' => 19,
                    'name' => 'COPYRIGHT_WORD',
                    'val' => '本文为白俊遥原创文章,转载无需和我联系,但请注明来自<a href="http://baijunyao.com">白俊遥博客</a>http://baijunyao.com',
                    'created_at' => '2017-04-25 12:12:01',
                    'updated_at' => '2017-06-21 22:51:54',
                    'deleted_at' => NULL,
                ),
            19 =>
                array (
                    'id' => 20,
                    'name' => 'QQ_APP_ID',
                    'val' => '',
                    'created_at' => '2017-04-25 12:12:01',
                    'updated_at' => '2017-04-25 12:12:01',
                    'deleted_at' => NULL,
                ),
            20 =>
                array (
                    'id' => 21,
                    'name' => 'CHANGYAN_APP_ID',
                    'val' => '',
                    'created_at' => '2017-04-25 12:12:01',
                    'updated_at' => '2017-04-25 12:12:01',
                    'deleted_at' => NULL,
                ),
            21 =>
                array (
                    'id' => 22,
                    'name' => 'CHANGYAN_CONF',
                    'val' => '',
                    'created_at' => '2017-04-25 12:12:01',
                    'updated_at' => '2017-04-25 12:12:01',
                    'deleted_at' => NULL,
                ),
            22 =>
                array (
                    'id' => 23,
                    'name' => 'WEB_STATISTICS',
                    'val' => '',
                    'created_at' => '2017-04-25 12:12:01',
                    'updated_at' => '2017-06-21 22:51:54',
                    'deleted_at' => NULL,
                ),
            23 =>
                array (
                    'id' => 24,
                    'name' => 'CHANGEYAN_RETURN_COMMENT',
                    'val' => '',
                    'created_at' => '2017-04-25 12:12:01',
                    'updated_at' => '2017-04-25 12:12:01',
                    'deleted_at' => NULL,
                ),
            24 =>
                array (
                    'id' => 25,
                    'name' => 'AUTHOR',
                    'val' => '白俊遥',
                    'created_at' => '2017-04-25 12:12:01',
                    'updated_at' => '2017-04-25 12:12:01',
                    'deleted_at' => NULL,
                ),
            25 =>
                array (
                    'id' => 26,
                    'name' => 'QQ_APP_KEY',
                    'val' => '',
                    'created_at' => '2017-04-25 12:12:01',
                    'updated_at' => '2017-04-25 12:12:01',
                    'deleted_at' => NULL,
                ),
            26 =>
                array (
                    'id' => 27,
                    'name' => 'CHANGYAN_COMMENT',
                    'val' => '',
                    'created_at' => '2017-04-25 12:12:01',
                    'updated_at' => '2017-04-25 12:12:01',
                    'deleted_at' => NULL,
                ),
            27 =>
                array (
                    'id' => 28,
                    'name' => 'BAIDU_SITE_URL',
                    'val' => '',
                    'created_at' => '2017-04-25 12:12:01',
                    'updated_at' => '2017-06-21 22:51:54',
                    'deleted_at' => NULL,
                ),
            28 =>
                array (
                    'id' => 29,
                    'name' => 'DOUBAN_API_KEY',
                    'val' => '',
                    'created_at' => '2017-04-25 12:12:01',
                    'updated_at' => '2017-04-25 12:12:01',
                    'deleted_at' => NULL,
                ),
            29 =>
                array (
                    'id' => 30,
                    'name' => 'DOUBAN_SECRET',
                    'val' => '',
                    'created_at' => '2017-04-25 12:12:01',
                    'updated_at' => '2017-04-25 12:12:01',
                    'deleted_at' => NULL,
                ),
            30 =>
                array (
                    'id' => 31,
                    'name' => 'RENREN_API_KEY',
                    'val' => '',
                    'created_at' => '2017-04-25 12:12:01',
                    'updated_at' => '2017-04-25 12:12:01',
                    'deleted_at' => NULL,
                ),
            31 =>
                array (
                    'id' => 32,
                    'name' => 'RENREN_SECRET',
                    'val' => '',
                    'created_at' => '2017-04-25 12:12:01',
                    'updated_at' => '2017-04-25 12:12:01',
                    'deleted_at' => NULL,
                ),
            32 =>
                array (
                    'id' => 33,
                    'name' => 'SINA_API_KEY',
                    'val' => '',
                    'created_at' => '2017-04-25 12:12:01',
                    'updated_at' => '2017-04-25 12:12:01',
                    'deleted_at' => NULL,
                ),
            33 =>
                array (
                    'id' => 34,
                    'name' => 'SINA_SECRET',
                    'val' => '',
                    'created_at' => '2017-04-25 12:12:01',
                    'updated_at' => '2017-04-25 12:12:01',
                    'deleted_at' => NULL,
                ),
            34 =>
                array (
                    'id' => 35,
                    'name' => 'KAIXIN_API_KEY',
                    'val' => '',
                    'created_at' => '2017-04-25 12:12:01',
                    'updated_at' => '2017-04-25 12:12:01',
                    'deleted_at' => NULL,
                ),
            35 =>
                array (
                    'id' => 36,
                    'name' => 'KAIXIN_SECRET',
                    'val' => '',
                    'created_at' => '2017-04-25 12:12:01',
                    'updated_at' => '2017-04-25 12:12:01',
                    'deleted_at' => NULL,
                ),
            36 =>
                array (
                    'id' => 37,
                    'name' => 'SOHU_API_KEY',
                    'val' => '',
                    'created_at' => '2017-04-25 12:12:01',
                    'updated_at' => '2017-04-25 12:12:01',
                    'deleted_at' => NULL,
                ),
            37 =>
                array (
                    'id' => 38,
                    'name' => 'SOHU_SECRET',
                    'val' => '',
                    'created_at' => '2017-04-25 12:12:01',
                    'updated_at' => '2017-04-25 12:12:01',
                    'deleted_at' => NULL,
                ),
            38 =>
                array (
                    'id' => 39,
                    'name' => 'GITHUB_CLIENT_ID',
                    'val' => '',
                    'created_at' => '2017-04-25 12:12:01',
                    'updated_at' => '2017-04-25 12:12:01',
                    'deleted_at' => NULL,
                ),
            39 =>
                array (
                    'id' => 40,
                    'name' => 'GITHUB_CLIENT_SECRET',
                    'val' => '',
                    'created_at' => '2017-04-25 12:12:01',
                    'updated_at' => '2017-04-25 12:12:01',
                    'deleted_at' => NULL,
                ),
            40 =>
                array (
                    'id' => 41,
                    'name' => 'IMAGE_TITLE_ALT_WORD',
                    'val' => '李迪博客',
                    'created_at' => '2017-04-25 12:12:01',
                    'updated_at' => '2017-04-25 12:12:01',
                    'deleted_at' => NULL,
                ),
            41 =>
                array (
                    'id' => 42,
                    'name' => 'EMAIL_SMTP',
                    'val' => '',
                    'created_at' => '2017-04-25 12:12:01',
                    'updated_at' => '2017-04-25 12:12:01',
                    'deleted_at' => NULL,
                ),
            42 =>
                array (
                    'id' => 43,
                    'name' => 'EMAIL_USERNAME',
                    'val' => '',
                    'created_at' => '2017-04-25 12:12:01',
                    'updated_at' => '2017-04-25 12:12:01',
                    'deleted_at' => NULL,
                ),
            43 =>
                array (
                    'id' => 44,
                    'name' => 'EMAIL_PASSWORD',
                    'val' => '',
                    'created_at' => '2017-04-25 12:12:01',
                    'updated_at' => '2017-04-25 12:12:01',
                    'deleted_at' => NULL,
                ),
            44 =>
                array (
                    'id' => 45,
                    'name' => 'EMAIL_FROM_NAME',
                    'val' => '',
                    'created_at' => '2017-04-25 12:12:01',
                    'updated_at' => '2017-04-25 12:12:01',
                    'deleted_at' => NULL,
                ),
            45 =>
                array (
                    'id' => 46,
                    'name' => 'COMMENT_REVIEW',
                    'val' => '0',
                    'created_at' => '2017-04-25 12:12:01',
                    'updated_at' => '2017-04-25 12:12:01',
                    'deleted_at' => NULL,
                ),
            46 =>
                array (
                    'id' => 47,
                    'name' => 'COMMENT_SEND_EMAIL',
                    'val' => '1',
                    'created_at' => '2017-04-25 12:12:01',
                    'updated_at' => '2017-04-25 12:12:01',
                    'deleted_at' => NULL,
                ),
            47 =>
                array (
                    'id' => 48,
                    'name' => 'EMAIL_RECEIVE',
                    'val' => '',
                    'created_at' => '2017-04-25 12:12:01',
                    'updated_at' => '2017-04-25 12:12:01',
                    'deleted_at' => NULL,
                ),
            48 =>
                array (
                    'id' => 49,
                    'name' => 'WEB_TITLE',
                    'val' => '李迪博客,个人博客',
                    'created_at' => NULL,
                    'updated_at' => NULL,
                    'deleted_at' => NULL,
                ),
            49 =>
                array (
                    'id' => 50,
                    'name' => 'QQ_QUN_ARTICLE_ID',
                    'val' => '1',
                    'created_at' => NULL,
                    'updated_at' => NULL,
                    'deleted_at' => NULL,
                ),
            50 =>
                array (
                    'id' => 51,
                    'name' => 'QQ_QUN_NUMBER',
                    'val' => '88199093',
                    'created_at' => NULL,
                    'updated_at' => NULL,
                    'deleted_at' => NULL,
                ),
            51 =>
                array (
                    'id' => 52,
                    'name' => 'QQ_QUN_CODE',
                    'val' => '<a target="_blank" href="//shang.qq.com/wpa/qunwpa?idkey=bba3fea90444ee6caf1fb1366027873fe14e86bada254d41ce67768fadd729ee"><img border="0" src="//pub.idqqimg.com/wpa/images/group.png" alt="白俊遥博客群" title="白俊遥博客群"></a>',
                    'created_at' => NULL,
                    'updated_at' => NULL,
                    'deleted_at' => NULL,
                ),
            52 =>
                array (
                    'id' => 53,
                    'name' => 'QQ_QUN_OR_CODE',
                    'val' => '/uploads/images/default.png',
                    'created_at' => NULL,
                    'updated_at' => NULL,
                    'deleted_at' => NULL,
                ),
        ));
    }
}
