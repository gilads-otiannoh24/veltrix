<!DOCTYPE html>
<html lang="en" x-data="App()" data-theme="light">

<head>
    <?= $this->include('layouts/partials/header_links'); ?>

    <?= $this->renderSection('pageStyles'); ?>
</head>

<body>

    <main>
        <?= $this->renderSection('content'); ?>
    </main>

    <?= $this->include('layouts/partials/footer_links'); ?>
    <?= $this->renderSection('pageScripts'); ?>
</body>

</html>