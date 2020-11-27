$(function() {

    var sync1 = $("#sync1");
    var sync2 = $("#sync2");
    sync1.owlCarousel({
            nav: true,
            navText: ["<img src='./public/images/owl-prev.png' alt='' >", "<img src='./public/images/owl-next.png' alt=''>"],
            items: 1,
            dots: false,
            autoplayHoverPause: true,
            autoplay: true,
            autoplayTimeout: 5000,
            rewind: true,
            startPosition: 0,
            responsiveRefreshRate: 200,
        }).on('changed.owl.carousel', syncPosition)
        .on("click", ".owl-nav", function(el) {
            // body...
        });
    $("#sync1 .owl-nav ").hide();
    $("#sync1").mouseenter(function() {
        $("#sync1 .owl-nav ").show();
    }).mouseleave(function() {
        $("#sync1 .owl-nav ").hide();
    })

    sync2.on('initialized.owl.carousel', function() {
        sync2.find(".owl-item").eq(0).addClass("synced");
    }).owlCarousel({
        nav: false,
        items: 4,
        dots: false,
        slideBy: 4,
        rewind: true,
        responsiveRefreshRate: 100,
    }).on("click", ".owl-item", function(el) {
        el.preventDefault();
        var number = $(this).index();
        sync1.data('owl.carousel').to(number, 300, true);

    });

    function syncPosition(el) {
        var count = el.item.count - 1;
        // var current = Math.round(el.item.index - (el.item.count/2));
        //console.log("current before if: " + el.item.index);
        var current = el.item.index;
        // if(current < 0) {
        //   current = count;
        // }
        // if(current > count) {
        //   current = 0;
        // }
        // console.log("current afrer if: " + current);

        $("#sync2")
            .find(".owl-item")
            .removeClass("synced")
            .eq(current)
            .addClass("synced");

        if ($("#sync2").data("owl.carousel") !== undefined) {
            var lenghtOption = sync2.find('.owl-item').length;
            var listObj = sync2.find('.owl-item.active');
            var listIndex = [];
            for (var i = 0; i < 4; i++) {
                listIndex[i] = listObj.eq(i).index();
            };
            center(current, listIndex, lenghtOption);
        }
    }

    function center(number, array, end) {
        var found = false;
        var num = number;
        var listIndex = array;
        for (var i in listIndex) {
            if (num === listIndex[i]) {
                var found = true;
            }
        }
        if (found === false) {
            if (num > listIndex[listIndex.length - 1]) {
                if (num === 7) {
                    sync2.data('owl.carousel').to(end - listIndex.length, 100, true);
                } else {
                    sync2.data('owl.carousel').to(num - listIndex.length + 2, 100, true);
                }
                // console.log("current out ListIndex: th1");
            } else {
                if (num - 1 === -1) {
                    num = 0;

                }
                sync2.data('owl.carousel').to(num, 100, true);
                // console.log("current out ListIndex: th2");
            }
        } else if (num === listIndex[listIndex.length - 1]) {
            // console.log("current == ListIndex end");
            if (num === end - 1) {
                sync2.data('owl.carousel').to(listIndex[1] - 1, 100, true);
            } else {
                sync2.data('owl.carousel').to(listIndex[1], 100, true);
            };

        } else if (num === listIndex[0]) {
            if (num === 0) {
                sync2.data('owl.carousel').to(0, 100, true);
            } else {
                sync2.data('owl.carousel').to(num - 1, 100, true);
            };
            // console.log("current == ListIndex star");
        } else {
            // console.log("k làm gì cả");
        }
    }

    // slide-right
    $("#slide-right-1, #slide-right-2, #post-slide").owlCarousel({
            nav: false,
            items: 1,
            dots: false,
            autoplayHoverPause: true,
            autoplay: true,
            autoplayTimeout: 5000,
            rewind: true,
            startPosition: 0,
            responsiveRefreshRate: 200,
        })
        // slide - product
    $("#slide-watch").owlCarousel({
        nav: true,
        navText: ["<img src='./public/images/owl-prev.png' alt='' >", "<img src='./public/images/owl-next.png' alt=''>"],
        items: 5,
        dots: false,
        autoplayHoverPause: true,
        autoplay: true,
        autoplayTimeout: 5000,
        rewind: true,
        startPosition: 0,
        responsiveRefreshRate: 200,
    })
    $("#slide-mobile").owlCarousel({
        nav: true,
        navText: ["<img src='./public/images/owl-prev.png' alt='' >", "<img src='./public/images/owl-next.png' alt=''>"],
        items: 5,
        slideBy: 5,
        dots: false,
        autoplayHoverPause: true,
        autoplay: false,
        rewind: true,
        startPosition: 0,
        responsiveRefreshRate: 200,
    })

    // Lazyloading image
    if ('loading' in HTMLImageElement.prototype) {
        const images = document.querySelectorAll("img.lazyload");
        images.forEach(img => {
            img.src = img.dataset.src;
        });
    } else {
        // import Lazysize
        let script = document.createElement("script");
        script.async = true;
        script.src =
            "/public/javascript/lazysizes.min.js";
        document.body.appendChild(script);
    }
    $(".footer-link,.js-content-filter ").hide();
    // Show link footer
    $("#show-link").click(function() {
        $(".footer-link").toggle();
        if ($(this).prev().css("display") == "none") {
            console.log($(this).prev().css("display"));
            $(this).html("Xem thêm <i class='fa fa-caret-down'></i>");
        } else {
            console.log($(this).prev().css("display"));
            $(this).html("Ẩn bớt <i class='fa fa-caret-up'></i>");
        }
    })

    // control  filter-feature
    $(".js-open-filter").click(function() {
            // $(".js-open-filter").next().slideUp(500, "linear");
            $(this).next().slideToggle(500, "linear");

        })
        // 
    $(".js-close-filter").click(function() {
            $(this).parent().slideUp(500, "linear");
        })
        // control fill-sort
    $(".js-closesort ~ a").click(function() {
        $(".js-closesort ~ a").removeClass("check");
        $(this).addClass("check");
    });     
    
})
