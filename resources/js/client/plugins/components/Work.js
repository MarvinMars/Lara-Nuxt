export default {
    init() {
        this.initWorkIntro();
    },
    initWorkIntro() {
        let $animationSpeed = 120,
            $outSpeed = $('.images > div').length * $animationSpeed - $animationSpeed,
            $imagesSelector = '.images',
            $heroSelector = '.works__hero',
            $fadeTime = 500,
            $worksHeroOffset = 2500,
            refreshIntervalId;

        $($imagesSelector).find('> div:gt(0)').hide();

        refreshIntervalId = setInterval(() => {
                $($imagesSelector).find('> div').eq(0).hide().next().show().end().appendTo($imagesSelector);
            }, $animationSpeed
        );

        setTimeout(() => {
                clearInterval(refreshIntervalId);
                $($heroSelector).addClass('animation_in');
            }, $outSpeed
        );

        setTimeout(() => {
                $($heroSelector).fadeOut($fadeTime);
            }, $worksHeroOffset
        );
    },
};
