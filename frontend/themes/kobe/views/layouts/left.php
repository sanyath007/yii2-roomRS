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
        
        <?php if (!Yii::$app->user->isGuest && (Yii::$app->user->identity->person_id == '1300200009261' || Yii::$app->user->identity->person_id == '1309900221813')) {
            $menuList = [
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
                            ['label' => 'ตรวจสอบห้องว่าง', 'icon' => 'fa fa-file-o', 'url' => ['/reservation/checkroom'],],
//                            ['label' => 'รายการจองรออนุมัติ', 'icon' => 'fa fa-cart-plus', 'url' => ['/debug'],],
//                            ['label' => 'รายการยกเลิกรออนุมัติ', 'icon' => 'fa fa-cart-plus', 'url' => ['/debug'],],
                            ['label' => 'รายการจองใช้ห้อง', 'icon' => 'fa fa-cart-plus', 'url' => ['/reservation/index'],],
                            ['label' => 'ยกเลิกการจองห้อง', 'icon' => 'fa fa-trash', 'url' => ['/reservation/cancel'],],                            
                        ],
                    ],
                    [
                        'label' => 'ข้อมูลพื้นฐาน',
                        'icon' => 'fa fa-database',
                        'url' => '#',
                        'items' => [
                            ['label' => 'ห้องประชุม', 'icon' => 'fa fa-hospital-o', 'url' => ['/room'],],
                            ['label' => 'อุปกรณ์ห้องประชุม', 'icon' => 'fa fa-laptop', 'url' => ['/debug'],],
                        ],
                    ],
                    ['label' => 'รายงาน', 'icon' => 'fa fa-bar-chart', 'url' => ['/report']]               
                ],
            ];
        } else {
            $menuList = [
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
                            ['label' => 'ตรวจสอบห้องว่าง', 'icon' => 'fa fa-file-o', 'url' => ['/reservation/checkroom'],],
//                            ['label' => 'รายการจองรออนุมัติ', 'icon' => 'fa fa-cart-plus', 'url' => ['/debug'],],
//                            ['label' => 'รายการยกเลิกรออนุมัติ', 'icon' => 'fa fa-cart-plus', 'url' => ['/debug'],],
                            ['label' => 'รายการจองใช้ห้อง', 'icon' => 'fa fa-cart-plus', 'url' => ['/reservation/index'],],
                            ['label' => 'ยกเลิกการจองห้อง', 'icon' => 'fa fa-trash', 'url' => ['/reservation/cancel'],],                            
                        ],
                    ],                   
                ],
            ];
        } ?>
        
        <?= dmstr\widgets\Menu::widget($menuList) ?>

    </section>

</aside>
