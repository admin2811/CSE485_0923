<div class="container d-flex justify-content-center align-items-center " style="flex-direction: column">
    <!--Filter-->
    <div class="filter" style="margin-top:-100px">
        <div class="filer-dropdown container-fluid d-flex justify-content-between align-items-center class-pointer">
            <div class="nav-item color-primary d-flex align-items-center">
                <a href="#" class="text">Filter</a>
            </div>
            <div class="icon">
                <i class="fa-solid fa-chevron-up"></i>
            </div>
        </div>
        <div class="form-filter">
            <div class="form-group row">
                <form action="" class="filter-form">
                    <input type="text" class="form-control" placeholder="Email" style="width:20%;padding: 10px">
                    <input type="text" class="form-control" placeholder="Mobile" style="width:20%;padding: 10px">
                    <input type="text" class="form-control" placeholder="Select Group" style="width:20%;padding: 10px">
                </form>

            </div>
            <div class="button">
                <div class="button-filter">
                    <button class="btn btn-primary" style="background: none;border: none; display:flex; gap: 10px"><i class="fa-solid fa-magnifying-glass"></i>Filter</button>
                </div>
                <div class="button-clear">
                    <button class="btn btn-primary" style="background: none;border: none;color: var(--primary);">Clear</button>
                </div>
            </div>
        </div>
    </div>

    <!--Table-->
    <div class="form" style="width: 75%">
    <?php include('table.php') ?>
    </div>

</div>