(function () {
    'use strict';

    document.addEventListener('DOMContentLoaded', function () {
        var list = document.querySelector('.testimonials__list');
        if (!list) return;
        var track = list.querySelector('.testimonials__track');
        if (!track) return;

        list.addEventListener('mouseenter', function () {
            track.classList.add('is-paused');
        });

        list.addEventListener('mouseleave', function () {
            track.classList.remove('is-paused');
        });
    });
}());
