<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Upload Galery</title>

    <script type="text/javascript" src="<?php echo base_url() . 'ckeditor/ckeditor.js'; ?>"></script>
    <style type="text/css">
        ::selection {
            background-color: #E13300;
            color: white;
        }

        ::-moz-selection {
            background-color: #E13300;
            color: white;
        }

        body {
            background-color: #fff;
            margin: 40px;
            font: 14px/20px normal Helvetica, Arial, sans-serif;
            color: #4F5155;
        }

        a {
            color: #003399;
            background-color: transparent;
            font-weight: normal;
        }

        h1 {
            color: #444;
            background-color: transparent;
            border-bottom: 1px solid #D0D0D0;
            font-size: 20px;
            font-weight: normal;
            margin: 0 0 14px 0;
            padding: 12px 16px 10px 16px;
        }

        input,
        textarea {
            width: calc(100% - 24px);
            font-family: Consolas, Monaco, Courier New, Courier, monospace;
            font-size: 12px;
            background-color: #f9f9f9;
            border: 1px solid #D0D0D0;
            color: #002166;
            display: block;
            margin: 12px 0 12px 0;
            padding: 12px 10px 12px 10px;
            resize: vertical;
        }

        button {
            width: 100%;
            font-family: Consolas, Monaco, Courier New, Courier, monospace;
            font-size: 16px;
            background-color: #89CD7D;
            border: 0px solid #fff;
            color: #fff;
            display: block;
            margin: 12px 0 12px 0;
            padding: 12px 10px 12px 10px;
        }

        #body {
            margin: 0 16px 0 16px;
        }

        #container {
            margin: 10px;
            border: 1px solid #D0D0D0;
        }
    </style>
</head>

<body>

    <div id="container">
        <h1>Form Upload Loker</h1>

        <div id="body">
            <?php echo form_open_multipart('KhususAdmin/insertLoker/', array('id' => 'img')); ?>
            <p>Loker Image</p>
            <input type="file" name="image" accept="image/*" />

            <p>Loker Title</p>
            <input type="text" name="title" placeholder="Your title here..." />

            <p>Loker Description</p>
            <textarea name="desc" rows="5" class="form-control ckeditor" id="ckedtor" placeholder="Your description here..."></textarea>

            <button type="submit">Submit</button>
            </form>
        </div>
    </div>

</body>

</html>