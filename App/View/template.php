<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= $this->e($title) ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        .table-striped tbody tr:nth-of-type(2n) {
            background-color: rgba(0,0,0,.2);
        }
        .fa, .fas {
            font-family: "Font Awesome 5 Pro";
            font-weight: 900;
        }
        .fa, .fab, .fal, .far, .fas {
            -moz-osx-font-smoothing: grayscale;
            -webkit-font-smoothing: antialiased;
            display: inline-block;
            font-style: normal;
            font-variant: normal;
            text-rendering: auto;
            line-height: 1;
        }
        .fa-club:before{content:"\f327"}
        .fa-spade:before {
            content: "\f2f4"; }
        .fa-heart:before {
            content: "\f004"; }
        .fa-diamond:before {
            content: "\f219"; }

        @font-face {
            font-family: 'Font Awesome 5 Pro';
            font-style: normal;
            font-weight: 900;
            font-display: auto;
            src: url("./assets/webfonts/fa-solid-900.eot");
            src: url("./assets/webfonts/fa-solid-900.eot?#iefix") format("embedded-opentype"), url("./assets/webfonts/fa-solid-900.woff2") format("woff2"), url("./assets/webfonts/fa-solid-900.woff") format("woff"), url("./assets/webfonts/fa-solid-900.ttf") format("truetype"), url("./assets/webfonts/fa-solid-900.svg#fontawesome") format("svg"); }
    </style>
</head>
<body class="bg-secondary">
<nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
    <a class="navbar-brand" href="#" onclick="void();">HadyFayed</a>
    <div class="navbar" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="<?php echo Router::getNamedRoute('Home')->getPath();?>">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo Router::getNamedRoute('PokerIndex')->getPath();?>">Poker</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo Router::getNamedRoute('AnalyzerIndex')->getPath();?>">Analyzer</a>
            </li>
        </ul>
    </div>
</nav>
<div class="container pt-5">
    <?= $this->section('content') ?>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<?= $this->section('scripts') ?>
</body>
</html>
