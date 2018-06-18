<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    $members = [
        [
            'id' => 1,
            'name' => 'Thomas',
            'photo' => 'httpzkjezklejzlk',
        ],
        [
            'id' => 2,
            'name' => 'Violaine',
            'photo' => 'httpzkjezklejzlk',
        ],
        [
            'id' => 3,
            'name' => 'Estelle',
            'photo' => 'httpzkjezklejzlk',
        ],
        [
            'id' => 4,
            'name' => 'Amandine',
            'photo' => 'httpzkjezklejzlk',
        ],
        [
            'id' => 5,
            'name' => 'Pierre',
            'photo' => 'httpzkjezklejzlk',
        ],
        [
            'id' => 5,
            'name' => 'Pierre',
            'photo' => 'httpzkjezklejzlk',
        ],
        [
            'id' => 5,
            'name' => 'Pierre',
            'photo' => 'httpzkjezklejzlk',
        ],
        [
            'id' => 5,
            'name' => 'Pierre',
            'photo' => 'httpzkjezklejzlk',
        ],
        [
            'id' => 5,
            'name' => 'Pierre',
            'photo' => 'httpzkjezklejzlk',
        ],
        [
            'id' => 5,
            'name' => 'Pierre',
            'photo' => 'httpzkjezklejzlk',
        ],
        [
            'id' => 5,
            'name' => 'Pierre',
            'photo' => 'httpzkjezklejzlk',
        ],
        [
            'id' => 5,
            'name' => 'Pierre',
            'photo' => 'httpzkjezklejzlk',
        ],
        [
            'id' => 5,
            'name' => 'Pierre',
            'photo' => 'httpzkjezklejzlk',
        ],
        [
            'id' => 5,
            'name' => 'Pierre',
            'photo' => 'httpzkjezklejzlk',
        ],
        [
            'id' => 5,
            'name' => 'Pierre',
            'photo' => 'httpzkjezklejzlk',
        ],
        [
            'id' => 5,
            'name' => 'Pierre',
            'photo' => 'httpzkjezklejzlk',
        ],
        [
            'id' => 5,
            'name' => 'Pierre',
            'photo' => 'httpzkjezklejzlk',
        ]
    ]
?>

<h1 class="page-title">Team roquette</h1>

<div class="relative">
    <div class="swiper-container swiper-container-team">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <a href="">+</a>
            </div>
            <?php
                foreach($members as $member) {
                    ?>
                        <div class="swiper-slide">
                            <a href=""><?=$member['name']?></a>
                        </div>
                    <?php
                }
            ?>
            
        </div>
    </div>
    <!-- Add Arrows -->
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
</div>