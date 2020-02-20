export default {
    animationCompleted: true,
    timer: null,
    init: function () {
        this.initNextSlide();
        this.initTimer();
    },
    initTimer: function () {
        let _this = this;
        this.timer = setInterval(function () {
            _this.scrollToNextSlide()
        }, 7000);
    },
    initNextSlide: function () {
        let _this = this;
        // Action when user click on Next slide link
        $(document).on('click', '.next_link button, .next_link a', (e) => {
            e.preventDefault();
            if(  this.animationCompleted ) {
                clearInterval(this.timer);
                this.scrollToNextSlide();
            }
        });

        $('#home').swipe( {
            swipeLeft:function(e) {
                e.preventDefault();
                if(  this.animationCompleted ) {
                    clearInterval(_this.timer);
                    _this.scrollToNextSlide();
                }
            },
            swipeUp:function(e) {
                e.preventDefault();
                if(  this.animationCompleted ) {
                    clearInterval(_this.timer);
                    _this.scrollToNextSlide();
                }
            },
        });

        $(document).on('wheel', (e) => {
            if (this.animationCompleted === true) {
                if (e.originalEvent.wheelDelta > 0 || e.originalEvent.detail < 0) {
                    //scroll up
                } else {
                    if(  this.animationCompleted ) {
                        clearInterval(this.timer);
                        this.scrollToNextSlide();
                    }
                }
            }
        });

        $(document).on('click', 'div.pagination ul li', function(e) {
            e.preventDefault();
            clearInterval(_this.timer);
            _this.scrollToNextSlide( $(this).index() );
        });

        setTimeout(function (){
            $('.pagination').find('li').eq(0).addClass('current');
        },2000);
    },
    scrollToNextSlide: function (nextIndex) {
        let self = this,
            $slideSelector = $('.slide'),
            $currentProjectIndex = $('.slide.active').index(),
            $currentProject = $slideSelector.eq($currentProjectIndex),
            $pagination = $('.pagination'),
            $projectsLength = $slideSelector.length,
            $nextProjectIndex = $currentProjectIndex + 1,
            $nextSlideTime = 2000,
            $prevSlideTime = 4000;

        if( typeof nextIndex !== 'undefined' ){
            $nextProjectIndex = nextIndex;
        }

        let $nextProject = $slideSelector.eq($nextProjectIndex);

        this.animationCompleted = false;

        $currentProject.addClass('animation_out').removeClass('animation_repeat');

        function next_slide() {
            $slideSelector.each(function() {
                $( this ).removeClass('animation_out').removeClass('active');
            });

            $nextProject.addClass('active').addClass('animation_repeat');

            setTimeout(function (){
                self.animationCompleted = true;
            });

            setTimeout(function (){
                switchPagination($nextProjectIndex);
            },$nextSlideTime);
        }

        function prev_slide() {
            $slideSelector.each(function() {
                $( this ).removeClass('prev_slide');
            });
            $nextProject.addClass('prev_slide');

            setTimeout(function (){
                self.animationCompleted = true;
            });
        }

        function last_slide() {
            $slideSelector.each(function() {
                $( this ).removeClass('animation_out').removeClass('active')
            });
            $slideSelector.eq(0).addClass('active').addClass('animation_repeat');


            setTimeout(function (){
                switchPagination(0);
            },$nextSlideTime);
        }

        function prev_last_slide() {
            $slideSelector.each(function() {
                $( this ).removeClass('prev_slide');
            });
            $('.slide').eq(0).addClass('prev_slide');
        }

        function switchPagination(slide) {
            let index = 0;
            $pagination.find('li').each(function() {
                $( this ).removeClass('current');
            });

            if( typeof slide !== 'undefined' ){
                index = slide;
            }

            $pagination.find('li').eq(index).addClass('current');
        }

        setTimeout(next_slide, $nextSlideTime);
        setTimeout(prev_slide, $prevSlideTime);

        // Return to first slide after user click 'Next' link on last slide
        if ($currentProjectIndex === ($projectsLength - 1)) {
            setTimeout(last_slide, $nextSlideTime);
            setTimeout(prev_last_slide, $prevSlideTime);
        }
    }
};
