const modules = [
    {
        name: 'servicesHero',
        title: 'Services: Hero Banner',
        group: 'component',
        type: 'services',
        thumbnail: '/img/thumbnails/hero3.jpg',
        context: require('./services/servicesHero'),
    },
    {
        name: 'servicesAreas',
        title: 'Services: Areas',
        group: 'component',
        type: 'services',
        thumbnail: '/img/thumbnails/what_we_do.jpg',
        context: require('./services/servicesAreas'),
    },
    {
        name: 'servicesRightImageBlock',
        title: 'Services: Right Image Block',
        group: 'component',
        type: 'services',
        thumbnail: '/img/thumbnails/block_with_count.jpg',
        context: require('./services/servicesRightImageBlock'),
    },
    {
        name: 'servicesLeftImageBlock',
        title: 'Services: Left Image Block',
        group: 'component',
        type: 'services',
        thumbnail: '/img/thumbnails/block_with_count2.jpg',
        context: require('./services/servicesLeftImageBlock'),
    },
    {
        name: 'servicesBottom',
        title: 'Services: Bottom Block',
        group: 'component',
        type: 'services',
        thumbnail: '/img/thumbnails/services2.jpg',
        context: require('./services/servicesBottom'),
    },
];

export default modules;
