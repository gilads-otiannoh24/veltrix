<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= $title ?? "Jengo Starter Template" ?></title>

<!-- tailwind css and global css -->
<link rel="stylesheet" href="<?= base_url('css/global.css') . getFileVersion()  ?>">
<link rel="stylesheet" href="<?= base_url('css/main.css') . getFileVersion()  ?>">

<!-- main js -->
<!-- Loads alpinejs, lodash, ajax utility class and utility functions -->
<script defer src="<?= base_url('js/dist/app.js') . getFileVersion() ?>"></script>

<!-- Define all global varialbes here -->
<script>
    function App() {
        return {
            baseURL: "<?= url_to("/") ?>",
            globals: ['baseURL'],
            setGlobals() {
                this.globals.forEach((key) => {
                    window[key] = this[key];
                });
            },
            init() {
                this.setGlobals();
            }
        }
    }
</script>