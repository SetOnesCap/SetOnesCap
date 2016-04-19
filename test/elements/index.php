<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/environment.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/templates/post.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/templates/track.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/helpers/api.php');
function asset_path($filename)
{
    $manifest_path = $_SERVER['DOCUMENT_ROOT'] . '/rev-manifest.json';
    if (file_exists($manifest_path)) {
        $manifest = json_decode(file_get_contents($manifest_path), TRUE);
    } else {
        $manifest = array();
    }

    if (array_key_exists($filename, $manifest)) {
        return $manifest[$filename];
    }
    return $filename;
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Elements</title>
    <link rel="stylesheet" type="text/css" href="/assets/css/<?php echo asset_path('main.css'); ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .input-group.inline label {
            margin-right: 1em;
        }

        input[type="checkbox"],
        input[type="radio"] {
            -webkit-appearance: none;
            -moz-appearance: none;
            outline: none;
            width: 18px;
            height: 20px;
            margin-bottom: 12px;
            font-size: 20px;
        }

        input[type="checkbox"]:before,
        input[type="radio"]:before {
            font-family: FontAwesome;
            /*font-size: 20px;*/
        }

        input[type="checkbox"] + label,
        input[type="radio"] + label {
            font-size: 20px;
        }

        input[type="checkbox"]:focus,
        input[type="checkbox"]:focus + label,
        .input-group:active input[type="checkbox"],
        .input-group:active input[type="checkbox"] + label,
        input[type="radio"]:focus,
        input[type="radio"]:focus + label,
        .input-group:active input[type="radio"],
        .input-group:active input[type="radio"] + label {
            color: #be2791;
        }

        input[type="checkbox"]:before {
            content: "\f096";
        }

        input[type="checkbox"]:checked:before {
            content: "\f046";
        }

        input[type="radio"]:before {
            content: "\f10c";
        }

        input[type="radio"]:checked:before {
            content: "\f192";
        }

        .button-flat {
            cursor: pointer;
            text-align: center;
            text-transform: uppercase;
            min-width: 88px;
            border-radius: 3px;
            font-size: 14px;
            -webkit-transition: background .2s .1s;
            transition: background .2s .1s;
            color: #be2791;
            line-height: 32px;
            display: inline-block;
        }

        .button-flat:not([disabled]):hover {
            background-color: rgba(158, 158, 158, 0.2);
        }
        .button-flat[disabled] {
            color : rgba(0, 0, 0, 0.26);
            background-color: transparent;
        }

        .button-flat:not([disabled]):active {
            background: rgba(190, 39, 137, .2);
        }
    </style>

</head>
<body class="" id="elements">
<div class="left-menu no-padding">
    <div>
        <p></p>
        <input type="radio" id="form-elements" value="Form elements" v-model="activePage">
        <label for="form-elements">Form elements</label>
        <input type="radio" id="Buttons" value="Buttons" v-model="activePage">
        <label for="Buttons">Buttons</label>
    </div>
</div>
<div class="clearfix"></div>

