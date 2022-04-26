<?php
	/**
	 * header.php
	 * Developer: Haris
	 * Date: 2/5/2022
	 * Time: 01:36
	 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description"
          content="Kinyarwanda Proficiency Program Cohort">
    <meta name="keywords" content="">

    <title><?= (!empty($this->app_title) ? $this->app_title : 'Kugeza') . (isset($title) && !empty($title) ? " - $title" : "") ?></title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,300i" rel="stylesheet">

    <!-- Styles -->
    <link href="<?= base_url() ?>/assets/theme/assets/css/core.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>/assets/theme/assets/css/app.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>/assets/theme/assets/css/style.min.css" rel="stylesheet">

    <!-- Favicons -->
    <link rel="apple-touch-icon" sizes="57x57" href="<?= base_url() ?>/assets/img/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?= base_url() ?>/assets/img/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?= base_url() ?>/assets/img/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url() ?>/assets/img/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?= base_url() ?>/assets/img/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?= base_url() ?>/assets/img/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?= base_url() ?>/assets/img/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?= base_url() ?>/assets/img/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/<?= base_url() ?>/assets/img/faviconapple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"
          href="<?= base_url() ?>/assets/img/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url() ?>/assets/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?= base_url() ?>/assets/img/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url() ?>/assets/img/favicon/favicon-16x16.png">
    <link rel="manifest" href="<?= base_url() ?>/assets/img/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?= base_url() ?>/assets/img/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff"
    <link href="<?= base_url() ?>/assets/theme/assets/css/simplemde.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.css"  />
    <style>
        .CodeMirror, .CodeMirror-scroll {
            min-height: 200px;
            /*pointer-events: none;*/
            font-size: 16px;
            font-weight: 300 !important;
        }

        .editor-toolbar {
            font-size: 10px;
        }

        .CodeMirror.cm-s-paper.CodeMirror-wrap {
            pointer-events: none
            border: solid 1px #a1a1a1;;
        }

        .bg-text-area {
            height: 400px;
        }

        .board-title {
            font-weight: bold !important;
            color: #fff8f8;
            font-size: 20px;
        }

        .board-title-1 {
            background-color: #ff9595;
        }

        .board-title-2 {
            background-color: #e10b0b;
        }

        .board-title-3 {
            background-color: #607d8b;
        }

        .board-title-4 {
            background-color: #009106;
        }

        .url-item {
            padding: 12px 5px 10px 5px;
            border: solid 1px #ececec;
            border-radius: 1px;
            text-align: center;
            background: #ff0787;
            color: #fff !important;
        }

        .url-item a {
            color: #fff !important;
            font-size: 14px;
        }

        .dock-footer {
            padding: 12px;
            background-color: #fff;
            background: #3f51b5;
            color: #fff !important;
        }

        .dock-footer button {
            color: #fff !important;
        }

        .dock-footer button:hover {
            background: #2196f3 !important;
        }

        .notepad-title {
            color: #2196f3 !important
        }

        .CodeMirror-sizer {

        }

        * {
            color: black;
        }

        .color-white {
            color: white !important;
        }

        /**
 * simplemde v1.11.2
 * Copyright Next Step Webs, Inc.
 * @link https://github.com/NextStepWebs/simplemde-markdown-editor
 * @license MIT
 */
        .CodeMirror {
            color: #000
        }

        .CodeMirror-lines {
            padding: 4px 0
        }

        .CodeMirror pre {
            padding: 0 4px
        }

        .CodeMirror-gutter-filler, .CodeMirror-scrollbar-filler {
            background-color: #fff
        }

        .CodeMirror-gutters {
            border-right: 1px solid #ddd;
            background-color: #f7f7f7;
            white-space: nowrap
        }

        .CodeMirror-linenumber {
            padding: 0 3px 0 5px;
            min-width: 20px;
            text-align: right;
            color: #999;
            white-space: nowrap
        }

        .CodeMirror-guttermarker {
            color: #000
        }

        .CodeMirror-guttermarker-subtle {
            color: #999
        }

        .CodeMirror-cursor {
            border-left: 1px solid #000;
            border-right: none;
            width: 0
        }

        .CodeMirror div.CodeMirror-secondarycursor {
            border-left: 1px solid silver
        }

        .cm-fat-cursor .CodeMirror-cursor {
            width: auto;
            border: 0 !important;
            background: #7e7
        }

        .cm-fat-cursor div.CodeMirror-cursors {
            z-index: 1
        }

        .cm-animate-fat-cursor {
            width: auto;
            border: 0;
            -webkit-animation: blink 1.06s steps(1) infinite;
            -moz-animation: blink 1.06s steps(1) infinite;
            animation: blink 1.06s steps(1) infinite;
            background-color: #7e7
        }

        @-moz-keyframes blink {
            50% {
                background-color: transparent
            }
        }

        @-webkit-keyframes blink {
            50% {
                background-color: transparent
            }
        }

        @keyframes blink {
            50% {
                background-color: transparent
            }
        }

        .cm-tab {
            display: inline-block;
            text-decoration: inherit
        }

        .CodeMirror-ruler {
            border-left: 1px solid #ccc;
            position: absolute
        }

        .cm-s-default .cm-header {
            color: #00f
        }

        .cm-s-default .cm-quote {
            color: #090
        }

        .cm-negative {
            color: #d44
        }

        .cm-positive {
            color: #292
        }

        .cm-header, .cm-strong {
            font-weight: 700
        }

        .cm-em {
            font-style: italic
        }

        .cm-link {
            text-decoration: underline
        }

        .cm-strikethrough {
            text-decoration: line-through
        }

        .cm-s-default .cm-keyword {
            color: #708
        }

        .cm-s-default .cm-atom {
            color: #219
        }

        .cm-s-default .cm-number {
            color: #164
        }

        .cm-s-default .cm-def {
            color: #00f
        }

        .cm-s-default .cm-variable-2 {
            color: #05a
        }

        .cm-s-default .cm-variable-3 {
            color: #085
        }

        .cm-s-default .cm-comment {
            color: #a50
        }

        .cm-s-default .cm-string {
            color: #a11
        }

        .cm-s-default .cm-string-2 {
            color: #f50
        }

        .cm-s-default .cm-meta, .cm-s-default .cm-qualifier {
            color: #555
        }

        .cm-s-default .cm-builtin {
            color: #30a
        }

        .cm-s-default .cm-bracket {
            color: #997
        }

        .cm-s-default .cm-tag {
            color: #170
        }

        .cm-s-default .cm-attribute {
            color: #00c
        }

        .cm-s-default .cm-hr {
            color: #999
        }

        .cm-s-default .cm-link {
            color: #00c
        }

        .cm-invalidchar, .cm-s-default .cm-error {
            color: red
        }

        .CodeMirror-composing {
            border-bottom: 2px solid
        }

        div.CodeMirror span.CodeMirror-matchingbracket {
            color: #0f0
        }

        div.CodeMirror span.CodeMirror-nonmatchingbracket {
            color: #f22
        }

        .CodeMirror-matchingtag {
            background: rgba(255, 150, 0, .3)
        }

        .CodeMirror-activeline-background {
            background: #e8f2ff
        }

        .CodeMirror {
            position: relative;
            overflow: hidden;
            background: #fff
        }

        .CodeMirror-scroll {
            overflow: scroll !important;
            margin-bottom: -30px;
            margin-right: -30px;
            padding-bottom: 30px;
            height: 100%;
            outline: 0;
            position: relative
        }

        .CodeMirror-sizer {
            position: relative;
            border-right: 30px solid transparent
        }

        .CodeMirror-gutter-filler, .CodeMirror-hscrollbar, .CodeMirror-scrollbar-filler, .CodeMirror-vscrollbar {
            position: absolute;
            z-index: 6;
            display: none
        }

        .CodeMirror-vscrollbar {
            right: 0;
            top: 0;
            overflow-x: hidden;
            overflow-y: scroll
        }

        .CodeMirror-hscrollbar {
            bottom: 0;
            left: 0;
            overflow-y: hidden;
            overflow-x: scroll
        }

        .CodeMirror-scrollbar-filler {
            right: 0;
            bottom: 0
        }

        .CodeMirror-gutter-filler {
            left: 0;
            bottom: 0
        }

        .CodeMirror-gutters {
            position: absolute;
            left: 0;
            top: 0;
            min-height: 100%;
            z-index: 3
        }

        .CodeMirror-gutter {
            white-space: normal;
            height: 100%;
            display: inline-block;
            vertical-align: top;
            margin-bottom: -30px
        }

        .CodeMirror-gutter-wrapper {
            position: absolute;
            z-index: 4;
            background: 0 0 !important;
            border: none !important;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none
        }

        .CodeMirror-gutter-background {
            position: absolute;
            top: 0;
            bottom: 0;
            z-index: 4
        }

        .CodeMirror-gutter-elt {
            position: absolute;
            cursor: default;
            z-index: 4
        }

        .CodeMirror-lines {
            cursor: text;
            min-height: 1px
        }

        .CodeMirror pre {
            -moz-border-radius: 0;
            -webkit-border-radius: 0;
            border-radius: 0;
            border-width: 0;
            background: 0 0;
            font-family: inherit;
            font-size: inherit;
            margin: 0;
            white-space: pre;
            word-wrap: normal;
            line-height: inherit;
            color: inherit;
            z-index: 2;
            position: relative;
            overflow: visible;
            -webkit-tap-highlight-color: transparent;
            -webkit-font-variant-ligatures: none;
            font-variant-ligatures: none
        }

        .CodeMirror-wrap pre {
            word-wrap: break-word;
            white-space: pre-wrap;
            word-break: normal
        }

        .CodeMirror-linebackground {
            position: absolute;
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
            z-index: 0
        }

        .CodeMirror-linewidget {
            position: relative;
            z-index: 2;
            overflow: auto
        }

        .CodeMirror-code {
            outline: 0
        }

        .CodeMirror-gutter, .CodeMirror-gutters, .CodeMirror-linenumber, .CodeMirror-scroll, .CodeMirror-sizer {
            -moz-box-sizing: content-box;
            box-sizing: content-box
        }

        .CodeMirror-measure {
            position: absolute;
            width: 100%;
            height: 0;
            overflow: hidden;
            visibility: hidden
        }

        .CodeMirror-cursor {
            position: absolute
        }

        .CodeMirror-measure pre {
            position: static
        }

        div.CodeMirror-cursors {
            visibility: hidden;
            position: relative;
            z-index: 3
        }

        .CodeMirror-focused div.CodeMirror-cursors, div.CodeMirror-dragcursors {
            visibility: visible
        }

        .CodeMirror-selected {
            background: #d9d9d9
        }

        .CodeMirror-focused .CodeMirror-selected, .CodeMirror-line::selection, .CodeMirror-line > span::selection, .CodeMirror-line > span > span::selection {
            background: #d7d4f0
        }

        .CodeMirror-crosshair {
            cursor: crosshair
        }

        .CodeMirror-line::-moz-selection, .CodeMirror-line > span::-moz-selection, .CodeMirror-line > span > span::-moz-selection {
            background: #d7d4f0
        }

        .cm-searching {
            background: #ffa;
            background: rgba(255, 255, 0, .4)
        }

        .cm-force-border {
            padding-right: .1px
        }

        @media print {
            .CodeMirror div.CodeMirror-cursors {
                visibility: hidden
            }
        }

        .cm-tab-wrap-hack:after {
            content: ''
        }

        span.CodeMirror-selectedtext {
            background: 0 0
        }

        .CodeMirror {
            height: auto;
            min-height: 300px;
            border: 1px solid #ddd;
            border-bottom-left-radius: 4px;
            border-bottom-right-radius: 4px;
            padding: 10px;
            font: inherit;
            z-index: 1
        }

        .CodeMirror-scroll {
            min-height: 300px
        }

        .CodeMirror-fullscreen {
            background: #fff;
            position: fixed !important;
            top: 50px;
            left: 0;
            right: 0;
            bottom: 0;
            height: auto;
            z-index: 9
        }

        .CodeMirror-sided {
            width: 50% !important
        }

        .editor-toolbar {
            position: relative;
            opacity: .6;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            -o-user-select: none;
            user-select: none;
            padding: 0 10px;
            border-top: 1px solid #bbb;
            border-left: 1px solid #bbb;
            border-right: 1px solid #bbb;
            border-top-left-radius: 4px;
            border-top-right-radius: 4px
        }

        .editor-toolbar:after, .editor-toolbar:before {
            display: block;
            content: ' ';
            height: 1px
        }

        .editor-toolbar:before {
            margin-bottom: 8px
        }

        .editor-toolbar:after {
            margin-top: 8px
        }

        .editor-toolbar:hover, .editor-wrapper input.title:focus, .editor-wrapper input.title:hover {
            opacity: .8
        }

        .editor-toolbar.fullscreen {
            width: 100%;
            height: 50px;
            overflow-x: auto;
            overflow-y: hidden;
            white-space: nowrap;
            padding-top: 10px;
            padding-bottom: 10px;
            box-sizing: border-box;
            background: #fff;
            border: 0;
            position: fixed;
            top: 0;
            left: 0;
            opacity: 1;
            z-index: 9
        }

        .editor-toolbar.fullscreen::before {
            width: 20px;
            height: 50px;
            background: -moz-linear-gradient(left, rgba(255, 255, 255, 1) 0, rgba(255, 255, 255, 0) 100%);
            background: -webkit-gradient(linear, left top, right top, color-stop(0, rgba(255, 255, 255, 1)), color-stop(100%, rgba(255, 255, 255, 0)));
            background: -webkit-linear-gradient(left, rgba(255, 255, 255, 1) 0, rgba(255, 255, 255, 0) 100%);
            background: -o-linear-gradient(left, rgba(255, 255, 255, 1) 0, rgba(255, 255, 255, 0) 100%);
            background: -ms-linear-gradient(left, rgba(255, 255, 255, 1) 0, rgba(255, 255, 255, 0) 100%);
            background: linear-gradient(to right, rgba(255, 255, 255, 1) 0, rgba(255, 255, 255, 0) 100%);
            position: fixed;
            top: 0;
            left: 0;
            margin: 0;
            padding: 0
        }

        .editor-toolbar.fullscreen::after {
            width: 20px;
            height: 50px;
            background: -moz-linear-gradient(left, rgba(255, 255, 255, 0) 0, rgba(255, 255, 255, 1) 100%);
            background: -webkit-gradient(linear, left top, right top, color-stop(0, rgba(255, 255, 255, 0)), color-stop(100%, rgba(255, 255, 255, 1)));
            background: -webkit-linear-gradient(left, rgba(255, 255, 255, 0) 0, rgba(255, 255, 255, 1) 100%);
            background: -o-linear-gradient(left, rgba(255, 255, 255, 0) 0, rgba(255, 255, 255, 1) 100%);
            background: -ms-linear-gradient(left, rgba(255, 255, 255, 0) 0, rgba(255, 255, 255, 1) 100%);
            background: linear-gradient(to right, rgba(255, 255, 255, 0) 0, rgba(255, 255, 255, 1) 100%);
            position: fixed;
            top: 0;
            right: 0;
            margin: 0;
            padding: 0
        }

        .editor-toolbar a {
            display: inline-block;
            text-align: center;
            text-decoration: none !important;
            color: #2c3e50 !important;
            width: 30px;
            height: 30px;
            margin: 0;
            border: 1px solid transparent;
            border-radius: 3px;
            cursor: pointer
        }

        .editor-toolbar a.active, .editor-toolbar a:hover {
            background: #fcfcfc;
            border-color: #95a5a6
        }

        .editor-toolbar a:before {
            line-height: 30px
        }

        .editor-toolbar i.separator {
            display: inline-block;
            width: 0;
            border-left: 1px solid #d9d9d9;
            border-right: 1px solid #fff;
            color: transparent;
            text-indent: -10px;
            margin: 0 6px
        }

        .editor-toolbar a.fa-header-x:after {
            font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;
            font-size: 65%;
            vertical-align: text-bottom;
            position: relative;
            top: 2px
        }

        .editor-toolbar a.fa-header-1:after {
            content: "1"
        }

        .editor-toolbar a.fa-header-2:after {
            content: "2"
        }

        .editor-toolbar a.fa-header-3:after {
            content: "3"
        }

        .editor-toolbar a.fa-header-bigger:after {
            content: "â–²"
        }

        .editor-toolbar a.fa-header-smaller:after {
            content: "â–¼"
        }

        .editor-toolbar.disabled-for-preview a:not(.no-disable) {
            pointer-events: none;
            background: #fff;
            border-color: transparent;
            text-shadow: inherit
        }

        @media only screen and (max-width: 700px) {
            .editor-toolbar a.no-mobile {
                display: none
            }
        }

        .editor-statusbar {
            padding: 8px 10px;
            font-size: 12px;
            color: #959694;
            text-align: right
        }

        .editor-statusbar span {
            display: inline-block;
            min-width: 4em;
            margin-left: 1em
        }

        .editor-preview, .editor-preview-side {
            padding: 10px;
            background: #ffffff;
            overflow: auto;
            display: none;
            box-sizing: border-box;
            font-weight: 400;
        }
        
        .bg-grey{
            background-color: #efefef;
        }
        .editor-statusbar .lines:before {
            content: 'lines: '
        }

        .editor-statusbar .words:before {
            content: 'words: '
        }

        .editor-statusbar .characters:before {
            content: 'characters: '
        }

        .editor-preview {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: 7
        }

        .editor-preview-side {
            position: fixed;
            bottom: 0;
            width: 50%;
            top: 50px;
            right: 0;
            z-index: 9;
            border: 1px solid #ddd
        }

        .editor-preview-active, .editor-preview-active-side {
            display: block
        }

        .editor-preview-side > p, .editor-preview > p {
            margin-top: 0
        }

        .editor-preview pre, .editor-preview-side pre {
            background: #eee;
            margin-bottom: 10px
        }

        .editor-preview table td, .editor-preview table th, .editor-preview-side table td, .editor-preview-side table th {
            border: 1px solid #ddd;
            padding: 5px
        }

        .CodeMirror .CodeMirror-code .cm-tag {
            color: #63a35c
        }

        .CodeMirror .CodeMirror-code .cm-attribute {
            color: #795da3
        }

        .CodeMirror .CodeMirror-code .cm-string {
            color: #183691
        }

        .CodeMirror .CodeMirror-selected {
            background: #d9d9d9
        }

        .CodeMirror .CodeMirror-code .cm-header-1 {
            font-size: 200%;
            line-height: 200%
        }

        .CodeMirror .CodeMirror-code .cm-header-2 {
            font-size: 160%;
            line-height: 160%
        }

        .CodeMirror .CodeMirror-code .cm-header-3 {
            font-size: 125%;
            line-height: 125%
        }

        .CodeMirror .CodeMirror-code .cm-header-4 {
            font-size: 110%;
            line-height: 110%
        }

        .CodeMirror .CodeMirror-code .cm-comment {
            background: rgba(0, 0, 0, .05);
            border-radius: 2px
        }

        .CodeMirror .CodeMirror-code .cm-link {
            color: #7f8c8d
        }

        .CodeMirror .CodeMirror-code .cm-url {
            color: #aab2b3
        }

        .CodeMirror .CodeMirror-code .cm-strikethrough {
            text-decoration: line-through
        }

        .CodeMirror .CodeMirror-placeholder {
            opacity: .5
        }

        .CodeMirror .cm-spell-error:not(.cm-url):not(.cm-comment):not(.cm-tag):not(.cm-word) {
            background: rgba(255, 0, 0, .15)
        }
        
        .toast .text{
            color: #fff !important;
        }

        iframe {
            width: 100%;
            min-height: 1000px;
            border: none;
        }
    </style>
	<?php if ($this->router->method === 'library'): ?>
        <style>
            iframe #changed_code_text{
                height: 500px !important;
                background: red;
                overflow: scroll;
            }
        </style>
        
	<?php endif; ?>
    <script>
        function resizeIframe(obj) {
            console.log(obj)
          //  obj.style.height = obj.contentWindow.document.documentElement.scrollHeight + 'px';
        }

    </script>
