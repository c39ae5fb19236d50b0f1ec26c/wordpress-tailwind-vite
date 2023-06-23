<?php get_header(); ?>

<div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
<?php
    if ( have_posts() ) {
      while ( have_posts() ) {
        the_post();
        echo '<h1 class="mt-10 entry-title underline text-2xl hover:text-sky-900"><a href="' . get_permalink() . '">' . get_the_title() . '</a></h1>';
        ?>
        <div class="mt-10">
          <?php the_content(); ?>
        </div>
        <?php
      }
    }
?>

<?php
// Ustaw zapytanie do wybranych opinii
$args = array(
    'post_type' => 'opinie',
    'posts_per_page' => -1, // pobierz wszystkie opinie
);

// Wykonaj zapytanie
$opinie_query = new WP_Query($args);

// Sprawdź, czy są jakiekolwiek opinie
if ($opinie_query->have_posts()) : ?>

    <div class="opinie-block mt-10">
      <div class="flex justify-between items-center">
        <h2 class="text-xl font-bold mb-2">Opinie</h2>
        <div>
          <button id="grid-btn" class="btn"><i class="fas fa-th"></i></button>
          <button id="slider-btn" class="btn"><i class="fas fa-sliders-h"></i></button>
        </div>
      </div>
      <div id="opinie-container" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 pb-10">
          <?php while ($opinie_query->have_posts()) : $opinie_query->the_post(); ?>
              <div class="opinie-item bg-gray-100 p-4 rounded-lg shadow-md">
                <p class="mb-2">
                    <span class="font-bold">Ocena:</span> 
                    <?php 
                    $ocena = get_field('ocena');
                    $whole = floor($ocena);      // 3
                    $fraction = $ocena - $whole; // .5

                    for($i = 1; $i <= 5; $i++){
                        if($i <= $whole){
                            echo '<i class="fas fa-star text-yellow-500"></i>';
                        }elseif($i - 1 < $ocena && $fraction > 0){
                            echo '<i class="fas fa-star-half-alt text-yellow-500"></i>';
                        }else{
                            echo '<i class="far fa-star text-yellow-500"></i>';
                        }
                    }
                    ?>
                </p>
                <p class="mb-2"><span class="font-bold">Imię i nazwisko:</span> <?php the_field('imie_i_nazwisko'); ?></p>
                <p class="mb-2"><span class="font-bold">Stanowisko:</span> <?php the_field('stanowisko'); ?></p>
                <?php 
                $image = get_field('zdjecie_avatar');
                if( !empty( $image ) ): ?>
                    <img class="w-32 h-32 object-cover rounded-full" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                <?php else: ?>
                    <div class="w-32 h-32 bg-blue-500 text-white flex items-center justify-center text-2xl font-bold rounded-full">
                        <?php echo substr(get_field('imie_i_nazwisko'), 0, 1); ?>
                    </div>
                <?php endif; ?>
            </div>
            <?php endwhile; ?>
      </div>
    </div>

<?php endif; 

wp_reset_postdata();
?>

</div>

<script>
document.getElementById('grid-btn').addEventListener('click', function() {
    const container = document.getElementById('opinie-container');
    container.classList.remove('flex', 'flex-wrap', 'justify-between', 'slide', 'relative');
    container.classList.add('grid', 'grid-cols-1', 'md:grid-cols-2', 'lg:grid-cols-3', 'gap-4');
    const items = container.getElementsByClassName('opinie-item');
    for (let i = 0; i < items.length; i++) {
        items[i].classList.remove('hidden');
    }
    const prevButton = document.querySelector('.prev-button');
    const nextButton = document.querySelector('.next-button');
    if (prevButton) {
        prevButton.remove();
    }
    if (nextButton) {
        nextButton.remove();
    }
});

document.getElementById('slider-btn').addEventListener('click', function() {
    const container = document.getElementById('opinie-container');
    container.classList.remove('grid', 'grid-cols-1', 'md:grid-cols-2', 'lg:grid-cols-3', 'gap-4');
    container.classList.add('flex', 'flex-wrap', 'justify-between', 'slide', 'relative');
    let slideIndex = 1;
    showSlide(slideIndex);

    window.moveSlide = function(moveStep) {
        showSlide(slideIndex += moveStep);
    }

    window.currentSlide = function(n) {
        showSlide(slideIndex = n);
    }

    function showSlide(n) {
        let i;
        const slides = container.getElementsByClassName("opinie-item");
        if (n > slides.length) { slideIndex = 1 }
        if (n < 1) { slideIndex = slides.length }

        for (i = 0; i < slides.length; i++) {
            slides[i].classList.add('hidden');
        }
        slides[slideIndex - 1].classList.remove('hidden');
    }

    const prevButton = document.createElement('button');
    prevButton.classList.add('prev-button');
    prevButton.style.display = 'none'; // initially hidden
    prevButton.addEventListener('click', function() { moveSlide(-1); });
    container.appendChild(prevButton);

    const nextButton = document.createElement('button');
    nextButton.classList.add('next-button');
    nextButton.style.display = 'none'; // initially hidden
    nextButton.addEventListener('click', function() { moveSlide(1); });
    container.appendChild(nextButton);

    // Pokaż strzałki po kliknięciu przycisku
    prevButton.style.display = 'block';
    nextButton.style.display = 'block';
});

</script>

<?php get_footer(); ?>