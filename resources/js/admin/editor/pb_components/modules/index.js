const modules = [
    {
        name: 'heroBanner',
        title: 'Hero banner: type 1',
        group: 'component',
        thumbnail: '/img/thumbnails/inner_hero_about.png',
        context: require('./page/heroBanner'),
    },
    {
        name: 'secondHeroBanner',
        title: 'Hero banner: type 2',
        group: 'component',
        thumbnail: '/img/thumbnails/about-hero2.jpg',
        context: require('./page/heroBannerSecond'),
    },
    {
        name: 'caseReview',
        title: 'Case Review',
        group: 'component',
        type: 'page',
        thumbnail: '/img/thumbnails/caseReview.jpg',
        context: require('./page/caseReview'),
    },
    {
        name: 'goal',
        title: 'Goal',
        group: 'component',
        type: 'page',
        thumbnail: '/img/thumbnails/goal.jpg',
        context: require('./page/goal'),
    },
    {
        name: 'labs',
        title: 'Labs',
        group: 'component',
        type: 'page',
        thumbnail: '/img/thumbnails/goal.jpg',
        context: require('./page/labs'),
    },
    {
        name: 'partners',
        title: 'Partners',
        group: 'component',
        thumbnail: '/img/thumbnails/partners.jpg',
        context: require('./page/partners'),
    },
    {
        name: 'work_partners',
        title: 'Work Page: Partners',
        group: 'component',
        type: 'hero',
        thumbnail: '/img/thumbnails/partners.jpg',
        context: require('./work/partners'),
    },
    {
        name: 'bannerWithBottomLink',
        title: 'Banner with bottom link',
        group: 'component',
        thumbnail: '/img/thumbnails/services.jpg',
        context: require('./page/bannerWithBottomLink'),
    },
    {
        name: 'post_template',
        title: 'Post Template',
        group: 'component',
        type: 'post',
        thumbnail: '/img/thumbnails/news/news_template.jpg',
        context: require('./news/post_template'),
    }
];

export default modules;
