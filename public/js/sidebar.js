window.addEventListener("load", function(event) {

    if (document.body.classList.contains('pc')) return;

    var touchStartX;
    var touchStartY;
    var touchMoveX;
    var touchMoveY;
    var barPositionX;
    var actionStartTime;
    var trigger = false;
    var isShown = false;
    var wasMoved = false;
    var sliderWidth = $('.mobile-sidebar').outerWidth();
 
    // 開始時
    window.addEventListener("touchstart", function(event) {
        // 座標の取得
        touchStartX = event.touches[0].clientX;
        touchStartY = event.touches[0].clientY;

        wasMoved = false;

        if (isShown == false && touchStartX > 30) return;

        if (!isShown) {
            unscrollable();
        };

        trigger = true;
        beforeChaing();
        actionStartTime = new Date().getTime();
    }, false);
 
    // 移動時
    window.addEventListener("touchmove", function(event) {
        // 座標の取得
        touchMoveX = event.changedTouches[0].clientX;
        touchMoveY = event.changedTouches[0].clientY;

        if (!wasMoved) {
            wasMoved = true;
        };

        if (isShown && isOverSideFrame(touchMoveX) && touchMoveX != touchStartX) {
            trigger = false;
        };

        if (!isShown && touchMoveX - touchStartX <= 3) return;
        if (touchMoveX > sliderWidth) return;
        if (!isShown && !trigger) return;

        sidebarOnMoving(touchMoveX);
        maskOnMoving(touchMoveX);
    }, false);
 
    // 終了時
    window.addEventListener("touchend", function(event) {
        if (!isShown && !trigger) return;
        if (isOverSideFrame(touchStartX) && !wasMoved) {
            scrollable();
            autoTranslate(sliderWidth, 'left');
            autoMask(sliderWidth, 'left');

            autoMaskHide();
        } else {
            afterChasing(touchStartX, touchMoveX);
        }
        trigger = false;
    }, false);

    $(document).on('click', '.header-menu-button', function() {
        unscrollable();
        autoMaskShow();
        autoTranslate();
        autoMask();
    });

    $(document).on('touchend', '.side-nav dl dd a', function() {
        scrollable();
        autoTranslate(sliderWidth, 'left');
        autoMask(sliderWidth, 'left');
        autoMaskHide();
    });

    function beforeChaing() {
        $('.modal-mask').css({
            'visibility': 'visible',
        });
    }

    function afterChasing(touchStartX, touchMoveX) {
        if (isQuickFlip(new Date().getTime(), touchMoveX - touchStartX)) {
            autoTranslate(touchMoveX, 'right');
            autoMask(touchMoveX, 'right');
            return;
        };
        if (isQuickFlip(new Date().getTime(), touchStartX - touchMoveX)) {
            scrollable();
            autoTranslate(touchMoveX, 'left');
            autoMask(touchMoveX, 'left');
            autoMaskHide();
            return;
        };
        if (isOverHalf(touchMoveX)) {
            autoTranslate(touchMoveX, 'right');
            autoMask(touchMoveX, 'right');
            return;
        }
        if (!isOverHalf(touchMoveX)) {
            scrollable();
            autoTranslate(touchMoveX, 'left');
            autoMask(touchMoveX, 'left');
            autoMaskHide();
            return;
        }
    }

    function sidebarOnMoving(X) {
        $('.modal-mask').css('opasity', X / sliderWidth);
        $('.mobile-sidebar').css('left', X - sliderWidth);
    }

    function maskOnMoving(X) {
        $('.modal-mask').css({
            'opacity': X / sliderWidth
        });
    }

    function isOverHalf(X) {
        return X > sliderWidth / 2;
    }

    function isQuickFlip(actionEndTime, actionDistance) {
        if (actionDistance < 0 || 300 < actionDistance) return false;
        if (actionDistance / (actionEndTime - actionStartTime) > 0.1) {
            return true;
        };
    }

    function isOverSideFrame(X) {
        return X > sliderWidth;
    }

    function isAble(isShown) {
        if (isShown) {
            return touchStartX - touchMoveX > 3;
        } else {
            return touchMoveX - touchStartX > 3;
        };
    }

    function autoTranslate(startX = 0, direction = "right") {
        if (direction == "left") {
            destination = 0;
            distance = startX;
            isShown = false;
        } else if (direction == "right") {
            destination = sliderWidth;
            distance = destination - startX;
            isShown = true;
        };
        $('.mobile-sidebar').animate({
            'left': destination - sliderWidth
        },{
            'duration': 200 * distance / sliderWidth,
            'easing': 'easeInOutQuart'
        });
    }

    function autoMask(startX = 0, direction = "right") {
        if (direction == "left") {
            destination = 0;
            distance = startX;
        } else if (direction == "right") {
            destination = 1;
            distance = destination - startX;
        };
        $('.modal-mask').animate({
            'opacity': destination
        },{
            'duration': 200 * distance / sliderWidth,
            'easing': 'easeInOutQuart'
        });
    }

    function autoMaskShow() {
        $('.modal-mask').css({
            'visibility': 'visible'
        });
    }

    function autoMaskHide() {
        setTimeout(function() {
            $('.modal-mask').css({
                'visibility': 'hidden',
            });
        }, 200);
    }

    function unscrollable(){
        var scroll_event = 'onwheel' in window ? 'wheel' : 'onmousewheel' in window ? 'mousewheel' : 'DOMMouseScroll';
        $(window).on(scroll_event,function(e){e.preventDefault();});
        $(window).on('touchmove.noScroll', function(e) {e.preventDefault();});
    }
     
    function scrollable(){
        var scroll_event = 'onwheel' in window ? 'wheel' : 'onmousewheel' in window ? 'mousewheel' : 'DOMMouseScroll';
        $(window).off(scroll_event);
        $(window).off('.noScroll');
    }
}, false);