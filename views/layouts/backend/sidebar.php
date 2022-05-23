<?php
$user = $_SESSION['user'] ?? null;
$userRole = $user['role'] ?? null;
$requestPage = $_GET['page'] ?? false;

function isActive($path): bool
{
    $request = $_GET['page'] ?? null;
    return $request === $path;
}

$menus = [
    [
        'title' => 'Dashboard',
        'icon' => 'fa fa-tachometer-alt',
        'url' => './dashboard.php',
        'is_active' => isActive(null),
        'role' => null,
        'children' => [],
    ],
    [
        'title' => 'Master Menu',
        'icon' => 'fas fa-cubes',
        'url' => '#',
        'is_active' => in_array($requestPage, [
                'user-lists', 'student-lists', 'classroom-lists', 'add-student-classroom',
                'bill-lists', 'add-student-bill', 'bill-student-lists']),
        'role' => 'admin',
        'children' => [
            [
                'title' => 'List User',
                'icon' => 'far fa-circle nav-icon',
                'url' => './dashboard.php?page=user-lists',
                'is_active' => isActive('user-lists'),
                'role' => 'admin',
            ],
            [
                'title' => 'List Siswa',
                'icon' => 'far fa-circle nav-icon',
                'url' => './dashboard.php?page=student-lists',
                'is_active' => isActive('student-lists'),
                'role' => 'admin',
            ],
            [
                'title' => 'List Kelas',
                'icon' => 'far fa-circle nav-icon',
                'url' => './dashboard.php?page=classroom-lists',
                'is_active' => isActive('classroom-lists'),
                'role' => 'admin',
            ],
            [
                'title' => 'Tambah Siswa Kelas',
                'icon' => 'far fa-circle nav-icon',
                'url' => './dashboard.php?page=add-student-classroom',
                'is_active' => isActive('add-student-classroom'),
                'role' => 'admin',
            ],
            [
                'title' => 'List Tagihan',
                'icon' => 'far fa-circle nav-icon',
                'url' => './dashboard.php?page=bill-lists',
                'is_active' => isActive('bill-lists'),
                'role' => 'admin',
            ],
            [
                'title' => 'Tambah Tagihan Siswa',
                'icon' => 'far fa-circle nav-icon',
                'url' => './dashboard.php?page=add-student-bill',
                'is_active' => isActive('add-student-bill'),
                'role' => 'admin',
            ],
            [
                'title' => 'List Tagihan Siswa',
                'icon' => 'far fa-circle nav-icon',
                'url' => './dashboard.php?page=bill-student-lists',
                'is_active' => isActive('bill-student-lists'),
                'role' => 'admin',
            ]
        ],
    ],
    [
        'title' => 'Bayar Tagihan',
        'icon' => 'fas fa-money-check-alt',
        'url' => './dashboard.php?page=payment-bill',
        'is_active' => isActive('payment-bill'),
        'role' => null,
        'children' => [],
    ],
    [
        'title' => 'Profile Settings',
        'icon' => 'fas fa-user-cog',
        'url' => '#',
        'is_active' => isActive('profile-student-settings') || isActive('update-password'),
        'role' => null,
        'children' => [
            [
                'title' => 'Profile Student Settings',
                'icon' => 'far fa-circle nav-icon',
                'url' => './dashboard.php?page=profile-student-settings',
                'is_active' => isActive('profile-student-settings'),
                'role' => null,
            ],
            [
                'title' => 'Update Password',
                'icon' => 'far fa-circle nav-icon',
                'url' => './dashboard.php?page=update-password',
                'is_active' => isActive('update-password'),
                'role' => null,
            ]
        ],
    ],
    [
        'title' => 'Logout',
        'icon' => 'fas fa-sign-out-alt',
        'url' => 'logout.php',
        'is_active' => false,
        'role' => null,
        'children' => [],
    ]
];

?>

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="./" class="brand-link">
        <img src="assets/backend/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">SPP Online</span>
    </a>

    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="assets/backend/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?= $user['fullname'] ?></a>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <?php foreach ($menus as $menu) :?>
                    <?php if ($menu['role'] == null || $menu['role'] == $userRole) :?>
                        <?php if (empty($menu['children'])) :?>
                            <li class="nav-item">
                                <a href="<?= $menu['url'] ?>" class="nav-link <?= $menu['is_active'] ?  'active' : '' ?>">
                                    <i class="<?= $menu['icon'] ?>"></i>
                                    <p><?= $menu['title'] ?></p>
                                </a>
                            </li>
                        <?php else :?>
                            <li class="nav-item has-treeview <?= $menu['is_active'] ?  'menu-open' : '' ?>">
                                <a href="#" class="nav-link <?= $menu['is_active'] ?  'active' : '' ?>">
                                    <i class="<?= $menu['icon'] ?>"></i>
                                    <p><?= $menu['title'] ?></p>
                                    <i class="right fas fa-angle-left"></i>
                                </a>
                                <ul class="nav nav-treeview">
                                    <?php foreach ($menu['children'] as $child) :?>
                                        <?php if ($child['role'] == null || $child['role'] == $userRole) :?>
                                            <li class="nav-item">
                                                <a href="<?= $child['url'] ?>" class="nav-link <?= $child['is_active'] ? 'active' : '' ?>">
                                                    <i class="<?= $child['icon'] ?>"></i>
                                                    <p><?= $child['title'] ?></p>
                                                </a>
                                            </li>
                                        <?php endif ?>
                                    <?php endforeach ?>
                                </ul>
                            </li>
                        <?php endif ?>
                    <?php endif; ?>
                <?php endforeach; ?>
            </ul>
        </nav>
    </div>
</aside>