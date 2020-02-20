export default {
    heroBanner: () => import('./page/heroBanner'),
    secondHeroBanner: () => import('./page/secondHeroBanner'),
    caseReview: () => import('./page/caseReview'),
    goal: () => import('./page/goal'),
    labs: () => import('./page/labs'),
    partners: () => import('./page/partners'),
    bannerWithBottomLink: () => import('./page/bannerWithBottomLink'),
    project_common__hero: () => import('./projects/common/hero'),
    project_common__about: () => import( './projects/common/about'),
    project_common__overview: () => import( './projects/common/overview'),
    project_common__screenshot: () => import( './projects/common/screenshot'),
    project_common__images: () => import( './projects/common/images'),
    project_common__next_project: () => import( './projects/common/next_project'),
    project_common__numbers: () => import( './projects/common/numbers'),
    project_common__numbers_text: () => import( './projects/common/numbersWithText'),
    project_common__numbers_image: () => import( './projects/common/numbersWithImage'),
    project_common__partnership: () => import( './projects/common/partnership'),
    project_common__review: () => import( './projects/common/review'),
    project_common__screenshot_big: () => import( './projects/common/screenshot_big'),
    project_common__results: () => import('./projects/common/results'),
    project_common__screens: () => import('./projects/common/screens'),
    project_common__stats: () => import('./projects/common/stats'),
    project_common__totals: () => import('./projects/common/totals'),
    project_common__devices_screenshots: () => import('./projects/common/devicesScreenshots'),

    arkansas_project__overview: () => import('./projects/arkansas/overview'),
    arkansas_project__ui: () => import('./projects/arkansas/ui'),

    ohio_project__ui: () => import('./projects/ohio/ui'),

    clemson_project__ui: () => import('./projects/clemson/ui'),
    clemson_project__stories: () => import('./projects/clemson/stories'),

    georgia_project__ui: () => import('./projects/georgiatech/ui'),

    post_template: () => import('./news/post_template'),

    fsu_project__ui: () => import('./projects/fsu/ui'),

    work_partners: () => import('./work/partners'),
};