</head>

<body>
<!-- Preloader -->
<div class="preloader">
    <div class="spinner-dots">
        <span class="dot1"></span>
        <span class="dot2"></span>
        <span class="dot3"></span>
    </div>
</div>
<!-- Topbar -->
<header class="topbar topbar-expand-lg" id="app-topbar">
    <div class="topbar-left">
        <span class="topbar-btn topbar-menu-toggler"><i>&#9776;</i></span>
        <span class="topbar-brand"><img src="<?= base_url('assets/img/main-logo') ?>" ></span>

        <div class="topbar-divider d-none d-xl-block"></div>

        <nav class="topbar-navigation">
            <ul class="menu">

                <li class="menu-item">
                    <a class="menu-link" href="<?= base_url('/') ?>">
                        <span class="icon fa fa-home"></span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>
                <li class="menu-item">
                    <a class="menu-link"  href="<?=base_url('library')?>">
                        <span class="icon fa fa-book"></span>
                        <span class="title">Library of books</span>
                    </a>
                </li>
                <?php if(false): ?>
                    <li class="menu-item">
                        <a class="menu-link"  href="<?=base_url('e-learning')?>">
                            <span class="icon fa fa-book"></span>
                            <span class="title">E-Learning</span>
                        </a>
                    </li>
                <?php endif; ?>
	            <?php if ($this->session->has_userdata('logged_in')) : ?>
                    <li class="menu-item">
                        <a class="menu-link" href="<?= base_url('students') ?>">
                            <span class="icon fa fa-users"></span>
                            <span class="title">Students</span>
                        </a>
                    </li>
	            <?php endif; ?>
            </ul>
        </nav>
    </div>

    <div class="topbar-right">
        <ul class="topbar-btns">
			<?php if ($this->session->has_userdata('logged_in')) : ?>

                <li class="dropdown">
				<span class="topbar-btn" data-toggle="dropdown"><img class="avatar"
                                                                     src="<?= !empty($this->session->userdata['logged_in']['profile_pic']) ? base_url() . '/assets/uploaded_files/students/' . $this->session->userdata['logged_in']['profile_pic'] : base_url() . '/assets/theme/assets/img/avatar/1.jpg' ?>"
                                                                     alt="..."></span>
                    <div class="dropdown-menu dropdown-menu-right">
                        <p class="dropdown-item"><i
                                    class="ti-user"></i> <?= $this->session->userdata['logged_in']['name'] ?></p>
                        <a class="menu-link notepad-title edit-profile" href="#">
                            <span class="ti-pencil"></span>
                            <span class="title ">Edit Profile</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?= base_url('logout') ?>"><i class="ti-power-off"></i>
                            Logout</a>
                    </div>
                </li>
                <li class="dropdown">
                    <a class="menu-link notepad-title" data-toggle="dock" href="#" data-target="#modal-notepad">
                        <span class="icon fa fa-pencil"></span>
                        <span class="title ">NOTEPAD</span>
                    </a>
                </li>
                <li class="dropdown">
                    <a class="menu-link notepad-title" href="<?=base_url('class-work')?>">
                        <span class="icon fa fa-pencil"></span>
                        <span class="title ">Class Work</span>
                    </a>
                </li>
                <li class="dropdown">
                    <a class="menu-link notepad-title" href="<?=base_url('tasks')?>">
                        <span class="icon fa fa-pencil"></span>
                        <span class="title ">Tasks</span>
                    </a>
                </li>
			
			<?php else: ?>
                <li class="dropdown">
                    <a class="menu-link" href="<?= base_url('login') ?>" data-target="#modal-notepad">
                        <span class="icon fa fa-user"></span>
                        <span class="title"><?=$this->lang->line('login')?></span>
                    </a>
                </li>
			<?php endif; ?>
        </ul>

        <div class="topbar-divider d-none d-md-block"></div>


    </div>
