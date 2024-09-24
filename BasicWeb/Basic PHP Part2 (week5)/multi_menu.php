<?php
$menu = [
    [
        "nama" => "Beranda"  // Main menu item: Beranda
    ],
    [
        "nama" => "Berita",  // Main menu item: Berita
        "subMenu" => [       // Sub-menu of Berita
            [
                "nama" => "Wisata",    // Sub-menu item: Wisata
                "subMenu" => [         // Sub-menu of Wisata
                    [
                        "nama" => "Pantai"   // Sub-sub-menu item: Pantai
                    ],
                    [
                        "nama" => "Gunung"   // Sub-sub-menu item: Gunung
                    ]
                ]
            ],
            [
                "nama" => "Kuliner"    // Sub-menu item: Kuliner
            ],
            [
                "nama" => "Hiburan"    // Sub-menu item: Hiburan
            ]
        ]
    ],
    [
        "nama" => "Tentang"  // Main menu item: Tentang
    ],
    [
        "nama" => "Kontak"   // Main menu item: Kontak
    ]
];

function tampilkanMenuBertingkat(array $menu) {
    echo "<ul>";
    foreach ($menu as $item) {
        echo "<li>". $item["nama"];

        // Check if the current item has a sub-menu
        if (isset($item['subMenu'])) {
            // Recursively call the function to display sub-menus
            tampilkanMenuBertingkat($item['subMenu']);
        }

        echo "</li>";
    }
    echo "</ul>";
}

tampilkanMenuBertingkat($menu);
?>
