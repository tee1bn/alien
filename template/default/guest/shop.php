
    <?php

    $page_title = "";
    $page_description = "";
    include 'includes/header.php';?>


        <!-- Breadcrumb area Start -->

        <div  class="breadcrumb-area bg--white-6 pt--60 pb--70 pt-lg--40 pb-lg--50 pt-md--30 pb-md--40">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 text-center">
                        <h1 class="page-title">Shop </h1>
                        <ul class="breadcrumb justify-content-center">
                            <li><a href="<?=domain;?>">Home</a></li>
                            <li class="current"><span>Shop </span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Breadcrumb area End -->

        <!-- Main Content Wrapper Start -->

            <?php include 'includes/shop.php';?>



        <!-- Main Content Wrapper Start -->


      

      <?php include 'includes/footer.php';?>