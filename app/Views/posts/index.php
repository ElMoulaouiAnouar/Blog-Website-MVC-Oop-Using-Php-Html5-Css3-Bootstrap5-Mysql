<div class="container-fluid p-3">
    <div class="d-flex">
    <div>
        <!-- begin posts informations -->
        <?php foreach($data['posts'] as $post): ?>
            <a href="<?php echo BASE_URL.'post/show/'.$post->id_post ?>" style="color:black;text-decoration: none;">
                <div class="card mb-3" style="width: 800px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                        <img  src="../public/img/<?php echo $post->url_photo ?>" alt="<?php echo $post->title ?>">
                        </div>
                        <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $post->title ?></h5>
                            <p class="card-text"><?php echo HelpersFunction::CutText($post->description,180); ?></p>
                            <p class="card-text"><small class="text-muted"><?php echo timeAgo::ConvertToAgo($post->date_update_post)?></small></p>
                        </div>
                        </div>
                    </div>
                </div>
            </a>
        <?php endforeach;?>
        <!-- end posts informations -->
    </div>

    <!-- section categories -->
    <div class="categories">
        <div class="card ">
            <div class="card-header bg-light">
                <h4 class="text-center card-title">Categories</h4>
            </div>
                <div class="card-body">
                    <ul>
                        <?php foreach($data['categories'] as $categorie) : ?>
                        <li>
                            <a href="<?php echo $categorie->libelle ?>"><?php echo $categorie->libelle ?></a>
                        </li>
                       <?php endforeach;?>
                    </ul>
                </div>
        </div>
    </div>
        

</div>
</div>
