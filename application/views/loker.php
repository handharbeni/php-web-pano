<!DOCTYPE html>
<html>

<head>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <style>
        * {
            font-family: sans-serif;
        }

        #photos {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            grid-gap: 20px;
        }

        #photos .gallery {
            position: relative;
            margin-bottom: 4px;
            cursor: pointer;
            overflow: hidden;
            border-radius: 4px;
        }

        #photos .gallery img {
            /* Just in case there are inline attributes */
            width: 100% !important;
            height: 280px !important;
            object-fit: cover;
            border-radius: 4px;
            transition: .4s;
        }

        #photos .gallery h1 {
            color: #182847;
            font-size: 20px;
            margin: 0;
            margin: 12px 20px;
        }

        body {
            margin: 4px;
            padding: 0;
        }

        .modal {
            display: none;
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            padding: 80px 0px;
            background-color: rgba(0, 0, 0, .9);
            justify-content: center;
            overflow: auto;
        }

        .modal .modal-content {
            position: relative;
            display: flex;
            flex-flow: row nowrap;
            align-items: flex-start;
            border-radius: 8px;
            width: calc(100% - 160px);
        }

        .img-container {
            max-width: 40%;
            max-height: 100%;
            margin-right: 8px;
            border-radius: 4px;
            object-fit: scale-down;
        }

        .detail-container {
            padding: 20px;
            background-color: #fff;
            border-radius: 4px;
        }

        .comment-container {
            margin-top: 8px;
        }

        .comment-input-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 4px;
        }

        #modalTitle {
            margin-top: 0px;
        }

        .close {
            position: absolute;
            right: 20px;
            top: 8px;
            font-size: 40px;
            cursor: pointer;
        }

        input,
        textarea {
            width: calc(100% - 24px);
            font-size: 12px;
            background-color: #f9f9f9;
            border: 1px solid #D0D0D0;
            border-radius: 4px;
            color: #002166;
            display: block;
            margin: 12px 0 12px 0;
            padding: 12px 10px 12px 10px;
            resize: vertical;
        }

        button {
            font-family: Consolas, Monaco, Courier New, Courier, monospace;
            font-size: 16px;
            background-color: #89CD7D;
            border: 0px solid #fff;
            border-radius: 4px;
            color: #fff;
            display: block;
            margin: 12px 0 12px 0;
            padding: 12px 20px;
        }

        .comment-name {
            font-size: 12px;
            font-weight: 600;
            margin: 0;
        }

        .comment-value {
            margin: 0;
        }
    </style>
</head>

<body>

    <div id="mainModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="hideModal()">&times;</span>
            <img id="modalImage" class="img-container" src="" alt="">
            <div style="flex: 1">
                <div class="detail-container">
                    <h1 id="modalTitle"></h1>
                    <div id="modalDesc"></div>
                </div>
                <div class="comment-container">
                    <div class="comment-input-container">
                        <form id="commentForm">
                            <p style="margin: 0">Komentar</p>
                            <div style="display: flex;">
                                <input type="hidden" name="id" placeholder="ID" id="commentID" required />
                                <input type="text" name="name" id="commentName" style="width: 120px; margin-right: 8px" placeholder="Your name" required />
                                <input type="text" name="comment" id="commentValue" style="margin-right: 8px" placeholder="Your comment here..." required />
                                <button type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                    <div class="comment-input-container" style="margin-top: 8px" id="comment-group">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section id="photos">
        <?php foreach ($lokerData as $data) { ?>
            <div class="gallery" onclick="showModal('<?php echo $data->lokerID ?>', '<?php echo base_url($data->lokerImage); ?>', '<?php echo $data->lokerTitle ?>', `<?php echo $data->lokerDesc ?>`)">
                <div>
                    <img src="<?php echo base_url($data->lokerImage); ?>" alt="<?php echo $data->lokerTitle ?>">
                    <div>
                        <h1><?php echo $data->lokerTitle ?></h1>
                    </div>
                </div>
            </div>
        <?php } ?>

    </section>

</body>

<script>
    function showModal(id, image, title, desc) {
        document.getElementById('mainModal').style.display = 'flex';
        document.getElementById("modalImage").src = image;
        document.getElementById("modalTitle").innerText = title;
        document.getElementById("modalDesc").innerHTML = desc;
        document.getElementById("commentID").value = id;
        getComment(id);
    }

    function getComment(id) {
        const api_url = '<?php echo base_url('index.php/UserServices/getAllCommentOnLoker/') ?>' + id;
        $.ajax({
            url: api_url,
            type: 'GET',
            success: function(result) {
                var response = JSON.parse(result);
                console.log(response);

                if (response.data.length > 0) {
                    document.getElementById("comment-group").style.display = 'block';
                } else {
                    document.getElementById("comment-group").style.display = 'none';
                }

                document.getElementById("comment-group").innerHTML = '';
                response.data.forEach(element => {
                    var e = document.createElement('div');
                    e.innerHTML = `
                        <p class="comment-name">${element.lokerCommentName}</p>
                        <p class="comment-value">${element.lokerCommentValue}</p>
                    `;
                    document.getElementById("comment-group").append(e);
                });
            },
            error: function(error) {
                console.log(`Error ${error}`);
            }
        })
    }

    function hideModal() {
        document.getElementById('mainModal').style.display = 'none';
        document.getElementById("comment-group").style.display = 'none';
        document.getElementById("modalImage").src = '';
        document.getElementById("modalTitle").innerText = '';
        document.getElementById("modalDesc").innerText = '';
        document.getElementById("commentID").value = '';
    }

    $("#commentForm").submit(function(e) {
        e.preventDefault();
        var id = document.getElementById("commentID").value;
        var name = document.getElementById("commentName").value;
        var value = document.getElementById("commentValue").value;

        const api_url = '<?php echo base_url('index.php/UserServices/insertCommentOnLoker/') ?>';
        $.ajax({
            url: api_url,
            method: "POST",
            data: {
                ID: id,
                Name: name,
                Value: value,
            },
            success: function(result) {
                console.log(result);
                getComment(id);
            },
            error: function(error) {
                console.log(`Error ${error}`);
            }
        })
    });
</script>

</html>