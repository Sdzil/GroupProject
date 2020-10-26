var galleryThumbs_1 = new Swiper('.bot_1', {
    spaceBetween: 10,
    slidesPerView: 4,
    loop: true,
    freeMode: true,
    loopedSlides: 5, //looped slides should be the same
    watchSlidesVisibility: true,
    watchSlidesProgress: true,
    observer:true,//修改swiper自己或子元素时，自动初始化swiper

    observeParents:true//修改swiper的父元素时，自动初始化swiper
  });
  var galleryTop_1 = new Swiper('.top_1', {
    spaceBetween: 10,
    loop:true,
    loopedSlides: 5, //looped slides should be the same
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    thumbs: {
      swiper: galleryThumbs_1,
    },
    observer:true,//修改swiper自己或子元素时，自动初始化swiper

    observeParents:true//修改swiper的父元素时，自动初始化swiper
  });

  var galleryThumbs_2 = new Swiper('.bot_2', {
    spaceBetween: 10,
    slidesPerView: 4,
    loop: true,
    freeMode: true,
    loopedSlides: 5, //looped slides should be the same
    watchSlidesVisibility: true,
    watchSlidesProgress: true,
    observer:true,//修改swiper自己或子元素时，自动初始化swiper

    observeParents:true//修改swiper的父元素时，自动初始化swiper
  });
  var galleryTop_2 = new Swiper('.top_2', {
    spaceBetween: 10,
    loop:true,
    loopedSlides: 5, //looped slides should be the same
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    thumbs: {
      swiper: galleryThumbs_2,
    },
    observer:true,//修改swiper自己或子元素时，自动初始化swiper

    observeParents:true//修改swiper的父元素时，自动初始化swiper
  });


  var galleryThumbs_3 = new Swiper('.bot_3', {
    spaceBetween: 10,
    slidesPerView: 4,
    loop: true,
    freeMode: true,
    loopedSlides: 5, //looped slides should be the same
    watchSlidesVisibility: true,
    watchSlidesProgress: true,
    observer:true,//修改swiper自己或子元素时，自动初始化swiper

    observeParents:true//修改swiper的父元素时，自动初始化swiper
  });
  var galleryTop_3 = new Swiper('.top_3', {
    spaceBetween: 10,
    loop:true,
    loopedSlides: 5, //looped slides should be the same
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    thumbs: {
      swiper: galleryThumbs_3,
    },
    observer:true,//修改swiper自己或子元素时，自动初始化swiper

    observeParents:true//修改swiper的父元素时，自动初始化swiper
  });