</header>
<!-- END Topbar -->


<div class="dock-list">

    <div id="modal-notepad" class="dock dock-lg">
        <header class="dock-header">
            <div class="dock-title">
                <span><i class="fa fa-pencil"></i></span>
                <span>Edit Notepad</span>
            </div>

            <div class="dock-actions">
                <span title="Close" data-provide="tooltip" data-dock="close"></span>
                <span title="Maximize" data-provide="tooltip" data-dock="maximize"></span>
                <span title="Minimize" data-provide="tooltip" data-dock="minimize"></span>
             
                <span title="Save" data-summernote-save="#mynotepad" data-callback="save_notepad"
                      data-provide="tooltip"> <span><i class="fa fa-save"></i></span></span>
            </div>
        </header>

        <div class="dock-body">
            <div class="dock-block">
           <textarea id="mynotepad" data-provide="summernote" data-toolbar="full"
                     class="form-control" cols="10" rows="10" data-height="500" data-min-heigh="500">
                  |<?= isset($note_pad) ? $note_pad['text'] : '' ?>
              </textarea>
            </div>
        </div>
        <div class="dock-footer">
            
            <button type="button" class="btn btn-bold btn-pure btn-primary border"
                    onclick="save_notepad()">Save changes
            </button>
            <button type="button" class="btn btn-bold btn-pure btn-info border sub-modal" component="email" section="notepad" title="Send Email" >Send Email
            </button>
        </div>
    </div>

</div>
