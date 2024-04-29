<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP File Proxy</title>
    <style>
        html,
        body {
            width: 100%;
            height: 100%;
        }

        .bg-dot {
            background: linear-gradient(90deg, transparent 24%, #464748 25%, #464748 30%, transparent 31%, transparent 39%, #464748 40%, #464748 45%, transparent 45%), linear-gradient(180deg, transparent 24%, #464748 25%, #464748 30%, transparent 31%, transparent 39%, #464748 40%, #464748 45%, transparent 45%);
            background-size: 3em 3em;
            background-color: #212529;
            opacity: 1
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body class="bg-dot" data-bs-theme="dark">
    <main style="height: 90%;" class="container d-flex justify-content-center align-items-center">
        <div class="card w-75">
            <div class="card-body">
                <h2 class="card-title">PHP File Proxy</h2>
                <h6 class="card-subtitle mb-2 text-body-secondary">
                    <hr />
                </h6>
                <div class="h-25">
                    <br>
                </div>
                <div class="mb-5">
                    <label for="exampleFormControlInput1" class="form-label">Source URL</label>
                    <div>
                        <div class="input-group">
                            <input class="form-control " id="source" placeholder="source url">
                            <button onclick="redirectToPreview()" type="button" class="btn btn-outline-secondary">Submit</button>
                        </div>
                        <small class="helper-text text-danger-emphasis">
                            file formar not support or invalid url
                        </small>
                    </div>

                </div>
                <div class="h-25">
                    <br>
                </div>
            </div>
        </div>
    </main>
    <script>
        $(".helper-text").hide()

        function redirectToPreview() {
            $("#source").removeClass("is-invalid")
            $(".helper-text").hide()
            try {
                let source = $("#source").val()
                let source_path = (new URL(source)).pathname.toLocaleLowerCase()
                let base_href = null

                if (source_path.endsWith(".pdf") || source_path.endsWith(".json")) {
                    base_href = "/app"
                }
                if (source_path.endsWith(".webp") || source_path.endsWith(".png") || source_path.endsWith(".jpg") || source_path.endsWith(".jpeg") || source_path.endsWith(".gif") || source_path.endsWith(".svg")) {
                    base_href = "/img"
                }
                if (base_href != null) {
                    window.location.href = base_href + "/?src=" + source
                } else {
                    $("#source").addClass("is-invalid")
                    $(".helper-text").show()
                }
            } catch {
                $("#source").addClass("is-invalid")
                $(".helper-text").show()
            }
        }
    </script>
</body>

</html>
