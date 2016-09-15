window.addEventListener("load", function(event) {

    var touchStartX;
    var touchStartY;
    var touchMoveX;
    var touchMoveY;
    var barPositionX;
    var actionStartTime;
    var trigger = false;
    var isShown = false;
    var wasMoved = false;
 
    // 開始時
    window.addEventListener("touchstart", function(event) {
        // 座標の取得
        touchStartX = event.touches[0].clientX;
        touchStartY = event.touches[0].clientY;

        wasMoved = false;

        if (isShown == false && touchStartX > 10) return;

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
        if (touchMoveX > 240) return;
        if (!isShown && !trigger) return;

        sidebarOnMoving(touchMoveX);
        maskOnMoving(touchMoveX);
    }, false);
 
    // 終了時
    window.addEventListener("touchend", function(event) {
        if (!isShown && !trigger) return;
        if (isOverSideFrame(touchStartX) && !wasMoved) {
            console.log('こっち');
            scrollable();
            autoTranslate(241, 'left');
            autoMask(241, 'left');
            autoMaskHide();
        } else {
            // console.log(isQuickFlip(new Date().getTime(), touchMoveX - touchStartX));
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
        autoTranslate(241, 'left');
        autoMask(241, 'left');
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
        $('.modal-mask').css('opasity', X / 240);
        $('.mobile-sidebar').css('left', X);
    }

    function maskOnMoving(X) {
        $('.modal-mask').css({
            'opacity': X / 240
        });
    }

    function isOverHalf(X) {
        return X > 120;
    }

    function isQuickFlip(actionEndTime, actionDistance) {
        if (actionDistance < 0 || 300 < actionDistance) return false;
        if (actionDistance / (actionEndTime - actionStartTime) > 0.1) {
            return true;
        };
    }

    function isOverSideFrame(X) {
        return X > 241;
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
            destination = 240;
            distance = destination - startX;
            isShown = true;
        };
        $('.mobile-sidebar').animate({
            'left': destination
        },{
            'duration': 200 * distance / 240,
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
            'duration': 200 * distance / 240,
            'easing': 'easeInOutQuart'
        });
    }

    function autoMaskShow() {
        $('.modal-mask').css({
            'visibility': 'visible'
        });
    }

    function autoMaskHide() {
        $('.modal-mask').css({
            'visibility': 'hidden',
        });
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