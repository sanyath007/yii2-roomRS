<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <!-- <?= $directoryAsset ?>/img/user2-160x160.jpg -->
                <img src="http://192.168.20.4:3839/ps/PhotoPersonal/<?= Yii::$app->user->identity->person_photo; ?>" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?= Yii::$app->user->identity->getPersonName() ?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
                <span class="input-group-btn">
                    <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>
        <!-- /.search form -->
        
        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    ['label' => 'เมนูหลัก', 'options' => ['class' => 'header']],
                    [
                        'label' => 'หน้าหลัก',
                        'icon' => 'fa fa-home',
                        'url' => ['/site']
                    ],
                    [
                        'label' => 'ประจำวัน',
                        'icon' => 'fa fa-calendar',
                        'url' => '#',
                        'items' => [
                            ['label' => 'ปฎิทินการใช้ห้อง', 'icon' => 'fa fa-calendar-check-o', 'url' => ['/site'],],
//                            ['label' => 'สอบถามรายการจอง', 'icon' => 'fa fa-cloud-upload', 'url' => ['/debug'],],
//                            ['label' => 'รายการจองรออนุมัติ', 'icon' => 'fa fa-cart-plus', 'url' => ['/debug'],],
//                            ['label' => 'รายการยกเลิกรออนุมัติ', 'icon' => 'fa fa-cart-plus', 'url' => ['/debug'],],
                            ['label' => 'จองใช้ห้อง', 'icon' => 'fa fa-cart-plus', 'url' => ['/reservation/index'],],
                            ['label' => 'ยกเลิกการจอง', 'icon' => 'fa fa-trash', 'url' => ['/reservation/cancel'],],                            
                        ],
                    ],
                    [
                        'label' => 'ข้อมูลพื้นฐาน',
                        'icon' => 'fa fa-database',
                        'url' => '#',
                        'items' => [
                            ['label' => 'ห้องประชุม', 'icon' => 'fa fa-hospital-o', 'url' => ['/room'],],
                            ['label' => 'อุปกรณ์ห้องประชุม', 'icon' => 'fa fa-laptop', 'url' => ['/debug'],],
//                            [
//                                'label' => 'แผนก',
//                                'icon' => 'fa fa-users',
//                                'url' => '#',
//                                'items' => [
//                                    ['label' => 'Level Two', 'icon' => 'fa fa-circle-o', 'url' => '#',],
//                                    [
//                                        'label' => 'Level Two',
//                                        'icon' => 'fa fa-circle-o',
//                                        'url' => '#',
//                                        'items' => [
//                                            ['label' => 'Level Three', 'icon' => 'fa fa-circle-o', 'url' => '#',],
//                                            ['label' => 'Level Three', 'icon' => 'fa fa-circle-o', 'url' => '#',],
//                                        ],
//                                    ],
//                                ],
//                            ],
                        ],
                    ],
                    ['label' => 'รายงาน', 'icon' => 'fa fa-bar-chart', 'url' => ['/report']],
                ],
            ]
        ) ?>

    </section>

</aside>
