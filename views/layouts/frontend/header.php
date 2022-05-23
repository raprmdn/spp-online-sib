<?php

$user = $_SESSION['user'] ?? null;
$menus = [
    [
        'title' => 'Home',
        'url' => '#hero-animated',
        'sub_menu' => [],
    ],
    [
        'title' => 'About',
        'url' => '#about',
        'sub_menu' => [],
    ],
    [
        'title' => 'Services',
        'url' => '#services',
        'sub_menu' => [],
    ],
    [
        'title' => 'FAQ',
        'url' => '#faq',
        'sub_menu' => [],
    ],

];

if (isset($user)) {
    $menus[] = [
        'title' => $user['username'] . ' - ' . $user['role'],
        'url' => '#',
        'sub_menu' => [
            [
                'title' => 'Profile',
                'url' => './dashboard.php?page=profile',
            ],
            [
                'title' => 'Logout',
                'url' => 'logout.php',
            ],
        ],
    ];
} else {
    $menus[] = [
        'title' => 'Login',
        'url' => 'login.php',
        'sub_menu' => [],
    ];
}

?>

<header id="header" class="header fixed-top" data-scrollto-offset="0">
    <div class="container-fluid d-flex align-items-center justify-content-between">

        <a href="./" class="logo d-flex align-items-center scrollto me-auto me-lg-0">
            <h1>SPP Online<span>.</span></h1>
        </a>

        <nav id="navbar" class="navbar">
            <ul>
                <?php foreach ($menus as $menu) : ?>
                    <?php if (empty($menu['sub_menu'])) : ?>
                        <li>
                            <a href="<?= $menu['url'] ?>"><?= $menu['title'] ?></a>
                        </li>
                    <?php else : ?>
                        <li class="dropdown">
                            <a href="<?= $menu['url'] ?>" class="dropdown-toggle" data-toggle="dropdown"
                               role="button" aria-haspopup="true" aria-expanded="false"><?= $menu['title'] ?>
                                <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <?php foreach ($menu['sub_menu'] as $sub_menu) : ?>
                                    <li>
                                        <a href="<?= $sub_menu['url'] ?>"><?= $sub_menu['title'] ?></a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </li>
                    <?php endif; ?>
                <?php endforeach; ?>
            </ul>
            <i class="bi bi-list mobile-nav-toggle d-none"></i>
        </nav>

        <?php if (isset($user)) : ?>
            <a class="btn-getstarted scrollto" href="./dashboard.php">Dashboard</a>
        <?php else : ?>
            <a class="btn-getstarted scrollto" href="./login.php">Get Started</a>
        <?php endif; ?>

    </div>
</header>