<!DOCTYPE html>
<html>

<head>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <style>
        * {
            font-family: Poppins;
        }

        #photos {
            /* Prevent vertical gaps */
            line-height: 0;

            -webkit-column-count: 5;
            -webkit-column-gap: 0px;
            -moz-column-count: 5;
            -moz-column-gap: 0px;
            column-count: 5;
            column-gap: 4px;
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
            height: auto !important;
            transition: .4s;
        }

        #photos .gallery .desc {
            position: absolute;
            left: 0;
            right: 0;
            bottom: 0;
            top: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background: rgba(0, 0, 0, .8);
            opacity: 0;
            transition: .4s;
        }

        #photos .gallery .desc h1 {
            color: #fff;
            word-break: break-all;
            line-height: 24px;
            font-size: 20px;
            padding: 0px 20px;
            text-align: center;
        }

        #photos .gallery:hover .desc {
            opacity: 1;
        }

        #photos .gallery:hover img {
            filter: blur(4px) grayscale(100%);
            transform: scale(1.1);
        }

        @media (max-width: 1200px) {
            #photos {
                -moz-column-count: 4;
                -webkit-column-count: 4;
                column-count: 4;
            }
        }

        @media (max-width: 1000px) {
            #photos {
                -moz-column-count: 3;
                -webkit-column-count: 3;
                column-count: 3;
            }
        }

        @media (max-width: 800px) {
            #photos {
                -moz-column-count: 2;
                -webkit-column-count: 2;
                column-count: 2;
            }
        }

        @media (max-width: 400px) {
            #photos {
                -moz-column-count: 1;
                -webkit-column-count: 1;
                column-count: 1;
            }
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
            <div>
                <div class="detail-container">
                    <h1 id="modalTitle"></h1>
                    <p id="modalDesc"></p>
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

        <?php foreach ($galeryData as $data) { ?>
            <div class="gallery" onclick="showModal('<?php echo $data->galeryID ?>', '<?php echo base_url($data->galeryImage); ?>', '<?php echo $data->galeryTitle ?>', '<?php echo $data->galeryDesc ?>')">
                <a href="">
                    <img src="<?php echo base_url($data->galeryImage); ?>" alt="<?php echo $data->galeryTitle ?>">
                </a>
                <div class="desc">
                    <h1><?php echo $data->galeryTitle ?></h1>
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
        document.getElementById("modalDesc").innerText = desc;
        document.getElementById("commentID").value = id;
        getComment(id);
    }

    function getComment(id) {
        const api_url = '<?php echo base_url('index.php/UserServices/getAllCommentOnGalery/') ?>' + id;
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
                        <p class="comment-name">${element.galeryCommentName}</p>
                        <p class="comment-value">${element.galeryCommentValue}</p>
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

        const api_url = '<?php echo base_url('index.php/UserServices/insertCommentOnGalery/') ?>';
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