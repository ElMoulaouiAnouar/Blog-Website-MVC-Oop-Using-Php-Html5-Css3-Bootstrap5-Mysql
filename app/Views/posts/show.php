<?php
$validate = new Validation();
$allComments = (new CommentController())->GetComments($data->id_post);
if(isset($_POST['btn_addComment'])){
    $commentData = [
        'comment' => Filters::FilterInput($_POST['comment'])
    ];
    $validate->Validate($commentData,[
        'comment' => 'required'
    ]);

    if($validate->ErrorCount() == 0){
        $commentData['id_user'] = $_SESSION['user_id'];
        $commentData['id_post'] = $data->id_post;
        $commentData['status'] = 'attende';
        $commentData['date'] = date('Y/m/d H:i:s');

        (new CommentController())->create($commentData);
    }
   
}?>
 

<div class="container">
    <div class="row">
        <div class="col-12 col-sm-11 col-md-10 col-lg-9 p-3 mx-auto">

            <!-- section post -->

            <div class="card" style="border-radius: 10px;">
                <div class="card-title text-center">
                    <h3><?php echo  $data->title ?></h3>
                </div>

                <div class="card-body">
                    <div class="" style="height: 450px;">
                        <img width="100%" height="100%"  src="../../public/img/<?php echo $data->url_photo ?>" alt="<?php echo $data->title ?>">
                    </div>
                    
                    <div class="post_decription" style="line-height: 28px;text-align: justify;padding: 10px 0;font-family: Arial, Helvetica, sans-serif;">

                        <?php echo $data->description ?>

                    </div>
                    <div class="d-flex justify-content-between">
                        <div class="badge bg-success p-2">
                        Published in : <?php echo $data->date_update_post ?>
                        </div>
                        
                        <div>
                            <i class="fa fa-eye"></i>10 View
                        </div>

                    </div>
                </div>
                      <!-- section comments -->
                <div class="">
                    
                    <div class="card" style="border-radius: 0 0 10px 10px;">
                        <div class="card-header">
                            <div class="card-title"><h4>Comments</h4></div>
                        </div>
                        <div class="card-body">
                            <!-- section add comments -->
                            <div>
                                <h5 style="padding-left: 7px;text-transform:uppercase;"> <?php echo $_SESSION['user_name'] ?? '' ?></h5>
                            </div>
                            <form method="POST" action="">
                            <div class="form-floating">
                                <textarea name="comment" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                                <label for="floatingTextarea2">Comments</label>
                            </div>
                            <div class="text-danger" style="margin-left: 5px;"><?php echo $validate->DisplayError('comment')  ?></div>
                            <div style="text-align: right; padding:5px 1px 0 0;">
                                <button type="submit" class="btn btn-outline-primary p-2" name="btn_addComment">Add Comment</button>
                            </div>
                            </form>

                            <!-- section show comments -->

                            <div>
                                <h4><span><?php echo (new CommentController())->TotalComments($data->id_post); ?></span> Comment</h4>
                            </div>
                            <div>
                                <?php foreach ($allComments as $comment): ?>
                                    <div class="d-flex" style="margin: 5px 0;">
                                            <img style="border-radius: 0%;" width="80px" height="80px"  src="../../public/img/<?php echo $comment->url_photo ?>" alt="<?php echo $comment->name ?>">
                                            <div class="card bg-light" style="width: 100%;margin-left:8px">
                                                <div class="card-body">
                                                    <div class="d-flex justify-content-between">
                                                        <h5 class="card-title"><?php echo $comment->name ?> <span style="color: blue;margin-left:4px;"><?php echo $comment->date_update_comment ?></span></h5>
                                                        <div class="d-flex">
                                                            <a href="#" class="btn btn-sm btn-warning m-1">Edit</a>
                                                            <a href="<?php echo BASE_URL.'comment/destroy/'.$comment->id_comment.'/'.$data->id_post ?>" class="btn btn-sm btn-danger m-1">Delete</a>
                                                        </div>
                                                    </div>
                                                    <p class="card-text"><?php echo $comment->comment_description ?></p>
                                                </div>
                                            </div>
                                    </div>
                                <?php endforeach;?>

                            </div>

                        </div>
                        <!-- end card body -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>