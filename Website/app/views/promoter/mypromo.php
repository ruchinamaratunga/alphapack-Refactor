<?php
$results = $this->searchResults ;

// function runMyFunction() {
//     echo 'I just ran a php function';
//   }

//   if (isset($_GET['hello'])) {
//     echo $_GET['hello'];
//   }
?>

<?php $this->setSiteTitle("වාසි.lk"); ?>

<?php $this->start('head'); ?>
    <link rel="stylesheet" href="<?=PROOT?>css/promotion_card.css">
<?php $this->end();?>

<?php $this->start('body'); ?>

    <header class="top-area single-page" id="home">
        <div class="top-area-bg-login" data-stellar-background-ratio="0.6">
            <div class="login-top"></div>
        </div>
        <div class="header-top-area"></div>
        <div class="welcome-area">
            <div class="area-bg"></div>
            <div class="container">
                <div class="row flex-v-center">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <div class="welcome-text text-center">
                            <h2>Promotions</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section class="about-area gray-bg section-padding">
        <div class="panel-body">
            <div class="container">
                <div class="row">
                    <?php if(count($results)):?>
                        <?php foreach($results as $result): ?>

                            <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                                <div class="single-blog wow fadeIn" >
                                    <div class="blog-image">
                                        <img src="<?=PROOT?><?=$result->image_path?>" alt="">
                                    </div>
                                    <div class="blog-details">
                                        <div class="blog-meta"><a href="#"><i class="fa fa-ship"></i></a></div>
                                        <h3><a href="<?=PROOT?>home/promoterpage/<?=$result->pr_username?>"><?=$result->title?></a></h3>
                                        <div class="post-date"><a href="#"><i class="fa fa-calendar"></i><?=$result->start_date?></a></div>
                                        <p><?=$result->description?></p>

                                        


                                        <div>
                                            <br>
                                            <?php if($result->state=='Approved') $txtformat='bg-success';
                                            elseif($result->state=='Rejected') $txtformat='bg-danger';
                                            elseif($result->state=='Pending') $txtformat='bg-warning';
                                            else $txtformat='bg-secondary';
                                            ?>
                                            <label class="col-sm-4 control-label" for="statefl">State:</label>
                                            <p class="<?=$txtformat?>" id="statefl"><?=$result->state?></p>

                                        </div>

                                        <div class="row " style="display: flex;">
                                            &nbsp;&nbsp;&nbsp;&nbsp;
                                            <a class="col-sm" href="<?=PROOT?>promoter/editpromo/<?=$result->promo_id?>"><button class="btn btn-warning" >Edit</button></a>
                                        &nbsp;&nbsp;&nbsp;
                                        <form class="col-sm" action="<?=PROOT?>promoter/deletepromo/<?=$result->promo_id?> " onsubmit="return confirm('Are you sure you want to delete this Promo?');" method="post">

                                                <button type="submit"   class="btn btn-warning"  name="deletepromo-submit">Delete</button>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        <?php endforeach;?>
                    <?php else: ?>
                        <div class="nopromo">
                            <div class="text-center">No Promotions</div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <!-- <div class="panel-body">
            <div class="container">
                <div class="row">
                    <?php if(count($results)):?>
                        <?php foreach($results as $result): ?>
                            <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                                <div class="card">
                                    <img src="<?=PROOT?><?=$result->image_path?>" class="img-rounded card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title"><?=$result->title?></h5>
                                        <p class="card-text"><?=$result->description?></p>
                                        <a href="<?=$result->link?>" class="btn btn-primary"><?=$result->pr_username?></a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach;?>
                    <?php else: ?>
                        <div class="nopromo">
                            <div class="text-center">No Promotions</div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>  -->
    </section>
<?php $this->end() ?>