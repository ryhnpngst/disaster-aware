<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./styles/desain.css">
    <link href='https://fonts.googleapis.com/css?family=Nunito Sans' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <style>
        body {
            font-family: 'Nunito Sans';
            background-color: #383538;
            background-blend-mode: multiply;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
    </style>
    <title>Document</title>
</head>

<body>
    <div class="bg-light container-aspiration">

        <form id="aspirationForm" class="container-form" data-sb-form-api-token="API_TOKEN">
            <h1>Yuk Tuliskan Aspirasimu!</h1>
            <p>aspirasi dari kamu sangat berharga untuk kami</p>
            <div class="mb-3">
                <label class="form-label" for="titleText">Gambar</label>
                <input class="form-control" type="file" placeholder="" id="picture" name="picture"
                    data-sb-feedback="required, picture">
                <div class="invalid-feedback" data-sb-feedback="picture:required">Picture is required.</div>
            </div>
            <div class="mb-3">
                <label class="form-label" for="titleText">Judul Aspirasi</label>
                <input class="form-control" id="titleText" type="text" placeholder="Title"
                    data-sb-validations="required,title" />
                <div class="invalid-feedback" data-sb-feedback="titleText:required">Title is required</div>
                <div class="invalid-feedback" data-sb-feedback="titleText:title">Title already exists</div>
            </div>
            <div class="mb-3">
                <label class="form-label" for="description">Aspirasi mu</label>
                <textarea class="form-control" id="description" type="text" placeholder="Message" style="height: 10rem;"
                    data-sb-validations="required"></textarea>
                <div class="invalid-feedback" data-sb-feedback="description:required">description is required.</div>
            </div>
            <div class="d-none" id="submitSuccessMessage">
                <div class="text-center mb-3">
                    <div class="fw-bolder">Form submission successful!</div>
                    <p>To activate this form, sign up at</p>
                    <a
                        href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                </div>
            </div>
            <div class="d-none" id="submitErrorMessage">
                <div class="text-center text-danger mb-3">Error sending message!</div>
            </div>
            <div class="d-grid">
                <button class="btn btn-dark btn-lg disabled" id="submitButton" type="submit">Kirimkan
                    Aspirasimu!</button>
            </div>
        </form>
        <div class="image-container">
            <img src="image/massage-box.png" alt="">
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>

</html>
