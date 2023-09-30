<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BTTH01_CSE485_ex02</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/layout.css">
</head>

<body>
    <div class="container-fluid vh-100" style="position: relative; padding:0;">
        <?php
        include('header.php');
        ?>
        <div class="row w-100" style="position: absolute; top:120px;">
            <div class="row w-100">
                <div class="col">
                    <div class="main-header">

                        <div id="carouselExampleIndicators" class="carousel slide">
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                                    class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                                    aria-label="Slide 2"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                                    aria-label="Slide 3"></button>
                            </div>
                            <div class="carousel-inner bg-warning">
                                <div class="carousel-item active">
                                    <img src="img/main_header_1.jpg" class="d-block" alt="..." height="500px" style="margin-left:50%; transform: translate(-50%, 0);">
                                </div>
                                <div class="carousel-item">
                                    <img src="img/main_header_2.jpg" class="d-block" alt="..." height="500px" style="margin-left:50%; transform: translate(-50%, 0);">
                                </div>
                                <div class="carousel-item">
                                    <img src="img/main_header_3.jpg" class="d-block" alt="..." height="500px" style="margin-left:50%; transform: translate(-50%, 0);">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button"
                                data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button"
                                data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>

                    </div>
                    <div class="mt-3 d-flex justify-content-center">
                        <h4 style="color: #2185e1;">TOP BÀI HÁT YÊU THÍCH</h4>
                    </div>
                    <div class="row">

                        <?php
                        include('connection.php');
                        $stmt = $conn->prepare("SELECT * FROM baiviet LIMIT 8");
                        $stmt->execute();

                        if ($stmt->rowCount() > 0) {
                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                if (isset($row['hinhanh']) && strlen($row['hinhanh']) >= 3) {
                                    $hinhanh = substr($row['hinhanh'], 3);
                                } else {
                                    // Xử lý trường hợp chuỗi hinhanh không đủ dài
                                    $hinhanh = ''; // hoặc giá trị mặc định khác tùy ý
                                }
                                
                                ?>
                                <div class="col-md-3 p-3">
                                    <div class="p-0 posts">
                                        <img src="<?= $hinhanh ?>" alt="" width="100%" height="200px">
                                        <p style="text-align:center"><a href="detail.php?id=<?= $row["ma_bviet"] ?>">
                                                <?= $row["ten_bhat"] ?>
                                            </a></p>
                                    </div>
                                </div>
                                <?php
                            }
                        } else {
                            echo "0 results";
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="row w-100">
                <div class="col">
                    <hr>
                    <h4 style="text-align:center">TLU'S MUSIC GARDEN</h4>
                </div>
            </div>
        </div>
    </div>


    <script>
        var element = document.getElementById('trangchu');
        element.className = 'nav-link active';
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>