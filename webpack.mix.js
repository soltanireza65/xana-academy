const mix = require("laravel-mix");

// mix.react('src/app.js', 'dist')
//     .setPublicPath('dist');

mix
  .ts("resources/src/pages/help/Single.tsx", "resources/dist/js/pages/help/")
  // .ts("resources/src/pages/help/Archive.tsx", "resources/dist/js/pages/help/")
  .react();
// mix.ts("resources/src/pages/downloads/Downloads.tsx", "resources/dist/js/pages/downloads/").react()
// .sass("resources/sass/app.scss", "public/css")
// .browserSync({
//     proxy: "http://localhost:8000",
//     files: ["public/**/*.*"],
//     open: false,
// })
// .disableNotifications();
// mix.ts("resources/src/admin/admin.ts", "resources/dist/admin/js")