<div class="main-content">
    <nav class="navbar z-2">
        <a id="sidenav-toggle"><i class="fa fa-bars"></i></a>
        Set One's Cap
        {{ activePage }}
        <ul>
            <li></li>
            <!-- <li><span class="fa fa-user"></span> <a href="#">Bruker</a></li>-->
        </ul>
    </nav>
    <div class="container">
        <div v-if="activePage == 'Form elements'">
            <div class="box z-1">
                <div class="content">
                    <h2>Text input</h2>
                    <div class="input-group">
                        <input type="text" id="title">
                        <label for="title">Title</label>
                    </div>
                    <div class="input-group">
                        <input type="text" id="description">
                        <label for="description">Description</label>
                    </div>
                </div>
                <pre class="content code-example">
                    <code class="language-html" data-lang="html">
                        <span>&lt;div class="input-group"&gt;</span>
                        <span class="indent-1">&lt;input type="text" id="title" /&gt;</span>
                        <span class="indent-1">&lt;label for="title"&gt;Title&lt;/label&gt;</span>
                        <span>&lt;/div&gt;</span>
                        <span>&lt;div class="input-group"&gt;</span>
                        <span class="indent-1">&lt;input type="text" id="description" /&gt;</span>
                        <span class="indent-1">&lt;label for="description"&gt;Description&lt;/label&gt;</span>
                        <span>&lt;/div&gt;</span>
                    </code>
                </pre>

            </div>
            <div class="box z-1">
                <div class="content">
                    <h2>Checkboxes</h2>
                    <h3>Vertical input group</h3>
                    <div class="input-group">
                        <input type="checkbox" id="checkbox1">
                        <label for="checkbox1">Checkbox 1</label>
                    </div>
                    <div class="input-group">
                        <input type="checkbox" id="checkbox2">
                        <label for="checkbox2">Checkbox 2</label>
                    </div>
                    <h3>Horizontal input group</h3>
                    <div class="input-group inline">
                        <input type="checkbox" id="checkbox3">
                        <label for="checkbox3">Checkbox 3</label>
                    </div>
                    <div class="input-group inline">
                        <input type="checkbox" id="checkbox4">
                        <label for="checkbox4">Checkbox 4</label>
                    </div>
                </div>
                <pre class="content code-example">
                    <code class="language-html" data-lang="html">
                        <span>&lt;div class="input-group"&gt;</span>
                        <span class="indent-1">&lt;input type="checkbox" id="checkbox1" /&gt;</span>
                        <span class="indent-1">&lt;label for="checkbox1"&gt;Checkbox 1&lt;/label&gt;</span>
                        <span>&lt;/div&gt;</span>
                        <span>&lt;div class="input-group"&gt;</span>
                        <span class="indent-1">&lt;input type="checkbox" id="checkbox2" /&gt;</span>
                        <span class="indent-1">&lt;label for="checkbox2"&gt;Checkbox 2&lt;/label&gt;</span>
                        <span>&lt;/div&gt;</span>
                        <span>&nbsp;</span>
                        <span>&lt;div class="input-group inline"&gt;</span>
                        <span class="indent-1">&lt;input type="checkbox" id="checkbox3" /&gt;</span>
                        <span class="indent-1">&lt;label for="checkbox3"&gt;Checkbox 3&lt;/label&gt;</span>
                        <span>&lt;/div&gt;</span>
                        <span>&lt;div class="input-group inline"&gt;</span>
                        <span class="indent-1">&lt;input type="checkbox" id="checkbox4" /&gt;</span>
                        <span class="indent-1">&lt;label for="checkbox4"&gt;Checkbox 4&lt;/label&gt;</span>
                        <span>&lt;/div&gt;</span>
                    </code>
                </pre>

            </div>

            <div class="box z-1">
                <div class="content">
                    <h2>Radio</h2>
                    <h3>Vertical input group</h3>
                    <div class="input-group">
                        <input type="radio" id="radio1" name="radio-group-1">
                        <label for="radio1">Radio 1</label>
                    </div>
                    <div class="input-group">
                        <input type="radio" id="radio2" name="radio-group-1">
                        <label for="radio2">Radio 2</label>
                    </div>
                    <h3>Horizontal input group</h3>
                    <div class="input-group inline">
                        <input type="radio" id="radio3" name="radio-group-2">
                        <label for="radio3">Radio 3</label>
                    </div>
                    <div class="input-group inline">
                        <input type="radio" id="radio4" name="radio-group-2">
                        <label for="radio4">Radio 4</label>
                    </div>
                </div>
                <pre class="content code-example">
                    <code class="language-html" data-lang="html">
                        <span>&lt;div class="input-group"&gt;</span>
                        <span class="indent-1">&lt;input type="radio" id="radio1" name="radio-group-1" /&gt;</span>
                        <span class="indent-1">&lt;label for="radio1"&gt;Radio 1&lt;/label&gt;</span>
                        <span>&lt;/div&gt;</span>
                        <span>&lt;div class="input-group"&gt;</span>
                        <span class="indent-1">&lt;input type="radio" id="radio2" name="radio-group-1" /&gt;</span>
                        <span class="indent-1">&lt;label for="radio2"&gt;Radio 2&lt;/label&gt;</span>
                        <span>&lt;/div&gt;</span>
                        <span>&nbsp;</span>
                        <span>&lt;div class="input-group inline"&gt;</span>
                        <span class="indent-1">&lt;input type="radio" id="radio3" name="radio-group-2" /&gt;</span>
                        <span class="indent-1">&lt;label for="radio3"&gt;Radio 3&lt;/label&gt;</span>
                        <span>&lt;/div&gt;</span>
                        <span>&lt;div class="input-group inline"&gt;</span>
                        <span class="indent-1">&lt;input type="radio" id="radio4" name="radio-group-2" /&gt;</span>
                        <span class="indent-1">&lt;label for="radio4"&gt;Radio 4&lt;/label&gt;</span>
                        <span>&lt;/div&gt;</span>
                    </code>
                </pre>

            </div>
            <div class="clearfix"></div>
        </div>

        <div v-if="activePage == 'Buttons'">
            <div class="box z-1">
                <div class="content">
                    <h2>Buttons</h2>
                    <a class="button-flat">Button 1</a>
                </div>
            </div>
        </div>


    </div>
</div>
<script type="text/javascript" src="/assets/js/<?php echo asset_path('main.js'); ?>"></script>
<script type="text/javascript" src="/bower_components/vue/dist/vue.min.js"></script>
<script type="text/javascript" src="/test/elements/elements.js"></script>
<script>
    $(".input-group input").change(function () {
        $(this).removeClass("is-not-empty");
        if ($(this).val() == "") {

            console.log("tom");
        } else {
            console.log($(this).val());
            $(this).addClass("is-not-empty");
        }
    });
    $("#sidenav-toggle").click(function () {
        if ($("body").hasClass("sidebar-active")) {
            $("body").removeClass("sidebar-active");
        } else {
            $("body").addClass("sidebar-active");
        }
    })
</script>
</body>
</html>