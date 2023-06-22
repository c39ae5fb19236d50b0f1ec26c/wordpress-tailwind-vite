document.addEventListener('DOMContentLoaded', (event) => {
    const blocks = document.querySelectorAll('.wp-block-my-custom-block-my-block');
    blocks.forEach((block) => {
        block.classList.add('animated', 'fadeIn');
    });
});
